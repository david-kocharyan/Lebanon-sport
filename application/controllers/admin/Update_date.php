<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_date extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}

	}

	public function index()
	{
		$this->db->select("teams.id as t_id, age_group.from,age_group.to, teams.age_id, students.id as student_id, (YEAR(CURDATE()) - YEAR(birthday) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(birthday), '-', DAY(birthday)) ,'%Y-%c-%e') > CURDATE(), 1, 0)) as bday");
		$this->db->join('students_team', 'students_team.student_id = students.id');
		$this->db->join('teams', 'students_team.team_id = teams.id');
		$this->db->join('age_group', 'age_group.id = teams.age_id');

		$students = $this->db->get_where('students', array("students.status" => 1))->result();

		foreach ($students as $key => $val) {
			if ($val->bday > 18) {
				$this->db->update('teams', array("status" => 0), array("status" => 1, "id" => $val->t_id));
				$this->db->update('students', array("status" => 0), array("status" => 1, "id" => $val->student_id));
			}
			elseif ($val->bday > $val->to) {
				$this->db->where("from >= $val->bday");
				$this->db->where("to <= $val->bday");
				$s = $this->db->get_where('age_group', array("status" => 1))->row();

				if ($s != null) {
					$this->db->update('teams', array("age_id" => $s->id), array("status" => 1, "id" => $val->t_id));
				}
			}
		}
		redirect('/admin/profile');
	}
}
