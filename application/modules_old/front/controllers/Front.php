<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Front extends Generic_Controller
{
	private $module = 'front';
	private $model_name = 'mdl_front';

	function __construct() {
		parent::__construct();
		$this->load->model($this->model_name, 'model');
		$this->load->helper('common_helper');
		$this->load->helper('send_email_helper');
		//echo $key = bin2hex($this->encryption->create_key(16)); die();
		$this->data['controller'] = $this->data['mainmenu'] = $this->module;
		$this->data['menu'] = '';
	}

	function index(){
		/*	if( $this->session->is_logged_in() ){
			redirect('admin/home','refresh');
		}*/

		/*$this->data['main_category'] = $this->model->get_records(['is_active' => '1'],'main_category');

		$category = $this->model->get_category_collection(['c.is_active' => '1','mc.is_active' => '1','mcm.is_active' => '1']);//echo $this->db->last_query();exit;
		
		$this->data['category'] = $category;

		$this->data['text_data'] = $this->model->get_sub_category_collection(['c.is_active' => '1','mc.is_active' => '1','mcm.is_active' => '1','sc.is_active' => '1', 'ud.upload_type' => 'text']);

		$this->data['recent_post'] = $this->model->get_post_collection(['sc.is_active' => '1','ud.is_active' => '1'], '',3);

		$this->data['app_vision'] = $this->model->get_records(['is_active' => '1'],'app_vision',['*'],'app_vision_id desc',1);*/

		$this->data['video_post'] = $this->model->get_post_collection(['sc.is_active' => '1','ud.is_active' => '1','ud.upload_type' => 'video'], '',3);

		$this->data['audio_post'] = $this->model->get_post_collection(['sc.is_active' => '1','ud.is_active' => '1','ud.upload_type' => 'audio'], '',3);

		$this->data['case_study_post'] = $this->model->get_post_collection(['sc.is_active' => '1','ud.is_active' => '1','c.category_name' => 'Case Study'], '',3);
		//echo "<pre>";print_r($this->data);echo "</pre>";exit;
		$this->data['module'] = 'front';
		$this->data['plugins'] = ['front_paginate'];

		$this->set_view($this->data, 'home',  '_front');
	}



	function logout(){
		$session_key = config_item('session_data_key');
		$sessionData = array('user_id'=>'',	'user_name'=>'', 'role'=>'');
		
		$this->session->unset_userdata($session_key, $sessionData);
     	redirect('admin/login','refresh');
	}

	function contact(){

		$this->data['module'] = 'front';
		$this->data['plugins'] = ['select2','contact'];
		$this->data['facebook']['name'] = '@medicalconceptsinhindi';
		$this->data['facebook']['url'] = 'https://www.facebook.com/medicalconceptsinhindi/';
		$this->data['mail']['name'] = 'info@medicalconceptsinhindi.com';
		$this->data['mail']['url'] = 'mailto:info@medicalconceptsinhindi.com';
		$this->data['address']['name'] = 'Hormone Care and Research Center,
		<br>SB-5 Shastri Nagar, Ghaziabad – 201 002';

		$this->data['plugins'] = ['contact'];

		$title_txt = 'Contact Us';
		$this->set_view($this->data, 'contact', '_front', $title_txt);
	}

	function save(){

		$result = $this->model->contact_save();
		echo json_encode($result);
	}

	function about_us(){ 

		$this->data['module'] = 'front';
		$this->data['plugins'] = ['about-us'];

		$about_us = $this->model->get_records(['is_active' => '1'], 'app_vision', ['*'], 'app_vision_id desc', 1);
		
		$this->data['about_us'] = str_replace('\r\n', '', $about_us[0]->app_vision);

		$title_txt = 'About Us';
		$this->set_view($this->data, 'about_us', '_front', $title_txt);
	}

	function meta_cron(){

		$upload_data = $this->model->get_records(['is_active' => '1'],'upload_data',['*'],'upload_data_id asc');

		$i = 0;
		foreach ($upload_data as $key => $value) {
			
			$meta_exists = $this->model->get_records(['is_active' => '1', 'meta_upload_data_id' => $value->upload_data_id], 'meta_tag_details', ['*']);

			if(empty($meta_exists)){

				$meta_arr = array();
				$meta_arr['meta_upload_data_id'] = $value->upload_data_id;

				$title = str_replace(' ', '-', $value->upload_title);
				$title = str_replace('.', '', $title);
				$title = str_replace(',', '', $title);

				$meta_arr['meta_title'] = $title;
				$meta_arr['meta_description'] = $value->upload_title;
				$meta_arr['meta_keyword'] = str_replace('-', ',', $title);
				$meta_arr['meta_slug'] = $title;

				$insert_id = $this->model->_insert($meta_arr, 'meta_tag_details');

				if($insert_id){
					$i++;
				}
			}

		}

		echo $i;exit;
	}
}