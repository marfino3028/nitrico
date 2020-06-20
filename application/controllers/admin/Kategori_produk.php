<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk extends CI_Controller {

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
		$this->load->model('kategori_produk_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_produk','Nama kategori produk','required|is_unique[kategori_produk.nama_kategori_produk]',
			array(	'required'		=> 'Nama kategori produk harus diisi',
					'is_unique'		=> 'Nama kategori produk sudah ada. Buat Nama kategori produk baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Kategori produk',
						'kategori_produk'	=> $this->kategori_produk_model->listing(),
						'error'    			=> $this->upload->display_errors(),
						'content'				=> 'admin/kategori_produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
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

			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_produk'),'dash',TRUE);

			$data = array(	'nama_kategori_produk'	=> $i->post('nama_kategori_produk'),
							'slug_kategori_produk'	=> $slug,
							'gambar'				=> $upload_data['uploads']['file_name'],
							'keterangan'			=> $i->post('keterangan'),
							'urutan'				=> $i->post('urutan')
						);
			$this->kategori_produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kategori_produk'),'refresh');
		}}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_produk'),'dash',TRUE);

			$data = array(	'nama_kategori_produk'	=> $i->post('nama_kategori_produk'),
							'slug_kategori_produk'	=> $slug,
							'keterangan'			=> $i->post('keterangan'),
							'urutan'				=> $i->post('urutan')
						);
			$this->kategori_produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kategori_produk'),'refresh');
		}}
		// End proses masuk database
		$data = array(	'title'				=> 'Kategori produk',
						'kategori_produk'	=> $this->kategori_produk_model->listing(),
						'content'				=> 'admin/kategori_produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_kategori_produknya		= $inp->post('id_kategori_produk');

   			for($i=0; $i < sizeof($id_kategori_produknya);$i++) {
				$data = array(	'id_kategori_produk'	=> $id_kategori_produknya[$i]);
   				$this->kategori_produk_model->delete($data);
   			}
   		}
   		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori_produk'),'refresh');
   	}

	// Edit kategori_produk
	public function edit($id_kategori_produk)	{
		$kategori_produk	= $this->kategori_produk_model->detail($id_kategori_produk);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_produk','Nama kategori produk','required',
			array(	'required'		=> 'Nama kategori produk harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Edit Kategori produk',
						'kategori_produk'	=> $kategori_produk,
						'error'    			=> $this->upload->display_errors(),
						'content'				=> 'admin/kategori_produk/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
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

	        //Hapus gambar
	        if($kategori_produk->gambar != "") {
	        	unlink('./assets/upload/image/'.$kategori_produk->gambar);
				unlink('./assets/upload/image/thumbs/'.$kategori_produk->gambar);
	        }
	        // End hapus

			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_produk'),'dash',TRUE);

			$data = array(	'id_kategori_produk'	=> $id_kategori_produk,
							'nama_kategori_produk'	=> $i->post('nama_kategori_produk'),
							'slug_kategori_produk'	=> $slug,
							'gambar'				=> $upload_data['uploads']['file_name'],
							'keterangan'			=> $i->post('keterangan'),
							'urutan'				=> $i->post('urutan')
						);
			$this->kategori_produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kategori_produk'),'refresh');
		}}else{
			$i 		= $this->input;
			$slug 	= url_title($i->post('nama_kategori_produk'),'dash',TRUE);

			$data = array(	'id_kategori_produk'	=> $id_kategori_produk,
							'nama_kategori_produk'	=> $i->post('nama_kategori_produk'),
							'slug_kategori_produk'	=> $slug,
							'keterangan'			=> $i->post('keterangan'),
							'urutan'				=> $i->post('urutan')
						);
			$this->kategori_produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kategori_produk'),'refresh');
		}}
		// End proses masuk database
		$data = array(	'title'				=> 'Edit Kategori produk',
						'kategori_produk'	=> $kategori_produk,
						'content'			=> 'admin/kategori_produk/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete user
	public function delete($id_kategori_produk) {
		$this->simple_login->cek_login();
		$kategori_produk = $this->kategori_produk_model->detail($id_kategori_produk);
		// Proses hapus gambar
		if($kategori_produk->gambar != "") {
			unlink('./assets/upload/image/'.$kategori_produk->gambar);
			unlink('./assets/upload/image/thumbs/'.$kategori_produk->gambar);
		}
		// End hapus gambar
		$data = array('id_kategori_produk'	=> $id_kategori_produk);
		$this->kategori_produk_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/kategori_produk'),'refresh');
	}
}

/* End of file Kategori_produk.php */
/* Location: ./application/controllers/admin/Kategori_produk.php */