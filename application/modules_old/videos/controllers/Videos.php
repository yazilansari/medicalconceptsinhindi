<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Videos extends Generic_Controller
{
	private $module = 'videos';
	private $model_name = 'mdl_videos';

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

	function lists(){


		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);
		
		$array = $this->uri->uri_to_assoc();
		$id = (array_key_exists('id', $array)) ? (int) $array['id'] : 0;
		if($id != 0){
			$sfilters["sc.sub_category_id"] = $id;
		}

		$sfilters['ud.upload_type'] = 'video';
		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage);
			
		} else {
			
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page);
		}

		//echo "<pre>";print_r($this->data['collection']);echo "</pre>";exit;
	
		$totalRec = count($this->model->get_collection($sfilters, $keywords));
		$this->paginate($this->data['controller'], $totalRec);

        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['front_paginate','fancybox'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		$this->data['download_url'] = $this->data['controller'] . '/download';

        $title_txt = 'Manage '. ucfirst($this->module);
        $this->data['js'] = ['readmore.js'];

        if ($this->input->post('search') == TRUE) {
        	$this->load->view($this->data['controller'].'/results', $this->data);
        }else
        {
			$this->set_view($this->data, 'lists',  '_front', $title_txt);
		}
	}
}