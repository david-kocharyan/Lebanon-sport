<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}
		$this->load->helper('layouts');
		$this->load->model('admin/Game');
	}

	public function index()
	{
		$data['title'] = "All Games";
		if ($this->session->userdata('user')['role'] == 2) $data['game'] = $this->Game->selectAll();
		if ($this->session->userdata('user')['role'] == 1) $data['game'] = $this->Game->selectAllByAdmin($this->session->userdata('user')['id']);
		layouts($data, 'admin/games/index.php');
	}

	public function create()
	{
		$data['title'] = "Games create page";
		if ($this->session->userdata('user')['role'] == 2) $data['school'] = $this->db->get_where('schools', array('status' => 1))->result();
		if ($this->session->userdata('user')['role'] == 1) $data['school'] = $this->db->get_where('schools', array('status' => 1, "admin_id" => $this->session->userdata('user')['id']))->result();

		$data['game_type'] = $this->db->get_where('game_types', array('status' => 1))->result();
		$data['sport'] = $this->db->get_where('sport_types', array('status' => 1))->result();
		$data['age'] = $this->db->get_where('age_group', array('status' => 1))->result();;

		layouts($data, 'admin/games/create.php');
	}

	public function custom_game()
	{
		$data['title'] = "Games with costume teams create page";
		if ($this->session->userdata('user')['role'] == 2) $data['school'] = $this->db->get_where('schools', array('status' => 1))->result();
		if ($this->session->userdata('user')['role'] == 1) $data['school'] = $this->db->get_where('schools', array('status' => 1, "admin_id" => $this->session->userdata('user')['id']))->result();

		$data['game_type'] = $this->db->get_where('game_types', array('status' => 1))->result();
		$data['sport'] = $this->db->get_where('sport_types', array('status' => 1))->result();
		$data['age'] = $this->db->get_where('age_group', array('status' => 1))->result();;

		layouts($data, 'admin/games/custom_game.php');
	}

	public function get_teams()
	{
		$age = $this->input->post('age');
		$school_1 = $this->input->post('school_1');
		$school_2 = $this->input->post('school_2');
		$gender = $this->input->post('gender');
		$sport = $this->input->post('sport');

		$region_1 = $this->Game->regionBySchool($school_1)->region_id;
		$region_2 = $this->Game->regionBySchool($school_2)->region_id;

		$data = array();
		$team_1 = $this->db->get_where('teams', array('age_id' => $age, 'school_id' => $school_1, 'gender' => $gender, 'sport_id' => $sport, "status" => 1))->result();
		$team_2 = $this->db->get_where('teams', array('age_id' => $age, 'school_id' => $school_2, 'gender' => $gender, 'sport_id' => $sport, "status" => 1))->result();

		$this->db->where('region_id', $region_1);
		$this->db->or_where('region_id', $region_2);
		$observer = $this->db->get_where('users', array('status' => 1))->result();

		$age_date = $this->db->get_where("age_group", array("id" => $age))->row();
		if ($age_date != NUll) {
			$students_1 = $this->Game->student_ajax($school_1, $sport, $age_date, $gender);
			$students_2 = $this->Game->student_ajax($school_2, $sport, $age_date, $gender);
		}

		if ($team_1 == NULL OR $team_2 == NULL OR $observer == NULL) {
			$data['success'] = 'Teams or observer not found';
		} else {
			$data['team_1'] = $team_1;
			$data['team_2'] = $team_2;
			$data['observer'] = $observer;

			$data['students_1'] = $students_1;
			$data['students_2'] = $students_2;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function store()
	{
		$school_1 = $this->input->post("school_1");
		$school_2 = $this->input->post("school_2");
		$age = $this->input->post("age");
		$sport = $this->input->post("sport");
		$gender = $this->input->post("gender");
		$game_type = $this->input->post("game_type");
		$place = $this->input->post("place");
		$date = strtotime($this->input->post("date"));
		$team_1 = $this->input->post("team_1");
		$team_2 = $this->input->post("team_2");
		$observer = $this->input->post("observer");

		$region_1 = $this->Game->regionBySchool($school_1)->region_id;
		$region_2 = $this->Game->regionBySchool($school_2)->region_id;

		$data = array(
			'place' => $place,
			'time' => $date,
			'age_group_id' => $age,
			'observer_id' => $observer,
			'game_type_id' => $game_type,
			'sport_type' => $sport,
			'gender' => $gender,
		);

		$this->db->trans_start();
		$game_id = $this->Game->create_Game($data);
		$this->Game->create_Region($game_id, $region_1, $region_2);
		$this->Game->create_School($game_id, $school_1, $school_2);
		$this->Game->create_Teams($game_id, $team_1, $team_2);
		$this->db->trans_complete();

		redirect('admin/games');
	}

	public function store_custom()
	{
		$school_1 = $this->input->post("school_1");
		$school_2 = $this->input->post("school_2");
		$age = $this->input->post("age");
		$sport = $this->input->post("sport");
		$gender = $this->input->post("gender");
		$game_type = $this->input->post("game_type");
		$place = $this->input->post("place");
		$date = strtotime($this->input->post("date"));

		$observer = $this->input->post("observer");

		$region_1 = $this->Game->regionBySchool($school_1)->region_id;
		$region_2 = $this->Game->regionBySchool($school_2)->region_id;

		$data = array(
			'place' => $place,
			'time' => $date,
			'age_group_id' => $age,
			'observer_id' => $observer,
			'game_type_id' => $game_type,
			'sport_type' => $sport,
			'gender' => $gender,
		);

		$teams_1 = array(
			"age_id" => $age,
			"gender" => $gender,
			"sport_id" => $sport,
			"school_id" => $school_1,
			"name" => $this->input->post('name_s_1'),
		);

		$teams_2 = array(
			"age_id" => $age,
			"gender" => $gender,
			"sport_id" => $sport,
			"school_id" => $school_1,
			"name" => $this->input->post('name_s_2'),
		);

		$this->db->trans_start();
		$game_id = $this->Game->create_Game($data);
		$this->Game->create_Region($game_id, $region_1, $region_2);
		$this->Game->create_School($game_id, $school_1, $school_2);

		$this->db->insert('teams', $teams_1);
		$last_team_id_1 = $this->db->insert_id();
		foreach ($this->input->post("students_1") as $key) {
			$this->db->insert("students_team", array("team_id" => $last_team_id_1, 'student_id' => $key));
		}

		$this->db->insert('teams', $teams_2);
		$last_team_id_2 = $this->db->insert_id();
		foreach ($this->input->post("students_2") as $key) {
			$this->db->insert("students_team", array("team_id" => $last_team_id_2, 'student_id' => $key));
		}

		$this->Game->create_Teams($game_id, $last_team_id_1, $last_team_id_2);
		$this->db->trans_complete();

		redirect('admin/games');
	}


	public function change_status($id)
	{
		$this->Game->changeStatus($id);
		redirect("admin/games");
	}
}





