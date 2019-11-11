<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Observers extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->helper('sendEmail');
		$this->load->model('admin/Observer');
	}

	public function index()
	{
		if ($this->session->userdata('user')['role'] == 2) $data['observers'] = $this->Observer->selectAll();
		if ($this->session->userdata('user')['role'] == 1) $data['observers'] = $this->Observer->selectAllByAdmin($this->session->userdata('user')['id']);
		$data['sport'] = $this->Observer->selectSports();
		$data['title'] = "Observer";
		layouts($data, 'admin/observers/index.php');
	}

	public function create()
	{
		$data['sports'] = $this->db->get_where('sport_types', array('status' => 1))->result();
		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['admins_region'] = $this->Observer->get_admins_region($this->session->userdata('user')["id"]);
		$data['title'] = "Observer create page";
		layouts($data, 'admin/observers/create.php');
	}

	public function store()
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$region = $this->input->post("region");
		$gender = $this->input->post("gender");
		$email = $this->input->post("email");
		$mobile_number = $this->input->post("mobile_number");
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$this->form_validation->set_rules('name_en', 'Name EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Name AR', 'required|trim');
		$this->form_validation->set_rules('region', 'Region', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]');
		$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim|is_unique[users.mobile_number]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

		if (empty($_POST["sport"]) OR $_POST["sport"] == NULL) {
			$this->session->set_flashdata('error_sport', 'Sport types was required');
			$this->create();
			return;
		} else {
			$sport = $_POST["sport"];
		}

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
				"gender" => $gender,
				"email" => $email,
				"mobile_number" => $mobile_number,
				"region_id" => $region,
				"username" => $username,
				"password" => password_hash($password, PASSWORD_BCRYPT),
			);
			if (isset($image)) $data['image'] = $image;

			$this->db->trans_start();
			$this->Observer->insert($data);
			$id = $this->db->insert_id();

			foreach ($sport as $key) {
				$this->db->insert("users_sport", array("user_id" => $id, 'sport_id' => $key));
			}
			$this->db->trans_complete();

			if ($id != NULL OR $id != "") {
				$message = 'Dear Observer, <br> <br>' . 'Your credentials for Mehe application are: <br> <br>' . 'Username - ' . $username . '<br>' . 'Password - ' . $password .'<br><br> Best regards <br> MEHE Team';
				$subject = 'MEHE Application';
				send_email($email, $message, $subject);
			}

			redirect("admin/observers");
		}
	}

	public function edit($id)
	{
		$data['title'] = "Observer edit page";
		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['admins_region'] = $this->Observer->get_admins_region($this->session->userdata('user')["id"]);
		$data['observer_sport'] = $this->db->get_where('users_sport', array('status' => 1, 'user_id' => $id))->result();
		$data['sports'] = $this->db->get_where('sport_types', array('status' => 1))->result();
		$data['observer'] = $this->Observer->select($id);
		layouts($data, 'admin/observers/edit.php');
	}

	public function update($id)
	{
		$name_en = $this->input->post("name_en");
		$name_ar = $this->input->post("name_ar");
		$region = $this->input->post("region");
		$gender = $this->input->post("gender");
		$email = $this->input->post("email");
		$mobile_number = $this->input->post("mobile_number");
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$observer = $this->Observer->select($id);

		if ($observer->username != $username) {
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
		}

		if ($observer->email != $email) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
		}

		if ($observer->mobile_number != $mobile_number) {
			$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim|is_unique[users.mobile_number]');
		} else {
			$this->form_validation->set_rules('mobile_number', 'Mobile number', 'required|trim');
		}

		$this->form_validation->set_rules('name_en', 'Name EN', 'required|trim');
		$this->form_validation->set_rules('name_ar', 'Name AR', 'required|trim');
		$this->form_validation->set_rules('region', 'Region', 'required|trim');
		$this->form_validation->set_rules('gender', 'Gender', 'required|trim');

		if (empty($_POST["sport"]) OR $_POST["sport"] == NULL) {
			$this->session->set_flashdata('error_sport', 'Sport types was required');
			$this->edit($id);
			return;
		} else {
			$sport = $_POST["sport"];
		}

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
				unlink(FCPATH . "/plugins/images/users/" . $observer->image);
			}

			$data = array(
				"name_en" => $name_en,
				"name_ar" => $name_ar,
				"gender" => $gender,
				"email" => $email,
				"mobile_number" => $mobile_number,
				"region_id" => $region,
				"username" => $username,
			);
			if (isset($password)) $data['password'] = password_hash($password, PASSWORD_BCRYPT);
			if (isset($image)) $data['image'] = $image;

			$this->db->trans_start();
			$this->Observer->update($data, $id);
			$this->Observer->updateSport($sport, $id);
			$this->db->trans_complete();

			redirect("admin/observers");
		}
	}

	public function change_status($id)
	{
		$this->Observer->changeStatus($id);
		redirect("admin/observers");
	}

	private function uploadImage($image)
	{
		if (!is_dir(FCPATH . "/plugins/images/users")) {
			mkdir(FCPATH . "/plugins/images/users", 0755, true);
		}

		$path = FCPATH . "/plugins/images/users";
		$config['upload_path'] = $path;
		$config['file_name'] = 'users_' . time() . '_' . rand();
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
