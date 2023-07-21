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
	
	function getcategoryid($slug,$type){
	    if($slug == "health-education" && $type == "text"){
		    $category_id= 1;
		}if($slug == "health-education" && $type == "audio"){
		    $category_id= 2;
		}if($slug == "health-education" && $type == "video"){
		    $category_id= 3;
		}if($slug == "health-education" && $type == "caseStudy"){
		    $category_id= 5;
		}
		
		if($slug == "medical-education" && $type == "text"){
		    $category_id= 6;
		}if($slug == "medical-education" && $type == "audio"){
		    $category_id= 7;
		}if($slug == "medical-education" && $type == "video"){
		    $category_id= 8;
		}if($slug == "medical-education" && $type == "caseStudy"){
		    $category_id= 9;
		}
		
		if($type == "forum"){
		    $category_id= 17;
		}if($type == "event"){
		    $category_id= 18;
		}
				
	    return $category_id;
	}
	
	function folders($slug,$type){
	    $slugarray= array('health-education','medical-education');
	    $typearray= array('text','audio','video','caseStudy','forum','event');
		
		if(in_array($slug,$slugarray) && in_array($type,$typearray)){
		    if($slug!='' && $type!=''){
						
			$check_data = $this->model->get_records(['meta_slug' => urldecode($slug), 'is_active' => '1'],'main_category',['*']);

			if(empty($check_data)){
				
				$title_txt = 'Error';
	        	$this->set_view($this->data, 'category_error', '_front', $title_txt);
			}else{
				$title_txt = $check_data[0]->main_category_name.' --> '.ucfirst($type);
				
				$this->data['main_category_id'] = $check_data[0]->main_category_id;
				$this->data['type'] = $type;

		        $this->data['plugins'] = ['front_paginate','main_category_post'];
		        $this->data['listing_url'] = $this->data['controller'] . '/lists';
		        $this->data['download_url'] = $this->data['controller'] . '/download';
				
				$dbcatID= $this->getcategoryid($slug,$type);
				$this->data['folders'] = $this->model->getfolders($dbcatID);
				$this->data['pg_cord'] = ucwords($slug)."-->".ucwords($type)."-->Folders";
				$this->data['slug'] = $slug;
		      //  print_r($this->data['slug']);die;
		        
		        $this->set_view($this->data, 'folders', '_front', $title_txt);	
			}	        

       		}else{
       			$title_txt = 'Error';
    	        $this->set_view($this->data, 'category_error', '_front', $title_txt);
       		}
		}else{
		    $this->data['plugins'] = ['front_paginate','main_category_post'];
            $title_txt = 'Error';
            $this->set_view($this->data, 'category_error', '_front', $title_txt);
		}
	}
	
	function subCategories($slug,$type,$folder_id,$category_id){
		if($slug != "" && $type !='' && $folder_id !='' && $category_id !=''){
		    $slugarray= array('health-education','medical-education');
    	    $typearray= array('text','audio','video','caseStudy','forum','event');
    		
    		if(in_array($slug,$slugarray) && in_array($type,$typearray)){
    		    $_SESSION['folder_id']="";
    			$_SESSION['category_id']="";
    
    			$check_data = $this->model->get_records(['meta_slug' => urldecode($slug), 'is_active' => '1'],'main_category',['*']);
    
    			if(empty($check_data)){
    				$title_txt = 'Error';
    	        	$this->set_view($this->data, 'category_error', '_front', $title_txt);
    			}else{
    			    $title_txt = $check_data[0]->main_category_name.' --> '.ucfirst($type);
				
    				$this->data['main_category_id'] = $check_data[0]->main_category_id;
    				$this->data['type'] = $type;
    
    		        $this->data['plugins'] = ['front_paginate','main_category_post'];
    		        $this->data['listing_url'] = $this->data['controller'] . '/lists';
    		        $this->data['download_url'] = $this->data['controller'] . '/download';
    				
    				$this->data['subcategories'] = $this->model->getfoldersubcategories($folder_id,$category_id);
    				$this->data['pg_cord'] = ucwords($slug)."-->".ucwords($type)."-->".ucwords('sub-categories');
    				$this->data['slug'] = $slug;
    				
    				$_SESSION['folder_id']=$folder_id;
    				$_SESSION['category_id']=$category_id;
    				$_SESSION['sub_category_id']= "";
    				
    		      //  print_r($this->data['subcategories']);die;
    		        
    		        $this->set_view($this->data, 'lists', '_front', $title_txt);
    			}
    		    
    		}else{
    		    $this->data['plugins'] = ['front_paginate','main_category_post'];
                $title_txt = 'Error';
                $this->set_view($this->data, 'category_error', '_front', $title_txt);
    		}
		}else{
		    $this->data['plugins'] = ['front_paginate','main_category_post'];
            $title_txt = 'Error';
            $this->set_view($this->data, 'category_error', '_front', $title_txt);
		}
	}

	function subCategory($slug,$type,$category_id,$sub_category_id){
		if($slug != "" && $type !='' && $category_id !='' && $sub_category_id !=''){
		    $_SESSION['category_id']="";
			$_SESSION['sub_category_id']="";

			$check_data = $this->model->get_records(['meta_slug' => urldecode($slug), 'is_active' => '1'],'main_category',['*']);

			if(empty($check_data)){
				$title_txt = 'Error';
	        	$this->set_view($this->data, 'category_error', '_front', $title_txt);
			}else{
				$title_txt = $check_data[0]->main_category_name.' --> '.ucfirst($type);
				$this->data['main_category_id'] = $check_data[0]->main_category_id;
				$this->data['type'] = $type;

		        $this->data['plugins'] = ['front_paginate','main_category_post'];
		        $this->data['listing_url'] = $this->data['controller'] . '/lists';
		        $this->data['download_url'] = $this->data['controller'] . '/download';
				
				$this->data['subcategory_data'] = $this->model->getsubcategory($category_id,$sub_category_id);
				$this->data['pg_cord'] = ucwords($slug)."-->".ucwords($type);
				$this->data['slug'] = $slug;
				
				$_SESSION['category_id']=$category_id;
				$_SESSION['sub_category_id']=$sub_category_id;
				$_SESSION['folder_id']= "";
				
		      //  print_r($this->data['subcategory_data']);die;
		        
		        $this->set_view($this->data, 'lists', '_front', $title_txt);	
			}	        

		}else{
		    $this->data['plugins'] = ['front_paginate','main_category_post'];
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
		
		if($main_category_id == 1){
		    $slug= "health-education";
		}if($main_category_id == 2){
		    $slug= "medical-education";
		}
        
		$category_id= $_SESSION['category_id'];
		$sub_category_id= $_SESSION['sub_category_id'];
		$folder_id= $_SESSION['folder_id'];
		
		if(!empty($category_id) && !empty($sub_category_id)){
		    $this->data['collection'] = $this->model->getsubcategory($category_id,$sub_category_id,$this->perPage, $page);
		    $totalRec = count($this->model->getsubcategory($category_id,$sub_category_id));
		}elseif(!empty($folder_id) && !empty($category_id)){
		    $this->data['collection'] = $this->model->getfoldersubcategories($folder_id,$category_id,$this->perPage, $page);
		    $totalRec = count($this->model->getfoldersubcategories($folder_id,$category_id));
		}
		
		$this->paginate_grid($this->data['controller'], $totalRec,'',$this->perPage);
		
		
		$this->data['slug'] = $slug;
		$this->data['type'] = $type;
		
		$this->data['sub_category_id'] = "";
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
	
	function postList($slug,$type){

		if($slug!='' && $type!=''){
						
			$check_data = $this->model->get_records(['meta_slug' => urldecode($slug), 'is_active' => '1'],'main_category',['*']);

			if(empty($check_data)){
				
				$title_txt = 'Error';
	        	$this->set_view($this->data, 'category_error', '_front', $title_txt);
			}else{

				// $title_txt = ucfirst($this->module).' --> '.$check_data[0]->main_category_name.' --> '.ucfirst($type);
				$title_txt = $check_data[0]->main_category_name.' --> '.ucfirst($type);

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
}