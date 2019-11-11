<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainBanner extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}
		$this->load->helper('layouts');
		$this->load->model('admin/MainBannerModel');
	}

	public function index()
	{
		$data['data'] = $this->MainBannerModel->first();
		$data['title'] = "Main Banner";
		layouts($data, 'admin/mainBanner/create.php');
	}

	public function store()
	{
		$text_en = $this->input->post("text_en");
		$text_ar = $this->input->post("text_ar");

		$this->form_validation->set_rules('text_en', 'Text EN', 'required');
		$this->form_validation->set_rules('text_ar', 'Text AR', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
			return;
		} else {

			$data = array(
				'text_en' => $text_en,
				'text_ar' => $text_ar,
			);

			if (!empty($_FILES['image']['name']) || null != $_FILES['image']['name']) {
				$images = $this->uploadImage('image');
				if (isset($images['error'])) {
					$this->session->set_flashdata('error', $images['error']);
					$this->index();
					return;
				} else {
					$data['banner'] = $images['data']['file_name'] ?? NULL;
				}
			}

			if(null != $this->input->post("id")) {
				$this->MainBannerModel->update($data, $this->input->post("id"));
			} else {
				$this->MainBannerModel->insert($data);
			}

		}
		redirect("admin/banner");
	}

	private function uploadImage($image)
	{
		if (!is_dir(FCPATH . "/plugins/images/banner")) {
			mkdir(FCPATH . "/plugins/images/banner", 0755, true);
		}

		$path = FCPATH . "/plugins/images/banner";
		$config['upload_path'] = $path;
		$config['file_name'] = 'student_' . time() . '_' . rand();
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 100000;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($image)) {
			$errorStrings = strip_tags($this->upload->display_errors());
			$error = array('error' => $errorStrings, 'image' => $image);
			return $error;
		} else {
			$uploadedImage = $this->upload->data();
			$this->resizeImage($uploadedImage['file_name'], $path);
			$data = array('data' => $uploadedImage);
			return $data;
		}
	}

	private function resizeImage($filename, $path)
	{
		$source_path = $path . "/" . $filename;
		$target_path = $path . "/" . $filename;
		$config_manip = array(
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => TRUE,
			'create_thumb' => FALSE,
			'width' => 500,
			'height' => 500,
		);
		$this->load->library('image_lib');
		$this->image_lib->initialize($config_manip);

		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		$this->image_lib->clear();
	}

}
