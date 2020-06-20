<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function testimoni_home()
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where(array(	'status_client'		=> 'Yes',
								'status_testimoni'	=> 'Yes'));
        $this->db->limit(6);
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function testimoni($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where(array(	'status_client'		=> 'Yes',
								'status_testimoni'	=> 'Yes'));
		$this->db->where('gambar <>', '');
        $this->db->limit($limit,$start);
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total_testimoni()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('client');
		$this->db->where(array(	'status_client'		=> 'Yes',
								'status_testimoni'	=> 'Yes'));
		$this->db->where('gambar <>', '');
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing
	public function semua($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('client');
        $this->db->limit($limit,$start);
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('client');
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing
	public function reseller($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where_in('jenis_client', array('Distributor','Reseller'));
		$this->db->where('status_verifikasi', 'Verified');
        $this->db->limit($limit,$start);
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total_reseller()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('client');
		$this->db->where_in('jenis_client', array('Distributor','Reseller'));
		$this->db->where('status_verifikasi', 'Verified');
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// cari
	public function cari($keywords,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->like('nama', $keywords, 'BOTH');
		$this->db->or_like('alamat', $keywords, 'BOTH');
		$this->db->or_like('pimpinan', $keywords, 'BOTH');
		$this->db->or_like('email', $keywords, 'BOTH');
        $this->db->limit($limit,$start);
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total_cari($keywords)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('client');
		$this->db->like('nama', $keywords, 'BOTH');
		$this->db->or_like('alamat', $keywords, 'BOTH');
		$this->db->or_like('pimpinan', $keywords, 'BOTH');
		$this->db->or_like('email', $keywords, 'BOTH');
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail
	public function check_email($email)
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('email', $email);
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail
	public function kode_client($kode_client)
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('kode_client', $kode_client);
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail
	public function detail($id_client)
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('id_client', $id_client);
		$this->db->order_by('id_client', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah insert data
	public function tambah($data)
	{
		$this->db->insert('client',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_client',$data['id_client']);
		$this->db->update('client',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_client',$data['id_client']);
		$this->db->delete('client',$data);
	} 
}

/* End of file Client_model.php */
/* Location: ./application/models/Client_model.php */