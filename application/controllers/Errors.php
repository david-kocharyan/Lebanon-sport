<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');


class Errors extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function _404()
	{
		if (stristr($_SERVER['REQUEST_URI'], 'api')) {
			$response = array(
				"msg" => 'Page not found!',
				"data" => array(),
				"success" => false
			);
			$this->response($response, 404);
		} else {
			$this->load->view('errors/404.php');
		}
	}

}
