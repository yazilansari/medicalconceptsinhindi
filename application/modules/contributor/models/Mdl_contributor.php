<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_contributor extends MY_Model {


	public $p_key = '';
	public $table = '';
	
	public $session_key;

	function __construct() {
		parent::__construct($this->table);
		//$this->session_key = config_item('session_data_key');
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {
		
		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('c.*, count(ud.upload_data_id) as total_post')
		->from('contributors c')
		->join('upload_data ud','ud.contributors_id = c.contributors_id AND ud.is_active="1"','LEFT');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
		$s_key = $this->db->escape_like_str($keywords);


			$where_condition = "(
				c.contributors_name like '%". $s_key ."%'
				
			)";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("c.is_active","1");
		$q->group_by('c.contributors_id');
		$q->order_by('c.sort_order asc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();

		foreach ($collection as $key => $value) {
			
			$collection[$key]->contributors_path = $this->get_contributors_image_path($value->contributors_image,$this->config->item('contributors_images_path'));
		}

		return $collection;
	}
		

	function get_contributors_image_path($image_name,$path){
		
		$image_path = $path.$image_name;
		
		$image = "";

		if($image_name!=""){
			if(file_exists(UPLOADPATH.$this->config->item('contributors_image_exists').$image_name)){
			$image = $image_path;

			}else{
				$image = $this->config->item('no_image_path')."user.png";
			}	
		}else{
			$image = $this->config->item('no_image_path')."user.png";
		}
		
		return $image;
	}
}
