<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); 
class Generic_Controller extends MX_Controller{
	protected $data = [];
	protected $perPage;
	protected $dropdownlength;

    function __construct(){
        parent::__construct();
		$this->data['timestamp'] = time();
		$this->data['active_theme'] = 'orange';
		$this->perPage = PAGINATION_PAGE;
		$this->dropdownlength = 15;
	}
	
	protected function get_template(){
		$role = $this->session->get_field_from_session();
		
		if($role == 'SA'){$template = '_admin';}
		if($role == 'HO'){$template = '_ho';}
		if($role == 'ASM'){$template = '_user';}
		if($role == 'DR'){$template = '_doctor';}
		if($role==''){$template = '_front';}

		return $template;
	}

    protected function paginate($module = '', $totalRec = '', $uri_segment = 3, $perPage = '' ){

		$this->load->library('Ajax_pagination');

	 	$config['first_link']  = 'First';
        $config['div']         = 'records-list'; //parent div tag id
        $config['base_url']    = base_url(). $module .'/results';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = (!empty($perPage)) ? $perPage : $this->perPage;
        $config['anchor_class']= 'page-bullets';
        $config['uri_segment'] = $uri_segment;
        //print_r($config);exit;
        $this->ajax_pagination->initialize($config);
	}

	protected function paginate_grid($module = '', $totalRec = '', $uri_segment = 5, $perPage = '' ){

		$this->load->library('Ajax_pagination');

	 	$config['first_link']  = 'First';
        $config['div']         = 'grid-table'; //parent div tag id
        $config['base_url']    = base_url(). $module .'/listing_ajax';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = (!empty($perPage)) ? $perPage : $this->perPage;
        $config['anchor_class_grid']= 'grid-bullets';
        $config['uri_segment'] = 3;
        
        $this->ajax_pagination->initialize($config);
	}

	protected function set_view($data = [], $view = '', $template = '',  $title = ''){
		
		$template = $template;
		$data['viewFile'] = (! empty($view)) ? $view : 'no-view';
		$data['pg_title'] = (! empty($title) ) ? $title : (isset($data['pg_title']) ? $data['pg_title'] : config_item('title')) ;

		if( ! empty($template) ){
			echo Modules::run('template/'. $template, $data);
		}
		else{
			echo $this->load->view($view, $data);
		}
	}

	protected function download_file($title = 'Excel', $fields = []){

		$this->load->library('export');
		$report_title = ucfirst($title) . '_Report-' . date('Y-m-d') . '.xls';
		$this->export->download_send_headers( $report_title );

		$this->export->array2csv($fields);
	}

	protected function get_user_permissions(){

		$user_type = $this->session->get_field_from_session('role');

		$permissions = [
			"SA"=> [
				'can_edit'=> 1,
				'can_add'=> 1,
				'can_upload'=> 1,
				'can_delete'=> 1,
				'can_download'=> 1
			],
			"HO"=> [
				'can_edit'=> 0,
				'can_add'=> 0,
				'can_upload'=> 0,
				'can_delete'=> 0,
				'can_download'=> 1
			],
			"DA"=> [
				'can_edit'=> 1,
				'can_add'=> 1,
				'can_upload'=> 1,
				'can_delete'=> 1,
				'can_download'=> 1
			],
		];

		if(!in_array($user_type, ['SA', 'HO', 'DA'])){
			$user_type = 'SA';
		}

		return $permissions[$user_type];
	}
       
}