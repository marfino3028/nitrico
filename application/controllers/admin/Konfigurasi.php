<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$this->log_user->add_log();
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		$this->simple_login->check_login($pengalihan);
		// Ambil check login dari simple_login
		$this->load->model('konfigurasi_model');
	}

	// General Configuration
	public function index() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('namaweb','Website name website','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Configuration',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/list');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'namaweb'			=> $i->post('namaweb'),
							'nama_singkat'		=> $i->post('nama_singkat'),
							'singkatan'			=> $i->post('singkatan'),
							'tagline'			=> $i->post('tagline'),
							'tagline2'			=> $i->post('tagline2'),
							'tentang'			=> $i->post('tentang'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'email_cadangan'	=> $i->post('email_cadangan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'hp'				=> $i->post('hp'),
							'fax'				=> $i->post('fax'),
							'deskripsi'			=> $i->post('deskripsi'),
							'keywords'			=> $i->post('keywords'),
							'metatext'			=> $i->post('metatext'),
							'facebook'			=> $i->post('facebook'),
							'twitter'			=> $i->post('twitter'),
							'instagram'			=> $i->post('instagram'),
							'nama_facebook'		=> $i->post('nama_facebook'),
							'nama_twitter'		=> $i->post('nama_twitter'),
							'nama_instagram'	=> $i->post('nama_instagram'),
							'google_map'		=> $i->post('google_map'),
							'text_bawah_peta'	=> $i->post('text_bawah_peta'),
							'link_bawah_peta'	=> $i->post('link_bawah_peta'),
							'cara_pesan'		=> $i->post('cara_pesan'),
							'id_user'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/konfigurasi'));
		}
	}

	// General Configuration
	public function email() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('smtp_user','User email','required');
		$this->form_validation->set_rules('smtp_pass','Password Email','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'		=> 'Email Setting',
						'site'		=> $site,
						'content'	=> 'admin/konfigurasi/email');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'protocol'			=> $i->post('protocol'),
							'smtp_host'			=> $i->post('smtp_host'),
							'smtp_port'			=> $i->post('smtp_port'),
							'smtp_timeout'		=> $i->post('smtp_timeout'),
							'smtp_user'			=> $i->post('smtp_user'),
							'smtp_pass'			=> $i->post('smtp_pass'),
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Data Email telah diupdate');
			redirect(base_url('admin/konfigurasi/email_setting'));
		}
	}

	// General Configuration
	public function email_setting() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('smtp_user','User email','required');
		$this->form_validation->set_rules('smtp_pass','Password Email','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'Email Setting',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/email');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'protocol'			=> $i->post('protocol'),
							'smtp_host'			=> $i->post('smtp_host'),
							'smtp_port'			=> $i->post('smtp_port'),
							'smtp_timeout'		=> $i->post('smtp_timeout'),
							'smtp_user'			=> $i->post('smtp_user'),
							'smtp_pass'			=> $i->post('smtp_pass'),
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Data Email telah diupdate');
			redirect(base_url('admin/konfigurasi/email_setting'));
		}
	}

	// General Configuration
	public function prolog() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('id_konfigurasi','Website name website','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'Konfigurasi Prolog',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/prolog');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'prolog_topik'		=> $i->post('prolog_topik'),
							'prolog_sekretariat'=> $i->post('prolog_sekretariat'),
							'prolog_aksi'		=> $i->post('prolog_aksi'),
							'prolog_kolaborasi'	=> $i->post('prolog_kolaborasi'),
							'prolog_sebaran'	=> $i->post('prolog_sebaran'),
							'prolog_agenda'		=> $i->post('prolog_agenda'),
							'prolog_wawasan'	=> $i->post('prolog_wawasan'),
							'id_user'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/konfigurasi/prolog'));
		}
	}

	// General Setting
	public function setting() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('status_buka','Website name website','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'Buka/Tutup Pendaftaran untuk Umum',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/setting');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'tanggal_buka'		=> date('Y-m-d',strtotime($i->post('tanggal_buka'))),
							'tanggal_tutup'		=> date('Y-m-d',strtotime($i->post('tanggal_tutup'))),
							'status_buka'		=> $i->post('status_buka'),
							'id_user'			=> $this->session->userdata('nrk'));
			// print_r($data);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/konfigurasi/setting'));
		}
	}
	
	// New logo
	public function logo() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('logo')) {
				
		$data = array(	'title'	=> 'New logo',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'content' => 'admin/konfigurasi/logo');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				// unlink('./assets/upload/image/'.$site->logo);
				// unlink('./assets/upload/image/thumbs/'.$site->logo);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'logo'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Logo changed');
				redirect(base_url('admin/konfigurasi/logo'));
		}}
		// Default page
		$data = array(	'title'	=> 'New logo',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/logo');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// New logo
	public function pembayaran() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			if(!empty($_FILES['gambar_pembayaran']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar_pembayaran')) {
				
		$data = array(	'title'	=> 'Informasi Pembayaran',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'content' => 'admin/konfigurasi/pembayaran');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$i = $this->input;
				$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
								'judul_pembayaran'	=> $i->post('judul_pembayaran'),
								'isi_pembayaran'	=> $i->post('isi_pembayaran'),
								'gambar_pembayaran'	=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Informasi pembayaran telah diupdate');
				redirect(base_url('admin/konfigurasi/pembayaran'));
		}}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'judul_pembayaran'	=> $i->post('judul_pembayaran'),
							'isi_pembayaran'	=> $i->post('isi_pembayaran'),
							'id_user'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Informasi pembayaran telah diupdate');
			redirect(base_url('admin/konfigurasi/pembayaran'));
		}}
		// Default page
		$data = array(	'title'	=> 'Informasi Pembayaran',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/pembayaran');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Konfigurasi Icon
	public function icon() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
		$data = array(	'title'	=> 'New Icon',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'content' => 'admin/konfigurasi/icon');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				// unlink('./assets/upload/image/'.$site->icon);
				// unlink('./assets/upload/image/thumbs/'.$site->icon);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'icon'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Icon changed');
				redirect(base_url('admin/konfigurasi/icon'));
		}}
		// Default page
		$data = array(	'title'	=> 'New Icon',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/icon');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Gambar Header
	public function gambar() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
				
		$data = array(	'title'	=> 'Gambar Header',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'content' => 'admin/konfigurasi/gambar');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				// unlink('./assets/upload/image/'.$site->gambar);
				// unlink('./assets/upload/image/thumbs/'.$site->gambar);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'gambar'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Logo changed');
				redirect(base_url('admin/konfigurasi/gambar'));
		}}
		// Default page
		$data = array(	'title'	=> 'Gambar Header',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/gambar');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Quote
	public function quote() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('judul_1','Judul Quote 1','required');
		$this->form_validation->set_rules('pesan_1','Pesan Quote 1','required');
		$this->form_validation->set_rules('judul_2','Judul Quote 2','required');
		$this->form_validation->set_rules('pesan_2','Pesan Quote 2','required');
		$this->form_validation->set_rules('judul_3','Judul Quote 3','required');
		$this->form_validation->set_rules('pesan_3','Pesan Quote 3','required');
		$this->form_validation->set_rules('judul_4','Judul Quote 4','required');
		$this->form_validation->set_rules('pesan_4','Pesan Quote 4','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Configuration - Quote Front End',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/quote');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'judul_1'			=> $i->post('judul_1'),
							'pesan_1'			=> $i->post('pesan_1'),
							'judul_2'			=> $i->post('judul_2'),
							'pesan_2'			=> $i->post('pesan_2'),
							'judul_3'			=> $i->post('judul_3'),
							'pesan_3'			=> $i->post('pesan_3'),
							'judul_4'			=> $i->post('judul_4'),
							'pesan_4'			=> $i->post('pesan_4'),
							'judul_5'			=> $i->post('judul_5'),
							'pesan_5'			=> $i->post('pesan_5'),
							'judul_6'			=> $i->post('judul_6'),
							'pesan_6'			=> $i->post('pesan_6'),
							'isi_1'				=> $i->post('isi_1'),
							'isi_2'				=> $i->post('isi_2'),
							'isi_3'				=> $i->post('isi_3'),
							'isi_4'				=> $i->post('isi_4'),
							'isi_5'				=> $i->post('isi_5'),
							'isi_6'				=> $i->post('isi_6'),
							'id_user'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/konfigurasi/quote'));
		}
	}
	
	// New javawebmedia
	public function javawebmedia() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
				
		$data = array(	'title'	=> $site['namaweb'].' Information',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'content' => 'admin/konfigurasi/javawebmedia');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['gambar']);
				unlink('./assets/upload/image/thumbs/'.$site['gambar']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'gambar'		=> $upload_data['uploads']['file_name'],
								'video'			=> $i->post('video'),
								'javawebmedia'			=> $i->post('javawebmedia'),
								'id_user'		=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses',$site['namaweb'].' information changed');
				redirect(base_url('admin/konfigurasi/javawebmedia'));
		}}else{
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'video'			=> $i->post('video'),
								'javawebmedia'			=> $i->post('javawebmedia'),
								'id_user'		=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses',$site['namaweb'].' information changed');
				redirect(base_url('admin/konfigurasi/javawebmedia'));
		}}
		// Default page
		$data = array(	'title'	=> $site['namaweb'].' Information',
						'site'	=> $site,
						'content' => 'admin/konfigurasi/javawebmedia');
		$this->load->view('admin/layout/wrapper',$data);
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */