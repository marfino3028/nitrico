<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

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
		$this->load->model('rekening_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank','Nama nama bank','required|is_unique[rekening.nama_bank]',
			array(	'required'		=> 'Nama nama bank harus diisi',
					'is_unique'		=> 'Nama nama bank sudah ada. Buat Nama nama bank baru!'));

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

		$data = array(	'title'			=> 'Data Rekening',
						'rekening'		=> $this->rekening_model->listing(),
						'error'    		=> $this->upload->display_errors(),
						'content'		=> 'admin/rekening/list');
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
			$data = array(	'nama_bank'			=> $i->post('nama_bank'),
							'nomor_rekening'	=> $i->post('nomor_rekening'),
							'atas_nama'			=> $i->post('atas_nama'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'urutan'			=> $i->post('urutan')
						);
			$this->rekening_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/rekening'),'refresh');
		}}else{
			$i 	= $this->input;
			$data = array(	'nama_bank'			=> $i->post('nama_bank'),
							'nomor_rekening'	=> $i->post('nomor_rekening'),
							'atas_nama'			=> $i->post('atas_nama'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'urutan'			=> $i->post('urutan')
						);
			$this->rekening_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/rekening'),'refresh');
		}}
		// End proses masuk database
		$data = array(	'title'				=> 'Data Rekening',
						'rekening'	=> $this->rekening_model->listing(),
						'content'			=> 'admin/rekening/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_rekeningnya		= $inp->post('id_rekening');

   			for($i=0; $i < sizeof($id_rekeningnya);$i++) {
				$data = array(	'id_rekening'	=> $id_rekeningnya[$i]);
   				$this->rekening_model->delete($data);
   			}
   		}
   		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/rekening'),'refresh');
   	}

	// Edit rekening
	public function edit($id_rekening)	{
		$rekening	= $this->rekening_model->detail($id_rekening);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank','Nama nama bank','required',
			array(	'required'		=> 'Nama nama bank harus diisi'));

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

		$data = array(	'title'				=> 'Edit Data Rekening',
						'rekening'	=> $rekening,
						'error'    			=> $this->upload->display_errors(),
						'content'			=> 'admin/rekening/edit');
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
	        if($rekening->gambar != "") {
	        	unlink('./assets/upload/image/'.$rekening->gambar);
				unlink('./assets/upload/image/thumbs/'.$rekening->gambar);
	        }
	        // End hapus
			$i 	= $this->input;
			$data = array(	'id_rekening'		=> $id_rekening,
							'nama_bank'			=> $i->post('nama_bank'),
							'nomor_rekening'	=> $i->post('nomor_rekening'),
							'atas_nama'			=> $i->post('atas_nama'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'urutan'			=> $i->post('urutan')
						);
			$this->rekening_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/rekening'),'refresh');
		}}else{
			$i 		= $this->input;
			$data = array(	'id_rekening'		=> $id_rekening,
							'nama_bank'			=> $i->post('nama_bank'),
							'nomor_rekening'	=> $i->post('nomor_rekening'),
							'atas_nama'			=> $i->post('atas_nama'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'urutan'			=> $i->post('urutan')
						);
			$this->rekening_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/rekening'),'refresh');
		}}
		// End proses masuk database
		$data = array(	'title'				=> 'Edit Data Rekening',
						'rekening'	=> $rekening,
						'content'			=> 'admin/rekening/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete user
	public function delete($id_rekening) {
		$this->simple_login->cek_login();
		$rekening = $this->rekening_model->detail($id_rekening);
		// Proses hapus gambar
		if($rekening->gambar != "") {
			unlink('./assets/upload/image/'.$rekening->gambar);
			unlink('./assets/upload/image/thumbs/'.$rekening->gambar);
		}
		// End hapus gambar
		$data = array('id_rekening'	=> $id_rekening);
		$this->rekening_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/rekening'),'refresh');
	}
}

/* End of file Rekening.php */
/* Location: ./application/controllers/admin/Rekening.php */