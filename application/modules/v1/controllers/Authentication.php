<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';
//echo $a= APPPATH . '/libraries/REST_Controller.php';


class Authentication extends REST_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('User_login');

        //this is form validation library
        $this->load->library('form_validation');

        /*load helper*/
		$this->load->helper('send_sms_helper');
    }
    
    public function login_validation_post() {
    	$response = array();
    	$this->form_validation->set_rules('mobileno', 'Number', 'required|trim|max_length[10]|min_length[10]');
        
        if ($this->form_validation->run() == true){
        	$number = $this->input->post('mobileno', TRUE);
        	$otp = rand(100000,999999);
        	$otp1=$otp;
        	if (sendsms($number, $otp)) {
        		$otp = $this->User_login->getuserinfo($number, $otp);
        		if ($otp) {
        			
        			//Update otp in database
        			$this->User_login->update_user_otp_get_details($number,$otp1);
        			
                    $this->response(array(
                        "message" => "OTP successfully send",
                        "status" => "1"
                        ), REST_Controller::HTTP_OK);
                }else{
                    $this->response(array(
                    "message" => "Bad Request",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST);  
                }
        		
        	}else{
        		$this->response(array(
	        		"message" => "OTP not send",
	        		"status" => "0"
	        		), REST_Controller::HTTP_BAD_REQUEST); 	
        	}

        }else{
        	$this->response(array(
        		"message" => form_error('mobileno', ''),
        		"status" => "0"
        		), REST_Controller::HTTP_BAD_REQUEST); 
        }
        echo json_encode($response);
    }
    
    public function login_post() {
        $number1 = strip_tags($this->input->post('mobileno', TRUE));
		$password = $this->input->post('password', TRUE);
		$user = $this->User_login->check_otp_verify($number1, $password);
        
            if ($user) {
                foreach ($user as $value) {
                    $user_data = array(
                        "user_id" => $value['users_id'],
                        "username" => $value['users_name'],
                        "user_number" => $value['number'],
                        "email" => $value['email_id'],
                        "user_type" => $value['users_type'],
						"student_qualification" => $value['student_qualification'],
						"medical_college" => $value['medical_college'],
						"access_token" => $value['access_token']
                        );
                        
                        
                        $this->response([
                        'status' => "1",
                        'message' => 'Successfully Login.',
                        'data' => $user_data
                        ], REST_Controller::HTTP_OK);

                }
                
            }else{
                $this->response(array(
				"message" => "Invalid Mobile or Password",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST);
            }
    	
    	echo json_encode($response);
    }
    
    public function update_profile_post() {
        $user_id = $this->input->post('user_id');
        $users_name = $this->input->post('users_name', TRUE);
        $email_id = $this->input->post('email_id', TRUE);
        $qualification = $this->input->post('qualification', TRUE);
        $medical_college = $this->input->post('medical_college', TRUE);
        
        
        $response = array();
        
        
        if (!empty($user_id) && !empty($users_name)){
            
            $update = $this->User_login->getuserupdate($user_id, $users_name, $email_id, $qualification, $medical_college);
           
            
            if ($update) {
                foreach ($update as $value) {
                    $user_data = array(
                        "user_id" => $value['users_id'],
                        "username" => $value['users_name'],
                        "user_number" => $value['number'],
                        "email" => $value['email_id'],
                        "user_type" => $value['users_type'],
						"student_qualification" => $value['student_qualification'],
						"medical_college" => $value['medical_college'],
						"access_token" => $value['access_token']
                        );
                        
                        
                        $this->response([
                        'status' => "1",
                        'message' => 'Profile Updated successfully.',
                        'data' => $user_data
                        ], REST_Controller::HTTP_OK);

                }
                
            }else{
                $this->response(array(
				"message" => "Error occor, Try again later!!!",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST);
            }

        }else{
            $this->response(array(
                "message" => "Some fields are missing!!!",
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }
        echo json_encode($response);
    }

    // DRIVER SECTION *****************
    /*this function for driver*/

    public function driver_live_info_post(){

        $response = array();
        $this->form_validation->set_rules('vahicle_type', 'vahicle type', 'required|trim');
        $this->form_validation->set_rules('capacity', 'Capacity', 'required|trim');
        $this->form_validation->set_rules('longitude', 'longitude', 'required|trim');
        $this->form_validation->set_rules('latitude', 'latitude', 'required|trim');
        $this->form_validation->set_rules('distance', 'distance', 'required|trim');
        $this->form_validation->set_rules('price', 'price', 'required|trim');
        
        if ($this->form_validation->run() == true){
            $vahicle_type = $this->input->post('vahicle_type', TRUE);
            $capacity = $this->input->post('capacity', TRUE);
            $longitude = $this->input->post('longitude', TRUE);
            $latitude = $this->input->post('latitude', TRUE);
            $distance = $this->input->post('distance', TRUE);
            $price = $this->input->post('price', TRUE);
            $user_id = $this->input->post('user_id', TRUE);

            $load = $this->input->post('load', TRUE);

            $item_name = $this->input->post('item_name', TRUE);
            $metal_category = $this->input->post('metal_category', TRUE);

            if ($load=='true') {
                if (!empty($item_name) && !empty($metal_category)) {
                
                    $live_details = $this->User_login->driverlivedetailswithload_model($user_id, $vahicle_type, $capacity, $longitude, $latitude, $distance, $price, $item_name, $metal_category);
                    if (empty($live_details['msg'])) {
                        $this->response(array(
                            "message" => "Successfully Inserted",
                            "status" => "1",
                            'data' => $live_details
                            ), REST_Controller::HTTP_OK);
                    }else{
                        $this->response(array(
                            "message" => $live_details['msg'],
                            "status" => "0"
                            ), REST_Controller::HTTP_BAD_REQUEST);
                    }
                }else{
                    $this->response(array(
                        "message" => "Enter item name and metal category",
                        "status" => "0"
                        ), REST_Controller::HTTP_BAD_REQUEST); 
                }
            }else{

                $live_details = $this->User_login->driverlivedetails_model($user_id, $vahicle_type, $capacity, $longitude, $latitude, $distance, $price);
                if (empty($live_details['msg'])) {
                    $this->response(array(
                        "message" => "Successfully Inserted",
                        "status" => "1",
                        'data' => $live_details
                        ), REST_Controller::HTTP_OK);
                }else{
                    $this->response(array(
                        "message" => $live_details['msg'],
                        "status" => "0"
                        ), REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            $this->response(array(
                "message" => form_error('vahicle_type', ''),
                "message" => form_error('capacity', ''),
                "message" => form_error('longitude', ''),
                "message" => form_error('latitude', ''),
                "message" => form_error('distance', ''),
                "message" => form_error('price', ''),
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }
        echo json_encode($response);
    }



    //get driver live and done info

    public function get_driver_live_data_post(){
        $response = array();
        $id = $this->input->post('user_id');

        if (!empty($id)) {
            $live_details = $this->User_login->get_driver_live_and_done_record_model($id);
            if ($live_details) {
            	$live=$this->User_login->check_driver_status_model($id);
            	
                $this->response(array(
                        "message" => "Successfully fetching Data",
                        "status" => "1",
                        "live" => $live,
                        'data' => $live_details
                        ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "message" => "Live data not fetch",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response(array(
                "message" => "User id not selected",
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST);
        }
        echo json_encode($response);
    }

    // END DRIVER SECTION *****************



    // START BUYER SECTION *****************

    public function buyer_bid_post(){
        $response = array();
        $this->form_validation->set_rules('bid_price', 'Bid price', 'required|trim');
        
        if ($this->form_validation->run() == true){
            $bid_price = $this->input->post('bid_price', TRUE);
            $note = $this->input->post('note', TRUE);
            
            $user_id = $this->input->post('user_id', TRUE);
            $driver_live_id = $this->input->post('driver_live_id', TRUE);

            if (!empty($user_id) && !empty($driver_live_id)) {
                $buyer_bid_insert = $this->User_login->buyer_bid_model($user_id, $driver_live_id, $bid_price, $note);

                if (empty($buyer_bid_insert['msg'])) {
                    $this->response(array(
                        "message" => "Successfully Inserted",
                        "status" => "1",
                        'data' => $buyer_bid_insert
                        ), REST_Controller::HTTP_OK);
                }else{
                    $this->response(array(
                        "message" => $buyer_bid_insert['msg'],
                        "status" => "0"
                        ), REST_Controller::HTTP_BAD_REQUEST);
                }
            }else{
                $this->response(array(
                    "message" => "Please send user_id and driver_live_id",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
        }else{
            $this->response(array(
                "message" => form_error('bid_price', ''),
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }
        echo json_encode($response);
    }
    
    
    
    public function buyer_hire_post(){
        $response = array();
        $this->form_validation->set_rules('bid_price', 'Bid price', 'required|trim');
        
        if ($this->form_validation->run() == true){
            $bid_price = $this->input->post('bid_price', TRUE);
            $note = $this->input->post('note', TRUE);
            
            $user_id = $this->input->post('user_id', TRUE);
            $driver_live_id = $this->input->post('driver_live_id', TRUE);
            $date_time = $this->input->post('date_time', TRUE);

            if (!empty($user_id) && !empty($driver_live_id) && !empty($date_time)) {
                $buyer_bid_insert = $this->User_login->buyer_hire_model($user_id, $driver_live_id, $bid_price, $note, $date_time);

                if (empty($buyer_bid_insert['msg'])) {
                    $this->response(array(
                        "message" => "Successfully Inserted",
                        "status" => "1",
                        'data' => $buyer_bid_insert
                        ), REST_Controller::HTTP_OK);
                }else{
                    $this->response(array(
                        "message" => $buyer_bid_insert['msg'],
                        "status" => "0"
                        ), REST_Controller::HTTP_BAD_REQUEST);
                }
            }else{
                $this->response(array(
                    "message" => "Please send user_id and driver_live_id",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
        }else{
            $this->response(array(
                "message" => form_error('bid_price', ''),
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }
        echo json_encode($response);
    }

    //selected bid by driver
    public function selected_bid_post(){
        $response = array();
        $driver_id = $this->input->post('driver_id', TRUE);
        $seller_id = $this->input->post('seller_id', TRUE);
        $bid_id = $this->input->post('bid_id', TRUE);
        $action = $this->input->post('action', TRUE);
		$type = $this->input->post('type', TRUE);
		$job_id = $this->input->post('job_id', TRUE);

		if (!empty($driver_id) && !empty($seller_id) && !empty($bid_id)) {
			$selected_bid_by_driver = $this->User_login->selected_bid_model($driver_id, $seller_id, $bid_id,$action,$type,$job_id);

            if (empty($selected_bid_by_driver['msg'])) {
                $this->response(array(
                    "message" => "Successfully Inserted",
                    "status" => "1"
                    ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "message" => $selected_bid_by_driver['msg'],
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response(array(
                "message" => "Please select bid_name",
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }
        echo json_encode($response);
    }

    //get live list
    public function get_live_list_post(){
        $response = array();
        $lat = $this->input->post('lat', TRUE);
        $lng = $this->input->post('lng', TRUE);
        $distance = $this->input->post('distance', TRUE);
        if (!empty($lat) && !empty($lng) && !empty($distance)) {
            
            $live_data = $this->User_login->get_live_list_model($lat, $lng,$distance);
            if ($live_data) {
                
                $this->response(array(
                    "message" => "Successfully Fetch",
                    "status" => "1",
                    "live" => "0",
                    'data' => $live_data
                    ), REST_Controller::HTTP_OK);

            }else{
                $this->response(array(
                    "message" => "No data available",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }

        }else{
            $this->response(array(
                "message" => "Please select distance",
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }
     echo json_encode($response);   
    }

    //this function for update profile both user
    public function update_user_profile_post(){
        $response = array();

        $this->form_validation->set_rules('user_name', 'User Name', 'required|trim');
        $this->form_validation->set_rules('user_id', 'user id', 'required|trim|numeric');
        
        if ($this->form_validation->run() == true){

            $user_id = $this->input->post('user_id', TRUE);
            $live_data = $this->User_login->update_user_profile_model($user_id);
            if ($live_data) {
            	
            	foreach ($live_data as $value) {
                    $user_data = array(
                        "user_id" => $value['user_id'],
                        "username" => $value['user_name'],
                        "user_number" => $value['user_number'],
                        "email" => $value['email'],
                        "user_type" => $value['user_type']
                        );
                    
                    $this->response(array(
                    "message" => "Successfully Update",
                    "status" => "1",
                    'data' => $user_data
                    ), REST_Controller::HTTP_OK);

                }

                
            
            
            }else{
                $this->response(array(
                    "message" => "Not update",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
        }else{
            $this->response(array(
                "message" => form_error('user_name', ''),
                "message" => form_error('email', ''),
                "message" => form_error('user_id', ''),
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }

     echo json_encode($response);
    }


    //this function for get particular live user data like information for every data

    public function get_particular_user_live_data_post(){
        $response = array();
        $this->form_validation->set_rules('user_id', 'user id', 'required|trim|numeric');
        
        if ($this->form_validation->run() == true){

            $user_id = $this->input->post('user_id', TRUE);
            $live_data = $this->User_login->get_particular_user_live_data_model($user_id);
            if ($live_data) {

                $this->response(array(
                    "message" => "Successfully Update",
                    "status" => "1",
                    'data' => $live_data
                    ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "message" => "Not update",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
        }else{
            $this->response(array(
                "message" => form_error('user_id', ''),
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }

     echo json_encode($response);
    }

    
    
     public function get_vehicle_type_get(){
        $response = array();
        
            $live_data = $this->User_login->get_vehicle_type_data_model();
            if ($live_data) {

                $this->response(array(
                    "message" => "Success",
                    "status" => "1",
                    'data' => $live_data
                    ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "message" => "Not data found",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
        

     echo json_encode($response);
    }
    
    public function get_metal_category_get(){
        $response = array();
        
            $live_data = $this->User_login->get_metal_category_data_model();
            if ($live_data) {

                $this->response(array(
                    "message" => "Success",
                    "status" => "1",
                    'data' => $live_data
                    ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "message" => "Not data found",
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
        

     echo json_encode($response);
    }
    
	public function go_offline_post(){
        	//$config['csrf_protection'] = false;
        	$response = array();
            $user_id = $this->input->post('user_id', TRUE);
           
            $live_data = $this->User_login->update_user_offline_data_model($user_id);
            //print_r($live_data);
            if (empty($live_data['msg'])) {

                $this->response(array(
                    "message" => "Offline Update successfully",
                    "status" => "1"
                    ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "message" => $live_data['msg'],
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
           

     //echo json_encode($response);
    }
    
    
     //this function for get Notification

    public function get_notification_post(){
        $response = array();
        $this->form_validation->set_rules('user_id', 'user id', 'required|trim|numeric');
        
        if ($this->form_validation->run() == true){

            $user_id = $this->input->post('user_id', TRUE);
            $live_data = $this->User_login->get_notification_data_model($user_id);
            if (empty($live_data['msg'])) {

                $this->response(array(
                    "message" => "Success",
                    "status" => "1",
                    'data' => $live_data
                    ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "message" => $live_data['msg'],
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
        }else{
            $this->response(array(
                "message" => form_error('user_id', ''),
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }

     echo json_encode($response);
    }
    
    
    //this function for get particular live user data like information for every data

    public function get_driver_job_details_post(){
        $response = array();
        $this->form_validation->set_rules('user_id', 'user id', 'required|trim|numeric');
        
        if ($this->form_validation->run() == true){

            $user_id = $this->input->post('user_id', TRUE);
            $job_id = $this->input->post('job_id', TRUE);
            $live_data = $this->User_login->get_driver_job_details_data_model($user_id,$job_id);
            if (empty($live_data['msg'])) {

                $this->response(array(
                    "message" => "Success",
                    "status" => "1",
                    'data' => $live_data
                    ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "message" => $live_data['msg'],
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
        }else{
            $this->response(array(
                "message" => form_error('user_id', ''),
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }

     echo json_encode($response);
    }
    
    //this function for get particular live user data like information for every data

    public function get_seller_job_details_post(){
        $response = array();
        $this->form_validation->set_rules('user_id', 'user id', 'required|trim|numeric');
        
        if ($this->form_validation->run() == true){

            $user_id = $this->input->post('user_id', TRUE);
            $job_id = $this->input->post('job_id', TRUE);
            $live_data = $this->User_login->get_seller_job_details_data_model($user_id,$job_id);
            if (empty($live_data['msg'])) {

                $this->response(array(
                    "message" => "Success",
                    "status" => "1",
                    'data' => $live_data
                    ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                    "message" => $live_data['msg'],
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST); 
            }
        }else{
            $this->response(array(
                "message" => form_error('user_id', ''),
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST); 
        }

     echo json_encode($response);
    }

	//get driver Assigned Job

	public function get_driver_assigned_job_post()
	{
		$response = array();
		$id = $this->input->post('user_id');

		if (!empty($id)) {
			$live_details = $this->User_login->get_driver_assigned_job_model($id);
			if ($live_details) {
				$live=$this->User_login->check_driver_status_model($id);

				$this->response(array(
				"message" => "Successfully fetching Data",
				"status" => "1",
				"live" => $live,
				'data' => $live_details
				), REST_Controller::HTTP_OK);
			} else {
				$this->response(array(
				"message" => "Live data not fetch",
				"status" => "0"
				), REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			$this->response(array(
			"message" => "User id not selected",
			"status" => "0"
			), REST_Controller::HTTP_BAD_REQUEST);
		}
		echo json_encode($response);
	}

	// Ends of code get driver Assigned Job
	
	//get Seller Assigned Job

	public function get_seller_job_post()
	{
		$response = array();
		$id = $this->input->post('user_id');

		if (!empty($id)) {
			$live_details = $this->User_login->get_seller_job_model($id);
			if ($live_details) {
				$this->response(array(
				"message" => "Successfully fetching Data",
				"status" => "1",
				"live" => '0',
				'data' => $live_details
				), REST_Controller::HTTP_OK);
			} else {
				$this->response(array(
				"message" => "No Jobs found!",
				"status" => "0"
				), REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			$this->response(array(
			"message" => "User id not selected",
			"status" => "0"
			), REST_Controller::HTTP_BAD_REQUEST);
		}
		echo json_encode($response);
	}

	// Ends of code get seller Assigned Job
	
	
	//this function for get particular live user data like information for every data

	public function get_my_job_details_post()
	{
		$response = array();
		$this->form_validation->set_rules('user_id', 'user id', 'required|trim|numeric');

		if ($this->form_validation->run() == true) {

			$user_id = $this->input->post('user_id', TRUE);
			$job_id = $this->input->post('job_id', TRUE);
			$live_data = $this->User_login->get_my_job_details_model($user_id,$job_id);
			if (empty($live_data['msg'])) {

				$this->response(array(
				"message" => "Success",
				"status" => "1",
				'data' => $live_data
				), REST_Controller::HTTP_OK);
			} else {
				$this->response(array(
				"message" => $live_data['msg'],
				"status" => "0"
				), REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			$this->response(array(
			"message" => form_error('user_id', ''),
			"status" => "0"
			), REST_Controller::HTTP_BAD_REQUEST);
		}

		echo json_encode($response);
	}
	

    // event post_data
	
	public function upcomming_event_data_post(){
		$response = array();

		$limit = $this->input->post('limit');
		if(!empty($limit)){
			$limit=$limit;
		}else{
			$limit='5';
		}
		$page = $this->input->post('page');
		if(!empty($page)){
			$page=$page;
		}else{
			$page='1';
		}
		
		$start_from = ($page-1) * $limit;

			
			$result_data = $this->User_login->get_upcomming_event_data($start_from,$limit);
			
			if (!empty($result_data)) {

				$this->response(array(
				"message" => "Success",
				"status" => "1",
				'data' => $result_data
				), REST_Controller::HTTP_OK);
			} else {
				$this->response(array(
				"message" => 'No Up comming event data found !!!',
				"status" => "0"
				), REST_Controller::HTTP_BAD_REQUEST);
			}	
		
		echo json_encode($response);
		
	}

    public function past_event_data_post(){
            $response = array();

            $limit = $this->input->post('limit');
            if(!empty($limit)){
                $limit=$limit;
            }else{
                $limit='5';
            }
            $page = $this->input->post('page');
            if(!empty($page)){
                $page=$page;
            }else{
                $page='1';
            }
            
            $start_from = ($page-1) * $limit;

                
                $result_data = $this->User_login->get_past_event_data($start_from,$limit);
                
                if (!empty($result_data)) {

                    $this->response(array(
                    "message" => "Success",
                    "status" => "1",
                    'data' => $result_data
                    ), REST_Controller::HTTP_OK);
                } else {
                    $this->response(array(
                    "message" => 'No Past event data found !!!',
                    "status" => "0"
                    ), REST_Controller::HTTP_BAD_REQUEST);
                }	
            
            echo json_encode($response);
    }

    public function all_event_data_post(){
        $response = array();

        $limit = $this->input->post('limit');
        if(!empty($limit)){
            $limit=$limit;
        }else{
            $limit='5';
        }
        $page = $this->input->post('page');
        if(!empty($page)){
            $page=$page;
        }else{
            $page='1';
        }
        
        $start_from = ($page-1) * $limit;

            
            $result_data = $this->User_login->get_all_event_data($start_from,$limit);
            
            if (!empty($result_data)) {

                $this->response(array(
                "message" => "Success",
                "status" => "1",
                'data' => $result_data
                ), REST_Controller::HTTP_OK);
            } else {
                $this->response(array(
                "message" => 'No event data found !!!',
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST);
            }	
        
        echo json_encode($response);
        
    }

    public function delete_user_post()
	{

        $response = array();

        $userid = $this->input->post('userid');

		if ($userid == "" || $userid == null) {
			$flag = false;
			$this->error = array("message" => "Please enter userid");
			$message = "Please enter userid";
		}

			$result_data = $this->User_login->delete_user($userid);
            if ($result_data) {
                $this->response(array(
                "message" => "Success",
                "status" => "1",
                'data' => $result_data
                ), REST_Controller::HTTP_OK);
            } else {
                $this->response(array(
                "message" => 'User does not exists.',
                "status" => "0"
                ), REST_Controller::HTTP_BAD_REQUEST);
            }	
        
        echo json_encode($response);
        
	}
}