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
		$getUser = $this->db->get_where($this->table ,["username"=>$username])->row();
		if (!$getUser) return false;
		if (!$getUser->status) return false;

		if (password_verify($password, $getUser->password)) return $getUser;
		return false;
	}

}
