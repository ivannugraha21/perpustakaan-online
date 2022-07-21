<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BukuModel extends CI_Model {

	function __construct() 
	  {
		parent::__construct();
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
	

	
}

