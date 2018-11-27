<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model {

	public function get_all_unit()
	{
		try {
			return $this->db->query("SELECT * from unit where is_parent = 0 order by position asc")->result();
		} catch (Exception $e) {
			return $this->db->_error_message();
		}
	}
	
	public function detail_unit($id)
	{
		try {
			return $this->db->query("SELECT * from unit where id_unit = $id")->row_array();
		} catch (Exception $e) {
			return $this->db->_error_message();
		}
	}	

}

/* End of file Front_model.php */
/* Location: ./application/models/Front_model.php */
