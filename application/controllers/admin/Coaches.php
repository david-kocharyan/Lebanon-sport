<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coaches extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->model('admin/Coach');
	}

	public function index()
	{
		if ($this->session->userdata('user')['role'] == 2) $data['coaches'] = $this->Coach->selectAll();
		if ($this->session->userdata('user')['role'] == 1) $data['coaches'] = $this->Coach->selectAllByAdmin($this->session->userdata('user')['id']);
		$data['title'] = "Coaches";
		layouts($data, 'admin/coaches/index.php');
	}

	public function create()
	{
		$data['title'] = "Coaches create page";
		if ($this->session->userdata('user')['role'] == 2) $data['schools'] = $this->db->get_where('schools', array('status' => 1) )->result();
		if ($this->session->userdata('user')['role'] == 1) $data['schools'] = $this->db->get_where('schools', array('status' => 1, "admin_id" => $this->session->userdata('user')['id']) )->result();
		layouts($data, 'admin/coaches/create.php');
	}

	public function store()
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$school_id = $this->input->post("school");
		$gender = $this->input->post("gender");

		$this->form_validation->set_rules('name_en', 'Name EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Name AR', 'required|trim');
		$this->form_validation->set_rules('school', 'School', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');

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
				"school_id" => $school_id,
				"gender" => $gender,
			);
			if (isset($image)) $data['image'] = $image;

			$this->Coach->insert($data);

			redirect("admin/coaches");
		}
	}

	public function edit($id)
	{
		$data['title'] = "Coaches edit page";
		$data['coaches'] = $this->Coach->select($id);
		if ($this->session->userdata('user')['role'] == 2) $data['schools'] = $this->db->get_where('schools', array('status' => 1) )->result();
		if ($this->session->userdata('user')['role'] == 1) $data['schools'] = $this->db->get_where('schools', array('status' => 1, "admin_id" => $this->session->userdata('user')['id']) )->result();
		layouts($data, 'admin/coaches/edit.php');
	}

	public function update($id)
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$school_id = $this->input->post("school");
		$gender = $this->input->post("gender");

		$this->form_validation->set_rules('name_en', 'Name EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Name AR', 'required|trim');
		$this->form_validation->set_rules('school', 'School', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');

		$coach = $this->Coach->select($id);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
			return;
		} else {
			if (!empty($_FILES['image']['name']) || null != $_FILES['image']['name']) {
				unlink(FCPATH . "/plugins/images/referee/" . $coach->image);

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
				"school_id" => $school_id,
				"gender" => $gender,
			);
			if (isset($image)) $data['image'] = $image;

			$this->Coach->update($data, $id);

			redirect("admin/coaches");
		}
	}

	public function change_status($id)
	{
		$this->Coach->changeStatus($id);
		redirect("admin/coaches");
	}

	private function uploadImage($image)
	{
		if (!is_dir(FCPATH . "/plugins/images/coaches")) {
			mkdir(FCPATH . "/plugins/images/coaches", 0755, true);
		}

		$path = FCPATH . "/plugins/images/coaches";
		$config['upload_path'] = $path;
		$config['file_name'] = 'coaches_' . time() . '_' . rand();
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
			'width' => 1000,
			'height' => 1000,
		);
		$this->load->library('image_lib');
		$this->image_lib->initialize($config_manip);

		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		$this->image_lib->clear();
	}

}
