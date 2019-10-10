<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
	private $table = 'users';

	function __construct()
	{
		parent:: __construct();
	}

//	check user authenticate
	public function login($username, $password)
	{
		$this->db->select("regions.name_en as region_name, users.*");
		$this->db->join('regions', 'regions.id = users.region_id');
		$getUser = $this->db->get_where($this->table ,["username"=>$username])->row();
		if (!$getUser) return false;
		if (!$getUser->status) return false;

		if (password_verify($password, $getUser->password)) return $getUser;
		return false;
	}

	public function getUser($id)
	{
		$this->db->select("regions.name_en as region_name, users.*");
		$this->db->join('regions', 'regions.id = users.region_id');
		return $this->db->get_where('users' ,["users.id" => $id])->row();
	}

	public function check_email($email)
	{
		return $this->db->get_where('users' ,["email" => $email])->row();
	}

	public function change_pass($email, $password)
	{
		$this->db->set('password', password_hash($password, PASSWORD_BCRYPT));
		$this->db->where('email', $email);
		$this->db->update('users');
	}

}
