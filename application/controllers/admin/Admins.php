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
		$this->load->model("Admin");
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
		$full_name = $this->input->post('full_name');
		$email = $this->input->post('email');

		$def_username = $user->username;
		$def_email = $user->email;

		if ($def_username != $username) {
			$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[30]|is_unique[admins.username]');
		}
		if ($def_email != $email) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[admins.email]');
		}
		$this->form_validation->set_rules('full_name', 'Full Name', 'required|trim');


		if ($this->form_validation->run() == FALSE) {
			$this->settings();
		} else {
			if (!empty($_FILES['logo']['name']) || null != $_FILES['logo']['name']) {
				unlink(FCPATH . "/plugins/images/Logo/" . $user->logo);
				unlink(FCPATH . "/plugins/thumb_images/Logo/Thumb_" . $user->logo);

				$image = $this->uploadImage('logo');
				if (isset($image['error'])) {
					$this->session->set_flashdata('error', $image['error']);
					$this->settings();
					return;
				}
				$logo = isset($image['data']['file_name']) ? $image['data']['file_name'] : "";
			}

			$admin = array(
				'username' => $username,
				'full_name' => $full_name,
				'email' => $email,
			);
			if (isset($logo)) $admin['logo'] = $logo;

			$this->Admin->update($id, $admin);

			$this->session->set_flashdata('success', 'You have change the clients successfully');
			redirect("admin/settings");
		}
	}

	private function uploadImage($image)
	{
		if (!is_dir(FCPATH . "/plugins/images/Logo")) {
			mkdir(FCPATH . "/plugins/images/Logo", 0755, true);
		}

		if (!is_dir(FCPATH . "/plugins/thumb_images/Logo")) {
			mkdir(FCPATH . "/plugins/thumb_images/Logo", 0755, true);
		}

		$path = FCPATH . "/plugins/images/Logo";
		$config['upload_path'] = $path;
		$config['file_name'] = 'Logo_' . time() . '_' . rand();
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

//		second thumb resize
		$source_path = $path . "/" . $filename;
		$config_manip = array(
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => FCPATH . "/plugins/thumb_images/Logo/" . "Thumb_" . $filename,
			'maintain_ratio' => TRUE,
			'create_thumb' => FALSE,
			'width' => 300,
			'height' => 300,
		);

		$this->image_lib->initialize($config_manip);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		$this->image_lib->clear();
	}
}
