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
		array_pop($data['thead']);
		array_pop($data['thead']);
		array_pop($data['thead']);
		$data['member'] = $this->AuthModel->get_user($id_user);
		$data['total_click'] = $this->File_model->get_click_count_of_user($id_user);
		
		$data['url_data_tables'] = 'file/get_data?id_user='.$id_user;
		
		$this->load->view('templates/header', $data);
		$this->load->view('member_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('member_view_JS', $data);
		$this->load->view('templates/file_JS', $data);
	}

	public function blokir(int $id_user = null)
	{
		$this->AuthModel->blokir_akun($id_user);
		$this->File_model->blokir_file_by_user($id_user);
		redirect(base_url(''));
	}

	public function buka_blokir(int $id_user = null)
	{
		$this->AuthModel->buka_blokir_akun($id_user);
		$this->File_model->buka_blokir_file($id_user);
		redirect(base_url(''));
	}


}
