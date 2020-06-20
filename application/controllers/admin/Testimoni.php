<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

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
		$this->load->model('testimoni_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_client','Nama Testimoni','required|is_unique[testimoni.nama_client]',
			array(	'required'		=> 'Nama Testimoni harus diisi',
					'is_unique'		=> 'Nama Testimoni sudah ada. Buat Nama Testimoni baru!'));

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

		$data = array(	'title'			=> 'Testimoni',
						'testimoni'		=> $this->testimoni_model->listing(),
						'error'    		=> $this->upload->display_errors(),
						'content'		=> 'admin/testimoni/list');
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

			$data = array(	'nama_client'		=> $i->post('nama_client'),
							'nama_produk'		=> $i->post('nama_produk'),
							'keterangan'		=> $i->post('keterangan'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'video'				=> $i->post('video'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'urutan'			=> $i->post('urutan'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->testimoni_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/testimoni'),'refresh');
		}}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_client'),'dash',TRUE);

			$data = array(	'nama_client'		=> $i->post('nama_client'),
							'nama_produk'		=> $i->post('nama_produk'),
							'keterangan'		=> $i->post('keterangan'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'video'				=> $i->post('video'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'urutan'			=> $i->post('urutan'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->testimoni_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/testimoni'),'refresh');
		}}
		// End proses masuk database
		$data = array(	'title'				=> 'Testimoni',
						'testimoni'	=> $this->testimoni_model->listing(),
						'content'				=> 'admin/testimoni/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_testimoninya		= $inp->post('id_testimoni');

   			for($i=0; $i < sizeof($id_testimoninya);$i++) {
				$data = array(	'id_testimoni'	=> $id_testimoninya[$i]);
   				$this->testimoni_model->delete($data);
   			}
   		}
   		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/testimoni'),'refresh');
   	}

	// Edit testimoni
	public function edit($id_testimoni)	{
		$testimoni	= $this->testimoni_model->detail($id_testimoni);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_client','Nama Testimoni','required',
			array(	'required'		=> 'Nama Testimoni harus diisi'));

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

		$data = array(	'title'		=> 'Edit Testimoni',
						'testimoni'	=> $testimoni,
						'error'    	=> $this->upload->display_errors(),
						'content'	=> 'admin/testimoni/edit');
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
			$slug 	= url_title($i->post('nama_client'),'dash',TRUE);

			$data = array(	'id_testimoni'		=> $id_testimoni,
							'nama_client'		=> $i->post('nama_client'),
							'nama_produk'		=> $i->post('nama_produk'),
							'keterangan'		=> $i->post('keterangan'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'video'				=> $i->post('video'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'urutan'			=> $i->post('urutan'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->testimoni_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/testimoni'),'refresh');
		}}else{
			$i 		= $this->input;
			$slug 	= url_title($i->post('nama_client'),'dash',TRUE);

			$data = array(	'id_testimoni'		=> $id_testimoni,
							'nama_client'		=> $i->post('nama_client'),
							'nama_produk'		=> $i->post('nama_produk'),
							'keterangan'		=> $i->post('keterangan'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'video'				=> $i->post('video'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'urutan'			=> $i->post('urutan'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->testimoni_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/testimoni'),'refresh');
		}}
		// End proses masuk database
		$data = array(	'title'		=> 'Edit Testimoni',
						'testimoni'	=> $testimoni,
						'content'	=> 'admin/testimoni/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete user
	public function delete($id_testimoni) {
		$this->simple_login->cek_login();
		$testimoni = $this->testimoni_model->detail($id_testimoni);
		// Proses hapus gambar
		if($testimoni->gambar != "") {
			unlink('./assets/upload/image/'.$testimoni->gambar);
			unlink('./assets/upload/image/thumbs/'.$testimoni->gambar);
		}
		// End hapus gambar
		$data = array('id_testimoni'	=> $id_testimoni);
		$this->testimoni_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/testimoni'),'refresh');
	}
}

/* End of file Testimoni.php */
/* Location: ./application/controllers/admin/Testimoni.php */