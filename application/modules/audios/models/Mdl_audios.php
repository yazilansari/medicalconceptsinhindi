<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_audios extends MY_Model {


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
				OR ud.upload_description like '%". $s_key ."%'
				OR ud.upload_type like '%". $s_key ."%'
				OR ud.tags like '%". $s_key ."%'
				OR ud.upload_for_user_type like '%". $s_key ."%'
				OR cat.category_name like '%". $s_key ."%'
				OR sc.sub_category_name like '%". $s_key ."%'
				
			)";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("ud.is_active","1");
		$q->group_by('ud.upload_data_id');
		$q->order_by('ud.sort_order desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();

		foreach ($collection as $key => $value) {
			
			$collection[$key]->thumbnail_path = $this->get_thumbnail_image_path($value->thumbnail,$this->config->item('posts_thumbnail_path').$value->sub_category_id.'/',$value->sub_category_id);
			$collection[$key]->audio_path = $this->get_audio_path($value->upload_path,$this->config->item('posts_audio_path').$value->sub_category_id.'/',$value->sub_category_id);
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

	function get_audio_path($file_name,$path,$id){
		
		$file_path = $path.$file_name;
		
		$file = "";

		if($file_name!=""){
			if(file_exists(UPLOADPATH.$this->config->item('posts_audio_exists').$id.'/'.$file_name)){
				$file = $file_path;

			}else{
				$file = $this->config->item('no_image_path')."medicalDirectors.jpg";
			}	
		}else{
			$file = $this->config->item('no_image_path')."medicalDirectors.jpg";
		}
		
		return $file;
	}
}
