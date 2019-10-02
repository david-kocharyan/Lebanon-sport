<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{

	private $table = 'users';

	function __construct()
	{
		parent:: __construct();
	}

//	register
	public function register($data)
	{
		$this->db->insert($this->table, $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

//	check username for unique
	public function check_unique($username, $mobile_number, $email)
	{
		$checkUsername = $this->db->get_where($this->table, ["username" => $username])->row();
		$checkMobile = $this->db->get_where($this->table, ["mobile_number" =>  $mobile_number])->row();
		$checkEmail = $this->db->get_where($this->table, ["email" => $email])->row();

		if ($checkUsername != NULL) {
			return 'username';
		}
		elseif ($checkMobile != NULL){
			return 'mobile number';
		}
		elseif ($checkEmail != NULL){
			return "email";
		}
		return 2;
	}

//	selectAll data from users table
	public function selectAll()
	{
		return $this->db->get($this->table)->result();
	}

//	login
	public function login($username, $password)
	{
		$getUser = $this->db->get_where($this->table, ["username" => $username])->row();
		if (!$getUser) return false;

		$password = hash("SHA512", $password);
		if ($password == $getUser->password) return $getUser;
		return false;
	}

}
