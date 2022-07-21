<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// $this->load->view('dashboard');
		$this->load->view('dashboard');
	}

	public function login() {
		// under construction
		$this->load->view('login');
	}
	
	public function data_buku() {
		// under construction
		$this->load->view('data-buku');
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */