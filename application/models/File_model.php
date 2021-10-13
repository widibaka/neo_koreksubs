<?php

class File_model extends CI_Model {

	var $table = 'tbl_file'; //nama tabel dari database
	// var $column_order = array(null, 'user_nama','user_email','user_alamat'); //field yang ada di table user
	// var $column_search = array('user_nama','user_email','user_alamat'); //field yang diizin untuk pencarian 
	// var $order = array('user_id' => 'asc'); // default order 

	var $column_order = array(); //field yang ada di table
	var $column_search = array(); //field yang diizin untuk pencarian 
	var $order = array(); // default order ... Diurutkan berdasarkan waktu terbaru

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	////////////////////////////////////////////////////////////////////////////

	public function tambah_click_count($id_file)
	{
		$query = $this->db->query('UPDATE '.$this->table.' SET click_count = click_count + 1 WHERE id_file = "'. $id_file . '"');
	}

	public function get_click_count_of_user($id_user)
	{
		$this->db->select_sum('click_count');
		$this->db->where('id_user', $id_user);
		$result = $this->db->get($this->table)->row_array()['click_count'];
		return $result;
	}

	public function blokir_file_by_user($id_user)
	{
		$data = [
			'publish' => 'N',
		];
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->table, $data);
	}

	public function buka_blokir_file($id_user)
	{
		$data = [
			'publish' => 'Y',
		];
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->table, $data);
	}

	// /////////////////////////////////////////////////////////////////////////

	public function get_koleksi($limit=null)
	{
		$this->db->select( 'anime_id' );
		$this->db->order_by( 'waktu', 'DESC' );
		$this->db->limit( $limit );
		$data = $this->db->get( $this->table )->result_array();
		$data2 = [];
		foreach ($data as $key => $value) {
			$data2[] = $value['anime_id'];
		}
		return array_unique($data2);
	}

	public function add($data)
	{
		$data['id_file'] = uniqid();
		$data['waktu'] = date('Y-m-d H:i:s');

		$this->db->insert( $this->table, $data );
	}

	public function update($data, $id_file)
	{
		$data['waktu'] = date('Y-m-d H:i:s');
		
		$this->db->where( 'id_file', $id_file );
		$this->db->limit(1);

		$this->db->update( $this->table, $data );
	}

	public function hapus($id_file)
	{
		$this->db->where( 'id_file', $id_file );
		$this->db->limit(1);
		$this->db->delete( $this->table );
	}

	public function get($id_file)
	{
		$this->db->where( 'id_file', $id_file );
		$this->db->limit(1);
		return $this->db->get( $this->table )->row_array();
	}

	public function get_num_rows_by_id_user($id_user)
	{
		$this->db->where( 'id_user', $id_user );
		return $this->db->get( $this->table )->num_rows();
	}
	// /////////////////////////////////////////////////////////////////////////

	
	public function get_column() //<-- method buatan sendiri
	{
		$this->db->limit(1);
		$data = $this->db->get( $this->table )->row_array();
		$data2 = [];
		foreach ($data as $key => $value) {
			$data2[] = $key;
		}
		return $data2;
	}

	private function _get_datatables_query()
	{
		
		// $this->db->from($this->table);

		// $i = 0;
	
		// foreach ($this->column_search as $item) // loop column 
		// {
		// 	if($_POST['search']['value']) // if datatable send POST for search
		// 	{
				
		// 		if($i===0) // first loop
		// 		{
		// 			$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
		// 			$this->db->like($item, $_POST['search']['value']);
		// 		}
		// 		else
		// 		{
		// 			$this->db->or_like($item, $_POST['search']['value']);
		// 		}

		// 		if(count($this->column_search) - 1 == $i) //last loop
		// 			$this->db->group_end(); //close bracket
		// 	}
		// 	$i++;
		// }
		
		// if(isset($_POST['order'])) // here order processing
		// {
		// 	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		// } 
		// else if(isset($this->order))
		// {
		// 	$order = $this->order;
		// 	$this->db->order_by(key($order), $order[key($order)]);
		// }

		$this->column_order = array_values( $this->get_column() ); // update var column order // pakai array_values() untuk rearrange index yang sudah tidak urut
		$this->column_search = array_values( $this->get_column() ); // update var column order
		$this->order = array( 'waktu' => 'desc'); // update var column order
			$this->db->from($this->table);

			// select specific columns
			$selected_cols = '';
			foreach ($this->column_order as $key => $val) {
				if ( $key != 0 ) { // Kasih koma untuk memisahkan kolom
					$selected_cols .= ',';
				}
				$selected_cols .= $val;
			}
			$this->db->select( $selected_cols );
			// select specific columns end
			
			if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{
						$search_value_exploded = array_filter(explode(' ', $_POST['search']['value']));// kalimatnya dipecah berdasarkan spasi, dan filter / hapus semua array yang kosong
						foreach ($search_value_exploded as $key => $val) { // looping awal
						foreach ($this->column_search as $i => $item)
						{
								if($i==0)
								{
									$this->db->group_start();
										$this->db->like($item, $val);
								}
								else
								{
										$this->db->or_like($item, $val);
								}
								if(count($this->column_search) - 1 == $i) 
										$this->db->group_end(); 
						}
						}
			}
			// echo "<pre>"; var_dump( $this->db->get_compiled_select() ); die();
				
			if(isset($_POST['order'])) 
			{
				// var_dump($_POST['order']); die();
					$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($this->order))
			{
					$order = $this->order;
					$this->db->order_by(key($order), $order[key($order)]);
			}

		
			//KELANJUTAN DEWA
			if ( !empty($this->input->get('anime_id')) ) {
				$this->db->where('anime_id', $this->input->get('anime_id'));
			}
			if ( !empty($this->input->get('episode')) ) {
				$this->db->where('episode', $this->input->get('episode'));
			}
			if ( !empty($this->input->get('id_user')) ) {
				$this->db->where('id_user', $this->input->get('id_user'));
			}

			// pilih yang tidak diblokir
			$this->db->where('publish', 'Y');
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

}
