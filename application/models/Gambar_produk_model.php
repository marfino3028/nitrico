<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar_produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('gambar_produk.*,produk.nama_produk');
		$this->db->from('gambar_produk');
		$this->db->join('produk','produk.id_produk = gambar_produk.id_produk');
		$this->db->order_by('id_gambar_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data produk
	public function produk($id_produk) {
		$this->db->select('gambar_produk.*,produk.nama_produk');
		$this->db->from('gambar_produk');
		$this->db->join('produk','produk.id_produk = gambar_produk.id_produk');
		$this->db->where('gambar_produk.id_produk',$id_produk);
		$this->db->order_by('id_gambar_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_gambar_produk) {
		$this->db->select('*');
		$this->db->from('gambar_produk');
		$this->db->where('id_gambar_produk',$id_gambar_produk);
		$this->db->order_by('id_gambar_produk','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('gambar_produk',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_gambar_produk',$data['id_gambar_produk']);
		$this->db->update('gambar_produk',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_gambar_produk',$data['id_gambar_produk']);
		$this->db->delete('gambar_produk',$data);
	}
}

/* End of file Gambar_produk_model.php */
/* Location: ./application/models/Gambar_produk_model.php */