<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model {

	public function get_all_unit()
	{
		try {
			return $this->db->query("SELECT * from unit where is_parent = 0")->result();
		} catch (Exception $e) {
			return $this->db->_error_message();
		}
	}	

}

/* End of file Front_model.php */
/* Location: ./application/models/Front_model.php */
