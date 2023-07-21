<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_post extends MY_Model {


	public $p_key = '';
	public $table = '';
	
	public $session_key;

	function __construct() {
		parent::__construct($this->table);
		//$this->session_key = config_item('session_data_key');
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {
		
		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('ud.upload_data_id,ud.upload_title,ud.contributors_id,ud.upload_type,ud.upload_for_user_type,ud.short_description,ud.upload_description,ud.thumbnail,ud.category_id,cat.category_name,ud.sub_category_id,sc.sub_category_name,ud.upload_path,ud.tags,ud.added_date_time,ud.sort_order,md.*,COUNT(c1.comments_id) comments_count,c.contributors_id,c.contributors_name,c.contributors_designation,
			c.contributors_data,c.contributors_image,ud.video_type,ud.youtube_video_id')
		->from('upload_data ud')
		->join('category cat', 'cat.category_id = ud.category_id and cat.is_active = 1')
		->join('sub_category sc', 'sc.sub_category_id = ud.sub_category_id and sc.is_active = 1')
      	->join('meta_tag_details md', 'md.meta_upload_data_id = ud.upload_data_id and md.is_active = 1','left')
      	->join('comments c1','c1.upload_data_id = ud.upload_data_id AND c1.is_approved="1"','LEFT')
      	->join('contributors c','c.contributors_id = ud.contributors_id','LEFT');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
		$s_key = $this->db->escape_like_str($keywords);


			$where_condition = "(
				ud.upload_title like '%". $s_key ."%'
				or ud.short_description like '%". $s_key ."%'
				OR ud.upload_description like '%". $s_key ."%'
				OR c.contributors_name like '%". $s_key ."%'
				OR ud.tags like '%". $s_key ."%'
				OR ud.upload_type like '%". $s_key ."%'
				OR ud.upload_for_user_type like '%". $s_key ."%'
				OR cat.category_name like '%". $s_key ."%'
				OR sc.sub_category_name like '%". $s_key ."%'
				
			)";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("ud.is_active","1");
		$q->group_by('ud.upload_data_id');
		$q->order_by('ud.upload_data_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();

		foreach ($collection as $key => $value) {
			
			$collection[$key]->thumbnail_path = $this->get_thumbnail_image_path($value->thumbnail,$this->config->item('posts_thumbnail_path').$value->sub_category_id.'/',$value->sub_category_id);
			$collection[$key]->file_path = $this->get_file_path($value->upload_path,$value->upload_type,$value->sub_category_id);
			$collection[$key]->contributors_image_path = $this->get_contributors_image_path($value->contributors_image,$this->config->item('contributors_images_path'));
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

	function get_file_path($file_name,$type,$id){
		
		$file_path = '';

		if($type=='video'){
			$file_path = $this->config->item('posts_video_path').$id.'/'.$file_name;
		}
		if($type=='audio'){
			$file_path = $this->config->item('posts_audio_path').$id.'/'.$file_name.'.mp3';
		}
		if($type=='pdf'){
			$file_path = $this->config->item('posts_pdf_path').$id.'/'.$file_name;
		}
		if($type=='image'){
			$file_path = $this->config->item('posts_images_path').$id.'/'.$file_name;
		}
		
		$file = "";

		if($file_name!=""){

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

	function get_post_comments($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {
		
		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('c.*')
		->from('comments c')
		->join('upload_data ud','c.upload_data_id = ud.upload_data_id');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
		$s_key = $this->db->escape_like_str($keywords);


			$where_condition = "(
				ud.upload_title like '%". $s_key ."%'
				
			)";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where('c.is_active','1');
		$q->where('c.is_approved','1');
		$q->where("ud.is_active","1");
		$q->order_by('c.comments_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();

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
	
	function save_comments(){

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('users_name','Users Name','trim|required|valid_name|max_length[150]|xss_clean');
		$this->form_validation->set_rules('email','Email ID','trim|required|valid_email|max_length[150]|xss_clean');
		$this->form_validation->set_rules('comment','Comment','trim|required|xss_clean');
		$errors = array();	
		if(!$this->form_validation->run()){
			        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error" style="color:red;font-weight:normal;">', '</label>');
	        
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();
			$data['users_name'] = trim($this->input->post('users_name')) ;
			$data['users_email'] = trim($this->input->post('email')) ;
			$data['comment'] = trim($this->input->post('comment')) ;
			$data['upload_data_id'] = trim($this->input->post('upload_data_id')) ;
			$data['comments_dt'] = date('Y-m-d H:i:s') ;
			$comments_id = $this->_insert($data, 'comments');
			
			$response['status'] = ((int) ($comments_id)) ? TRUE : FALSE;
		}
		return $response;
	}

	function get_seen_count($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('COUNT(us.users_data_seen_id) as seen_count')
		->from('users_data_seen us')
		->join('upload_data ud','us.upload_data_id = ud.upload_data_id');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
		$s_key = $this->db->escape_like_str($keywords);


			$where_condition = "(
				ud.upload_title like '%". $s_key ."%'
				
			)";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("ud.is_active","1");
		$q->group_by('us.upload_data_id');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();

		return $collection;
	}

}
