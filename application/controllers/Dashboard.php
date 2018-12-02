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
		$target = $this->db->query("SELECT * from target")->result_array();
		$aktif = $this->db->query("SELECT  count(c.nama_target) as total ,c.id_target, a.nama_keg, c.nama_target,  b.* from kegiatan a
			left join kegiatan_target b on a.id_keg = b.id_keg
			left join target c on b.id_target = c.id_target
			where b.status = 'aktif'
			GROUP BY c.nama_target
			order by nama_target asc")->result_array();

		foreach ($target as $targets) {
			// $targeting[] = $aktif[];
			$targeting[$targets['nama_target']] = $targets;
			$targetnya[] = $targets['nama_target'];
		}

		foreach($aktif as $row){
			$rekap_aktif[$row['id_target']] = (int)$row['total'];
		}
		foreach($target as $row){
			$total_bulan_target[$row['id_target']] = @$rekap_aktif[$row['id_target']];
			$rekap_target_selesi[] = @$rekap_aktif[$row['id_target']];
		}

		// print_r($rekap_target);
		// print_r($targetnya);

		// die();
		$data = array(
			'title' => 'Dashboard Monitoring Pemrakarsa' ,
			'page'	=> 'dashboard/dashboard',
			'target_pemrakarsa' => array(
				'categories' => $targetnya,
				'selesai' => $rekap_target_selesi,
			)
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
