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
	public function authenticate($username, $password)
	{
		$getUser = $this->db->get_where('admins',["username"=>$username])->row();
		if (!$getUser) return false;
		if (!$getUser->active) return false;

		if (password_verify($password, $getUser->password)) return $getUser;
		return false;
	}

}
