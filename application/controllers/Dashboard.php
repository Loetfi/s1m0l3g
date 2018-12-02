<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data = array(
			'title' => 'Dashboard Monitoring Pemrakarsa' ,
			'page'	=> 'dashboard/dashboard'
		);
		
		// database
		$unit = $this->front_model->get_all_unit();
		foreach($unit as $row){
			$detailUnit[$row->id_unit] = $row;
			$categories[] = $row->nama_unit;
		}
		
		
		// kegiatan berdasarkan unit
		$rekapKegiatan = $this->db->query("
			SELECT id_unit, tahun, count(*) terhitung
			FROM `kegiatan` 
			WHERE tahun= '".date('Y')."'
			GROUP BY id_unit, tahun
		")->result_array();
		foreach($rekapKegiatan as $row){
			$rekapUnit[$row['id_unit']] = (int)$row['terhitung'];
		}
		foreach($unit as $row){
			$terhitungUnit[$row->id_unit] = @$rekapUnit[$row->id_unit];
			$dataNilai[] = @$rekapUnit[$row->id_unit];
		}
		$data['diagramBatangTahun'] = array(
			'categories' => $categories,
			'data' => $dataNilai,
		);
		
		// target kegiatan
		// $rekapTargetUnit
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
	
}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Kegiatan.php */
