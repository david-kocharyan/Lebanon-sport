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
		$regions = $this->input->get('regions');

		if ($regions != NULL) {
			$this->search_regions($regions);
			$data['referees'] = $this->db->get('referees')->result();
		}else{
			$data['referees'] = $this->db->get_where('referees', array("status"=>1))->result();
		}

		$data['regions'] = $this->db->get_where('regions', array('status' => 1))->result();
		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/referees.php');
	}

	private function search_regions($regions)
	{
		$len = count($regions);
		if ($len != 1) {
			foreach ($regions as $key => $value) {
				if ($key == 0) {
					$this->db->where("( region_id = $value");
				} elseif ($key == $len - 1) {
					$this->db->or_where("region_id = $value )");
				} else {
					$this->db->or_where("region_id = $value");
				}
			}
		} else {
			$this->db->where("region_id = $regions[0]");
		}
	}

}
