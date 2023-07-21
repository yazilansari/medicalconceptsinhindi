<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_category extends MY_Model {

	public $p_key = 'category_id';
	public $table = 'category';

	function __construct() {
		parent::__construct($this->table);
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

    	$q = $this->db->select('
    		category.category_id, category.category_name,mc.main_category_name,mc.main_category_id
    	')
		->from('category')
		->join('main_category_mapping mcm','mcm.category_id = category.category_id')
		->join('main_category mc','mc.main_category_id = mcm.main_category_id');
				
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

		$q->where("category.is_active","1");
		$q->order_by('category.category_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection1 = $q->get(); //echo $this->db->last_query();exit;
		$collection = $collection1->result();

		
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
		/*Load the form validation Library*/
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('category_name','Category Name','trim|required|valid_name|max_length[150]|xss_clean');
		$this->form_validation->set_rules('main_category_id', 'Main Category','trim|required|xss_clean');

		$category_name = trim($this->input->post('category_name'));

		$valid_category = 1;
		if($_POST['main_category_id']!='' && $_POST['category_name']!=''){

			$check_data = $this->get_collection(['category.category_name' => $_POST['category_name']]);			
			if(!empty($check_data) && $check_data[0]->category_name==$_POST['category_name'] && $check_data[0]->main_category_id==$_POST['main_category_id']){
				$valid_category=0;
			}
		}

		if(!$this->form_validation->run() || $valid_category!=1){
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');
	        
	        if($valid_category!=1){
	        	$errors['category_name'] = '<label class="error">Category already present</label>';
	        }

	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();
			
			$data['category_name'] = $category_name ;
			$category_id = $this->_insert($data);

			$map_data = array();
			$map_data['main_category_id'] =  !empty($this->input->post('main_category_id'))?$this->input->post('main_category_id'):NULL;
			$map_data['category_id'] =  $category_id;
			$mapping_category_id = $this->_insert($map_data,'main_category_mapping');			
			
			$response['status'] = ((int) ($category_id)) ? TRUE : FALSE;
		}
		return $response;
		
	}
	
	function modify(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');
		
		$is_Available = $this->check_for_posted_record($this->p_key, $this->table);
		if(! $is_Available['status']){ return $is_Available; }
		
			$category_name = $this->input->post('category_name');

		$this->form_validation->set_rules('category_name','Category Name','trim|required|valid_name|max_length[150]|xss_clean');

		$valid_category = 1;
		if($_POST['main_category_id_1']!='' && $_POST['category_name']!=''){

			$check_data = $this->get_collection(['category.category_name' => $_POST['category_name']]);			
			if(!empty($check_data) && $check_data[0]->category_name==$_POST['category_name'] && $check_data[0]->main_category_id==$_POST['main_category_id_1']){
				$valid_category=1;
			}
		}


		if(! $this->form_validation->run() || $valid_category!=1){

				$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');

	        if($valid_category!=1){
	        	$errors['category_name'] = '<label class="error">Category already present</label>';
	        }

	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}		
		else{
			$data = array();
			$data['category_name'] = $this->input->post('category_name');
			$p_key = $this->p_key;
			$category_id = (int) $this->input->post('category_id');

			$status = (int) $this->_update([$p_key => $category_id], $data);
			$response['status'] = ($status) ? TRUE : FALSE;
		}
		return $response;
	}

	

	function remove(){
		
		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			
			$ids1 = implode(",", $ids);

			$where_condition = array("category_id IN ({$ids1})" => NULL ,"is_active" => "1");
			$category_records = $this->get_records($where_condition, 'sub_category', ['GROUP_CONCAT(category_id) category_id']);
			
			$category_ids = explode(",", $category_records[0]->category_id);
			$category_ids = array_diff($ids, $category_ids);

			if(!empty($category_ids)){

				$data['is_active'] = "0";
				$response = $this->_update_with($this->p_key,$category_ids, array(), $data, $this->table);

				$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "{$affected_rows} Record(s) Successfully deleted" : 'Error while deleting record(s)';
			}else{
				$msg = "Category(s) can not be deleted!!";
			}
			
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}


	function _format_data_to_export($data){
		
		$resultant_array = [];
		
		foreach ($data as $rows) {
			$records['Category Name'] = $rows->category_name;
			

			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}
}