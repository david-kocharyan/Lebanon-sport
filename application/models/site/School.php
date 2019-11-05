<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Model
{

	function __construct()
	{
		parent:: __construct();
	}

	public function select($id)
	{
		$this->db->select('schools.*');
		$this->db->join('schools', 'schools.id = teams.school_id');
		return $this->db->get_where('teams', array("teams.id" => $id))->row();
	}

	public function select_teams($id)
	{
		$this->db->select('teams.id as team_id, teams.*, sport_types.*, age_group.*');
		$this->db->join('sport_types', 'teams.sport_id = sport_types.id');
		$this->db->join('age_group', 'teams.age_id = age_group.id');

		return $this->db->get_where('teams', array("teams.school_id" => $id, 'teams.status' => 1))->result();
	}

	public function select_students($id)
	{
		$this->db->select('students.id, students.name_en, students.name_ar, students.birthday, students.gender,
		concat("plugins/images/student/", students.image) as image, teams.id as team_id');
		$this->db->join('students_team', 'teams.id = students_team.team_id');
		$this->db->join('students', 'students.id = students_team.student_id');

		return $this->db->get_where('teams', array("teams.school_id" => $id, 'teams.status' => 1))->result();
	}

	public function select_coaches($id)
	{
		return $this->db->get_where('coaches', array("school_id" => $id, 'status' => 1))->result();
	}

}
