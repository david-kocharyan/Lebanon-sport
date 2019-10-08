<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->model('admin/Student');
	}

	public function index()
	{
		$data['students'] = $this->Student->selectAll();
		$data['title'] = "Students";
		$data['sports'] = $this->Student->selectSports();
		layouts($data, 'admin/students/index.php');
	}

	public function create()
	{
		$data['title'] = "Students create page";
		$data['sports'] = $this->db->get_where('sport_types', array('status' => 1))->result();
		$data['schools'] = $this->db->get_where('schools', array('status' => 1))->result();
		layouts($data, 'admin/students/create.php');
	}

	public function store()
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$school_id = $this->input->post("school");
		$gender = $this->input->post("gender");
		$birthday = $this->input->post("birthday");

		$this->form_validation->set_rules('name_en', 'Name EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Name AR', 'required|trim');
		$this->form_validation->set_rules('school', 'School', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('birthday', 'Birthday', 'required|trim');

		if (empty($_POST["sport"]) OR $_POST["sport"] == NULL){
			$this->session->set_flashdata('error_sport', 'Sport types was required');
			$this->create();
			return;
		}
		$sport = $_POST["sport"];

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
				"birthday" => $birthday,
			);
			if (isset($image)) $data['image'] = $image;

			$this->db->trans_start();
			$this->Student->insert($data);
			$id = $this->db->insert_id();

			foreach ($sport as $key)
			{
				$this->db->insert("students_sport", array("student_id" => $id, 'sport_id' => $key));
			}
			$this->db->trans_complete();

			redirect("admin/students");
		}
	}

	public function edit($id)
	{
		$data['title'] = "Edit Students";
		$data['student'] = $this->Student->select($id);
		$data['student_sport'] = $this->db->get_where('students_sport', array('status' => 1, 'student_id' => $id))->result();
		$data['sports'] = $this->db->get_where('sport_types', array('status' => 1))->result();
		$data['schools'] = $this->db->get_where('schools', array('status' => 1))->result();
		layouts($data, 'admin/students/edit.php');
	}

	public function update($id)
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$school_id = $this->input->post("school");
		$gender = $this->input->post("gender");
		$birthday = $this->input->post("birthday");

		$this->form_validation->set_rules('name_en', 'Name EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Name AR', 'required|trim');
		$this->form_validation->set_rules('school', 'School', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('birthday', 'Birthday', 'required|trim');

		if (empty($_POST["sport"]) OR $_POST["sport"] == NULL){
			$this->session->set_flashdata('error_sport', 'Sport types was required');
			$this->create();
			return;
		}
		$sport = $_POST["sport"];
		$student = $this->Student->select($id);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
			return;
		} else {
			if (!empty($_FILES['image']['name']) || null != $_FILES['image']['name']) {
				unlink(FCPATH . "/plugins/images/student/" . $student->image);

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
				"birthday" => $birthday,
			);
			if (isset($image)) $data['image'] = $image;

			$this->db->trans_start();
			$this->Student->update($data, $id);
			$this->Student->updateSport($sport, $id);
			$this->db->trans_complete();

			redirect("admin/students");
		}
	}



	public function change_status($id)
	{
		$this->Student->changeStatus($id);
		redirect("admin/students");
	}

	private function uploadImage($image)
	{
		if (!is_dir(FCPATH . "/plugins/images/student")) {
			mkdir(FCPATH . "/plugins/images/student", 0755, true);
		}

		$path = FCPATH . "/plugins/images/student";
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
