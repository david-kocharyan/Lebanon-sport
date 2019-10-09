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
			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
				"school_id" => $school_id,
				"gender" => $gender,
			);

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

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
			return;
		} else {
			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
				"school_id" => $school_id,
				"gender" => $gender,
			);

			$this->Coach->update($data, $id);

			redirect("admin/coaches");
		}
	}


	public function change_status($id)
	{
		$this->Coach->changeStatus($id);
		redirect("admin/coaches");
	}


}
