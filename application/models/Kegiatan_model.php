<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {

	public function get_log_kegiatan_anggota($idLog='')
	{
		try {
			return $this->db->query("SELECT * from kegiatan_anggota where id_log = $idLog")->result_array();
		} catch (Exception $e) {
			return false;
		}
	}

	public function editkegiatan_log($idLog)
	{
		try {
			return $this->db->query("SELECT * from kegiatan_log a
				inner join kegiatan b on a.id_keg = b.id_keg
				where a.id_log = $idLog")->row_array();
		} catch (Exception $e) {
			return false;
		}
	}
	
	function getTahunKegiatan(){
		$sql = "select distinct tahun from kegiatan order by tahun asc";
		$resutl = $this->db->query($sql)->result_array();
		return $resutl;
	}
	function getAllKegiatan($idUnit = 0){
		$where = '';
		if ($idUnit != 0)
			$where = " Where k.id_unit = '".$idUnit."' ";
		
		$sql = "SELECT
		k.*, 
		u.nama_unit,
		u.url_img,
		t.id_target,
		t.tahun AS tahun_pengajuan,
		t.cdate AS t_cdate
		FROM
		kegiatan k
		LEFT JOIN kegiatan_target t 
		ON k.id_keg = t.id_keg
		AND t. STATUS = 'aktif'
		LEFT JOIN unit u 
		ON u.id_unit = k.id_unit
		".$where."
		ORDER BY
		t.tahun DESC,
		k.id_keg DESC";
		$resutl = $this->db->query($sql)->result_array();
		return $resutl;
	}
	
	function insertKegiatan($post){
		$query = $this->db->insert('kegiatan', $post);
		if ($query) {
			return true;
		} else {
			return false;
		}
		
	}
	
	function insertKegiatanTarget($post){
		$query = $this->db->insert('kegiatan_target', $post);
		if ($query) {
			return true;
		} else {
			return false;
		}
		
	}
	
	function resetTarget($idKeg){
		$data = array(
			'mdate' => time(),
			'muser' => 1,
			'status' => 'Pasif',
		);
		$this->db->where(array('id_keg' => $idKeg));
		return $query = $this->db->update('kegiatan_target', $data);
	}
	
	function detail($idKeg, $idUnit = 0){
		$where = '';
		if ($idUnit != 0)
			$where = " AND k.id_unit = '".$idUnit."' ";
		
		$sql = "SELECT  
		id_keg
		,k.id_unit
		,nama_keg
		,tahun
		,abstraksi
		,nama_unit
		,url_img
		,k.status
		,k.cdate
		,k.cuser
		,k.mdate
		,k.muser
		,url_ranah
		FROM kegiatan k
		LEFT JOIN unit u 
		ON u.id_unit = k.id_unit
		where k.id_keg = '$idKeg' 
		".$where;
		$resutl = $this->db->query($sql)->row_array();
		return $resutl;
	}
	
	function logTarget($idKeg){
		$sql = "select  
		id_keg
		,id_target
		,tahun
		,status
		,cdate
		,cuser
		,mdate
		,muser
		from kegiatan_target 
		where id_keg = '$idKeg' 
		order by tahun desc, id_target desc
		";
		$resutl = $this->db->query($sql)->result_array();
		return $resutl;
	}
	
	function updateKegiatanLog($post,$idLog){
		$this->db->where('id_log', $idLog);
		$query = $this->db->update('kegiatan_log', $post);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	function insertKegiatanLog($post){
		$query = $this->db->insert('kegiatan_log', $post);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	
	function insertKegiatanAnggota($post){
		$query = $this->db->insert('kegiatan_anggota', $post);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	
	function logKegiatan($idKeg){
		$sql = "select
		id_log
		,id_keg_target
		,tanggal
		,lokasi
		,judul_kegiatan
		,hasil_kegiatan
		,file_pendukung
		,file_asli
		,status
		,cdate
		,mdate
		FROM kegiatan_log
		where id_keg = $idKeg
		order by tanggal DESC, id_log DESC
		";
		$resutl = $this->db->query($sql)->result_array();
		return $resutl;
	}
	function logAnggota($idKeg){
		$sql = "select
		id_log
		,nama_peserta
		,jabatan
		FROM kegiatan_anggota
		WHERE id_log IN (
		select id_log from kegiatan_log where id_keg = $idKeg
		)
		";
		$resutl = $this->db->query($sql)->result_array();
		return $resutl;
	}
	
	function editKegiatan($post, $where){
		$this->db->where($where);
		return $query = $this->db->update('kegiatan', $post);
	}
	
	function searchFileLog($idKeg, $idLog, $filename){
		$sql = "SELECT 
		file_pendukung, file_asli 
		FROM kegiatan_log 
		WHERE 
		id_keg = '".$idKeg."'
		AND id_log = '".$idLog."'
		AND file_pendukung like '%".$filename."%'
		LIMIT 1
		";
		$resutl = $this->db->query($sql)->row_array();
		return $resutl;
	}
	
}

/* End of file Auth_model.php */
/* Location: ./application/modules/backend/models/Auth_model.php */
