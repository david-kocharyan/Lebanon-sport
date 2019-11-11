<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainBannerModel extends CI_Model
{
	private $table = 'main_banner';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function first()
	{
		return $this->db->get($this->table)->row();
	}

	public function selectById($id)
	{
		return $this->db->get_where($this->table, array('id' => $id))->row();
	}

	public function update($data, $id)
	{
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update($this->table);
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
