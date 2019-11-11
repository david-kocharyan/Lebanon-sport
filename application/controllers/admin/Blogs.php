<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}
		$this->load->helper('layouts');
		$this->load->model('admin/Blog');
	}

	public function index()
	{
		$data['blog'] = $this->Blog->selectAll();
		$data['title'] = "Blog";
		layouts($data, 'admin/blogs/index.php');
	}

	public function create()
	{
		$data['title'] = "Create Topic";
		layouts($data, 'admin/blogs/create.php');
	}

	public function store()
	{
		$title_en = $this->input->post("title_en");
		$title_ar = $this->input->post("title_ar");
		$text_en = $this->input->post("text_en");
		$text_ar = $this->input->post("text_ar");

		$this->form_validation->set_rules('title_en', 'Title EN', 'required|trim');
		$this->form_validation->set_rules('title_ar', 'Title AR', 'required|trim');
		$this->form_validation->set_rules('text_en', 'Text EN', 'required');
		$this->form_validation->set_rules('text_ar', 'Text AR', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
			return;
		} else {

			$data = array(
				'title_en' => $title_en,
				'title_ar' => $title_ar,
				'text_en' => $text_en,
				'text_ar' => $text_ar,
			);

			$id = $this->Blog->insert_topic($data);
			if ($id != NULL) {
				$this->db->trans_start();

				if (!empty($_FILES['images']['name'][0]) || null != $_FILES['images']['name'][0]) {
					$images = $this->upload_files($_FILES['images'], $id);
					if (isset($images['err'])) {
						$this->session->set_flashdata('error', $images['err']);
						$this->create();
						return;
					} else {
						$this->db->insert_batch('blog_images', $images);
					}
				}
				$this->db->trans_complete();
			}
		}
		redirect("admin/blog");
	}

	public function edit($id)
	{
		$data['title'] = "Topic and image edit page";
		$data['blog'] = $this->Blog->selectById($id);
		$data['images'] = $this->db->get_where('blog_images', array('blog_id' => $id))->result();
		layouts($data, 'admin/blogs/edit.php');
	}

	public function update($id)
	{
		$title_en = $this->input->post("title_en");
		$title_ar = $this->input->post("title_ar");
		$text_en = $this->input->post("text_en");
		$text_ar = $this->input->post("text_ar");

		$this->form_validation->set_rules('title_en', 'Title EN', 'required|trim');
		$this->form_validation->set_rules('title_ar', 'Title AR', 'required|trim');
		$this->form_validation->set_rules('text_en', 'Text EN', 'required');
		$this->form_validation->set_rules('text_ar', 'Text AR', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
			return;
		} else {

			$data = array(
				'title_en' => $title_en,
				'title_ar' => $title_ar,
				'text_en' => $text_en,
				'text_ar' => $text_ar,
			);

			$this->Blog->update($data, $id);

			$this->db->trans_start();
			if (!empty($_FILES['images']['name'][0]) || null != $_FILES['images']['name'][0]) {
				$images = $this->upload_files($_FILES['images'], $id);
				if (isset($images['err'])) {
					$this->session->set_flashdata('error', $images['err']);
					$this->create();
					return;
				} else {
					$this->db->insert_batch('blog_images', $images);
				}
			}
			$this->db->trans_complete();
		}
		redirect("admin/blog");
	}


	private function upload_files($files, $id)
	{
		if (!is_dir(FCPATH . "/plugins/images/blog/")) {
			mkdir(FCPATH . "/plugins/images/blog/", 0755, true);
		}
		$config = array(
			'upload_path' => FCPATH . "/plugins/images/blog/",
			'allowed_types' => 'jpg|jpeg|png',
			'max_size' => 100000000000,
			'overwrite' => 1
		);

		$this->load->library('upload', $config);

		$images = array();

		foreach ($files['name'] as $key => $image) {
			$_FILES['images[]']['name'] = $files['name'][$key];
			$_FILES['images[]']['type'] = $files['type'][$key];
			$_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['images[]']['error'] = $files['error'][$key];
			$_FILES['images[]']['size'] = $files['size'][$key];
			$ext = explode(".", $image)[1];
			$fileName = 'blog_' . time() . '_' . uniqid() . "." . $ext;

			$images[$key]['image'] = $fileName;
			$images[$key]['blog_id'] = $id;

			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('images[]')) {
				$this->upload->data();
			} else {
				$data['err'] = $this->upload->display_errors() . $image;
				return $data;
			}
		}
		return $images;
	}


	public function change_status($id)
	{
		$this->Blog->changeStatus($id);
		redirect("admin/blog");
	}

	public function change_image_status($id)
	{
		$data = $this->db->get_where('blog_images', ["id" => $id])->row();
		if (null == $data) {
			return;
		}
		$status = $data->status == 1 ? 0 : 1;
		$this->db->update('blog_images', array("status" => $status), ['id' => $id]);
		redirect("admin/blog/edit/$data->blog_id");
	}

	public function show($id)
	{
		$data['title'] = 'Show';
		$data['blog'] = $this->Blog->selectById($id);
		$data['images'] = $this->db->get_where('blog_images', array('blog_id' => $id))->result();
		layouts($data, 'admin/blogs/show.php');
	}

	public function edit_image($id)
	{
		$data['title'] = "Edit Image";
		$data['image'] = $this->db->get_where('blog_images', array('id' => $id))->row();
		layouts($data, 'admin/blogs/edit_image.php');
	}

	public function update_image($id)
	{
		$old_image =  $this->db->get_where('blog_images', array('id' => $id))->row();

		if (!empty($_FILES['image']['name']) || null != $_FILES['image']['name']) {
			unlink(FCPATH . "/plugins/images/blog/" . $old_image->image);

			$image = $this->uploadImage('image');
			if (isset($image['error'])) {
				$this->session->set_flashdata('error', $image['error']);
				$this->edit($id);
				return;
			}
			$image = isset($image['data']['file_name']) ? $image['data']['file_name'] : "";
		}

		if (isset($image)){
			$this->db->set('image', $image);
			$this->db->where('id', $id);
			$this->db->update('blog_images');
		}

		redirect("admin/blog");
	}

	private function uploadImage($image)
	{
		if (!is_dir(FCPATH . "/plugins/images/blog")) {
			mkdir(FCPATH . "/plugins/images/blog", 0755, true);
		}

		$path = FCPATH . "/plugins/images/blog";
		$config['upload_path'] = $path;
		$config['file_name'] = 'blog_' . time() . '_' . rand();
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
