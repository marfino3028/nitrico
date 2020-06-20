<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Menu utama
	public function nav_menu() {
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Sub menu
	public function nav_sub_menu($id_menu) {
		$this->db->select('*');
		$this->db->from('sub_menu');
		$this->db->where('id_menu',$id_menu);
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing
	public function nav_anggota()
	{
		$this->db->select('anggota.*,
							COUNT(staff.id_staff) AS total_staff,
							provinsi.nama_provinsi');
		$this->db->from('anggota');
		$this->db->join('provinsi', 'provinsi.id_provinsi = anggota.id_provinsi', 'left');
		$this->db->join('staff', 'staff.id_anggota = anggota.id_anggota', 'left');
        $this->db->group_by('anggota.id_anggota');
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function nav_mitra()
	{
		$this->db->select('*');
		$this->db->from('mitra');
		$this->db->order_by('urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	

	// Navigasi profil
	public function nav_profil() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'jenis_berita'	=> 'Profil',
								'status_berita'	=> 'Publish'));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi profil
	public function nav_layanan() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'jenis_berita'	=> 'Layanan',
								'status_berita'	=> 'Publish'));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi profil
	public function nav_topik() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'jenis_berita'	=> 'Topik Prioritas',
								'status_berita'	=> 'Publish'));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi produk
	public function nav_produk() {
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where(array(	'status_produk'	=> 'Publish'));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi produk
	public function nav_kategori_produk() {
		$this->db->select('produk.*,
						kategori_produk.nama_kategori_produk,
						kategori_produk.slug_kategori_produk,
						kategori_produk.keterangan,
						kategori_produk.urutan');
		$this->db->from('produk');
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk.id_kategori_produk');
		$this->db->group_by('produk.id_kategori_produk');
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		$this->db->order_by('kategori_produk.urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Nav funnel
	public function nav_funnel()
	{
		$this->db->select('funnel.*,
						kategori_funnel.nama_kategori_funnel,
						kategori_funnel.slug_kategori_funnel,
						kategori_funnel.urutan');
		$this->db->from('funnel');	
		$this->db->join('kategori_funnel', 'kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel');
		$this->db->group_by('funnel.id_kategori_funnel');
		$this->db->where(array(	'funnel.status_funnel'	=> 'Publish'));
		$this->db->order_by('kategori_funnel.urutan','ASC');
		$query = $this->db->get();
		return $query->result();	
	}

	// Nav funnel
	public function funnel($id_kategori_funnel)
	{
		$this->db->select('funnel.*,
						kategori_funnel.nama_kategori_funnel,
						kategori_funnel.slug_kategori_funnel,
						kategori_funnel.urutan');
		$this->db->from('funnel');	
		$this->db->join('kategori_funnel', 'kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel');
		$this->db->where(array(	'funnel.status_funnel'		=> 'Publish',
								'funnel.id_kategori_funnel'	=> $id_kategori_funnel));
		$this->db->order_by('funnel.id_funnel','DESC');
		$query = $this->db->get();
		return $query->result();	
	}

	// Listing data slider
	public function nav_galeri() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->group_by('galeri.id_kategori_galeri');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function nav_video() {
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by('id_video','DESC');
		$this->db->order_by('urutan','DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function nav_agenda() {
		$this->db->select('*');
		$this->db->from('agenda');
		$this->db->order_by('mulai','DESC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}


	// Navigasi berita
	public function nav_berita() {
		$this->db->select('berita.*,kategori.nama_kategori,kategori.slug_kategori');
		$this->db->from('berita');
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori');
		$this->db->where(array(	'jenis_berita'	=> 'Berita',
								'status_berita'	=> 'Publish'));
		$this->db->group_by('berita.id_kategori');
		$this->db->order_by('kategori.urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi download
	public function nav_download() {
		$this->db->select('download.*,kategori_download.nama_kategori_download,kategori_download.slug_kategori_download');
		$this->db->from('download');
		$this->db->join('kategori_download','kategori_download.id_kategori_download = download.id_kategori_download');
		$this->db->where(array(	'jenis_download'	=> 'Download'));
		$this->db->group_by('download.id_kategori_download');
		$this->db->order_by('kategori_download.urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data popup
	public function popup_aktif() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where(array(	'jenis_galeri' 	=> 'Pop up',
								'popup_status'	=> 'Publish'));
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Nav_model.php */
/* Location: ./application/models/Nav_model.php */