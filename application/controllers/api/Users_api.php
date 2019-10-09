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

			$user_data = array(
				"user" => array(
					"username" => $auth->username,
					"name_en" => $auth->name_en,
					"name_ar" => $auth->name_ar,
					"gender" => $auth->gender,
					"email" => $auth->email,
					"mobile_number" => $auth->mobile_number,
					"region" => $auth->region_id,
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


//	public function getUser_get()
//	{
//		//        the function would return current user's id, if the token would be approved
//		$res = $this->verify_get_request();
//		if (gettype($res) != 'string') {
//			$data = array(
//				"success" => false,
//				"data" => array(),
//				"msg" => $res['msg']
//			);
//			$this->response($data, $res['status']);
//			return;
//		}
//
//		$this->db->select('username, first_name, last_name, date_of_birth, mobile_number, email, coins, reference_code');
//		$user = $this->db->get_where("users", ['id' => $res])->row();
//
//		if (null == $user) {
//			$data = array(
//				"success" => false,
//				"data" => array(),
//				"msg" => "User not found !"
//			);
//			$this->response($data, REST_Controller::HTTP_BAD_REQUEST);
//			return;
//		}
//
//		$response = array(
//			"msg" => '',
//			"data" => array(
//				"user" => array(
//					"first_name" => $user->first_name,
//					"last_name" => $user->last_name,
//					"date_of_birth" => $user->date_of_birth,
//					"mobile_number" => $user->mobile_number,
//					"email" => $user->email,
//					"reference_code" => $user->reference_code == null ? "" : $user->reference_code,
//					"coins" => $user->coins,
//				),
//			),
//			"success" => true
//		);
//		$this->response($response, REST_Controller::HTTP_OK);
//	}
//

}

