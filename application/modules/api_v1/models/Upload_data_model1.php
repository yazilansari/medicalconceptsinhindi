<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Upload_data_model extends MY_Model
{ 
	public function __construct()
    {
		parent::__construct();
		//load database library
        $this->load->database(); 
        
        $this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
        $this->load->model('common_model');
		$this->load->library(['session','s3']);
        $this->load->config('s3');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
		$this->db->query("SET time_zone = '+05:30'");
    }

    public function get_upload_data($data_arr,$tags="",$user_type=""){

    	$this->db->select("ud.*,sc.*,ud.upload_for_user_type as upload_for_user_type_for_data,con.contributors_name,COUNT(uds.users_data_seen_id) as view_count");
    	$this->db->from("upload_data ud");
    	$this->db->join("sub_category sc","ud.sub_category_id = sc.sub_category_id");
    	$this->db->join("category c","c.category_id = sc.category_id");
        $this->db->join("users_data_seen uds","ud.upload_data_id = uds.upload_data_id",'LEFT');
        $this->db->join("contributors con","ud.contributors_id = con.contributors_id",'LEFT');
    	$this->db->where($data_arr);

    	if($tags!=""){
    		/*$this->db->where("MATCH(ud.tags) AGAINST ('{$tags}' IN NATURAL LANGUAGE MODE)");*/
            $this->db->where("ud.tags LIKE '%{$tags}%'");
    	}

        if($user_type!=""){

            $where_c = "(ud.upload_for_user_type = '$user_type' OR ud.upload_for_user_type='Both')";
            $this->db->where($where_c);
        }

        $this->db->group_by('ud.upload_data_id');
    	$this->db->order_by("ud.sort_order","asc");
    	$query = $this->db->get();//echo $this->db->last_query();exit;
    	$data_arr = $query->result();

    	return $data_arr;

    }

    public function get_upload_data_concat($where, $user_type=''){

        $this->db->select("GROUP_CONCAT(ud.upload_data_id) as upload_data_id");
        $this->db->from("upload_data ud");
        $this->db->join("sub_category sc","ud.sub_category_id = sc.sub_category_id");
        $this->db->join("category c","c.category_id = sc.category_id");
        $this->db->where($where);

        if($user_type=='Student'){
            $this->db->where("(ud.upload_for_user_type='{$user_type}' OR ud.upload_for_user_type='BOTH')");    
        }else{
            $this->db->where("(ud.upload_for_user_type='BOTH' OR ud.upload_for_user_type='General')");
        }
        

        $query = $this->db->get();
        $data_arr = $query->result();
        
        return $data_arr;
    }

    public function check_seen_data_exists($where){

        $this->db->select("uds.*");
        $this->db->from("users_data_seen uds");
        $this->db->where($where);
        $query = $this->db->get();

        return $query->result_array();

    }

    public function insert_seen($insert_arr){

        $id = $this->common_model->insert_data_query("users_data_seen",$insert_arr);

        return $id;
    }

    function get_thumbnail_image_path($image_name,$path,$id){
        
        $image_path = $path.$image_name;
        
        $image_path = $this->config->item('s3_posts_thumbnail_exists').$id.'/'.$image_name;


        $image = "";

        if($image_name!=""){

             $image = $image_path;

           /* if(file_exists(UPLOADPATH.$this->config->item('posts_thumbnail_exists').$id.'/'.$image_name)){
            $image = $image_path;

            }else{
            */    //$image = $this->config->item('no_image_path')."medicalDirectors.jpg";
           // }   
        }else{
            $image = $this->config->item('no_image_path')."medicalDirectors.jpg";
        }
       // print_r($image);exit;
        return $image;
    }

    function get_file_path($file_name,$type,$id){
        $file_path = '';

        if($type=='video'){
            $file_path = $this->config->item('s3_posts_video_path').$id.'/'.$file_name;
        }
        if($type=='audio'){
            $file_path = $this->config->item('s3_posts_audio_path').$id.'/'.$file_name;
        }
        if($type=='pdf'){
            $file_path = $this->config->item('s3_posts_pdf_path').$id.'/'.$file_name;
        }
        if($type=='image'){
            $file_path = $this->config->item('s3_posts_images_path').$id.'/'.$file_name;
        }
        
        $file = "";
        if($file_name!=""){

            if($type=='video'){
                    $file = $file_path;

                 /*$info = S3::getObjectInfo('tech-mch', "assets/uploaded_data/posts_video/$id/$file_name");
                if($info){
                        $file = $file_path;
                }else{
                   
                        $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
                }*/
            }
            if($type=='audio'){
                $file = $file_path;
                /*if(file_exists(UPLOADPATH.$this->config->item('posts_audio_exists').$id.'/'.$file_name)){
                     $file = $file_path;
                }else{

                    $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
                }*/
            }
            if($type=='pdf'){
                $file = $file_path;
                /*if(file_exists(UPLOADPATH.$this->config->item('posts_pdf_exists').$id.'/'.$file_name)){
                    $file = $file_path;

                }else{
                    $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
                }*/
            }
            if($type=='image'){
                $file = $file_path;
                /*if(file_exists(UPLOADPATH.$this->config->item('posts_image_exists').$id.'/'.$file_name)){
                    $file = $file_path;

                }else{
                    $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
                }*/
            }
                
        }else{
            $file = $this->config->item('no_image_path')."medicalDirectors.jpg";
        }
        
        return $file;
    }

    public function get_upload_data_comments($data_arr){

        $this->db->select("c.comments_id,c.comment, c.upload_data_id, c.users_name, c.users_email, c.comments_dt");
        $this->db->from("comments c");
        $this->db->join("upload_data ud","c.upload_data_id = ud.upload_data_id");
        $this->db->where($data_arr);
        $this->db->where('c.is_active',1);
        $this->db->where('c.is_approved',1);
        $this->db->order_by("c.comments_dt","desc");
        $query = $this->db->get();//echo $this->db->last_query();exit;
        $data_arr = $query->result();

        return $data_arr;
    }

    public function get_notifications($data_arr){
        $ignore = array('NotRegistered','InvalidApnsCredential','InvalidRegistration');

        $this->db->select("no.*,COUNT(uds.users_data_seen_id) as view_count,con.contributors_name");
        $this->db->from("notification_log no");
        $this->db->join("upload_data uid","no.upload_data_id = uid.upload_data_id",'LEFT');
        $this->db->join("users_data_seen uds","uid.upload_data_id = uds.upload_data_id",'LEFT');
        $this->db->join("contributors con","uid.contributors_id = con.contributors_id",'LEFT');
        $this->db->where($data_arr);
        $this->db->where_not_in('status', $ignore);
        $this->db->group_by('no.upload_data_id');
        $this->db->order_by('no.notification_id','desc'); 
        $query = $this->db->get();//echo $this->db->last_query();exit;
        $data_arr = $query->result();
        return $data_arr;
    }

}
?>
