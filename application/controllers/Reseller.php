<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller extends CI_Controller {

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

		// Berita dan paginasi
		$total 			= $this->client_model->total_reseller();
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'reseller/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 16;
		$config['full_tag_open'] 	= '<ul class="pagination justify-content-center" style="margin:20px 0">';
		$config['full_tag_close'] 	= "</ul>";
		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item"><li  class="page-item disabled"><a href="#" class="page-link disabled">';
		$config['cur_tag_close'] 	= '<span class="sr-only"></span></a></li>';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tagl_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tagl_close'] 	= '</li>';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tagl_close'] 	= '</li>';
		$config['attributes'] 		= array('class' => 'page-link');
		$config['first_url'] 		= base_url().'reseller/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$client 	= $this->client_model->reseller($config['per_page'], $page);

		$data = array(	'title'		=> 'Reseller dan Distributor '.$site->namaweb,
						'deskripsi'	=> 'Reseller dan Distributor '.$site->namaweb,
						'keywords'	=> 'Reseller dan Distributor '.$site->namaweb,
						'site'		=> $site,
						'pagin' 	=> $this->pagination->create_links(),
						'client'	=> $client,
						'content'	=> 'reseller/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Detail
	public function detail($kode_client)
	{
		$site 	= $this->konfigurasi_model->listing();
		$client = $this->client_model->kode_client($kode_client);

		$data = array(	'title'		=> $client->nama.' ('.$client->jenis_client.')',
						'deskripsi'	=> $client->nama.' ('.$client->jenis_client.')',
						'keywords'	=> $client->nama.' ('.$client->jenis_client.')',
						'site'		=> $site,
						'client'	=> $client,
						'content'	=> 'reseller/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Konfirmasi.php */
/* Location: ./application/controllers/Konfirmasi.php */