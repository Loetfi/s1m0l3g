<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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
			'title' => 'Master Pengguna' ,
			'page'	=> 'master/pengguna',
			'url'	=> base_url('pengguna/data/1/1'),
			'detail'	=> base_url('pengguna/data/1/1'),
			'edit'	=> base_url('pengguna/data/1/1'),
			'delete'	=> base_url('pengguna/data/1/1')
		);
		
		$data['tahun'] = $this->keg->getTahunKegiatan();
		// $data['getAllKegiatan'] = $this->keg->getAllKegiatan();
		// print_r($data['getAllKegiatan']); die();
		
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/content', $data, FALSE);
		$this->load->view('template/footer', $data, FALSE);
	}

	public function data($id_flow , $login_id)
	{
		$this->load->helper('backend');

		$this->load->model('pengguna_model','lists');
		// $this->cabang_model->get_datatables();

		$table          = 'login';
    	$column_order   = ['a.username' , 'a.name', 'a.sub_sector']; //set column field database for datatable orderable
    	$column_search  = ['a.username' , 'a.name', 'a.sub_sector'];
    	$orderin        = ['a.username' => 'desc']; // default order  # 'id_website' => 'asc'



    	$list 	= $this->lists->get_datatables($table , $column_order , $column_search , $orderin, $id_flow , $login_id);

		// CRUDS Action Role
    	$detail 	= @urldecode($this->input->input_stream('detail'));
    	$update 	= @urldecode($this->input->input_stream('update'));
    	$delete 	= @urldecode($this->input->input_stream('delete'));  

    	$data 	= array();
    	$no 	= @$_POST['start'];
    	foreach ($list as $d) {

    		$no++;
    		$row 	= array();  

    		$ACTdetail 	 = $detail ? admsaction($detail  ,  @$d->login_id , 'info' , 'fa fa-eye' , 'Lihat') : false;
    		$ACTupdate   = $update ? admsaction($update  ,  @$d->login_id , 'success' , 'fa fa-pencil' , 'Ubah') : false;
    		$ACTdelete   = $delete ? anchor('#', '<i class="fa fa-trash"></i>', "class=\"btn btn-xs btn-danger ttipDatatables\" onclick=\"modal_delete('".$delete.'/'.@$d->CompanyId."');\" title=\"Hapus\"") : false; 

    		$row[]	= $d->login_id;
    		$row[] 	= $d->name;
    		$row[]	= $d->username;
    		$row[]	= $d->id_flow;
    		$row[]	= $d->sub_sector;
    		// $row[]	= '';
			$row[]	= btnStatus($d->status);
    		// name
    		// sub_sector
    		// id_flow
			// $row[]	= date('d F Y H:i:s',strtotime($d->cdate)); 
    		$row[]	= "<div class='btn-group'>".$ACTdetail." ".$ACTupdate." ".$ACTdelete ."</div>"; 

    		$data[] = $row;
    	}

    	$output = array(
    		"draw" => $_POST['draw'],
    		"recordsTotal" => $this->lists->count_all($table, $id_flow , $login_id),
    		"recordsFiltered" => $this->lists->count_filtered($table , $column_order , $column_search , $orderin, $id_flow , $login_id),
    		"data" => $data,
    	);
   		//output to json format 
    	admsapi(200 , 1, 'sukses' , $output );  

    }

    public function add(){

    	$data = array(
    		'title' => 'Master Pengguna' ,
    		'page'	=> 'master/pengguna_add'
    	);

    	$data['tahun'] = $this->keg->getTahunKegiatan();
		// $data['getAllKegiatan'] = $this->keg->getAllKegiatan();
		// print_r($data['getAllKegiatan']); die();

    	$this->load->view('template/header', $data, FALSE);
    	$this->load->view('template/content', $data, FALSE);
    	$this->load->view('template/footer', $data, FALSE);
    }

}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Kegiatan.php */
