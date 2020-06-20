<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->database();
	}
	
	// Login
	public function login($username, $password, $pengalihan) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('users', array(
										'username' => $username, 
										'password' => sha1($password)
										));
										
		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM users WHERE username = "'.$username.'" AND password = "'.sha1($password).'"');
			$admin 		= $row->row();
			$id 		= $admin->id_user;
			$nama		= $admin->nama;
			$level		= $admin->akses_level;
			$referensi 	= $admin->referensi;
			$foto 		= $admin->gambar;
			$foto_profil= base_url('assets/upload/user/thumbs/'.$admin->gambar);
			$id_staff 	= $admin->id_staff;
			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('username', $username); 
			$this->CI->session->set_userdata('id_staff', $id_staff); 
			$this->CI->session->set_userdata('akses_level', $level); 
			$this->CI->session->set_userdata('referensi', $referensi);
			$this->CI->session->set_userdata('nama', $nama); 
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			$this->CI->session->set_userdata('id_user', $id);
			$this->CI->session->set_userdata('foto_profil', $foto_profil);
			$this->CI->session->set_userdata('foto', $foto);
			// Kalau benar di redirect
			if($pengalihan!="") {
				redirect($pengalihan,'refresh');
			}elseif($level=="Kabupaten") {
				redirect(base_url('kabupaten/dasbor'));
			}else{
				redirect(base_url('admin/dasbor'));
			}
		}else{
			$this->CI->session->set_flashdata('warning',
			'Username atau password salah');
			redirect(base_url('login'));
		}
		return false;
	}
	
	// Cek login
	public function cek_login() {
		$pengalihan = str_replace('index.php/', '', current_url());
		$this->CI->session->set_userdata('pengalihan',$pengalihan);

		if($this->CI->session->userdata('username') == '' && 
		$this->CI->session->userdata('akses_level')=='') {
			$this->CI->session->set_flashdata('warning',
			'Oops...silakan login dulu');
			redirect(base_url('login?pengalihan='.$pengalihan));
		}	
	}

	// Login
	public function login_partner($username, $password, $next_url) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('client', array(
										'email' 	=> $username, 
										'password' 	=> sha1($password)
										));
										
		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM client WHERE email = "'.$username.'" AND password = "'.sha1($password).'"');
			$admin 			= $row->row();
			$id 			= $admin->id_client;
			$nama			= $admin->nama;
			$jenis_client	= $admin->jenis_client;
			$foto 			= $admin->gambar;
			$foto_profil 	= base_url('assets/upload/client/thumbs/'.$admin->gambar);
			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('username_partner', $username); 
			$this->CI->session->set_userdata('nama_partner', $nama); 
			$this->CI->session->set_userdata('jenis_client', $jenis_client); 
			$this->CI->session->set_userdata('id_login_partner', uniqid(rand()));
			$this->CI->session->set_userdata('id_partner', $id);
			$this->CI->session->set_userdata('id_client', $id);
			$this->CI->session->set_userdata('foto_profil_partner', $foto_profil);
			$this->CI->session->set_userdata('foto_partner', $foto_profil);
			// Kalau benar di redirect
			if($next_url!="") {
				redirect($next_url,'refresh');
			}else{
				redirect(base_url('partner/dasbor'));
			}
		}else{
			$this->CI->session->set_flashdata('warning',
			'Username atau password salah');
			redirect(base_url('signin'));
		}
		return false;
	}

	// Logout
	public function logout_partner() {
		$this->CI->session->unset_userdata('username_partner');
		$this->CI->session->unset_userdata('nama_partner');
		$this->CI->session->unset_userdata('jenis_client');
		$this->CI->session->unset_userdata('referensi');
		$this->CI->session->unset_userdata('id_login_partner');
		$this->CI->session->unset_userdata('id_partner');
		$this->CI->session->unset_userdata('id_client');
		$this->CI->session->unset_userdata('foto_partner');
		$this->CI->session->unset_userdata('foto_profil_partner');
		$this->CI->session->unset_userdata('next_url');
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url('signin'));
	}

	// Cek login
	public function cek_login_partner() {
		$next_url = str_replace('index.php/', '', current_url());
		$this->CI->session->set_userdata('next_url',$next_url);

		if($this->CI->session->userdata('username_partner') == '' && 
		$this->CI->session->userdata('id_client')=='') {
			$this->CI->session->set_flashdata('warning',
			'Oops...silakan login dulu');
			redirect(base_url('signin?next_url='.$next_url));
		}	
	}

	// Cek login
	public function check_login() {
		$pengalihan = str_replace('index.php/', '', current_url());
		$this->CI->session->set_userdata('pengalihan',$pengalihan);

		if($this->CI->session->userdata('username') == '' && 
		$this->CI->session->userdata('akses_level')=='') {
			$this->CI->session->set_flashdata('warning',
			'Oops...silakan login dulu');
			redirect(base_url('login?pengalihan='.$pengalihan));
		}	
	}

	// Cek login
	public function check_pusat() {
		if($this->CI->session->userdata('akses_level')=='Kabupaten' || $this->CI->session->userdata('akses_level')=='Users') {
			$this->CI->session->set_flashdata('sukses',
			'Oops...silakan login dulu');
			redirect(base_url('login'));
		}	
	}

	// Check admin
	public function check_admin()
	{
		if($this->CI->session->userdata('akses_level')=='Admin') {
			
		}else{
			$this->CI->session->set_flashdata('warning',
			'Oops...Hak Akses Anda tidak diijinkan');
			redirect(base_url('login'));
		}
	}
	
	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('id_staff');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('referensi');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('foto');
		$this->CI->session->unset_userdata('foto_profil');
		$this->CI->session->unset_userdata('pengalihan');
		$this->CI->session->set_flashdata('sukses',
		'Terimakasih, Anda berhasil logout');
		redirect(base_url('login'));
	}
	
	
}