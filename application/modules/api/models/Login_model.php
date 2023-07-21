<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends MY_Model
{ 
	public function __construct()
    {
		parent::__construct();
		//load database library
        $this->load->database(); 
        
        $this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$this->load->library('session');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
		$this->db->query("SET time_zone = '+05:30'");
    }

    public function user_login($where){

    	$this->db->select("u.users_id,u.users_name,u.users_type,u.number,u.email_id,IFNULL(u.student_qualification,'') as student_qualification,IFNULL(u.medical_college,'') as medical_college,u.added_date_time,u.is_active,u.access_token,u.device_id,u.device_type");
    	$this->db->from("users u");
    	$this->db->where($where);
    	$query = $this->db->get();
    	return $query->result_array();
    	
    }

    public function update_access_token($id="", $token="", $device_id="", $device_type=""){

		$data_arr['access_token'] = $token;
		$data_arr['device_id'] = $device_id;
		$data_arr['device_type'] = $device_type;

		$this->db->where('users_id', $id);
		$this->db->update('users', $data_arr);

		$affected = $this->db->affected_rows();

		return $affected;
	}


	public function get_user_history($where){

		$this->db->select("os,os_version,app_version,device_id,device_type");
		$this->db->from("user_history");
		$this->db->where($where);
		$this->db->order_by("user_history_id","desc");
		$this->db->limit("1");
		$query = $this->db->get();
    	return $query->result_array();	
	}	

	public function register($where){

		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("number",$where['number']);
		$this->db->where("email_id",$where['email_id']);
		$query = $this->db->get();
		$data_arr = $query->result_array();

		return $data_arr;

	}
	
	public function get_contributors_list($where){

		$this->db->select("c.*");
		$this->db->from("contributors c");
		$this->db->where($where);
		$this->db->order_by('c.sort_order','asc');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_app_vision($where){

		$this->db->select("app.*");
		$this->db->from("app_vision app");
		$this->db->where($where);
		$this->db->order_by("app_vision_id desc");
		$this->db->limit("1");
		$query = $this->db->get();

		return $query->result();
	}

	public function update_user_type($id="", $user_type=""){

		$data_arr['users_type'] = $user_type;
		$this->db->where('access_token', $id);
		$this->db->update('users', $data_arr);

		$affected = $this->db->affected_rows();

		return $affected;
	}
}
?>