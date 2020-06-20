<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing
	public function home() {
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->limit(2);
		$this->db->order_by('id_testimoni','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing semua
	public function testimoni($limit,$start) {
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->limit($limit, $start);
		$this->db->order_by('id_testimoni','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing semua
	public function status_testimoni($status_testimoni,$limit,$start) {
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->where('status_testimoni', $status_testimoni);
		$this->db->limit($limit, $start);
		$this->db->order_by('id_testimoni','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing semua
	public function total_status_testimoni($status_testimoni) {
		$this->db->select('COUNT(*) AS total');
		$this->db->from('testimoni');
		$this->db->where('status_testimoni', $status_testimoni);
		$this->db->order_by('id_testimoni','DESC');
		$query = $this->db->get();
		return $query->row();
	}	
	
	// Listing semua
	public function total_testimoni() {
		$this->db->select('COUNT(*) AS total');
		$this->db->from('testimoni');
		$this->db->order_by('id_testimoni','DESC');
		$query = $this->db->get();
		return $query->row();
	}	
	
	// Detail
	public function detail($id_testimoni) {
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->where('id_testimoni',$id_testimoni);
		$this->db->order_by('id_testimoni','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('testimoni',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_testimoni',$data['id_testimoni']);
		$this->db->update('testimoni',$data);
	}
	
	// Check delete
	public function check($id_testimoni) {
		$query = $this->db->get_where('produk',array('id_testimoni' => $id_testimoni));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_testimoni',$data['id_testimoni']);
		$this->db->delete('testimoni',$data);
	}
}