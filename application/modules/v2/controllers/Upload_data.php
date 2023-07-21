<?php
class Upload_data extends MY_Controller {
	public $data = array();
	function __construct() {
		parent::__construct();
		$this->data = $this->input->post();
		$this->load->model('upload_data_model');
		$this->load->model('login_model');
		$this->load->helper('common_helper');
	}
	

	public function get_upload_data(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		
		$token = "";
		$token = isset($data_token['token']) ? $data_token['token'] : $data_token['Token'];
		
		$category_id = isset($data['category_id']) ? $data['category_id'] : "";
		$sub_category_id = isset($data['sub_category_id']) ? $data['sub_category_id'] : "";
		$tags = isset($data['tags']) ? $data['tags'] : "";
		$limit = isset($data['limit']) ? $data['limit'] : "5";
		$page = isset($data['page']) ? $data['page'] : "1";
		
		$start_from = ($page-1) * $limit;

		$where_user = array("u.access_token" => $token,"u.is_active" => "1");
		$result_data = $this->login_model->user_login($where_user);
		
		$user_type = $result_data[0]['users_type'];

		if($flag){

			if($category_id!="" && $sub_category_id!=""){
				$where = array("c.is_active" => "1", "c.category_id" => $category_id, "sc.sub_category_id" => $sub_category_id, "sc.is_active" => "1", "ud.is_active" =>"1");	
			}else{
				$where = array("c.is_active" => "1", "c.category_id" => $category_id, "ud.is_active" =>"1");
			}

			if($category_id=="" && $sub_category_id==""){
				$where = array("ud.is_active" =>"1");	
			}
			
			$result_data = $this->upload_data_model->get_upload_data($where,$tags,$user_type,$start_from,$limit);
			$result_arr = array();
			foreach ($result_data as $key => $value) {
				$result_arr[$key] = new stdClass;
				$result_arr[$key]->upload_data_id = $value->upload_data_id;
				$result_arr[$key]->upload_title = $value->upload_title ;
				$result_arr[$key]->video_type = $value->video_type ;
				$result_arr[$key]->upload_for_user_type = $value->upload_for_user_type_for_data ;
				$result_arr[$key]->short_description = $value->short_description ;
				$temp = str_replace('\r\n', "", $value->upload_description);
				$temp = str_replace('\r', "", $temp);
				$temp = str_replace('\n', "", $temp);
				$temp = stripslashes($temp);
				
				$result_arr[$key]->upload_description = '<style>table, th, td { border: 1px solid black; }</style>'.$temp;


				$result_arr[$key]->category_id = $value->category_id ;
				$result_arr[$key]->sub_category_id = $value->sub_category_id ;
				$result_arr[$key]->upload_path = $this->upload_data_model->get_file_path($value->upload_path,$value->upload_type,$value->sub_category_id);
		//var_dump($result_arr[$key]->upload_path);exit;
				
				if($value->category_id == 5 || $value->category_id == 9){
					if($value->upload_type == 'text'){
						$result_arr[$key]->upload_path = '';
					}
						$result_arr[$key]->upload_type = 'word';	
				}else{
					$result_arr[$key]->upload_type = $value->upload_type ;
				}


	            $result_arr[$key]->thumbnail = $this->upload_data_model->get_thumbnail_image_path($value->thumbnail,$this->config->item('s3_posts_thumbnail_exists').$value->sub_category_id.'/',$value->sub_category_id);
				$result_arr[$key]->icon_path = get_icon_path($value->upload_for_user_type) ;
				$result_arr[$key]->tags = $value->tags ;
				$result_arr[$key]->sub_category_name = $value->sub_category_name ;
				$result_arr[$key]->sub_category_image = get_sub_category_image_path($value->sub_category_image) ;
				$result_arr[$key]->added_date_time = date("d M Y", strtotime($value->added_date_time));
				$result_arr[$key]->uploaded_ago = get_uploaded_time_ago($value->added_date_time) ;
				$result_arr[$key]->youtube_video_id = $value->youtube_video_id;
				$result_arr[$key]->view_count = $value->view_count;
				$result_arr[$key]->contributors_name = $value->contributors_name;

				$comment_arr = $this->upload_data_model->get_upload_data_comments(['ud.upload_data_id' => $value->upload_data_id]);

				$result_arr[$key]->comment_count = count($comment_arr);
				$result_arr[$key]->comment_arr = $comment_arr;

			}
			//echo $this->db->last_query();exit;
			if(!empty($result_data)){
				
				$this->response['code'] = 200;
				$this->response['message'] = "Data has been retreived successfully!!";
				$this->response['data'] = $result_arr;
			}else{
				$this->response['code'] = 200;
				$this->response['message'] = "Data has not been uploaded for given Sub Category!!!";
				
			}
				
			$this->sendResponse();
		}else{
			
			$this->response['code'] = 404;
			$this->response['message'] = $message;
			$this->error = $message;
		}
		
		$this->sendResponse();
		//echo json_encode($result, JSON_UNESCAPED_UNICODE);
		
	}
	
	
	
	public function user_data_seen(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		
		$token = "";
		
		$token = isset($data_token['token']) ? isset($data_token['Token']) : "";

		$upload_data_id = isset($data['upload_data_id']) ? $data['upload_data_id'] : "";
		if($upload_data_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter Upload Data ID");
			$message = "Please enter Upload Data ID";
		}

		$users_id = isset($data['users_id']) ? $data['users_id'] : "";
		if($users_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter Users ID");
			$message = "Please enter Users ID";
		}

		$category_id = isset($data['category_id']) ? $data['category_id'] : "";
		if($category_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter Category ID");
			$message = "Please enter Category ID";
		}

		$sub_category_id = isset($data['sub_category_id']) ? $data['sub_category_id'] : "";
		if($sub_category_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter Sub Category ID");
			$message = "Please enter Sub Category ID";
		}

		if($flag){

			$where = array("uds.category_id" => $category_id, "uds.sub_category_id" => $sub_category_id, "uds.users_id" => $users_id, "uds.upload_data_id" => $upload_data_id);
			$check_record_exists = $this->upload_data_model->check_seen_data_exists($where);

			if(empty($check_record_exists)){

				$insert_arr = array("category_id" => $category_id, "sub_category_id" => $sub_category_id, "upload_data_id" => $upload_data_id, "users_id" => $users_id);
				$result = $this->upload_data_model->insert_seen($insert_arr);

				if($result){
					$this->response['code'] = 200;
					$this->response['message'] = "Uploaded Data seen";
					$this->response['data'] = new stdClass;
				}
			}

			$this->sendResponse();

		}else{
			
			$this->response['code'] = 200;
			$this->response['message'] = $message;
			$this->response['data'] = new stdClass;
		}
		
		$this->sendResponse();
		
	}

	
	public function add_comment(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		
		$token = isset($data_token['token']) ? $data_token['token'] : $data_token['Token'];
		if($token==""){
			$flag = false;
			$this->error = array("message" => "Please enter Access Token");
			$message = "Please enter Access Token";
		}

		$upload_data_id = isset($data['upload_data_id']) ? $data['upload_data_id'] : "";
		if($upload_data_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter Upload Data ID");
			$message = "Please enter Upload Data ID";
		}

		$users_name = isset($data['users_name']) ? $data['users_name'] : "";
		if($users_name==""){

			$flag = false;
			$this->error = array("message" => "Please enter User Name");
			$message = "Please enter User Name";
		}

		$users_email = isset($data['users_email']) ? $data['users_email'] : "";
		if($users_email==""){

			$flag = false;
			$this->error = array("message" => "Please enter User E-mail");
			$message = "Please enter User E-mail";
		}

		$comment = isset($data['comment']) ? $data['comment'] : "";
		if($comment==""){

			$flag = false;
			$this->error = array("message" => "Please enter Comment");
			$message = "Please enter Comment";
		}

		if($flag){

			$insertData = array();
			$insertData['upload_data_id'] = $upload_data_id;
			$insertData['users_name'] = $users_name;
			$insertData['users_email'] = $users_email;
			$insertData['comment'] = $comment;
			$insertData['comments_dt'] = date('Y-m-d H:i:s');
			$insertData['is_approved'] = '0';
			
			$affected_rows = $this->upload_data_model->_insert($insertData, 'comments');
			
			if($affected_rows > 0){

				$this->response['code'] = 200;
				$this->response['message'] = "Comment has been saved successfully!! It will be shown once it is approved from Admin!!";
				$this->response['data'] = new stdClass;
			}else{

				$this->response['code'] = 200;
				$this->response['message'] = "Error occurred while saving Comment. Please try again later!!";
				$this->error['message']= array("message" => "");
			}
			
		}else{
			$this->response['code'] = 404;
			$this->response['message'] = $message;
		}
		
		$this->sendResponse();
	}



	public function get_details_of_upload_data(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		
		$token = "";
		$token = isset($data_token['token']) ? $data_token['token'] : $data_token['Token'];
		$upload_data_id = isset($data['upload_data_id']) ? $data['upload_data_id'] : "";
		/*$category_id = isset($data['category_id']) ? $data['category_id'] : "";
		$sub_category_id = isset($data['sub_category_id']) ? $data['sub_category_id'] : "";
		$tags = isset($data['tags']) ? $data['tags'] : "";*/

		/*if($category_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter category id");
			$message = "Please enter category id ";
		}*/

		// if($sub_category_id==""){

		// 	$flag = false;
		// 	$this->error = array("message" => "Please enter sub category id");
		// 	$message = "Please enter sub category id ";
		// }

		$where_user = array("u.access_token" => $token,"u.is_active" => "1");
		$result_data = $this->login_model->user_login($where_user);
		
		$user_type = $result_data[0]['users_type'];

		if($flag){

			if($upload_data_id!=""){
				$where = array("ud.upload_data_id" => $upload_data_id,"ud.is_active" =>"1");	
			}
			
			$result_data = $this->upload_data_model->get_upload_data($where,$tags='',$user_type);
			
			$result_arr = array();
			foreach ($result_data as $key => $value) {
				$result_arr[$key] = new stdClass;
				$result_arr[$key]->upload_data_id = $value->upload_data_id;
				$result_arr[$key]->upload_title = $value->upload_title ;
				//$result_arr[$key]->upload_type = $value->upload_type ;
				$result_arr[$key]->video_type = $value->video_type ;
				$result_arr[$key]->upload_for_user_type = $value->upload_for_user_type_for_data ;
				$result_arr[$key]->short_description = $value->short_description ;
				$temp = str_replace('\r\n', "", $value->upload_description);
				$temp = str_replace('\r', "", $temp);
				$temp = str_replace('\n', "", $temp);
				$temp = stripslashes($temp);
				
				$result_arr[$key]->upload_description = $temp;
				$result_arr[$key]->category_id = $value->category_id ;
				$result_arr[$key]->sub_category_id = $value->sub_category_id ;
				$result_arr[$key]->upload_path = $this->upload_data_model->get_file_path($value->upload_path,$value->upload_type,$value->sub_category_id);
				
				if($value->category_id == 5 || $value->category_id == 9){
					if($value->upload_type == 'text'){
						$result_arr[$key]->upload_path = '';
					}
						$result_arr[$key]->upload_type = 'word';	
				}else{
					$result_arr[$key]->upload_type = $value->upload_type ;
				}


	            $result_arr[$key]->thumbnail = $this->upload_data_model->get_thumbnail_image_path($value->thumbnail,$this->config->item('posts_thumbnail_path').$value->sub_category_id.'/',$value->sub_category_id);
				$result_arr[$key]->icon_path = get_icon_path($value->upload_for_user_type) ;
				$result_arr[$key]->tags = $value->tags ;
				$result_arr[$key]->sub_category_name = $value->sub_category_name ;
				$result_arr[$key]->sub_category_image = get_sub_category_image_path($value->sub_category_image) ;
				$result_arr[$key]->added_date_time = date("d M Y", strtotime($value->added_date_time));
				$result_arr[$key]->uploaded_ago = get_uploaded_time_ago($value->added_date_time) ;
				$result_arr[$key]->youtube_video_id = $value->youtube_video_id;
				$result_arr[$key]->view_count = $value->view_count;
				$result_arr[$key]->contributors_name = $value->contributors_name;

				$comment_arr = $this->upload_data_model->get_upload_data_comments(['ud.upload_data_id' => $value->upload_data_id]);

				$result_arr[$key]->comment_count = count($comment_arr);
				$result_arr[$key]->comment_arr = $comment_arr;
			}
			//echo $this->db->last_query();exit;
			if(!empty($result_data)){
				
				$this->response['code'] = 200;
				$this->response['message'] = "Data has been retreived successfully!!";
				$this->response['data'] = $result_arr;
			}else{
				$this->response['code'] = 200;
				$this->response['message'] = "Data has not been uploaded for given id!!!";
				
			}
			$this->sendResponse();
		}else{
			
			$this->response['code'] = 404;
			$this->response['message'] = $message;
			$this->error = $message;
		}
		
		$this->sendResponse();
	}

	public function get_notifications_lists(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		
		$token = "";
		$token = isset($data_token['token']) ? $data_token['token'] : $data_token['Token'];

		$where_user = array("u.access_token" => $token,"u.is_active" => "1");
		$result_data = $this->login_model->user_login($where_user);
		
		$device_id = $result_data[0]['device_id'];
		$users_id = $result_data[0]['users_id'];

		if($flag){

		$result_data = $this->upload_data_model->get_notifications(['register_id' => $device_id,'insert_user_id' => $users_id]);

		$result_arr = array();
			foreach ($result_data as $key => $value) {
		
				$where = array("ud.upload_data_id" => $value->upload_data_id,"ud.is_active" =>"1");
				
				$this->db->select("*");
    			$this->db->from("upload_data ud");
    			$this->db->where($where);
    			$query = $this->db->get();
    			$result_data1 = $query->result();
	
				//$result_data1 = $this->upload_data_model->get_upload_data($where);
				$result_arr[$key] = new stdClass;
		
				$result_arr[$key]->notification_id = $value->notification_id;
				$result_arr[$key]->upload_data_id  = $value->upload_data_id;
				$result_arr[$key]->upload_type     = $value->upload_type;
//print_r($result_data1[0]->category_id);exit;
				
				$result_arr[$key]->upload_path =$value->upload_path;
				if(!empty($result_data1[0])){
					if($result_data1[0]->category_id == 5 || $result_data1[0]->category_id == 9){
						if($value->upload_type == 'text'){
							$result_arr[$key]->upload_path = '';
						}
							$result_arr[$key]->upload_type = 'word';	
					}else{
						$result_arr[$key]->upload_type = $value->upload_type ;
					}
					
				}
				$result_arr[$key]->video_type      = $value->video_type;
				$result_arr[$key]->upload_for_user_type = $value->upload_for_user_type;
				$result_arr[$key]->youtube_video_id = $value->youtube_video_id;
				$result_arr[$key]->title = $value->title;
				$result_arr[$key]->desc = $value->desc;
				$result_arr[$key]->insert_user_id = $value->insert_user_id;
				$result_arr[$key]->insert_dt = $value->insert_dt;
				$result_arr[$key]->view_count = $value->view_count;
				$comment_arr = $this->upload_data_model->get_upload_data_comments(['ud.upload_data_id' => $value->upload_data_id]);
				$result_arr[$key]->comment_count = count($comment_arr);
				$result_arr[$key]->contributors_name = $value->contributors_name;
		}

		if(!empty($result_data)){
				
				$this->response['code'] = 200;
				$this->response['message'] = "Data has been retreived successfully!!";
				$this->response['data'] = $result_arr;
			}else{
				$this->response['code'] = 200;
				$this->response['message'] = "Data has not been uploaded for given id!!!";
				
			}
			$this->sendResponse();
		}else{
			
			$this->response['code'] = 404;
			$this->response['message'] = $message;
			$this->error = $message;
		}
		
		$this->sendResponse();
	}
}
