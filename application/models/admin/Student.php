<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Model
{
	private $table = 'students';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function selectAllByAdmin($id)
	{
		$this->db->select('schools.name_en as school_name_en,  students.*');
		$this->db->join('schools', 'schools.id = students.school_id');
		$this->db->join('admins', 'admins.id = schools.admin_id');
		return $this->db->get_where($this->table, array('admin_id' => $id))->result();
	}

	public function select($id)
	{
		return $this->db->get_where($this->table, array('id' => $id))->row();
	}

	public function selectSports()
	{
		$this->db->select("name_en, sport_types.id as id , students_sport.student_id as student_id");
		$this->db->join("sport_types", "students_sport.sport_id =  sport_types.id");
		return $this->db->get_where('students_sport', array('sport_types.status' => 1, 'students_sport.status' => 1 ))->result();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{
		$this->db->update($this->table, $data, array("id" => $id));
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


	public function updateSport($data, $id)
	{
		$this->db->update("students_sport", array("status" => 0), array("student_id" => $id));

		foreach ($data as $d) {
			$find_amenity = $this->db->get_where("students_sport", array("sport_id" => $d, "student_id" => $id))->row();
			if (null != $find_amenity) {
				$this->db->update("students_sport", array("status" => 1), array("sport_id" => $d, "student_id" => $id));
			} else {
				$this->db->insert("students_sport", array("sport_id" => $d, "student_id" => $id));
			}
		}

	}
}
