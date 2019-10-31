<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Observers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('layouts_site');

		if (stristr($_SERVER['REQUEST_URI'], '/ar/')){
			$this->lang->load("ar", "arabic");
			$this->session->set_userdata("lang", 'ar');
		}else{
			$this->lang->load("en", "english");
			$this->session->set_userdata("lang", 'en');
		}
	}

	public function index()
	{
		$data['title'] = 'Observers';

		$this->db->select('users.*, regions.name_en as reg_name_en, regions.name_ar as reg_name_ar');
		$this->db->join('regions', 'regions.id = users.region_id');
		$data['referees'] = $this->db->get('users')->result();
		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/observers.php');
	}
}
