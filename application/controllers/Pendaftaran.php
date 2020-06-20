<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
		$this->load->model('rekening_model');
	}

	// Reseller
	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();
		$rekening 		= $this->rekening_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama client','required',
			array(	'required'	=> '%s harus diisi'));

		$valid->set_rules('email','Username/Email','required|valid_email|is_unique[client.email]|min_length[8]|max_length[32]',
			array(	'required'		=> '%s harus diisi',
					'is_unique'		=> '%s sudah ada. Gunakan email/username yang berbeda',
					'valid_email'	=> '%s tidak benar. Masukkan alamat email yang benar',
					'min_length'	=> '%s minimal 8 karakter',
					'max_length'	=> '%s maksimal 32 karakter'
					));

		$valid->set_rules('password','Password','required|min_length[8]|max_length[32]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 8 karakter',
					'max_length'	=> '%s maksimal 32 karakter'
					));

		$valid->set_rules('telepon','Nomor HP','required|min_length[8]|max_length[32]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 8 karakter',
					'max_length'	=> '%s maksimal 32 karakter'
					));

		if($valid->run()===FALSE) {

		$data = array(	'title'		=> 'Pendaftaran Reseller dan Distributor '.$site->namaweb,
						'deskripsi'	=> 'Pendaftaran Reseller dan Distributor '.$site->namaweb,
						'keywords'	=> 'Pendaftaran Reseller dan Distributor '.$site->namaweb,
						'site'		=> $site,
						'rekening'	=> $rekening,
						'content'	=> 'pendaftaran/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'jenis_client'		=> $i->post('jenis_client'),
							'status_verifikasi'	=> 'Pending',
							'nama'				=> $i->post('nama'),
							'telepon'			=> $i->post('telepon'),
							'email'				=> $i->post('email'),
							'password'			=> sha1($i->post('password')),
							'password_hint'		=> $i->post('password'),
							'status_client'		=> 'No',
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->client_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Pendaftaran berhasil. Silakan login dengan username dan password yang telah Anda buat. Email notifikasi telah dikirimkan. Ada kemungkinan email masuk ke folder SPAM, cek folder SPAM pada email Anda');
			redirect(base_url('signin'),'refresh');
		}
	}

}

/* End of file Konfirmasi.php */
/* Location: ./application/controllers/Konfirmasi.php */