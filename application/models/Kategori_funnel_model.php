<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_funnel_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('kategori_funnel.*,
						COUNT(funnel.id_funnel) AS total');
		$this->db->from('kategori_funnel');
		$this->db->join('funnel', 'funnel.id_kategori_funnel = kategori_funnel.id_kategori_funnel', 'left');
		$this->db->group_by('kategori_funnel.id_kategori_funnel');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function read($slug_kategori_funnel) {
		$this->db->select('*');
		$this->db->from('kategori_funnel');
		$this->db->where('slug_kategori_funnel',$slug_kategori_funnel);
		$this->db->order_by('id_kategori_funnel','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_kategori_funnel) {
		$this->db->select('*');
		$this->db->from('kategori_funnel');
		$this->db->where('id_kategori_funnel',$id_kategori_funnel);
		$this->db->order_by('id_kategori_funnel','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('kategori_funnel',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_kategori_funnel',$data['id_kategori_funnel']);
		$this->db->update('kategori_funnel',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_kategori_funnel',$data['id_kategori_funnel']);
		$this->db->delete('kategori_funnel',$data);
	}
}

/* End of file Kategori_funnel_model.php */
/* Location: ./application/models/Kategori_funnel_model.php */