<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('breadcrumbs');
		$this->load->model('auth_model','auth');
		$this->load->model('kegiatan_model','keg');
		$this->load->model('front_model');
		
		$this->breadcrumbs->push('Database', 'database');
		// $this->breadcrumbs->push('Daftar', 'permohonan');
		// $this->breadcrumbs->push('Detail', 'permohonan');
		// $this->breadcrumbs->push('Edit Regulasi', 'permohonan');
	}


	public function index(){
		$data = array(
			'title' => 'Master Regulasi' ,
			'page'	=> 'master/kegiatan'
		);
		
		$data['tahun'] = $this->keg->getTahunKegiatan();
		$data['getAllKegiatan'] = $this->keg->getAllKegiatan();
		// print_r($data['getAllKegiatan']); die();
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
	public function listing($idUnit){
		
		$detailUnit = $this->front_model->detail_unit($idUnit);
		$data = array(
			'title' => 'Master Regulasi '.@$detailUnit['nama_unit'],
			'page'	=> 'master/kegiatan',
			'idUnit'=> $idUnit,
			'backUrl'=> 'database'
		);
		
		$data['tahun'] = $this->keg->getTahunKegiatan();
		$data['getAllKegiatan'] = $this->keg->getAllKegiatan($idUnit);
		// print_r($data['getAllKegiatan']); die();
		
		$this->breadcrumbs->push('Daftar Regulasi', '#');
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
	
	function add($idUnit){
		
		if (!$this->session->userdata('username'))
			redirect(site_url('kegiatan/listing/'.$idUnit));
		
		$detailUnit = $this->front_model->detail_unit($idUnit);
		$data = array(
			'title' => 'Tambah Master Regulasi '.@$detailUnit['nama_unit'],
			'page'	=> 'master/kegiatan_add',
			'idUnit'=> $idUnit,
			'backUrl'=> 'kegiatan/listing/'.$idUnit
		);
		
		$this->breadcrumbs->push('Daftar Regulasi', 'kegiatan/listing/'.$idUnit);
		$this->breadcrumbs->push('Tambah Regulasi '.@$detailUnit['nama_unit'], '#');
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
	function addProcess($idUnit){
		$nama_keg = @$_POST['nama_keg'];
		$tahun_target = @$_POST['tahun_target'];
		$bulan_target = @$_POST['bulan_target'];
		$abstraksi = @$_POST['abstraksi'];
		$status = 'Aktif';
		$cdate = time();
		$cuser = 1;
		
		$arr = array(
			'id_unit' => $idUnit,
			'nama_keg' => $nama_keg,
			'tahun' => $tahun_target,
			'abstraksi' => $abstraksi,
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
			
			$namaFolder = 'Kegiatan_'.$id_keg;
			mkdir("uploads/".$namaFolder, 0755, true);
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
	
	function detail($idUnit = null , $idKeg = null){
		
		$data = array(
			'title' => 'Detail Master Regulasi' ,
			'page'	=> 'master/kegiatan_detail' ,
			'idUnit'=> $idUnit,
			'backUrl'=> 'kegiatan/listing/'.$idUnit,
			'access_edit' => role_access(@$this->session->userdata('id_flow'), @$idUnit)
		);
		$data['detail'] = $this->keg->detail($idKeg, $idUnit);
		if (!$data['detail'])
			redirect('kegiatan/listing/'.$idUnit,'refresh');
		
		$data['logTarget'] = $this->keg->logTarget($idKeg);
		
		$idxLog = 0;
		$arrIdLog = array();
		@$allLogKegiatan = array();
		@$allLogKegiatanTimeline = array();
		@$allLogKegiatanAccordion = array();
		$logKegiatan = $this->keg->logKegiatan($idKeg);
		foreach($logKegiatan as $row){
			$id_log = $row['id_log'];
			if(!in_array($id_log, $arrIdLog))
				$arrIdLog[] = $id_log;
			
			$tanggal = date('d M Y', strtotime($row['tanggal']));
			$waktu = date('H:i:s', strtotime($row['tanggal']));
			
			$file_nameasli = explode(';',$row['file_asli']);
			$file_pendukung = explode(';',$row['file_pendukung']);
			for($i=0; $i<count($file_pendukung) -1; $i++){ 
				$namaFile = $file_pendukung[$i]; 
				$namaFileAsli = $file_nameasli[$i]; 
				
				$file[$i]['namaFile'] = $namaFile;
				$file[$i]['namaFileAsli'] = $namaFileAsli;
			}
			
			$allLogKegiatan[$idxLog] = $row;
			$allLogKegiatan[$idxLog]['tanggal'] = @$tanggal;
			$allLogKegiatan[$idxLog]['waktu'] = @$waktu;
			$allLogKegiatan[$idxLog]['file'] = @$file;
			
			if ($idxLog < 3)
				$allLogKegiatanTimeline[] = $allLogKegiatan[$idxLog];
			else 
				$allLogKegiatanAccordion[] = $allLogKegiatan[$idxLog];
			
			$idxLog++;
		}
		$data['allLogKegiatan'] = @$allLogKegiatan;
		$data['allLogKegiatanTimeline'] = @$allLogKegiatanTimeline;
		$data['allLogKegiatanAccordion'] = @$allLogKegiatanAccordion;
		// print_r(@$allLogKegiatan); die();
		
		$idxLog = 0;
		$arrIdLog = array();
		$logAnggota = $this->keg->logAnggota($idKeg);
		foreach($logAnggota as $row){
			$id_log = $row['id_log'];
			$allLogAnggota[$id_log][] = array(
				'jabatan' => $row['jabatan'],
				'nama_peserta' => $row['nama_peserta'],
			);
		}
		$data['allLogAnggota'] = @$allLogAnggota;
		// print_r($allLogAnggota); die();
		
		// die();
		
		$this->breadcrumbs->push('Daftar Regulasi', 'kegiatan/listing/'.$idUnit);
		$this->breadcrumbs->push('Detail Regulasi', '#');
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
	
	function addLog($idUnit, $idKeg){
		$detailUnit = $this->front_model->detail_unit($idUnit);
		$data = array(
			'title' => 'Tambah Kegiatan Regulasi '.@$detailUnit['nama_unit'] ,
			'page'	=> 'master/kegiatan_log',
			'idUnit'=> $idUnit,
			'backUrl'=> 'kegiatan/detail/'.$idUnit.'/'.$idKeg
		);
		
		$data['detail'] = $this->keg->detail($idKeg, $idUnit);
		if (!$data['detail'])
			redirect('kegiatan/listing/'.$idUnit,'refresh');
		if ($data['detail']['status'] == 'Selesai')
			redirect('kegiatan/detail/'.$idUnit.'/'.$idKeg,'refresh');
		
		$data['logTarget'] = $this->keg->logTarget($idKeg);
		
		$this->breadcrumbs->push('Daftar Regulasi', 'kegiatan/listing/'.$idUnit);
		$this->breadcrumbs->push('Detail Regulasi', 'kegiatan/detail/'.$idUnit.'/'.$idKeg);
		$this->breadcrumbs->push('Tambah Kegiatan', '#');
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}
	function addLogProcess($idUnit){
		$cdate = time();
		
		$id_keg = @$_POST['id_keg'];
		$judul_kegiatan = @$_POST['judul_kegiatan'];
		$hasil_kegiatan = @$_POST['hasil_kegiatan'];
		$lokasi = @$_POST['lokasi'];
		$tanggal = @$_POST['tanggal'];
		$waktu = @$_POST['waktu'];
		$status = @$_POST['status'];
		$YmdHis = date('Y-m-d H:i:s', strtotime($tanggal.' '.$waktu));
		
		$namaFolder = 'Kegiatan_'.$id_keg;
		
		## UNTUK UPLOAD FILE 
		$config = array();
		$config['upload_path'] = './uploads/'.$namaFolder;
		$config['allowed_types'] = '*';
		$config['max_size']      = '0';
		$config['overwrite']     = true;
		
		$files = $_FILES;
		for($i=0; $i < count($files['uploadfile']['name']); $i++){
			if ($files['uploadfile']['error'][$i] == 0){
				$_FILES['userfile']['name']= $files['uploadfile']['name'][$i];
				$_FILES['userfile']['type']= $files['uploadfile']['type'][$i];
				$_FILES['userfile']['tmp_name']= $files['uploadfile']['tmp_name'][$i];
				$_FILES['userfile']['error']= $files['uploadfile']['error'][$i];
				$_FILES['userfile']['size']= $files['uploadfile']['size'][$i];
				
				$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
				$cekPhoto = $_FILES['userfile']['tmp_name'];
				
				## random text
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'
					.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
				 .'0123456789'); // and any other characters
				shuffle($seed);
				$rand = '';
				foreach (array_rand($seed, 10) as $k){
					$rand .= $seed[$k];
				}
				$file_name= $cdate.'_'.$rand;
				$config['file_name'] = $file_name;
				$uploadFileName = $config['file_name'].".".$ext;
				$this->load->library('upload', $config);
				
				$this->upload->initialize($config);
				if (!$this->upload->do_upload()){
					$salah = $this->upload->display_errors();
					print_r($salah);
				} else {
					@$file_pendukung .= $uploadFileName.';';
					@$file_nameasli .= $_FILES['userfile']['name'].';';
				}
			}
		}
		
		
		$asd = '';
		$dataInsert = array(
			'id_keg' => $id_keg,
			'tanggal' => $YmdHis,
			'lokasi' => $lokasi,
			'judul_kegiatan' => $judul_kegiatan,
			'hasil_kegiatan' => $hasil_kegiatan,
			'file_pendukung' => $file_pendukung,
			'file_asli' => $file_nameasli,
			'status' => $status,
			'cdate' => $cdate,
		);
		if($this->keg->insertKegiatanLog($dataInsert)) {
			
			// insert anggota
			$id_log = $this->db->insert_id();
			$nama_peserta = @$_POST['nama_peserta'];
			$jabatan = @$_POST['jabatan'];
			for($i=0; $i<count($nama_peserta); $i++){
				$kegiatan_anggota = array(
					'id_log' => $id_log,
					'nama_peserta' => @$nama_peserta[$i],
					'jabatan' => @$jabatan[$i],
					'status' => 'Done',
					'cdate' => $cdate,
				);
				if ($nama_peserta[$i] != '' && $jabatan[$i] != '')
					$this->keg->insertKegiatanAnggota($kegiatan_anggota);
			}
			
			// update kegiatan
			$this->db->update('kegiatan', array('mdate' => $cdate), array('id_keg' => $id_keg));
		}
		
		redirect('kegiatan/detail/'.$idUnit.'/'.$id_keg,'refresh');
	}
	
	function edit($idUnit, $idKeg){
		if (!$this->session->userdata('username'))
			redirect(site_url('kegiatan/listing/'.$idUnit));
		
		$data = array(
			'title' => 'Edit Regulasi' ,
			'page'	=> 'master/kegiatan_edit',
			'backUrl'=> 'kegiatan/detail/'.$idUnit.'/'.$idKeg
		);
		
		$data['detail'] = $this->keg->detail($idKeg, $idUnit);
		if (!$data['detail'])
			redirect('kegiatan/listing/'.$idUnit,'refresh');
		if ($data['detail']['status'] == 'Selesai')
			redirect('kegiatan/detail/'.$idUnit.'/'.$idKeg,'refresh');
		
		$data['logTarget'] = $this->keg->logTarget($idKeg);
		
		$this->breadcrumbs->push('Daftar Regulasi', 'kegiatan/listing/'.$idUnit);
		$this->breadcrumbs->push('Detail Regulasi', 'kegiatan/detail/'.$idUnit.'/'.$idKeg);
		$this->breadcrumbs->push('Edit Regulasi', '#');
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
		
	}
	function editProcess(){
		$id_keg = $_POST['id_keg'];
		$nama_keg = $_POST['nama_keg'];
		$status = $_POST['status'];
		$abstraksi = $_POST['abstraksi'];
		$url_ranah = $_POST['url_ranah'];
		$mdate = time();
		
		$arrUpdate = array(
			'nama_keg' => $nama_keg,
			'status' => $status,
			'abstraksi' => $abstraksi,
			'mdate' => $mdate
		);
		if ($status == 'Selesai')
			$arrUpdate['url_ranah'] = $url_ranah;
		$this->keg->editKegiatan($arrUpdate, array('id_keg' => $id_keg));
		
		$data = array(
			'status' => 1,
			'message' => 'Berhasil',
			'data' => array()
		);
			
		echo json_encode($data);
	}
	function addTarget(){
		$id_keg = $_POST['id_keg'];
		$tahun_target = @$_POST['tahun_target'];
		$bulan_target = @$_POST['bulan_target'];
		$status = $_POST['status'];
		$cdate = time();
		
		$this->keg->resetTarget($id_keg);
		
		$arrTarget = array(
			'id_keg' => $id_keg,
			'id_target' => $bulan_target,
			'tahun' => $tahun_target,
			'status' => $status,
			'cdate' => $cdate,
			'cuser' => @$cuser,
		);
		
		$this->keg->insertKegiatanTarget($arrTarget);
		
		$data = array(
			'status' => 1,
			'message' => 'Berhasil',
			'data' => array()
		);
			
		echo json_encode($data);
	}
	
	function downloadFile($idKeg, $idLog, $fileName){
		$this->load->helper('download');
		$data = file_get_contents(base_url('uploads/Kegiatan_'.$idKeg.'/'.$fileName));
		
		$namaFileDownload = $fileName;
		$thisData = $this->keg->searchFileLog($idKeg, $idLog, $fileName);
		$file_nameasli = explode(";", $thisData['file_asli']);
		$file_pendukung = explode(";", $thisData['file_pendukung']);
		for($i=0; $i<count($file_pendukung); $i++){
			if ($fileName == $file_pendukung[$i])
				$namaFileDownload = str_replace(';','',$file_nameasli[$i]);
		}
		force_download($namaFileDownload, $data);
        
	}
	// http://localhost:55/04.Project/ESDM/s1m0l3g/index.php/kegiatan/downloadFile/10/1542535338_r5mu481Ta7.jpg
}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Kegiatan.php */
