<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Post extends Generic_Controller
{
	private $module = 'post';
	private $model_name = 'mdl_post';

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

		$this->data['plugins'] = ['post_comment','post'];
		
		if($id!=''){
			$sfilters = array();

			$page = $this->input->post('page');
	        $offset = (!$page) ? 0 : intval($page);

	        $check_data = $this->model->get_records(['meta_slug' => urldecode($id), 'is_active' => '1'],'meta_tag_details',['*']);
	        
	        if(!empty($check_data)){

	        	
	        	$sfilters['ud.upload_data_id'] = $check_data[0]->meta_upload_data_id;
				$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

				if (!empty($keywords)) {
					
					$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage);
					
				} else {
					
					$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page);
				}
				//print_r($this->data['collection']);exit;
				$insert_seen_data = array();
	        	$insert_seen_data['upload_data_id'] = $this->data['collection'][0]->upload_data_id;
	        	$insert_seen_data['sub_category_id'] = $this->data['collection'][0]->sub_category_id;
	        	$insert_seen_data['category_id'] = $this->data['collection'][0]->category_id;
	        	$insert_seen_data['seen_date_time'] = date('Y-m-d H:i:s');

	        	$seen_data_insert = $this->model->_insert($insert_seen_data, 'users_data_seen');
	        	
				$seen_data = $this->model->get_seen_count(['us.upload_data_id' => $check_data[0]->meta_upload_data_id]);
				if(!empty($seen_data)){
					$this->data['seen_count'] = $seen_data[0]->seen_count;
				}else{
					$this->data['seen_count'] = 0;
				}
				

		        $title_txt = ucfirst($this->module);
		        $this->data['js'] = ['readmore.js'];		        

		        $this->set_view($this->data, 'post', '_front', $title_txt);
	        }else{

	        	$title_txt = 'Error';
	        	$this->set_view($this->data, 'post_error', '_front', $title_txt);
	        }
   		}else{
   			$title_txt = 'Error';
	        $this->set_view($this->data, 'post_error', '_front', $title_txt);
   		}

		
	}

	function lists(){

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);
		
		$array = $this->uri->uri_to_assoc();
		$id = (array_key_exists('id', $array)) ? (int) $array['id'] : 0;
		if($id != 0){
			$sfilters["sc.sub_category_id"] = $id;
		}
		
		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage);
			
		} else {
			
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page);
		}
	
		$totalRec = count($this->model->get_collection($sfilters, $keywords));
		$this->paginate($this->data['controller'], $totalRec);

        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['front_paginate','fancybox'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		$this->data['download_url'] = $this->data['controller'] . '/download';

		if(!empty($keywords)){
			$title_txt = ucfirst($this->module).' ('.ucwords($keywords).' )';
		}else{
			$title_txt = ucfirst($this->module);	
		}
        
        $this->data['js'] = ['readmore.js'];

        if ($this->input->post('search') == TRUE) {
        	$this->load->view($this->data['controller'].'/results', $this->data);
        }else
        {
			$this->set_view($this->data, 'lists',  '_front', $title_txt);
		}
	}

	function listing_ajax(){

		
		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);
		

		$array = $this->uri->uri_to_assoc();
		$id = (array_key_exists('id', $array)) ? (int) $array['id'] : 0;
		
		if(isset($_POST['upload_data_id'])){
			$upload_data_id = isset($_POST['upload_data_id']) ? $_POST['upload_data_id'] : '';
			$sfilters['c.upload_data_id'] = $upload_data_id;
		}

		if(isset($_POST['d_type']) && $_POST['d_type']=='post'){			
			$this->perPage = 3;
		}else if(isset($_POST['d_type']) && $_POST['d_type']=='comment'){
			$this->perPage = 5;
		}
		
		$this->data['comments'] = $this->model->get_post_comments($sfilters, '', $this->perPage, $page);
		
		$totalRec = count($this->model->get_post_comments($sfilters, ''));
		$this->data['total_comments'] = $totalRec;
		if(isset($_POST['d_type']) && $_POST['d_type']=='comment'){ 
			
			$this->paginate_grid($this->data['controller'], $totalRec,'',$this->perPage);
		}
		
        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['front_paginate','fancybox'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		$this->data['download_url'] = $this->data['controller'] . '/download';

        $title_txt = 'Manage '. ucfirst($this->module);
        $this->data['js'] = ['readmore.js'];

        if ($this->input->post('search') == TRUE && $_POST['d_type']=='comment') {
        	
        	$this->load->view($this->data['controller'].'/comments_ajax', $this->data);

        }else if(isset($_POST['d_type']) && $_POST['d_type']=='post'){
        	
        	$this->load->view($this->data['controller'].'/post_comments_ajax', $this->data);
        }else{
        	
			$this->set_view($this->data, 'lists',  '_front', $title_txt);
		}
	}

	function save_comments(){

		$result = $this->model->save_comments();
		echo json_encode($result);
	}

	function comments($id=''){

		if($id!=''){
				
			$this->data['upload_data_id'] = $id;

			$uploaded_data = $this->model->get_records(['upload_data_id' => $id, 'is_active' => '1'],'upload_data',['*']);

	        $title_txt = 'Comments --> '.$uploaded_data[0]->upload_title;
	        $this->data['plugins'] = ['front_paginate','post_comment'];
	        $this->data['controller'] = 'post';
	        $this->data['listing_url'] = $this->data['controller'] . '/listing_ajax';
	        $this->data['download_url'] = $this->data['controller'] . '/download';

	        $this->set_view($this->data, 'comment_lists', '_front', $title_txt);

   		}else{
   			$title_txt = 'Error';
	        $this->set_view($this->data, 'post_error', '_front', $title_txt);
   		}		
	}
}