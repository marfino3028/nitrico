<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('galeri_model');
		$this->load->model('funnel_model');
		$this->load->model('testimoni_model');
		$this->load->model('funnel_model');
		$this->load->model('kategori_funnel_model');
	}

	// Review
	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();
		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'review/index/';
		$config['total_rows'] 		= count($this->funnel_model->total_funnel());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 20;
		$config['full_tag_open'] 	= '<ul class="pagination pull-right no-margin">';
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
		$config['first_url'] 		= base_url().'review/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$funnel 	= $this->funnel_model->funnel($config['per_page'], $page);

		$data = array(	'title'			=> 'Review Produk '.$site->namaweb,
						'deskripsi'		=> 'Review Produk '.$site->namaweb,
						'keywords'		=> 'Review Produk '.$site->namaweb,
						'pagin' 		=> $this->pagination->create_links(),
						'funnel'		=> $funnel,
						'site'			=> $site,
						'content'		=> 'funnel/index');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Kategori Page
	public function kategori($slug_kategori_funnel)	{
		$site 				= $this->konfigurasi_model->listing();
		$kategori			= $this->kategori_funnel_model->read($slug_kategori_funnel);
		if(!$kategori) {
			redirect(base_url('funnel'),'refresh');
		}
		$id_kategori_funnel	= $kategori->id_kategori_funnel;
		$total_kategori 	= $this->funnel_model->total_kategori($id_kategori_funnel);
		// echo $total_kategori->total_kategori.'anggie';

		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'review/kategori/'.$slug_kategori_funnel.'/index/';
		$config['total_rows'] 		= $total_kategori->total_kategori;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 5;
		$config['per_page'] 		= 16;
		$config['full_tag_open'] 	= '<ul class="pagination pull-right no-margin">';
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
		$config['first_url'] 		= base_url().'review/kategori/'.$slug_kategori_funnel;
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
		$funnel 	= $this->funnel_model->kategori_funnel($id_kategori_funnel, $config['per_page'], $page);

		$data = array(	'title'				=> $kategori->nama_kategori_funnel .' ('.$total_kategori->total_kategori.')',
						'deskripsi'			=> 'Kategori: '.$kategori->nama_kategori_funnel,
						'keywords'			=> 'Kategori: '.$kategori->nama_kategori_funnel,
						'pagin' 			=> $this->pagination->create_links(),
						'kategori_funnel'	=> $kategori,
						'funnel'			=> $funnel,
						'site'				=> $site,
						'content'			=> 'funnel/kategori');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Review.php */
/* Location: ./application/controllers/Review.php */