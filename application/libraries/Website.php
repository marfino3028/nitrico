<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
	}

	// Sitename
	public function namaweb()
	{
		$site = $this->CI->konfigurasi_model->listing();
		return $site->namaweb;
	}

	// konfigurasi
	public function konfigurasi()
	{
		$site = $this->CI->konfigurasi_model->listing();
		return $site;
	}

	// cara_pesan
	public function cara_pesan()
	{
		$site = $this->CI->konfigurasi_model->listing();
		return $site->cara_pesan;
	}

	// tagline
	public function tagline()
	{
		$site = $this->CI->konfigurasi_model->listing();
		return $site->tagline;
	}

	// Sitename
	public function tahun()
	{
		$site = $this->CI->konfigurasi_model->listing();
		return $site->tahun_referensi;
	}

	// Sitename
	public function id_provinsi()
	{
		$site = $this->CI->konfigurasi_model->listing();
		return $site->id_provinsi;
	}

	// Sitename
	public function nama_singkat()
	{
		$site = $this->CI->konfigurasi_model->listing();
		return $site->nama_singkat;
	}

	// Alamat
	public function logo()
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$logo 	= base_url('assets/upload/image/'.$site->logo);
		return $logo;
	}

	// Alamat
	public function logo_surat()
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$logo 	= base_url('assets/upload/image/'.$site->logo_surat);
		return $logo;
	}

	// gambar
	public function gambar()
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$logo 	= base_url('assets/upload/image/'.$site->gambar);
		return $logo;
	}

	// Alamat
	public function banner()
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$logo 	= base_url('assets/upload/image/'.$site->gambar);
		return $logo;
	}

	// Alamat
	public function icon()
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$icon 	= base_url('assets/upload/image/'.$site->icon);
		return $icon;
	}

	// Romawi
	public function romawi($bulan)
	{
		if($bulan=='01') {
			$romawi = 'I';
		}elseif($bulan=='02') {
			$romawi = 'II';
		}elseif($bulan=='03') {
			$romawi = 'III';
		}elseif($bulan=='04') {
			$romawi = 'IV';
		}elseif($bulan=='05') {
			$romawi = 'V';
		}elseif($bulan=='06') {
			$romawi = 'VI';
		}elseif($bulan=='07') {
			$romawi = 'VII';
		}elseif($bulan=='08') {
			$romawi = 'VIII';
		}elseif($bulan=='09') {
			$romawi = 'IX';
		}elseif($bulan=='10') {
			$romawi = 'X';
		}elseif($bulan=='11') {
			$romawi = 'XI';
		}elseif($bulan=='12') {
			$romawi = 'XII';
		}
		return $romawi;
	}

	// Romawi
	public function bulan($bulan)
	{
		if($bulan=='01') {
			$nama_bulan = 'Januari';
		}elseif($bulan=='02') {
			$nama_bulan = 'Februari';
		}elseif($bulan=='03') {
			$nama_bulan = 'Maret';
		}elseif($bulan=='04') {
			$nama_bulan = 'April';
		}elseif($bulan=='05') {
			$nama_bulan = 'Mei';
		}elseif($bulan=='06') {
			$nama_bulan = 'Juni';
		}elseif($bulan=='07') {
			$nama_bulan = 'Juli';
		}elseif($bulan=='08') {
			$nama_bulan = 'Agustus';
		}elseif($bulan=='09') {
			$nama_bulan = 'September';
		}elseif($bulan=='10') {
			$nama_bulan = 'Oktober';
		}elseif($bulan=='11') {
			$nama_bulan = 'November';
		}elseif($bulan=='12') {
			$nama_bulan = 'Desember';
		}
		return $nama_bulan;
	}

	// Romawi
	public function bulan_pendek($bulan)
	{
		if($bulan=='01') {
			$nama_bulan_pendek = 'Jan';
		}elseif($bulan=='02') {
			$nama_bulan_pendek = 'Feb';
		}elseif($bulan=='03') {
			$nama_bulan_pendek = 'Mar';
		}elseif($bulan=='04') {
			$nama_bulan_pendek = 'Apr';
		}elseif($bulan=='05') {
			$nama_bulan_pendek = 'Mei';
		}elseif($bulan=='06') {
			$nama_bulan_pendek = 'Jun';
		}elseif($bulan=='07') {
			$nama_bulan_pendek = 'Jul';
		}elseif($bulan=='08') {
			$nama_bulan_pendek = 'Agus';
		}elseif($bulan=='09') {
			$nama_bulan_pendek = 'Sep';
		}elseif($bulan=='10') {
			$nama_bulan_pendek = 'Okt';
		}elseif($bulan=='11') {
			$nama_bulan_pendek = 'Nov';
		}elseif($bulan=='12') {
			$nama_bulan_pendek = 'Des';
		}
		return $nama_bulan_pendek;
	}

	// Romawi
	public function hari($tanggal)
	{
		$bulan 	= date('m',strtotime($tanggal));
		$hari 	= date('l',strtotime($tanggal));

		if($hari=='Sunday') {
			$nama_hari = 'Minggu';
		}elseif($hari=='Monday') {
			$nama_hari = 'Senin';
		}elseif($hari=='Tuesday') {
			$nama_hari = 'Selasa';
		}elseif($hari=='Wednesday') {
			$nama_hari = 'Rabu';
		}elseif($hari=='Thursday') {
			$nama_hari = 'Kamis';
		}elseif($hari=='Friday') {
			$nama_hari = 'Jumat';
		}elseif($hari=='Saturday') {
			$nama_hari = 'Sabtu';
		}

		if($bulan=='01') {
			$nama_bulan = 'Januari';
		}elseif($bulan=='02') {
			$nama_bulan = 'Februari';
		}elseif($bulan=='03') {
			$nama_bulan = 'Maret';
		}elseif($bulan=='04') {
			$nama_bulan = 'April';
		}elseif($bulan=='05') {
			$nama_bulan = 'Mei';
		}elseif($bulan=='06') {
			$nama_bulan = 'Juni';
		}elseif($bulan=='07') {
			$nama_bulan = 'Juli';
		}elseif($bulan=='08') {
			$nama_bulan = 'Agustus';
		}elseif($bulan=='09') {
			$nama_bulan = 'September';
		}elseif($bulan=='10') {
			$nama_bulan = 'Oktober';
		}elseif($bulan=='11') {
			$nama_bulan = 'November';
		}elseif($bulan=='12') {
			$nama_bulan = 'Desember';
		}

		$hasil = $nama_hari.', '.date('d',strtotime($tanggal)).' '.$nama_bulan.' '.date('Y',strtotime($tanggal));
		return $hasil;
	}

	// tanggal_bulan
	public function tanggal_id($tanggal)
	{
		if($tanggal=='' || $tanggal==NULL || $tanggal=='0000-00-00' || $tanggal=='1970-01-01') {
			return FALSE;
		}else{
			$hasil = date('d-m-Y',strtotime($tanggal));
			return $hasil;
		}
	}

	// Tanggal input
	public function tanggal_input($tanggal)
	{
		if($tanggal=='' || $tanggal==NULL || $tanggal=='0000-00-00' || $tanggal=='1970-01-01') {
			return FALSE;
		}else{
			$hasil = date('Y-m-d',strtotime($tanggal));
			return $hasil;
		}
	}

	// tanggal_bulan
	public function tanggal_bulan($tanggal)
	{
		if($tanggal=='' || $tanggal==NULL || $tanggal=='0000-00-00' || $tanggal == '1970-01-01') {
			$hasil = '';
			return $hasil;
		}else{
			$bulan 	= date('m',strtotime($tanggal));
			$hari 	= date('l',strtotime($tanggal));
			if($hari=='Sunday') {
				$nama_hari = 'Minggu';
			}elseif($hari=='Monday') {
				$nama_hari = 'Senin';
			}elseif($hari=='Tuesday') {
				$nama_hari = 'Selasa';
			}elseif($hari=='Wednesday') {
				$nama_hari = 'Rabu';
			}elseif($hari=='Thursday') {
				$nama_hari = 'Kamis';
			}elseif($hari=='Friday') {
				$nama_hari = 'Jumat';
			}elseif($hari=='Saturday') {
				$nama_hari = 'Sabtu';
			}
			if($bulan=='01') {
				$nama_bulan = 'Januari';
			}elseif($bulan=='02') {
				$nama_bulan = 'Februari';
			}elseif($bulan=='03') {
				$nama_bulan = 'Maret';
			}elseif($bulan=='04') {
				$nama_bulan = 'April';
			}elseif($bulan=='05') {
				$nama_bulan = 'Mei';
			}elseif($bulan=='06') {
				$nama_bulan = 'Juni';
			}elseif($bulan=='07') {
				$nama_bulan = 'Juli';
			}elseif($bulan=='08') {
				$nama_bulan = 'Agustus';
			}elseif($bulan=='09') {
				$nama_bulan = 'September';
			}elseif($bulan=='10') {
				$nama_bulan = 'Oktober';
			}elseif($bulan=='11') {
				$nama_bulan = 'November';
			}elseif($bulan=='12') {
				$nama_bulan = 'Desember';
			}
			$hasil = date('d',strtotime($tanggal)).' '.$nama_bulan.' '.date('Y',strtotime($tanggal));
			return $hasil;
		}
		
	}

	// tanggal_bulan
	public function tanggal_singkat($tanggal)
	{
		$bulan 	= date('m',strtotime($tanggal));
		$hari 	= date('l',strtotime($tanggal));

		if($hari=='Sunday') {
			$nama_hari = 'Minggu';
		}elseif($hari=='Monday') {
			$nama_hari = 'Senin';
		}elseif($hari=='Tuesday') {
			$nama_hari = 'Selasa';
		}elseif($hari=='Wednesday') {
			$nama_hari = 'Rabu';
		}elseif($hari=='Thursday') {
			$nama_hari = 'Kamis';
		}elseif($hari=='Friday') {
			$nama_hari = 'Jumat';
		}elseif($hari=='Saturday') {
			$nama_hari = 'Sabtu';
		}

		if($bulan=='01') {
			$nama_bulan = 'Jan';
		}elseif($bulan=='02') {
			$nama_bulan = 'Feb';
		}elseif($bulan=='03') {
			$nama_bulan = 'Mar';
		}elseif($bulan=='04') {
			$nama_bulan = 'Apr';
		}elseif($bulan=='05') {
			$nama_bulan = 'Mei';
		}elseif($bulan=='06') {
			$nama_bulan = 'Jun';
		}elseif($bulan=='07') {
			$nama_bulan = 'Jul';
		}elseif($bulan=='08') {
			$nama_bulan = 'Agus';
		}elseif($bulan=='09') {
			$nama_bulan = 'Sep';
		}elseif($bulan=='10') {
			$nama_bulan = 'Okt';
		}elseif($bulan=='11') {
			$nama_bulan = 'Nov';
		}elseif($bulan=='12') {
			$nama_bulan = 'Des';
		}

		$hasil = date('d',strtotime($tanggal)).' '.$nama_bulan.' '.date('Y',strtotime($tanggal));
		return $hasil;
	}

	// tanggal_bulan
	public function hari_bulan($tanggal)
	{
		$bulan 	= date('m',strtotime($tanggal));
		$hari 	= date('l',strtotime($tanggal));

		if($hari=='Sunday') {
			$nama_hari = 'Minggu';
		}elseif($hari=='Monday') {
			$nama_hari = 'Senin';
		}elseif($hari=='Tuesday') {
			$nama_hari = 'Selasa';
		}elseif($hari=='Wednesday') {
			$nama_hari = 'Rabu';
		}elseif($hari=='Thursday') {
			$nama_hari = 'Kamis';
		}elseif($hari=='Friday') {
			$nama_hari = 'Jumat';
		}elseif($hari=='Saturday') {
			$nama_hari = 'Sabtu';
		}

		if($bulan=='01') {
			$nama_bulan = 'Januari';
		}elseif($bulan=='02') {
			$nama_bulan = 'Februari';
		}elseif($bulan=='03') {
			$nama_bulan = 'Maret';
		}elseif($bulan=='04') {
			$nama_bulan = 'April';
		}elseif($bulan=='05') {
			$nama_bulan = 'Mei';
		}elseif($bulan=='06') {
			$nama_bulan = 'Juni';
		}elseif($bulan=='07') {
			$nama_bulan = 'Juli';
		}elseif($bulan=='08') {
			$nama_bulan = 'Agustus';
		}elseif($bulan=='09') {
			$nama_bulan = 'September';
		}elseif($bulan=='10') {
			$nama_bulan = 'Oktober';
		}elseif($bulan=='11') {
			$nama_bulan = 'November';
		}elseif($bulan=='12') {
			$nama_bulan = 'Desember';
		}

		$hasil = $nama_hari.', '.date('d',strtotime($tanggal)).' '.$nama_bulan.' '.date('Y',strtotime($tanggal)).' jam '.date('H:i',strtotime($tanggal));
		return $hasil;
	}

	// Nomor
	public function angka($angka)
	{
		$hasil = number_format($angka,'0',',','.');
		return $hasil;
	}

	// Kirim email
	public function kirim_email($email,$cc='',$bcc='',$subject,$message)
	{
		$site 	= $this->CI->konfigurasi_model->listing();

		$config = array(
			'mailtype'  	=> 'html', 
			'charset'   	=> 'utf-8',
			'newline'		=> "\r\n",
			'validation'	=> TRUE,
			'protocol'     	=> $site->protocol,
            'smtp_host'    	=> $site->smtp_host,
            'smtp_port'    	=> $site->smtp_port,
            'smtp_timeout' 	=> $site->smtp_timeout,
            'smtp_user'    	=> $site->smtp_user,
            'smtp_pass'    	=> $site->smtp_pass
		);
		$this->CI->load->library('email', $config);		
		$this->CI->email->from($site->smtp_user);
		$this->CI->email->to($email);
		$this->CI->email->cc($cc);
		$this->CI->email->bcc($bcc);
		$this->CI->email->subject($subject);
		$this->CI->email->message($message);
		$this->CI->email->send();
		echo $this->CI->email->print_debugger();
	}

	// Kirim email biasa
	public function kirim_email_biasa($email,$cc,$subject,$message)
	{
		$site 	= $this->CI->konfigurasi_model->listing();
		$this->CI->load->library('email');
		$this->CI->email->from($site->smtp_user, $site->namaweb);
		$this->CI->email->to($email);
		$this->CI->email->cc($site->email_cadangan);		
		$this->CI->email->subject($subject);
		$this->CI->email->message($message);
		$this->CI->email->send();
		echo $this->CI->email->print_debugger();
	}
}

/* End of file Website.php */
/* Location: ./application/libraries/Website.php */
