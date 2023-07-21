<?php
class MY_Controller extends CI_Controller{
	
	public $response = array('code'=> 200, 'message'=> 'OK', 'data'=>array(), 'error'=>"", 'latest_version' => array());
	protected $user_id = 0;
	protected $device_id = NULL;
	protected $device_type = NULL;
	protected $app_version = NULL;
	protected $error = array();
	protected $input_data = array();
	protected $latest_version = array();
	protected $access_token = NULL;
	
	private $log_file = null;
	private $request_id = null;
	
	function __construct(){
		
		parent::__construct();
		//error 1
		$this->log_file= APPPATH . 'logs/apilog' . date('Y-m-d') . ".log";
		$this->request_id = microtime(true);
		
		
		$this->load->model('api/api_model');
		$this->load->helper('common_helper');
		$this->latest_version = $this->api_model->getLatestVersion();
		$this->response['latest_version'] = $this->latest_version;
		
		//Getting raw data in an array after trimming
		if($this->input->input_stream('data') && false){
			
			$input = rawurldecode($this->input->input_stream('data'));
			$input = json_decode($input, TRUE);
			$this->input_data = arrayMapRecursive('trim', $input);
		} else {
			$input = rawurldecode(trim(file_get_contents('php://input')));
			$this->log($input);
			if($input){
				$input = json_decode($input, TRUE);
				if(!json_last_error()) {
					$this->input_data = arrayMapRecursive('trim', $input);
				} else { 
					$this->response['code'] = 400;
					$this->response['message'] = "Bad Request. JSON ERROR";
					
					$this->log("BAD JSON REQUEST");
					
					$this->output->set_status_header(400)->set_content_type('application/json');
					header("Content-Type: application/json");
					echo json_encode($this->response);
					exit;
				}
			}
		}
		
		
		
		//login validation goes here
		$segment = $this->uri->segment(3); 
		if(!($segment == 'register' || $segment == 'user_login' || $segment == 'get_app_vision' || $segment == 'delete_user')){
			$this->authRequired($segment);
		}
	}
	
	protected function authRequired($segment){
		 
		$data = $this->input->request_headers(TRUE);
		
		$access_token = isset($data['token']) ? trim(str_replace("bearer", "", $data['token'])) : false;
		if(!$access_token)
			$access_token = isset($data['Token']) ? trim(str_replace("bearer", "", $data['Token'])) : false;
			$valid_token = false;
			$this->log("REQUEST STARTED FOR TOKEN :: " . $access_token);
			if($access_token){
				$valid_token = $this->api_model->get_user_token($access_token);
				
				$this->user_id = $valid_token['users_id'];
				$this->users_type = $valid_token['users_type'];/*
				$this->device_id = $valid_token['device_id'];
				$this->device_type = $valid_token['device_type'];
				$this->app_version = $valid_token['app_version'];*/
				$this->access_token = $access_token;
				/*if($valid_token['app_version'] < $this->latest_version[$this->device_type] && $segment != 'update_version'){
					
					$this->response['message'] = "Update Required";
					$this->response['code'] = 200;
					$this->output->set_status_header(200)->set_content_type('application/json');
					header("Content-Type: application/json");
					echo json_encode($this->response);
					exit;
					
				}*/
			}
			
			if(!$access_token || !$valid_token) {
				$this->response['message'] = "Session has expired. Please Login again!!";
				$this->response['code'] = 401;
				
				$this->log("AUTHENTICATION FAILED FOR TOKEN :: " . $access_token);
				
				$this->output->set_status_header(401)->set_content_type('application/json');
				header("Content-Type: application/json");
				echo json_encode($this->response);
				exit;
			}
	}
	
	protected function sendResponse(){
		//$this->response['data']['request_id'] = $this->request_id;
		$this->log($this->response);
		/* Only One Error Message */
		if(!empty($this->error)){
			$this->response['error'] = array_pop($this->error);
		}
		$this->response['message'] = $this->response['message'];
		$response = json_encode($this->response);
		
		$this->log("REQUEST ENDED FOR TOKEN :: " . $this->access_token);
		
		$this->output->set_status_header($this->response['code'])->set_content_type('application/json')->set_output($response);
	}
	
	protected function log($message){
		if(is_array($message)){
			$message = date_default_timezone_set('Asia/Kolkata') . " Token :: " . $this->access_token . "  :: RequestId :: " . $this->request_id . " :: Message :: " . json_encode($message) . PHP_EOL;
		} else {
			$message = date_default_timezone_set('Asia/Kolkata') . " Token :: " . $this->access_token . " :: RequestId :: " . $this->request_id . " :: Message :: " . $message . PHP_EOL;
		}
		
		//error_log($message, 3, $this->log_file);
	}
}