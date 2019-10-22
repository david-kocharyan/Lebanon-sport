<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moderators extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user')) OR $this->session->userdata('user')['role'] != 2) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->model('admin/Moderator');
	}

	public function index()
	{
		$data['admins'] = $this->Moderator->selectAll();
		$data['regions'] = $this->Moderator->selectRegions();
		$data['title'] = "Admins";
		layouts($data, 'admin/moderators/index.php');
	}

	public function create()
	{
		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['title'] = "Observer create page";
		layouts($data, 'admin/moderators/create.php');
	}

	public function store()
	{
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$email = $this->input->post("email");
		$mobile_number = $this->input->post("mobile_number");
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[admins.email]');
		$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim|is_unique[admins.mobile_number]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admins.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

		if (empty($_POST["regions"]) OR $_POST["regions"] == NULL) {
			$this->session->set_flashdata('error_region', 'Regions was required');
			$this->create();
			return;
		} else {
			$regions = $_POST["regions"];
		}

		if ($this->form_validation->run() == FALSE) {
			$this->create();
			return;
		} else {
			$data = array(
				"first_name" => $first_name,
				"last_name" => $last_name,
				"email" => $email,
				"mobile_number" => $mobile_number,
				"username" => $username,
				"password" => hash("SHA512", $password),
				"role" => 1,
			);

			$this->db->trans_start();
			$this->Moderator->insert($data);
			$id = $this->db->insert_id();

			foreach ($regions as $key) {
				$this->db->insert("admins_region", array("admin_id" => $id, 'region_id' => $key));
			}
			$this->db->trans_complete();

			redirect("admin/moderators");
		}
	}

	public function edit($id)
	{
		$data['title'] = "Observer edit page";
		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['admins_region'] = $this->db->get_where('admins_region', array('status' => 1, 'admin_id' => $id))->result();
		$data['admin'] = $this->Moderator->select($id);
		layouts($data, 'admin/moderators/edit.php');
	}

	public function update($id)
	{
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$email = $this->input->post("email");
		$mobile_number = $this->input->post("mobile_number");
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$admin = $this->Moderator->select($id);

		if($admin->username != $username) {
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
		}

		if($admin->email != $email) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
		}

		if($admin->mobile_number != $mobile_number) {
			$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim|is_unique[users.mobile_number]');
		} else {
			$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim');
		}

		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');


		if (empty($_POST["regions"]) OR $_POST["regions"] == NULL) {
			$this->session->set_flashdata('error_region', 'Regions was required');
			$this->edit($id);
			return;
		} else {
			$regions = $_POST["regions"];
		}

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
			return;
		} else {
			$data = array(
				"first_name" => $first_name,
				"last_name" => $last_name,
				"email" => $email,
				"mobile_number" => $mobile_number,
				"username" => $username,
			);
			if (isset($password)) $data['password'] = password_hash($password, PASSWORD_BCRYPT);

			$this->db->trans_start();
			$this->Moderator->update($data, $id);
			$this->Moderator->updateRegion($regions, $id);
			$this->db->trans_complete();

			redirect("admin/moderators");
		}
	}

	public function change_status($id)
	{
		$this->Moderator->changeStatus($id);
		redirect("admin/moderators");
	}
}
