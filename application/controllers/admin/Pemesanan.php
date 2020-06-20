<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$this->log_user->add_log();
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		$this->simple_login->check_login($pengalihan);
		// End
		$this->load->model('pemesanan_model');
		$this->load->model('client_model');
		$this->load->library('pagination');
	}

	// Data pemesanan
	public function index()
	{
		// Start
		$total 						= $this->pemesanan_model->total();
		$config['base_url'] 		= base_url().'admin/pemesanan/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 4;
		$config['per_page'] 		= 25;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= "</ul>";
		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item"><li  class="page-item disabled"><a href="#" class="page-link disabled btn btn-lg">';
		$config['cur_tag_close'] 	= '<span class="sr-only"></span></a></li>';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tagl_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tagl_close'] 	= '</li>';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tagl_close'] 	= '</li>';
		$config['attributes'] 		= array('class' => 'page-link btn btn-lg');
		$config['first_url'] 		= base_url().'admin/pemesanan/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) * $config['per_page'] : 0;
		$pemesanan 	= $this->pemesanan_model->pemesanan($config['per_page'], $page);
		// End
		$data = array(	'title'		=> 'Data Pemesanan ('.$total->total.')',
						'pemesanan'	=> $pemesanan,
						'pagin' 	=> $this->pagination->create_links(),
						'content'	=> 'admin/pemesanan/index'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/admin/Pemesanan.php */