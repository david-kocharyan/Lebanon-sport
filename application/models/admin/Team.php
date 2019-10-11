<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Model
{
	private $table = 'teams';

	function __construct()
	{
		parent:: __construct();
	}

	public function selectAll()
	{
		$this->db->select('schools.name_en as school, sport_types.name_en as sport, teams.*');
		$this->db->join('schools', 'schools.id = teams.school_id');
		$this->db->join('sport_types', 'sport_types.id = teams.sport_id');
		return $this->db->get($this->table)->result();
	}
}
