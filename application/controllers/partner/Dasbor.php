<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$this->log_user->add_log();
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$next_url 		= $this->session->set_userdata('next_url',$url_pengalihan);
		$this->simple_login->cek_login_partner($next_url);
		// Ambil check login dari simple_login
	}

	// Main page
	public function index()
	{
		$data = [	'title'		=> 'Halaman Dashboard',
					'content' 	=> 'partner/dasbor/index' 
				];
		$this->load->view('partner/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */