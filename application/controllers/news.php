<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {


	public function index()
	{
		$this->model_squrity->getsqurity();
		$isi['content'] 	= 'news/tampil_datanews';
		$isi['judul']		= 'master';
		$isi['sub_judul']	= 'news';
		$isi['data']  		= $this->db->get('news');
		$this->load->view('tampilan_home', $isi);
	}

	public function tambah()
	{
		$config['upload_path']          = 'assets/images/upload_post/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        //upload ke folder uploads
		$this->upload->do_upload('btn_upload');
		$this->model_squrity->getsqurity();
		$isi['content'] 	= 'news/form_tambahnews';
		$isi['judul']		= 'master';
		$isi['sub_judul']	= 'tambah news';
				$isi['kode']			='';
				$isi['judul']			='';
				$isi['isi']				='';
				$isi['kategori']		='';
				$isi['btn_upload']		='';

		$this->load->view('tampilan_home', $isi);	
	}

	public function delete($key)
	{
	$this->load->database();
	$this->load->model('model_news');
	$this->model_news->getdelete($key);

	redirect('news');
	}

	public function edit()
	{
		$this->model_squrity->getsqurity();
		$isi['content'] 	= 'news/form_tambahnews';
		$isi['judul']		= 'master';
		$isi['sub_judul']	= 'edit news';

		$key = $this->uri->segment(3);
		$this->db->where('id_news',$key);
		$query = $this->db->get('news');
		if($query->num_rows()>0)
		{
			foreach ($query -> result() as $row) 
			{
				$isi['kode']			=$row->id_news;
				$isi['judul']			=$row->title;
				$isi['isi']				=$row->content;
				$isi['kategori']		=$row->kategori;	
				$isi['btn_upload']		=$row->image;

			}
		}
		else
		{
				$isi['kode']			='';
				$isi['judul']			='';
				$isi['isi']				='';
				$isi['kategori']		='';
				$isi['btn_upload']		='';				

		}
		
		$this->load->view('tampilan_home', $isi);	
	}

	public function simpan()
	{
		$this->model_squrity->getsqurity();

		$key = $this->input->post('kode');
		$data['title']		= $this->input->post('judul');
		$data['content']	= $this->input->post('isi');
		$data['kategori ']= $this->input->post('kategori');
		$data['image']		=$this->input->post('btn_upload');
		
		$this->load->model('model_news');
		$query = $this->model_news->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_news->getupdate($key, $data);
		}
		else
		{
			$this->model_news->getinsert($data);
		}
		redirect('news');
	}

/*	public function published($id_news){
		$this->load->model('model_news');
		$this->model_news->updateStatus($id_news, "published");
		redirect('News');
	}*/

	public function read($id_news){
		$this->load->model('model_news');
		$isi['detail_news'] = $this->model_news->get_news($id_news);

		$isi['content'] 	= 'news/tampil_read';
		$isi['judul']		= 'Artikel';
		$isi['sub_judul']	= 'news';
		$isi['data']  		= $this->db->get('news');
		$this->load->view('tampilan_home', $isi);
	}

}
