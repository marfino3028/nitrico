<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Notif pendaftar
	public function pendaftar_baru()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pendaftar');
		$this->db->where('status_baca', 'Belum');
		$query = $this->db->get();
		return $query->row();
	}

	// Notif pendaftar
	public function pembayaran_baru()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pembayaran');
		$this->db->where('status_pembayaran', 'Pending');
		$query = $this->db->get();
		return $query->row();
	}

	// Notif pendaftar
	public function pendaftar($status_verifikasi)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('client');
		$this->db->where('status_verifikasi',$status_verifikasi);
		$query = $this->db->get();
		return $query->row();
	}

	// Notif pendaftar
	public function pendaftar_all($status_verifikasi)
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('status_verifikasi',$status_verifikasi);
		$query = $this->db->get();
		return $query->result();
	}

	// Notif pendaftar
	public function pembayaran()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('pembayaran');
		$this->db->where('status_pembayaran', 'Approved');
		$query = $this->db->get();
		return $query->row();
	}

	// Notif pendaftar
	public function pembayaran_all()
	{
		$this->db->select('SUM(jumlah) AS total');
		$this->db->from('pembayaran');
		$this->db->where('status_pembayaran', 'Approved');
		$query = $this->db->get();
		return $query->row();
	}

	// Notif pendaftar
	public function client_all()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('client');
		$query = $this->db->get();
		return $query->row();
	}

	// Notif pendaftar
	public function client()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('client');
		$this->db->where('status_client', 'Approved');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file Dasbor_model.php */
/* Location: ./application/models/Dasbor_model.php */