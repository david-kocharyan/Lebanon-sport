<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');


class Games_api extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("api/Game");
	}

	public function sport_type_get()
	{
//		$res = $this->verify_get_request();
//		if (gettype($res) != 'string') {
//			$data = array(
//				"success" => false,
//				"data" => array(),
//				"msg" => $res['msg']
//			);
//			$this->response($data, $res['status']);
//			return;
//		}

		$sport = $this->Game->get_sport_type();

		$response = array(
			"msg" => '',
			"data" => array(
				"sport" => $sport,
			),
			"success" => true
		);
		$this->response($response, REST_Controller::HTTP_OK);

	}

}
