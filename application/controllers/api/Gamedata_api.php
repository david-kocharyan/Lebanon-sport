<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');


class Gamedata_api extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}







}
