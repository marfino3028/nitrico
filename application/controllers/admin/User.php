<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// LOAD EXCEL
require('./excel/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// END LOAD EXCEL

class User extends CI_Controller {

	// load data
	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$this->log_user->add_log();
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		$this->simple_login->check_login($pengalihan);
		// Ambil check login dari simple_login
		$this->load->model('user_model');
		$this->load->model('provinsi_model');
		$this->load->model('kabupaten_model');
		$this->load->model('staff_model');
		$this->simple_login->check_admin();
	}

	// Admin page
	public function index()
	{
		$provinsi 	= $this->provinsi_model->listing();
		$kabupaten 	= $this->kabupaten_model->listing();
		$user 		= $this->user_model->listing();
		$total 		= $this->user_model->total();
		$staff 		= $this->staff_model->listing();
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Pengguna','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/user/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Pengguna ('.$total->total.')',
						'user'		=> $user,
						'error'		=> $this->upload->display_errors(),
						'provinsi'	=> $provinsi,
						'kabupaten'	=> $kabupaten,
						'staff'		=> $staff,
						'content'			=> 'admin/user/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/user/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/user/thumbs/';
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
			$data = array(	'id_staff'			=> $i->post('id_staff'),
							'akses_level'		=> $i->post('akses_level'),
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
							'gambar'			=> $upload_data['uploads']['file_name'],
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_staff'			=> $i->post('id_staff'),
							'akses_level'		=> $i->post('akses_level'),
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Pengguna ('.$total->total.')',
						'user'		=> $user,
						'provinsi'	=> $provinsi,
						'kabupaten'	=> $kabupaten,
						'staff'		=> $staff,
						'content'			=> 'admin/user/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		$staff 		= $this->staff_model->listing();
		$provinsi 	= $this->provinsi_model->listing();
		$kabupaten 	= $this->kabupaten_model->listing();
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Pengguna','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/user/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Tambah User',
						'error'		=> $this->upload->display_errors(),
						'provinsi'	=> $provinsi,
						'kabupaten'	=> $kabupaten,
						'staff'		=> $staff,
						'content'			=> 'admin/user/add'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/user/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/user/thumbs/';
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
			$data = array(	'id_staff'			=> $i->post('id_staff'),
							'akses_level'		=> $i->post('akses_level'),
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
							'gambar'			=> $upload_data['uploads']['file_name'],
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_staff'			=> $i->post('id_staff'),
							'akses_level'		=> $i->post('akses_level'),
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah User',
						'provinsi'	=> $provinsi,
						'kabupaten'	=> $kabupaten,
						'staff'		=> $staff,
						'content'			=> 'admin/user/add'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_user)
	{
		$staff 		= $this->staff_model->listing();
		$provinsi 	= $this->provinsi_model->listing();
		$kabupaten 	= $this->kabupaten_model->listing();
		$user 		= $this->user_model->detail($id_user);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Pengguna','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/user/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Edit Pengguna: '.$user->nama,
						'error'		=> $this->upload->display_errors(),
						'user'		=> $user,
						'provinsi'	=> $provinsi,
						'kabupaten'	=> $kabupaten,
						'staff'		=> $staff,
						'content'			=> 'admin/user/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/user/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/user/thumbs/';
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
			$data = array(	'id_user'			=> $id_user,
							'id_staff'			=> $i->post('id_staff'),
							'akses_level'		=> $i->post('akses_level'),
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
							'gambar'			=> $upload_data['uploads']['file_name'],
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$user->nama.' telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}}else{
			$i = $this->input;
			$data = array(	'id_user'			=> $id_user,
							'id_staff'			=> $i->post('id_staff'),
							'akses_level'		=> $i->post('akses_level'),
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
							// 'gambar'			=> $upload_data['uploads']['file_name'],
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$user->nama.' telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit Pengguna: '.$user->nama,
						'user'		=> $user,
						'provinsi'	=> $provinsi,
						'kabupaten'	=> $kabupaten,
						'staff'		=> $staff,
						'content'			=> 'admin/user/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Detail
	public function detail($id_user)
	{
		$user = $this->user_model->detail($id_user);
		// End masuk database
		$data = array(	'title'		=> $user->nama,
						'user'	=> $user,
						'content'			=> 'admin/user/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Cetak
	public function cetak($id_user)
	{
		$site 	= $this->konfigurasi_model->listing();
		$user = $this->user_model->detail($id_user);
		// End masuk database
		$data = array(	'title'		=> $user->nama,
						'user'	=> $user,
						'site'		=> $site,
					);
		// $this->load->view('admin/user/cetak', $data, FALSE);
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->SetHTMLHeader('
				<div style="text-align: right; font-weight: bold;font-family: Arial; color: orange;border-bottom: solid thin #EEE; padding-bottom: 5px;">
				    '.strtoupper($site->namaweb.' | '.$site->telepon.' | '.$site->email).'
				</div>');
		$mpdf->SetHTMLFooter('
				<div style="text-align: center; font-weight: bold;font-family: Arial; color: orange;border-top: solid thin #EEE; padding-top: 5px;">
				    '.$site->website.'
				</div>');
	    $html = $this->load->view('admin/user/cetak',$data,true);
	    $mpdf->WriteHTML($html);
	    $nama_file = $user->nama.'.pdf';
	    $mpdf->Output($nama_file, 'I'); 
	    // $nama_file = 'disposisi-'.$disposisi->id_disposisi;
	    // $mpdf->Output($nama_file.'.pdf','D');
	}

	// Load data
	public function data()
	{
		header('Content-Type: application/json');
		$akses_level = $this->uri->segment(4);
		if($akses_level == FALSE) {
			$user 	= $this->user_model->listing();
			$total 		= $this->user_model->total();
		}else{
			$user 	= $this->user_model->listing($akses_level);
			$total 		= $this->user_model->total($akses_level);
		}
		echo '{"draw":10,"recordsTotal":'.$total->total.',"recordsFiltered":'.count($user).',"data":';
		 echo json_encode($user);
		echo '}';
	}


	// Delete
	public function approval($id_user)
	{
		$user = $this->user_model->detail($id_user);
		$this->load->helper('string');
		$password = strtolower(random_string('alnum', 8));

		if($user->email=="") {
			$username 	= strtolower(str_replace(' ', '', $user->nama));
		}else{
			$username 	= $user->email;
		}
		$data = array(	'id_user'		=> $id_user,
						'id_user'		=> $this->session->userdata('id_user'),
						'email'			=> $username,
						'password'		=> sha1($password),
						'password_hint'	=> $password
					);
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data '.$user->nama.' telah disetujui dan diberi akses');
		redirect(base_url('admin/user'),'refresh');
	}

	// Proses
	public function proses()
	{
		$inp 			= $this->input;
		$id_user		= $inp->post('id_user');
		$pengalihan		= $inp->post('pengalihan');

		for($i=0;$i<sizeof($id_user);$i++) {
			$id_user = $id_user[$i];
			$data = array(	'id_user'	=> $id_user[$i]
						);
			$this->user_model->delete($data);
		}
		$this->session->set_flashdata('sukses', 'Data user telah dihapus');
		redirect($pengalihan,'refresh');
	}

	// Delete
	public function delete($id_user)
	{
		$user = $this->user_model->detail($id_user);
		// if($user->gambar !='') {
		// 	unlink('./assets/upload/user/'.$user->gambar);
		// 	unlink('./assets/upload/user/thumbs/'.$user->gambar);
		// }
		$data = array(	'id_user'	=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/user'),'refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */