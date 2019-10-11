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
		$data['referees'] = $this->Referee->selectAll();
		$data['title'] = "Referee";
		layouts($data, 'admin/referees/index.php');
	}

	public function create()
	{
		$data['title'] = "Create Referee";
		layouts($data, 'admin/referees/create.php');
	}

	public function store()
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$mobile_number = $this->input->post("mobile_number");

		$this->form_validation->set_rules('name_en', 'Name EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Name AR', 'required|trim');
		$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim|is_unique[users.mobile_number]');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
			return;
		} else {
			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
				"mobile_number" => $mobile_number,
			);

			$this->Referee->insert($data);
			redirect("admin/referees");
		}
	}

	public function edit($id)
	{
		$data['title'] = "Edit Referee";
		$data['referee'] = $this->Referee->select($id);
		layouts($data, 'admin/referees/edit.php');
	}

	public function update($id)
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$mobile_number = $this->input->post("mobile_number");

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
			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
				"mobile_number" => $mobile_number,
			);

			$this->Referee->update($data, $id);
			redirect("admin/referees");
		}
	}

	public function change_status($id)
	{
		$this->Referee->changeStatus($id);
		redirect("admin/referees");
	}
}
