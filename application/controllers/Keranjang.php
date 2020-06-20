<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_produk_model');
		$this->load->model('gambar_produk_model');
		$this->load->model('rekening_model');
		$this->load->library('cart');
		$this->load->model('nav_model');
	}

	// Keranjang Belanja
	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();
		$produk 		= $this->produk_model->status_produk('Publish');

		$data = array(	'title'		=> 'Keranjang Belanja',
						'deskripsi'	=> 'Keranjang Belanja',
						'keywords'	=> 'Keranjang Belanja',
						'site'		=> $site,
						'produk'	=> $produk,
						'content'	=> 'keranjang/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// tambah chart
	public function tambah(){ 
		$data = array(
			'id' 	=> $this->input->post('product_id'), 
			'name' 	=> $this->input->post('product_name'), 
			'price' => $this->input->post('product_price'), 
			'qty' 	=> $this->input->post('quantity'), 
		);
		$this->cart->insert($data);
		// redirect($this->input->post('pengalihan'),'refresh');
		$this->index();
	}

	// Delete
	public function hapus()
	{ 
	    $data = array(
	        'rowid' => $this->input->post('row_id'), 
	        'qty' 	=> 0, 
	    );
	    $this->cart->update($data);
	    redirect($this->input->post('pengalihan'),'refresh');
	}

	// Delete
	public function update()
	{ 
	    $data = array(
	        'rowid' => $this->input->post('row_id'), 
	        'qty' 	=> $this->input->post('quantity') 
	    );
	    $this->cart->update($data);
	    redirect($this->input->post('pengalihan'),'refresh');
	    // print_r($data);
	}

}

/* End of file Keranjang.php */
/* Location: ./application/controllers/Keranjang.php */