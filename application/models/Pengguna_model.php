<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model { 

    // add pengguna 

    public function create_user($parameter=array())
    {
        try {

            $insert = array(
                'username' => $parameter['username'], 
                'password' => sha1($parameter['password']), 
                'status'    => 1,
                'name' => $parameter['name'],
                'sub_sector' => $parameter['unit'], 
                'id_flow' => $parameter['id_flow'],
                'email' => $parameter['username']
            );
            $this->db->insert('login', $insert);
            if ($this->db->affected_rows()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $this->db->_error_message();
        }
    }

    // _get_datatables_query
    public function datatable($table , $column_order = array() , $column_search = array() , $orderin = array(), $id_flow, $login_id)
    {   

      $this->db->select('a.login_id, a.username, a.name , a.sub_sector, a.id_flow, a.status');
      $this->db->from('login a');
      // $this->db->join('login b','a.cuser = b.login_id','LEFT');
      // $this->db->where("a.cuser is not null and submit_doc = 1 and sub_sector = 'migas'");
      // $this->db->group_by('a.id_dokumen');

      $i = 0;
        foreach ($column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                
                if(count($column_search) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']); 
        }
        else if(isset($orderin))
        {
            $order = $orderin;
            $this->db->order_by(key($order), $order[key($order)]);
            // $this->db->order_by($orderin);
        }
    }
    
    function get_datatables($table , $column_order = array() , $column_search = array() , $orderin = array(),$id_flow , $login_id){
        $this->datatable($table , $column_order , $column_search  , $orderin ,$id_flow , $login_id );
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered($table , $column_order = array() , $column_search = array() , $orderin = array(), $id_flow , $login_id){
        $this->datatable($table , $column_order , $column_search  , $orderin , $id_flow , $login_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all($table,$login_id){
        $this->db->from($table);
        // $this->db->where('cuser', $login_id);
        return $this->db->count_all_results();
    }	
    
} 
