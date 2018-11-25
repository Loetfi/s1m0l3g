<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function check_login($referrer_url)
{
	$ci =& get_instance();
	if (isset($_GET['nologin'])) {
		return true;
		exit;
	} else {
    	$ci->session->set_userdata('referrer_url', $referrer_url);  //Set session for the referrer url
    	if ($ci->session->userdata('login_id')) {
    		return true; exit;
    	} else {
    		redirect('backend/auth','refresh');
    	}
    }
    return false;

}


function admsaction($link='' , $id = '' , $color = '' , $fa = '' , $nama = '')
{
	return $return = '<a href="'.$link.'/'.$id.'" class="btn btn-xs btn-'.$color.' ttipDatatables" data-provide="tooltip" data-placement="top" title="'.$nama.'" data-original-title="'.$nama.'" ><i class="'.$fa.'"></i></a>';
}

function admsapi($statusHeader,$status , $message, $data )
{
	$ci =& get_instance(); 
	$ci->output->set_header('Access-Control-Allow-Origin: *');
	$ci->output->set_header('Access-Control-Allow-Methods: POST, GET'); 
	$ci->output->set_header('Access-Control-Allow-Headers: Origin');
	$ci->output->set_content_type('application/json');
	$ci->output->set_status_header($statusHeader);
	$ci->output->set_output(json_encode(array ('status' => $status , 'message' =>  $message , 'data' => $data)));
	$ci->output->_display();
	exit();
}

function admsmethod($tipe)
{
	$method = $_SERVER['REQUEST_METHOD'];
	if($method != trim(strtoupper($tipe))){ 
		$response = admsapi(400, 0, 'Kesalahan Permintaan', []); 
		return FALSE;
	} else { return TRUE; }
	return;
}

function admspassword()
{
	return '830afea5006de36e41eddb4b33182483';
}

function admsCekSesiToken($token)
{
	// return;
	$ci =& get_instance();
	$login = '';
    // $token_header     = $this->input->get_request_header('Token', TRUE); 
	$query = $ci->db->select('*')->from('UsersAuthentication')->where('Token' , $token)->get()->row();
	//cek token
	$cek = $query->ExpiredAt;  

	if (strtotime($cek) < strtotime(date('Y-m-d H:i:s'))) { 
		// jika token sudah tidak aktif
		$respon = TRUE;
	} else {
		// jika token masih aktif
		$respon = admsapi(200 , 1, '','');
	}
	return $respon;


}


function btnPrivileges($value= 0 )
{
	$ret = $value == 1 ? '<a class="btn btn-info btn-xs"><i class="fa fa-check"></i></a>' : '<a class="btn btn-warning btn-xs"><i class="fa fa-remove"></i></a>';
	return $ret;
}

function btnStatus($value= 0 )
{
	$ret = $value == 1 ? '<span class="label label-success"><i class="fa fa-check"></i></span>' : '<span class="label label-danger"><i class="fa fa-remove"></i></span>';
	return $ret;
}

function linkservice($services) {
	// $BACKEND = ('BACKEND' == strtoupper($services)) ? $return = 'http://ibidadmsdevweb.azurewebsites.net/index.php/' : '';
	// $ACCOUNT = ('ACCOUNT' == strtoupper($services)) ? $return = 'http://ibidadmsdevserviceaccount.azurewebsites.net/index.php/' : '';
	// $NOTIF = ('NOTIF' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicenotification.azurewebsites.net/index.php/' : '';
	// $TAKSASI =  ('TAKSASI' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicetaksasi.azurewebsites.net/index.php/' : '';
	// $FRONTEND = ('FRONTEND' == strtoupper($services)) ? $return = 'http://ibidimsdevweb.azurewebsites.net/index.php/' : '';
	// $HANDOVER = ('HANDOVER' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicehandover.azurewebsites.net/index.php/' : '';
	// $STOCK = ('STOCK' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicestock.azurewebsites.net/index.php/' : '';
	// $MASTER = ('MASTER' == strtoupper($services)) ? $return = 'http://ibidadmsdevservicemasterdata.azurewebsites.net/index.php/' : ''; 
	
	$BACKEND   = ('BACKEND' == strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/adms/' : ''; 
	$ACCOUNT = ('ACCOUNT' == strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/service/akun/' : '';  
	$NOTIF     = ('NOTIF' == strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/service/notif/' : '';  
	$TAKSASI   =  ('TAKSASI' == strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/service/taksasi/' : '';  
	$FRONTEND   = ('FRONTEND' == strtoupper($services)) ? $return = 'https://ibid.astra.co.id/' : ''; 
	$HANDOVER   = ('HANDOVER' == strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/service/handover/' : ''; 
	$STOCK     = ('STOCK' == strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/service/stok/' : ''; 
	$MASTER   = ('MASTER' == strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/service/masterdata/' : ''; 
	$FINANCE   = ('FINANCE' === strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/service/finance/' : ''; 
	$NPL      = ('NPL' === strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/service/npl/' : ''; 
	$CMS    = ('CMS' === strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/dapur/' : '';  

	$AMSSCHEDULE    = ('AMSSCHEDULE' === strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/serviceams/schedule/api/' : ''; 
	$AMSSTOCK    = ('AMSSTOCK' === strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/serviceams/stock/api/' : ''; 
	$AMSAUTOBID    = ('AMSAUTOBID' === strtoupper($services)) ? $return = 'https://ibid.astra.co.id/backend/serviceams/autobid/api/' : '';
	$IMG_PATH = ('IMGS' === strtoupper($services)) ? $return = 'http://img.ibid.astra.co.id/uploads/upload360/' : '';

	return $return;
}

function admsCurl($url, $dataArray = array(), $method='GET') {
	$ci =& get_instance();
	
	$dataPost = http_build_query($dataArray);
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_PORT => "",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 60,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded"
		), 
		
		CURLOPT_URL => $url,
		CURLOPT_POSTFIELDS => $dataPost,
		CURLOPT_CUSTOMREQUEST => $method,
		
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);
	
	return array(
		'response' => $response,
		'err' => $err,
	);
}

/* End of file Adms_helper.php */
/* Location: ./application/helpers/Adms_helper.php */
