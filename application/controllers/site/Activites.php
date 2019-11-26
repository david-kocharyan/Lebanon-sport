<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activites extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('layouts_site');
		$this->load->model('site/Homes');

		if (stristr($_SERVER['REQUEST_URI'], '/ar/')) {
			$this->lang->load("ar", "arabic");
			$this->session->set_userdata("lang", 'ar');
		} else {
			$this->lang->load("en", "english");
			$this->session->set_userdata("lang", 'en');
		}
	}

	public function get_game($id)
	{
		$type = $this->input->get('type');
		$age = $this->input->get('age');
		$regions = $this->input->get('regions');
		$date = $this->input->get('date');
		$gender = $this->input->get('gender');

		if (empty($_GET) OR $_GET == NULL) {
			$data['game'] = $this->Homes->select_game($id);
		} else {
			$this->select();
			if ($gender != NULL) {
				$this->db->where("games.gender", $gender);
			}
			if ($date != NULL) {
				$date = strtotime($date);
				$this->db->where("FROM_UNIXTIME(games.time, '%D %M %Y') = FROM_UNIXTIME($date, '%D %M %Y')");
			}
			$this->db->where("sport_type", $id);
			$this->db->where('games.for_site', 1);

			if ($type != NULL) {
				$this->search_type($type);
			}
			if ($age != NULL) {
				$this->search_age($age);
			}
			if ($regions != NULL) {
				$this->search_regions($regions);
			}
			$data['game'] = $this->db->get('games')->result();
		}

		$data['type'] = $this->db->get_where('game_types', array('status' => 1))->result();
		$data['age'] = $this->db->get_where('age_group', array('status' => 1))->result();
		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['lang'] = $this->session->userdata("lang");
		$data['title'] = 'Activites';
		$data['sport'] = $this->db->get_where('sport_types', array("id" => $id, 'status' => 1))->row();
		layouts_site($data, 'site/activites.php');
	}

	public function game($id)
	{
		$data['title'] = 'Game';
		$data['game'] = $this->Homes->get_ended_game($id);
		if (($data['game']) != NULL) {
			$data['team_1'] = $this->Homes->get_ended_game_teams($data['game']->team_1_id, $id);
			$data['team_2'] = $this->Homes->get_ended_game_teams($data['game']->team_2_id, $id);
			$data['best'] = $this->Homes->get_ended_game_best($id);
		}
		$data['image'] = $this->db->get_where('end_game_image', array('game_id' => $id))->result();
		$data['media'] = $this->db->get_where('end_game_media', array('game_id' => $id))->result();

		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/game.php');
	}


	private function select()
	{
		$this->db->select('games.id as id, games.place as place, FROM_UNIXTIME(games.time, "%D %M %Y %h:%i") as time, 
		 games.status as status, schools_1.name_en as schools_1_name_en, schools_1.name_ar as schools_1_name_ar,
		 schools_2.name_en as schools_2_name_en, schools_2.name_ar as schools_2_name_ar,
		 teams_1.name as teams_1_name, teams_2.name as teams_2_name');

		$this->db->join('game_schools', 'game_schools.game_id = games.id');
		$this->db->join('schools as schools_1', 'schools_1.id = game_schools.school_id_1');
		$this->db->join('schools as schools_2', 'schools_2.id = game_schools.school_id_2');

		$this->db->join('game_teams', 'game_teams.game_id = games.id');
		$this->db->join('teams as teams_1', 'teams_1.id = game_teams.team_1');
		$this->db->join('teams as teams_2', 'teams_2.id = game_teams.team_2');
	}

//	search part/////////////////////////////////////////////////////////////////////////////////////////////////////////
	private function search_type($type)
	{
		$len = count($type);
		if ($len != 1) {
			foreach ($type as $key => $value) {
				if ($key == 0) {
					$this->db->where("( games.game_type_id =", $value);
				} elseif ($key == $len - 1) {
					$this->db->or_where("games.game_type_id = $value )");
				} else {
					$this->db->or_where("games.game_type_id =", $value);
				}
			}
		} else {
			$this->db->where("games.game_type_id =", $type[0]);
		}
	}

	private function search_age($age)
	{
		$len = count($age);
		if ($len != 1) {
			foreach ($age as $key => $value) {
				if ($key == 0) {
					$this->db->where("( games.age_group_id =", $value);
				} elseif ($key == $len - 1) {
					$this->db->or_where("games.age_group_id = $value )");
				} else {
					$this->db->or_where("games.age_group_id =", $value);
				}
			}
		} else {
			$this->db->where("games.age_group_id =", $age[0]);
		}
	}

	private function search_regions($regions)
	{
		$len = count($regions);
		if ($len != 1) {
			foreach ($regions as $key => $value) {
				if ($key == 0) {
					$this->db->where("( schools_1.region_id = $value OR schools_2.region_id = $value");
				} elseif ($key == $len - 1) {
					$this->db->or_where("schools_1.region_id = $value OR schools_2.region_id = $value )");
				} else {
					$this->db->or_where("schools_1.region_id = $value OR schools_2.region_id = $value");
				}
			}
		} else {
			$this->db->where("schools_1.region_id = $regions[0] OR schools_2.region_id = $regions[0]");
		}
	}
}
