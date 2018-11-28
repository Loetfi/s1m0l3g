<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model { 

    //ambil data mahasiswa dari database
    function get_kegiatan($limit, $start,$search = null){
        

        $this->db->from('kegiatan a');
        $this->db->join('unit b ', 'a.id_unit = b.id_unit');
        if ($search == 0) {
            $this->db->like('nama_keg', $search, 'BOTH');
        }
        $this->db->limit($limit);
        $this->db->offset($start);
        return $this->db->get();
        // $query = $this->db->get('kegiatan', $limit, $start);
        // return $query;
    }
    
} 
