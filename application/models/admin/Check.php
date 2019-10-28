<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Model
{
	private $table = 'games';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		$this->select_join();
		$this->db->group_by('games.id');
		$this->db->where('games.for_site', 0);
		$this->db->where('games.active', 0);
		return $this->db->get($this->table)->result();
	}

	public function selectAllByAdmin($id)
	{
		$this->select_join();

		$this->db->join('admins as ad_1', 'ad_1.id = schools_1.admin_id');
		$this->db->join('admins as ad_2', 'ad_2.id = schools_2.admin_id');
		$this->db->where('schools_1.admin_id', $id);
		$this->db->or_where('schools_2.admin_id', $id);
		$this->db->where('games.for_site', 0);
		$this->db->where('games.active', 0);

		$this->db->group_by('games.id');
		return $this->db->get($this->table)->result();
	}

	private function select_join()
	{
		$this->db->select('games.id as id, games.place as place, games.gender as gender, games.time as time, 
		 games.status as status, concat(age_group.from, "-", age_group.to) as age,
		 users.username as observer_username, users.name_en as observer_name, 
		 game_types.type as game_type, sport_types.name_en as sport_name,	 
		 schools_1.name_en as schools_1_name, schools_2.name_en as schools_2_name, 
		 regions_1.name_en as regions_1_name, regions_2.name_en as regions_2_name,
		 teams_1.name as teams_1_name, teams_2.name as teams_2_name, for_site,
		 ');

		$this->db->join('game_schools', 'game_schools.game_id = games.id');
		$this->db->join('schools as schools_1', 'schools_1.id = game_schools.school_id_1');
		$this->db->join('schools as schools_2', 'schools_2.id = game_schools.school_id_2');

		$this->db->join('game_regions', 'game_regions.game_id = games.id');
		$this->db->join('regions as regions_1', 'regions_1.id = game_regions.region_id_1');
		$this->db->join('regions as regions_2', 'regions_2.id = game_regions.region_id_2');

		$this->db->join('game_teams', 'game_teams.game_id = games.id');
		$this->db->join('teams as teams_1', 'teams_1.id = game_teams.team_1');
		$this->db->join('teams as teams_2', 'teams_2.id = game_teams.team_2');

		$this->db->join('age_group', 'age_group.id = games.age_group_id');
		$this->db->join('users', 'users.id = games.observer_id');
		$this->db->join('game_types', 'game_types.id = games.game_type_id');
		$this->db->join('sport_types', 'sport_types.id = games.sport_type');
	}

//	show current game
	public function selectById($id)
	{
		$this->select_join();
		$this->db->where('games.id', $id);
		$this->db->group_by('games.id');
		return $this->db->get($this->table)->row();
	}

	public function selectImage($id)
	{
		return $this->db->get_where('end_game_image', array('game_id' => $id))->result();
	}

	public function selectMedia($id)
	{
		return $this->db->get_where('end_game_media', array('game_id' => $id))->result();
	}
}
