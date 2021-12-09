<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_file extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('File_model');

		if ( empty($this->session->userdata('id_user')) ) {
			$this->session->set_flashdata('msg', 'danger#Session Anda telah habis! Silakan login kembali.');
			redirect( base_url() );
		}
	}

	function index(){

    // DEWA
    $q = urlencode($this->input->get('q'));

    $data = [];

    if ( !empty($q) ) {
      $data['data_anime'] = json_decode(file_get_contents( base_url() . 'Kitsu_api/search?filter[text]='.$q.'&page[limit]=10&page[offset]=0' ), true);
    }
    

		$this->load->view('templates/header', $data);
		$this->load->view('cari_kitsu_anime', $data);
		$this->load->view('templates/footer', $data);
	}

	function proses($anime_id){

		if ( !empty( $this->input->post('anime_id')) ) {
			$post = $this->input->post();
			$this->File_model->add($post);
			$this->session->set_flashdata('msg', 'success#File berhasil ditambahkan! <i class="bi bi-emoji-smile"></i>');
			redirect( base_url() );
		}

    $data['data_anime'] = json_decode(file_get_contents( base_url() . 'Kitsu_api/id/' . $anime_id ), true);

		$this->load->view('templates/header', $data);
		$this->load->view('tambah_file', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('tambah_file_JS', $data);
	}

	function edit($anime_id, $id_file, $id_user){

		if ( !empty( $this->input->post()) ) {
			$post = $this->input->post();

			$this->File_model->update($post, $id_file);
			$this->session->set_flashdata('msg', 'success#File berhasil diubah.');
			redirect( base_url() . 'member/file_by_user?id_user=' . $id_user  );
		}

    $data['data_anime'] = json_decode(file_get_contents( base_url() . 'Kitsu_api/id/' . $anime_id ), true);
    $data['data_file'] = $this->File_model->get($id_file);
		
		$this->load->view('templates/header', $data);
		$this->load->view('edit_file', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('edit_file_JS', $data);
	}

	function hapus($id_file, $id_user){

		$post = $this->input->post();
		$this->File_model->hapus($id_file);
		$this->session->set_flashdata('msg', 'success#File berhasil dihapus.');
		redirect( base_url() . 'member/file_by_user?id_user=' . $id_user );
	}

	public function submit_sinopsis()
	{
		$post = $this->input->post();
		$anime_id = $post['anime_id'];
		$data = $post;
		$this->load->model('SinopsisModel');
		$this->SinopsisModel->submit_sinopsis($anime_id, $data);

		redirect( base_url() . 'tambah_file/proses/' . $anime_id );
	}


}
