<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('auth_model','auth');
		$this->load->model('kegiatan_model','keg');
	}


	public function index(){
		$data = array(
			'title' => 'Database Monitoring Kegiatan' ,
			'page'	=> 'master/database'
		);
		
		// $data['tahun'] = $this->keg->getTahunKegiatan();
		// $data['getAllKegiatan'] = $this->keg->getAllKegiatan();
		// print_r($data['getAllKegiatan']); die();
		
		$this->load->view('template/header_front', $data, FALSE);
		// $this->load->view('template/content', $data, FALSE);
		// $this->load->view('template/footer', $data, FALSE);
	}
	
}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Kegiatan.php */
