<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('layouts')) {
	function layouts($data, $url = null)
	{
		$ci =& get_instance();
		$ci->load->database();

		$data['user'] = $ci->session->userdata('user');
		$ci->load->view('admin/layouts/header.php', $data);
		if ($url != null){
			$ci->load->view($url);
		}
		$ci->load->view('admin/layouts/footer.php');
	}

}
