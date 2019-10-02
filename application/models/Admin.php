<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
	private $table = 'admins';

	function __construct()
	{
		parent:: __construct();
	}

//	check user authenticate
	public function authenticate($username, $password)
	{
		$getUser = $this->db->get_where('admins',["username"=>$username])->row();
		if (!$getUser) return false;
		if (!$getUser->active) return false;

		$password_hash = hash("SHA512", $password);
		if ($password_hash == $getUser->password) return $getUser;
		return false;
	}

//	select all from admins table
	public function selectAll()
	{
		$this->db->select("admins.*, restaurants.name as restaurant_name");
		$this->db->join("restaurants", "restaurants.id = admins.restaurant_id", "left");
		return $this->db->get_where($this->table, array('restaurants.status' => 1 ))->result();
	}

//	create new restaurant
	public function create($user)
	{
		$this->db->insert($this->table, $user);
	}

//	update
	public function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

//	change status
	public function changeStatus($id)
	{
		$data = $this->db->get_where($this->table, ["id" => $id])->row();
		if(null == $data) {
			return;
		}
		$status = $data->active == 1 ? 0 : 1;
		$this->db->update($this->table, array("active" => $status), ['id' => $id] );
	}

//	get clients by id for edit
	public function getClientById($id)
	{
		$getClient = $this->db->get_where('admins',["id"=>$id])->row();
		if (!$getClient) return false;
		return $getClient;
	}
}
