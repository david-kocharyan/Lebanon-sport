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

	public function end_post()
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

		$this->response($_FILES[]);
		return;


		$game_id = $this->input->post('id');

		$this->db->trans_start();

		$this->insert_game($game_id);
		$this->insert_best($game_id);
		$this->insert_teams($game_id);

		$this->insert_signature($game_id);
		$this->insert_games_images($game_id);
		$this->insert_games_media($game_id);

		$this->db->trans_complete();
		$status = $this->db->trans_status();

		if ($status == false)
		{
			$response = array(
				"success" => false,
				"data" => array(),
				"msg" => "Something went wrong. Please try again!!",
			);
			return;
		}


		$response = array(
			"success" => true,
			"data" => array(),
			"msg" => "Game saved success",
		);
		$this->response($response, REST_Controller::HTTP_OK);
	}


	private function insert_game($game_id)
	{
		$end_game_data = array(
			"game_id" => $this->input->post('id') != NULL ? $this->input->post('id') : 0,
			"team_1_id" => $this->input->post('team_1_id') != NULL ? $this->input->post('team_1_id') : 0,
			"team_2_id" => $this->input->post('team_2_id') != NULL ? $this->input->post('team_2_id') : 0,
			"score_1" => $this->input->post('team_1_score') != NULL ? $this->input->post('team_1_score') : 0,
			"score_2" => $this->input->post('team_2_score') != NULL ? $this->input->post('team_2_score') : 0,
			"referee_id" => $this->input->post('referee') != NULL ? $this->input->post('referee') : 0,
			"info" => $this->input->post('info') != NULL ? $this->input->post('info') : 0
		);

		$this->db->insert("end_game", $end_game_data);

		$this->db->set('active', 0);
		$this->db->where('id', $game_id);
		$this->db->update('games');
	}

	private function insert_best($game_id)
	{
		$team_1_best = $this->input->post('team_1_best[]');
		$team_2_best = $this->input->post('team_2_best[]');
		for ($i = 0; $i < count($team_1_best); $i++) {
			$this->db->insert("end_game_best_players", array('game_id' => $game_id, 'student_id' => $team_1_best[$i]));
		}
		for ($i = 0; $i < count($team_2_best); $i++) {
			$this->db->insert("end_game_best_players", array('game_id' => $game_id, 'student_id' => $team_2_best[$i]));
		}
	}

	private function insert_teams($game_id)
	{
		$team_1 = $this->input->post('team_1[]');
		$team_2 = $this->input->post('team_2[]');
		$team_1_id = $this->input->post('team_1_id');
		$team_2_id = $this->input->post('team_2_id');
		for ($i = 0; $i < count($team_1); $i++) {
			$this->db->insert("end_game_teams", array('game_id' => $game_id, 'team_id' => $team_1_id, 'student_id' => $team_1[$i]));
		}
		for ($i = 0; $i < count($team_2); $i++) {
			$this->db->insert("end_game_teams", array('game_id' => $game_id, 'team_id' => $team_2_id, 'student_id' => $team_2[$i]));
		}
	}

////////////////////////insert_signature/////////////////////////////////
	private function insert_signature($game_id)
	{
		$this->db->trans_start();

		if (!empty($_FILES['signature_image']['name'][0]) || null != $_FILES['signature_image']['name'][0]) {
			$image = $this->upload_files_signature($_FILES["signature_image"], $game_id);
			if (isset($images['err'])) {
				$response = array(
					"success" => false,
					"data" => array(),
					"msg" => "Something went wrong, please try again",
				);
				$this->response($response, REST_Controller::HTTP_BAD_REQUEST);
				return;
			} else {
				foreach ($image as $key => $val)
				{
					$this->db->insert('end_game_signature', array('game_id' => $val['game_id'], 'name' => $val['name'], 'image' => $val['image']));
				}
//				$this->db->insert_batch('end_game_signature', $image);
			}
		}
		$this->db->trans_complete();
	}

	private function upload_files_signature($files, $id)
	{
		if (!is_dir(FCPATH . "/plugins/images/end/signature/")) {
			mkdir(FCPATH . "/plugins/images/end/signature/", 0755, true);
		}
		$config = array(
			'upload_path' => FCPATH . "/plugins/images/end/signature/",
			'allowed_types' => 'jpg|jpeg|png',
			'max_size' => 100000000000,
			'overwrite' => 1
		);

		$this->load->library('upload', $config);

		$images = array();

		foreach ($files['name'] as $key => $image) {
			$_FILES['images[]']['name'] = $files['name'][$key];
			$_FILES['images[]']['type'] = $files['type'][$key];
			$_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['images[]']['error'] = $files['error'][$key];
			$_FILES['images[]']['size'] = $files['size'][$key];
			$ext = explode(".", $image)[1];
			$fileName = 'signature_' . time() . '_' . uniqid() . "." . $ext;

			$signature_name = $this->input->post('signature_name[]');

			$images[$key]['name'] = $signature_name[$key];
			$images[$key]['game_id'] = $id;
			$images[$key]['image'] = $fileName;

			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('images[]')) {
				$this->upload->data();
			} else {
				$data['err'] = $this->upload->display_errors() . $image;
				return $data;
			}
		}
		return $images;
	}

////////////////////MEDIA/////////////////////////////////////////////////////

	private function insert_games_images($game_id)
	{
		$this->db->trans_start();

		if (!empty($_FILES['game_images']['name'][0]) || null != $_FILES['game_images']['name'][0]) {
			$path = "/plugins/images/end/images/";
			$name = 'image';
			$images = $this->upload_files($_FILES['game_images'], $game_id, $path, $name);
			if (isset($images['err'])) {
				$response = array(
					"success" => false,
					"data" => array(),
					"msg" => "Something went wrong, please try again",
				);
				$this->response($response, REST_Controller::HTTP_BAD_REQUEST);
				return;
			} else {
				$this->db->insert_batch('end_game_image', $images);
			}
		}
		$this->db->trans_complete();
	}


	private function insert_games_media($game_id)
	{
		$this->db->trans_start();

		if (!empty($_FILES['game_videos']['name'][0]) || null != $_FILES['game_videos']['name'][0]) {
			$path = "/plugins/images/end/media/";
			$name = 'media';
			$images = $this->upload_files($_FILES['game_videos'], $game_id, $path, $name);
			if (isset($images['err'])) {
				$response = array(
					"success" => false,
					"data" => array(),
					"msg" => "Something went wrong, please try again",
				);
				$this->response($response, REST_Controller::HTTP_BAD_REQUEST);
				return;
			} else {
				$this->db->insert_batch('end_game_media', $images);
			}
		}
		$this->db->trans_complete();
	}

	private function upload_files($files, $id, $path, $name)
	{
		if (!is_dir(FCPATH . $path)) {
			mkdir(FCPATH . $path, 0755, true);
		}
		$config = array(
			'upload_path' => FCPATH . $path,
			'allowed_types' => 'jpg|jpeg|png|mov|avi|flv|wmv|mp3|mp4',
			'max_size' => 1000000000,
			'overwrite' => 1
		);

		$this->load->library('upload', $config);

		$images = array();

		foreach ($files['name'] as $key => $image) {
			$_FILES['images[]']['name'] = $files['name'][$key];
			$_FILES['images[]']['type'] = $files['type'][$key];
			$_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['images[]']['error'] = $files['error'][$key];
			$_FILES['images[]']['size'] = $files['size'][$key];
			$ext = explode(".", $image)[1];
			$fileName = 'file_' . time() . '_' . uniqid() . "." . $ext;

			$images[$key][$name] = $fileName;
			$images[$key]['game_id'] = $id;

			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('images[]')) {
				$this->upload->data();
			} else {
				$data['err'] = $this->upload->display_errors() . $image;
				return $data;
			}
		}
		return $images;
	}


}
