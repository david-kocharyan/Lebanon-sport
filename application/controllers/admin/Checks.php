<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checks extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (($this->session->userdata('user') == NULL OR !$this->session->userdata('user'))) {
			redirect('/admin/login');
		}
		$this->load->helper('layouts');
		$this->load->model('admin/Check');
	}

	public function index()
	{
		$data['title'] = "Observed Games";
		if ($this->session->userdata('user')['role'] == 2) $data['game'] = $this->Check->selectAll();
		if ($this->session->userdata('user')['role'] == 1) $data['game'] = $this->Check->selectAllByAdmin($this->session->userdata('user')['id']);
		layouts($data, 'admin/checks/index.php');
	}

	public function show($id)
	{
		$data['game'] = $this->Check->selectById($id);
		$data['image'] = $this->Check->selectImage($id);
		$data['media'] = $this->Check->selectMedia($id);
		$data['title'] = "Observed Game";
		layouts($data, 'admin/checks/show.php');
	}

	public function save($id)
	{
		$this->db->set('for_site', 1);
		$this->db->where('id', $id);
		$this->db->update('games');

		redirect('admin/check');
	}

}
