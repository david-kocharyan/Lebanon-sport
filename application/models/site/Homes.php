<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homes extends CI_Model
{
	private $table = 'blog';

	function __construct()
	{
		parent:: __construct();
	}

	public function select()
	{
		$this->db->join('blog_images', 'blog_id = blog.id');
		$this->db->group_by('blog.id');
		$this->db->order_by('blog.id DESC');
		$this->db->limit(3);
		return $this->db->get_where('blog')->result();
	}


}
