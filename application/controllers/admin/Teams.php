<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->model('admin/Team');
	}

	public function index()
	{
		if ($this->session->userdata('user')['role'] == 2) $data["teams"] = $this->Team->selectAll();
		if ($this->session->userdata('user')['role'] == 1) $data['teams'] = $this->Team->selectAllByAdmin($this->session->userdata('user')['id']);
		$data["title"] = "Teams";
		layouts($data, 'admin/teams/index.php');
	}

	public function create()
	{
		$data["title"] = "Create Teams";
		if ($this->session->userdata('user')['role'] == 2) $data['school'] = $this->db->get_where('schools', array('status' => 1) )->result();
		if ($this->session->userdata('user')['role'] == 1) $data['school'] = $this->db->get_where('schools', array('status' => 1, "admin_id" => $this->session->userdata('user')['id']) )->result();
		$data["sport"] = $this->db->get_where("sport_types", array('status' => 1))->result();
		$data["age"] = $this->db->get_where("age_group", array('status' => 1))->result();
		layouts($data, 'admin/teams/create.php');
	}

	public function get_students()
	{
		$age_id = $this->input->post('age');
		$sport_id = $this->input->post('sport');
		$school_id = $this->input->post('school');
		$gender_id = $this->input->post('gender');

		$age = $this->db->get_where("age_group", array("id" => $age_id))->row();
		$data = '';

		if ($age != NUll) {
			$this->db->select("students.*, schools.name_en as school_name, ");
			$this->db->join('schools', 'schools.id = students.school_id');
			$this->db->join('students_sport', 'students_sport.student_id = students.id');
			$this->db->where('students.school_id', $school_id);
			$this->db->where('students_sport.sport_id', $sport_id);
			$this->db->where("YEAR(CURDATE()) - YEAR(birthday) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(birthday), '-', DAY(birthday)) ,'%Y-%c-%e') > CURDATE(), 1, 0) >=", $age->from);
			$this->db->where("YEAR(CURDATE()) - YEAR(birthday) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(birthday), '-', DAY(birthday)) ,'%Y-%c-%e') > CURDATE(), 1, 0) <=", $age->to);
			if ($gender_id == 1) $this->db->where('students.gender', $gender_id);
			if ($gender_id == 0) $this->db->where('students.gender', $gender_id);
			$data = $this->db->get('students')->result();
			if ($data == NULL) {
				$data['success'] = 'Students not found';
			}
		} else {
			$data['success'] = 'Please Enter Students Age group';
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function store()
	{
		$teams = array(
			"age_id" => $this->input->post('age'),
			"gender" => $this->input->post('gender'),
			"sport_id" => $this->input->post('sport'),
			"school_id" => $this->input->post('school'),
			"name" => $this->input->post('name_s'),
		);

		$this->db->insert('teams', $teams);
		$last_team_id = $this->db->insert_id();

		if ($_POST['students'] != NULL OR $_POST['students'] != "") {
			foreach ($_POST['students'] as $key) {
				$this->db->insert("students_team", array("team_id" => $last_team_id, 'student_id' => $key));
			}
			redirect("admin/teams");
		} else {
			$this->create();
			return;
		}
	}

	public function edit($id)
	{
		$data["title"] = "Edit Teams";
		$data["sport"] = $this->db->get_where("sport_types", array('status' => 1))->result();
		$data["age"] = $this->db->get_where("age_group", array('status' => 1))->result();
		$data["team"] = $this->Team->select($id);
		$data["team_students"] = $this->Team->selectTeam($id);
		layouts($data, 'admin/teams/edit.php');
	}

	public function update($id)
	{
		$name = $this->input->post('name');

		if (empty($_POST["students"]) OR $_POST["students"] == NULL){
			$this->session->set_flashdata('error_sport', 'Sport types was required');
			$this->edit($id);
			return;
		}
		$students = $_POST["students"];

		$data = array(
			"name" => $name,
		);
		$this->db->trans_start();
		$this->Team->update($data, $id);
		$this->Team->updateSport($students, $id);
		$this->db->trans_complete();

		redirect("admin/teams");
	}

	public function change_status($id)
	{
		$this->Team->changeStatus($id);
		redirect("admin/teams");
	}
}
