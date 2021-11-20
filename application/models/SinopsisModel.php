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


}
