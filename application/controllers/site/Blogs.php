<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('layouts_site');

		if (stristr($_SERVER['REQUEST_URI'], '/ar/')) {
			$this->lang->load("ar", "arabic");
			$this->session->set_userdata("lang", 'ar');
		} else {
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

	public function all_blogs()
	{
		$data['title'] = 'All News';

		$limit = (null !== $this->input->get('limit') && is_numeric($this->input->get("limit"))) ? intval($this->input->get('limit')) : 8;
		$offset = (null !== $this->input->get('page') && is_numeric($this->input->get("page"))) ? ($this->input->get('page')-1) * $limit : 0;

		$data['page'] = ($limit !== 0 || null !== $limit) ? ceil($this->get_pages()->page / $limit) : 0;
		$data['blogs'] = $this->selectBlog();
		$data['lang'] = $this->session->userdata("lang");
		layouts_site($data, 'site/all/topic.php');
	}

	private function selectBlog()
	{
		$this->db->select('blog.id as blog_id, blog.*, blog_images.*');
		$this->db->join('blog_images', 'blog_id = blog.id');
		$this->db->group_by('blog.id');
		$this->db->order_by('blog.id DESC');
		$this->limits();
		return $this->db->get_where('blog', array('blog.status' => 1))->result();
	}

	private function get_pages()
	{
		$this->db->select('count(id) as page');
		return $this->db->get_where('blog', array('status' => 1))->row();
	}

	private function limits()
	{
		$limit = (null !== $this->input->get('limit') && is_numeric($this->input->get("limit"))) ? $this->input->get('limit') : 8;
		$offset = (null !== $this->input->get('page') && is_numeric($this->input->get("page"))) ? ($this->input->get('page')-1) * $limit : 0;
		$this->db->limit($limit, $offset);
	}

}
