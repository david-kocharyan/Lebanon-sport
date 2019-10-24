<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');


class End_api extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function index_post()
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

		$game_id = $this->input->post('id');

		$team_1 = $this->input->post('team_1[]');
		$team_2 = $this->input->post('team_2[]');

		$team_1_best = $this->input->post('team_1_best[]');
		$team_2_best = $this->input->post('team_2_best[]');

		$team_1_point = $this->input->post('team_1_point');
		$team_2_point = $this->input->post('team_2_point');
		$info = $this->input->post('info');

		$signature_name  = $this->input->post('signature_name[]');
		$signature_image  = $this->input->post('signature_image[]');

		$referee = $this->input->post('referee');

		$game_images = $this->input->post('game_images[]');
		$game_videos = $this->input->post('game_videos[]');


		echo '<pre>';
		var_dump($game_id, $team_1, $team_2, $team_1_best, $team_2_best, $team_1_point, $team_2_point, $info, $signature_name, $signature_image, $referee, $game_images, $game_videos);
	}


}
