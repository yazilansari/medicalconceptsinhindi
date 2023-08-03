<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_contributors extends MY_Model {

	public $p_key = 'contributors_id';
	public $table = 'contributors';

	public $p_key_new = 'id';
	public $table_new = 'mch_contributors';

	function __construct() {
		parent::__construct($this->table);
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

    	$q = $this->db->select('*')
					  ->from('contributors c');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where($key, $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				c.contributors_name like '%". $s_key ."%'
				OR c.contributors_designation like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("c.is_active",1);
		$q->order_by('c.contributors_id');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection = $q->get()->result();
		return $collection;
	}

	function get_collections_new($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

    	$q = $this->db->select('*')
					  ->from('mch_contributors c');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where($key, $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				c.name like '%". $s_key ."%'
				OR c.designation like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("c.is_active",1);
		$q->order_by('c.id', 'DESC');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection = $q->get()->result();
		return $collection;
	}
	
	function is_a_unique_category( $category_name = '' ){
		if(empty($category_name)){
			return TRUE;
		}
		if(!empty($category_name)){
			$filters = [
				'category_name'=> $category_name
			];

			$r_records = $this->get_collection($filters);

			return (count($r_records)) ? FALSE : TRUE;
		}
		return FALSE;
	}

	

	function save(){

		ini_set("upload_max_filesize","300M");
		ini_set("post_max_size","300M");

		/*Load the form validation Library*/
		$this->load->library('form_validation');
	
		
		$this->form_validation->set_rules('contributors_name', 'Contributors Name','trim|required|xss_clean|max_length[250]|unique_key[contributors.contributors_name]|valid_name');
		$this->form_validation->set_rules('contributors_designation','Contributors Designation','trim|required|max_length[250]|xss_clean');
		$this->form_validation->set_rules('contributors_data','Contributors Data','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_title','Contributors Meta Title','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_description','Contributors Meta Description','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_slug','Contributors Meta Slug','trim|required|xss_clean');
		$this->form_validation->set_rules('sort_order','Sort Sequence Order','trim|required|xss_clean');
		

		if(!isset($_FILES['contributors_image']) || $_FILES['contributors_image']['name']==''){
			$errors['contributors_image'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Contributors Image field is required.' . '</label>';		
		}


		/*	if (empty($_FILES['contributors_image']['name']))
		{
			$this->form_validation->set_rules('contributors_image', 'Document', 'required');
		}*/

		
		if(!$this->form_validation->run()){
			
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
				$errors[$key] = form_error($key, '<label class="error">', '</label>');
			
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();
			$data['contributors_name'] = $contributors_name =  !empty($this->input->post('contributors_name'))?$this->input->post('contributors_name'):NULL;

			$data['contributors_designation'] = !empty($this->input->post('contributors_designation'))?$this->input->post('contributors_designation'):NULL;

			$data['contributors_data'] = !empty($this->input->post('contributors_data'))?$this->input->post('contributors_data'):NULL;
			$data['meta_title'] = !empty($this->input->post('meta_title'))?$this->input->post('meta_title'):'';
			$data['meta_description'] = !empty($this->input->post('meta_description'))?$this->input->post('meta_description'):'';
			$data['meta_keyword'] = !empty($this->input->post('meta_keyword'))?$this->input->post('meta_keyword'):'';
			$data['meta_post_url'] = !empty($this->input->post('meta_post_url'))?$this->input->post('meta_post_url'):'';
			$data['meta_slug'] = !empty($this->input->post('meta_slug'))?$this->input->post('meta_slug'):'';
			$data['sort_order'] = !empty($this->input->post('sort_order'))?$this->input->post('sort_order'):'';

			
			$contributors_id = $this->_insert($data);


			if($contributors_id !=""){
				$new_image_name = "Image_".time()."-".$contributors_id;
				
				$image_upload = $this->file_upload($this->config->item("contributors_images_upload_path"), 'contributors_image',$new_image_name);
				
				
				if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$update_image = $this->_update(['contributors_id' => $contributors_id],
						['contributors_image' => $image_name], 'contributors');
				
				}
			}

			$response['status'] = ((int) ($contributors_id)) ? TRUE : FALSE;
		}
		return $response;
	}

	function save_new(){

		ini_set("upload_max_filesize","300M");
		ini_set("post_max_size","300M");

		/*Load the form validation Library*/
		$this->load->library('form_validation');
	
		
		$this->form_validation->set_rules('contributors_name', 'Contributors Name','trim|required|xss_clean|max_length[250]|unique_key[mch_contributors.name]|valid_name');
		$this->form_validation->set_rules('contributors_designation','Contributors Designation','trim|required|max_length[250]|xss_clean');
		$this->form_validation->set_rules('contributors_data','Contributors Data','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_title','Contributors Meta Title','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_description','Contributors Meta Description','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_slug','Contributors Meta Slug','trim|required|xss_clean');
		$this->form_validation->set_rules('sort_order','Sort Sequence Order','trim|required|xss_clean');
		

		if(!isset($_FILES['contributors_image']) || $_FILES['contributors_image']['name']==''){
			$errors['contributors_image'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Contributors Image field is required.' . '</label>';		
		}


		/*	if (empty($_FILES['contributors_image']['name']))
		{
			$this->form_validation->set_rules('contributors_image', 'Document', 'required');
		}*/

		
		if(!$this->form_validation->run()){
			
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
				$errors[$key] = form_error($key, '<label class="error">', '</label>');
			
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();
			$data['name'] = $contributors_name =  !empty($this->input->post('contributors_name'))?$this->input->post('contributors_name'):NULL;

			$data['designation'] = !empty($this->input->post('contributors_designation'))?$this->input->post('contributors_designation'):NULL;

			$data['data'] = !empty($this->input->post('contributors_data'))?$this->input->post('contributors_data'):NULL;
			$data['meta_title'] = !empty($this->input->post('meta_title'))?$this->input->post('meta_title'):'';
			$data['meta_description'] = !empty($this->input->post('meta_description'))?$this->input->post('meta_description'):'';
			$data['meta_keyword'] = !empty($this->input->post('meta_keyword'))?$this->input->post('meta_keyword'):'';
			$data['meta_post_url'] = !empty($this->input->post('meta_post_url'))?$this->input->post('meta_post_url'):'';
			$data['meta_slug'] = !empty($this->input->post('meta_slug'))?$this->input->post('meta_slug'):'';
			$data['sort_order'] = !empty($this->input->post('sort_order'))?$this->input->post('sort_order'):'';

			$data['created_at'] = date('Y-m-d H:i:s');

			
			$contributors_id = $this->_insert($data, $this->table_new);


			if($contributors_id !=""){
				$new_image_name = "Image_".time()."-".$contributors_id;
				
				$image_upload = $this->file_upload($this->config->item("contributors_images_upload_path"), 'contributors_image',$new_image_name);
				
				
				if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$update_image = $this->_update(['id' => $contributors_id],
						['image' => $image_name], 'mch_contributors');
				
				}
			}

			$response['status'] = ((int) ($contributors_id)) ? TRUE : FALSE;
			$response['redirect'] = 'lists_new';
		}
		return $response;
	}

	function modify(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');

		$is_Available = $this->check_for_posted_record($this->p_key, $this->table);
		if(! $is_Available['status']){ return $is_Available; }
		
		
		$contributors_name = $this->input->post('contributors_name');

		if( strtolower($contributors_name) != strtolower($is_Available['data'][0]->contributors_name) ){
			$this->form_validation->set_rules('contributors_name','Contributor Name','trim|required|valid_name|unique_key[contributors.contributors_name]|max_length[250]|xss_clean');
		}
		else{
			$this->form_validation->set_rules('contributors_name','Contributor Name','trim|required|valid_name|max_length[250]|xss_clean');
		}


		$this->form_validation->set_rules('contributors_designation','Contributors Designation','trim|required|max_length[250]|xss_clean');
		$this->form_validation->set_rules('contributors_data','Contributors Data','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_title','Contributors Meta Title','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_description','Contributors Meta Description','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_slug','Contributors Meta Slug','trim|required|xss_clean');	
		$this->form_validation->set_rules('sort_order','Sort Sequence Order','trim|required|xss_clean');	

	
		if(! $this->form_validation->run()){
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');
			
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}		
		else{
			$data = array();

			$data['contributors_name'] = !empty($this->input->post('contributors_name'))?$this->input->post('contributors_name'):NULL;

			$data['contributors_designation'] = !empty($this->input->post('contributors_designation'))?$this->input->post('contributors_designation'):NULL;

			$data['contributors_data'] = !empty($this->input->post('contributors_data'))?$this->input->post('contributors_data'):NULL;
			$data['meta_title'] = !empty($this->input->post('meta_title'))?$this->input->post('meta_title'):'';
			$data['meta_description'] = !empty($this->input->post('meta_description'))?$this->input->post('meta_description'):'';
			$data['meta_keyword'] = !empty($this->input->post('meta_keyword'))?$this->input->post('meta_keyword'):'';
			$data['meta_post_url'] = !empty($this->input->post('meta_post_url'))?$this->input->post('meta_post_url'):'';
			$data['meta_slug'] = !empty($this->input->post('meta_slug'))?$this->input->post('meta_slug'):'';
			$data['sort_order'] = !empty($this->input->post('sort_order'))?$this->input->post('sort_order'):'';


			if(!empty($_FILES['contributors_image'])){

				$new_image_name = "Image_".time()."-".$this->input->post('contributors_id');
				$image_upload = $this->file_upload($this->config->item("contributors_images_upload_path"), 'contributors_image',$new_image_name);

				

				if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$data['contributors_image'] = $image_name;
				}
			}

			$p_key = $this->p_key;
			$contributors_id = (int) $this->input->post('contributors_id');

			$status = (int) $this->_update([$p_key => $contributors_id], $data);
			$response['status'] = ($status) ? TRUE : FALSE;
			$response['redirect'] = 'lists_new';
		}
		return $response;
	}

	function modify_new(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');

		$is_Available = $this->check_for_posted_record($this->p_key_new, $this->table_new);
		if(! $is_Available['status']){ return $is_Available; }
		
		
		$contributors_name = $this->input->post('contributors_name');

		if( strtolower($contributors_name) != strtolower($is_Available['data'][0]->name) ){
			$this->form_validation->set_rules('contributors_name','Contributor Name','trim|required|valid_name|unique_key[mch_contributors.name]|max_length[250]|xss_clean');
		}
		else{
			$this->form_validation->set_rules('contributors_name','Contributor Name','trim|required|valid_name|max_length[250]|xss_clean');
		}


		$this->form_validation->set_rules('contributors_designation','Contributors Designation','trim|required|max_length[250]|xss_clean');
		$this->form_validation->set_rules('contributors_data','Contributors Data','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_title','Contributors Meta Title','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_description','Contributors Meta Description','trim|required|xss_clean');
		$this->form_validation->set_rules('meta_slug','Contributors Meta Slug','trim|required|xss_clean');	
		$this->form_validation->set_rules('sort_order','Sort Sequence Order','trim|required|xss_clean');	

	
		if(! $this->form_validation->run()){
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');
			
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}		
		else{
			$data = array();

			$data['name'] = !empty($this->input->post('contributors_name'))?$this->input->post('contributors_name'):NULL;

			$data['designation'] = !empty($this->input->post('contributors_designation'))?$this->input->post('contributors_designation'):NULL;

			$data['data'] = !empty($this->input->post('contributors_data'))?$this->input->post('contributors_data'):NULL;
			$data['meta_title'] = !empty($this->input->post('meta_title'))?$this->input->post('meta_title'):'';
			$data['meta_description'] = !empty($this->input->post('meta_description'))?$this->input->post('meta_description'):'';
			$data['meta_keyword'] = !empty($this->input->post('meta_keyword'))?$this->input->post('meta_keyword'):'';
			$data['meta_post_url'] = !empty($this->input->post('meta_post_url'))?$this->input->post('meta_post_url'):'';
			$data['meta_slug'] = !empty($this->input->post('meta_slug'))?$this->input->post('meta_slug'):'';
			$data['sort_order'] = !empty($this->input->post('sort_order'))?$this->input->post('sort_order'):'';


			if(!empty($_FILES['contributors_image'])){

				$new_image_name = "Image_".time()."-".$this->input->post('contributors_id');
				$image_upload = $this->file_upload($this->config->item("contributors_images_upload_path"), 'contributors_image',$new_image_name);

				

				if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$data['image'] = $image_name;
				}
			}

			$p_key_new = $this->p_key_new;
			$contributors_id = (int) $this->input->post('id');

			$status = (int) $this->_update([$p_key_new => $contributors_id], $data, $this->table_new);
			$response['status'] = ($status) ? TRUE : FALSE;
			$response['redirect'] = 'lists_new';
		}
		return $response;
	}	
	

	function remove(){
		
		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			
			$ids1 = implode(",", $ids);
			if(!empty($ids1)){
				$data['is_active'] = 0;

				$response = $this->_update_with($this->p_key,$ids, array(), $data, $this->table);

				$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "{$affected_rows} Record(s) Successfully deleted" : 'Error while deleting record(s)';
			}else{
				$msg = "Contributor(s) can not be deleted!!";
			}
			
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}

	function remove_new(){
		
		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			
			$ids1 = implode(",", $ids);
			if(!empty($ids1)){
				$data['is_active'] = 0;

				$response = $this->_update_with($this->p_key_new, $ids, array(), $data, $this->table_new);

				$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "{$affected_rows} Record(s) Successfully deleted" : 'Error while deleting record(s)';
			}else{
				$msg = "Contributor(s) can not be deleted!!";
			}
			
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}


	function _format_data_to_export($data){
		
		$resultant_array = [];
		
		foreach ($data as $rows) {
			$records['Contributors Name'] = $rows->contributors_name;
			$records['Contributors Designation'] = $rows->contributors_designation;
			$records['Contributors Data'] = $rows->contributors_data;

			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}

	function _format_data_to_export_new($data){
		
		$resultant_array = [];
		
		foreach ($data as $rows) {
			$records['Contributors Name'] = $rows->name;
			$records['Contributors Designation'] = $rows->designation;
			$records['Contributors Data'] = $rows->data;

			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}

	function get_image_path($image_name,$path){
		
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
