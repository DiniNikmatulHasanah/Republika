<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_news extends CI_Model{

	public function getdata($key)
	{
		$this->db->where('id_news', $key);
		$hasil = $this->db->get('news');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_news', $key);
		$this->db->update('news', $data);
	}

	public function getinsert($data)
	{
		$this->db->insert('news', $data);
	}

	function getdelete($key)
	{
	
	$this->db->where('id_news', $key);
	$this->db->delete('news'); 
	}
	/*function updateStatus($id_news, $status){
		$data['kategori'] = $status;
		$this->db->where('id_post', $id_post);
		$this->db->update('post', $data);
	}
*/
	function get_news($id_news){
		$this->db->where('id_news', $id_news);
		$hasil = $this->db->get('news');
		return $hasil->row();
	}
}
