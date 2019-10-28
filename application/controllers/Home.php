<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('layouts_site');
		$this->load->model('site/Homes');
	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['blog'] = $this->Homes->select();
		layouts_site($data, 'site/home.php');
	}

}
