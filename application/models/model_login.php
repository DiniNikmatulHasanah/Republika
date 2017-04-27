<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

public function getlogin($u,$p)
{
;
	$this->db->where('username',$u);
	$this->db->where('password',$p);
	$query = $this->db->get('admin');
	if($query->num_rows()>0)
	{
		foreach ($query->result() as $row) 
			{

				$sess = array('id_admin'	 => $row->id_admin,
							   'fullname'   => $row->fullname,
							  'username'	 => $row->username
							  );
				$this->session->set_userdata($sess);
				redirect('home');
			}
	}
	else
	{
		$this->session->set_flashdata('info','maaf username atau password anda salah');
		redirect('login');
	}
}


}
