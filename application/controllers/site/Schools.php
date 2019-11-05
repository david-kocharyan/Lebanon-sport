<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('layouts_site');
		$this->load->model('site/School');

		if (stristr($_SERVER['REQUEST_URI'], '/ar/')) {
			$this->lang->load("ar", "arabic");
			$this->session->set_userdata("lang", 'ar');
		} else {
			$this->lang->load("en", "english");
			$this->session->set_userdata("lang", 'en');
		}
	}

	public function schools($id)
	{
		$data['title'] = 'School';
		$data['school'] = $this->School->select($id);
		$data['all_teams'] = $this->School->select_teams($data['school']->id);
		$data['students'] = $this->School->select_students($data['school']->id);
		$data['coaches'] = $this->School->select_coaches($data['school']->id);
		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/schools.php');
	}
}
