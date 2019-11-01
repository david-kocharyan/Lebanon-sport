<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activites extends CI_Controller
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

	public function get_game($id)
	{
		$data['title'] = 'Activites';
		$data['game'] = $this->Homes->select_game($id);
		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/activites.php');
	}

	public function game($id)
	{
		$data['title'] = 'Game';
		$data['game'] = $this->Homes->get_ended_game($id);
		if(($data['game']) != NULL){
			$data['team_1'] =$this->Homes->get_ended_game_teams($data['game']->team_1_id);
			$data['team_2'] = $this->Homes->get_ended_game_teams($data['game']->team_2_id);
		}

		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/game.php');
	}



}
