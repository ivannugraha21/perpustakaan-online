<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AuthModel extends CI_Model {

	function __construct() 
	  {
		parent::__construct();
	  }
	
	
	function login($data) {
		$data = array(
			"username" => $data["email"]
		);
		// Check User 
		$this->db->select('*');
		$query = $this->db->get_where('data_users', $data, 1);
		
		if ($query->num_rows() == 1) {		
			$query = $query->result();
			return $query[0];	
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

