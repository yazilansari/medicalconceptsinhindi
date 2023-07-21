<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_folder extends MY_Model {

	public $p_key = 'folder_id';
	public $table = 'folder';

	function __construct() {
		parent::__construct($this->table);
	}



	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {
		
		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

    	$q = $this->db->select('f.folder_name,f.folder_id,f.folder_description,f.sort_order,mc.main_category_id,mc.main_category_name,c.category_id,c.category_name')
		->from('folder f')
		->join('category c', 'c.category_id = f.category_id and f.is_active = 1')
		->join('main_category_mapping mcm','c.category_id = mcm.category_id')
		->join('main_category mc','mcm.main_category_id = mc.main_category_id');
		

		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				f.folder_name like '%". $s_key ."%'
				OR c.category_name like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("f.is_active","1");
		//$q->group_by('f.category_id');
		$q->order_by('f.folder_id desc');
		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection = $q->get()->result();
//var_dump($collection);exit;
		return $collection;
	}
	
	function get_search_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {
	

    	$q = $this->db->select('f.folder_name,f.folder_id,f.sort_order,mc.main_category_id,mc.main_category_name,c.category_id,c.category_name')
		->from('folder f')
		->join('category c', 'c.category_id = f.category_id and f.is_active = 1')
		->join('main_category_mapping mcm','c.category_id = mcm.category_id')
		->join('main_category mc','mcm.main_category_id = mc.main_category_id');
		

		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				f.folder_name like '%". $s_key ."%'
				OR c.category_name like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("f.is_active","1");
		//$q->group_by('f.category_id');
		$q->order_by('f.folder_id desc');
		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection = $q->get()->result();
//var_dump($collection);exit;
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

		$data = array();
		$data['category_id'] = $category_id =  !empty($this->input->post('category_id'))?$this->input->post('category_id'):NULL;

		$data['folder_name'] = !empty($this->input->post('folder_name'))?$this->input->post('folder_name'):NULL;

		$data['folder_description'] = !empty($this->input->post('folder_description'))?$this->input->post('folder_description'):NULL;

		$folder_id = $this->_insert($data);

		$response['status'] = ((int) ($folder_id)) ? TRUE : FALSE;
		
		return $response;

	}


	function modify(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');
		$is_Available = $this->check_for_posted_record($this->p_key, $this->table);
		/*if(! $is_Available['status']){ return $is_Available; }*/
		
			$folder_name = $this->input->post('folder_name');

		$this->form_validation->set_rules('folder_name','Folder Name','trim|required|valid_name|max_length[250]|xss_clean');

		$valid_category = 1;
		if($_POST['category_id']!='' && $_POST['folder_name']!=''){

			$check_data = $this->get_collection(['f.folder_name' => $_POST['folder_name']]);			
			if(!empty($check_data) && $check_data[0]->folder_name==$_POST['folder_name'] && $check_data[0]->category_id==$_POST['category_id']){
				$valid_category=1;
			}
		}


		if(! $this->form_validation->run() || $valid_category!=1){

				$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');

	        if($valid_category!=1){
	        	$errors['category_name'] = '<label class="error">Folder already present</label>';
	        }

	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}		
		else{
			$data = array();
			$data['folder_name'] = $this->input->post('folder_name');
			$data['category_id'] = $this->input->post('category_id');
			$data['folder_description'] = $this->input->post('folder_description');
			$p_key = $this->p_key;
			$folder_id = (int) $this->input->post('folder_id');
		//var_dump($folder_id);exit;

			$status = (int) $this->_update([$p_key => $folder_id], $data);
			$response['status'] = ($status) ? TRUE : FALSE;
		}
		return $response;
	}

	

	function remove(){
		
		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			
			$ids1 = implode(",", $ids);

			$where_condition = array("folder_id IN ({$ids1})" => NULL ,"is_active" => "1");
			$folder_records = $this->get_records($where_condition, 'sub_category', ['GROUP_CONCAT(folder_id) folder_id']);
			
			$folder_ids = explode(",", $folder_records[0]->folder_id);
			$folder_ids = array_diff($ids, $folder_ids);

			if(!empty($folder_ids)){

				$data['is_active'] = "0";
				$response = $this->_update_with($this->p_key,$folder_ids, array(), $data, $this->table);

				$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "{$affected_rows} Record(s) Successfully deleted" : 'Error while deleting record(s)';
			}else{
				$msg = "Folder(s) can not be deleted!!";
			}
			
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}
}