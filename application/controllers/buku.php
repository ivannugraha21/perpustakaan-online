<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buku extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('BukuModel'); // load model 
	}
	
	public function index() {
		// $this->load->view('dashboard');
		$this->load->view('buku/data-buku');
	}

	public function input() {
		// under construction
		$this->load->view('buku/input-buku');
	}
	
	public function edit_buku($data) {
		$data = $this->BukuModel->DetailBuku($data);
		//
		if ($data != false) {
			$this->load->view('buku/edit-buku');
		} else {
			header("location: " . site_url() . 'error');
		}
	}
	
	public function detail($data) {
		// under construction
		$data = $this->BukuModel->DetailBuku($data);
		
		if ($data != false) {
			$this->load->view('buku/detail-buku', $data);
		} else {
			header("location: " . site_url() . 'error');
		}
		
		
	}
	
	public function test($data) {
		// under construction
		$data = $this->BukuModel->DetailBuku($data);
		echo json_encode($data);
	}
	
	
	
	public function get_buku() {
		$data = $this->input->post();
		$data = $this->BukuModel->DetailBuku($data['id']);
		echo json_encode($data);
	}
	
	public function get_buku_all() {
		$data = $this->BukuModel->DetailBukuAll();
		echo json_encode($data);
	}
	
	public function input_buku() {
		$data = $this->input->post();
		$data = $this->BukuModel->InputBuku($data);
		// Session Notif
		$data = array(
			"type" => 'success',
			"msg" => "Input Data Buku Berhasil!"
		);
		$this->session->set_userdata('notif', $data);
		
		echo json_encode($data);
	}
	
	public function update_buku() {
		$data = $this->input->post();
		$data = $this->BukuModel->UpdateBuku($data);
		// Session Notif
		$data = array(
			"type" => 'success',
			"msg" => "Edit Data Buku Berhasil!"
		);
		$this->session->set_userdata('notif', $data);
		//
		echo json_encode($data);
	}

	public function delete_buku($data) {
		$data = $this->BukuModel->DeleteBuku($data);
		//
		if ($data != false) {
			// Session Notif
			$data = array(
				"type" => 'danger',
				"msg" => "Berhasil Hapus Data Buku!"
			);
			$this->session->set_userdata('notif', $data);
			//
			header("location: " . site_url() . 'buku');
		} else {
			header("location: " . site_url() . 'error');
		}
	}
	
	
}