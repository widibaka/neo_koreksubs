<?php

class SinopsisModel extends CI_Model {

	var $table = 'tbl_sinopsis'; //nama tabel dari database

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_sinopsis($anime_id)
	{
		$this->db->where('anime_id', $anime_id);
		$this->db->limit(1);
		$result = $this->db->get($this->table)->row_array()['sinopsis'];
		return $result;
	}

	public function submit_sinopsis($anime_id, $data)
	{
		if ( $this->get_sinopsis($anime_id) ) {
			$this->update($anime_id, $data);
		}
		else {
			$this->insert($data);
		}
	}

	public function update($anime_id, $data)
	{
		$this->db->where('anime_id', $anime_id);
		$this->db->limit(1);
		$result = $this->db->update( $this->table, $data );
		return $result;
	}

	public function insert($data)
	{
		$result = $this->db->insert( $this->table, $data );
		return $result;
	}


}
