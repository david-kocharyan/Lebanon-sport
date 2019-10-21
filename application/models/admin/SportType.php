<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SportType extends CI_Model
{
	private $table = 'sport_types';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function selectpoints()
	{
		return $this->db->get_where('sport_points', array('status' => 1))->result();
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

	public function updatePoints($data, $id)
	{
		$this->db->update("sport_points", array("status" => 0), array("sport_type_id" => $id));

		foreach ($data as $d) {
			$find_amenity = $this->db->get_where("sport_points", array("value" => $d, "sport_type_id" => $id))->row();
			if (null != $find_amenity) {
				$this->db->update("sport_points", array("status" => 1),
					array("value" => $d, "sport_type_id" => $id));
			} else {
				$this->db->insert("sport_points", array("value" => $d, "sport_type_id" => $id));
			}
		}

	}

}
