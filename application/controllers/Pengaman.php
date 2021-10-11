<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaman extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){

    $data['link'] = base64_decode($this->input->get('redirect'));

		$this->load->view('templates/header', $data);
		$this->load->view('pengaman_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('pengaman_view_JS', $data);
	}


}
