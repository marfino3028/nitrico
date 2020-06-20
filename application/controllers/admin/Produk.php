<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->log_user->add_log();
		$this->simple_login->cek_login();
		$this->load->model('produk_model');
		$this->load->model('kategori_produk_model');
		$this->load->model('gambar_produk_model');
	}

	// Halaman produk
	public function index()	{
		$kategori_produk 	= $this->kategori_produk_model->listing();

		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'admin/produk/index/';
		$config['total_rows'] 		= $this->produk_model->total_admin()->total;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 4;
		$config['per_page'] 		= 25;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= "</ul>";
		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item"><li  class="page-item disabled"><a href="#" class="page-link disabled btn btn-lg">';
		$config['cur_tag_close'] 	= '<span class="sr-only"></span></a></li>';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tagl_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tagl_close'] 	= '</li>';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tagl_close'] 	= '</li>';
		$config['attributes'] 		= array('class' => 'page-link btn btn-lg');
		$config['first_url'] 		= base_url().'admin/produk/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) * $config['per_page'] : 0;
		$produk 	= $this->produk_model->listing_admin($config['per_page'], $page);

		$data = array(	'title'				=> 'Produk ('.count($produk).')',
						'produk'			=> $produk,
						'kategori_produk'	=> $kategori_produk,
						'pagin' 			=> $this->pagination->create_links(),
						'content'			=> 'admin/produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Cari
	public function cari()
	{
		$site 		= $this->konfigurasi_model->listing();
		$keyword 	= $this->security->xss_clean(strip_tags($this->input->get('keywords')));
		$keywords 	= $keyword;
		$produk 	= $this->produk_model->pencarian_admin($keywords);
		$list_kategori 	= $this->nav_model->nav_kategori_produk();
		$kategori_produk 	= $this->kategori_produk_model->listing();

		$data = array(	'title'		=> 'Hasil pencarian: '.$keywords,
						'deskripsi'	=> 'Hasil pencarian: '.$keywords,
						'keywords'	=> 'Hasil pencarian: '.$keywords,
						'pagin' 	=> '',
						'produk'	=> $produk,
						'site'		=> $site,
						'kategori_produk'	=> $this->kategori_produk_model->listing(),
						'isi'		=> 'admin/produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Halaman produk
	public function slug()	{
		$produk 		= $this->produk_model->listing();
		foreach($produk as $produk) {
		 	$slug 	= url_title($produk->nama_produk.'-'.$produk->id_kategori_produk,'dash',TRUE);
	        $data = array(	'id_produk'				=> $produk->id_produk,
	        				'slug_produk'			=> $slug.'-'.$produk->id_produk,
	        				);
	        $this->produk_model->edit($data);
	    }
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_produknya		= $inp->post('id_produk');

   			for($i=0; $i < sizeof($id_produknya);$i++) {
   				$produk 	= $this->produk_model->detail($id_produknya[$i]);
   				if($produk->gambar !='') {
					unlink('./assets/upload/image/'.$produk->gambar);
					unlink('./assets/upload/image/thumbs/'.$produk->gambar);
				}
				$data = array(	'id_produk'	=> $id_produknya[$i]);
   				$this->produk_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/produk'),'refresh');
   		// PROSES SETTING DRAFT
   		}elseif(isset($_POST['draft'])) {
   			$inp 				= $this->input;
			$id_produknya		= $inp->post('id_produk');

   			for($i=0; $i < sizeof($id_produknya);$i++) {
   				$produk 	= $this->produk_model->detail($id_produknya[$i]);
				$data = array(	'id_produk'		=> $id_produknya[$i],
								'status_produk'	=> 'Draft');
   				$this->produk_model->edit($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah diset untuk tidak dipublikasikan');
   			redirect(base_url('admin/produk'),'refresh');
   		// PROSES SETTING PUBLISH
   		}elseif(isset($_POST['publish'])) {
   			$inp 				= $this->input;
			$id_produknya		= $inp->post('id_produk');

   			for($i=0; $i < sizeof($id_produknya);$i++) {
   				$produk 	= $this->produk_model->detail($id_produknya[$i]);
				$data = array(	'id_produk'		=> $id_produknya[$i],
								'status_produk'	=> 'Publish');
   				$this->produk_model->edit($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dipublikasikan');
   			redirect(base_url('admin/produk'),'refresh');
   		}elseif(isset($_POST['update'])) {
   			$inp 				= $this->input;
			$id_produknya		= $inp->post('id_produk');
			$id_kategori_produk = $inp->post('id_kategori_produk');

   			for($i=0; $i < sizeof($id_produknya);$i++) {
   				$produk 	= $this->produk_model->detail($id_produknya[$i]);
				$data = array(	'id_produk'		=> $id_produknya[$i],
								'id_kategori_produk'	=> $id_kategori_produk,
								'status_produk'	=> 'Publish');
   				$this->produk_model->edit($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dipublikasikan');
   			redirect(base_url('admin/produk'),'refresh');
   		}
	}

	// Kategori produk
	public function kategori($id_kategori_produk)	{
		$produk 		= $this->produk_model->kategori_produk_admin($id_kategori_produk);
		$kategori 		= $this->kategori_produk_model->detail($id_kategori_produk);

		$data = array(	'title'			=> 'Kategori: '.$kategori->nama_kategori_produk. ' ('.count($produk).')',
						'produk'		=> $produk,
						'kategori_produk'	=> $this->kategori_produk_model->listing(),
						'isi'			=> 'admin/produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}


	// Kategori produk
	public function status_produk($status_produk)	{
		$produk 		= $this->produk_model->status_produk_admin($status_produk);

		$data = array(	'title'			=> 'Status: '.$status_produk. ' ('.count($produk).')',
						'produk'		=> $produk,
						'kategori_produk'	=> $this->kategori_produk_model->listing(),
						'isi'			=> 'admin/produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Author produk
	public function author($id_user)	{
		$produk 		= $this->produk_model->author_admin($id_user);
		$user 			= $this->user_model->detail($id_user);

		$data = array(	'title'			=> 'Diupdate oleh: '.$user->nama. ' ('.count($produk).')',
						'produk'		=> $produk,
						'kategori_produk'	=> $this->kategori_produk_model->listing(),
						'isi'			=> 'admin/produk/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Detail produk
	public function detail($id_produk)	{
		$produk 			= $this->produk_model->detail($id_produk);
		$gambar 			= $this->gambar_produk_model->produk($id_produk);

		$data = array(	'title'				=> $produk->nama_produk,
						'gambar_produk'		=> $gambar,
						'produk'			=> $produk);
		$this->load->view('admin/produk/konten', $data, FALSE);		
	}

	// Tambah produk
	public function tambah()	{
		$kategori_produk 	= $this->kategori_produk_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk','Judul','required|is_unique[produk.nama_produk]',
			array(	'required'	=> 'Judul harus diisi',
					'is_unique'	=> 'Mohon maaf, nama produk <strong>'.$this->input->post('nama_produk').
									'</strong> sudah ada. Buat nama produk baru'));
		$valid->set_rules('kode_produk','Kode produk','required|is_unique[produk.kode_produk]',
			array(	'required'	=> '%s harus diisi',
					'is_unique'	=> 'Mohon maaf, kode produk <strong>'.$this->input->post('kode_produk').
									'</strong> sudah ada. Buat kode produk baru'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi produk harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'				=> 'Tambah Produk',
						'kategori_produk'	=> $kategori_produk,
						'error'    			=> $this->upload->display_errors(),
						'content'			=> 'admin/produk/tambah');
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
	        $slug 	= url_title($i->post('nama_produk').'-'.$i->post('id_kategori_produk'),'dash',TRUE);

	        $data = array(	'id_user'				=> $this->session->userdata('id'),
	        				'id_kategori_produk'	=> $i->post('id_kategori_produk'),
	        				'slug_produk'			=> $slug,
	        				'kode_produk'			=> strtoupper(str_replace(' ','',$i->post('kode_produk'))),
	        				'nama_produk'			=> $i->post('nama_produk'),
	        				'status_produk'			=> $i->post('status_produk'),
	        				'satuan'				=> $i->post('satuan'),
	        				'urutan'				=> $i->post('urutan'),
	        				'deskripsi'				=> $i->post('deskripsi'),
	        				'isi'					=> $i->post('isi'),
	        				'harga_jual'			=> $i->post('harga_jual'),
	        				'harga_beli'			=> $i->post('harga_beli'),
	        				'harga_terendah'		=> $i->post('harga_terendah'),
	        				'harga_tertinggi'		=> $i->post('harga_tertinggi'),
	        				'gambar'				=> $upload_data['uploads']['file_name'],
	        				'keywords'				=> $i->post('keywords'),
	        				'mulai_diskon'			=> $this->website->tanggal_input($i->post('mulai_diskon')),
	        				'selesai_diskon'		=> $this->website->tanggal_input($i->post('selesai_diskon')),
	        				'besar_diskon'			=> $i->post('besar_diskon'),
	        				'jenis_diskon'			=> $i->post('jenis_diskon'),
	        				'jumlah_order_min'		=> $i->post('jumlah_order_min'),
	        				'jumlah_order_max'		=> $i->post('jumlah_order_max'),
	        				'stok'					=> $i->post('stok'),
	        				'berat'					=> $i->post('berat'),
	        				'ukuran'				=> $i->post('ukuran'),
	        				'tanggal_post'			=> date('Y-m-d H:i:s')
	        				);
	        $this->produk_model->tambah($data);
	        $this->session->set_flashdata('sukses', 'Data telah ditambah');
	        redirect(base_url('admin/produk'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Tambah Produk',
						'kategori_produk'	=> $kategori_produk,
						'content'			=> 'admin/produk/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Edit produk
	public function edit($id_produk)	{
		$kategori_produk 	= $this->kategori_produk_model->listing();
		$produk 			= $this->produk_model->detail($id_produk); 

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk','Judul','required',
			array(	'required'	=> 'Judul harus diisi'));

		$valid->set_rules('isi','Isi','required',
			array(	'required'	=> 'Isi produk harus diisi'));

		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'					=> 'Edit Produk',
						'kategori_produk'		=> $kategori_produk,
						'produk'				=> $produk,
						'error'    				=> $this->upload->display_errors(),
						'isi'					=> 'admin/produk/edit');
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

	   //      //Hapus gambar
	   //      if($produk->gambar != "") {
	   //      	unlink('./assets/upload/image/'.$produk->gambar);
				// unlink('./assets/upload/image/thumbs/'.$produk->gambar);
	   //      }
	   //      // End hapus

	        $i 		= $this->input;
	         $slug 	= url_title($i->post('nama_produk').'-'.$i->post('id_kategori_produk'),'dash',TRUE);

	        $data = array(	'id_produk'				=> $id_produk,
	        				'id_user'				=> $this->session->userdata('id'),
	        				'id_kategori_produk'	=> $i->post('id_kategori_produk'),
	        				'slug_produk'			=> $slug,
	        				'kode_produk'			=> strtoupper(str_replace(' ','',$i->post('kode_produk'))),
	        				'nama_produk'			=> $i->post('nama_produk'),
	        				'status_produk'			=> $i->post('status_produk'),
	        				'satuan'				=> $i->post('satuan'),
	        				'urutan'				=> $i->post('urutan'),
	        				'deskripsi'				=> $i->post('deskripsi'),
	        				'isi'					=> $i->post('isi'),
	        				'harga_jual'			=> $i->post('harga_jual'),
	        				'harga_beli'			=> $i->post('harga_beli'),
	        				'harga_terendah'		=> $i->post('harga_terendah'),
	        				'harga_tertinggi'		=> $i->post('harga_tertinggi'),
	        				'gambar'				=> $upload_data['uploads']['file_name'],
	        				'keywords'				=> $i->post('keywords'),
	        				'mulai_diskon'			=> $this->website->tanggal_input($i->post('mulai_diskon')),
	        				'selesai_diskon'		=> $this->website->tanggal_input($i->post('selesai_diskon')),
	        				'besar_diskon'			=> $i->post('besar_diskon'),
	        				'jenis_diskon'			=> $i->post('jenis_diskon'),
	        				'jumlah_order_min'		=> $i->post('jumlah_order_min'),
	        				'jumlah_order_max'		=> $i->post('jumlah_order_max'),
	        				'stok'					=> $i->post('stok'),
	        				'berat'					=> $i->post('berat'),
	        				'ukuran'				=> $i->post('ukuran')
	        				);
	        $this->produk_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/produk'),'refresh');
		}}else{
			$i 		= $this->input;
	        $slug 	= url_title($i->post('nama_produk').'-'.$i->post('id_kategori_produk'),'dash',TRUE);

	        $data = array(	'id_produk'				=> $id_produk,
	        				'id_user'				=> $this->session->userdata('id'),
	        				'id_kategori_produk'	=> $i->post('id_kategori_produk'),
	        				'slug_produk'			=> $slug,
	        				'kode_produk'			=> strtoupper(str_replace(' ','',$i->post('kode_produk'))),
	        				'nama_produk'			=> $i->post('nama_produk'),
	        				'status_produk'			=> $i->post('status_produk'),
	        				'satuan'				=> $i->post('satuan'),
	        				'urutan'				=> $i->post('urutan'),
	        				'deskripsi'				=> $i->post('deskripsi'),
	        				'isi'					=> $i->post('isi'),
	        				'harga_jual'			=> $i->post('harga_jual'),
	        				'harga_beli'			=> $i->post('harga_beli'),
	        				'harga_terendah'		=> $i->post('harga_terendah'),
	        				'harga_tertinggi'		=> $i->post('harga_tertinggi'),
	        				// 'gambar'				=> $upload_data['uploads']['file_name'],
	        				'keywords'				=> $i->post('keywords'),
	        				'mulai_diskon'			=> $this->website->tanggal_input($i->post('mulai_diskon')),
	        				'selesai_diskon'		=> $this->website->tanggal_input($i->post('selesai_diskon')),
	        				'besar_diskon'			=> $i->post('besar_diskon'),
	        				'jenis_diskon'			=> $i->post('jenis_diskon'),
	        				'jumlah_order_min'		=> $i->post('jumlah_order_min'),
	        				'jumlah_order_max'		=> $i->post('jumlah_order_max'),
	        				'stok'					=> $i->post('stok'),
	        				'berat'					=> $i->post('berat'),
	        				'ukuran'				=> $i->post('ukuran')
	        				);
	        $this->produk_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/produk'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit Produk',
						'kategori_produk'	=> $kategori_produk,
						'produk'			=> $produk,
						'content'			=> 'admin/produk/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}


	// Delete
	public function delete($id_produk) {
		$this->simple_login->cek_login();
		$produk = $this->produk_model->detail($id_produk);
		// Proses hapus gambar
		if($produk->gambar != "") {
			unlink('./assets/upload/image/'.$produk->gambar);
			unlink('./assets/upload/image/thumbs/'.$produk->gambar);
		}
		// End hapus gambar
		$data = array('id_produk'	=> $id_produk);
		$this->produk_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/produk'),'refresh');
	}
}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */