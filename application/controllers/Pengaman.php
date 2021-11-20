<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaman extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function download($id_file){

		$this->File_model->tambah_click_count($id_file);
    	$data['link'] = base64_decode($this->input->get('redirect'));

    	$this->load->model('File_model');
    	$data['main_data'] = $this->File_model->get_a_file($id_file);

		$this->load->view('templates/header', $data);
		$this->load->view('pengaman_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('pengaman_view_JS', $data);
	}


}
