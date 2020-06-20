<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
	}

	// Customer login
	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();

		// Validasi input
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[32]');

		if($this->form_validation->run()) {
			$username 	= strip_tags($this->input->post('username'));
			$password 	= strip_tags($this->input->post('password'));
			$pengalihan = $this->input->post('pengalihan');
			// Proses ke simple login
			$this->simple_login->login_partner($username, $password, $pengalihan);
		}
		// End validasi

		$data = array(	'title'		=> 'Login Customer &amp; Partner',
						'deskripsi'	=> 'Login Customer &amp; Partner',
						'keywords'	=> 'Login Customer &amp; Partner',
						'site'		=> $site,
						'content'	=> 'signin/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Customer login lupa
	public function forgot()
	{
		$site 			= $this->konfigurasi_model->listing();

		$data = array(	'title'		=> 'Lupa Password?',
						'deskripsi'	=> 'Lupa Password',
						'keywords'	=> 'Lupa Password',
						'site'		=> $site,
						'content'	=> 'signin/forgot'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Logout
	public function logout()
	{
		$this->simple_login->logout_partner();
	}

}

/* End of file Signin.php */
/* Location: ./application/controllers/Signin.php */