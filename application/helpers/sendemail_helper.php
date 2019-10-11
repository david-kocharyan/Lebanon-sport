<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('send_email')) {
	function send_email($to, $message, $subject)
	{
		$ci =& get_instance();

		$ci->load->library("email");
		$mail_config['smtp_host'] = 'smtp.gmail.com';
		$mail_config['smtp_port'] = '587';
		$mail_config['smtp_user'] = 'aimtech.project@gmail.com';
		$mail_config['_smtp_auth'] = TRUE;
		$mail_config['smtp_pass'] = 'ncp847m3w';
		$mail_config['smtp_crypto'] = 'tls';
		$mail_config['protocol'] = 'smtp';
		$mail_config['mailtype'] = 'html';
		$mail_config['send_multipart'] = FALSE;
		$mail_config['charset'] = 'utf-8';
		$mail_config['wordwrap'] = TRUE;
		$ci->email->initialize($mail_config);

		$ci->email->set_newline("\r\n");
		$ci->email->from("MEHE", "MEHE App");
		$ci->email->to($to);

		$ci->email->subject($subject);
		$ci->email->message($message);

		if ($ci->email->send()) {
			return True;
		} else {
			return False;
		}
	}

}
