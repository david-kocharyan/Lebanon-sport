<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}
		$this->load->model("admin/Admin");
		$this->load->helper('layouts');
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$data['title'] = "Dashboard";
		layouts($data);
	}

	public function profile()
	{
		$data['admin'] = $this->Admin->getClientById($this->session->userdata('user')['id']);
		$data['title'] = "Admin Profile";
		layouts($data, 'admin/index.php');
	}

	public function settings()
	{
		$data['title'] = "Admin Settings";
		$data['admin'] = $this->Admin->getClientById($this->session->userdata('user')["id"]);
		layouts($data, 'admin/edit.php');
	}

	public function update($id)
	{
		$user = $this->Admin->getClientById($id);

		$username = $this->input->post('username');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$mobile_number = $this->input->post('mobile_number');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$def_username = $user->username;
		$def_email = $user->email;

		if ($def_username != $username) {
			$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[30]|is_unique[admins.username]');
		}
		if ($def_email != $email) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[admins.email]');
		}
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'min_length[8]');


		if ($this->form_validation->run() == FALSE) {
			$this->settings();
		} else {

			$admin = array(
				'username' => $username,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'mobile_number' => $mobile_number,
				'email' => $email,
			);
			if (isset($password)) $admin['password'] = hash("SHA512", $password);


			$this->Admin->update($id, $admin);

			$this->session->set_flashdata('success', 'You have change the clients successfully');
			redirect("admin/settings");
		}
	}


}
