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
		$this->db->select('regions.name_en as reg_name_en, regions.name_ar as reg_name_ar, schools.*');
		$this->db->join('regions', 'regions.id = schools.region_id');
		return $this->db->get($this->table)->result();
	}

	public function selectAllByAdmin($id)
	{
		$this->db->select('regions.name_en as reg_name_en, regions.name_ar as reg_name_ar, schools.*');
		$this->db->join('regions', 'regions.id = schools.region_id');
		$this->db->join('admins_region', 'regions.id = admins_region.region_id');
		return $this->db->get_where($this->table, array('admins_region.admin_id' => $id))->result();
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
		if (null == $data) {
			return;
		}
		$status = $data->status == 1 ? 0 : 1;
		$this->db->update($this->table, array("status" => $status), ['id' => $id]);
	}

	public function get_admin()
	{
		return $this->db->get_where('admins', array('active' => 1))->result();
	}

	public function get_admins_region($id)
	{
		$this->db->select('admins_region.admin_id as id,
		 admins_region.region_id as reg_id,
		  regions.*');
		$this->db->join('regions', 'admins_region.region_id = regions.id');
		return $this->db->get_where('admins_region', array('admins_region.status' => 1, 'regions.status' => 1, "admins_region.admin_id" => $id))->result();
	}

}
