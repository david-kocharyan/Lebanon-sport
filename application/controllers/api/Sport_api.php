<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');

class Sport_api extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index_get()
	{
		$res = $this->verify_get_request();
		if (gettype($res) != 'string') {
			$data = array(
				"success" => false,
				"data" => array(),
				"msg" => $res['msg']
			);
			$this->response($data, $res['status']);
			return;
		}

		$limit = (null !== $this->input->get('limit') && is_numeric($this->input->get("limit"))) ? intval($this->input->get('limit')) : 10;
		$offset = (null !== $this->input->get('offset') && is_numeric($this->input->get("offset"))) ? $this->input->get('offset') * $limit : 0;
		$pages = ($limit != 0 || null !== $limit) ? ceil($this->sport_page()->pages / $limit) : 0;

		$this->db->select("id, name_en as name, concat('plugins/images/sport/', image) as image");
		$this->db->limit($limit, $offset);
		$this->db->order_by("sport_types.id");
		$data = $this->db->get_where('sport_types', array("status" => 1))->result();

		$response = array(
			"success" => true,
			"data" => array(
				"sport" => $data,
				"meta" => array(
					"limit" => $limit,
					"offset" => $offset,
					"pages" => $pages,
				),
			),
			"msg" => "",
		);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	private function sport_page()
	{
		$this->db->select("count(id) as pages");
		$data = $this->db->get("sport_types")->row();
		return $data != null ? $data : 0;
	}

}



