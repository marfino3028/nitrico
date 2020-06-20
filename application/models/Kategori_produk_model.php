<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('kategori_produk.*,
						COUNT(produk.id_produk) AS total');
		$this->db->from('kategori_produk');
		$this->db->join('produk', 'produk.id_kategori_produk = kategori_produk.id_kategori_produk', 'left');
		$this->db->group_by('kategori_produk.id_kategori_produk');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function read($slug_kategori_produk) {
		$this->db->select('*');
		$this->db->from('kategori_produk');
		$this->db->where('slug_kategori_produk',$slug_kategori_produk);
		$this->db->order_by('id_kategori_produk','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_kategori_produk) {
		$this->db->select('*');
		$this->db->from('kategori_produk');
		$this->db->where('id_kategori_produk',$id_kategori_produk);
		$this->db->order_by('id_kategori_produk','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('kategori_produk',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_kategori_produk',$data['id_kategori_produk']);
		$this->db->update('kategori_produk',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_kategori_produk',$data['id_kategori_produk']);
		$this->db->delete('kategori_produk',$data);
	}
}

/* End of file Kategori_produk_model.php */
/* Location: ./application/models/Kategori_produk_model.php */