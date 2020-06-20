<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	// Login page
	public function index()
	{
		// Validasi input
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[32]');

		if($this->form_validation->run()) {
			$username 	= strip_tags($this->input->post('username'));
			$password 	= strip_tags($this->input->post('password'));
			$pengalihan = $this->input->post('pengalihan');
			// Proses ke simple login
			$this->simple_login->login($username, $password, $pengalihan);
		}
		// End validasi

		$data = array(	'title'		=> 'Halaman Login',
						'site'		=> $this->konfigurasi_model->listing());
		$this->load->view('login/index', $data, FALSE);
	}

	// Lupa Password
	public function lupa()
	{
		$data = array(	'title'		=> 'Lupa Password',
						'site'		=> $this->konfigurasi_model->listing());
		$this->load->view('login/lupa', $data, FALSE);
	}

	// Logout
	public function logout()
	{
		// Panggil library logout
		$this->simple_login->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */