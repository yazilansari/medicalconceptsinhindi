<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_comments extends MY_Model {

	public $p_key = 'comments_id';
	public $table = 'comments';

	public $p_key_new = 'id';
	public $table_new = 'mch_comments';

	function __construct() {
		parent::__construct($this->table);
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ,$key_filters = []) {

    	$q = $this->db->select('c.*,ud.upload_title,ud.upload_data_id,sc.sub_category_id,
    		sc.sub_category_name,c1.category_id,c1.category_name')
		->from('comments c')
		->join('upload_data ud','c.upload_data_id = ud.upload_data_id')
		->join('sub_category sc','ud.sub_category_id = sc.sub_category_id')
		->join('category c1','sc.category_id = c1.category_id');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($key_filters)){			
			$q->where($key_filters);
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				c.users_name like '%". $s_key ."%'
				OR c.users_email like '%". $s_key ."%'
				OR c1.category_name like '%". $s_key ."%'
				OR sc.sub_category_name like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("c.is_active","1");
		$q->where("ud.is_active","1");
		$q->where("c1.is_active","1");
		$q->where("sc.is_active","1");
		$q->order_by('c.comments_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection = $q->get()->result();

		return $collection;
	}

	function get_collections_new($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ,$key_filters = []) {

    	$q = $this->db->select('c.*, sc.id AS sub_category_id, sc.name AS sub_category_name, ca.id AS category_id, ca.name AS category_name')
		->from('mch_comments c')
		->join('mch_sub_categories sc','c.sub_category_id = sc.id')
		->join('mch_categories ca','sc.category_id = ca.id');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($key_filters)){			
			$q->where($key_filters);
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				c.users_name like '%". $s_key ."%'
				OR c.users_email like '%". $s_key ."%'
				OR ca.name like '%". $s_key ."%'
				OR sc.name like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("c.is_active","1");
		$q->where("ca.is_active","1");
		$q->where("sc.is_active","1");
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

				$response = $this->_update_with($this->p_key_new,$ids, array(), $data, $this->table_new);

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
			$records['Posts Title'] = $rows->upload_title;
			$records['Sub Category'] = $rows->sub_category_name;
			$records['Category'] = $rows->category_name;
			$records['User Name'] = $rows->users_name;
			$records['User Email'] = $rows->users_email;
			$records['Comment'] = $rows->comment;
			$records['Comment DateTime'] = date('jS M,Y H:i:s',strtotime($rows->comments_dt));

			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}

	function _format_data_to_export_new($data){
		
		$resultant_array = [];
		
		foreach ($data as $rows) {
			// $records['Posts Title'] = $rows->upload_title;
			$records['Sub Category'] = $rows->sub_category_name;
			$records['Category'] = $rows->category_name;
			$records['User Name'] = $rows->users_name;
			$records['User Email'] = $rows->users_email;
			$records['Comment'] = $rows->comment;
			$records['Comment DateTime'] = date('jS M,Y H:i:s',strtotime($rows->created_at));

			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}

	function comments_action(){

		if(isset($_POST['id']) && isset($_POST['type'])){

			$data_arr = array();
			$text = '';

			if($_POST['type']=='1'){
				$data_arr['is_approved'] = '0';
				$text = 'Comment has been disapproved successfully!!';
			}else if($_POST['type']=='0'){
				$data_arr['is_approved'] = '1';
				$text = 'Comment has been approved successfully!!';
			}

			$response = $this->_update_with($this->p_key,[], array('comments_id' => $_POST['id']), $data_arr, $this->table);

			$affected_rows = $this->db->affected_rows();
			$msg = ($response) ?  $text : '';

			return ['msg'=> $msg];
		}
	}

	function comments_action_new(){

		if(isset($_POST['id']) && isset($_POST['type'])){

			$data_arr = array();
			$text = '';

			if($_POST['type']=='1'){
				$data_arr['is_approved'] = '0';
				$text = 'Comment has been disapproved successfully!!';
			}else if($_POST['type']=='0'){
				$data_arr['is_approved'] = '1';
				$text = 'Comment has been approved successfully!!';
			}

			$response = $this->_update_with($this->p_key_new,[], array('id' => $_POST['id']), $data_arr, $this->table_new);

			$affected_rows = $this->db->affected_rows();
			$msg = ($response) ?  $text : '';

			return ['msg'=> $msg];
		}
	}
}