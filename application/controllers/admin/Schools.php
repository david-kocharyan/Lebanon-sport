<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->model('admin/School');
	}

	public function index()
	{
		if ($this->session->userdata('user')['role'] == 2) $data['schools'] = $this->School->selectAll();
		if ($this->session->userdata('user')['role'] == 1) $data['schools'] = $this->School->selectAllByAdmin($this->session->userdata('user')['id']);
		$data['title'] = "Schools";
		layouts($data, 'admin/schools/index.php');
	}

	public function create()
	{
		$data['title'] = "School create page";
		$data['admins'] = $this->School->get_admin();
		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['admins_region'] = $this->School->get_admins_region($this->session->userdata('user')["id"]);
		layouts($data, 'admin/schools/create.php');
	}

	public function store()
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$address_en = $this->input->post("address_en");
		$address_ar = $this->input->post("address_ar");
		$region = $this->input->post("region");

		if ($this->input->post("admin") == NULL OR $this->input->post("admin") == "") {
			$admin = $this->session->userdata('user')['id'];
		} else {
			$admin = $this->input->post("admin");
		}

		$this->form_validation->set_rules('name_en', 'Region EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Region AR', 'required|trim');
		$this->form_validation->set_rules('address_en', 'Address EN', 'required|trim');
		$this->form_validation->set_rules('address_ar', 'Address AR', 'required|trim');

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
				"address_en" => $address_en,
				"address_ar" => $address_ar,
				"admin_id" => $admin,
				"region_id" => $region,
			);
			if (isset($image)) $data['image'] = $image;

			$this->School->insert($data);

			redirect("admin/schools");
		}
	}

	public function edit($id)
	{
		$data['title'] = "School edit page";
		$data['school'] = $this->School->select($id);
		$data['admins'] = $this->School->get_admin();
		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['admins_region'] = $this->School->get_admins_region($this->session->userdata('user')["id"]);
		layouts($data, 'admin/schools/edit.php');
	}

	public function update($id)
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$address_en = $this->input->post("address_en");
		$address_ar = $this->input->post("address_ar");
		$region = $this->input->post("region");

		if ($this->input->post("admin") == NULL OR $this->input->post("admin") == "") {
			$admin = $this->session->userdata('user')['id'];
		} else {
			$admin = $this->input->post("admin");
		}

		$this->form_validation->set_rules('name_en', 'Region EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Region AR', 'required|trim');
		$this->form_validation->set_rules('address_en', 'Address EN', 'required|trim');
		$this->form_validation->set_rules('address_ar', 'Address AR', 'required|trim');

		$school = $this->School->select($id);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
			return;
		} else {
			if (!empty($_FILES['image']['name']) || null != $_FILES['image']['name']) {
				unlink(FCPATH . "/plugins/images/school/" . $school->image);

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
				"address_en" => $address_en,
				"address_ar" => $address_ar,
				"admin_id" => $admin,
				"region_id" => $region,
			);
			if (isset($image)) $data['image'] = $image;

			$this->School->update($data, $id);

			redirect("admin/schools");
		}
	}

	public function change_status($id)
	{
		$this->School->changeStatus($id);
		redirect("admin/schools");
	}

	private function uploadImage($image)
	{
		if (!is_dir(FCPATH . "/plugins/images/school")) {
			mkdir(FCPATH . "/plugins/images/school", 0755, true);
		}

		$path = FCPATH . "/plugins/images/school";
		$config['upload_path'] = $path;
		$config['file_name'] = 'school_' . time() . '_' . rand();
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
			'width' => 800,
			'height' => 800,
		);
		$this->load->library('image_lib');
		$this->image_lib->initialize($config_manip);

		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		$this->image_lib->clear();
	}

}
