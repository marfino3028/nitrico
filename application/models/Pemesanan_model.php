<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('pemesanan.*, 
						produk.nama_produk, 
						client.nama AS nama_client,
						users.nama');
		$this->db->from('pemesanan');
		// Join dg 2 tabel
		$this->db->join('produk','produk.id_produk = pemesanan.id_produk','LEFT');
		$this->db->join('client','client.id_client = pemesanan.id_client','LEFT');
		$this->db->join('users','users.id_user = pemesanan.id_user','LEFT');
		// End join
		$this->db->order_by('id_pemesanan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function pemesanan($limit,$start) {
		$this->db->select('pemesanan.*, 
						produk.nama_produk, 
						client.nama AS nama_client,
						c.nama AS nama_partner,
						c.kode_client AS kode_client,
						c.telepon,
						users.nama');
		$this->db->from('pemesanan');
		// Join dg 2 tabel
		$this->db->join('produk','produk.id_produk = pemesanan.id_produk','LEFT');
		$this->db->join('client','client.id_client = pemesanan.id_client','LEFT');
		$this->db->join('client c','c.kode_client = pemesanan.kode_reseller','LEFT');
		$this->db->join('users','users.id_user = pemesanan.id_user','LEFT');
		// End join
		$this->db->limit($limit,$start);
		$this->db->order_by('id_pemesanan','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// total
	public function total()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pemesanan');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function token_transaksi($token_transaksi) {
		$this->db->select('pemesanan.*, 
						produk.nama_produk, 
						client.nama AS nama_client,
						users.nama');
		$this->db->from('pemesanan');
		// Join dg 2 tabel
		$this->db->join('produk','produk.id_produk = pemesanan.id_produk','LEFT');
		$this->db->join('client','client.id_client = pemesanan.id_client','LEFT');
		$this->db->join('users','users.id_user = pemesanan.id_user','LEFT');
		// End join
		$this->db->where('pemesanan.token_transaksi',$token_transaksi);
		$this->db->order_by('id_pemesanan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_pemesanan) {
		$this->db->select('pemesanan.*, 
						produk.nama_produk, 
						client.nama_client,
						users.nama');
		$this->db->from('pemesanan');
		// Join dg 2 tabel
		$this->db->join('produk','produk.id_produk = pemesanan.id_produk','LEFT');
		$this->db->join('client','client.id_client = pemesanan.id_client','LEFT');
		$this->db->join('users','users.id_user = pemesanan.id_user','LEFT');
		// End join
		$this->db->where('pemesanan.id_pemesanan',$id_pemesanan);
		$this->db->order_by('id_pemesanan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Nomor akhir
	public function nomor_akhir()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->where('pemesanan.tanggal_order',date('Y-m-d'));
		$this->db->order_by('nomor_transaksi','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('pemesanan',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_pemesanan',$data['id_pemesanan']);
		$this->db->update('pemesanan',$data);
	}

	// Edit
	public function edit2($data2) {
		$this->db->where('id_pemesanan',$data2['id_pemesanan']);
		$this->db->update('pemesanan',$data2);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_pemesanan',$data['id_pemesanan']);
		$this->db->delete('pemesanan',$data);
	}
}

/* End of file Pemesanan_model.php */
/* Location: ./application/models/Pemesanan_model.php */