<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('galeri_model');
		$this->load->model('produk_model');
		$this->load->model('testimoni_model');
	}

	// Main page kontak
	public function index()	{
		$site 			= $this->konfigurasi_model->listing();
		$banner 		= $this->galeri_model->slider();
		$produk 		= $this->produk_model->listing_all();

		$data = array(	'title'		=> $site->namaweb.' | '.$site->tagline,
						'deskripsi'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->tentang,
						'keywords'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
						'site'		=> $site,
						'banner'	=> $banner,
						'produk'	=> $produk,
						'content'	=> 'home/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */