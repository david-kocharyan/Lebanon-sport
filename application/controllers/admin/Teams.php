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
		$this->load->model('admin/Team');
	}

	public function index()
	{
		$data["teams"] = $this->Team->selectAll();
		$data["title"] = "Teams";
		layouts($data, 'admin/teams/index.php');
	}

	public function create()
	{
		$data["title"] = "Create Teams";
		$data["sport"] = $this->db->get_where("sport_types", array('status' => 1))->result();
		$data["school"] = $this->db->get_where("schools", array('status' => 1))->result();
		$data["age"] = $this->db->get_where("age_group", array('status' => 1))->result();
		layouts($data, 'admin/teams/create.php');
	}
}
