<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

	public function index()
	{
		$config = array(
			'mailtype'  	=> 'html', 
			'charset'   	=> 'utf-8',
			'newline'		=> "\r\n",
			'validation'	=> TRUE);
		$this->load->library('email',$config);
		$this->email->from('order@nitrico.co.id', 'Nama lengkap');
		$this->email->to('andoyoandoyo@gmail.com');
		$this->email->cc('javawebmedia@gmail.com');	
		$this->email->subject('Uji Coba Email');
		$this->email->message('<p>Uji coba email</p><p><strong>Masak ga masuk juga</strong></p>');
		$this->email->send();
		echo $this->email->print_debugger();
	}

}

/* End of file Testing.php */
/* Location: ./application/controllers/Testing.php */