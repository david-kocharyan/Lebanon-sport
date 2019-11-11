<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referees extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->model('admin/Referee');
	}

	public function index()
	{
		if ($this->session->userdata('user')['role'] == 2) $data['referees'] = $this->Referee->selectAll();
		if ($this->session->userdata('user')['role'] == 1) $data['referees'] = $this->Referee->selectAllByAdmin($this->session->userdata('user')['id']);
		$data['title'] = "Referee";
		layouts($data, 'admin/referees/index.php');
	}

	public function create()
	{
		$data['title'] = "Create Referee";
		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['admins_region'] = $this->Referee->get_admins_region($this->session->userdata('user')["id"]);
		layouts($data, 'admin/referees/create.php');
	}

	public function store()
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$region = $this->input->post("region");
		$mobile_number = $this->input->post("mobile_number");

		$this->form_validation->set_rules('name_en', 'Name EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Name AR', 'required|trim');
		$this->form_validation->set_rules('region', 'Region', 'required|trim');
		$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim|is_unique[users.mobile_number]');

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
				"region_id" => $region,
				"mobile_number" => $mobile_number,
			);
			if (isset($image)) $data['image'] = $image;

			$this->Referee->insert($data);
			redirect("admin/referees");
		}
	}

	public function edit($id)
	{
		$data['title'] = "Edit Referee";
		$data['referee'] = $this->Referee->select($id);
		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['admins_region'] = $this->Referee->get_admins_region($this->session->userdata('user')["id"]);
		layouts($data, 'admin/referees/edit.php');
	}

	public function update($id)
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$mobile_number = $this->input->post("mobile_number");
		$region = $this->input->post("region");

		$referee = $this->Referee->select($id);

		if($referee->mobile_number != $mobile_number) {
			$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim|is_unique[users.mobile_number]');
		} else {
			$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim');
		}

		$this->form_validation->set_rules('name_en', 'Name EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Name AR', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
			return;
		} else {
			if (!empty($_FILES['image']['name']) || null != $_FILES['image']['name']) {

				$image = $this->uploadImage('image');
				if (isset($image['error'])) {
					$this->session->set_flashdata('error', $image['error']);
					$this->edit($id);
					return;
				}
				$image = isset($image['data']['file_name']) ? $image['data']['file_name'] : "";
				unlink(FCPATH . "/plugins/images/referee/" . $referee->image);
			}

			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
				"mobile_number" => $mobile_number,
				"region_id" => $region,
			);
			if (isset($image)) $data['image'] = $image;

			$this->Referee->update($data, $id);
			redirect("admin/referees");
		}
	}

	public function change_status($id)
	{
		$this->Referee->changeStatus($id);
		redirect("admin/referees");
	}

	private function uploadImage($image)
	{
		if (!is_dir(FCPATH . "/plugins/images/referee")) {
			mkdir(FCPATH . "/plugins/images/referee", 0755, true);
		}

		$path = FCPATH . "/plugins/images/referee";
		$config['upload_path'] = $path;
		$config['file_name'] = 'referee_' . time() . '_' . rand();
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
