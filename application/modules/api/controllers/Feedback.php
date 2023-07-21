<?php
class Feedback extends MY_Controller {
	public $data = array();
	function __construct() {
		parent::__construct();
		$this->data = $this->input->post();
		$this->load->model(array('login_model','feedback_model'));
		$this->load->model('common_model');
		$this->load->helper('common_helper');
	}

	/**
	 * @api {post} /feedback/get_feedback Get Feedback
	 * @apiName get_feedback
	 * @apiGroup Feedback
	 *
	 * @apiParam {String{1..149}} token user Token.
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  Feedback Data Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
			    "code": 200,
			    "message": "Feedback List retreived successfully!!",
			    "data": [
			        {
			            "feedback_id": "3",
			            "feedback_question": "Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.adadada",
			            "feedback_datetime": "2018-06-12 11:28:36",
			            "is_active": "1",
			            "users_feedback": ""
			        },
			        {
			            "feedback_id": "4",
			            "feedback_question": "Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.adadada",
			            "feedback_datetime": "2018-06-12 11:28:36",
			            "is_active": "1",
			            "users_feedback": ""
			        }
			    ],
			    "error": "",
			    "latest_version": []
			}
	*
	*/
	public function get_feedback(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		
		$token = "";
		
		$token = isset($data_token['token']) ? isset($data_token['Token']) : "";

		$user_id = isset($data['user_id']) ? $data['user_id'] : "";

		if($user_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter User ID");
			$message = "Please enter User ID";
		}

		if($flag){

			$where = array("f.is_active" => "1");
			$result_data = $this->feedback_model->get_feedback_list($where);
			//echo $this->db->last_query();exit;
			if(!empty($result_data)){

				$this->response['code'] = 200;
				$this->response['message'] = "Feedback List retreived successfully!!";
				$this->response['data'] = $result_data;
			}else{

				$this->response['code'] = 200;
				$this->response['message'] = "No Feedback Found!!";
				$this->error['message']= array("message" => "");
			}
			
		}else{
			$this->response['code'] = 404;
			$this->response['message'] = $message;
		}
		
		$this->sendResponse();
	}

	/**
	 * @api {post} /feedback/submit_feedback Submit Feedback
	 * @apiName submit_feedback
	 * @apiGroup Feedback
	 *
	 * @apiParam {String{1..149}} token user Token.
	 * @apiParam {Number{1..11}} user_id User ID
	 * @apiParam {String} feedback_arr Feedback Array containing feedback_id and users_feedback. Example {"user_id" : "1","feedback_arr" : [{"feedback_id":"3","users_feedback":"Pratik"},{"feedback_id":"4","users_feedback":"Kamble"}]}
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  Feedback Data Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
			    "code": 200,
			    "message": "Your Feedback has been submitted successfully!!",
			    "data": {},
			    "error": "",
			    "latest_version": []
			}
	*
	*/
	public function submit_feedback(){

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

		$user_id = isset($data['user_id']) ? $data['user_id'] : "";

		if($user_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter User ID");
			$message = "Please enter User ID";
		}

		$feedback_arr = isset($data['feedback_arr']) ? $data['feedback_arr'] : "";

		if($feedback_arr=="" || empty($feedback_arr)){

			$flag = false;
			$this->error = array("message" => "Please give your feedback");
			$message = "Please give your feedback";
		}

		if($flag){

			$insertData = array();
			foreach ($feedback_arr as $key => $value) {
				
				$insertData[]= array(
					"users_id" => $user_id,
					"feedback_id" => $value['feedback_id'],
					"users_feedback" => $value['users_feedback']
						);	
			}

			$affected_rows = $this->feedback_model->insert_feedback_data($insertData);

			if($affected_rows > 0){

				$this->response['code'] = 200;
				$this->response['message'] = "Your Feedback has been submitted successfully!!";
				$this->response['data'] = new stdClass;
			}else{

				$this->response['code'] = 200;
				$this->response['message'] = "Error occurred while submitting Feedback. Please try again later!!";
				$this->error['message']= array("message" => "");
			}
			
		}else{
			$this->response['code'] = 404;
			$this->response['message'] = $message;
		}
		
		$this->sendResponse();
	}
}
