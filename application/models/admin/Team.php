<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Model
{
	private $table = 'students';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		return $this->db->get($this->table)->result();
	}
}
