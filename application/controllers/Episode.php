<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Episode extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('File_model');
	}

	function index(){

    // DEWA
    $anime_id = $this->input->get('anime_id');
    $episode = $this->input->get('episode');

    $data['data_anime'] = json_decode(file_get_contents( base_url() . 'Kitsu_api/id/' . $anime_id ), true);

		$data['thead'] = $this->File_model->get_column();
		
		$data['url_data_tables'] = 'file/get_data?anime_id='.$anime_id.'&episode='.$episode;
		
		$this->load->view('templates/header', $data);
		$this->load->view('episode_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('episode_view_JS', $data);
		$this->load->view('templates/file_JS', $data);
	}


}
