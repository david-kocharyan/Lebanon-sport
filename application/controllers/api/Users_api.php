<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');


class Users_api extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model("api/User");
	}

	/**
	 * Simple login method.
	 * @return Response
	 */
	public function login_post()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if (null == $this->input->post('username')) {
			$status = self::HTTP_UNPROCESSABLE_ENTITY;
			$response = array(
				'success' => false,
				'data' => array(),
				'msg' => 'Please, provide username',
			);
			$this->response($response, $status);
			return;
		} elseif (null == $this->input->post('password')) {
			$status = self::HTTP_UNPROCESSABLE_ENTITY;
			$response = array(
				'success' => false,
				'data' => array(),
				'msg' => 'Please, provide password',
			);
			$this->response($response, $status);
			return;
		}

		$auth = $this->User->login($username, $password);

		if (!$auth) {
			$status = self::HTTP_UNPROCESSABLE_ENTITY;
			$response = array(
				'success' => false,
				'data' => array(),
				'msg' => 'Wrong Credentials',
			);
			$this->response($response, $status);
		} else {
			$token = $this->generateToken();
			$data['refresh_token'] = $this->generateToken();
			$status = self::HTTP_OK;
			$data = array(
				"token" => $token,
				"time" => time() + 86400,
				"user_id" => $auth->id,
				'refresh_token' => $data['refresh_token']
			);

			$gender = "";
			if ($auth->gender == 1) $gender = 'Male';
			if ($auth->gender == 0) $gender = 'Female';

			$user_data = array(
				"user" => array(
					"username" => $auth->username,
					"name" => $auth->name_en,
					"gender" => $gender,
					"email" => $auth->email,
					"mobile_number" => $auth->mobile_number,
					"region" => $auth->region_name,
				),
				"tokens" => array(
					"token" => $token,
					"refresh_token" => $data['refresh_token']
				),
			);

			$this->db->insert('tokens', $data);
			unset($data['user_id']);
			unset($data['time']);
			$response = array(
				"msg" => '',
				"data" => $user_data,
				"success" => true
			);
			$this->response($response, $status);
		}
	}

	public function refresh_token_post()
	{
		if (null == $this->input->post("refresh_token")) {
			$status = self::HTTP_UNPROCESSABLE_ENTITY;
			$response = array(
				'success' => false,
				'data' => array(),
				'msg' => 'Please, provide refresh token',
			);
			$this->response($response, $status);
			return;
		}

		$tokens = $this->db->get_where("tokens", ['refresh_token' => $this->input->post("refresh_token")])->row_array();
		if (null == $tokens) {
			$status = self::HTTP_UNPROCESSABLE_ENTITY;
			$response = array(
				'success' => false,
				'data' => array(),
				'msg' => 'Provided refresh token is incorrect',
			);
			$this->response($response, $status);
			return;
		}

		$response_tokens = array(
			"token" => $this->generateToken(),
			"refresh_token" => $this->generateToken()
		);
		$this->db->update('tokens', ['token' => $response_tokens['token'], 'refresh_token' => $response_tokens['refresh_token'], 'time' => time() + 86400], ['id' => $tokens['id']]);
		$data = array(
			'success' => true,
			'data' => $response_tokens,
			'msg' => ""
		);
		$this->response($data, REST_Controller::HTTP_OK);

	}

	public function logout_get()
	{
		$headers = $this->input->request_headers();
		$token = "";
		if (isset($headers['Authorize'])) {
			$token = $headers['Authorize'];
		}
		$res = $this->db->get_where("tokens", array("token" => $token))->row_array();

		if (null == $res || empty($res)) {
			$data = array(
				"success" => false,
				"data" => array(),
				"msg" => "Provide valid token",
				"status" => REST_Controller::HTTP_UNPROCESSABLE_ENTITY
			);
		} else {

			$this->db->set('token', NULL);
			$this->db->set('refresh_token', NULL);
			$this->db->set('time', NULL);
			$this->db->where('id', $res['id']);
			$this->db->update('tokens');

			$data = array(
				"success" => true,
				"data" => array(),
				"msg" => "You have successfully logged out",
				"status" => REST_Controller::HTTP_OK
			);
		}
		$status = $data['status'];
		unset($data['status']);
		$this->response($data, $status);
	}


	public function get_user_get()
	{
		$res = $this->verify_get_request();
		if (gettype($res) != 'string') {
			$data = array(
				"success" => false,
				"data" => array(),
				"msg" => $res['msg']
			);
			$this->response($data, $res['status']);
			return;
		}

		$user = $this->User->getUser($res);

		if (null == $user) {
			$data = array(
				"success" => false,
				"data" => array(),
				"msg" => "User not found !"
			);
			$this->response($data, REST_Controller::HTTP_BAD_REQUEST);
			return;
		}

		$gender = "";
		if ($user->gender == 1) $gender = 'Male';
		if ($user->gender == 0) $gender = 'Female';

		$response = array(
			"msg" => '',
			"data" => array(
				"user" => array(
					"username" => $user->username,
					"name" => $user->name_en,
					"gender" => $gender,
					"email" => $user->email,
					"mobile_number" => $user->mobile_number,
					"region" => $user->region_name,
				),
			),
			"success" => true
		);
		$this->response($response, REST_Controller::HTTP_OK);
	}

//	forgot passowrd
	public function forgot_password_post()
	{
		$email = $this->input->post('email');
		if (null == $email) {
		$response = array(
			"success" => false,
			"data" => array(),
			"msg" => "Provide Email"
		);
		$this->response($response, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
		return;
	}

		$check = $this->User->check_email($email);
		if (null == $check) {
			$data = array(
				"success" => false,
				"data" => array(),
				"msg" => "User not found!"
			);
			$this->response($data, REST_Controller::HTTP_BAD_REQUEST);
			return;
		}

		$new_password = $this->generatePassword(10);
		$change = $this->User->change_pass($email, $new_password);
		if ($change == false) {
			$response = array(
				"success" => false,
				"data" => array(),
				"msg" => "Server error, try again. (change)"
			);
			$this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}

		$this->load->helper('sendemail');
		$message = "Your changed password id` " . $new_password . " ";
		$subject = 'Mehe chaneg password';
		$send = send_email($email, $message, $subject);
		if ($send == True) {
			$response = array(
				"success" => true,
				"data" => array(),
				"msg" => 'Your New Password was sent to your MEHE email.',
			);
			$this->response($response, REST_Controller::HTTP_OK);
		}
		else{
			$data = array(
				"success" => false,
				"data" => array(),
				"msg" => "Server error, try again. (email)"
			);
			$this->response($data, REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
			return;
		}
	}

	private function generatePassword($length = 8)
	{
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$count = mb_strlen($chars);
		for ($i = 0, $result = ''; $i < $length; $i++) {
			$index = rand(0, $count - 1);
			$result .= mb_substr($chars, $index, 1);
		}
		return $result;
	}

}

