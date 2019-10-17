<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Model
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
		return $this->db->get($this->table)->result();
	}

	public function selectAllByAdmin($id)
	{
		$this->select_join();

		$this->db->join('admins as ad_1', 'ad_1.id = schools_1.admin_id');
		$this->db->join('admins as ad_2', 'ad_2.id = schools_2.admin_id');
		$this->db->where('schools_1.admin_id',  $id);
		$this->db->or_where('schools_2.admin_id', $id);

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
		 teams_1.name as teams_1_name, teams_2.name as teams_2_name
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

	public function changeStatus($id)
	{
		$data = $this->db->get_where($this->table, ["id" => $id])->row();
		if(null == $data) {
			return;
		}
		$status = $data->status == 1 ? 0 : 1;
		$this->db->update($this->table, array("status" => $status), ['id' => $id] );
	}

	public function regionBySchool($id)
	{
		return $this->db->get_where('schools', array("id" => $id, "status" => 1))->row();
	}

	public function create_Game($data)
	{
		$this->db->insert('games', $data);
		return $this->db->insert_id();
	}

	public function create_School($game_id, $id_1, $id_2)
	{
		return $this->db->insert('game_schools', array("game_id" => $game_id, "school_id_1" => $id_1, "school_id_2" => $id_2));
	}

	public function create_Region($game_id, $id_1, $id_2)
	{
		return $this->db->insert('game_regions', array("game_id" => $game_id, "region_id_1" => $id_1, "region_id_2" => $id_2));
	}

	public function create_Teams($game_id, $id_1, $id_2)
	{
		return $this->db->insert('game_teams', array("game_id" => $game_id, "team_1" => $id_1, "team_2" => $id_2));
	}

}
