<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upcoming extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('layouts_site');
		$this->load->model('site/Homes');

		if (stristr($_SERVER['REQUEST_URI'], '/ar/')){
			$this->lang->load("ar", "arabic");
			$this->session->set_userdata("lang", 'ar');
		}else{
			$this->lang->load("en", "english");
			$this->session->set_userdata("lang", 'en');
		}
	}

	public function upcoming($id)
	{
		$data['title'] = 'Upcoming';
		$data['lang'] = $this->session->userdata("lang");
		$data['game'] = $this->Homes->upcoming_game($id);
		if(($data['game']) != NULL){
			$data['team_1'] =$this->Homes->upcoming_teams($data['game']->team_1_id);
			$data['team_2'] = $this->Homes->upcoming_teams($data['game']->team_2_id);
		}
		layouts_site($data, 'site/upcoming.php');
	}
}
