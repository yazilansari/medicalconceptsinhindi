<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_maincategory extends MY_Model {


	public $p_key = '';
	public $table = '';
	
	public $session_key;

	function __construct() {
		parent::__construct($this->table);
		//$this->session_key = config_item('session_data_key');
	}

	function get_post_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

    	$q = $this->db->select('ud.*,sc.sub_category_id,sc.sub_category_name,md.meta_slug,mc.main_category_name')
		->from('upload_data ud')
		->join('sub_category sc','sc.sub_category_id = ud.sub_category_id')
		->join('category c','c.category_id = sc.category_id')
		->join('main_category_mapping mcm','c.category_id = mcm.category_id')
		->join('main_category mc','mcm.main_category_id = mc.main_category_id')
      	->join('meta_tag_details md', 'md.meta_upload_data_id = ud.upload_data_id and md.is_active = 1','left');
				
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				category.category_name like '%". $s_key ."%'
			) ";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("ud.is_active","1");
		$q->order_by('ud.upload_data_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection1 	= $q->get();//echo $this->db->last_query();exit;
		$collection 	= $collection1->result();

		foreach ($collection as $key => $value) {
			
			if($value->upload_type=='audio' || $value->upload_type=='text' || $value->upload_type=='pdf' || ($value->upload_type=='video' && $value->video_type=='inhouse')){
				$collection[$key]->thumbnail_path = $this->get_thumbnail_image_path($value->thumbnail,$this->config->item('posts_thumbnail_path').$value->sub_category_id.'/',$value->sub_category_id);	
			}

			if($value->upload_type=='video' && $value->video_type=='youtube'){
				$collection[$key]->thumbnail_path = "https://img.youtube.com/vi/".$value->youtube_video_id."/0.jpg";
			}

			if($value->upload_type=='image'){
				$collection[$key]->thumbnail_path = $this->get_post_image_path($value->upload_path,$this->config->item('posts_images_path').$value->sub_category_id.'/',$value->sub_category_id);	
			}
			
		}
		
		return $collection;
	}	

	function get_thumbnail_image_path($image_name,$path,$id){
		
		$image_path = $path.$image_name;
		
		$image = "";

		if($image_name!=""){
			if(file_exists(UPLOADPATH.$this->config->item('posts_thumbnail_exists').$id.'/'.$image_name)){
			$image = $image_path;

			}else{
				$image = $this->config->item('no_image_path')."medicalDirectors.jpg";
			}	
		}else{
			$image = $this->config->item('no_image_path')."medicalDirectors.jpg";
		}
		
		return $image;
	}

	function get_post_image_path($image_name,$path,$id){
		
		$image_path = $path.$image_name;
		
		$image = "";

		if($image_name!=""){
			if(file_exists(UPLOADPATH.$this->config->item('posts_image_exists').$id.'/'.$image_name)){
			$image = $image_path;

			}else{
				$image = $this->config->item('no_image_path')."medicalDirectors.jpg";
			}	
		}else{
			$image = $this->config->item('no_image_path')."medicalDirectors.jpg";
		}
		
		return $image;
	}
}
