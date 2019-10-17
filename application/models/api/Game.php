<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function get_sport_type()
	{
		$this->db->select("name_en as name, concat('plugins/images/sport/', image) as image");
		return $this->db->get_where('sport_types', array("status" => 1))->result();
	}
}
