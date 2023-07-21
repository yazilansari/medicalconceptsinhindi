<?php
class Category extends MY_Controller {
	public $data = array();
	function __construct() {
		parent::__construct();
		$this->data = $this->input->post();
		$this->load->model('category_model');
		$this->load->model('upload_data_model');
		$this->load->model('login_model');
		$this->load->helper('common_helper');
	}
	
	/**
	 * @api {post} /category/get_category Get Category Data
	 * @apiName get_category
	 * @apiGroup Category
	 *
	 * @apiParam {String{1..149}} token Token.
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  Category Data Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
			    "code": 200,
			    "message": "Category has been retreived successfully!!",
			    "data": [
			        {
			            "category_id": "1",
			            "category_name": "Text",
			            "unseen_count": 0
			        },
			        {
			            "category_id": "2",
			            "category_name": "Audio",
			            "unseen_count": 1
			        },
			        {
			            "category_id": "3",
			            "category_name": "Video",
			            "unseen_count": 7
			        },
			        {
			            "category_id": "5",
			            "category_name": "Case Study",
			            "unseen_count": 0
			        }
			    ],
			    "error": "",
			    "latest_version": []
			}
	*
	*/
	
	public function get_category(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);
		$users_type = '';
		$main_category = '';
		$token = "";
		
		$token = isset($data_token['token']) ? $data_token['token'] : $data_token['Token'];

		$users_data = $this->category_model->get_records(['access_token' => $token], 'users', ['*']);
		if(!empty($users_data)){
			$users_type = $users_data[0]->users_type;
		}

		if($flag){

			if($users_type=='General'){
				$main_category = 'Health Education';
				$where = array("c.is_active" => "1", "mc.main_category_name" => $main_category);
			}else if($users_type=='Student'){
				$where = array("c.is_active" => "1");
			}
			
			$result_data = $this->category_model->get_category($where);	
			//print_r($result_data);exit;
			$resultant_arr = array();
			
			if(!empty($result_data)){
				foreach ($result_data as $key => $value) {
					
					$resultant_arr[$key] = new stdClass;
					$resultant_arr[$key]->category_id = $value->category_id;
					$resultant_arr[$key]->category_name = $value->category_name;
					$resultant_arr[$key]->image = $this->config->item('icon_path') . strtolower(str_replace(' ', '_', $value->category_name)).".png";
			
					$where_arr = array("ud.category_id" => $value->category_id, "ud.is_active" => "1", "c.is_active" => "1");
					$get_upload_arr = $this->upload_data_model->get_upload_data_concat($where_arr,$this->users_type);
					
					$upload_data_id = $get_upload_arr[0]->upload_data_id;
					
					$total_upload_count = 0;
					if($upload_data_id!=""){
						$total_upload_count = count(explode(",", $upload_data_id));
						$total_upload_count = $total_upload_count;
					}

					$unseen_count = 0;
					if($upload_data_id!=""){

						$where_cat_count = array("ud.is_active" => "1", "uds.category_id" => $value->category_id, "u.access_token" => $token,"c.is_active" => "1");
						$count_data = $this->category_model->get_category_unseen_count($where_cat_count, $upload_data_id);
						
						$upload_data_id_seen = $count_data[0]->seen_upload_data;

						$total_upload_seen_count = 0;
						if($upload_data_id_seen!=""){
							$total_upload_seen_count = count(explode(",", $upload_data_id_seen));
							$total_upload_seen_count = $total_upload_seen_count;
						}

						$unseen_count = $total_upload_count - $total_upload_seen_count;

						$resultant_arr[$key]->unseen_count = $unseen_count;

					}else{

						$resultant_arr[$key]->unseen_count = $unseen_count;
					}
				
				}
			}
			//print_r($resultant_arr);exit;

			if($users_type=='Student'){

				$final_arr = array();
				foreach ($resultant_arr as $key => $value) { 
					$final_arr[$value->category_id]['category_name'] = $value->category_name;
					$final_arr[$value->category_id]['unseen_count'] = $value->unseen_count;
				}//print_r($final_arr);exit;
				
				$resultant_arr = array();
				foreach ($final_arr as $key1 => $value1) {

					$keys = array_keys(array_combine(array_keys($final_arr), array_column($final_arr, 'category_name')),$value1['category_name']);
					
					$sum = $final_arr[$keys[0]]['unseen_count'] + $final_arr[$keys[0]]['unseen_count'];

					$c_key = implode(',', $keys);

					if(!in_array($c_key, array_column($resultant_arr, 'category_id'))){
						$resultant_arr1['category_id'] 		= $c_key;
						$resultant_arr1['category_name'] 	= $value1['category_name'];
						$resultant_arr1['unseen_count'] 	= $sum;
						$resultant_arr1['image'] 			= $this->config->item('icon_path').strtolower(str_replace(' ', '_', $value1['category_name'])).".png";

						array_push($resultant_arr, $resultant_arr1);	
					}							
									
				}
			}
			if($users_type=='General'){
				$resultant_arr = json_decode(json_encode($resultant_arr),true);
			}
			for($i=0;$i<count($resultant_arr);$i++){
				if($resultant_arr[$i]['category_id'] > 9){
					$resultant_arr[$i]['type'] = 'generic';
				}else{
					$lower = strtolower($resultant_arr[$i]['category_name']);

					$resultant_arr[$i]['type'] = str_replace(' ', '', $lower);;
				}
			}
			
			if(!empty($resultant_arr)){
				
				$this->response['code'] = 200;
				$this->response['message'] = "Category has been retreived successfully!!";
				$this->response['data'] = $resultant_arr;
			}else{
				$this->response['code'] = 400;
				$this->response['message'] = "Error occurred while retreiving Category!! Please try again!!!";
				$this->error['message']= array("message" => "Error occurred while retreiving Category!! Please try again!!!");
			}
				
			$this->sendResponse();
		}else{
			
			$this->response['code'] = 404;
			$this->response['message'] = $message;
		}
		
		$this->sendResponse();
		//echo json_encode($result, JSON_UNESCAPED_UNICODE);
		
	}
	
	/**
	 * @api {post} /category/get_sub_category Get Sub Category Data
	 * @apiName get_sub_category
	 * @apiGroup Category
	 *
	 * @apiParam {String{1..149}} token Token.
	 * @apiParam {Number{1..11}} category_id Category ID.
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  Sub Category Data Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
			    "code": 200,
			    "message": "Sub Category has been retreived successfully!!",
			    "data": [
			        {
			            "sub_category_id": "1",
			            "sub_category_name": "Cardio",
			            "description": "test description",
			            "sub_category_image": "http://localhost/chikitsa_shastra/assets/images/upload/sub_category_images/1-1525683519.png",
			            "category_id": "3",
			            "unseen_count": 5
			        },
			        {
			            "sub_category_id": "2",
			            "sub_category_name": "COPD",
			            "description": null,
			            "sub_category_image": "http://localhost/chikitsa_shastra/assets/images/upload/sub_category_images/Medical-Camp-1525848521.jpg",
			            "category_id": "3",
			            "unseen_count": 1
			        },
			        {
			            "sub_category_id": "4",
			            "sub_category_name": "Testing Sub category",
			            "description": "Testing Sub category Testing Sub categoryTesting Sub category",
			            "sub_category_image": "http://localhost/chikitsa_shastra/assets/images/upload/sub_category_images/Image_5ac856ad525e2-1528719645.jpg",
			            "category_id": "3",
			            "unseen_count": 1
			        }
			    ],
			    "error": "",
			    "latest_version": []
			}
	*
	*/
	
	public function get_sub_category(){

		$data = $this->input_data;
		$flag = true;
		$message = "";

		$data_token = $this->input->request_headers(TRUE);

		$token = "";
		
		$token = isset($data_token['token']) ? $data_token['token'] : $data_token['Token'];
		$category_id = isset($data['category_id']) ? $data['category_id'] : "";
		$folder_id = isset($data['folder_id']) ? $data['folder_id'] : "";

		
		if($category_id==""){

			$flag = false;
			$this->error = array("message" => "Please enter Category ID");
			$message = "Please enter Category ID";
		}
		
		$where_user = array("u.access_token" => $token,"u.is_active" => "1");
		$result_data = $this->login_model->user_login($where_user);
		
		$user_type = $result_data[0]['users_type'];

		if($flag){
			if($folder_id == ""){
				$where = array("sc.is_active" => "1","sc.category_id IN ($category_id)" => NULL,"c.is_active" => "1");
			}else{
				$where = array("sc.is_active" => "1","sc.category_id IN ($category_id)" => NULL,"c.is_active" => "1","sc.folder_id IN ($folder_id)" => NULL);
			}


			$result_data = $this->category_model->get_sub_category($folder_id,$where,$token,$user_type);
			
			$result_arr = array();

			if(!empty($result_data)){
				foreach ($result_data as $key => $value) {
					//print_r($value);exit;
					$result_arr[$key]['sub_category_id'] = $value->sub_category_id;
					$result_arr[$key]['sub_category_name'] = $value->sub_category_name;
					$result_arr[$key]['description'] = $value->description;
					$result_arr[$key]['upload_for_user_type'] = $value->upload_for_user_type;
					$result_arr[$key]['sub_category_image'] = get_icon_path($value->upload_for_user_type);
					$result_arr[$key]['category_id'] = $value->category_id;
					$result_arr[$key]['category_name'] = $value->category_name;

					if($folder_id){
						$result_arr[$key]['folder_id'] = null;
					}else{

						$result_arr[$key]['folder_id'] = $value->folder_id;
						if(!empty($value->folder_description)){

							$result_arr[$key]['description'] = $value->folder_description;
						}else{
							
							$result_arr[$key]['description'] = '';
						}
					}
					//print_r($result_arr[$key]['description']);exit;
					$result_arr[$key]['folder_name'] = $value->folder_name;

					if($value->folder_id){
						$result_arr[$key]['folder_image'] = config_item('icon_path')."folder-icon.png";
					}

					$where_arr = array("ud.sub_category_id" => $value->sub_category_id, "ud.is_active" => "1", "c.is_active" => "1", "sc.is_active" => "1");
					$get_upload_arr = $this->upload_data_model->get_upload_data_concat($where_arr,$this->users_type);
					
					$upload_data_id = $get_upload_arr[0]->upload_data_id;
					
					$total_upload_count = 0;
					if($upload_data_id!=""){
						$total_upload_count = count(explode(",", $upload_data_id));
						$total_upload_count = $total_upload_count;
					}

					$unseen_count = 0;
					if($upload_data_id!=""){

						$where_sub_cat_count = array("ud.is_active" => "1", "uds.sub_category_id" => $value->sub_category_id, "u.access_token" => $token, "sc.is_active" => "1");
						$count_data = $this->category_model->get_sub_category_unseen_count($where_sub_cat_count, $upload_data_id);
						
						$upload_data_id_seen = $count_data[0]->seen_upload_data;

						$total_upload_seen_count = 0;
						if($upload_data_id_seen!=""){
							$total_upload_seen_count = count(explode(",", $upload_data_id_seen));
							$total_upload_seen_count = $total_upload_seen_count;
						}

						$unseen_count = $total_upload_count - $total_upload_seen_count;

						$result_arr[$key]['unseen_count'] = $unseen_count;

					}else{

						$result_arr[$key]['unseen_count'] = $unseen_count;
					}
				
				}
			}
			
			$folders_array = [];
			if(count($result_arr)) {
				foreach ($result_arr as $key => $value) {
					if((int)$value['folder_id'] == 0){
						$temp[] = $value;	
					}else{
						if(!in_array((int)$value['folder_id'], $folders_array)){
							$folders_array[] = (int)$value['folder_id'];
							$temp[] = $value;	
						}
					}
					
				}
			}

			if(!empty($result_data)){
				
				$this->response['code'] = 200;
				$this->response['message'] = "Sub Category has been retreived successfully!!";
				$this->response['data'] = $temp;
			}else{
				$this->response['code'] = 200;
				$this->response['message'] = "Sub Category for this Category does not exists!!!";
				$this->error = array("message" => "Sub Category for this Category does not exists!!!");
			}
				
			$this->sendResponse();
		}else{
			
			$this->response['code'] = 404;
			$this->response['message'] = $message;
		}
		
		$this->sendResponse();
		//echo json_encode($result, JSON_UNESCAPED_UNICODE);
		
	}
	
	
}
