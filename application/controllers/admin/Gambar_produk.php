<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar_produk extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gambar_produk_model');
		$this->load->model('produk_model');
		$this->log_user->add_log();
		$this->simple_login->cek_login();
	}

	// Index
	public function index() {
		$this->session->set_flashdata('sukses', 'Untuk menambah gambar, pilih salah satu produk');
		redirect(base_url('admin/produk'),'refresh');
	}

	// Halaman utama
	public function produk($id_produk)	{
		$produk 		= $this->produk_model->detail($id_produk);
		$gambar_produk = $this->gambar_produk_model->produk($id_produk);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('id_produk','Pilih produk','required',
			array(	'required'		=> '%s harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Gambar produk: '.$produk->nama_produk,
						'gambar_produk'		=> $gambar_produk,
						'error'    			=> $this->upload->display_errors(),
						'produk'			=> $produk,
						'content'			=> 'admin/gambar_produk/list');
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

			$data = array(	'nama_gambar_produk'	=> $i->post('nama_gambar_produk'),
							'id_produk'				=> $id_produk,
							'gambar'				=> $upload_data['uploads']['file_name'],
							'keterangan'			=> $i->post('keterangan'),
							'urutan'				=> $i->post('urutan')
						);
			$this->gambar_produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/gambar_produk/produk/'.$id_produk),'refresh');
		}}
		// End proses masuk database
		$data = array(	'title'				=> 'Gambar produk: '.$produk->nama_produk,
						'gambar_produk'		=> $gambar_produk,
						'produk'			=> $produk,
						'content'			=> 'admin/gambar_produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit gambar_produk
	public function edit($id_gambar_produk)	{
		$gambar_produk	= $this->gambar_produk_model->detail($id_gambar_produk);
		$id_produk 		= $gambar_produk->id_produk;
		$produk 		= $this->produk_model->detail($id_produk);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_gambar_produk','Nama gambar produk','required',
			array(	'required'		=> 'Nama gambar produk harus diisi'));

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

		$data = array(	'title'				=> 'Edit Gambar produk: '.$produk->nama_produk,
						'gambar_produk'		=> $gambar_produk,
						'error'    			=> $this->upload->display_errors(),
						'produk'			=> $produk,
						'content'			=> 'admin/gambar_produk/edit');
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
	        if($gambar_produk->gambar != "") {
	        	unlink('./assets/upload/image/'.$gambar_produk->gambar);
				unlink('./assets/upload/image/thumbs/'.$gambar_produk->gambar);
	        }
	        // End hapus

			$i 	= $this->input;

			$data = array(	'id_gambar_produk'		=> $id_gambar_produk,
							'nama_gambar_produk'	=> $i->post('nama_gambar_produk'),
							'gambar'				=> $upload_data['uploads']['file_name'],
							'keterangan'			=> $i->post('keterangan'),
							'urutan'				=> $i->post('urutan')
						);
			$this->gambar_produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/gambar_produk/produk/'.$id_produk),'refresh');
		}}else{
			$i 		= $this->input;
			$slug 	= url_title($i->post('nama_gambar_produk'),'dash',TRUE);

			$data = array(	'id_gambar_produk'		=> $id_gambar_produk,
							'nama_gambar_produk'	=> $i->post('nama_gambar_produk'),
							'keterangan'			=> $i->post('keterangan'),
							'urutan'				=> $i->post('urutan')
						);
			$this->gambar_produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/gambar_produk/produk/'.$id_produk),'refresh');
		}}
		// End proses masuk database
		$data = array(	'title'				=> 'Edit Gambar produk: '.$produk->nama_produk,
						'gambar_produk'		=> $gambar_produk,
						'produk'			=> $produk,
						'content'			=> 'admin/gambar_produk/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete user
	public function delete() {
		$this->simple_login->cek_login();
		$id_produk 				= $this->uri->segment(5);
		$id_gambar_produk 		= $this->uri->segment(4);
		$gambar_produk 			= $this->gambar_produk_model->detail($id_gambar_produk);
		$produk 				= $this->produk_model->detail($id_produk);
		// Proses hapus gambar
		if($gambar_produk->gambar != "") {
			unlink('./assets/upload/image/'.$gambar_produk->gambar);
			unlink('./assets/upload/image/thumbs/'.$gambar_produk->gambar);
		}
		// End hapus gambar
		$data = array('id_gambar_produk'	=> $id_gambar_produk);
		$this->gambar_produk_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/gambar_produk/produk/'.$id_produk),'refresh');
	}
}

/* End of file Gambar_produk.php */
/* Location: ./application/controllers/admin/Gambar_produk.php */