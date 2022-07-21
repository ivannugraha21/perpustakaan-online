<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('TransaksiModel'); // load model 
	}
	
	public function index() {
		// $this->load->view('dashboard');
		$this->load->view('transaksi/transaksi');
	}

	public function input() {
		$this->load->view('transaksi/input-transaksi');
	}
	
	public function pengembalian() {
		$data = $this->input->post();
		// Send $id To Model
		$data = $this->TransaksiModel->Pengembalian($data);
		// Session Notif
		$data = array(
			"type" => 'success',
			"msg" => "Pengembalian Buku Berhasil!"
		);
		$this->session->set_userdata('notif', $data);
		echo json_encode($data);
	}
	
	
	public function getDataTransaksi() {
		// Get Data transaksi
		$data = $this->TransaksiModel->getData();
		// Return Data
		echo json_encode($data);
	}
	
	public function pinjam_buku() {
		$data = $this->input->post();
		// Get User Id
		$user_id  = ($this->session->userdata['logged_in']->id);
		// Arrange Data
		$data = array(
			'user_id' => $user_id,
			'buku_id' => $data['buku_id'],
			'nama_peminjam' => $data['peminjam'],
			'umur_peminjam' => intval($data['umur_peminjam']),
			'tanggal_pinjam' => $data['tanggal_pinjam_buku'],
			'estimasi_pengembalian' => $data['estimasi_pengembalian'],
			'tanggal_kembali' => null
		);
		// Send Data to Model
		$data = $this->TransaksiModel->PinjamBuku($data);
		// Create Session Notif
		$data = array(
			"type" => 'success',
			"msg" => "Berhasil Input Data Transaksi!"
		);
		$this->session->set_userdata('notif', $data);
		// Return
		echo json_encode($data);
	}
	
}