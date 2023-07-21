<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_main_category extends MY_Model {

	public $p_key = 'main_category_id';
	public $table = 'main_category';

	function __construct() {
		parent::__construct($this->table);
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

    	$q = $this->db->select('
    		main_category.main_category_id, main_category.main_category_name
    	')
		->from('main_category');
				
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				main_category.main_category_name like '%". $s_key ."%'
			) ";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("main_category.is_active","1");
		$q->order_by('main_category.main_category_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection1 = $q->get(); //echo $this->db->last_query();exit;
		$collection = $collection1->result();

		
		return $collection;
	}	

	function is_a_unique_main_category( $main_category_name = '' ){
		if(empty($main_category_name)){
			return TRUE;
		}
		if(!empty($main_category_name)){
			$filters = [
				'main_category_name'=> $main_category_name
			];

			$r_records = $this->get_collection($filters);

			return (count($r_records)) ? FALSE : TRUE;
		}
		return FALSE;
	}

	function save(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('main_category_name','main_category Name','trim|required|valid_name|max_length[150]|xss_clean');

		$main_category_name = trim($this->input->post('main_category_name'));

		$valid_main_category = $this->is_a_unique_main_category($main_category_name);

		if(!$this->form_validation->run() || !$valid_main_category){
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');
	        
	        if(! $valid_main_category){
	        	$errors['main_category_name'] = '<label class="error">main_category already present</label>';
	        }

	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();
			$data['main_category_name'] = $main_category_name ;
			$main_category_id = $this->_insert($data);
			
			$response['status'] = ((int) ($main_category_id)) ? TRUE : FALSE;
		}
		return $response;
		
	}
	
	function modify(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');

		$is_Available = $this->check_for_posted_record($this->p_key, $this->table);
		if(! $is_Available['status']){ return $is_Available; }
		
			$main_category_name = $this->input->post('main_category_name');

		if( strtolower($main_category_name) != strtolower($is_Available['data'][0]->main_category_name) ){
			$this->form_validation->set_rules('main_category_name','main_category Name','trim|required|valid_name|unique_key[main_category.main_category_name]|max_length[150]|xss_clean');
		}
		else{
			$this->form_validation->set_rules('main_category_name','main_category Name','trim|required|valid_name|max_length[150]|xss_clean');
		}


		if(! $this->form_validation->run()){

				$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');

	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}		
		else{
			$data = array();
			$data['main_category_name'] = $this->input->post('main_category_name');
			$p_key = $this->p_key;
			$main_category_id = (int) $this->input->post('main_category_id');

			$status = (int) $this->_update([$p_key => $main_category_id], $data);
			$response['status'] = ($status) ? TRUE : FALSE;
		}
		return $response;
	}

	

	function remove(){
		
		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			
			$ids1 = implode(",", $ids);

			$where_condition = array("main_category_id IN ({$ids1})" => NULL ,"is_active" => "1");
			$main_category_records = $this->get_records($where_condition, 'category', ['GROUP_CONCAT(main_category_id) main_category_id']);
			
			$main_category_ids = explode(",", $main_category_records[0]->main_category_id);
			$main_category_ids = array_diff($ids, $main_category_ids);

			if(!empty($main_category_ids)){

				$data['is_active'] = "0";
				$response = $this->_update_with($this->p_key,$main_category_ids, array(), $data, $this->table);

				$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "{$affected_rows} Record(s) Successfully deleted" : 'Error while deleting record(s)';
			}else{
				$msg = "main_category(s) can not be deleted!!";
			}
			
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}


	function _format_data_to_export($data){
		
		$resultant_array = [];
		
		foreach ($data as $rows) {
			$records['main_category Name'] = $rows->main_category_name;
			

			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}
}