<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regions extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user')) OR $this->session->userdata('user')['role'] != 2) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->model('admin/Region');
	}

	public function index()
	{
		$data['regions'] = $this->Region->selectAll();
		$data['title'] = "Regions";
		layouts($data, 'admin/regions/index.php');
	}

	public function create()
	{
		$data['title'] = "Regions create page";
		layouts($data, 'admin/regions/create.php');
	}

	public function store()
	{
		$name_en = $this->input->post('name_en');
		$name_ar = $this->input->post('name_ar');

		$this->form_validation->set_rules('name_en', 'Region EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Region AR', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
			return;
		} else {
			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
			);
			$this->Region->insert($data);

			redirect("admin/regions");
		}
	}

	public function edit($id)
	{
		$data['title'] = "Regions edit page";
		$data['region'] = $this->Region->select($id);
		layouts($data, 'admin/regions/edit.php');
	}

	public function update($id)
	{
		$name_en = $this->input->post('name_en');
		$name_ar = $this->input->post('name_ar');

		$this->form_validation->set_rules('name_en', 'Region EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Region AR', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
			return;
		} else {
			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
			);
			$this->Region->update($data, $id);

			redirect("admin/regions");
		}
	}

	public function change_status($id)
	{
		$this->Region->changeStatus($id);
		redirect("admin/regions");
	}

}
