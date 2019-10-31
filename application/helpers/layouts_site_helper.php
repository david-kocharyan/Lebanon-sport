<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('layouts_site')) {
	function layouts_site($data, $url = null)
	{
		$ci =& get_instance();

		$data['sport_types'] = $ci->db->get('sport_types')->result();

		$ci->load->view('site/layouts/header.php', $data);
		if ($url != null){
			$ci->load->view($url);
		}
		$ci->load->view('site/layouts/footer.php');
	}

}
