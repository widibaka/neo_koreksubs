<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('File_model');
	}

	function index(){

    $anime_ids = $this->File_model->get_koleksi2();

    $data['data_anime'] = [];

    // ambil data dari kitsu api
    foreach ($anime_ids as $key => $val) {
      // $data_raw = json_decode(file_get_contents( base_url() . 'Kitsu_api/id/' . $anime_id ), true);

      $append = [];
      $append['id'] = $val['anime_id'];
      // $append['poster'] = $data_raw['data']['attributes']['posterImage']['tiny'];
      $append['titles'] = $val['title'];

      $append['musim'] = $val['musim'];
      // $append['showType'] = $data_raw['data']['attributes']['showType'];
      $append['kitsu'] = 'https://kitsu.io/anime/' . $val['anime_id'];

      $data['data_anime'][] = $append;
    }

		$data['thead'] = ['judul', 'Musim', 'Kitsu.io'];
		$this->load->view('templates/header', $data);
		$this->load->view('koleksi_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('koleksi_view_JS', $data);
	}

  public function setAnimeTitle()
  {
    $count = 0;
    $anime_ids = $this->File_model->get_koleksi();

    foreach ($anime_ids as $key => $anime_id) {
      $data_raw = json_decode(file_get_contents( base_url() . 'Kitsu_api/id/' . $anime_id ), true);

      // $append = [];
      // $append['id'] = $data_raw['data']['id'];
      // $append['poster'] = $data_raw['data']['attributes']['posterImage']['tiny'];
      // $append['titles'] = $data_raw['data']['attributes']['titles']['en_jp'] .' - ['. $data_raw['data']['attributes']['titles']['ja_jp'] . ']';
      // $append['showType'] = $data_raw['data']['attributes']['showType'];
      // $append['kitsu'] = $data_raw['data']['links']['self'];
      $title = '';
      foreach ($data_raw['data']['attributes']['titles'] as $key => $judul) {
        if ( $key != 'ja_jp' ) {
            $title .= '(' . $judul . ') ';
        }
      }
      $data = [
        'title' => $title
      ];
      $this->updateFile($data, $anime_id);
      $count++;
    }
    
    echo '<pre>'; var_dump( 'SELESAI. JUMLAH ANIME ' . $count ); die;
  }

  public function setMusim()
  {
    $count = 0;
    $anime_ids = $this->File_model->get_koleksi(10000);


    // untuk mengubah tanggal menjadi musim
    function convertDateToSeason($angkaBulan, $angkaTanggal)
    {
      // buat menjadi integer
      (int)$angkaBulan;
      (int)$angkaTanggal;

      if ( ($angkaBulan == 12 OR 1 <= $angkaBulan AND $angkaBulan <= 2) AND $angkaTanggal >= 1 ) { // Winter dimulai 1 December sampai akhir februari
        return 'Kuartal 1 (Winter)';
      }
      if ( (3 <= $angkaBulan AND $angkaBulan <= 5) AND $angkaTanggal >= 1 ) {
        return 'Kuartal 2 (Spring)';
      }
      if ( (6 <= $angkaBulan AND $angkaBulan <= 8) AND $angkaTanggal >= 1 ) {
        return 'Kuartal 3 (Summer)';
      }
      if ( (9 <= $angkaBulan AND $angkaBulan <= 11) AND $angkaTanggal >= 1 ) {
        return 'Kuartal 4 (Fall)';
      }
    }

    foreach ($anime_ids as $key => $anime_id) {
      $data_raw = json_decode(file_get_contents( base_url() . 'Kitsu_api/id/' . $anime_id ), true);

      // $append = [];
      // $append['id'] = $data_raw['data']['id'];
      // $append['poster'] = $data_raw['data']['attributes']['posterImage']['tiny'];
      // $append['titles'] = $data_raw['data']['attributes']['titles']['en_jp'] .' - ['. $data_raw['data']['attributes']['titles']['ja_jp'] . ']';
      // $append['showType'] = $data_raw['data']['attributes']['showType'];
      // $append['kitsu'] = $data_raw['data']['links']['self'];

      #
      $data_anime = $data_raw;
      #

      
      $startDate = explode('-', $data_anime['data']['attributes']['startDate']);

      // masukin data musimnya
      $data = [
        'musim' => $startDate[0] . ' ' . convertDateToSeason($startDate[1], $startDate[2])
      ];
      $this->updateFile($data, $anime_id);
      $count++;
    }
    
    echo '<pre>'; var_dump( 'SELESAI. JUMLAH ANIME Diubah Musimnya: ' . $count ); die;
  }

  public function updateFile($data, $anime_id)
  {
    $this->db->where( 'anime_id', $anime_id );
		if ( !$this->db->update( 'tbl_file', $data ) ) {
      echo '<pre>'; var_dump( 'TERJADI ERROR anime_id = '.$anime_id ); die;
    }
  }


}
