<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}

		$this->load->helper('layouts');
		$this->load->model('admin/School');
	}

	public function index()
	{

		layouts($data, 'admin/schools/index.php');
	}
}