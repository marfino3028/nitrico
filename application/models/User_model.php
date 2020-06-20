<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing()
	{
		$this->db->select('users.*,staff.nama AS nama_staff');
		$this->db->from('users');
		$this->db->join('staff', 'staff.id_staff = users.id_staff', 'left');
		$this->db->order_by('id_user', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function staff($id_staff)
	{
		$this->db->select('users.*,staff.nama AS nama_staff');
		$this->db->from('users');
		$this->db->join('staff', 'staff.id_staff = users.id_staff', 'left');
		$this->db->where('users.id_staff', $id_staff);
		$this->db->order_by('id_user', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function akses_level($akses_level)
	{
		$this->db->select('users.*,staff.nama AS nama_staff, staff.jabatan');
		$this->db->from('users');
		$this->db->where('akses_level', $akses_level);
		$this->db->join('staff', 'staff.id_staff = users.id_staff', 'left');
		$this->db->order_by('id_user', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Total
	public function total()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('users');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail
	// Listing
	public function detail($id_user)
	{
		$this->db->select('users.*,staff.nama AS nama_staff');
		$this->db->from('users');
		$this->db->join('staff', 'staff.id_staff = users.id_staff', 'left');
		$this->db->where('users.id_user', $id_user);
		$this->db->order_by('users.id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah insert data
	public function tambah($data)
	{
		$this->db->insert('users',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('users',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('users',$data);
	} 
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */