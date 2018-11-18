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
		$this->load->model('front_model');
	}


	public function index(){
		$ada = $this->session->userdata('username') ? redirect('database','refresh') : '';
		
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		
		$data = array(
			'title' => 'Database Monitoring Kegiatan' ,
			'page'	=> 'master/database',
			'unit'	=> $this->front_model->get_all_unit(),
			'csrf'	=> $csrf,
			'message'	=> $this->session->flashdata('message')
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
