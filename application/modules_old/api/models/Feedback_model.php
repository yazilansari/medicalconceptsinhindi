<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends MY_Model
{ 
	public function __construct()
    {
		parent::__construct();
		//load database library
        $this->load->database(); 
        
        $this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('common_model');
		date_default_timezone_set('Asia/Kolkata');
		$this->db->query("SET time_zone = '+05:30'");
    }

	public function get_feedback_list($where){

		$this->db->select("f.*");
		$this->db->from("feedback f");
		$this->db->where($where);
		$this->db->order_by("f.feedback_id","ASC");
		$query = $this->db->get();
    	return $query->result();
	}
	
	public function insert_feedback_data($data = array()){

		$this->common_model->insert_batch_data("users_feedback", $data);

		$affected = $this->db->affected_rows();

		return $affected;
	}

}
?>