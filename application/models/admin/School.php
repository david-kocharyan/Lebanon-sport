<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Model
{
	private $table = 'schools';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
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

	public function get_admin()
	{
		$this->db->select('admins.id as id, admins.*');
		$this->db->join('regions', 'regions.id = admins.region_id');
		return $this->db->get_where('admins', array('active' => 1, 'regions.status' => 1))->result();
	}

}
