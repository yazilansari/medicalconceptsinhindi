<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_text extends MY_Model {


	public $p_key = '';
	public $table = '';
	
	public $session_key;

	function __construct() {
		parent::__construct($this->table);
		//$this->session_key = config_item('session_data_key');
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {
		
		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('ud.upload_data_id,ud.upload_title,ud.contributors_id,ud.upload_type,ud.upload_for_user_type,ud.short_description,ud.upload_description,ud.thumbnail,ud.category_id,cat.category_name,ud.sub_category_id,sc.sub_category_name,ud.upload_path,ud.tags,ud.added_date_time,ud.sort_order,md.*,COUNT(c1.comments_id) comments_count')
		->from('upload_data ud')
		->join('category cat', 'cat.category_id = ud.category_id and cat.is_active = 1')
		->join('sub_category sc', 'sc.sub_category_id = ud.sub_category_id and sc.is_active = 1')
      	->join('meta_tag_details md', 'md.meta_upload_data_id = ud.upload_data_id and md.is_active = 1','left')
      	->join('comments c1','c1.upload_data_id = ud.upload_data_id','LEFT');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
		$s_key = $this->db->escape_like_str($keywords);


			$where_condition = "(
				ud.upload_title like '%". $s_key ."%'
				or ud.short_description like '%". $s_key ."%'
				OR ud.upload_type like '%". $s_key ."%'
				OR ud.tags like '%". $s_key ."%'
				OR ud.upload_for_user_type like '%". $s_key ."%'
				OR cat.category_name like '%". $s_key ."%'
				OR sc.sub_category_name like '%". $s_key ."%'
				
			)";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where('(ud.upload_type="text" OR ud.upload_type="image" OR ud.upload_type="pdf")');
		$q->where("ud.is_active","1");
		$q->group_by('ud.upload_data_id');
		$q->order_by('ud.sort_order asc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();

		foreach ($collection as $key => $value) {
			
			if($value->upload_type=='text' || $value->upload_type=='pdf'){
				$collection[$key]->thumbnail_path = $this->get_thumbnail_image_path($value->thumbnail,$this->config->item('posts_thumbnail_path').$value->sub_category_id.'/',$value->sub_category_id);	
			}

			if($value->upload_type=='image'){
				$collection[$key]->thumbnail_path = $this->get_post_image_path($value->upload_path,$this->config->item('posts_images_path').$value->sub_category_id.'/',$value->sub_category_id);	
			}
			
		}

		return $collection;
	}

	function get_folder_records($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {
	
		//echo '<pre>';var_dump($f_filters);exit;

    	$q = $this->db->select('*, (Select count(ud.upload_data_id) from upload_data as ud where ud.sub_category_id = sc.sub_category_id AND sc.is_active="1" AND ud.is_active="1") as total_upload_count,mc.main_category_id,mc.main_category_name,f.folder_id,f.folder_name,c.category_id')
		->from('sub_category sc')
		->join('category c', 'c.category_id = sc.category_id and c.is_active = 1')
		->join('main_category_mapping mcm','c.category_id = mcm.category_id')
		->join('main_category mc','mcm.main_category_id = mc.main_category_id')
		->join('folder f', 'f.folder_id = sc.folder_id and f.is_active = 1');
		

		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}


		$q->where("sc.is_active","1");
		//$q->group_by('sc.folder_id');
		//$q->order_by('sc.sub_category_id desc');

		
		$collection = $q->get()->result();

		//echo '<pre>';var_dump($collection);exit;
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
