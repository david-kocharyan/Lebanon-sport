<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homes extends CI_Model
{
	private $table = 'blog';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectBlog()
	{
		$this->db->select('blog.id as blog_id, blog.*, blog_images.*');
		$this->db->join('blog_images', 'blog_id = blog.id');
		$this->db->group_by('blog.id');
		$this->db->order_by('blog.id DESC');
		$this->db->limit(7);
		return $this->db->get_where('blog', array('blog.status' => 1))->result();
	}

	public function selectUpcoming()
	{
		$this->db->select('games.id as id, games.place as place, FROM_UNIXTIME(games.time, "%D %M %Y %h:%i") as time, 
		 games.status as status, 
		 schools_1.name_en as schools_1_name_en, schools_1.name_ar as schools_1_name_ar,
		 schools_2.name_en as schools_2_name_en, schools_2.name_ar as schools_2_name_ar,
		 teams_1.name as teams_1_name, teams_2.name as teams_2_name ');

		$this->join();

		$this->db->where("DAYOFYEAR(FROM_UNIXTIME(time)) BETWEEN DAYOFYEAR(NOW()) + 1 AND DAYOFYEAR(NOW()) + 31");
		$this->db->where(array('games.status' => 1, 'active' => 1));
		return $this->db->get('games')->result();
	}

	public function select_game($id)
	{
		$this->db->select('games.id as id, games.place as place, FROM_UNIXTIME(games.time, "%D %M %Y %h:%i") as time, 
		 games.status as status, schools_1.name_en as schools_1_name_en, schools_1.name_ar as schools_1_name_ar,
		 schools_2.name_en as schools_2_name_en, schools_2.name_ar as schools_2_name_ar,
		 teams_1.name as teams_1_name, teams_2.name as teams_2_name, 
		 reg_1.name_en as reg_1_en, reg_1.name_ar as reg_1_ar,
		 reg_2.name_en as reg_2_en, reg_2.name_ar as reg_2_ar');

		$this->join();


		$this->db->where("sport_type", $id);
		$this->db->where(array('games.for_site' => 1, 'games.status' => 1, 'active' => 0));
		return $this->db->get('games')->result();
	}

	private function join()
	{
		$this->db->join('game_schools', 'game_schools.game_id = games.id');
		$this->db->join('schools as schools_1', 'schools_1.id = game_schools.school_id_1');
		$this->db->join('schools as schools_2', 'schools_2.id = game_schools.school_id_2');

		$this->db->join('regions as reg_1', 'reg_1.id = schools_1.region_id');
		$this->db->join('regions as reg_2', 'reg_2.id = schools_2.region_id');

		$this->db->join('game_teams', 'game_teams.game_id = games.id');
		$this->db->join('teams as teams_1', 'teams_1.id = game_teams.team_1');
		$this->db->join('teams as teams_2', 'teams_2.id = game_teams.team_2');
	}

	public function first()
	{
		return $this->db->get("main_banner")->row();
	}

	public function get_ended_game($id)
	{
		$this->db->select('end_game.game_id as id, score_1, score_2,
		referees.name_en as ref_name_en, referees.name_ar as ref_name_ar, concat("plugins/images/referee/", referees.image) as ref_image, 
		users.name_en as observer_en, users.name_ar as observer_ar, concat("plugins/images/users/", users.image) as observer_image,
		teams_1.name as team_1_name, teams_2.name as team_2_name,
		teams_1.id as team_1_id, teams_2.id as team_2_id,');

		$this->db->join('referees', 'end_game.referee_id = referees.id');
		$this->db->join('games', 'end_game.game_id = games.id');
		$this->db->join('users', 'games.observer_id = users.id');

		$this->db->join('teams as teams_1', 'teams_1.id = end_game.team_1_id');
		$this->db->join('teams as teams_2', 'teams_2.id = end_game.team_2_id');

		$this->db->where("end_game.game_id", $id);
		return $this->db->get('end_game')->row();
	}

	public function get_ended_game_teams($id, $game_id)
	{
		$this->db->select("students.id as id, students.name_en as name_en, students.name_ar as name_ar, birthday, gender,
		concat('plugins/images/student/', students.image) as image, FROM_UNIXTIME(birthday, '%M %D %Y') as birthday, students.school_id");
		$this->db->join("students", "students.id = end_game_teams.student_id");
		return $this->db->get_where("end_game_teams", array("team_id" => $id, "game_id" => $game_id))->result();
	}

	public function upcoming_game($id)
	{
		$this->db->select('games.id as id,
		users.name_en as observer_en, users.name_ar as observer_ar,
		teams_1.name as team_1_name, teams_2.name as team_2_name,
		teams_1.id as team_1_id, teams_2.id as team_2_id,');

		$this->db->join('users', 'games.observer_id = users.id');

		$this->db->join('game_teams', 'games.id = game_teams.game_id');
		$this->db->join('teams as teams_1', 'teams_1.id = game_teams.team_1');
		$this->db->join('teams as teams_2', 'teams_2.id = game_teams.team_2');

		$this->db->where("games.id", $id);
		return $this->db->get('games')->row();
	}

	public function upcoming_teams($id)
	{
		$this->db->select("students.id as student_id, students.name_en as name_en, students.name_ar as name_ar, birthday, gender,
		concat('plugins/images/student/', students.image) as image, FROM_UNIXTIME(birthday, '%M %D %Y') as birthday");

		$this->db->join('students', 'students.id = students_team.student_id');

		return $this->db->get_where("students_team", array("team_id" => $id))->result();
	}

	public function get_ended_game_best($id)
	{
		$this->db->select("students.id as id, students.name_en as name_en, students.name_ar as name_ar, birthday, gender,
		concat('plugins/images/student/', students.image) as image, FROM_UNIXTIME(birthday, '%M %D %Y') as birthday, students.school_id");
		$this->db->join("students", "students.id = end_game_best_players.student_id");
		return $this->db->get_where("end_game_best_players", array("game_id" => $id))->result();
	}

}
