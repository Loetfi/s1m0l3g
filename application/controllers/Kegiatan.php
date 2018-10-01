<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('auth_model','auth');
	}


	public function index()
	{
		// $this->load->view('welcome_message');
		$data = array(
			'title' => 'Template' ,
			'page'	=> 'master/kegiatan'
		);
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}

}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Kegiatan.php */
