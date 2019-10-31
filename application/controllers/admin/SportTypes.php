<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SportTypes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user')) OR $this->session->userdata('user')['role'] != 2) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->model('admin/SportType');
	}

	public function index()
	{
		$data['types'] = $this->SportType->selectAll();
		$data['points'] = $this->SportType->selectpoints();
		$data['title'] = "Sport Types";
		layouts($data, 'admin/types/index.php');
	}

	public function create()
	{
		$data['title'] = "Sport Types create page";
		layouts($data, 'admin/types/create.php');
	}

	public function store()
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$desc_en = $this->input->post("desc_en");
		$desc_ar = $this->input->post("desc_ar");


		if (empty($_POST["points"]) OR $_POST["points"] == NULL){
			$this->session->set_flashdata('points', 'Sport points was required');
			$this->create();
			return;
		}
		$points = $_POST["points"];

		$this->form_validation->set_rules('name_en', 'Region EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Region AR', 'required|trim');
		$this->form_validation->set_rules('desc_en', 'Description EN', 'required|trim');
		$this->form_validation->set_rules('desc_ar', 'Description AR', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
			return;
		} else {
			if (!empty($_FILES['image']['name']) || null != $_FILES['image']['name']) {
				$image = $this->uploadImage('image');
				if (isset($image['error'])) {
					$this->session->set_flashdata('error', $image['error']);
					$this->create();
					return;
				}
				$image = isset($image['data']['file_name']) ? $image['data']['file_name'] : "";
			} else {
				$this->session->set_flashdata('error', 'Image was required');
				$this->create();
				return;
			}

			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
				"desc_en" => $desc_en,
				"desc_ar" => $desc_ar,
			);
			if (isset($image)) $data['image'] = $image;

			$this->db->trans_start();
			$this->SportType->insert($data);
			$id = $this->db->insert_id();

			foreach ($points as $key)
			{
				$this->db->insert("sport_points", array("sport_type_id" => $id, 'value' => $key));
			}
			$this->db->trans_complete();

			redirect("admin/sport-types");
		}
	}

	public function edit($id)
	{
		$data['title'] = "Sport types edit page";
		$data['types'] = $this->SportType->select($id);
		$data['points'] = $this->db->get_where('sport_points', array('status' => 1, 'sport_type_id' => $id))->result();
		layouts($data, 'admin/types/edit.php');
	}

	public function update($id)
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$desc_en = $this->input->post("desc_en");
		$desc_ar = $this->input->post("desc_ar");

		$this->form_validation->set_rules('name_en', 'Region EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Region AR', 'required|trim');
		$this->form_validation->set_rules('desc_en', 'Description EN', 'required|trim');
		$this->form_validation->set_rules('desc_ar', 'Description AR', 'required|trim');

		$type = $this->SportType->select($id);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
			return;
		} else {
			if (!empty($_FILES['image']['name']) || null != $_FILES['image']['name']) {
				unlink(FCPATH . "/plugins/images/sport/" . $type->image);

				$image = $this->uploadImage('image');
				if (isset($image['error'])) {
					$this->session->set_flashdata('error', $image['error']);
					$this->edit($id);
					return;
				}
				$image = isset($image['data']['file_name']) ? $image['data']['file_name'] : "";
			}

			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
				"desc_en" => $desc_en,
				"desc_ar" => $desc_ar,
			);
			if (isset($image)) $data['image'] = $image;


			$this->db->trans_start();
			$this->SportType->update($data, $id);
			if ($this->input->post("points") != NULL){
				$points = $this->input->post("points");
				$this->SportType->updatePoints($points, $id);
			}
			$this->db->trans_complete();

			redirect("admin/sport-types");
		}
	}

	public function change_status($id)
	{
		$this->SportType->changeStatus($id);
		redirect("admin/sport-types");
	}

	private function uploadImage($image)
	{
		if (!is_dir(FCPATH . "/plugins/images/sport")) {
			mkdir(FCPATH . "/plugins/images/sport", 0755, true);
		}

		$path = FCPATH . "/plugins/images/sport";
		$config['upload_path'] = $path;
		$config['file_name'] = 'sport_' . time() . '_' . rand();
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
