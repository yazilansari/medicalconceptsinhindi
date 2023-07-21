<?php
class Login extends MY_Controller {
	public $data = array();
	function __construct() {
		parent::__construct();
		$this->data = $this->input->post();
		$this->load->model('login_model');
		$this->load->model('common_model');
		$this->load->helper('common_helper');
	}
	
	/**
	 * @api {post} /login/user_login User Login
	 * @apiName user_login
	 * @apiGroup Login
	 *
	 * @apiParam {String{1..149}} username User Name.
	 * @apiParam {String{1..15}} password Password
	 * @apiParam {String{1..149}} os Device OS
	 * @apiParam {String{1..149}} os_version Device OS Version
	 * @apiParam {String{1..149}} app_version App Version
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  User Data Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
			    "code": 200,
			    "message": "User has logged in successfully.",
			    "data": {
			        "users_id": "1",
			        "users_name": "pratik",
			        "users_type": "General",
			        "number": "1212121212",
			        "email_id": "ajhd@gmail.com",
			        "student_qualification": "",
			        "medical_college": "",
			        "added_date_time": "2018-05-08 19:00:51",
			        "is_active": "1",
			        "access_token": "Ka0AHJpUsoyaYpWoYYJG2z0a3MnuOyVx1525841523",
			        "os": "ad",
			        "os_version": "ads",
			        "app_version": "ada"
			    },
			    "error": "",
			    "latest_version": []
			}
	*
	*/
	
	public function user_login(){
		
		$data = $this->input_data;
		$flag = true;
		$message = "";

		$username = $data['username'];
		$password = $data['password'];
		$os_type = $data['os'];
		$os_version = $data['os_version'];
		$app_version = $data['app_version'];

		if($username==""){

			$flag = false;
			$this->error = array("message" => "Please enter username");
			$message = "Please enter username";
			
			
		}else if($password==""){

			$flag = false;
			$this->error = array("message" => "Please enter password");
			$message = "Please enter password";
			
		}else if(strlen($password) > 15){

			$flag = false;
			$this->error = array("message" => "Password should not contain more than 15 characters");
			$message = "Password should not contain more than 15 characters";
		}else if($os_type==""){

			$flag = false;
			$this->error = array("message" => "Please enter Device OS");
			$message = "Please enter Device OS";
		}else if($os_version==""){
			
			$flag = false;
			$this->error = array("message" => "Please enter Device OS Version");
			$message = "Please enter Device OS Version";
		}else if($app_version==""){
			
			$flag = false;
			$this->error = array("message" => "Please enter App Version");
			$message = "Please enter App Version";
		}

		if($flag){

			$where = array("email_id" => $username,"number" => $password);
			$result_data = $this->login_model->user_login($where);


			if(!empty($result_data)){

				$result = $result_data[0];
				$users_id = $result['users_id'];
				$users_type = $result['users_type'];
				
				$access_token = token().round(microtime(true));

				$update_token = $this->login_model->update_access_token($users_id , $access_token);

				if($update_token){

					$insert_arr = array();
					$insert_arr['users_id'] = $users_id;
					$insert_arr['users_type'] = $users_type;
					$insert_arr['os'] = $os_type;
					$insert_arr['os_version'] = $os_version;
					$insert_arr['app_version'] = $app_version;

					$insert_result = $this->common_model->insert_data_query("user_history",$insert_arr);

					$where = array("u.access_token" => $access_token,"u.is_active" => "1");
					$result_data = $this->login_model->user_login($where);
					
					$where_arr = array("users_id" => $result_data[0]->users_id);
					$result_data_history = $this->login_model->get_user_history($where_arr);

					$result_data[0]['os'] = $result_data_history[0]['os'];
					$result_data[0]['os_version'] = $result_data_history[0]['os_version'];
					$result_data[0]['app_version'] = $result_data_history[0]['app_version'];

					$this->response['code'] = 200;
					$this->response['message'] = "User has logged in successfully.";
					$this->response['data'] = $result_data[0];
				}else{
					$this->response['code'] = 400;
					$this->response['message'] = "Access Token genereation error";
					$this->error['message']= array("message" => "Access Token genereation error");
				}

			}else{
				$this->response['code'] = 200;
				$this->response['message'] = "Invalid Username or Password!!";
				$this->error['message']= array("message" => "Invalid Username or Password!!");
			}
				
			//$this->sendResponse();
		}else{
			
			$this->response['code'] = 404;
			$this->response['message'] = $message;
		}
		
		$this->sendResponse();
		//echo json_encode($result, JSON_UNESCAPED_UNICODE);
		
	}
	
	/**
	 * @api {post} /login/register User Register
	 * @apiName register
	 * @apiGroup Login
	 *
	 * @apiParam {String{1..149}} number User Number.
	 * @apiParam {String{1..149}} [user_type="general,student"] User Type.
	 * @apiParam {String{1..15}} email_id Email ID.
	 * @apiParam {String{1..149}} users_name Users Name
	 * @apiParam {String{1..149}} qualification Student Qualification
	 * @apiParam {String{1..149}} medical_college Medical College
	 * @apiParam {String{1..149}} users_name Users Name
	 * @apiParam {String{1..149}} os Device OS.
	 * @apiParam {String{1..149}} os_version Device OS Version.
	 * @apiParam {String{1..149}} app_version App Version.
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  User Data Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
			    "code": 200,
			    "message": "User has logged in successfully.",
			    "data": {
			        "users_id": "1",
			        "users_name": "pratik",
			        "users_type": "General",
			        "number": "1212121212",
			        "email_id": "ajhd@gmail.com",
			        "student_qualification": "",
			        "medical_college": "",
			        "added_date_time": "2018-05-08 19:00:51",
			        "is_active": "1",
			        "access_token": "Ka0AHJpUsoyaYpWoYYJG2z0a3MnuOyVx1525841523",
			        "os": "ad",
			        "os_version": "ads",
			        "app_version": "ada"
			    },
			    "error": "",
			    "latest_version": []
			}
	*
	*/
	public function register(){


		$data = $this->input_data;
		$flag = true;
		$message = "";

		$user_type 		= isset($data['user_type']) ? $data['user_type'] : "";
		$number 		= isset($data['number']) ? $data['number'] : "";
		$users_name 	= isset($data['users_name']) ? $data['users_name'] : "";
		$email_id 		= isset($data['email_id']) ? $data['email_id'] : "";
		$qualification 	= isset($data['qualification']) ? $data['qualification'] : "";
		$city 			= isset($data['city']) ? $data['city'] : "";
		$medical_college= isset($data['medical_college']) ? $data['medical_college'] : "";
		$os_type 		= isset($data['os']) ? $data['os'] : "";
		$os_version 	= isset($data['os_version']) ? $data['os_version'] : "";
		$app_version 	= isset($data['app_version']) ? $data['app_version'] : "";
		$device_id 	    = isset($data['device_id']) ? $data['device_id'] : "";
		$device_type 	= isset($data['device_type']) ? $data['device_type'] : NULL;
		$reference 	    = isset($data['reference']) ? $data['reference'] : "";


		if($user_type==""){

			$flag = false;
			$this->error = array("message" => "Please enter User Type");
			$message = "Please enter User Type";
			
		}

		if($user_type!="" && (strtolower($user_type)!="general" && strtolower($user_type)!="student")){

			$flag = false;
			$this->error = array("message" => "Please enter valid User Type");
			$message = "Please enter valid User Type";
			
		}

		if($number==""){

			$flag = false;
			$this->error = array("message" => "Please enter Mobile Number");
			$message = "Please enter Mobile Number";
		}

		if(is_numeric($number)==""){

			$flag = false;
			$this->error = array("message" => "Please enter valid Mobile Number");
			$message = "Please enter valid Mobile Number";
		}

		if(strlen($number)<10){

			$flag = false;
			$this->error = array("message" => "Please enter valid Mobile Number");
			$message = "Please enter valid Mobile Number";
		}


		if($email_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter Email ID");
			$message = "Please enter Email ID";
		}

		if($users_name==""){

			$flag = false;
			$this->error = array("message" => "Please enter Users Name");
			$message = "Please enter Users Name";
		}

		/*if(!filter_var($email_id, FILTER_VALIDATE_EMAIL)){

			$flag = false;
			$this->error = array("message" => "Please enter valid Email ID");
			$message = "Please enter valid Email ID";
		}*/
		$result_data_arr = array();
		if($flag){

			$where = array("number" => $number,"email_id" => $email_id);
			$result_data = $this->login_model->register($where);


			if(empty($result_data)){

				$insert_arr = array();
				$insert_arr['users_type'] = $user_type;
				$insert_arr['number'] = $number;
				$insert_arr['email_id'] = $email_id;
				$insert_arr['users_name'] = $users_name;
				$insert_arr['device_id'] = $device_id;
				$insert_arr['device_type'] = $device_type;
				$insert_arr['reference'] = $reference;

				if(strtolower($user_type)=="student"){

					if($qualification==""){

						$flag = false;
						$this->error = array("message" => "Please enter Student Qualification");
						$message = "Please enter Student Qualification";

						$this->response['code'] = 200;
						$this->response['message'] = $message;
						$this->response['data'] = new stdClass;					
						//$this->sendResponse();

					}else{
						$insert_arr['student_qualification'] = $qualification;						
					}

					/*if($city==""){

						$flag = false;
						$this->error = array("message" => "Please enter City");
						$message = "Please enter City";

						$this->response['code'] = 200;
						$this->response['message'] = $message;
						$this->response['data'] = new stdClass;					
						$this->sendResponse();

					}else{
						$insert_arr['city'] = $city;
					}*/

					if($medical_college==""){

						$flag = false;
						$this->error = array("message" => "Please enter Medical College");
						$message = "Please enter Medical College";

						$this->response['code'] = 200;
						$this->response['message'] = $message;
						$this->response['data'] = new stdClass;					
						//$this->sendResponse();

					}else{
						$insert_arr['medical_college'] = $medical_college;
					}
				}

				if($flag){
					$insert_result = $this->common_model->insert_data_query("users",$insert_arr);

//var_dump($result_data);exit;
					if($insert_result){

						$access_token = token().round(microtime(true));

						$update_token = $this->login_model->update_access_token($insert_result , $access_token);

						$insert_arr = array();
						$insert_arr['users_id'] = $insert_result;
						$insert_arr['users_type'] = $user_type;
						$insert_arr['os'] = $os_type;
						$insert_arr['os_version'] = $os_version;
						$insert_arr['app_version'] = $app_version;
						$insert_arr['device_id'] = $device_id;
						$insert_arr['device_type'] = $device_type;
						$insert_arr['reference'] = $reference;


						$insert_result = $this->common_model->insert_data_query("user_history",$insert_arr);

						$where = array("u.access_token" => $access_token,"u.is_active" => "1");
						$result_data = $this->login_model->user_login($where);
						
						$where_arr = array("users_id" => $result_data[0]['users_id']);
						$result_data_history = $this->login_model->get_user_history($where_arr);

						$result_data[0]['os'] = $result_data_history[0]['os'];
						$result_data[0]['os_version'] = $result_data_history[0]['os_version'];
						$result_data[0]['app_version'] = $result_data_history[0]['app_version'];
						$result_data[0]['device_id'] = $result_data_history[0]['device_id'];
						$result_data[0]['device_type'] = $result_data_history[0]['device_type'];

						$this->response['code'] = 200;
						$this->response['message'] = "User has been registered successfully!!";
						$this->response['data'] = $result_data[0];
					}else{
						$this->response['code'] = 400;
						$this->response['message'] = "Error occurred while registering user. Please try again later!!";
						$this->response['data'] = new stdClass;
						$this->error= array("message" => "Error occurred while registering user. Please try again later!!");
						
					}
				} 
				$this->sendResponse();

			}else{
				//var_dump('expression');exit;
				$access_token = token().round(microtime(true));

				$update_token = $this->login_model->update_access_token($result_data[0]['users_id'] , $access_token,$device_id,$device_type);

				$update_user_type = $this->login_model->update_user_type($access_token , $user_type);

				if(strtolower($user_type)=="student"){

					if($qualification==""){

						$flag = false;
						$this->error = array("message" => "Please enter Student Qualification");
						$message = "Please enter Student Qualification";

						$this->response['code'] = 200;
						$this->response['message'] = $message;
						$this->response['data'] = new stdClass;					
						//$this->sendResponse();

					}

					/*if($city==""){

						$flag = false;
						$this->error = array("message" => "Please enter City");
						$message = "Please enter City";

						$this->response['code'] = 200;
						$this->response['message'] = $message;
						$this->response['data'] = new stdClass;					
						$this->sendResponse();

					}else{
						$insert_arr['city'] = $city;
					}*/

					if($medical_college==""){

						$flag = false;
						$this->error = array("message" => "Please enter Medical College");
						$message = "Please enter Medical College";

						$this->response['code'] = 200;
						$this->response['message'] = $message;
						$this->response['data'] = new stdClass;					
						//$this->sendResponse();

					}
				}

				if($flag){


					if(strtolower($user_type)=='student'){
						$update_user_data = $this->login_model->_update(['access_token' => $access_token],['student_qualification' => $qualification, 'medical_college' => $medical_college, 'users_name' => $users_name,'device_id' => $device_id,'reference'=>$reference],'users');
					}else{
						$update_user_data = $this->login_model->_update(['access_token' => $access_token],['users_name' => $users_name,'device_id' => $device_id,'reference'=>$reference],'users');
					}
//var_dump($device_id);exit;

					$insert_arr = array();
					$insert_arr['users_id'] = $result_data[0]['users_id'];
					$insert_arr['users_type'] = $user_type;
					$insert_arr['os'] = $os_type;
					$insert_arr['os_version'] = $os_version;
					$insert_arr['app_version'] = $app_version;
					$insert_arr['device_id'] = $device_id;
					$insert_arr['device_type'] = $device_type;
				    $insert_arr['reference'] = $reference;


					$insert_result = $this->common_model->insert_data_query("user_history",$insert_arr);

					$where = array("u.access_token" => $access_token,"u.is_active" => "1");
					$result_data = $this->login_model->user_login($where);
					
					$where_arr = array("users_id" => $result_data[0]['users_id']);
					$result_data_history = $this->login_model->get_user_history($where_arr);

					$result_data[0]['os'] = $result_data_history[0]['os'];
					$result_data[0]['os_version'] = $result_data_history[0]['os_version'];
					$result_data[0]['app_version'] = $result_data_history[0]['app_version'];
					$result_data[0]['device_id'] = $device_id;
					$result_data[0]['device_type'] = $result_data_history[0]['device_type'];

					$this->response['code'] = 200;
					$this->response['message'] = "User has been registered successfully!!";
					$this->response['data'] = $result_data[0];
				} 
				$this->sendResponse();
			}
				
			//$this->sendResponse();
		}else{
			
			$this->response['code'] = 200;
			$this->response['message'] = $message;
			$this->response['data'] = new stdClass;
		}
		
		$this->sendResponse();
	}


	/**
	 * @api {post} /login/get_contributors Get Contributors
	 * @apiName get_contributors
	 * @apiGroup Contributors
	 *
	 * @apiParam {String{1..149}} token user Token.
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  Contributors Data Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
			    "code": 200,
			    "message": "Contributors List retreived successfully!!",
			    "data": [
			        {
			            "contributors_id": "1",
			            "contributors_name": "Manthan SHAH",
			            "contributors_designation": "TL",
			            "contributors_image": "http://localhost/chikitsa_shastra/assets/uploaded_data/contributors_data/Image_5ac856ad525e2-1526035533.jpg",
			            "contributors_data": "asdasdasdasddddddddddddddasdadad"
			        },
			        {
			            "contributors_id": "2",
			            "contributors_name": "Prajakta Panchal",
			            "contributors_designation": "Sr PHP developer",
			            "contributors_image": "http://localhost/chikitsa_shastra/assets/uploaded_data/contributors_data/Image_5ac856ad525e2-1526038710.jpg",
			            "contributors_data": "sdfasssfsdafsdf"
			        },
			        {
			            "contributors_id": "3",
			            "contributors_name": "Pratik K",
			            "contributors_designation": "PHP Develeoper",
			            "contributors_image": "http://localhost/chikitsa_shastra/assets/uploaded_data/contributors_data/Image_5ac856ad525e2-1526038726.jpg",
			            "contributors_data": "adfasdfsfsf"
			        }
			    ],
			    "error": "",
			    "latest_version": []
			}
	*
	*/
	public function get_contributors(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		
		$token = "";
		
		$token = isset($data_token['token']) ? isset($data_token['Token']) : "";

		if($flag){

			$where = array("c.is_active" => "1");
			$result_data = $this->login_model->get_contributors_list($where);

			$result_arr = array();
			foreach ($result_data as $key => $value) {
				
				$result_arr[$key]['contributors_id'] = $value->contributors_id;
				$result_arr[$key]['contributors_name'] = $value->contributors_name;
				$result_arr[$key]['contributors_designation'] = $value->contributors_designation;
				$result_arr[$key]['contributors_image'] ='https://www.medicalconceptsinhindi.com/uploads/assets/uploaded_data/contributors_img/'.$value->contributors_image; /*get_contributors_image_path($value->contributors_image);*/

				$temp = str_replace('\r\n', "", $value->contributors_data);
				$temp = str_replace('\r', "", $temp);
				$temp = str_replace('\n', "", $temp);
				$temp = stripslashes($temp);

				$result_arr[$key]['contributors_data'] = $temp;
			}

			if(!empty($result_data)){

				$this->response['code'] = 200;
				$this->response['message'] = "Contributors List retreived successfully!!";
				$this->response['data'] = $result_arr;
			}else{

				$this->response['code'] = 200;
				$this->response['message'] = "No Contributors Found!!";
				$this->error['message']= array("message" => "");
			}
			
		}else{
			$this->response['code'] = 404;
			$this->response['message'] = $message;
		}
		
		$this->sendResponse();
	}

	/**
	 * @api {post} /login/contributors_details Contributors Details
	 * @apiName contributors_details
	 * @apiGroup Contributors
	 *
	 * @apiParam {String{1..149}} token user Token.
	 * @apiParam {Number{1..11}} contributors_id Contributors ID.
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  Contributors Data Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
			    "code": 200,
			    "message": "Contributors Details retreived successfully!!",
			    "data": {
			        "contributors_id": "3",
			        "contributors_name": "Pratik K",
			        "contributors_designation": "PHP Develeoper",
			        "contributors_image": "http://localhost/chikitsa_shastra/assets/uploaded_data/contributors_data/Image_5ac856ad525e2-1526038726.jpg",
			        "contributors_data": "adfasdfsfsf"
			    },
			    "error": "",
			    "latest_version": []
			}
	*
	*/
	public function contributors_details(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		
		$token = "";
		
		$token = isset($data_token['token']) ? isset($data_token['Token']) : "";

		$contributors_id = isset($data['contributors_id']) ? $data['contributors_id'] : "";

		if($contributors_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter contributors_id");
			$message = "Please enter contributors_id";
		}

		if($flag){

			$where = array("c.is_active" => "1", "c.contributors_id" => $contributors_id);
			$result_data = $this->login_model->get_contributors_list($where);
			$result_data = $result_data[0];

			$result_arr = array();
				
			$result_arr['contributors_id'] = $result_data->contributors_id;
			$result_arr['contributors_name'] = $result_data->contributors_name;
			$result_arr['contributors_designation'] = $result_data->contributors_designation;
			$result_arr['contributors_image'] = "https://www.medicalconceptsinhindi.com/uploads/assets/uploaded_data/contributors_img/".$result_data->contributors_image;

			$temp = str_replace('\r\n', "", $result_data->contributors_data);
				$temp = str_replace('\r', "", $temp);
				$temp = str_replace('\n', "", $temp);
				$temp = stripslashes($temp);
			$result_arr['contributors_data'] = $temp;
			

			if(!empty($result_data)){

				$this->response['code'] = 200;
				$this->response['message'] = "Contributors Details retreived successfully!!";
				$this->response['data'] = $result_arr;
			}else{

				$this->response['code'] = 200;
				$this->response['message'] = "No Contributors Found!!";
				$this->error['message']= array("message" => "");
			}
			
		}else{
			$this->response['code'] = 404;
			$this->response['message'] = $message;
		}
		
		$this->sendResponse();
	}

		/**
	 * @api {post} /login/get_app_vision Get App Vision
	 * @apiName get_app_vision
	 * @apiGroup App Vision
	 *
	 * @apiParam {String{1..149}} token user Token.
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  App Vision Data Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
			    "code": 200,
			    "message": "App Vision retreived successfully!!",
			    "data": {
			        "app_vision_id": "1",
			        "app_vision": "<p>ABCDEGHIJKLMNOPQRSTUVWXYZ</p>",
			        "is_active": "1",
			        "added_date_time": "2018-07-30 14:35:20"
			    },
			    "error": "",
			    "latest_version": {
			        "ios": "1.4",
			        "android": "1.6"
			    }
			}
	*
	*/
	public function get_app_vision(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		
		$token = "";
		
		$token = isset($data_token['token']) ? isset($data_token['Token']) : "";

		if($flag){

			$where = array("app.is_active" => "1");
			$result_data = $this->login_model->get_app_vision($where);

			$temp = str_replace('\r\n', "", $result_data[0]->app_vision);
			$temp = str_replace('\r', "", $temp);
        	$temp = str_replace('\n', "", $temp);
            $temp = stripslashes($temp);

			$result_arr = array();
			$result_arr['app_vision_id'] = $result_data[0]->app_vision_id;
			$result_arr['app_vision'] = $temp;
			$result_arr['is_active'] = $result_data[0]->is_active;
			$result_arr['added_date_time'] = $result_data[0]->added_date_time;
			$result_arr['email'] = 'drpankaj.endo@gmail.com';
			$result_arr['doc_mobile'] = '9810125568';

			
			if(!empty($result_data)){

				$this->response['code'] = 200;
				$this->response['message'] = "App Vision retreived successfully!!";
				$this->response['data'] = $result_arr;
			}else{

				$this->response['code'] = 200;
				$this->response['message'] = "No App Vision Found!!";
				$this->error['message']= array("message" => "");
			}
			
		}else{
			$this->response['code'] = 404;
			$this->response['message'] = $message;
		}
		
		$this->sendResponse();
	}
}
