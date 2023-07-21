<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_api extends MY_Model{

	public function __construct(){
		parent::__construct();
	}

	function validateToken($access_token){
		$token_record = $this->get_records(
			['access_token'=> $access_token],
			'access_token',
			['doc_id', 'device_id', 'device_type', 'app_version'],
			'doc_id',
			1
		);

		return $token_record;
	}
}
