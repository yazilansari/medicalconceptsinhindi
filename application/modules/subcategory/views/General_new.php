<?php
class General extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('api/mdl_general');

	}

	function divisionList(){

		/**
		 * @api {post} /api/general/divisionList Divison List
		 * @apiName divisionList
		 * @apiGroup Division
		 *
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {String} keyword Division Search Keyword
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Division List Object
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			*     	{
					    "status": "success",
					    "metadata": {
					        "type": "list",
					        "code": 200,
					        "message": "Division List retreived successfully!",
					        "info": ""
					    },
					    "data": [
					        {
					            "division_id": "3",
					            "division_name": "Division 3"
					        },
					        {
					            "division_id": "2",
					            "division_name": "Division 2"
					        },
					        {
					            "division_id": "1",
					            "division_name": "Division 1"
					        }
					    ],
					    "pagination": [],
					    "request_id": 1534156679.3852
					}
			*/

		$keyword = trim(isset($this->input_data['keyword'])?$this->input_data['keyword']:'');
		$sfilters = array();

		if (!empty($keyword)) {
			$division_data = $this->mdl_general->get_division($sfilters, $keyword);
		} else {
			$division_data = $this->mdl_general->get_division($sfilters, $keyword);
		} 
		
		
		if(!empty($division_data)){
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "Division List retreived successfully!", "info" => "");
			$this->response['data'] = $division_data;
			$this->sendResponse(); // return the response

		}else{
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "No Division Data Found", "info" => "");
			$this->sendResponse();
		}
	}

	function campTypeList(){

		/**
		 * @api {post} /api/general/campTypeList CampType List
		 * @apiName campTypeList
		 * @apiGroup Camp
		 *
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {String} keyword Camp Type Search Keyword
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Camp Type List Object
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			*     	{
					    "status": "success",
					    "metadata": {
					        "type": "list",
					        "code": 200,
					        "message": "Camp Type List retreived successfully!",
					        "info": ""
					    },
					    "data": [
					        {
					            "camp_type_id": "1",
					            "camp_type": "Be In Touch"
					        },
					        {
					            "camp_type_id": "2",
					            "camp_type": "MDMC-Glucose"
					        }
					    ],
					    "pagination": [],
					    "request_id": 1534158149.9484
					}
			*/

		$keyword = trim(isset($this->input_data['keyword'])?$this->input_data['keyword']:'');
		$sfilters = array();

		if (!empty($keyword)) {
			$camp_type_data = $this->mdl_general->get_camp_type($sfilters, $keyword);
		} else {
			$camp_type_data = $this->mdl_general->get_camp_type($sfilters, $keyword);
		} 
		
		
		if(!empty($camp_type_data)){
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "Camp Type List retreived successfully!", "info" => "");
			$this->response['data'] = $camp_type_data;
			$this->sendResponse(); // return the response

		}else{
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "No Camp Type Data Found", "info" => "");
			$this->sendResponse();
		}
	}

	//function brandList(){

		/**
		 * @api {post} /api/general/brandList CampType List
		 * @apiName brandList
		 * @apiGroup Brand
		 *
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {String} keyword Brand Type Search Keyword
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Camp Type List Object
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			*     	{
					    "status": "success",
					    "metadata": {
					        "type": "list",
					        "code": 200,
					        "message": "Brand List retreived successfully!",
					        "info": ""
					    },
					    "data": [
					        {
					            "brand_id": "1",
					            "brand_name": "Brand 1"
					        },
					        {
					            "brand_id": "2",
					            "brand_name": "Brand 2"
					        }
					    ],
					    "pagination": [],
					    "request_id": 1534158149.9484
					}
			*/

		/*$keyword = trim(isset($this->input_data['keyword'])?$this->input_data['keyword']:'');
		$sfilters = array();

		if (!empty($keyword)) {
			$brand_data = $this->mdl_general->get_brand_data($sfilters, $keyword);
		} else {
			$brand_data = $this->mdl_general->get_brand_data($sfilters, $keyword);
		} 
		
		
		if(!empty($brand_data)){
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "Brand List retreived successfully!", "info" => "");
			$this->response['data'] = $brand_data;
			$this->sendResponse(); // return the response

		}else{
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "No Brand Data Found", "info" => "");
			$this->sendResponse();
		}
	}*/

	function campTestIndication(){

		/**
		 * @api {post} /api/general/campTestIndication CampType Test Indications
		 * @apiName campTestIndication
		 * @apiGroup Camp
		 *
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {Number} camp_type_id Camp Type ID
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  CampType Test Indications Custom Fields
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			*     	{
					    "status": "success",
					    "metadata": {
					        "type": "info",
					        "code": 200,
					        "message": "Camp Test Indications Data has been retreived Successfully!",
					        "info": ""
					    },
					    "data": [
					        {
					            "camp_type_id": "1",
					            "camp_type": "Be In Touch",
					            "camp_type_indication_id": "1",
					            "camp_type_indication": "B.P.",
					            "fields": [
					                {
					                    "custom_field_id": "1",
					                    "camp_type_indication_id": "1",
					                    "custom_field_name": "Systolic Blood Pressure",
					                    "custom_field_placeholder": "Please enter Systolic Blood Pressure",
					                    "custom_field_type": "text",
					                    "custom_field_isrequired": "1",
					                    "custom_field_validation": "numeric",
					                    "custom_field_sort": "1",
					                    "custom_min_value": "70",
					                    "custom_max_value": "100",
					                    "is_deleted": "0",
					                    "insert_dt": "2018-08-09 17:18:16",
					                    "update_dt": "2018-08-10 10:02:54",
					                    "camp_type_id": "1",
					                    "camp_type": "Be In Touch"
					                },
					                {
					                    "custom_field_id": "2",
					                    "camp_type_indication_id": "1",
					                    "custom_field_name": "Diastolic Blood Pressure",
					                    "custom_field_placeholder": "Please enter Diastolic Blood Pressure",
					                    "custom_field_type": "text",
					                    "custom_field_isrequired": "1",
					                    "custom_field_validation": "numeric",
					                    "custom_field_sort": "2",
					                    "custom_min_value": "100",
					                    "custom_max_value": "130",
					                    "is_deleted": "0",
					                    "insert_dt": "2018-08-09 17:18:16",
					                    "update_dt": "2018-08-10 10:02:54",
					                    "camp_type_id": "1",
					                    "camp_type": "Be In Touch"
					                }
					            ]
					        }
					    ],
					    "pagination": [],
					    "request_id": 1534165711.4268
					}
			*/

		$flag = true;
		$phlebo_id = $this->id;
		$camp_type_id = trim(isset($this->input_data['camp_type_id'])?$this->input_data['camp_type_id']:'');
		
		if($camp_type_id==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Camp Type ID!", "info" => "camp_type_id");
			$this->sendResponse();
			return;
		}

		$camp_type_data = $this->mdl_general->get_records(['camp_type_id' => $camp_type_id,'is_deleted' => 0 ],'camp_type',['camp_type_id','camp_type'],'');

		if(!count($camp_type_data)){
			$this->status = "error";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Camp Type does not exists!", "info" => "");
			$this->sendResponse();
			return;
		}else{

			$keyword = "";
			$sfilters = array("ct.camp_type_id" => $camp_type_data[0]->camp_type_id);
			$camp_test_indication_data = $this->mdl_general->get_camp_test_indications($sfilters, $keyword);
			
			$cfilters = array("cti.camp_type_indication_id" => $camp_test_indication_data[0]->camp_type_indication_id, "ct.camp_type_id" => $camp_test_indication_data[0]->camp_type_id);
			$test_indication_custom_field = $this->mdl_general->test_indications_custom_fields($cfilters, $keyword, $this->perPage);

			$camp_test_indication_data[0]->fields = $test_indication_custom_field;

			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "info", "code" => $this->code, "message" => "Camp Test Indications Fields Data has been retreived Successfully!", "info" => "");
			$this->response['data'] = $camp_test_indication_data;
			
			$this->sendResponse();
		}
	}

	function addComment(){

		/**
		 * @api {post} /api/general/addComment Add Comment
		 * @apiName addComment
		 * @apiGroup General
		 *
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {String{'camp','patient'}} type Comment Type //whether it is for camp or patient
		 * @apiParam {Number} id ID of Camp or Patient for updating comment
		 * @apiParam {String{1..250}} comment Comment
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Camp Type List Object
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			*     	{
					    "status": "success",
					    "metadata": {
					        "type": "add",
					        "code": 200,
					        "message": "Comment has been added Successfully!",
					        "info": ""
					    },
					    "data": "",
					    "pagination": [],
					    "request_id": 1534581744.0204
					}
			*/

		$flag = true;
		$phlebo_id = $this->id;
		$column_where = "";

		$type = trim(isset($this->input_data['type'])?$this->input_data['type']:'camp');		
		if($type==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Type!", "info" => "type");
			$this->sendResponse();
			return;
		}

		$id = trim(isset($this->input_data['id'])?$this->input_data['id']:'');		
		if($id==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter ID!", "info" => "id");
			$this->sendResponse();
			return;
		}

		if($type!="" && $id!=""){

			$column_where = $type."_id";
			
			$data_exists = $this->mdl_general->get_records(["{$column_where}"=> $id], $type, ["$column_where"]);

			if(empty($data_exists)){

				$flag = false;
				$this->status = "error";
				$this->code = 400;
				$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "{$type} does not exists!", "info" => "");
				$this->sendResponse();
				return;
			}
		}

		$comment = trim(isset($this->input_data['comment'])?$this->input_data['comment']:'');		
		if($comment==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Comment!", "info" => "comment");
			$this->sendResponse();
			return;
		}

		if($comment=="" && strlen($comment) > 250){

			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Comment should not be more than 250 characters!", "info" => "comment");
			$this->sendResponse();
			return;
		}

		if($flag){

			$insertArray = array();
			$insertArray['comment'] = $comment;

			$affected_rows = $this->mdl_general->_update(["{$column_where}" => $id, "is_deleted" => "0"], $insertArray, $type);
			
			if($affected_rows == "0"){

				$this->status = "error";
				$this->code = 200;
				$this->response['metadata'] = array("type" => "info", "code" => $this->code, "message" => "Comment has not been added! Please try again later!", "info" => "");
				$this->sendResponse();
			}else{

				$this->status = "success";
				$this->code = 200;
				$this->response['metadata'] = array("type" => "add", "code" => $this->code, "message" => "Comment has been added Successfully!", "info" => "");
				$this->response['data'] = "";
				
				$this->sendResponse();
			}
			
		}
	}

	function cityList(){

		/**
		 * @api {post} /api/general/cityList City List
		 * @apiName cityList
		 * @apiGroup City
		 * @apiVersion 1.0.0
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {String} keyword City Search Keyword
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  City List Object
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			*     	{
					    "status": "success",
					    "metadata": {
					        "type": "list",
					        "code": 200,
					        "message": "City List retreived successfully!",
					        "info": ""
					    },
					    "data": [
					        {
					            "city_id": "21",
					            "city_name": "Division 3"
					        },
					        {
					            "city_id": "22",
					            "city_name": "Division 2"
					        },
					        {
					            "city_id": "23",
					            "city_name": "Division 1"
					        }
					    ],
					    "pagination": [],
					    "request_id": 1534156679.3852
					}
			*/

		$phlebo_id = $this->id;
		$phlebo_info = $this->mdl_general->get_records(['phlebo_id' => $phlebo_id,'is_deleted'=> 0 ],'phlebo',['phlebo_name','phlebo_id','phlebo_mobile','user_name','city_id','phlebo_image'],'');

		$keyword = trim(isset($this->input_data['keyword'])?$this->input_data['keyword']:'');
		$sfilters = array();

		if(!empty($phlebo_info)){
			$sfilters['city_id'] = $phlebo_info[0]->city_id;
		}

		if (!empty($keyword)) {
			$city_data = $this->mdl_general->get_city($sfilters, $keyword);
		} else {
			$city_data = $this->mdl_general->get_city($sfilters, $keyword);
		} 
		
		
		if(!empty($city_data)){
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "City List retreived successfully!", "info" => "");
			$this->response['data'] = $city_data;
			$this->sendResponse(); // return the response

		}else{
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "No City Data Found", "info" => "");
			$this->sendResponse();
		}
	}

	function consumptionsList(){

		/**
		 * @api {post} /api/general/consumptionsList Consumptions List
		 * @apiName consumptionsList
		 * @apiGroup Consumptions
		 * @apiVersion 1.0.0
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {String} keyword Consumption Search Keyword
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Consumption List Object
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*   HTTP/1.1 200 OK
			*   {
				    "status": "success",
				    "metadata": {
				        "type": "list",
				        "code": 200,
				        "message": "Consumption List retreived successfully!",
				        "info": ""
				    },
				    "data": [
				        {
				            "consumptions_id": "1",
				            "month": "9",
				            "opening_stock": "150",
				            "used_stock": "40",
				            "closing_stock": "210",
				            "receipt_stock": "100",
				            "consumptions_name": "Glucostrips",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "2",
				            "month": "9",
				            "opening_stock": "150",
				            "used_stock": "0",
				            "closing_stock": "150",
				            "receipt_stock": "0",
				            "consumptions_name": "HbA1c strips",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "3",
				            "month": "9",
				            "opening_stock": "150",
				            "used_stock": "0",
				            "closing_stock": "150",
				            "receipt_stock": "0",
				            "consumptions_name": "Cholesterol strips",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "4",
				            "month": "9",
				            "opening_stock": "150",
				            "used_stock": "0",
				            "closing_stock": "150",
				            "receipt_stock": "0",
				            "consumptions_name": "Micral strips",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "5",
				            "month": "9",
				            "opening_stock": "250",
				            "used_stock": "0",
				            "closing_stock": "250",
				            "receipt_stock": "0",
				            "consumptions_name": "ECG roll",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "6",
				            "consumptions_name": "ECG jelly",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "7",
				            "consumptions_name": "Needles",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "8",
				            "consumptions_name": "Samples Brand A",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "9",
				            "consumptions_name": "Samples Brand B",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "10",
				            "consumptions_name": "Samples Brand C",
				            "previous_closing_stock": "0"
				        },
				        {
				            "consumptions_id": "11",
				            "consumptions_name": "Samples Brand D",
				            "previous_closing_stock": "0"
				        }
				    ],
				    "pagination": [],
				    "request_id": 1537184746.0808
				}
			*/

		$phlebo_id = $this->id;
		$keyword = trim(isset($this->input_data['keyword'])?$this->input_data['keyword']:'');
		$sfilters = array();

		if (!empty($keyword)) {
			$consumptions_data = json_decode(json_encode($this->mdl_general->get_records(['is_deleted' => "0"], 'consumptions',['consumptions_id', 'consumptions_name'], 'consumptions_id asc')),TRUE);
		} else {
			$consumptions_data = json_decode(json_encode($this->mdl_general->get_records(['is_deleted' => "0"], 'consumptions',['consumptions_id', 'consumptions_name'], 'consumptions_id asc')),TRUE);
		} 

		$phlebo_data = json_decode(json_encode($this->mdl_general->get_records(['MONTH(CURDATE()) = month' => NULL, 'phlebo_id' => $phlebo_id, 'is_deleted' => "0" ,"YEAR(CURDATE()) = YEAR(insert_dt)" => NULL], "phlebo_consumptions_allocation", ['consumptions_id','month','opening_stock','used_stock','closing_stock','receipt_stock'], 'consumptions_id asc')),TRUE);
			//echo $this->db->last_query();exit;
			//echo "<pre>";print_r($phlebo_data);echo "</pre>";exit;
		$phlebo_arr = array();
		foreach ($phlebo_data as $key => $value) {
			
			$phlebo_arr[$value['consumptions_id']] = $value;
		}

		$data_arr = array();
		foreach ($consumptions_data as $key => $value) {
			
			if(array_key_exists($value['consumptions_id'], $phlebo_arr)){
				$data_arr[$key] = $phlebo_arr[$value['consumptions_id']];
				$data_arr[$key]['consumptions_id'] = $value['consumptions_id'];
				$data_arr[$key]['consumptions_name'] = $value['consumptions_name'];

				$phlebo_previous_stock_data = $this->mdl_general->get_records(['(MONTH(CURDATE())-1) = month' => NULL, "YEAR(CURDATE()) = YEAR(insert_dt)" => NULL,'phlebo_id' => $phlebo_id, 'is_deleted' => "0", 'consumptions_id' => $value['consumptions_id']], "phlebo_consumptions_allocation", ['closing_stock'], 'consumptions_id asc');

				if(!empty($phlebo_previous_stock_data)){
					$data_arr[$key]['previous_closing_stock'] = $phlebo_previous_stock_data[0]->closing_stock;
				}else{
					$data_arr[$key]['previous_closing_stock'] = "0";
				}
						
			/*}else{
				$data_arr[$key] = $value;
				$data_arr[$key]['previous_closing_stock'] = "0";*/
			}
		}
		
		
		if(!empty($data_arr)){
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "Consumption List retreived successfully!", "info" => "");
			$this->response['data'] = $data_arr;
			$this->sendResponse(); // return the response

		}else{
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "No Consumption Data Found", "info" => "");
			$this->sendResponse();
		}
	}

	function brandList(){

		/**
		 * @api {post} /api/general/brandList Brands List
		 * @apiName brandList
		 * @apiGroup Brand
		 *
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {String} keyword Brand Search Keyword
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Brands List Object
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*   HTTP/1.1 200 OK
			*   {
				    "status": "success",
				    "metadata": {
				        "type": "list",
				        "code": 200,
				        "message": "Brand List retreived successfully!",
				        "info": ""
				    },
				    "data": [
				        {
				            "brand_id": "1",
				            "brand_name": "Brand 1"
				        },
				        {
				            "brand_id": "2",
				            "brand_name": "Brand 2"
				        },
				        {
				            "brand_id": "3",
				            "brand_name": "Brand 3"
				        },
				        {
				            "brand_id": "4",
				            "brand_name": "Brand 4"
				        }
				    ],
				    "pagination": [],
				    "request_id": 1536901137.8744
				}
			*/

		$keyword = trim(isset($this->input_data['keyword'])?$this->input_data['keyword']:'');
		$sfilters = array();

		if (!empty($keyword)) {
			$brands_data = $this->mdl_general->get_records(['is_deleted' => "0"], 'brand',['brand_id', 'brand_name'], 'brand_id asc');
		} else {
			$brands_data = $this->mdl_general->get_records(['is_deleted' => "0"], 'brand',['brand_id', 'brand_name'], 'brand_id asc');
		} 
		
		
		if(!empty($brands_data)){
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "Brand List retreived successfully!", "info" => "");
			$this->response['data'] = $brands_data;
			$this->sendResponse(); // return the response

		}else{
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "No Brand Data Found", "info" => "");
			$this->sendResponse();
		}
	}

	function activityList(){

	/**
	 * @api {post} /api/general/activityList Activity List
	 * @apiName activityList
	 * @apiGroup Activity
	 * @apiVersion 1.0.0
	 * @apiParam {String} Token Phlebo Unique Access Token
	 *
	 * @apiSuccess {Number} code HTTP Status Code.
	 * @apiSuccess {String} message  Associated Message.
	 * @apiSuccess {Object} data  Activity List Object
	 * @apiSuccess {Object} error  Error if Any.
	 *
	 * @apiSuccessExample Success-Response:
		*     HTTP/1.1 200 OK
		*     	{
				    "status": "success",
				    "metadata": {
				        "type": "list",
				        "code": 200,
				        "message": "Activity List retreived successfully!",
				        "info": ""
				    },
				    "data": [
				        {
				            "activity_id": "1",
				            "activity_name": "Home Visit",
				            "insert_dt": "2019-02-08 18:51:18",
				            "update_dt": "2019-02-08 18:51:18",
				            "is_deleted": "0"
				        },
				        {
				            "activity_id": "2",
				            "activity_name": "Demo@ Clinic",
				            "insert_dt": "2019-02-08 18:51:32",
				            "update_dt": "2019-02-08 18:51:32",
				            "is_deleted": "0"
				        },
				        {
				            "activity_id": "3",
				            "activity_name": "Doctor Visit",
				            "insert_dt": "2019-02-08 18:51:39",
				            "update_dt": "2019-02-08 19:00:32",
				            "is_deleted": "0"
				        }
				    ],
				    "pagination": [],
				    "request_id": 1549950460.308868
				}
		*/

		$phlebo_id = $this->id;
		
		$keyword = trim(isset($this->input_data['keyword'])?$this->input_data['keyword']:'');
		$sfilters = array();

		$activity_arr = $this->mdl_general->get_records([], 'activity', ['*'], 'activity_id asc');		
		
		if(!empty($activity_arr)){
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "Activity List retreived successfully!", "info" => "");
			$this->response['data'] = $activity_arr;
			$this->sendResponse(); // return the response

		}else{
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "No Activity Data Found", "info" => "");
			$this->sendResponse();
		}
	}

	function addActivity(){

		/**
		 * @api {post} /api/general/addActivity Add Activity
		 * @apiName addActivity
		 * @apiGroup Activity
		 *
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {Number} activity_id Activity ID 
		 * @apiParam {Date} activity_date Activity Date
		 * @apiParam {String} location Location
		 * @apiParam {String} sbm_name SBM Name
		 * @apiParam {String} sbm_mobile SBM Mobile
		 * @apiParam {String} doc_name Doctor Name
		 * @apiParam {String} doc_speciality Doctor Speciality
		 * @apiParam {String} start_time Visit Start Time
		 * @apiParam {String} end_time Visit End Time
		 * @apiParam {String} patient_name Patient Name
		 * @apiParam {Number[11]} patient_mobile Patient Mobile
		 * @apiParam {Number} patient_age Patient Age
		 * @apiParam {String} patient_gender Patient Gender
		 * @apiParam {String} pen_type Pen Type
		 * @apiParam {String} units Units IU
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Camp Type List Object
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			*     	{
					    "status": "success",
					    "metadata": {
					        "type": "add",
					        "code": 200,
					        "message": "Comment has been added Successfully!",
					        "info": ""
					    },
					    "data": "",
					    "pagination": [],
					    "request_id": 1534581744.0204
					}
			*/

		$flag = true;
		$phlebo_id = $this->id;
		$column_where = "";

		$activity_id = trim(isset($this->input_data['activity_id'])?$this->input_data['activity_id']:'');
		if($activity_id==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please select Activity!", "info" => "activity_id");
			$this->sendResponse();
			return;
		}

		$check_activity_exists = $this->mdl_general->get_records(['activity_id' => $activity_id], 'activity', ['*'], 'activity_id asc');
		if(empty($check_activity_exists)){

			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Activity does not exists!", "info" => "activity_id");
			$this->sendResponse();
			return;
		}

		$activity_date = trim(isset($this->input_data['activity_date'])?$this->input_data['activity_date']:'');
		if($activity_date==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Activity Date!", "info" => "activity_date");
			$this->sendResponse();
			return;
		}
	//	var_dump($check_activity_exists);exit;
	if($check_activity_exists[0]->activity_name != 'Other'){

		if($check_activity_exists[0]->activity_name!='Doctor Visit'){

			$patient_name = trim(isset($this->input_data['patient_name'])?$this->input_data['patient_name']:'');
			if($patient_name==""){
			
				$flag = false;
				$this->status = "error";
				$this->code = 400;
				$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Patient Name!", "info" => "patient_name");
				$this->sendResponse();
				return;
			}

			$patient_age = trim(isset($this->input_data['patient_age'])?$this->input_data['patient_age']:'');
			if($patient_age==""){
			
				$flag = false;
				$this->status = "error";
				$this->code = 400;
				$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Patient Age!", "info" => "patient_age");
				$this->sendResponse();
				return;
			}

			$patient_gender = trim(isset($this->input_data['patient_gender'])?$this->input_data['patient_gender']:'');
			if($patient_gender==""){
			
				$flag = false;
				$this->status = "error";
				$this->code = 400;
				$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Patient Gender!", "info" => "patient_gender");
				$this->sendResponse();
				return;
			}

			if($patient_gender!='' && (strtolower($patient_gender)!='male' && strtolower($patient_gender)!='female')){

				$flag = false;
				$this->status = "error";
				$this->code = 400;
				$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter valid Patient Gender!", "info" => "patient_gender");
				$this->sendResponse();
				return;
			}

			$patient_mobile = trim(isset($this->input_data['patient_mobile'])?$this->input_data['patient_mobile']:'');
			

			if($patient_mobile!='' && strlen($patient_mobile)!=10){

				$flag = false;
				$this->status = "error";
				$this->code = 400;
				$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter valid Patient Mobile Number!", "info" => "patient_mobile");
				$this->sendResponse();
				return;
			}

			$pen_type = trim(isset($this->input_data['pen_type'])?$this->input_data['pen_type']:'');
			if($pen_type==""){
			
				$flag = false;
				$this->status = "error";
				$this->code = 400;
				$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Pen Type!", "info" => "pen_type");
				$this->sendResponse();
				return;
			}

			$units = trim(isset($this->input_data['units'])?$this->input_data['units']:'');
			if($units==""){
			
				$flag = false;
				$this->status = "error";
				$this->code = 400;
				$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Units Administered IU!", "info" => "units");
				$this->sendResponse();
				return;
			}
		}		

		$sbm_name = trim(isset($this->input_data['sbm_name'])?$this->input_data['sbm_name']:'');
		if($sbm_name==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter SBM Name!", "info" => "sbm_name");
			$this->sendResponse();
			return;
		}

		$sbm_mobile = trim(isset($this->input_data['sbm_mobile'])?$this->input_data['sbm_mobile']:'');
		
		$doc_name = trim(isset($this->input_data['doc_name'])?$this->input_data['doc_name']:'');
		if($doc_name==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Doctor Name!", "info" => "doc_name");
			$this->sendResponse();
			return;
		}

		$doc_speciality = trim(isset($this->input_data['doc_speciality'])?$this->input_data['doc_speciality']:'');
		if($doc_speciality==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Doctor Speciality!", "info" => "doc_speciality");
			$this->sendResponse();
			return;
		}
	}
		$start_time = trim(isset($this->input_data['start_time'])?$this->input_data['start_time']:'');
		if($start_time==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Visit Start Time!", "info" => "start_time");
			$this->sendResponse();
			return;
		}

		$end_time = trim(isset($this->input_data['end_time'])?$this->input_data['end_time']:'');
		if($end_time==""){
		
			$flag = false;
			$this->status = "error";
			$this->code = 400;
			$this->response['metadata'] = array("type" => "parameter", "code" => $this->code, "message" => "Please enter Visit End Time!", "info" => "end_time");
			$this->sendResponse();
			return;
		}

		$brand_id = trim(isset($this->input_data['brand_id'])?$this->input_data['brand_id']:'');


		$comment = trim(isset($this->input_data['comment'])?$this->input_data['comment']:'');
		$location = trim(isset($this->input_data['location'])?$this->input_data['location']:'');
		
		if($flag){
			if($activity_id == 4){
				$insertArray = array();
				$insertArray['activity_id'] = $activity_id;
				$insertArray['phlebo_id'] = $phlebo_id;
				$insertArray['activity_date'] = date('Y-m-d',strtotime($activity_date));
				$insertArray['start_time'] = $start_time;
				$insertArray['end_time'] = $end_time;
				$insertArray['comments'] = $comment;
				$insertArray['brand_id'] = $brand_id;
			}else{

				$insertArray = array();
				$insertArray['activity_id'] = $activity_id;
				$insertArray['phlebo_id'] = $phlebo_id;
				$insertArray['activity_date'] = date('Y-m-d',strtotime($activity_date));
				$insertArray['location'] = $location;
				$insertArray['rsm_name'] = $sbm_name;
				$insertArray['rsm_mobile'] = $sbm_mobile;
				$insertArray['doc_name'] = $doc_name;
				$insertArray['doc_speciality'] = $doc_speciality;
				$insertArray['start_time'] = $start_time;
				$insertArray['end_time'] = $end_time;
				$insertArray['comments'] = $comment;
				$insertArray['brand_id'] = $brand_id;
			}
			
			if($check_activity_exists[0]->activity_name!='Other'){
				
				if($check_activity_exists[0]->activity_name!='Doctor Visit'){
					$insertArray['patient_name'] = $patient_name;
					$insertArray['patient_age'] = $patient_age;				
					$insertArray['patient_gender'] = ucfirst($patient_gender);				
					$insertArray['patient_mobile'] = $patient_mobile;								
					$insertArray['pen_type'] = $pen_type;			
					$insertArray['units'] = $units;								
				}
			}
			//print_r($insertArray);
			$insert_id = $this->mdl_general->_insert($insertArray, 'phlebo_activities');
			//echo $insert_id;exit;
			//echo $this->db->last_query();exit;
			if($insert_id==''){

				$this->status = "error";
				$this->code = 200;
				$this->response['metadata'] = array("type" => "info", "code" => $this->code, "message" => "Activity has not been added! Please try again later!", "info" => "");
				$this->sendResponse();
			}else{

				$this->status = "success";
				$this->code = 200;
				$this->response['metadata'] = array("type" => "add", "code" => $this->code, "message" => "Activity has been added Successfully!", "info" => "");
				$this->response['data'] = "";
				
				$this->sendResponse();
			}
			
		}
	}

	function phleboActivityList(){

		/**
		 * @api {post} /api/general/phleboActivityList Phlebo Activity List
		 * @apiName phleboActivityList
		 * @apiGroup Activity
		 *
		 * @apiParam {String} Token Phlebo Unique Access Token
		 * @apiParam {Number[1..11]} activity_id Activity ID
		 *
		 * @apiSuccess {Number} code HTTP Status Code.
		 * @apiSuccess {String} message  Associated Message.
		 * @apiSuccess {Object} data  Phlebo Activity List Object
		 * @apiSuccess {Object} error  Error if Any.
		 *
		 * @apiSuccessExample Success-Response:
			*     HTTP/1.1 200 OK
			*     	{
					    "status": "success",
					    "metadata": {
					        "type": "list",
					        "code": 200,
					        "message": "Activity List retreived successfully!",
					        "info": ""
					    },
					    "data": [
					        {
					            "phlebo_activities_id": "152",
					            "phlebo_id": "59",
					            "activity_id": "3",
					            "activity_date": "2019-02-23",
					            "patient_name": null,
					            "patient_age": null,
					            "patient_gender": null,
					            "patient_mobile": null,
					            "location": "Mulund",
					            "pen_type": null,
					            "units": null,
					            "rsm_name": "Anurag",
					            "rsm_mobile": "2147483647",
					            "doc_name": "Dr Mandar arekar",
					            "doc_speciality": "Md",
					            "start_time": "19:15:00",
					            "end_time": "19:40:00",
					            "comments": "",
					            "insert_dt": "2019-02-24 20:53:29",
					            "update_dt": "2019-02-24 20:53:29",
					            "is_deleted": "0",
					            "activity_name": "Doctor Visit"
					        },
					        {
					            "phlebo_activities_id": "47",
					            "phlebo_id": "59",
					            "activity_id": "1",
					            "activity_date": "2019-02-21",
					            "patient_name": "Test",
					            "patient_age": "45",
					            "patient_gender": "Female",
					            "patient_mobile": "1234567899",
					            "location": "Mumbai,Andheri,patients address",
					            "pen_type": "Kwik pen",
					            "units": "10",
					            "rsm_name": "Test sbm",
					            "rsm_mobile": "1246666666",
					            "doc_name": "Dr. Demo",
					            "doc_speciality": "Dibeatologist",
					            "start_time": "21:30:00",
					            "end_time": "21:45:00",
					            "comments": "Administered 2IU",
					            "insert_dt": "2019-02-21 16:04:30",
					            "update_dt": "2019-02-21 16:04:30",
					            "is_deleted": "0",
					            "activity_name": "Home Visit"
					        }
					    ],
					    "pagination": [],
					    "request_id": 1534156679.3852
					}
			*/

		$activity_id = trim(isset($this->input_data['activity_id'])?$this->input_data['activity_id']:'');
		$sfilters = array();

		$sfilters['pa.phlebo_id'] = $this->id;

		if($activity_id){
			$sfilters['a.activity_id'] = $activity_id;
		}

		$activity_data = $this->mdl_general->get_phlebo_activity_records($sfilters);		
		
		if(!empty($activity_data)){
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "Phlebo Activities List retreived successfully!", "info" => "");
			$this->response['data'] = $activity_data;
			$this->sendResponse(); // return the response

		}else{
			$this->status = "success";
			$this->code = 200;
			$this->response['metadata'] = array("type" => "list", "code" => $this->code, "message" => "No Phlebo Activities Data Found", "info" => "");
			$this->sendResponse();
		}
	}
}
