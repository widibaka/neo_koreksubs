<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('File_model');
	}

	function index(){
		$data['thead'] = $this->File_model->get_column();

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

				$tombol_edit_hapus = '<a class="btn btn-sm btn-primary rounded-0 ml-2" href="'. base_url('tambah_file/edit/' . $val['anime_id'] . '/' . $item) .'" >Edit</a>' . '<a class="btn btn-sm btn-danger  rounded-0 ml-2" href="'. base_url('tambah_file/hapus/' . $item) .'" onclick="return confirm(\'Anda Yakin ingin menghapus?\')">Hapus</a>';

				if ( $key=='id_user' ) { //<-- pengecualian
					$row[] = '<a href="' . base_url('member/file_by_user?id_user=') . $item . '">' . $this->AuthModel->get_user($item)['name'] . '</a>';
				}

				if ( $key=='id_file' ) {
					if ( $val['id_user'] == $this->session->userdata('id_user') ) {
						$row[] = $item . $tombol_edit_hapus;
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
						$row[] = 'Hari ini';
					} else {
						$row[] = $item;
					}
					
				}

				elseif ( $key=='links' ) {
					$parsed_link = '<button class="form-control form-control-sm" type="button" role="button" onclick="show_links(\'links-'. $val['id_file'] .'\');"><i class="bi bi-download"></i> Download</button><div style="display: none;" id="links-'. $val['id_file'] .'">'; // string
					$exploded_links = array_filter(explode('#pembatas1#',$item)); // convert to array
					foreach ($exploded_links as $key => $link) {
						$link = array_filter( explode('#pembatas2#',$link) );
						$parsed_link .= '<a target="_blank" class="btn btn-sm btn-link mt-1 w-100" href="' . base_url() . 'pengaman?redirect=' . base64_encode($link[1]) . '" >'.$link[0].'</a><br>';
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
