<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model
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

	public function get_category($where){

		$this->db->select("c.*");
		$this->db->from("category c");
		$this->db->join("main_category_mapping mcm",'c.category_id = mcm.category_id');
		$this->db->join("main_category mc","mcm.main_category_id = mc.main_category_id");
		$this->db->where($where);
		$this->db->order_by("c.category_id","ASC");
		$query = $this->db->get(); //echo $this->db->last_query();exit;
    	return $query->result();
	}
	
	public function get_sub_category($folder_id,$where,$token="",$user_type){

		$this->db->select("sc.*,f.folder_id,f.folder_name,f.folder_description as folder_description ,c.category_name");
		$this->db->from("sub_category sc");
		$this->db->join("category c","sc.category_id=c.category_id");
		$this->db->join("folder f","sc.folder_id=f.folder_id","left");
		$this->db->where($where);

		if($user_type!=""){

            $where_c = "(sc.upload_for_user_type = '$user_type' OR sc.upload_for_user_type='Both')";
            $this->db->where($where_c);
        }
       /* if($folder_id){
        	$this->db->where("sc.folder_id",$folder_id)
        }*/

		$this->db->order_by("sc.sort_order","ASC");
	//var_dump($folder_id);exit;
		/*if($folder_id == ""){
			$this->db->group_by("f.folder_id");
		}*/

		$query = $this->db->get();
		//var_dump($this->db->last_query());exit;
    	return $query->result();
	}

	public function get_category_unseen_count($where, $upload_data_id){

		$this->db->select("GROUP_CONCAT(uds.upload_data_id) as seen_upload_data");
		$this->db->from("users_data_seen uds");
		$this->db->join("users u","u.users_id = uds.users_id");
		$this->db->join("upload_data ud","ud.upload_data_id = uds.upload_data_id");
		$this->db->join("category c","ud.category_id = c.category_id");
		$this->db->where($where);
		$this->db->where("uds.upload_data_id IN ({$upload_data_id})");
		$query = $this->db->get();

		return $query->result();
	}
	
	public function get_sub_category_unseen_count($where, $upload_data_id){

		$this->db->select("GROUP_CONCAT(uds.upload_data_id) as seen_upload_data");
		$this->db->from("users_data_seen uds");
		$this->db->join("users u","u.users_id = uds.users_id");
		$this->db->join("upload_data ud","ud.upload_data_id = uds.upload_data_id");
		$this->db->join("sub_category sc","ud.sub_category_id = sc.sub_category_id");
		$this->db->where($where);
		$this->db->where("uds.upload_data_id IN ({$upload_data_id})");
		$query = $this->db->get();

		return $query->result();
	}
}
?>
