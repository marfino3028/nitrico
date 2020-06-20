<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		// End join
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function listing_all() {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		// End join
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		$this->db->order_by('produk.nama_produk','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function listing_admin($limit,$start) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		// End join
		$this->db->limit($limit,$start);
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// total admin
	public function total_admin()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing data
	public function listing_dasbor() {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->order_by('id_produk','DESC');
		$this->db->limit(25);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function cari_aktif($keywords) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		// End join
		$this->db->like('nama_produk', $keywords, 'BOTH');
		$this->db->or_like('nama_produk', $keywords, 'BOTH');
		$this->db->or_like('isi', $keywords, 'BOTH');
		$this->db->or_like('harga_private', $keywords, 'BOTH');
		$this->db->or_like('deskripsi', $keywords, 'BOTH');
		$this->db->or_like('keywords', $keywords, 'BOTH');
		$this->db->or_like('harga_diskon', $keywords, 'BOTH');
		$this->db->or_like('harga_private_diskon', $keywords, 'BOTH');
		$this->db->or_like('harga_jual', $keywords, 'BOTH');
		$this->db->or_like('harga_private', $keywords, 'BOTH');
		$this->db->or_like('slug_produk', $keywords, 'BOTH');
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		$this->db->group_by('id_produk');
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Total cari aktif
	public function total_cari_aktif($keywords) {
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->like('nama_produk', $keywords, 'BOTH');
		$this->db->or_like('nama_produk', $keywords, 'BOTH');
		$this->db->or_like('isi', $keywords, 'BOTH');
		$this->db->or_like('harga_private', $keywords, 'BOTH');
		$this->db->or_like('deskripsi', $keywords, 'BOTH');
		$this->db->or_like('keywords', $keywords, 'BOTH');
		$this->db->or_like('harga_diskon', $keywords, 'BOTH');
		$this->db->or_like('harga_private_diskon', $keywords, 'BOTH');
		$this->db->or_like('harga_jual', $keywords, 'BOTH');
		$this->db->or_like('harga_private', $keywords, 'BOTH');
		$this->db->or_like('slug_produk', $keywords, 'BOTH');
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing data
	public function produk($limit,$start) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		$this->db->order_by('id_produk','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function urutan($kolom,$urutan,$limit,$start) {
		if($kolom=='harga') {
			$column 	= 'harga_jual';
		}elseif($kolom=='nama') {
			$column 	= 'nama_produk';
		}
		if($urutan=='murah') {
			$order_by = 'ASC';
		}elseif($urutan=='mahal') {
			$order_by = 'DESC';
		}elseif($urutan=='az') {
			$order_by = 'ASC';
		}else{
			$order_by = 'DESC';
		}

		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');		
		// End join
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		$this->db->order_by($column,$order_by);
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function produk_cari($keywords,$limit,$start) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		// cari
		$this->db->like('produk.nama_produk', $keywords, 'BOTH');
		$this->db->or_like('produk.isi', $keywords, 'BOTH');
		$this->db->or_like('produk.harga_produk', $keywords, 'BOTH');
		$this->db->or_like('kategori_produk.nama_kategori_produk', $keywords, 'BOTH');
		// end cari
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function pencarian($keywords) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		// cari
		$this->db->like('produk.nama_produk', $keywords, 'BOTH');
		$this->db->or_like('produk.isi', $keywords, 'BOTH');
		$this->db->or_like('produk.harga_jual', $keywords, 'BOTH');
		$this->db->or_like('kategori_produk.nama_kategori_produk', $keywords, 'BOTH');
		// end cari
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk','DESC');
		$this->db->limit(100);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function pencarian_admin($keywords) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		// cari
		$this->db->like('produk.nama_produk', $keywords, 'BOTH');
		$this->db->or_like('produk.isi', $keywords, 'BOTH');
		$this->db->or_like('produk.harga_jual', $keywords, 'BOTH');
		$this->db->or_like('kategori_produk.nama_kategori_produk', $keywords, 'BOTH');
		// end cari
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk','DESC');
		$this->db->limit(100);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function total() {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function total_cari($keywords) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		// cari
		$this->db->like('produk.nama_produk', $keywords, 'BOTH');
		$this->db->or_like('produk.isi', $keywords, 'BOTH');
		$this->db->or_like('produk.harga_produk', $keywords, 'BOTH');
		$this->db->or_like('kategori_produk.nama_kategori_produk', $keywords, 'BOTH');
		// end cari
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing brand
	public function status_produk($status_produk) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'	=> $status_produk));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function kategori($id_kategori_produk,$limit,$start) {
		$this->db->select('produk.*, kategori_produk.id_kategori_produk, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'		=> 'Publish',
								'produk.id_kategori_produk'	=> $id_kategori_produk));
		$this->db->order_by('id_produk','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function kategori_all($id_kategori_produk) {
		$this->db->select('produk.*, kategori_produk.id_kategori_produk, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'		=> 'Publish',
								'produk.id_kategori_produk'	=> $id_kategori_produk));
		$this->db->order_by('produk.urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function kategori_detail($id_kategori_produk,$id_produk) {
		$this->db->select('produk.*, kategori_produk.id_kategori_produk, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'		=> 'Publish',
								'produk.id_kategori_produk'	=> $id_kategori_produk));
		$this->db->where('produk.id_produk <>', $id_produk);
		$this->db->order_by('produk.urutan','ASC');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function total_kategori($id_kategori_produk) {
		$this->db->select('COUNT(*) AS total_kategori');
		$this->db->from('produk');
		$this->db->where(array(	'produk.status_produk'		=> 'Publish',
								'produk.id_kategori_produk'	=> $id_kategori_produk));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing data
	public function home() {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'	=> 'Publish'));
		$this->db->order_by('id_produk','DESC');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori_produk
	public function kategori_produk_admin($id_kategori_produk) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.id_kategori_produk'	=> $id_kategori_produk));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing brand
	public function brand_admin($id_brand) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.id_brand'		=> $id_brand));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Jenis produk
	public function jenis_produk_admin($jenis_produk) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.jenis_produk'		=> $jenis_produk));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Status produk
	public function status_produk_admin($status_produk) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.status_produk'		=> $status_produk));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Author produk
	public function author_admin($id_user) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End join
		$this->db->where(array(	'produk.id_user'		=> $id_user));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_produk) {
		$this->db->select('produk.*, 
							kategori_produk.nama_kategori_produk, 
							kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End joind
		$this->db->where(array(	'produk.slug_produk'	=> $slug_produk,
								'produk.status_produk'	=> 'Publish'));
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_produk) {
		$this->db->select('produk.*, kategori_produk.nama_kategori_produk, kategori_produk.slug_kategori_produk,
						  users.nama');
		$this->db->from('produk');
		// Join dg 2 tabel
		$this->db->join('kategori_produk','kategori_produk.id_kategori_produk = produk.id_kategori_produk','LEFT');
		$this->db->join('users','users.id_user = produk.id_user','LEFT');
		
		// End joind
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('produk',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->update('produk',$data);
	}

	// Edit
	public function update_hit($hit) {
		$this->db->where('id_produk',$hit['id_produk']);
		$this->db->update('produk',$hit);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->delete('produk',$data);
	}
}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */