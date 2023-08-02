<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends Generic_Controller
{

	private $module = 'comments';
	private $model_name = 'mdl_comments';
	private $csv_fields;
	
	function __construct() {
		parent::__construct();
		$this->load->model($this->model_name, 'model');

		$this->data['mainmenu'] = 'comments';
		$this->data['controller'] = $this->data['menu'] = $this->data['m_title'] = $this->module;
		$this->data['columns'] = ['Sub Category','Category','User Name','User Email','Comment','Comment Date','Approved Status','Action'];
		$this->csv_fields = ['Category Name'];
		
	}

	function options(){
		$this->session->is_Ajax_and_logged_in();

		$limit = $this->dropdownlength;
		$page = (int) $this->input->post('page') - 1;
		$page = ($page <= 0) ? 0 : $page;

		$new = array(); $json['results'] = array(); $filters = array();

		$s_term = (isset($_POST['search'])) ? $this->db->escape_like_str($_POST['search']) : '';
		$id = (isset($_POST['id'])) ? (int) $this->input->post('id') : 0;

		if($id){ $filters['c.category_id'] = $id; }

		$_options = $this->model->get_collection($filters, $s_term, $page * $limit, $limit);

		$_opt_count = count($this->model->get_collection($filters, $s_term));

		foreach($_options as $option){
			$new = [ 'id' => $option->sub_category_id, 'text' => $option->sub_category_name	];
			array_push($json['results'], $new);
		}
		
		$more = ($_opt_count > count($_options)) ? TRUE : FALSE;
		$json['pagination']['more'] = $more;

		echo json_encode($json);
	}

	function lists(){
		
		if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}

		$key_filters = array();

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);


		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, '', $key_filters);
		} else {
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page, $key_filters);			
		}

		$totalRec = count($this->model->get_collection($sfilters, $keywords, 0, 0, $key_filters));
		$this->paginate($this->data['controller'], $totalRec);

        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['paginate'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		$this->data['download_url'] = $this->data['controller'] . '/download';

        $title_txt = 'Manage '. ucfirst($this->module);

        if ($this->input->post('search') == TRUE) {
        	$this->load->view($this->data['controller'].'/results', $this->data);
        }else
        {
			$this->set_view($this->data, 'lists',  '_admin', $title_txt);
		}
	}

	function lists_new(){
		
		if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}

		$key_filters = array();

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);


		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			$this->data['collection'] = $this->model->get_collections_new($sfilters, $keywords, $this->perPage, '', $key_filters);
		} else {
			$this->data['collection'] = $this->model->get_collections_new($sfilters, $keywords, $this->perPage, $page, $key_filters);			
		}

		$totalRec = count($this->model->get_collections_new($sfilters, $keywords, 0, 0, $key_filters));
		$this->paginate($this->data['controller'], $totalRec);

        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['paginate'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists_new';
		$this->data['download_url'] = $this->data['controller'] . '/download_new';

        $title_txt = 'Manage '. ucfirst($this->module).' New';

        if ($this->input->post('search') == TRUE) {
        	$this->load->view($this->data['controller'].'/results_new', $this->data);
        }else
        {
			$this->set_view($this->data, 'lists_new',  '_admin', $title_txt);
		}
	}

	function remove(){
		$this->session->is_Ajax_and_logged_in();

		$response = $this->model->remove();
		echo json_encode($response);
	}

	function remove_new(){
		$this->session->is_Ajax_and_logged_in();

		$response = $this->model->remove_new();
		echo json_encode($response);
	}

	function download(){

		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$keywords = (isset($_GET['keywords'])) ? $_GET['keywords'] : '';

		$data = $this->model->get_collection([], $keywords);
		$fields = $this->model->_format_data_to_export($data);

		$this->download_file($this->data['controller'] . '-' . date('Y-m-d'), $fields);
	}

	function download_new(){

		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$keywords = (isset($_GET['keywords'])) ? $_GET['keywords'] : '';

		$data = $this->model->get_collections_new([], $keywords);
		$fields = $this->model->_format_data_to_export_new($data);

		$this->download_file($this->data['controller'] . '-' . date('Y-m-d'), $fields);
	}

	function comment_action(){

		$this->session->is_Ajax_and_logged_in();

		$response = $this->model->comments_action();
		echo json_encode($response);
	}

	function comment_action_new(){

		$this->session->is_Ajax_and_logged_in();

		$response = $this->model->comments_action_new();
		echo json_encode($response);
	}

	function view_on(){

		$array = $this->uri->uri_to_assoc();
		
		$link_key = $id = (array_key_exists('record', $array)) ? (int) $array['record'] : 0;
		//echo $link_key;exit;
		$this->data['post_id'] = $link_key;
		$title_txt = 'Manage '. ucfirst($this->module);
		$this->data['listing_url'] = $this->data['controller'] . '/comments_list_ajax';
		$this->data['download_url'] = $this->data['controller'] . '/download';
		$this->data['plugins'] = ['comment_paginate'];
		

		$this->set_view($this->data, 'comment_lists',  '_admin', $title_txt);
	}

	function view_on_new(){

		$array = $this->uri->uri_to_assoc();
		// print_r($array);die();
		$link_key = $id = (array_key_exists('record', $array)) ? (int) $array['record'] : 0;
		// echo $link_key;exit;
		$this->data['post_id'] = $link_key;
		$this->data['flag'] = 'post_new';
		$title_txt = 'Manage '. ucfirst($this->module).' New';
		$this->data['listing_url'] = $this->data['controller'] . '/comments_list_ajax_new';
		$this->data['download_url'] = $this->data['controller'] . '/download_new';
		$this->data['plugins'] = ['comment_paginate'];
		

		$this->set_view($this->data, 'comment_lists_new',  '_admin', $title_txt);
	}

	function comments_list_ajax(){

		if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}

		$key_filters = array();

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);

        $upload_data_id = !empty($this->input->post('post_id'))?$this->input->post('post_id'):''; 
		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		$sfilters['c.upload_data_id'] = $upload_data_id;

		if (!empty($keywords)) {
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, '', $key_filters);
		} else {
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page, $key_filters);			
		}
		//echo "<pre>";print_r($this->data['collection']);echo "</pre>";exit;
		$totalRec = count($this->model->get_collection($sfilters, $keywords, 0, 0, $key_filters));
		$this->paginate($this->data['controller'], $totalRec);

        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['paginate'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/comments_list_ajax';
		$this->data['download_url'] = $this->data['controller'] . '/download';

        $title_txt = 'Manage '. ucfirst($this->module);

        if ($this->input->post('search') == TRUE) {
        	$this->load->view($this->data['controller'].'/comment_results', $this->data);
        }else
        {
			$this->set_view($this->data, 'lists',  '_admin', $title_txt);
		}
	}

	function comments_list_ajax_new(){

		if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}

		$key_filters = array();

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);

        $post_id = !empty($this->input->post('post_id'))?$this->input->post('post_id'):''; 
		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		$sfilters['c.post_id'] = $post_id;

		if (!empty($keywords)) {
			$this->data['collection'] = $this->model->get_collections_new($sfilters, $keywords, $this->perPage, '', $key_filters);
		} else {
			$this->data['collection'] = $this->model->get_collections_new($sfilters, $keywords, $this->perPage, $page, $key_filters);			
		}
		//echo "<pre>";print_r($this->data['collection']);echo "</pre>";exit;
		$totalRec = count($this->model->get_collections_new($sfilters, $keywords, 0, 0, $key_filters));
		$this->paginate($this->data['controller'], $totalRec);

        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['paginate'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/comments_list_ajax_new';
		$this->data['download_url'] = $this->data['controller'] . '/download_new';

        $title_txt = 'Manage '. ucfirst($this->module).' New';

        if ($this->input->post('search') == TRUE) {
        	$this->load->view($this->data['controller'].'/comment_results_new', $this->data);
        }else
        {
			$this->set_view($this->data, 'lists_new',  '_admin', $title_txt);
		}
	}

}
