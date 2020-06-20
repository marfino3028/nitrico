<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
		$this->load->model('rekening_model');
	}

	// Pembayaran
	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();
		$rekening 		= $this->rekening_model->listing();

		$data = array(	'title'		=> $site->judul_pembayaran,
						'deskripsi'	=> $site->judul_pembayaran,
						'keywords'	=> $site->judul_pembayaran,
						'site'		=> $site,
						'rekening'	=> $rekening,
						'content'	=> 'pembayaran/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Konfirmasi
	public function konfirmasi()
	{
		$site 			= $this->konfigurasi_model->listing();
		$rekening 		= $this->rekening_model->listing();

		$data = array(	'title'		=> 'Konfirmasi Pembayaran',
						'deskripsi'	=> 'Konfirmasi Pembayaran',
						'keywords'	=> 'Konfirmasi Pembayaran',
						'site'		=> $site,
						'rekening'	=> $rekening,
						'content'	=> 'pembayaran/konfirmasi'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Konfirmasi.php */
/* Location: ./application/controllers/Konfirmasi.php */