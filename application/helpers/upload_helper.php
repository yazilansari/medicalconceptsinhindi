<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('upload')) {

	function upload($options = array()){
		$ci = &get_instance();
		$path = './uploads/'.$options['upload_path'];
		
		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}

		$fieldName = $options['name'];
	
		$config['upload_path'] = $path;
		$config['allowed_types'] = '*';
		//$config['max_size']	= '10240';
		//$config['create_thumb'] = TRUE;
		$config['max_size']	= '50240';
		$config['overwrite'] = FALSE;
		$config['encrypt_name'] = TRUE;

		if(isset($options['new_name'])){
			$config['file_name'] = $options['new_name'];
		}

		if(!in_array($_FILES["$fieldName"]["type"], array('image/png','image/jpeg','image/jpg','application/pdf')) ){
			return array('errors'=> 'Only image or pdf files allowed');
		}

		$ci->load->library('upload');
		$ci->upload->initialize($config);

		if ( ! $ci->upload->do_upload($options['name']))
			return array('errors'=>$ci->upload->display_errors());
		else{
			$data = $ci->upload->data();
			$filename = $data['raw_name'].$data['file_ext'];
			/* on success unset config */
			unset($config);
			return array('filename'=>$filename, 'full_path'=>$data['full_path']);
		}
	}
}