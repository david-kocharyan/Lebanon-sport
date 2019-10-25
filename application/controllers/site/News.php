<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('layouts_site');
	}

	public function index()
	{
		$data['title'] = 'News';
		layouts_site($data, 'site/news.php');
	}
}
