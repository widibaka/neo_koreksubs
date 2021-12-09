<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judul extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('GoogleApi');
	}

	function index(){

    // DEWA
    $anime_id = $this->input->get('anime_id');

    $data['data_anime'] = json_decode(file_get_contents( base_url() . 'Kitsu_api/id/' . $anime_id ), true);

		$data['thead'] = $this->File_model->get_column();
		array_pop($data['thead']);
		array_pop($data['thead']);
		
		$data['url_data_tables'] = 'file/get_data?anime_id='.$anime_id;
		$this->load->view('templates/header', $data);
		$this->load->view('judul_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('judul_view_JS', $data);
		$this->load->view('templates/file_JS', $data);
	}


}
