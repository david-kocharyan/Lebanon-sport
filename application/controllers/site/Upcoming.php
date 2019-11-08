<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upcoming extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('layouts_site');
		$this->load->model('site/Homes');

		if (stristr($_SERVER['REQUEST_URI'], '/ar/')){
			$this->lang->load("ar", "arabic");
			$this->session->set_userdata("lang", 'ar');
		}else{
			$this->lang->load("en", "english");
			$this->session->set_userdata("lang", 'en');
		}
	}

	public function upcoming($id)
	{
		$data['title'] = 'Upcoming';
		$data['lang'] = $this->session->userdata("lang");
		$data['game'] = $this->Homes->upcoming_game($id);
		if(($data['game']) != NULL){
			$data['team_1'] =$this->Homes->upcoming_teams($data['game']->team_1_id);
			$data['team_2'] = $this->Homes->upcoming_teams($data['game']->team_2_id);
		}
		layouts_site($data, 'site/upcoming.php');
	}

	public function all_upcoming_games()
	{
		$data['title'] = 'All News';

		$limit = (null !== $this->input->get('limit') && is_numeric($this->input->get("limit"))) ? intval($this->input->get('limit')) : 9;
		$offset = (null !== $this->input->get('page') && is_numeric($this->input->get("page"))) ? ($this->input->get('page')-1) * $limit : 0;

		$data['page'] = ($limit !== 0 || null !== $limit) ? ceil($this->get_pages()->page / $limit) : 0;
		$data['upcoming'] = $this->select_up_game();

		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/all/upcoming.php');
	}

	private function select_up_game()
	{
		$this->db->select('games.id as id, games.place as place, FROM_UNIXTIME(games.time, "%D %M %Y %h:%i") as time, 
		 games.status as status, 
		 schools_1.name_en as schools_1_name_en, schools_1.name_ar as schools_1_name_ar,
		 schools_2.name_en as schools_2_name_en, schools_2.name_ar as schools_2_name_ar,
		 teams_1.name as teams_1_name, teams_2.name as teams_2_name ');

		$this->join();

		$this->db->where("DAYOFYEAR(FROM_UNIXTIME(time)) BETWEEN DAYOFYEAR(NOW()) + 1 AND DAYOFYEAR(NOW()) + 31");
		$this->db->where(array('games.status' => 1, 'active' => 1));
		$this->limits();
		return $this->db->get('games')->result();
	}

	private function join()
	{
		$this->db->join('game_schools', 'game_schools.game_id = games.id');
		$this->db->join('schools as schools_1', 'schools_1.id = game_schools.school_id_1');
		$this->db->join('schools as schools_2', 'schools_2.id = game_schools.school_id_2');

		$this->db->join('game_teams', 'game_teams.game_id = games.id');
		$this->db->join('teams as teams_1', 'teams_1.id = game_teams.team_1');
		$this->db->join('teams as teams_2', 'teams_2.id = game_teams.team_2');
	}

	private function get_pages()
	{
		$this->db->select('count(id) as page');
		$this->db->where("DAYOFYEAR(FROM_UNIXTIME(time)) BETWEEN DAYOFYEAR(NOW()) + 1 AND DAYOFYEAR(NOW()) + 31");
		$this->db->where('status', 1);
		$this->db->where('active', 1);
		$this->db->where('for_site', 0);
		return $this->db->get('games')->row();
	}

	private function limits()
	{
		$limit = (null !== $this->input->get('limit') && is_numeric($this->input->get("limit"))) ? $this->input->get('limit') : 9;
		$offset = (null !== $this->input->get('page') && is_numeric($this->input->get("page"))) ? ($this->input->get('page')-1) * $limit : 0;
		$this->db->limit($limit, $offset);
	}

}
