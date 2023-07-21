<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('upload_audio_video')) {

	function upload_audio_video($options = array()){
		$ci = &get_instance();
		$path = './uploads/'.$options['upload_path'];
		//var_dump($path);exit;
		if(!file_exists($path))
			mkdir($path, 0777, true);

		$fieldName = $options['name'];

		$config['upload_path'] = $path;
		$config['allowed_types'] = '*';/*
		$config['max_size']	= '30000000';
		$config['encrypt_name'] = FALSE;*/
		$config['file_name'] = $options['new_name'];

		if(!in_array($_FILES["$fieldName"]["type"], array('audio/basic','audio/mpeg','audio/x-wav','video/mp4','video/mkv','video/flv','video/avi','video/3gp','audio/mp3','application/octet-stream','audio/aac')) ){
			return array('errors'=> 'Only Audio and Video Files allowed');
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
