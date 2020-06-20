<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funnel_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('funnel.*, kategori_funnel.nama_kategori_funnel, users.nama');
		$this->db->from('funnel');
		// Join dg 2 tabel
		$this->db->join('kategori_funnel','kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel','LEFT');
		$this->db->join('users','users.id_user = funnel.id_user','LEFT');
		// End join
		// $this->db->where('jenis_funnel <>','Pop up');
		$this->db->order_by('id_funnel','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function slider() {
		$this->db->select('funnel.*, kategori_funnel.nama_kategori_funnel, users.nama');
		$this->db->from('funnel');
		// Join dg 2 tabel
		$this->db->join('kategori_funnel','kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel','LEFT');
		$this->db->join('users','users.id_user = funnel.id_user','LEFT');
		// End join
		$this->db->where('jenis_funnel','Homepage');
		$this->db->order_by('id_funnel','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing data slider
	public function funnel_home() {
		$this->db->select('funnel.*, kategori_funnel.nama_kategori_funnel, kategori_funnel.slug_kategori_funnel, , users.nama');
		$this->db->from('funnel');
		// Join dg 2 tabel
		$this->db->join('kategori_funnel','kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel','LEFT');
		$this->db->join('users','users.id_user = funnel.id_user','LEFT');
		// End join
		$this->db->where('status_funnel','Publish');
		// $this->db->group_by('funnel.id_kategori_funnel');
		$this->db->order_by('id_funnel','DESC');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function funnel($limit,$start) {
		$this->db->select('funnel.*, kategori_funnel.nama_kategori_funnel, users.nama, 
						kategori_funnel.slug_kategori_funnel');
		$this->db->from('funnel');
		// Join dg 2 tabel
		$this->db->join('kategori_funnel','kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel','LEFT');
		$this->db->join('users','users.id_user = funnel.id_user','LEFT');
		// End join
		$this->db->where('status_funnel','Publish');
		$this->db->order_by('id_funnel','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function total_funnel() {
		$this->db->select('funnel.*, kategori_funnel.nama_kategori_funnel, users.nama');
		$this->db->from('funnel');
		// Join dg 2 tabel
		$this->db->join('kategori_funnel','kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel','LEFT');
		$this->db->join('users','users.id_user = funnel.id_user','LEFT');
		// End join
		$this->db->where('status_funnel','Publish');
		$this->db->order_by('id_funnel','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Kategori
	public function kategori() {
		$this->db->select('funnel.*, kategori_funnel.nama_kategori_funnel, users.nama, 
						kategori_funnel.slug_kategori_funnel');
		$this->db->from('funnel');
		// Join dg 2 tabel
		$this->db->join('kategori_funnel','kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel');
		$this->db->join('users','users.id_user = funnel.id_user','LEFT');
		// End join
		$this->db->where('status_funnel','Publish');
		$this->db->group_by('funnel.id_kategori_funnel');
		$this->db->order_by('id_funnel','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori_funnel
	public function kategori_funnel($id_kategori_funnel,$limit,$start) {
		$this->db->select('funnel.*, users.nama, kategori_funnel.nama_kategori_funnel, kategori_funnel.slug_kategori_funnel');
		$this->db->from('funnel');
		// Join dg 2 tabel
		$this->db->join('kategori_funnel','kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel','LEFT');
		$this->db->join('users','users.id_user = funnel.id_user','LEFT');
		// End join
		$this->db->where(array(	'funnel.id_kategori_funnel'	=> $id_kategori_funnel,
								'funnel.status_funnel'		=> 'Publish'));
		$this->db->order_by('id_funnel','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data
	public function total_kategori($id_kategori_funnel) {
		$this->db->select('COUNT(*) AS total_kategori');
		$this->db->from('funnel');
		$this->db->where(array(	'funnel.status_funnel'		=> 'Publish',
								'funnel.id_kategori_funnel'	=> $id_kategori_funnel));
		$this->db->order_by('id_funnel','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing kategori_funnel
	public function all_kategori($id_kategori_funnel) {
		$this->db->select('funnel.*, users.nama, kategori_funnel.nama_kategori_funnel, kategori_funnel.slug_kategori_funnel');
		$this->db->from('funnel');
		// Join dg 2 tabel
		$this->db->join('kategori_funnel','kategori_funnel.id_kategori_funnel = funnel.id_kategori_funnel','LEFT');
		$this->db->join('users','users.id_user = funnel.id_user','LEFT');
		// End join
		$this->db->where(array(	'funnel.id_kategori_funnel'	=> $id_kategori_funnel,
								'funnel.jenis_funnel'	=> 'Funnel'));
		$this->db->order_by('id_funnel','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_funnel) {
		$this->db->select('*');
		$this->db->from('funnel');
		$this->db->where('id_funnel',$id_funnel);
		$this->db->order_by('id_funnel','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('funnel',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_funnel',$data['id_funnel']);
		$this->db->update('funnel',$data);
	}

	// Edit
	public function edit2($data2) {
		$this->db->where('jenis_funnel','Pop up');
		$this->db->update('funnel',$data2);
	}

	// Edit hit
	public function update_hit($hit) {
		$this->db->where('id_funnel',$hit['id_funnel']);
		$this->db->update('funnel',$hit);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_funnel',$data['id_funnel']);
		$this->db->delete('funnel',$data);
	}
}

/* End of file Funnel_model.php */
/* Location: ./application/models/Funnel_model.php */