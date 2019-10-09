<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moderator extends CI_Model
{
	private $table = 'admins';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		return $this->db->get_where($this->table, array("role" => 1))->result();
	}

	public function select($id)
	{
		return $this->db->get_where($this->table, array('id' => $id))->row();
	}

	public function selectRegions()
	{
		$this->db->select("regions.name_en as reg_name_en, regions.name_ar as reg_name_ar, regions.id as reg_id, admins_region.*");
		$this->db->join("regions", "admins_region.region_id = regions.id");
		return $this->db->get_where("admins_region", array('regions.status' => 1, 'admins_region.status' => 1))->result();
	}

	public function changeStatus($id)
	{
		$data = $this->db->get_where($this->table, ["id" => $id])->row();
		if(null == $data) {
			return;
		}
		$status = $data->active == 1 ? 0 : 1;
		$this->db->update($this->table, array("active" => $status), ['id' => $id] );
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}


	public function update($data, $id)
	{
		$this->db->update($this->table, $data, array("id" => $id));
	}

	public function updateRegion($data, $id)
	{
		$this->db->update("admins_region", array("status" => 0), array("admin_id" => $id));

		foreach ($data as $d) {
			$find_amenity = $this->db->get_where("admins_region", array("region_id" => $d, "admin_id" => $id))->row();
			if (null != $find_amenity) {
				$this->db->update("admins_region", array("status" => 1), array("region_id" => $d, "admin_id" => $id));
			} else {
				$this->db->insert("admins_region", array("region_id" => $d, "admin_id" => $id));
			}
		}

	}

}
