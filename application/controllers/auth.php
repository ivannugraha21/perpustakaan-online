<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('AuthModel'); // load model 
	}
	  
	public function index() {
		// $this->load->view('dashboard');
		$this->load->view('dashboard');
	}

	public function login() {
		$this->load->view('auth/login');
	}
	
	public function register() {
		$this->load->view('auth/register');
	}
	
	public function logout() {
		$this->session->unset_userdata('logged_in');
		redirect('login');
	}
	
	
	
	
	
	//
	
	public function post_login() {
		// 
		$data = $this->input->post();
		//
		$cek = $this->AuthModel->login($data);
		
		if ($cek != false) {
			$verify = password_verify($data['password'], $cek->password); 
			//
			if ($verify) {
				$data = array(
					"status" => true,
					"msg" => "Login berhasil!"
				);
				//
				$this->session->set_userdata('logged_in', $cek);
			} else { 
				$data = array(
					"status" => false,
					"msg" => "Kata sandi anda salah!"
				);
			}
		} else {
			$data = array(
				"status" => false,
				"msg" => "Username tidak terdaftar!"
			);
		}
		
		
		
		echo json_encode($data);
	}
	
	public function post_register() {
		$data = $this->input->post();
		//
		$data = $this->AuthModel->register($data);
		
		if ($data != false) {
			$data = array(
				"status" => true,
				"msg" => "Pendaftaran berhasil!"
			);
		} else {
			$data = array(
				"status" => false,
				"msg" => "Username sudah terdaftar!"
			);
		}
		
		echo json_encode($data);
	}
	

}
