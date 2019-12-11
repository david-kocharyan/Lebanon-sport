<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Model
{
	private $table = 'teams';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		$this->db->select('schools.name_en as school, sport_types.name_en as sport, concat(age_group.from, "-", age_group.to) as age_group, teams.*');
		$this->db->join('schools', 'schools.id = teams.school_id');
		$this->db->join('age_group', 'age_group.id = teams.age_id');
		$this->db->join('sport_types', 'sport_types.id = teams.sport_id');
		return $this->db->get($this->table)->result();
	}

	public function select($id)
	{
		$this->db->select('schools.name_en as school_name, schools.id as school_id, sport_types.name_en as sport_name, sport_types.id as sport_id, concat(age_group.from, "-", age_group.to) as age_group, teams.*');
		$this->db->join('schools', 'schools.id = teams.school_id');
		$this->db->join('age_group', 'age_group.id = teams.age_id');
		$this->db->join('sport_types', 'sport_types.id = teams.sport_id');
		return $this->db->get_where($this->table, array('teams.id' => $id))->row();
	}

	public function selectTeam($id)
	{
		$this->db->select('students.*,students_team.status as student_status, students.id as student_id, students_team.team_id as team_id, 
		students_team.id as student_team_id');
		$this->db->join('students', 'students.id = students_team.student_id');

		$this->db->where("YEAR(CURDATE()) - YEAR(birthday) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(birthday), '-', DAY(birthday)) ,'%Y-%c-%e') > CURDATE(), 1, 0) >=", 6);
		$this->db->where("YEAR(CURDATE()) - YEAR(birthday) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(birthday), '-', DAY(birthday)) ,'%Y-%c-%e') > CURDATE(), 1, 0) <=", 18);

		return $this->db->get_where('students_team', array('team_id' => $id))->result();
	}

	public function selectAllByAdmin($id)
	{
		$this->db->select('schools.name_en as school, sport_types.name_en as sport, concat(age_group.from, "-", age_group.to) as age_group, teams.*');
		$this->db->join('schools', 'schools.id = teams.school_id');
		$this->db->join('age_group', 'age_group.id = teams.age_id');
		$this->db->join('sport_types', 'sport_types.id = teams.sport_id');
		return $this->db->get_where($this->table, array('schools.admin_id' => $id))->result();
	}

	public function changeStatus($id)
	{
		$data = $this->db->get_where($this->table, ["id" => $id])->row();
		if (null == $data) {
			return;
		}
		$status = $data->status == 1 ? 0 : 1;
		$this->db->update($this->table, array("status" => $status), ['id' => $id]);
	}

	public function update($data, $id)
	{
		$this->db->update($this->table, $data, array("id" => $id));
	}

	public function updateSport($data, $id)
	{
		$this->db->update("students_team", array("status" => 0), array("team_id" => $id));

		foreach ($data as $d) {
			$find_amenity = $this->db->get_where("students_team", array("student_id" => $d, "team_id" => $id))->row();
			if (null != $find_amenity) {
				$this->db->update("students_team", array("status" => 1), array("student_id" => $d, "team_id" => $id));
			} else {
				$this->db->insert("students_team", array("student_id" => $d, "team_id" => $id));
			}
		}
	}

}
