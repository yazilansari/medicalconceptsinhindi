<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends MY_Model
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
    
	function execute_query($query)
	{
		 $query = $this->db->query($query);
		 return $query->result();		 
	}
	
	function execute_query_row($query)
	{
		 $query = $this->db->query($query);
		 return $query->row();
		 
	}
	// sofiya connect db for test
	function execute()
	{
		$this->load->database();
		$query=$this->db->get('doctor');
		return $query->result();
	}	//....................................................................................................
	
	//PREVENT FROM SQL INJECTION
	function go_safe($string)
	{
		return $this->db->escape_str(trim($string));
// 		return mysqli_real_escape_string($this->db->conn_id, trim($string));
	}
	
	//....................................................................................................
	
	//STRING CONVERT IN ENCRYPT FORM
	function encrypt_id($string)
	{
		return $string*75;
	}
	
	//....................................................................................................
	
	//STRING CONVERTED IN DECRYPT FORM
	function decrypt_id($string)
	{
		return $string/75;
	}
	
	function random_code()
	{
		$code = rand(000000,999999);
		$code = str_pad($code,6,"0");
		
		$where = array("compid"=>$code);
		$res = $this->get_All_where_Record("uin_company",$where);
		if(!empty($res))
		{
			$this->random_code();
		}
		else
			return $code;
	}
	
	function random_code_alpha()
	{
		$length = 16;

		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

		$where = array("tokens_code"=>$randomString);
		$res = $this->get_All_where_Record("tokens",$where);
		if(!empty($res))
		{
			$this->random_code_alpha();
		}
		else
			return $randomString;
	}
	
	function string_replace($string)
	{
		$string=str_ireplace(' ','_',$string);
		$string=str_ireplace(',','_',$string);
		$string=str_ireplace(',','_',$string);
		
		return $string;
	}
	
	
	//....................................................................................................
	
	//INSERT DATA INTO TABLE
	function insert_data_query($tbl_name,$insert_value)
	{
		$this->db->insert($tbl_name, $insert_value);
		return $this->db->insert_id();
	}
	
	//....................................................................................................	
	
	//INSERT DATA INTO TABLE
	function insert_batch_data($tbl_name,$insert_value)
	{
		return $this->db->insert_batch($tbl_name, $insert_value);
	}
	
	//....................................................................................................
	
	//UPDATE DATA INTO TABLE
	function update_data_query($tbl_name,$set,$where)
	{
		$this->db->update($tbl_name,$set,$where);
		return true;
	}
	
	//.......................................................................................................
	
	//DELETE RECORD FROM TABLE
	function delete_entry($tbl_name,$data)
	{
		$this->db->where($data);
		$this->db->delete($tbl_name);
		return true;
	}
	
	//....................................................................................................
	
	//GET ALL RECORD FROM TABLE
	function get_All_Record($tabl_name)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result('object');
		}
		else
		{
			return false;
		}
	}
	
	//....................................................................................................
	
	//GET ALL WHERE RECORD FROM TABLE
	function get_All_where_Record($tabl_name,$where_data)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$this->db->where($where_data);
		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			return $query->result('object');
		}
		else
		{
			return false;
		}
	}
	
	//Select all where record from table
	
	function select_All_where_Record($select,$tabl_name,$where_data)
	{
		$this->db->select($select);
		$this->db->from($tabl_name);
		$this->db->where($where_data);
		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			return $query->result('object');
		}
		else
		{
			return false;
		}
	}
	
	//....................................................................................................
	function get_All_order_where_Record($tabl_name,$orderby,$where_data)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$this->db->where($where_data);
		$this->db->order_by($orderby);
		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			return $query->result('object');
		}
		else
		{
			return false;
		}
	}
	
	
	//GET SINGLE ROW RECORD FROM TABLE
	function get_singlerow_Record($tabl_name)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$query = $this->db->get();
		return $query->row();
	}
	
	//....................................................................................................
	
	//GET SINGLE ROW WHERE RECORD FROM TABLE
	function get_singlerow_where_Record($tabl_name,$where_data)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$this->db->where($where_data);
		$query = $this->db->get();
		return $query->row();
	}
	function get_adminsinglerow_where_Record($tabl_name,$where_data)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$this->db->where($where_data);
		$query = $this->db->get();
		return $query->row();
	}
	function get_adminsinglerow_Record($tabl_name)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);   	
		$query = $this->db->get();
		return $query->row();
	}

	//....................................................................................................
	
	
	//COUNT ALL RECORD FROM TABLE
	function count_All_Record($tabl_name)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
		  $data=count($query->result('object'));
		  return $data;
		}
		else
		{
			return false;	
		}
	}
	function count_All_AdminRecord($tabl_name)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
		  $data=count($query->result('object'));
		  return $data;
		}
		else
		{
			return false;	
		}
	}
	
	//....................................................................................................
	
	
	//COUNT ALL WHERE RECORD FROM TABLE
	function count_All_where_Record($tabl_name,$where_data,$like=false,$like_start=false,$field_name=false)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$this->db->where($where_data);
		if($like_start!='')
		{
			$this->db->like($field_name,$like_start,'after'); 
		}
		if($like!='')
		{
			$this->db->like($like);
		}	
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
		  $data=count($query->result('object'));
		  return $data;
		}
		else
		{
			return false;	
		}
	}
	function count_All_where2_Record($tabl_name,$where_data,$where_data1,$like=false,$like_start=false,$field_name=false)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$this->db->where($where_data);
		$this->db->where($where_data1);
		if($like_start!='')
		{
			$this->db->like($field_name,$like_start,'after'); 
		}
		if($like!='')
		{
			$this->db->like($like);
		}	
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
		  $data=count($query->result('object'));
		  return $data;
		}
		else
		{
			return false;	
		}
	}
	//....................................................................................................
	
	
	//GET RANDOM RECORD FROM TABLE
	function get_random_Record($tabl_name,$order_data,$limit=false)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$this->db->order_by($order_data,'random');
		if($limit!='')
		{
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		return $query->result('object');
	}
	
	
	//GET RANDOM RECORD FROM TABLE
	function get_random_where_one_record($tabl_name,$where=false,$order_data)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		if($where!=false)
		{
			$this->db->where($where);
		}
		$this->db->order_by($order_data,'random');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}


    function substr_word($string, $len) {
    	return substr( ( $str = wordwrap( $string, $len, '$$' ) ), 0, strpos( $str, '$$' ) );
    }
	
	
	//....................................................................................................
	
	
	//GET RANDOM WHERE RECORD FROM TABLE
	function get_random_where_Record($tabl_name,$where,$order_data,$limit=false)
	{
		$this->db->select('*');
		$this->db->from($tabl_name);
		$this->db->where($where);
		$this->db->order_by($order_data,'random');
		if($limit!='')
		{
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		return $query->result('object');
	}
	
	//....................................................................................................
	
	//CHECK ALREADY AVAILABLE DATA IN TABLE	
	function select_available_record($table,$present_data)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($present_data);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result('object');
			exit;
		}
		else
		{
			return false;
			exit;
		}	
	}
	
	//....................................................................................................
	
	//GET ORDER BY RECORD
	function select_order_by($table,$order_by,$limit=false,$group_by=false)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($order_by,'DESC');
		if($group_by!='')
		{
			$this->db->group_by($group_by);
		}
		if($limit!='')
		{
			$this->db->limit($limit);
		}
		$query=$this->db->get();
		return $query->result('object');
	}
	
	function get_All_order_Record($select,$tabl_name,$where,$orderby)
	{
		$this->db->select($select);
		$this->db->from($tabl_name);
		$this->db->where($where);
		$this->db->order_by($orderby);
		$query = $this->db->get();

		if($query->num_rows()>0)
		{
			return $query->result('object');
		}
		else
		{
			return false;
		}
	}
	
	//....................................................................................................
	
	//GET ORDER BY RECORD
	function select_where_order_by($table,$where_data,$order_by,$limit=false)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where_data);
		$this->db->order_by($order_by);
		if($limit!='')
		{
			$this->db->limit($limit);
		}
		$query=$this->db->get();
		return $query->result('object');
	}
	
	//GET PAHINATION  RECORD QUERY
	function select_Pagination_Record($tabl_name,$tab,$offset=0,$limit=10,$like=false,$like_start=false,$field_name=false)
	{
		 $this->db->select("*"); //seslect all record
		 $this->db->from($tabl_name); //define record from which table
		 $this->db->order_by($tab); //order record in desc order of insertion
		 $this->db->limit($limit,$offset);// define limit for redord on page
		 if($like_start!='')
		 {
			$this->db->like($field_name,$like_start,'after'); 
		 }
		 if($like!='')
		 {
			$this->db->like($like);
		 }	
		 $query = $this->db->get();
		 return $query->result();
	}
	function select_AdminPagination_Record($tabl_name,$offset=0,$limit=10,$like=false,$like_start=false,$field_name=false)
	{
		 $this->db->select("*"); //seslect all record
		 $this->db->from($tabl_name); //define record from which table
		 $this->db->order_by("id desc"); //order record in desc order of insertion
		 $this->db->limit($limit,$offset);// define limit for redord on page
		 if($like_start!='')
		 {
			$this->db->like($field_name,$like_start,'after'); 
		 }
		 if($like!='')
		 {
			$this->db->like($like);
		 }	
		 $query = $this->db->get();
		 return $query->result();
	}
	//....................................................................................................
	
	//GET PAHINATION WHERE RECORD QUERY
	function select_Pagination_Where_Record($tabl_name,$where_data,$offset=0,$limit=10,$like=false,$like_start=false,$field_name=false)
	{
		 $this->db->select("*"); //seslect all record
		 $this->db->from($tabl_name); //define record from which table
		 $this->db->where($where_data); 
		 if($offset != "" && $limit != "") {
		 	$this->db->limit($limit,$offset);// define limit for redord on page
		 }
		 if($like_start!='')
		 {
			$this->db->like($field_name,$like_start,'after'); 
		 }
		 if($like!='')
		 {
			$this->db->like($like);
		 }	
		 $query = $this->db->get();
		 return $query->result();
	}
	
	//GET PAHINATION WHERE RECORD QUERY WITH ORDER BY
	function select_Pagination_Where_order_Record($tabl_name,$where_data, $order_by,$offset=0,$limit=10,$like=false,$like_start=false,$field_name=false)
	{
		$this->db->select("*"); //seslect all record
		$this->db->from($tabl_name); //define record from which table
		$this->db->where($where_data);
		$this->db->order_by($order_by);
		if($offset != "" && $limit != "") {
			$this->db->limit($limit,$offset);// define limit for redord on page
		}
		if($like_start!='')
		{
			$this->db->like($field_name,$like_start,'after');
		}
		if($like!='')
		{
			$this->db->like($like);
		}
		$query = $this->db->get();
		return $query->result();
	}
	
	function select_Pagination_Where2_Record($tabl_name,$where_data,$where_data1,$offset=0,$limit=10,$like=false,$like_start=false,$field_name=false)
	{
		 $this->db->select("*"); //seslect all record
		 $this->db->from($tabl_name); //define record from which table
		 $this->db->where($where_data); 
		 $this->db->where($where_data1);
		 $this->db->limit($limit,$offset);// define limit for redord on page
		 if($like_start!='')
		 {
			$this->db->like($field_name,$like_start,'after'); 
		 }
		 if($like!='')
		 {
			$this->db->like($like);
		 }	
		 $query = $this->db->get();
		 return $query->result();
	}

	//....................................................................................................
	
	function check_admin_login($data)
	{
		$this->db->select("*"); //seslect all record
		$this->db->from("admin"); 
		$this->db->where("admin_username ='".$data["username"]."'"); 
	 	$query = $this->db->get();
	 	return $query->row();		
	}
	
	function check_user_login($data)
	{
		$this->db->select("*"); //seslect all record
		$this->db->from("phlebo");
		$this->db->where("phlebo_username ='".$data["username"]."' ");
		$query = $this->db->get();
		return $query->row();
	}
	
	//USER LOGOUT
	function logout()
	{
		if($this->session->userdata('ses_userid'))
		{
			//UNSET SESSION VARIABLE
			 $this->session->sess_destroy(); 
			 
			//REDIRECT ON PAGE
			redirect(base_url().'login');
		}		
		else
			redirect(base_url().'login');
	}
	
	 //change user password
	 function change_password($current_psw,$new_password)
	 {
	 	
		$data = array('user_password'=>$current_psw,'user_id'=>$this->session->userdata('ses_user_id'));
		$this->db->select('*');
		$this->db->from('tbl_user_registration');
		$this->db->where($data);
		$query = $this->db->get();	
		if($query->num_rows()>0)
		{	
			$set = array('user_password'=>$new_password);
			$where = array('user_id'=>$this->session->userdata('ses_user_id'));
			$this->db->update('tbl_user_registration',$set,$where); 
			
			return true;
			exit;
		}
		else
		{
			return false;
			exit;
		}
	 
	}
	function get_drop_down($drop_down_name,$selected_value,$tbl,$where)
	{	
		?>
		<select name="<?php echo $drop_down_name;?>" id="<?php echo $drop_down_name;?>" style="width:58%" class="round full-width-select" >
        <option value="">Please Select</option>
        <?php 
		$res = $this->get_All_where_Record($tbl,$where);
			if(!empty($res))
			{
				foreach($res as $data)
				{
				?>
                <option value="<?php echo $data->id;?>" <?php if($selected_value==$data->id){?>selected<?php }?>><?php echo $data->name; ?> </option>
                <?php
				}
			}
		?>
        </select>
        <?php 
	}
	
	function get_smsbalanace()
	{
		$this->db->select("ifnull(sum(ceil(length(smslog_message)/160)),0) netconsump",false);
		$this->db->from("smslog"); //define record from which table
		$this->db->where("smslog_is_success = '1'");
		$query = $this->db->get();
		//echo $this->db->last_query();
		$r = $query->row();
		$netconsump = $r->netconsump;
		

		$this->db->select("ifnull(sum(smsbalance_balance),0 ) netbal",false);
		$this->db->from("smsbalance bal"); //define record from which table
		$this->db->where("smsbalance_type = '1'");
		$query = $this->db->get();
		$r = $query->row();
		$netbal = $r->netbal;
		
		return $totbal =  $netbal - $netconsump;
	}

	function smslog_pagination_record($where,$offset=0,$limit=10,$like=false,$like_start=false,$field_name=false)
	{
		 $this->db->select("*,u.smslog_id uid"); //seslect all record
		 $this->db->from("smslog u"); //define record from which table
		 $this->db->where($where); 
         $this->db->order_by("u.smslog_id desc");
		 $this->db->limit($limit,$offset);// define limit for redord on page
		 if($like_start!='')
		 {
			$this->db->like($field_name,$like_start,'after'); 
		 }
		 if($like!='')
		 {
			$this->db->like($like);
		 }
		  $query = $this->db->get();
		 return $query->result();
	}
	
	function smslog_record_tot($where)
	{
		 $this->db->select("*,u.smslog_id uid"); //seslect all record
		 $this->db->from("smslog u"); //define record from which table
		 $this->db->where($where); 
         $this->db->order_by("u.smslog_id desc");
		 return $this->db->count_all_results();
	}
	
	function smslog_tot($where)
	{
		 $this->db->select("sum(ceil(length(smslog_message)/160)) totmsg"); //seslect all record
		 $this->db->from("smslog u"); //define record from which table
		 $this->db->where($where); 
         $query = $this->db->get();
		 return $query->row();
	}
	
	function unset_mysess()
    {	
		$globalaess = array("session_id","ip_address","user_agent","last_activity","user_data","ses_compuserid","ses_extension");
		//print_r($globalaess);
		if(!empty($this->session->userdata))
		{
			foreach($this->session->userdata as $key =>$val)
			{				
				if(!in_array($key,$globalaess))
				{					
				  $this->session->unset_userdata($key);
				}
			}
		}
    }

    function getFormattedDate($date, $format)
	{	
		$formatted_date = date($format,strtotime($date));
		return $formatted_date;
	}

	function check_past_date($date){

		$date = new DateTime($date);
		$now = new DateTime();
		$data = "";
		if($date < $now) {
		    $data = 1;
		}else{
			$data = 0;
		}
		return $data;
	}	

	public function isTime($time)
	{
		return preg_match("/(2[0-4]|[01][1-9]|10):([0-5][0-9])/", $time);
	}

	function isBetween($input) 
	{
	    $fromTime = strtotime("00:00:00");
	    $toTime = strtotime("23:59:00");
	    $inputTime = strtotime($input);
	    $data = "";
	    if ($inputTime > $fromTime && $inputTime < $toTime) {
	        $data= 1;
		}else{
			$data= 0;
		}

		return $data;
	}

	function check_time($start_time,$end_time){
		$data = "";
		if(strtotime($end_time) > strtotime($start_time)){
			$data= 1;
		}else{
			$data= 0;
		}

		return $data;
	}

	function user_authentication(){

		$session_data = $this->session->all_userdata();
		/*print_r($session_data);exit;*/
		if($session_data['ses_user_id'] == "" || ($session_data['ses_user_type']!="Phlebo" || $session_data['ses_user_type']!="Doctor") || $session_data['ses_user_type']=="Admin"){
			redirect(base_url()."login");
		}

	}

	function check_doctor_login($data)
	{
		$this->db->select("*"); //seslect all record
		$this->db->from("doctors");
		$this->db->where("number ='".$data["username"]."' ");
		$query = $this->db->get();
		return $query->row();
	}

	function check_ho_login($data)
	{
		$this->db->select("*"); //seslect all record
		$this->db->from("users");
		$this->db->where("user_empid ='".$data["username"]."' ");
		$this->db->where("user_password ='".$data["password"]."' ");
		$this->db->where("users_type","HO");
		$query = $this->db->get();
		return $query->row();
	}

	function check_user_exists_api($where=array()){

		$this->db->select("u.*");
		$this->db->from("users u");
		$this->db->where($where);
		$this->db->where("u.users_type!='MR'");
		$query = $this->db->get();
		return $query->row();
	}

	function get_mr_list_from_asm($where){

		$this->db->select("GROUP_CONCAT(u1.user_id) mr_ids");
		$this->db->from("users u1");
		$this->db->join("users u","u.user_id = u1.users_parentid");
		$this->db->where($where);
		$this->db->where("u1.users_type","MR");
		$query = $this->db->get();
		return $query->row();	
	}

	function get_mr_list_from_rsm($where){

		$this->db->select("GROUP_CONCAT(u2.user_id) mr_ids");
		$this->db->from("users u2");
		$this->db->join("users u1","u1.user_id = u2.users_parentid");
		$this->db->join("users u","u.user_id = u1.users_parentid");
		$this->db->where($where);
		$this->db->where("u2.users_type","MR");
		$query = $this->db->get();
		return $query->row();	
	}

	function get_mr_list_from_zsm($where){

		$this->db->select("GROUP_CONCAT(u3.user_id) mr_ids");
		$this->db->from("users u3");
		$this->db->join("users u2","u2.user_id = u3.users_parentid");
		$this->db->join("users u1","u1.user_id = u2.users_parentid");
		$this->db->join("users u","u.user_id = u1.users_parentid");
		$this->db->where($where);
		$this->db->where("u3.users_type","MR");
		$query = $this->db->get();
		return $query->row();	
	}

	function sendsms($to,$message)
	{
		$senderid = "PHARMA";
		$msg = urlencode($message);$demo_num=7400139264;
		$url = "http://alerts.sinfini.com/api/web2sms.php?workingkey=79205ve7suw5bj1odtr5&sender=".$senderid."&to=".$demo_num."&message=$msg";
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output=curl_exec($ch);
		$pos = strpos($output,"GID=");
		if($pos==true)
			$is_success=1;
		else	
			$is_success=0;
		curl_close($ch);                                			
		
		//Insert Into Log
		/*$set = array(
					 "smslog_mobile"=>$to,
					 "smslog_message"=>$message,
					 "smslog_msg_for"=>$msg_for,					 
					 "smslog_is_success"=>$is_success,
					 "smslog_output"=>$output,
					 "smslog_idatetime"=>date("Y-m-d H:i:s"),
					 "smslog_designation" => $desig
					 );
		$this->common_model->insert_data_query('smslog',$set);*/
		return $is_success;	
	}
}
?>