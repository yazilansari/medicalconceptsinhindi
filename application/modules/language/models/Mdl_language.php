<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_language extends MY_Model {

	public $p_key = 'language_id';
	public $table = 'language';

	function __construct() {
		parent::__construct($this->table);
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

    	$q = $this->db->select('
    		language.language_id, language.language_name,language.language_code
    	')
		->from('language');
				
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				language_name like '". $s_key ."%'
			) ";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->order_by('update_dt desc, language_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection = $q->get()->result();
		return $collection;
	}	

	function save(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('language_name','Language Name','trim|required|valid_name|unique_key[language.language_name]|max_length[150]|xss_clean');
		$this->form_validation->set_rules('language_code','Language Code','trim|required|valid_name|unique_key[language.language_code]|max_length[10]|alpha_numeric|xss_clean');
		
		if(!$this->form_validation->run()){
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');
	        
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();
			$data['language_name'] = $this->input->post('language_name');
			$data['language_code'] = $this->input->post('language_code');

			$language_id = $this->_insert($data);
			$response['status'] = ((int) ($language_id)) ? TRUE : FALSE;
		}
		return $response;
	}
	
	function modify(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');

		$is_Available = $this->check_for_posted_record($this->p_key, $this->table);
		if(! $is_Available['status']){ return $is_Available; }
		
		$language_name = trim($this->input->post('language_name'));

		if( strtolower($language_name) != strtolower($is_Available['data'][0]->language_name) ){
			$this->form_validation->set_rules('language_name','Language Name','trim|required|valid_name|unique_key[language.language_name]|max_length[50]|xss_clean');
		}
		else{
			$this->form_validation->set_rules('language_name','Language Name','trim|required|valid_name|max_length[50]|xss_clean');
		}

		$language_code = trim($this->input->post('language_code'));

		if( strtolower($language_code) != strtolower($is_Available['data'][0]->language_code) ){
			$this->form_validation->set_rules('language_code','Language Code','trim|required|unique_key[language.language_code]|max_length[10]|alpha_numeric|xss_clean');
		}
		else{
			$this->form_validation->set_rules('language_code','Language Code','trim|required|max_length[10]|alpha_numeric|xss_clean');
		}

		if(! $this->form_validation->run() ){
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');

	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}		
		else{
			$data = array();
			$data['language_name'] = $this->input->post('language_name');
			$data['language_code'] = $this->input->post('language_code');

			$p_key = $this->p_key;
			$language_id = (int) $this->input->post('language_id');

			$status = (int) $this->_update([$p_key => $language_id], $data);
			$response['status'] = ($status) ? TRUE : FALSE;
		}
		return $response;
	}

	function remove(){
		
		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			$response = $this->_delete($this->p_key, $ids, $this->table);

			$msg = ($response) ? "Record(s) Successfully deleted" : 'Error while deleting record(s)';
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}

	function _format_data_to_export($data){
		
		$resultant_array = [];
		
		foreach ($data as $rows) {
			$records['Language Name'] = $rows->language_name;
			$records['Language Code'] = $rows->language_code;
			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}
}