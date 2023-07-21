<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_notification_request extends MY_Model {

	public $p_key = 'n_req_id';
	public $table = 'notification_request';

	function __construct() {
		parent::__construct($this->table);
	}

	function get_notification_request(){
        $query = "SELECT
				 	nrd.user_id,nrd.device_id,nrd.device_type,nr.* 
				FROM 
					notification_request_devices nrd
				JOIN notification_request nr ON nr.n_req_id = nrd.request_id
                LIMIT 3000
				";
        $collection = $this->db->query($query)->result();
        return $collection;
	}


	   function get_file_path($file_name,$type,$id){
        $file_path = '';

        if($type=='video'){
            $file_path = $this->config->item('posts_video_path').$id.'/'.$file_name;
        }
        if($type=='audio'){
            $file_path = $this->config->item('posts_audio_path').$id.'/'.$file_name;
        }
        if($type=='pdf'){
            $file_path = $this->config->item('posts_pdf_path').$id.'/'.$file_name;
        }
        if($type=='image'){
            $file_path = $this->config->item('posts_images_path').$id.'/'.$file_name;
        }
        
        $file = "";

        if($file_name!=""){

        //var_dump($type);exit;
            if($type=='video'){
                if(file_exists(UPLOADPATH.$this->config->item('posts_video_exists').$id.'/'.$file_name)){
                    $file = $file_path;

                }else{
                    $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
                }
            }
            if($type=='audio'){
                if(file_exists(UPLOADPATH.$this->config->item('posts_audio_exists').$id.'/'.$file_name)){
                    $file = $file_path;

                }else{
                    $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
                }
            }
            if($type=='pdf'){
                if(file_exists(UPLOADPATH.$this->config->item('posts_pdf_exists').$id.'/'.$file_name)){
                    $file = $file_path;

                }else{
                    $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
                }
            }
            if($type=='image'){
                if(file_exists(UPLOADPATH.$this->config->item('posts_image_exists').$id.'/'.$file_name)){
                    $file = $file_path;

                }else{
                    $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
                }
            }
                
        }else{
            $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
        }
        
        return $file;
    }

}
