<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('File_model');
	}

	function index(){

    $anime_ids = $this->File_model->get_koleksi();

    $data['data_anime'] = [];

    // ambil data dari kitsu api
    foreach ($anime_ids as $key => $anime_id) {
      $data_raw = json_decode(file_get_contents( base_url() . 'Kitsu_api/id/' . $anime_id ), true);


      $append = [];
      $append['id'] = $data_raw['data']['id'];
      $append['poster'] = $data_raw['data']['attributes']['posterImage']['tiny'];
      $append['titles'] = $data_raw['data']['attributes']['titles']['en_jp'] .' - ['. $data_raw['data']['attributes']['titles']['ja_jp'] . ']';
      $append['showType'] = $data_raw['data']['attributes']['showType'];
      $append['kitsu'] = $data_raw['data']['links']['self'];

      $data['data_anime'][] = $append;
    }

		$data['thead'] = ['poster', 'judul', 'Tipe', 'Kitsu'];
		$this->load->view('templates/header', $data);
		$this->load->view('koleksi_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('koleksi_view_JS', $data);
	}


}
