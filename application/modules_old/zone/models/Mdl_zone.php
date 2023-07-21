<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_zone extends MY_Model {

	public $p_key = 'zone_id';
	public $table = 'zone';

	function __construct() {
		parent::__construct($this->table);
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

    	$q = $this->db->select('
    		zone.zone_id, zone.zone_name
    	')
		->from('zone');
				
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				zone_name like '%". $s_key ."%'
			) ";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("is_deleted","0");
		$q->order_by('update_dt desc, zone_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		
		$collection = $q->get()->result();
		return $collection;
	}	

	function save(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('zone_name','Zone Name','trim|required|valid_name|unique_key[zone.zone_name]|max_length[150]|xss_clean');
		
		if(!$this->form_validation->run()){
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');
	        
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();
			$data['zone_name'] = $this->input->post('zone_name');

			$zone_id = $this->_insert($data);
			$response['status'] = ((int) ($zone_id)) ? TRUE : FALSE;
		}
		return $response;
	}
	
	function modify(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');

		$is_Available = $this->check_for_posted_record($this->p_key, $this->table);
		if(! $is_Available['status']){ return $is_Available; }
		
		$zone_name = trim($this->input->post('zone_name'));

		if( strtolower($zone_name) != strtolower($is_Available['data'][0]->zone_name) ){
			$this->form_validation->set_rules('zone_name','Zone Name','trim|required|valid_name|unique_key[zone.zone_name]|max_length[150]|xss_clean');
		}
		else{
			$this->form_validation->set_rules('zone_name','Zone Name','trim|required|valid_name|max_length[150]|xss_clean');
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
			$data['zone_name'] = $this->input->post('zone_name');

			$p_key = $this->p_key;
			$zone_id = (int) $this->input->post('zone_id');

			$status = (int) $this->_update([$p_key => $zone_id], $data);
			$response['status'] = ($status) ? TRUE : FALSE;
		}
		return $response;
	}

	function remove(){
		
		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			
			$ids1 = implode(",", $ids);
			$where_condition = array("zone_id IN ({$ids1})" => NULL ,"is_deleted" => "0");
			$region_records = $this->get_records($where_condition, 'region', 'GROUP_CONCAT(zone_id) zone_id');
			
			$zone_ids = explode(",", $region_records[0]->zone_id);
			$zone_ids = array_diff($ids, $zone_ids);
			
			$data['is_deleted'] = 1;

			if(!empty($zone_ids)){
				$response = $this->_update_with($this->p_key, $zone_ids, array(), $data, $this->table);

				$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "{$affected_rows} Record(s) Successfully deleted" : 'Error while deleting record(s)';
			}else{
				$msg = "Zone(s) can not be deleted!!";
			}
			
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}

	function _format_data_to_export($data){
		
		$resultant_array = [];
		
		foreach ($data as $rows) {
			$records['Zone Name'] = $rows->zone_name;
			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}
}