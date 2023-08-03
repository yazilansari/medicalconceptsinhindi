<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_reports extends MY_Model {
	
	public $role;

	function __construct() {
		parent::__construct($this->table);
	}

	function _format_data_to_export($data, $report_type){
		$records = [];

		switch ($report_type) {
			
			case 'registered':
				$records = $this->get_users_registered($data);
				break;

			case 'registered_new':
				$records = $this->get_users_registered_new($data);
				break;

			case 'viewed':
				$records = $this->get_users_viewed($data);
				break;

			case 'contact':
				$records = $this->get_users_contact($data);
				break;

			case 'contact_new':
				$records = $this->get_users_contact_new($data);
				break;
			
			default:
				# code...
				break;
		}
			
		return $records;
	}	

	function get_registered_users_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0, $from='', $to='' ,$conditions = []) {

    	$q = $this->db->select('u.*')
    	->from('users u');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				u.users_name like '%". $s_key ."%'
				OR u.number like '%". $s_key ."%'
				OR u.email_id like '%". $s_key ."%'
				OR u.reference like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		if($from!='' && $to!=''){
			$q->where("DATE_FORMAT(u.added_date,'%Y-%m-%d')  BETWEEN '$from' AND '$to'");
		}

		$q->where("u.is_active","1");
		$q->order_by("u.users_id desc");

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();
		

		return $collection;
	}

	function get_registered_users_collection_new($f_filters = [], $keywords ='', $limit = 0, $offset = 0, $from='', $to='' ,$conditions = []) {

    	$q = $this->db->select('u.*')
    	->from('mch_registration u');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				u.name like '%". $s_key ."%'
				OR u.mobile like '%". $s_key ."%'
				OR u.email like '%". $s_key ."%'
				OR u.designation like '%". $s_key ."%'
				OR u.city like '%". $s_key ."%'
				OR u.state like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		if($from!='' && $to!=''){
			$q->where("u.created_at BETWEEN '$from' AND '$to'");
		}

		// $q->where("u.is_active","1");
		$q->order_by("u.id", "desc");

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();
		

		return $collection;
	}

	function get_users_registered($data_array){
		$records = [];

		foreach ($data_array as $row) {
			
			$u_type='';

			$data['Users Email'] = $row->email_id;
			$data['Users Mobile Number'] = $row->number;
			if($row->users_type=='General'){$u_type = "General";}else{$u_type = "Medico";}
			$data['Users Type'] = $u_type;
			$data['Name and City of College'] = $row->medical_college;
			$data['Qualification'] = $row->student_qualification;
			$data['Reference'] = $row->reference;
			$data['Added Date'] = date("jS M,Y H:i:s",strtotime($row->added_date_time));

			array_push($records, $data);
		}
		
		return $records;
	}

	function get_users_registered_new($data_array){
		$records = [];

		foreach ($data_array as $row) {
			
			$data['Users Name'] = $row->name;
			$data['Users Email'] = $row->email;
			$data['Users Mobile Number'] = $row->mobile;
			// if($row->users_type=='General'){$u_type = "General";}else{$u_type = "Medico";}
			$data['Designation'] = $row->designation;
			$data['City'] = $row->city;
			$data['State'] = $row->state;
			// $data['Reference'] = $row->reference;
			$data['Added Date'] = date("jS M,Y H:i:s",strtotime($row->created_at));

			array_push($records, $data);
		}
		
		return $records;
	}
	
	function get_users_viewed($data_array){
		$records = [];

		foreach ($data_array as $row) {

			$u_type='';
			
			$data['Users Email'] = $row->email_id;
			$data['Users Mobile Number'] = $row->number;
			if($row->users_type=='General'){$u_type = "General";}else{$u_type = "Medico";}
			$data['Users Type'] = $u_type;
			$data['Category Name'] = $row->category_name;
			$data['Sub Category Name'] = $row->sub_category_name;
			$data['Posts Title'] = $row->upload_title;
			$data['Posts For User Type'] = $row->upload_for_user_type;
			$data['Viewed Date Time'] = date("jS M,Y H:i:s",strtotime($row->added_date_time));

			array_push($records, $data);
		}
		
		return $records;
	}

	function get_users_contact($data_array){
		$records = [];

		foreach ($data_array as $row) {

			$u_type='';
			
			$data['User Name'] = $row->contact_name;
			$data['Contact Number'] = $row->contact_number;
			$data['Email-ID'] = $row->contact_email;
			$data['Message'] = $row->contact_message;
			$data['Contacted Date Time'] = date("jS M,Y H:i:s",strtotime($row->contact_dt));

			array_push($records, $data);
		}
		
		return $records;
	}

	function get_users_contact_new($data_array){
		$records = [];

		foreach ($data_array as $row) {

			$u_type='';
			
			$data['User Name'] = $row->name;
			$data['Contact Number'] = $row->number;
			$data['Email ID'] = $row->email;
			$data['Message'] = $row->message;
			$data['Contacted Date Time'] = date("jS M,Y H:i:s",strtotime($row->created_at));

			array_push($records, $data);
		}
		
		return $records;
	}

	function get_users_posts_viewed_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0, $from='', $to='' ,$conditions = []) {

    	$q = $this->db->select('u.*,c.*,sc.*,us.*,ud.upload_title,ud.upload_type')
    	->from("users_data_seen us")
    	->join("users u","u.users_id = us.users_id")
		->join("category c","c.category_id = us.category_id")
		->join("upload_data ud","us.upload_data_id = ud.upload_data_id")
		->join("sub_category sc","ud.sub_category_id = sc.sub_category_id");
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				u.users_name like '%". $s_key ."%'
				OR u.number like '%". $s_key ."%'
				OR u.email_id like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		if($from!='' && $to!=''){
			$q->where("DATE_FORMAT(u.seen_date_time,'%Y-%m-%d')  BETWEEN '$from' AND '$to'");
		}

		$this->db->where("u.is_active","1");
		$this->db->where("c.is_active","1");
		$this->db->where("sc.is_active","1");
		$this->db->where("ud.is_active","1");

		$this->db->order_by("us.seen_date_time desc");

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection1 = $q->get(); //echo $this->db->last_query();exit;
		$collection = $collection1->result();
		
		//print_r($collection);
		//die;

		return $collection;
	}

	function get_contact_us_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0, $from='', $to='' ,$conditions = []) {

    	$q = $this->db->select('c.*')
    	->from("contacts c");
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				c.contact_name like '%". $s_key ."%'
				OR c.contact_number like '%". $s_key ."%'
				OR c.contact_email like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		if($from!='' && $to!=''){
			$q->where("DATE_FORMAT(c.contact_dt,'%Y-%m-%d')  BETWEEN '$from' AND '$to'");
		}

		$this->db->where("c.is_active","1");

		$this->db->order_by("c.contact_dt desc");

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();		

		return $collection;
	}

	function get_contact_us_collection_new($f_filters = [], $keywords ='', $limit = 0, $offset = 0, $from='', $to='' ,$conditions = []) {

    	$q = $this->db->select('c.*')
    	->from("mch_contact c");
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				c.name like '%". $s_key ."%'
				OR c.number like '%". $s_key ."%'
				OR c.email like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		if($from!='' && $to!=''){
			$q->where("c.created_at BETWEEN '$from' AND '$to'");
		}

		$this->db->where("c.is_active","1");

		$this->db->order_by("c.created_at", "desc");

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection1 = $q->get();//echo $this->db->last_query();exit;
		$collection = $collection1->result();		

		return $collection;
	}
}