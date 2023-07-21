<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Text extends Generic_Controller
{
	private $module = 'text';
	private $model_name = 'mdl_text';

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

	function index($id='',$folder_id=''){
		
		if($id!=''){
			
			$this->data['sub_category_id'] = $id;
			$this->data['folder_id'] = $folder_id;
			if($folder_id == ''){
				$sub_category_data = $this->model->get_records(['sub_category_id' => $id, 'is_active' => '1'],'sub_category',['*']);
	        	$title_txt = ucfirst($this->module).' --> '.$sub_category_data[0]->sub_category_name;
			}else{
				
				$sub_category_data = $this->model->get_folder_records(['sc.folder_id' => $folder_id,'sc.is_active' => '1'],'sub_category',['*']);
	        	$title_txt = ucfirst($this->module).' --> '.$sub_category_data[0]->folder_name;
	        	$this->data['sub_category_data'] = $sub_category_data;
			}
			//echo '<pre>';var_dump($sub_category_data);exit;
	        $this->data['plugins'] = ['front_paginate','consum'];
	        $this->data['listing_url'] = $this->data['controller'] . '/lists';
	        $this->data['download_url'] = $this->data['controller'] . '/download';
		if($folder_id ==''){
			
	        $this->set_view($this->data, 'lists', '_front', $title_txt);

		}else{
			//var_dump($this->data);exit;
	        $this->set_view($this->data, 'folderlists', '_front', $title_txt);
		}
		

   		}else{
   			$title_txt = 'Error';
	        $this->set_view($this->data, 'post_error', '_front', $title_txt);
   		}
	}

	/*function folder($folder_id='',$id=''){
		if($id!=''){
			$this->data['sub_category_id'] = $id;	
			$this->data['folder_id'] = $folder_id;

			$sub_category_data = $this->model->get_records_by_folder(['sub_category_id' => $id,'folder_id' => $folder_id ,'is_active' => '1'],'sub_category',['*']);

	        $title_txt = ucfirst($this->module).' --> '.$sub_category_data[0]->sub_category_name;
	        $this->data['plugins'] = ['front_paginate','consum'];
	        $this->data['listing_url'] = $this->data['controller'] . '/lists';
	        $this->data['download_url'] = $this->data['controller'] . '/download';

	        $this->set_view($this->data, 'lists', '_front', $title_txt);

   		}else{
   			$title_txt = 'Error';
	        $this->set_view($this->data, 'post_error', '_front', $title_txt);
   		}
	}*/

	function lists(){
		

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);
		
		$array = $this->uri->uri_to_assoc();
		$id = (array_key_exists('id', $array)) ? (int) $array['id'] : 0;
		
		
		if(isset($_POST['sub_category_id'])){
			$sub_category_id = isset($_POST['sub_category_id']) ? $_POST['sub_category_id'] : '';
			$sfilters['ud.sub_category_id'] = $sub_category_id;
		}

		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage);
			
		} else {
			
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page);
		}
		
		//echo "<pre>";print_r($this->data['collection']);echo "</pre>";exit;
	
		$totalRec = count($this->model->get_collection($sfilters, $keywords));
		if(isset($_POST['sub_category_id'])){ 
			$this->paginate_grid($this->data['controller'], $totalRec,'',$this->perPage);
		}else{
			$this->paginate($this->data['controller'], $totalRec);	
		}
		
		$this->data['sub_category_id'] = '';
        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['front_paginate','fancybox'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		$this->data['download_url'] = $this->data['controller'] . '/download';

        $title_txt = 'Manage '. ucfirst($this->module);
        $this->data['js'] = ['readmore.js'];

        if ($this->input->post('search') == TRUE && !isset($_POST['sub_category_id'])) {
        	$this->load->view($this->data['controller'].'/results', $this->data);
        }else if(isset($_POST['sub_category_id'])){
        	
        	$this->load->view($this->data['controller'].'/listing_div_ajax', $this->data);
        }else{
        	
			$this->set_view($this->data, 'lists',  '_front', $title_txt);
		}
	}
}