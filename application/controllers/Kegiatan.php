<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

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
			'title' => 'Master Kegiatan' ,
			'page'	=> 'master/kegiatan'
		);
		
		$data['tahun'] = $this->keg->getTahunKegiatan();
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
	
	function add(){
		$data = array(
			'title' => 'Tambah Master Kegiatan' ,
			'page'	=> 'master/kegiatan_add'
		);
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
	function addProcess(){
		$nama_keg = @$_POST['nama_keg'];
		$tahun_target = @$_POST['tahun_target'];
		$bulan_target = @$_POST['bulan_target'];
		$status = 'Aktif';
		$cdate = time();
		$cuser = 1;
		
		$arr = array(
			'nama_keg' => $nama_keg,
			'tahun' => $tahun_target,
			'status' => $status,
			'cdate' => $cdate,
			'cuser' => $cuser,

		);
		if($this->keg->insertKegiatan($arr)) {
			$id_keg = $this->db->insert_id();
			
			$arrTarget = array(
				'id_keg' => $id_keg,
				'id_target' => $bulan_target,
				'tahun' => $tahun_target,
				'status' => 'Aktif',
				'cdate' => $cdate,
				'cuser' => $cuser,
			);
			
			$this->keg->insertKegiatanTarget($arrTarget);
			
			$data = array(
				'status' => 1,
				'message' => 'Berhasil',
				'data' => array(
					'id_keg' => $id_keg,
				)
			);
		}
		else {
			$data = array(
				'status' => 0,
				'message' => 'Gagal Insert Kegiatan',
				'data' => array()
			);
		}
		
		echo json_encode($data);
	}
	
	function detail($idKeg){
		$data = array(
			'title' => 'Detail Master Kegiatan' ,
			'page'	=> 'master/kegiatan_detail'
		);
		
		$data['detail'] = $this->keg->detail($idKeg);
		$data['logTarget'] = $this->keg->logTarget($idKeg);
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
	
	function addLog($idKeg){
		$data = array(
			'title' => 'Tambah Log Kegiatan' ,
			'page'	=> 'master/kegiatan_log'
		);
		
		$data['detail'] = $this->keg->detail($idKeg);
		$data['logTarget'] = $this->keg->logTarget($idKeg);
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Kegiatan.php */
