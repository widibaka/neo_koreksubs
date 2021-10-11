<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
	public $table = 'tbl_user';
	public function check_user($data='')
	{
		$this->db->where('email', $data['email']);
		$this->db->limit(1);
		$result = $this->db->get( $this->table )->row_array();

		if ( $result == null ) {
			$reg = [ 
				'email' => $data['email'],
				'name' => $data['name'],
			];
			$this->register($reg);
			return $reg;
		}
		return $result;
	}

	public function get_user_aktif()
	{
		$this->db->order_by('waktu_daftar', 'DESC');
		$this->db->where('diblokir', "0");
		$data_new = $this->db->get( $this->table )->result_array();
		return $data_new;
	}

	public function jumlah_user_aktif()
	{
		$this->db->order_by('waktu_daftar', 'DESC');
		$this->db->where('diblokir', "0");
		$this->db->select('id_user');
		$data_new = $this->db->get( $this->table )->num_rows();
		// unset( $data_new['password'] );
		return $data_new;
	}

	public function get_user_diblokir()
	{
		$this->db->order_by('waktu_daftar', 'DESC');
		$this->db->where('diblokir', 1);
		$this->db->not_like('email', '@admin'); // <-- cari yang bukan admin
		$this->db->select('id_user, email, username, password, hp, photo, bukti_mahasiswa, waktu_daftar, terakhir_online');
		$data_new = $this->db->get( $this->table )->result_array();
		// unset( $data_new['password'] );
		return $data_new;
	}

	public function get_user($id_user='')
	{
		$this->db->where('id_user', $id_user);
		$this->db->limit(1);
		$data_new = $this->db->get( $this->table )->row_array();
		return $data_new;
	}
	public function register($data='')
	{
		unset($data['password2']);
		$data['waktu_daftar'] = date('Y-m-d H:i:s');
		$this->db->insert($this->table, $data);
	}
	public function edit_profil($id_user='', $data)
	{
		$data = [
			'username' => $data['username'],
			'hp' => $data['hp'],
		];
		$this->db->where('id_user', $id_user);
		$this->db->update($this->table, $data);
	}
	public function ubah_gambar_profil($id_user, $filename='')
	{
		$data = [
			'photo' => $filename,
		];
		$this->db->where('id_user', $id_user);
		$this->db->update($this->table, $data);
	}
	public function hapus_file_gambar_profil($id_user)
	{
		$dir = 'assets/uploads/foto_profil/';
		$filename = $this->get_user( $id_user )['photo'];
		
		// kalau tidak ada gambar, maka yaudah
		if ( !empty($filename OR $filename != 'user_no_image.jpg' ) ) {
			unlink( $dir . $filename );
			return true;
		}
		return false;
	}


	public function set_terakhir_online($id_user)
	{
		$data = [
			'terakhir_online' => time(),
		];
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->table, $data);
	}
	public function blokir_akun($id_user)
	{
		$data = [
			'diblokir' => 1,
		];
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->table, $data);
	}
	public function buka_blokir_akun($id_user)
	{
		$data = [
			'diblokir' => 0,
		];
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->table, $data);
	}

}
