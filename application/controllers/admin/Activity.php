<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

	// LOAD MODEL
	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$this->log_user->add_log();
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		$this->simple_login->check_login($pengalihan);
		// Ambil check login dari simple_login
		$this->load->model('user_log_model');
	}

	// Log
	public function index()	{
		$site 						= $this->konfigurasi_model->listing();
		// Paginasi
		$total 						= $this->user_log_model->total_user();
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'admin/activity/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 4;
		$config['per_page'] 		= 50;
		$config['full_tag_open'] 	= '<ul class="pagination">';
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
		$config['first_url'] 		= base_url().'admin/activity/';
		$this->pagination->initialize($config); 
		$page 			= ($this->uri->segment(4))?($this->uri->segment(4)-1)*$config['per_page']:0;
		$user_log		= $this->user_log_model->user($config['per_page'], $page);
		// End paginasi

		$data = array(	'title'		=> 'Data Log Aktivitas Anda ('.number_format($total->total).')',
						'user_log'	=> $user_log,
						'site'		=> $site,
						'total'		=> $total,
						'pagin' 	=> $this->pagination->create_links(),
						'content'	=> 'admin/activity/index');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

}

/* End of file Activity.php */
/* Location: ./application/controllers/admin/Activity.php */