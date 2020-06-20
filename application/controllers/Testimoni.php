<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('testimoni_model');
	}

	// Testimonial
	public function index()
	{
		$site 						= $this->konfigurasi_model->listing();
		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'testimoni/index/';
		$config['total_rows'] 		= $this->testimoni_model->total_status_testimoni('Publish')->total;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
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
		$config['per_page'] 		= 10;
		$config['first_url'] 		= base_url().'testimoni/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$testimoni 	= $this->testimoni_model->status_testimoni('Publish',$config['per_page'], $page);


		$data = array(	'title'		=> 'Testimoni '.$site->namaweb,
						'deskripsi'	=> 'Testimoni '.$site->namaweb,
						'keywords'	=> 'Testimoni '.$site->namaweb,
						'pagin' 	=> $this->pagination->create_links(),
						'site'		=> $site,
						'testimoni'	=> $testimoni,
						'content'	=> 'testimoni/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Testimoni.php */
/* Location: ./application/controllers/Testimoni.php */