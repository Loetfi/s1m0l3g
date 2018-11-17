<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {
	
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
	
	function detail($idKeg, $idUnit = 0){
		$where = '';
		if ($idUnit != 0)
			$where = " AND id_unit = '".$idUnit."' ";
		
		$sql = "select  
			id_keg
			,nama_keg
			,tahun
			,status
			,cdate
			,cuser
			,mdate
			,muser
		from kegiatan 
		where id_keg = '$idKeg' 
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
		order by tanggal DESC
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
	
}

/* End of file Auth_model.php */
/* Location: ./application/modules/backend/models/Auth_model.php */
