<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
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

	public function index()
	{
		$data['title'] = 'Contact Us';
		layouts_site($data, 'site/contact.php');
	}

	public function send()
	{
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$msg = $this->input->post('msg');


		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('msg', 'Message', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
			return;
		} else {
			$subject = "From $email. User name $first_name $last_name";

			$this->load->library("email");
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
			$this->email->initialize($mail_config);

			$this->email->set_newline("\r\n");
			$this->email->from("MEHE", "MEHE Contuct Us");
			$this->email->to('aimtech.project@gmail.com');

			$this->email->subject($subject);
			$this->email->message($msg);

			$this->email->send($msg);
			redirect('contact-us');
		}
	}
}
