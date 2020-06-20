<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_produk_model');
		$this->load->model('gambar_produk_model');
		$this->load->model('rekening_model');
		$this->load->library('cart');
		$this->load->model('nav_model');
	}

	// Main Page
	public function index()	{
		$site 			= $this->konfigurasi_model->listing();
		$kategori 		= $this->nav_model->nav_kategori_produk();
		$kategori_produk= $this->nav_model->nav_kategori_produk();

		if(isset($_GET['keywords'])) {
			$keywords 	= $this->input->get('keywords');
			$produk 	= $this->produk_model->cari_aktif($keywords);
			$total 		= $this->produk_model->total_cari_aktif($keywords);

			$data = array(	'title'			=> 'Pencarian Produk: '.$this->security->xss_clean($keywords),
							'deskripsi'		=> 'Pencarian Produk: '.$this->security->xss_clean($keywords),
							'keywords'		=> 'Pencarian Produk: '.$this->security->xss_clean($keywords),
							'produk'		=> $produk,
							'site'			=> $site,
							'kategori'		=> $kategori,
							'total'			=> $total,
							'content'		=> 'produk/pencarian');
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			// Berita dan paginasi
			$this->load->library('pagination');
			$config['base_url'] 		= base_url().'produk/index/';
			$config['total_rows'] 		= count($this->produk_model->total());
			$config['use_page_numbers'] = TRUE;
			$config['num_links'] 		= 5;
			$config['uri_segment'] 		= 3;
			$config['per_page'] 		= 16;
			$config['full_tag_open'] 	= '<ul class="pagination justify-content-center" style="margin:20px 0">';
			$config['full_tag_close'] 	= "</ul>";
			$config['num_tag_open'] 	= '<li class="page-item">';
			$config['num_tag_close'] 	= '</li>';
			$config['cur_tag_open'] 	= '<li class="page-item"><li  class="page-item disabled"><a href="#" class="page-link disabled">';
			$config['cur_tag_close'] 	= '<span class="sr-only"></span></a></li>';
			$config['next_tag_open'] 	= '<li class="page-item">';
			$config['next_tagl_close'] 	= '</li>';
			$config['prev_tag_open'] 	= '<li class="page-item">';
			$config['prev_tagl_close'] 	= '</li>';
			$config['first_tag_open'] 	= '<li class="page-item">';
			$config['first_tagl_close'] = '</li>';
			$config['last_tag_open'] 	= '<li class="page-item">';
			$config['last_tagl_close'] 	= '</li>';
			$config['attributes'] 		= array('class' => 'page-link');
			$config['first_url'] 		= base_url().'produk/';
			$this->pagination->initialize($config); 
			$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
			$produk 	= $this->produk_model->produk($config['per_page'], $page);

			$data = array(	'title'			=> 'Produk di '.$site->namaweb,
							'deskripsi'		=> 'Produk di '.$site->namaweb,
							'keywords'		=> 'Produk di '.$site->namaweb,
							'pagin' 		=> $this->pagination->create_links(),
							'produk'		=> $produk,
							'site'			=> $site,
							'kategori'		=> $kategori,
							'kategori_produk'=> $kategori_produk,
							'content'		=> 'produk/index');
			$this->load->view('layout/wrapper', $data, FALSE);
		}
	}

	// Urutkan
	public function urutkan($kolom,$urutan)
	{
		$site 			= $this->konfigurasi_model->listing();
		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'produk/urutkan/'.$kolom.'/'.$urutan.'/index/';
		$config['total_rows'] 		= count($this->produk_model->total());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 6;
		$config['per_page'] 		= 16;
		$config['full_tag_open'] 	= '<ul class="pagination justify-content-center" style="margin:20px 0">';
		$config['full_tag_close'] 	= "</ul>";
		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item"><li  class="page-item disabled"><a href="#" class="page-link disabled">';
		$config['cur_tag_close'] 	= '<span class="sr-only"></span></a></li>';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tagl_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tagl_close'] 	= '</li>';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tagl_close'] 	= '</li>';
		$config['attributes'] 		= array('class' => 'page-link');
		$config['first_url'] 		= base_url().'produk/urutkan/'.$kolom.'/'.$urutan.'/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(6)) ? ($this->uri->segment(6) - 1) * $config['per_page'] : 0;
		$produk 	= $this->produk_model->urutan($kolom,$urutan,$config['per_page'], $page);

		if($kolom=='harga') {
			$title_awal 	= 'Urutkan berdasarkan harga ';
		}elseif($kolom=='nama') {
			$title_awal 	= 'Urutkan berdasarkan nama ';
		}
		if($urutan=='murah') {
			$title_akhir 	= 'termurah';
		}elseif($urutan=='mahal') {
			$title_akhir 	= 'tertinggi';
		}elseif($urutan=='az') {
			$title_akhir 	= 'A-Z';
		}else{
			$title_akhir 	= 'Z-A';
		}
		$title 				= $title_awal.$title_akhir;

		$data = array(	'title'			=> $title,
						'deskripsi'		=> $title,
						'keywords'		=> $title,
						'pagin' 		=> $this->pagination->create_links(),
						'produk'		=> $produk,
						'site'			=> $site,
						'content'		=> 'produk/index');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Pricelist
	public function pricelist()
	{
		$site 			= $this->konfigurasi_model->listing();
		$kategori_produk= $this->nav_model->nav_kategori_produk();
		$lokasi 		= $this->lokasi_model->aktif();
		$data = array(	'title'				=> 'Daftar Harga Produk di '.$site->namaweb,
						'deskripsi'			=> $site->deskripsi,
						'keywords'			=> $site->keywords,
						'site'				=> $site,
						'lokasi'			=> $lokasi,
						'kategori_produk'	=> $kategori_produk,
						'isi'				=> 'produk/pricelist'
			);
		$this->load->view('layout/wrapper', $data);
	}

	// Pricelist
	public function katalog()
	{
		$site 			= $this->konfigurasi_model->listing();
		$kategori_produk= $this->nav_model->nav_kategori_produk();
		$lokasi 		= $this->lokasi_model->aktif();
		$rekening 		= $this->rekening_model->listing();

		$data = array(	'title'				=> 'Daftar Harga Produk di '.$site->namaweb,
						'deskripsi'			=> $site->deskripsi,
						'keywords'			=> $site->keywords,
						'site'				=> $site,
						'lokasi'			=> $lokasi,
						'kategori_produk'	=> $kategori_produk,
						'rekening'			=> $rekening
			);
		// $this->load->view('produk/katalog', $data);
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->SetHTMLHeader('
				<div style="text-align: right; font-weight: bold;font-family: Arial; color: orange;border-bottom: solid thin #EEE; padding-bottom: 5px;">
				    '.strtoupper($site->namaweb.' | '.$site->telepon.' | '.$site->email).'
				</div>');
		$mpdf->SetHTMLFooter('
				<div style="text-align: center; font-weight: bold;font-family: Arial; color: orange;border-top: solid thin #EEE; padding-top: 5px;">
				    '.$site->website.'
				</div>');
	    $html = $this->load->view('produk/katalog',$data,true);
	    $mpdf->WriteHTML($html);
	    $nama_file = 'Daftar Harga Produk '.$site->namaweb.'.pdf';
	    $mpdf->Output($nama_file, 'I'); 
	}

	// Cari
	public function cari()
	{
		$site 		= $this->konfigurasi_model->listing();
		$keyword 	= $this->security->xss_clean(strip_tags($this->input->get('keywords')));
		$keywords 	= $keyword;
		$produk 	= $this->produk_model->pencarian($keywords);

		$data = array(	'title'			=> 'Hasil pencarian: '.$keywords,
						'deskripsi'		=> 'Hasil pencarian: '.$keywords,
						'keywords'		=> 'Hasil pencarian: '.$keywords,
						'pagin' 		=> '',
						'produk'		=> $produk,
						'site'			=> $site,
						'content'		=> 'produk/index');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	

	// Kategori Page
	public function kategori($slug_kategori_produk)	{
		$site 				= $this->konfigurasi_model->listing();
		$kategori			= $this->kategori_produk_model->read($slug_kategori_produk);
		if(!$kategori) {
			redirect(base_url('produk'),'refresh');
		}
		$list_kategori 		= $this->nav_model->nav_kategori_produk();
		$id_kategori_produk	= $kategori->id_kategori_produk;
		$total_kategori 	= $this->produk_model->total_kategori($id_kategori_produk);
		// echo $total_kategori->total_kategori.'anggie';

		// Berita dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'produk/kategori/'.$slug_kategori_produk.'/index/';
		$config['total_rows'] 		= $total_kategori->total_kategori;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 5;
		$config['per_page'] 		= 16;
		$config['full_tag_open'] 	= '<ul class="pagination justify-content-center" style="margin:20px 0">';
		$config['full_tag_close'] 	= "</ul>";
		$config['num_tag_open'] 	= '<li class="page-item">';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="page-item"><li  class="page-item disabled"><a href="#" class="page-link disabled">';
		$config['cur_tag_close'] 	= '<span class="sr-only"></span></a></li>';
		$config['next_tag_open'] 	= '<li class="page-item">';
		$config['next_tagl_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li class="page-item">';
		$config['prev_tagl_close'] 	= '</li>';
		$config['first_tag_open'] 	= '<li class="page-item">';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open'] 	= '<li class="page-item">';
		$config['last_tagl_close'] 	= '</li>';
		$config['attributes'] 		= array('class' => 'page-link');
		$config['first_url'] 		= base_url().'produk/kategori/'.$slug_kategori_produk;
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
		$produk 	= $this->produk_model->kategori($id_kategori_produk, $config['per_page'], $page);

		$data = array(	'title'			=> $kategori->nama_kategori_produk .' ('.$total_kategori->total_kategori.')',
						'deskripsi'		=> 'Kategori: '.$kategori->nama_kategori_produk,
						'keywords'		=> 'Kategori: '.$kategori->nama_kategori_produk,
						'pagin' 		=> $this->pagination->create_links(),
						'kategori'		=> $kategori,
						'produk'		=> $produk,
						'site'			=> $site,
						'list_kategori'	=> $list_kategori,
						'content'		=> 'produk/index');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Detail
	public function detail($slug_produk)	{
		$site 					= $this->konfigurasi_model->listing();
		$produk 				= $this->produk_model->read($slug_produk);
		if(!$produk) {
			redirect(base_url('produk'),'refresh');
		}
		$id_produk				= $produk->id_produk;
		$id_kategori_produk 	= $produk->id_kategori_produk;
		$gambar 				= $this->gambar_produk_model->produk($id_produk);
		$kategori_produk 		= $this->kategori_produk_model->detail($id_kategori_produk);

		// Update hit
		if($produk) {
			$newhits 	= $produk->hits + 1;
			$hit 		= array(	'id_produk'	=> $produk->id_produk,
									'hits'		=> $newhits);
			$this->produk_model->update_hit($hit);
		}
		//  End update hit

		$data = array(	'title'				=> $produk->nama_produk,
						'deskripsi'			=> $produk->deskripsi.', '.$produk->keywords,
						'keywords'			=> $produk->keywords,
						'produk'			=> $produk,
						'gambar'			=> $gambar,
						'gambar2'			=> $gambar,
						'site'				=> $site,
						'id_produk'			=> $id_produk,
						'kategori_produk'	=> $kategori_produk,
						'content'			=> 'produk/detail');
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	// Pricelist
	public function cetak($slug_produk)
	{
		$site 					= $this->konfigurasi_model->listing();
		$produk 				= $this->produk_model->read($slug_produk);
		$id_produk				= $produk->id_produk;
		$id_kategori_produk 	= $produk->id_kategori_produk;
		$gambar 				= $this->gambar_produk_model->produk($id_produk);
		$jadwal_produk 			= $this->jadwal_produk_model->aktif_produk($id_produk);
		$kategori_produk 		= $this->nav_model->nav_kategori_produk();

		$data = array(	'title'				=> 'Daftar Harga Produk di '.$site->namaweb,
						'deskripsi'			=> $site->deskripsi,
						'keywords'			=> $site->keywords,
						'produk'			=> $produk,
						'gambar'			=> $gambar,
						'gambar2'			=> $gambar,
						'site'				=> $site,
						'kategori_produk'	=> $kategori_produk,
						'jadwal_produk'		=> $jadwal_produk,
			);
		// $this->load->view('produk/cetak', $data);
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->SetHTMLHeader('
				<div style="text-align: right; font-weight: bold;font-family: Arial; color: orange;border-bottom: solid thin #EEE; padding-bottom: 5px;">
				    '.strtoupper($site->namaweb.' | '.$site->telepon.' | '.$site->email).'
				</div>');
		$mpdf->SetHTMLFooter('
				<div style="text-align: center; font-weight: bold;font-family: Arial; color: orange;border-top: solid thin #EEE; padding-top: 5px;">
				    '.$site->website.'
				</div>');
	    $html = $this->load->view('produk/cetak',$data,true);
	    $mpdf->WriteHTML($html);
	    $nama_file = 'Daftar Harga Produk '.$site->namaweb.'.pdf';
	    $mpdf->Output($nama_file, 'I'); 
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */