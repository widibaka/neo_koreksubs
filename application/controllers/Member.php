<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){

		$data['members'] = $this->AuthModel->get_user_aktif();

     foreach ($data['members'] as $key => $member) {
       $data['members'][$key]['jumlah_file'] = $this->File_model->get_num_rows_by_id_user($member['id_user']);
     }
		
		$this->load->view('templates/header', $data);
		$this->load->view('all_member_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('all_member_view_JS', $data);
	}

	public function file_by_user(){

    // DEWA
    $id_user = $this->input->get('id_user');

		$data['thead'] = $this->File_model->get_column();
		$data['member'] = $this->AuthModel->get_user($id_user);
		
		$data['url_data_tables'] = 'file/get_data?id_user='.$id_user;
		
		$this->load->view('templates/header', $data);
		$this->load->view('member_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('member_view_JS', $data);
		$this->load->view('templates/file_JS', $data);
	}


}
