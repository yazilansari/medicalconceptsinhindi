<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_admin extends MY_Model {


	public $p_key = 'admin_id';
	public $table = 'admin';
	
	public $session_key;

	function __construct() {
		parent::__construct($this->table);
		$this->session_key = config_item('session_data_key');
	}

	function _authenticate($record){

		$admin_id = $record[0]->admin_id;
		$username = $record[0]->admin_username;
		$a_type = $record[0]->admin_type;

		$admin_info = ['user_id'=> $admin_id, 'user_name'=>$username, 'role'=> $a_type];
		$this->session->set_userdata($this->session_key, $admin_info);
		return true;
	}

	function authenticate(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[15]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ( ! $this->form_validation->run() ){
			return FALSE;
		}
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$record = $this->get_records(['admin_username'=> $username, 'admin_password'=>$password]);

		if(count($record)){
			return $this->_authenticate($record);
			/*check whether session is set*/
			$admin = $this->session->userdata($this->session_key);
			return (is_numeric($admin['admin_id']) ) ? TRUE : FALSE;
		}

		return FALSE;
	}

	function getCategoryCount(){

		$q = $this->db->select('c.*')
		->from('category c');

		$q->where('c.is_active','1');
		$q->order_by('c.category_id desc');

		$collection1 = $q->get();
		$collection = $collection1->result();

		return $collection;
	}

	function getSubCategoryCount(){

		$q = $this->db->select('sc.*')
		->from('sub_category sc')
		->join('category c','c.category_id = sc.category_id');

		$q->where('c.is_active','1');
		$q->where('sc.is_active','1');
		$q->order_by('sc.sub_category_id desc');

		$collection1 = $q->get();
		$collection = $collection1->result();

		return $collection;
	}

	function getPostsCount(){

		$q = $this->db->select('ud.*')
		->from('upload_data ud')
		->join('category c','c.category_id = ud.category_id')
		->join('sub_category sc','sc.sub_category_id = ud.sub_category_id');

		$q->where('ud.is_active','1');
		$q->where('c.is_active','1');
		$q->where('sc.is_active','1');
		$q->order_by('sc.sub_category_id desc');

		$collection1 = $q->get();
		$collection = $collection1->result();

		return $collection;
	}

	function getUsersRegistered($where=''){

		$q = $this->db->select('u.*')
		->from('users u');

		if($where!=""){
			$q->where($where);
		}

		$q->where('u.is_active','1');
		$q->order_by('u.users_id desc');

		$collection1 = $q->get();
		$collection = $collection1->result();

		return $collection;	
	}

}
