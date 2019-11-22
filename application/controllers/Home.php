<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('layouts_site');
		$this->load->model('site/Homes');

		if (stristr($_SERVER['REQUEST_URI'], '/ar/')){
			$this->lang->load("ar", "arabic");
			$this->session->set_userdata("lang", 'ar');
		}
		elseif (stristr($_SERVER['REQUEST_URI'], '/ar')){
			$this->lang->load("ar", "arabic");
			$this->session->set_userdata("lang", 'ar');
		}
		else{
			$this->lang->load("en", "english");
			$this->session->set_userdata("lang", 'en');
		}
	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['banner'] = $this->Homes->first();
		$data['blogs'] = $this->Homes->selectBlog();
		$data['upcoming'] = $this->Homes->selectUpcoming();
		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/home.php');
	}

	public function change()
	{
		$language = $this->input->post('lang');
		$this->session->set_userdata("lang", $language);
		$this->output->set_content_type('application/json')->set_output(json_encode($language));
	}
}
