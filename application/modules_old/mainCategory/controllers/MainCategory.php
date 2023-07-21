<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MainCategory extends Generic_Controller
{
	private $module = 'mainCategory';
	private $model_name = 'mdl_maincategory';

	function __construct() {
		parent::__construct();
		$this->load->model($this->model_name, 'model');
		$this->load->helper('common_helper');

		//echo $key = bin2hex($this->encryption->create_key(16)); die();
		$this->data['controller'] = $this->data['mainmenu'] = $this->module;
		$this->data['menu'] = '';
		$this->csv_fields = ['Category Name'];
		$this->perPage = 12;
	}

	function index($id=''){
		
        $this->data['plugins'] = ['front_paginate'];
        $this->data['listing_url'] = $this->data['controller'] . '/lists';
        $this->data['download_url'] = $this->data['controller'] . '/download';

		if($id!=''){
						
	        $check_data = $this->model->get_records(['meta_slug' => urldecode($id), 'is_active' => '1'],'main_category',['*']);
	        
	        if(empty($check_data)){

	        	$title_txt = 'Error';
	        	$this->set_view($this->data, 'category_error', '_front', $title_txt);

	        }else{
	        	$this->data['main_category_id'] = $check_data[0]->main_category_id;	
	        	$this->data['main_category_slug'] = $check_data[0]->meta_slug;	 

	        	$this->data['video_post'] = $this->model->get_post_collection(['sc.is_active' => '1','ud.is_active' => '1','ud.upload_type' => 'video','mc.main_category_id' => $check_data[0]->main_category_id], '',3);

				$this->data['audio_post'] = $this->model->get_post_collection(['sc.is_active' => '1','ud.is_active' => '1','ud.upload_type' => 'audio','mc.main_category_id' => $check_data[0]->main_category_id], '',3);

				$this->data['case_study_post'] = $this->model->get_post_collection(['sc.is_active' => '1','ud.is_active' => '1','c.category_name' => 'Case Study','mc.main_category_id' => $check_data[0]->main_category_id], '',3);

				$this->data['text_post'] = $this->model->get_post_collection(['sc.is_active' => '1','ud.is_active' => '1','c.category_name' => 'Text','mc.main_category_id' => $check_data[0]->main_category_id], '',3);
				
		        $title_txt = $check_data[0]->main_category_name;       
		        
		        $this->set_view($this->data, 'category', '_front', $title_txt);	
	        }
	        

   		}else{
   			$title_txt = 'Error';
	        $this->set_view($this->data, 'category_error', '_front', $title_txt);
   		}
	}

	function postList($slug,$type){

		if($slug!='' && $type!=''){
						
			$check_data = $this->model->get_records(['meta_slug' => urldecode($slug), 'is_active' => '1'],'main_category',['*']);

			if(empty($check_data)){
				
				$title_txt = 'Error';
	        	$this->set_view($this->data, 'category_error', '_front', $title_txt);
			}else{

				$title_txt = ucfirst($this->module).' --> '.$check_data[0]->main_category_name.' --> '.ucfirst($type);

				$this->data['main_category_id'] = $check_data[0]->main_category_id;
				$this->data['type'] = $type;

		        $this->data['plugins'] = ['front_paginate','main_category_post'];
		        $this->data['listing_url'] = $this->data['controller'] . '/lists';
		        $this->data['download_url'] = $this->data['controller'] . '/download';
		        //print_r($this->data);exit;
		        $this->set_view($this->data, 'lists', '_front', $title_txt);	

			}	        

   		}else{
   			$title_txt = 'Error';
	        $this->set_view($this->data, 'category_error', '_front', $title_txt);
   		}
	}

	function lists(){

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);
		
		$array = $this->uri->uri_to_assoc();
		$id = (array_key_exists('id', $array)) ? (int) $array['id'] : 0;
		
		$main_category_id = $_POST['main_category_id'];
		$type = $_POST['post_type'];

		if($type=='caseStudy'){
			$sfilters['c.category_name'] = 'Case Study';
		}else if($type=='text'){
			$sfilters['c.category_name'] = 'Text';
		}else{
			$sfilters['ud.upload_type'] = $type;	
		}
		
		$sfilters['mc.main_category_id'] = $main_category_id;
		$sfilters['mc.is_active'] = "1";
		$sfilters['sc.is_active'] = "1";
		$sfilters['ud.is_active'] = "1";

		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			
			$this->data['collection'] = $this->model->get_post_collection($sfilters, $keywords, $this->perPage);
			
		} else {
			
			$this->data['collection'] = $this->model->get_post_collection($sfilters, $keywords, $this->perPage, $page);
		}
		//echo $this->db->last_query();exit;
		//echo "<pre>";print_r($this->data['collection']);echo "</pre>";exit;
	
		$totalRec = count($this->model->get_post_collection($sfilters, $keywords));
		
		$this->paginate_grid($this->data['controller'], $totalRec,'',$this->perPage);
		
		
		$this->data['sub_category_id'] = '';
        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['front_paginate','fancybox'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		$this->data['download_url'] = $this->data['controller'] . '/download';

        $title_txt = 'Manage '. ucfirst($this->module);
        $this->data['js'] = ['readmore.js'];

        if(isset($_POST['main_category_id'])){
        	
        	$this->load->view($this->data['controller'].'/listing_div_ajax', $this->data);
        }else{
        	
			$this->set_view($this->data, 'lists',  '_front', $title_txt);
		}
	}
}