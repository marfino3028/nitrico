<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {


	// load data
	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$this->log_user->add_log();
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		$this->simple_login->cek_login_partner($pengalihan);
		// Ambil check login dari simple_login
		$this->load->model('client_model');
	}

	// Main page akun
	public function index()
	{
		$id_client 		= $this->session->userdata('id_client');
		$client 		= $this->client_model->detail($id_client);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Pengguna','required',
			array(	'required'	=> '%s harus diisi'));

		$valid->set_rules('email','Email Pengguna','required|valid_email',
			array(	'required'	=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid. Masukkan email yang benar.'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/client/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Profil Akun Anda: '.$this->session->clientdata('nama'),
						'client'		=> $client,
						'error'		=> $this->upload->display_errors(),
						'content'	=> 'partner/akun/list'
					);
		$this->load->view('partner/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/client/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/client/thumbs/';
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

			$i = $this->input;
			$this->session->set_clientdata('nama',$i->post('nama'));
			$data = array(	'id_client'			=> $id_client,
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'gambar'			=> $upload_data['uploads']['file_name'],
						);
			$this->client_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$client->nama.' telah diupdate');
			redirect(base_url('partner/akun'),'refresh');
		}}else{
			$i = $this->input;
			$this->session->set_clientdata('nama',$i->post('nama'));
			$data = array(	'id_client'			=> $id_client,
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
						);
			$this->client_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$client->nama.' telah diupdate');
			redirect(base_url('partner/akun'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Profil Akun Anda: '.$this->session->userdata('nama'),
						'client'		=> $client,
						'content'		=> 'partner/akun/list'
					);
		$this->load->view('partner/layout/wrapper', $data, FALSE);
	}

	// Main page akun
	public function password()
	{
		$id_client 	= $this->session->clientdata('id_client');
		$client 		= $this->client_model->detail($id_client);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('password','Password','required|trim|min_length[6]|max_length[32]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter'));

		$valid->set_rules('passconf', 'Konfirmasi password', 'required|matches[password]',
			array(	'required'	=> '%s harus diisi',
					'matches'	=> '%s tidak cocok. Pastikan password Anda sama'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Profil Akun Anda: '.$this->session->clientdata('nama'),
						'client'		=> $client,
						'content'		=> 'partner/akun/password'
					);
		$this->load->view('partner/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			
			$i = $this->input;
			$this->session->set_clientdata('nama',$i->post('nama'));
			$data = array(	'id_client'			=> $id_client,
							'password'			=> sha1($i->post('password')),
							'password_hint'		=> $i->post('password')
						);
			$this->client_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$client->nama.' telah diupdate');
			redirect(base_url('partner/akun'),'refresh');
		}
	}

	// Edit
	public function profil()
	{
		$id_client = $this->session->userdata('id_client');
		$client = $this->client_model->detail($id_client);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama client','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/client/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Edit Client: '.$client->nama,
						'error'		=> $this->upload->display_errors(),
						'client'	=> $client,
						'content'		=> 'partner/akun/profil'
					);
		$this->load->view('partner/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/client/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/client/thumbs/';
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

			$i = $this->input;
			$data = array(	'id_client'			=> $id_client,
							'id_user'			=> $this->session->userdata('id_user'),
							'jenis_client'		=> $i->post('jenis_client'),
							'nama'				=> $i->post('nama'),
							'pimpinan'			=> $i->post('pimpinan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'isi_testimoni'		=> $i->post('isi_testimoni'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'status_client'		=> $i->post('status_client'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->client_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$client->nama.' telah diupdate');
			redirect(base_url('partner/akun/profil'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_client'			=> $id_client,
							'id_user'			=> $this->session->userdata('id_user'),
							'jenis_client'		=> $i->post('jenis_client'),
							'nama'				=> $i->post('nama'),
							'pimpinan'			=> $i->post('pimpinan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'status_testimoni'	=> $i->post('status_testimoni'),
							'isi_testimoni'		=> $i->post('isi_testimoni'),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
							'status_client'		=> $i->post('status_client'),
							'keywords'			=> $i->post('keywords'),
							'tempat_lahir'		=> $i->post('tempat_lahir'),
							'tanggal_lahir'		=> date('Y-m-d',strtotime($i->post('tanggal_lahir'))),
						);
			$this->client_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$client->nama.' telah diupdate');
			redirect(base_url('partner/akun/profil'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit Client: '.$client->nama,
						'client'	=> $client,
						'content'		=> 'partner/akun/profil'
					);
		$this->load->view('partner/layout/wrapper', $data, FALSE);
	}
}

/* End of file Akun.php */
/* Location: ./application/controllers/admin/Akun.php */