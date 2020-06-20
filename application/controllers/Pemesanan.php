<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_produk_model');
		$this->load->model('gambar_produk_model');
		$this->load->model('produk_model');
		$this->load->library('cart');
		$this->load->helper('string');
		$this->load->model('nav_model');
		$this->load->model('pemesanan_model');
		$this->load->model('client_model');
	}

	// Formulir pemesanan
	public function index()
	{
		$kode_reseller 	= $this->input->get('kode_reseller');
		$site 			= $this->konfigurasi_model->listing();
		$produk 		= $this->produk_model->status_produk('Publish');
		$client 		= $this->client_model->kode_client($kode_reseller);

		if($client) {
			$kode_client 	= $client->kode_client;
			$id_client 		= $client->id_client;
		}else{
			$kode_client 	= '';
			$id_client 		= 0;
		}

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_pemesan','Nama lengkap','required|min_length[5]|max_length[32]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 5 karakter',
					'max_length'	=> '%s maksimal 32 karakter'
				));

		$valid->set_rules('telepon_pemesan','Nomor telepon','required|min_length[8]|max_length[32]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter'
				));

		$valid->set_rules('email_pemesan','Email','valid_email',
			array(	'required'		=> '%s tidak valid. Masukkan alamat email yang benar'
				));


		$valid->set_rules('alamat','Alamat lengkap','required|min_length[15]|max_length[100]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 15 karakter',
					'max_length'	=> '%s maksimal 100 karakter'
				));

		if($valid->run()===FALSE) {

		$data = array(	'title'		=> 'Formulir Pemesanan '.$site->namaweb,
						'deskripsi'	=> 'Formulir Pemesanan '.$site->namaweb,
						'keywords'	=> 'Formulir Pemesanan '.$site->namaweb,
						'site'		=> $site,
						'produk'	=> $produk,
						'client'	=> $client,
						'content'	=> 'pemesanan/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$i 		= $this->input;
			$produk = $this->produk_model->detail($i->post('id_produk'));
			$check 	= $this->pemesanan_model->nomor_akhir();
			if($check) {
				$nomor_transaksi 	= $check->nomor_transaksi+1;
			}else{
				$nomor_transaksi 	= 1;
			}

			if($nomor_transaksi < 10) {
				$kode_transaksi = date('Ymd').'000'.$nomor_transaksi;
			}elseif($nomor_transaksi < 100) {
				$kode_transaksi = date('Ymd').'00'.$nomor_transaksi;
			}elseif($nomor_transaksi < 1000) {
				$kode_transaksi = date('Ymd').'0'.$nomor_transaksi;
			}elseif($nomor_transaksi < 1000) {
				$kode_transaksi = date('Ymd').$nomor_transaksi;
			}
			$kd_tansaksi 		= 'ORDER'.$kode_transaksi;
			$token_transaksi 	= random_string('alnum',32);

			$data = array(	'id_produk'			=> $i->post('id_produk'),
							'id_reseller'		=> $id_client,
							'kode_reseller'		=> $kode_client,
							'kode_transaksi'	=> $kd_tansaksi,
							'token_transaksi'	=> $token_transaksi,
							'tanggal_order'		=> date('Y-m-d'),
							'status_pemesanan'	=> 'Menunggu',
							'nomor_transaksi'	=> $nomor_transaksi,
							'nama_pemesan'		=> $i->post('nama_pemesan'),
							'telepon_pemesan'	=> $i->post('telepon_pemesan'),
							'email_pemesan'		=> $i->post('email_pemesan'),
							'alamat'			=> $i->post('alamat'),
							'jumlah_produk'		=> $i->post('jumlah_produk'),
							'harga_produk'		=> $produk->harga_jual,
							'total_harga'		=> $i->post('jumlah_produk')*$produk->harga_jual,
							'tanggal_pemesanan'	=> date('Y-m-d H:i:s'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->pemesanan_model->tambah($data);
			// Proses kirim email
			$site 		= $this->konfigurasi_model->listing();
			$pemesanan 	= $this->pemesanan_model->token_transaksi($token_transaksi);
			$email 		= $pemesanan->email_pemesan;
			$cc 		= $site->email;
			$bcc 		= $site->email_cadangan;
			$subject 	= 'Order '.$site->namaweb.' - Nomor: '.$pemesanan->kode_transaksi;
    		$config = array(
				'mailtype'  	=> 'html', 
				'charset'   	=> 'utf-8',
				'newline'		=> "\r\n",
				'validation'	=> TRUE);
			$this->load->library('email',$config);
			$this->email->from($site->smtp_user, $site->namaweb);
			$this->email->to($email);
			$this->email->cc($site->email_cadangan);	
			$this->email->subject($subject);
			$this->email->message('<p><strong>'.$subject.'</strong></p>'.
    					  '<p>Berikut ini adalah data pemesanan Anda:</p><hr><p>'.
    					  '<strong>Kode order:</strong> '.$pemesanan->kode_transaksi.
    					  '<br><strong>Nama Produk:</strong> '.$pemesanan->nama_produk.
    					  '<br><strong>Quantity:</strong> '.$pemesanan->jumlah_produk.' Pcs'.
    					  '<br><strong>Harga Produk:</strong> Rp '.$this->website->angka($pemesanan->harga_produk).
    					  '<br><strong>Total Harga:</strong> Rp '.$this->website->angka($pemesanan->total_harga).
    					  '<br><strong>Nama Penerima:</strong> '.strip_tags($pemesanan->nama_pemesan).
    					  '<br><strong>Email:</strong> '.$pemesanan->email_pemesan.
    					  '<br><strong>HP/Whatsapp:</strong> '.$pemesanan->telepon_pemesan.
    					  '<br><strong>Alamat:</strong> '.$pemesanan->alamat.
    					  '</p><hr><p>Jika Anda telah melakukan pembayaran. Anda dapat melakukan Konfirmasi Pembayaran di: '.base_url('pembayaran/konfirmasi').' atau Melihat Produk Lainnya di: '.base_url('produk').'</p>'.
    					  '<p>
			                <strong>'.$site->namaweb.'</strong>'.
			                '<br>'.nl2br($site->alamat).
			                '<br>Telepon: '.$site->telepon.
			                '<br>Email: '.$site->email.
			                '<br>Website: '.$site->website.
			              '</p>'
    					  );
			$this->email->send();
			echo $this->email->print_debugger();
			// End proses kirim email
			$this->session->set_flashdata('sukses', 'Pemesan berhasil. Kami akan menindaklanjuti pemesanan Anda');
			redirect(base_url('pemesanan/berhasil/'.$token_transaksi),'refresh');
		}
	}

	// Berhasil
	public function berhasil($token_transaksi)
	{
		$pemesanan 	= $this->pemesanan_model->token_transaksi($token_transaksi);
		$site 		= $this->konfigurasi_model->listing();

		$data = array(	'title'		=> 'Pemesanan Berhasil',
						'deskripsi'	=> 'Pemesanan Berhasil '.$site->namaweb,
						'keywords'	=> 'Pemesanan Berhasil '.$site->namaweb,
						'site'		=> $site,
						'pemesanan'	=> $pemesanan,
						'content'	=> 'pemesanan/berhasil'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Cetak
	public function cetak($token_transaksi)
	{
		$pemesanan 	= $this->pemesanan_model->token_transaksi($token_transaksi);
		$site 		= $this->konfigurasi_model->listing();

		$data = array(	'title'		=> 'BUKTI PEMESANAN PRODUK',
						'site'		=> $site,
						'pemesanan'	=> $pemesanan,
					);
		// $this->load->view('pemesanan/cetak', $data, FALSE);
		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$mpdf->SetHTMLHeader('
				<div style="text-align: right; font-weight: bold;font-family: Arial; color: orange;border-bottom: solid thin #EEE; padding-bottom: 5px;">
				    '.strtoupper($site->namaweb.' | '.$site->telepon.' | '.$site->email).'
				</div>');
		$mpdf->SetHTMLFooter('
				<div style="text-align: center; font-weight: bold;font-family: Arial; color: orange;border-top: solid thin #EEE; padding-top: 5px;">
				    '.$site->website.'
				</div>');
	    $html = $this->load->view('pemesanan/cetak',$data,true);
	    $mpdf->WriteHTML($html);
	    $nama_file = $pemesanan->kode_transaksi.'.pdf';
	    $mpdf->Output($nama_file, 'I'); 
	}

	// Email
	public function coba($token_transaksi)
	{
		$pemesanan 	= $this->pemesanan_model->token_transaksi($token_transaksi);
		$site 		= $this->konfigurasi_model->listing();

		// Proses kirim email
		$email 		= $pemesanan->email_pemesan;
		$cc 		= $site->email;
		$bcc 		= $site->email_cadangan;
		$subject 	= 'Order '.$site->namaweb.' - Nomor: '.$pemesanan->kode_transaksi;
		// HTML Template

		$message 	= '<p><strong>'.$subject.'</strong></p>'.
    					  '<p>Berikut ini adalah data pemesanan Anda:</p><hr><p>'.
    					  '<strong>Kode order:</strong> '.$pemesanan->kode_transaksi.
    					  '<br><strong>Nama Produk:</strong> '.$pemesanan->nama_produk.
    					  '<br><strong>Quantity:</strong> '.$pemesanan->jumlah_produk.' Pcs'.
    					  '<br><strong>Harga Produk:</strong> Rp '.$this->website->angka($pemesanan->harga_produk).
    					  '<br><strong>Total Harga:</strong> Rp '.$this->website->angka($pemesanan->total_harga).
    					  '<br><strong>Nama Penerima:</strong> '.strip_tags($pemesanan->nama_pemesan).
    					  '<br><strong>Email:</strong> '.$pemesanan->email_pemesan.
    					  '<br><strong>HP/Whatsapp:</strong> '.$pemesanan->telepon_pemesan.
    					  '<br><strong>Alamat:</strong> '.$pemesanan->alamat.
    					  '</p><hr><p>Jika Anda telah melakukan pembayaran. Anda dapat melakukan Konfirmasi Pembayaran di: '.base_url('pembayaran/konfirmasi').' atau Melihat Produk Lainnya di: '.base_url('produk').'</p>'.
    					  '<p>
			                <strong>'.$site->namaweb.'</strong>'.
			                '<br>'.nl2br($site->alamat).
			                '<br>Telepon: '.$site->telepon.
			                '<br>Email: '.$site->email.
			                '<br>Website: '.$site->website.
			              '</p>'
    					  ; 
    	echo $message;
	}
}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */