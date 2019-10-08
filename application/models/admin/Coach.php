<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coach extends CI_Model
{
	private $table = 'coaches';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		$this->db->select('schools.name_en as school_name_en, schools.name_ar as school_name_ar, coaches.*');
		$this->db->join('schools', 'schools.id = coaches.school_id');
		return $this->db->get($this->table)->result();
	}

	public function select($id)
	{
		return $this->db->get_where($this->table, array('id' => $id))->row();
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
		if(null == $data) {
			return;
		}
		$status = $data->status == 1 ? 0 : 1;
		$this->db->update($this->table, array("status" => $status), ['id' => $id] );
	}

}
