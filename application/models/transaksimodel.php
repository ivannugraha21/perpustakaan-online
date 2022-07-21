<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiModel extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	
	function getData() {
		$this->db->select('*');
		$query = $this->db->get('data_transaksi');
		//
		if ($query->num_rows() != 0) {	
			$query = $query->result();
			// Get Data Buku
			foreach ($query as $key => $val) {
				$this->db->select('*');
				$this->db->where('id', $val->buku_id);
				$buku = $this->db->get('data_buku');
				$buku = $buku->result()[0];
				$query[$key]->buku = $buku;
				
			}
			return $query;
		} else {
			return false;
		}
	}
	
	function Pengembalian($data) {
		$this->db->select('*');
		$query = $this->db->get_where('data_transaksi', array('id' => $data['id']));
		//
		if ($query->num_rows() != 0) {	
			$query = $query->result()[0];
			// Update Data Transaksi
			$this->db->where('id', $query->id);
			$this->db->update('data_transaksi', array('tanggal_kembali' => $data['ArrDate']));
			// Update Data Buku
			$this->db->where('id', $query->buku_id);
			$this->db->update('data_buku', array('status' => 1));
			//
			return true;
		} else {
			return false;
		}
	}
	
	
	function PinjamBuku($data) {
		// Insert Data Transaksi
		$this->db->insert('data_transaksi', $data);
		// Update Data Buku
		$this->db->where('id', $data['buku_id']);
		$this->db->update('data_buku', array('status' => 0));
		//
		return true;
	}
	
	
	
	
	
	
	
	function InputBuku($data) {
		$data['status'] = 1;
		$data['buku_lama'] = intval($data['buku_lama']);
		
		$this->db->insert('data_buku', $data);
		
		return true;
	}
	
	
	function DetailBuku($data) {
		$this->db->select('*');
		$query = $this->db->get_where('data_buku', array('id' => $data), 1);
		//
		if ($query->num_rows() == 1) {	
			$query = $query->result()[0];
			return $query;
		} else {
			return false;
		}
	}
	
	function DetailBukuAll() {
		$this->db->select('*');
		$query = $this->db->get('data_buku');
		//
		if ($query->num_rows() != 0) {	
			$query = $query->result();
			return $query;
		} else {
			return false;
		}
	}
	
	function UpdateBuku($data) {
		$this->db->where('id', $data['id']);
		$this->db->update('data_buku', $data);

		return true;
	}
	
	function DeleteBuku($data) {
		$this->db->select('*');
		$query = $this->db->get_where('data_buku', array('id' => $data), 1);
		//
		if ($query->num_rows() == 1) {	
			$this->db->delete('data_buku', array('id' => $data));
			return true;
		} else {
			return false;
		}
	}
	
	
	
	
	
	
	function register($data) {
		
		$this->db->select('*');
		$query = $this->db->get_where('data_users', array('username' => $data["email"]), 1);
		//
		if ($query->num_rows() == 1) {		
			return false;
		} else {
			$data = array(
				"nama" => $data["name"],
				"username" => $data["email"],
				"password" => password_hash($data["password"], PASSWORD_DEFAULT),
				//"date_created" => $date,
			);
			$this->db->insert('data_users', $data);
			return true;
		}
		
		
		
	}

}

