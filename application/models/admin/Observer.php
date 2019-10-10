<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Observer extends CI_Model
{
	private $table = 'users';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		$this->db->select("regions.name_en as region_name_en, regions.name_ar as region_name_ar, users.*");
		$this->db->join('regions' ,"regions.id = users.region_id");
		return $this->db->get($this->table)->result();
	}

	public function selectAllByAdmin($id)
	{
		$this->db->select('regions.name_en as region_name_en, regions.name_ar as region_name_ar, users.*');
		$this->db->join('regions', 'regions.id = users.region_id');
		$this->db->join('admins_region', 'admins_region.region_id = regions.id');
		return $this->db->get_where($this->table, array('admins_region.admin_id' => $id))->result();
	}

	public function selectSports()
	{
		$this->db->select("sport_types.name_en as name, sport_types.id as id, users_sport.user_id ");
		$this->db->join("sport_types", "users_sport.sport_id = sport_types.id");
		return $this->db->get_where('users_sport', array('sport_types.status' => 1, 'users_sport.status' => 1 ))->result();
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

	public function updateSport($data, $id)
	{
		$this->db->update("users_sport", array("status" => 0), array("user_id" => $id));

		foreach ($data as $d) {
			$find_amenity = $this->db->get_where("users_sport", array("sport_id" => $d, "user_id" => $id))->row();
			if (null != $find_amenity) {
				$this->db->update("users_sport", array("status" => 1), array("sport_id" => $d, "user_id" => $id));
			} else {
				$this->db->insert("users_sport", array("sport_id" => $d, "user_id" => $id));
			}
		}

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
