<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funnel extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$this->log_user->add_log();
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		$this->simple_login->check_login($pengalihan);
		// Ambil check login dari simple_login
		$this->load->model('funnel_model');
		$this->load->model('kategori_funnel_model');
	}

	// Halaman funnel
	public function index()	{
		$funnel = $this->funnel_model->listing();
		$data = array(	'title'			=> 'Funnel',
						'funnel'		=> $funnel,
						'content'		=> 'admin/funnel/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Halaman funnel
	public function listing()	{
		$funnel = $this->funnel_model->listing();
		$data = array(	'title'			=> 'Funnel',
						'funnel'		=> $funnel);
		$this->load->view('admin/funnel/listing', $data, FALSE);		
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_funnelnya		= $inp->post('id_funnel');

   			for($i=0; $i < sizeof($id_funnelnya);$i++) {
   				$funnel 	= $this->funnel_model->detail($id_funnelnya[$i]);
   				if($funnel->gambar !='') {
					unlink('./assets/upload/funnel/'.$funnel->gambar);
					unlink('./assets/upload/funnel/thumbs/'.$funnel->gambar);
				}
				$data = array(	'id_funnel'	=> $id_funnelnya[$i]);
   				$this->funnel_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/funnel'),'refresh');
   		// PROSES SETTING DRAFT
   		}
	}

	// Tambah funnel
	public function tambah()	{
		$kategori_funnel = $this->kategori_funnel_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_funnel','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi funnel harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Tambah Konten Funnel',
						'kategori_funnel'	=> $kategori_funnel,
						'error'    			=> $this->upload->display_errors(),
						'content'			=> 'admin/funnel/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 500; // Pixel
	        $config['height']       	= 500; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();
	        $i 		= $this->input;
	        $slug 	= url_title($i->post('judul_funnel'),'dash',TRUE);
	        $data = array(	'id_kategori_funnel'=> $i->post('id_kategori_funnel'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'slug_funnel'		=> $slug,
	        				'judul_funnel'		=> $i->post('judul_funnel'),
	        				'isi'				=> $i->post('isi'),
	        				'gambar'			=> $upload_data['uploads']['file_name'],
	        				'website'			=> $i->post('website'),
	        				'status_funnel'		=> $i->post('status_funnel'),
	        				'tanggal_post'		=> date('Y-m-d H:i:s')
	        				);
	        $this->funnel_model->tambah($data);
	        $this->session->set_flashdata('sukses', 'Data telah ditambah');
	        redirect(base_url('admin/funnel'),'refresh');
		}}else{
			$i 		= $this->input;
	        $slug 	= url_title($i->post('judul_funnel'),'dash',TRUE);
	        $data = array(	'id_kategori_funnel'=> $i->post('id_kategori_funnel'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'slug_funnel'		=> $slug,
	        				'judul_funnel'		=> $i->post('judul_funnel'),
	        				'isi'				=> $i->post('isi'),
	        				'website'			=> $i->post('website'),
	        				'status_funnel'		=> $i->post('status_funnel'),
	        				'tanggal_post'		=> date('Y-m-d H:i:s')
	        				);
	        $this->funnel_model->tambah($data);
	        $this->session->set_flashdata('sukses', 'Data telah ditambah');
	        redirect(base_url('admin/funnel'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Tambah Konten Funnel',
						'kategori_funnel'	=> $kategori_funnel,
						'content'			=> 'admin/funnel/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Edit funnel
	public function edit($id_funnel)	{
		$kategori_funnel 	= $this->kategori_funnel_model->listing();
		$funnel 	= $this->funnel_model->detail($id_funnel); 

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_funnel','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi funnel harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Edit Konten Funnel',
						'kategori_funnel'	=> $kategori_funnel,
						'funnel'			=> $funnel,
						'error'    			=> $this->upload->display_errors(),
						'content'			=> 'admin/funnel/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 360; // Pixel
	        $config['height']       	= 360; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();
	        $i 		= $this->input;
	        $slug 	= url_title($i->post('judul_funnel'),'dash',TRUE);
	        $data = array(	'id_funnel'			=> $id_funnel,
	        				'id_kategori_funnel'=> $i->post('id_kategori_funnel'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'slug_funnel'		=> $slug,
	        				'judul_funnel'		=> $i->post('judul_funnel'),
	        				'isi'				=> $i->post('isi'),
	        				'gambar'			=> $upload_data['uploads']['file_name'],
	        				'website'			=> $i->post('website'),
	        				'status_funnel'		=> $i->post('status_funnel'),
	        				);
	        $this->funnel_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/funnel'),'refresh');
		}}else{
			$i 		= $this->input;
			$slug 	= url_title($i->post('judul_funnel'),'dash',TRUE);
	        $data = array(	'id_funnel'			=> $id_funnel,
	        				'id_kategori_funnel'=> $i->post('id_kategori_funnel'),
	        				'id_user'			=> $this->session->userdata('id_user'),
	        				'slug_funnel'		=> $slug,
	        				'judul_funnel'		=> $i->post('judul_funnel'),
	        				'isi'				=> $i->post('isi'),
	        				'website'			=> $i->post('website'),
	        				'status_funnel'		=> $i->post('status_funnel'),
	        				);
	        $this->funnel_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/funnel'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit Konten Funnel',
						'kategori_funnel'	=> $kategori_funnel,
						'funnel'			=> $funnel,
						'content'			=> 'admin/funnel/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}


	// Delete
	public function delete($id_funnel) {
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);

		$funnel = $this->funnel_model->detail($id_funnel);
		// Proses hapus gambar
		if($funnel->gambar=="") {
		}else{
			// unlink('./assets/upload/image/'.$funnel->gambar);
			// unlink('./assets/upload/image/thumbs/'.$funnel->gambar);
		}
		// End hapus gambar
		$data = array('id_funnel'	=> $id_funnel);
		$this->funnel_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/funnel'),'refresh');
	}
}

/* End of file Funnel.php */
/* Location: ./application/controllers/admin/Funnel.php */