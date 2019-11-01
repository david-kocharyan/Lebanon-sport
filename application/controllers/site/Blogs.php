<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller
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

	public function topic($id)
	{
		$data['title'] = 'Blogs';
		$data['topic'] = $this->db->get_where('blog', array('id' => $id))->row();
		$data['image'] = $this->db->get_where('blog_images', array('blog_id' => $id))->row();


		$this->db->select('blog.id as blog_id, blog.*, blog_images.*');
		$this->db->join('blog_images', 'blog_id = blog.id');
		$this->db->group_by('blog.id');
		$this->db->order_by('blog.id DESC');
		$this->db->limit(3);
		$data['other'] = $this->db->get_where('blog', array('blog.status' => 1))->result();

		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/topic.php');
	}
}
