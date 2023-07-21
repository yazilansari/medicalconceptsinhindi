<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('upload_media_old')) {

	function upload_media_old($options = array(),$s3 = false,$s3uploadPath = ''){
        $ci = &get_instance();
        $ci->load->library('upload');

        $fieldName = $options['name'];
        $allowed_types = $options['allowed_types'];

        if(!$allowed_types){
            return array('errors'=> 'Invalid Types');
        }


        $isExistFile = $_FILES["$fieldName"]['name'];
        
        if(empty($isExistFile)){
            return array('errors'=> 'Media Required');
        }
        
        // print_r(count(array($_FILES["$fieldName"]['name'])));exit;
        $filesCount = count(array($_FILES["$fieldName"]['name']));
        
        $path = $options['upload_path'];
        
        if($s3 != true){
            if(!file_exists($path)){
                mkdir($path, 0755, true);
            } 
            $config['upload_path'] = $path;
            $media_path = $path;
            $config['s3'] = false;
        }else{
            $media_path = $s3uploadPath;
            $config['s3'] = true;
        }

        $config['allowed_types'] = $allowed_types;
        $config['max_size']	= '100000';
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = TRUE;
        //$config['max_size']	= '10240';
        //$config['create_thumb'] = TRUE;
        // $config['file_name'] = $options['new_name'];

        $ci->upload->initialize($config);
         
        for($i = 0; $i < $filesCount; $i++){

            $_FILES['userfile']['name']     = $_FILES[$fieldName]['name'];
            $_FILES['userfile']['type']     = $_FILES[$fieldName]['type'];
            $_FILES['userfile']['tmp_name'] = $_FILES[$fieldName]['tmp_name'];
            $_FILES['userfile']['error']    = $_FILES[$fieldName]['error'];
            $_FILES['userfile']['size']     = $_FILES[$fieldName]['size'];
            
            if($s3 === true){
                
                $upload_callback = $ci->upload->do_s3_upload($s3uploadPath);
            }else{
                $upload_callback = $ci->upload->do_upload();
            }

            if ( ! $upload_callback){
                return  array('errors'=>$ci->upload->display_errors());
            }else{
                $data = $ci->upload->data();
                /* on success unset config */
                $img_response = array('filename'=>trim($media_path,'/').'/'.$data['file_name'], 'full_path'=>$data['full_path'],'type'=>$data['image_type']);
            } 
        }
        unset($config);
        return $img_response;
	}
}