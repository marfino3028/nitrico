<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_staff extends CI_Controller {

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
		$this->load->model('kategori_staff_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_staff','Nama kategori_staff','required|is_unique[kategori_staff.nama_kategori_staff]',
			array(	'required'		=> 'Nama kategori_staff harus diisi',
					'is_unique'		=> 'Nama kategori_staff sudah ada. Buat Nama kategori_staff baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Kategori staff',
						'kategori_staff'	=> $this->kategori_staff_model->listing(),
						'content'			=> 'admin/kategori_staff/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_staff'),'dash',TRUE);

			$data = array(	'nama_kategori_staff'	=> $i->post('nama_kategori_staff'),
							'slug_kategori_staff'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_staff_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kategori_staff'),'refresh');
		}
		// End proses masuk database
	}

	// Edit kategori_staff
	public function edit($id_kategori_staff)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_staff','Nama kategori_staff','required',
			array(	'required'		=> 'Nama kategori_staff harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Kategori staff',
						'kategori_staff'	=> $this->kategori_staff_model->detail($id_kategori_staff),
						'content'			=> 'admin/kategori_staff/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_staff'),'dash',TRUE);

			$data = array(	'id_kategori_staff'	=> $id_kategori_staff,
							'nama_kategori_staff'	=> $i->post('nama_kategori_staff'),
							'slug_kategori_staff'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_staff_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kategori_staff'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_kategori_staff) {
		// Proteksi proses delete harus login
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);


		$data = array('id_kategori_staff'	=> $id_kategori_staff);
		$this->kategori_staff_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori_staff'),'refresh');
	}
}

/* End of file Kategori_staff.php */
/* Location: ./application/controllers/admin/Kategori_staff.php */