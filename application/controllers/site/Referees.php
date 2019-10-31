<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Referees extends CI_Controller
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
		$data['title'] = 'Referees';

		$this->db->limit(6);
		$data['referees'] = $this->db->get('referees')->result();
		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/referees.php');
	}
}
