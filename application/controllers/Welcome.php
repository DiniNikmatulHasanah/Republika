<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function kelas()
    {
		$this->load->model('model_siswa');
        $data['kelas'] = $this->model_siswa->get_kelas();
		
		$this->load->view('kelas', $data);
    }
	
}
