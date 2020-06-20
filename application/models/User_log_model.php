<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_log_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('user_log');
		$this->db->limit($limit,$start);
		$this->db->order_by('id_user_log', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing
	public function user($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('user_log');
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->limit($limit,$start);
		$this->db->order_by('id_user_log', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing total
	public function total_user() {
		$this->db->select('count(*) AS total');
		$this->db->from('user_log');
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->order_by('id_user_log','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing total
	public function total() {
		$this->db->select('count(*) AS total');
		$this->db->from('user_log');
		$this->db->order_by('id_user_log','DESC');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file User_log_model.php */
/* Location: ./application/models/User_log_model.php */