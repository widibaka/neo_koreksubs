<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('File_model');
	}

	function index(){
		$data['thead'] = $this->File_model->get_column();
		array_pop($data['thead']);
		array_pop($data['thead']);
		array_pop($data['thead']); // ada 3 kolom yang tak perlu ditampilkan

		$anime_ids = $this->File_model->get_koleksi(10);
		$data['anime_terbaru']=[];
		// ambil data dari kitsu api
    foreach ($anime_ids as $key => $anime_id) {
      $data_raw = json_decode(file_get_contents( base_url() . 'Kitsu_api/id/' . $anime_id ), true);

      $append = [];
      $append['id'] = $data_raw['data']['id'];
      $append['poster'] = $data_raw['data']['attributes']['posterImage']['small'];
      $append['total_episode'] = $data_raw['data']['attributes']['episodeCount'];
      $append['titles'] = $data_raw['data']['attributes']['titles']['en_jp'];
			if ( empty($append['titles']) ) {
				$append['titles'] = $data_raw['data']['attributes']['titles']['en_en'];
			}

      $append['episode_digarap'] = $this->File_model->getLatestEpisodeOfAnime($anime_id); //<-- ini nanti untuk menunjukkan progres garapan

      $data['anime_terbaru'][] = $append;
    }

		$data['url_data_tables'] = 'file/get_data/';
		$this->load->view('templates/header', $data);
		$this->load->view('file_list_view', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('file_list_view_JS', $data);
		$this->load->view('templates/file_JS', $data);
	}

	function get_data()
	{
    // DEWA
    $this->input->get('anime_id');
    $this->input->get('episode');


		uniqid();
		usleep(500000); // .5 seconds
		$list = $this->File_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key => $val) {
			$no++;
			$row = array();
			// $row[] = $no;
			foreach ($val as $key => $item) {

				

				if ( $key=='id_user' ) { //<-- pengecualian
					$row[] = '<a href="' . base_url('member/file_by_user?id_user=') . $item . '">' . $this->AuthModel->get_user($item)['name'] . '</a>';
				}

				elseif ( $key=='id_file' ) {
					$row[] = '<span class="hide_parent_of_this">' . $item . '</span>';
				}

				elseif ( $key=='publish' ) {
					// do nothing
				}

				elseif ( $key=='title' ) {
					// do nothing
				}

				elseif ( $key=='nama_file' ) {
					$tombol_edit_hapus = '<a class="btn btn-sm btn-primary me-1" href="'. base_url('tambah_file/edit/' . $val['anime_id'] . '/' . $val['id_file'] . '/' . $val['id_user']) .'" >Edit</a>' . '<a class="btn btn-sm btn-danger  me-1" href="'. base_url('tambah_file/hapus/' . $val['id_file'] . '/' . $val['id_user']) .'" onclick="return confirm(\'Anda Yakin ingin menghapus?\')">Hapus</a>';

					if ( $val['id_user'] == $this->session->userdata('id_user') ) {
						$row[] = $tombol_edit_hapus . $item;
					}
					else{
						$row[] = $item;
					}
					
				}

				elseif ( $key=='anime_id' ) {
					$row[] = '<a href="' . base_url('judul/?anime_id='.$item) .'" title="Tampilkan seluruh file terkait anime ini">Anime ini</a>';
				}

				elseif ( $key=='episode' ) {
					$row[] = '<a href="' . base_url('episode/?anime_id='.$val['anime_id']) .'&episode='. $item .'" title="Tampilkan seluruh file terkait episode ini">Episode '. $item .'</a>';
				}

				elseif ( $key=='website' ) {
					$row[] = '<a href="' . $item .'" ><i class="bi bi-globe2"></i></a>';
				}

				elseif ( $key=='waktu' ) {
					$tanggal = explode(' ',$item)[0];
					$tanggal_sekarang = date('Y-m-d');
					if ($tanggal==$tanggal_sekarang) {
						$row[] = '<p class="alert alert-success p-0 px-1">'.$item.'</p>';
					} else {
						$row[] = $item;
					}
					
				}

				elseif ( $key=='links' ) {
					$parsed_link = '<button class="form-control form-control-sm" type="button" role="button" onclick="show_links(\'links-'. $val['id_file'] .'\');"><i class="bi bi-download"></i> Download</button><div style="display: none;" id="links-'. $val['id_file'] .'">'; // string
					$exploded_links = array_filter(explode('#pembatas1#',$item)); // convert to array
					foreach ($exploded_links as $key => $link) {
						$link = array_filter( explode('#pembatas2#',$link) );
						$parsed_link .= '<a target="_blank" class="btn btn-sm btn-link mt-1 w-100" href="' . base_url() . 'pengaman/download/'.$val['id_file'].'?redirect=' . base64_encode($link[1]) . '" >'.$link[0].'</a><br>';
					}
					$parsed_link .= '</div>';
					$row[] = $parsed_link;
				}
				
				else {
					$row[] = $item;
				}
				
			}

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->File_model->count_all(),
			"recordsFiltered" => $this->File_model->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

}
