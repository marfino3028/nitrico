<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
		$this->load->model('rekening_model');
	}

	// Reseller
	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();
		$rekening 		= $this->rekening_model->listing();

		$data = array(	'title'		=> 'Kontak '.$site->namaweb,
						'deskripsi'	=> 'Kontak '.$site->namaweb,
						'keywords'	=> 'Kontak '.$site->namaweb,
						'site'		=> $site,
						'rekening'	=> $rekening,
						'content'	=> 'kontak/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Konfirmasi.php */
/* Location: ./application/controllers/Konfirmasi.php */