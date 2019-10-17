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
		$this->db->select("games.id as id, place, time, active, school_1.name_en as school_1_name, school_2.name_en as school_2_name");
		$this->join($res);
		if ($this->input->get('action') !== null) $this->db->where(array("sport_type" => $this->input->get("action")));
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
		if ($this->input->get('action') !== null) $this->db->where(array("sport_type" => $this->input->get("action")));
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
		$this->db->join("game_schools", "games.id = game_schools.game_id");
		$this->db->join("schools as school_1", "school_1.id = game_schools.school_id_1");
		$this->db->join("schools as school_2", "school_2.id = game_schools.school_id_2");
	}

}
