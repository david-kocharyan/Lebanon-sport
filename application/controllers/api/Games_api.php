<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');


class Games_api extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index_get()
	{
		$res = $this->verify_get_request();
		if (gettype($res) != 'string') {
			$data = array(
				"success" => false,
				"data" => array(),
				"msg" => $res['msg']
			);
			$this->response($data, $res['status']);
			return;
		}

		$limit = (null !== $this->input->get('limit') && is_numeric($this->input->get("limit"))) ? intval($this->input->get('limit')) : 10;
		$offset = (null !== $this->input->get('offset') && is_numeric($this->input->get("offset"))) ? $this->input->get('offset') * $limit : 0;

		$data = $this->get_games($res);
		$pages = ($limit !== 0 || null !== $limit) ? ceil($this->get_pages($res)->pages / $limit) : 0;

		$response = array(
			"success" => true,
			"data" => array(
				"sport" => $data,
				"meta" => array(
					"limit" => $limit,
					"offset" => $offset,
					"pages" => $pages,
				),
			),
			"msg" => "",
		);
		$this->response($response, REST_Controller::HTTP_OK);
	}


	private function get_games($res)
	{
		$this->db->select("games.id as id, place, time, active, team_1.name as team_1_name, team_2.name as team_2_name");
		$this->join($res);
		if ($this->input->get('id') !== null) $this->db->where(array("sport_type" => $this->input->get("id")));
		$this->db->where(array("observer_id" => $res, "games.status" => 1));
		$this->db->group_by("games.id");
		$this->db->order_by("games.id DESC");
		$this->limits();
		$data = $this->db->get("games")->result();
		return $data != null ? $data : array();
	}

	private function get_pages($res)
	{
		$this->db->select("count(games.id) as page");
		if ($this->input->get('id') !== null) $this->db->where(array("sport_type" => $this->input->get("id")));
		$this->db->where(array("observer_id" => $res, "status" => 1));
		$this->db->group_by("games.id");
		$subquery = $this->db->get_compiled_select("games");
		$data = $this->db->query("SELECT COUNT(page) as pages FROM ($subquery) page")->row();
		return $data != null ? $data : 0;
	}

	private function limits()
	{
		$limit = (null !== $this->input->get('limit') && is_numeric($this->input->get("limit"))) ? $this->input->get('limit') : 10;
		$offset = (null !== $this->input->get('offset') && is_numeric($this->input->get("offset"))) ? $this->input->get('offset') * $limit : 0;
		$this->db->limit($limit, $offset);
	}

	private function join()
	{
		$this->db->join("game_teams", "games.id = game_teams.game_id");
		$this->db->join("teams as team_1", "team_1.id = game_teams.team_1");
		$this->db->join("teams as team_2", "team_2.id = game_teams.team_2");
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function team_students_get()
	{
		$res = $this->verify_get_request();
		if (gettype($res) != 'string') {
			$data = array(
				"success" => false,
				"data" => array(),
				"msg" => $res['msg']
			);
			$this->response($data, $res['status']);
			return;
		}

		$game_id = $this->input->get('id');
		if (null == $game_id) {
			$response = array(
				"success" => false,
				"data" => array(),
				"msg" => "Provide Game"
			);
			$this->response($response, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
			return;
		}

		$game_t = $this->db->get_where("game_teams", array("game_id" => $game_id))->row();

		$team_1 = $this->game_team($game_t->team_1);
		$team_2 = $this->game_team($game_t->team_2);

		$team_1_students = $this->game_team_students($game_t->team_2);
		$team_2_students = $this->game_team_students($game_t->team_2);

		$response = array(
			"success" => true,
			"data" => array(
				"team_1" => array(
					"id" => $team_1->id ,
					"name" => $team_1->name,
					"students" => $team_1_students
				),
				"team_2" => array(
					"id" => $team_2->id,
					"name" => $team_2->name,
					"students" => $team_2_students
				),
			),
			"msg" => "",
		);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	private function game_team($id)
	{
		$this->db->select("id, name");
		$data = $this->db->get_where("teams", array("id" => $id))->row();
		return $data != null ? $data : array();
	}

	private function game_team_students($id)
	{
		$this->db->select("students.id as id, name_en as name");

		$this->db->join("students", "students.id = students_team.student_id");
		$data = $this->db->get_where("students_team", array("team_id" => $id))->result();
		return $data != null ? $data : array();
	}

}