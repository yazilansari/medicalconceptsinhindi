<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends Generic_Controller
{

	private $module = 'posts';
	private $model_name = 'mdl_posts';
	private $csv_fields;
	
	function __construct() {
		parent::__construct();
		$this->load->model($this->model_name, 'model');
		$this->session_key = config_item('session_data_key');
		$this->data['mainmenu'] = 'posts';
		$this->data['controller'] = $this->data['menu'] = $this->data['m_title'] = $this->module;
		$this->data['columns'] = ['Posts Title','Category','Sub Category','Total Comments','Short Description','User Type','Upload Type','Upload Description','Upload File','Upload Tags'/*,'Sort Order','Meta Title','Meta Description','Meta Keyword'*/,'Meta Post Url'/*,'Meta Slug'*/,'Added Datetime'];
		$this->data['columns_posts'] = ['Posts Title','Category','Sub Category','Total Comments', 'Upload Type', 'Added Datetime'];
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

		if($id){ $filters['category_id'] = $id; }

		$_options = $this->model->get_collection($filters, $s_term, $page * $limit, $limit);

		$_opt_count = count($this->model->get_collection($filters, $s_term));

		foreach($_options as $option){
			$new = [ 'id' => $option->category_id, 'text' => $option->category_name	];
			array_push($json['results'], $new);
		}
		
		$more = ($_opt_count > count($_options)) ? TRUE : FALSE;
		$json['pagination']['more'] = $more;

		echo json_encode($json);
	}

	function search(){

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);
		
		$array = $this->uri->uri_to_assoc();
		$id = (array_key_exists('id', $array)) ? (int) $array['id'] : 0;
		
		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
						
			$this->data['collection'] = $this->model->get_search_collection($sfilters, $keywords, $this->perPage);
			
		} else {
			/*if($this->input->post('main_category_id')!="") {
					$sfilters['main_category_id'] = $this->input->post('main_category_id');
				}*/		
			if($this->input->post('category_id')!="") {
					$sfilters['ud.category_id'] = $this->input->post('category_id');
				}	
			if($this->input->post('sub_category_id')!="") {
					$sfilters['ud.sub_category_id'] = $this->input->post('sub_category_id');
				}		
			/*if($this->input->post('folder_id')!="") {
					$sfilters['folder_id'] = $this->input->post('folder_id');
				}*/			
			$this->data['collection'] = $this->model->get_search_collection($sfilters, $keywords, $this->perPage, $page);

		}

	
		$totalRec = count($this->model->get_collection($sfilters, $keywords));
		$this->paginate($this->data['controller'], $totalRec);

		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		$this->data['download_url'] = $this->data['controller'] . '/download';
		$this->data['searching_url'] = $this->data['controller'] . '/search';

        $title_txt = 'Manage '. ucfirst($this->module);
        $this->data['js'] = ['readmore.js','generic-add.js', 'subcategory.js'];

        if ($this->input->post('search') == 1) {
        	$catid = $this->input->post('category_id');
        		$this->session->set_userdata('category_id',$catid);
        	$sub_category_id = $this->input->post('sub_category_id');
        		$this->session->set_userdata('sub_category_id',$sub_category_id);
        	$this->load->view($this->data['controller'].'/results', $this->data);
        }else
        {
			$this->set_view($this->data, 'lists',  '_admin', $title_txt);
		}
	}


	function lists(){
		//var_dump($_POST);exit;
		if( ! $this->session->is_logged_in()){
			redirect('admin/login','refresh');
		}

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);
		
		$array = $this->uri->uri_to_assoc();
		$id = (array_key_exists('id', $array)) ? (int) $array['id'] : 0;
		if($id != 0){
			$sfilters["sc.sub_category_id"] = $id ;
		}
		if($this->input->get('all') == 'all_results'){
			$this->session->unset_userdata('category_id');
			$this->session->unset_userdata('sub_category_id');

		}else{
		//var_dump($_SESSION);exit;

			if(isset($_SESSION["category_id"])){
					//$this->session->setuserdata('category_id');

					$sfilters['ud.category_id'] = $_SESSION['category_id'];
			}
			if(isset($_SESSION['sub_category_id'])){
				   $sfilters['ud.sub_category_id'] = $_SESSION['sub_category_id'];
			}
			//	$this->session->unset_userdata($_SESSION['category_id']);
			
			//	$this->session->unset_userdata($_SESSION['sub_category_id']);
			
		}
		//var_dump($sfilters);exit;

		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage);
			
		} else {
			
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page);
		}
		/*if( isset($_SESSION['category_id']) && !empty($_SESSION['sub_category_id'])){

			$this->data['sort_collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page);
		}*/

		$totalRec = count($this->model->get_collection($sfilters, $keywords));
		$this->paginate($this->data['controller'], $totalRec);

        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['paginate','fancybox','select2'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		$this->data['download_url'] = $this->data['controller'] . '/download';
		$this->data['searching_url'] = $this->data['controller'] . '/search';

        $title_txt = 'Manage '. ucfirst($this->module);
        $this->data['js'] = ['readmore.js','generic-add.js', 'searchpost.js'];

        if ($this->input->post('search') == 1) {
        	$this->load->view($this->data['controller'].'/results', $this->data);
        }else
        {
        	/*$this->session->unset_userdata('category_id');
			$this->session->unset_userdata('sub_category_id');*/
			
			$this->set_view($this->data, 'lists',  '_admin', $title_txt);
		}
	}

	function lists_new(){
		//var_dump($_POST);exit;
		if( ! $this->session->is_logged_in()){
			redirect('admin/login','refresh');
		}

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);
		
		// $array = $this->uri->uri_to_assoc();
		// $id = (array_key_exists('id', $array)) ? (int) $array['id'] : 0;
		// if($id != 0){
		// 	$sfilters["sc.sub_category_id"] = $id ;
		// }
		// if($this->input->get('all') == 'all_results'){
		// 	$this->session->unset_userdata('category_id');
		// 	$this->session->unset_userdata('sub_category_id');

		// }else{
		// //var_dump($_SESSION);exit;

		// 	if(isset($_SESSION["category_id"])){
		// 			//$this->session->setuserdata('category_id');

		// 			$sfilters['ud.category_id'] = $_SESSION['category_id'];
		// 	}
		// 	if(isset($_SESSION['sub_category_id'])){
		// 		   $sfilters['ud.sub_category_id'] = $_SESSION['sub_category_id'];
		// 	}
		// 	//	$this->session->unset_userdata($_SESSION['category_id']);
			
		// 	//	$this->session->unset_userdata($_SESSION['sub_category_id']);
			
		// }
		//var_dump($sfilters);exit;

		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			
			$this->data['collection'] = $this->model->get_collections_new($sfilters, $keywords, $this->perPage);
			
		} else {
			
			$this->data['collection'] = $this->model->get_collections_new($sfilters, $keywords, $this->perPage, $page);
		}
		/*if( isset($_SESSION['category_id']) && !empty($_SESSION['sub_category_id'])){

			$this->data['sort_collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page);
		}*/

		$totalRec = count($this->model->get_collections_new($sfilters, $keywords));
		$this->paginate($this->data['controller'], $totalRec);

        $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['paginate','fancybox','select2'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists_new';
		$this->data['download_url'] = $this->data['controller'] . '/download_new';
		$this->data['searching_url'] = $this->data['controller'] . '/search_new';

        $title_txt = 'Manage '. ucfirst($this->module);
        $this->data['js'] = ['readmore.js','generic-add.js', 'searchpost.js'];

        if ($this->input->post('search') == 1) {
        	$this->load->view($this->data['controller'].'/results_new', $this->data);
        }else
        {
        	/*$this->session->unset_userdata('category_id');
			$this->session->unset_userdata('sub_category_id');*/
			
			$this->set_view($this->data, 'lists_new',  '_admin', $title_txt);
		}
	}

	function filter(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$this->data['plugins'] = ['select2','medium-editor'];
		$this->data['js'] = ['generic-add.js', 'posts.js'];

		$title_txt = 'Add '. ucfirst($this->module);

		$this->set_view($this->data, 'filter', '_admin', $title_txt);
	}

	function add(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$this->data['plugins'] = ['select2','medium-editor'];
		$this->data['js'] = ['generic-add.js', 'posts.js'];

		$title_txt = 'Add '. ucfirst($this->module);

		$this->set_view($this->data, 'add', '_admin', $title_txt);
	}

	function add_new(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$this->data['plugins'] = ['select2','medium-editor'];
		$this->data['js'] = ['generic-add.js', 'posts.js'];

		$title_txt = 'Add '. ucfirst($this->module).' New';

		$this->set_view($this->data, 'add_new', '_admin', $title_txt);
	}

	function edit(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$array = $this->uri->uri_to_assoc();
		$key = $this->model->p_key;

		$this->data[$key] = $id = (array_key_exists('record', $array)) ? (int) $array['record'] : 0;
		
		$this->data['info'] = $this->model->get_collection([ "ud.upload_data_id" => $id ]);
		//echo "<pre>";print_r($this->data);echo "</pre>";exit;
		if(! count($this->data['info']) ){ show_404(); }

		$this->data['plugins'] = ['select2','medium-editor'];
		$this->data['js']	= ['generic-edit.js', 'posts.js'];

		$title_txt = 'Edit '. ucfirst($this->module).' New';
		$this->set_view($this->data, 'edit', '_admin',$title_txt);
	}

	function edit_new(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$array = $this->uri->uri_to_assoc();
		$key = $this->model->p_key;

		$this->data[$key] = $id = (array_key_exists('record', $array)) ? (int) $array['record'] : 0;
		
		$this->data['info'] = $this->model->get_collections_new([ "p.id" => $id ]);
		//echo "<pre>";print_r($this->data);echo "</pre>";exit;
		if(! count($this->data['info']) ){ show_404(); }

		$this->data['plugins'] = ['select2','medium-editor'];
		$this->data['js']	= ['generic-edit.js', 'posts.js'];

		$title_txt = 'Edit '. ucfirst($this->module).' New';
		$this->set_view($this->data, 'edit_new', '_admin',$title_txt);
	}

	function save(){
		$this->session->is_Ajax_and_logged_in();

		if(isset($_SESSION["category_id"])){
					$this->session->unset_userdata('category_id');
			}
			if(isset($_SESSION["category_id"])){
					$this->session->unset_userdata('sub_category_id');
			}
		$result = $this->model->save();
		echo json_encode($result);
	}

	function save_new(){
		$this->session->is_Ajax_and_logged_in();

		if(isset($_SESSION["category_id"])){
					$this->session->unset_userdata('category_id');
			}
			if(isset($_SESSION["category_id"])){
					$this->session->unset_userdata('sub_category_id');
			}
		$result = $this->model->save_new();
		echo json_encode($result);
	}

	function modify(){
		$this->session->is_Ajax_and_logged_in();

		$result = $this->model->modify();
		echo json_encode($result);
	}

	function modify_new(){
		$this->session->is_Ajax_and_logged_in();

		$result = $this->model->modify_new();
		echo json_encode($result);
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

	function uploadcsv(){
		$this->session->is_Ajax_and_logged_in();
		/*upload csv file */

		if(! is_uploaded_file($_FILES['csvfile']['tmp_name'])){
			echo json_encode(['errors'=> ['csvfile'=> '<label class="error">Please Select CSV file</label>']]); exit;
		}

		if(!in_array($_FILES['csvfile']['type'], array('application/vnd.ms-excel', 'application/csv', 'text/csv')) ){
			echo json_encode(['errors'=> ['csvfile'=> '<label class="error">Only .CSV files allowed</label>']]); exit;
		}

		$file = $_FILES['csvfile']['tmp_name'];
		$handle = fopen($file, "r");
		$cnt = 0; $newrows = 0;

		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){

			if($cnt != 0){
				$area_name = trim($data[0]);
				$region_name = trim($data[1]);
				$zone_name = trim($data[2]);

				if( empty($area_name) || empty($region_name) || empty($zone_name) ){
					continue;
				}

				/*if( !preg_match('/^[a-zA-Z][a-zA-Z0-9 ]+$/', $area_name) ){
					continue;
				}*/

				$this->load->model('region/mdl_region');
				$record = $this->mdl_region->get_collection(['region_name'=> $region_name, 'zone_name'=> $zone_name], '', 1);

				if( ! count($record) ){
					continue;
				}

				$region_id = $record[0]->region_id;
				$zone_id = $record[0]->zone_id;

				$filters = [
					'area_name'=> $area_name, 
					'region_id'=> $region_id,
				];

				$a_records = $this->model->get_records($filters, 'area', ['area_id', 'area_name'], 'area_id', 1);

				if( count($a_records) ){ continue; }

				$insert['area_name'] = $area_name;
				$insert['region_id'] = $region_id;

				$this->model->_insert($insert);
				$newrows++;
			}

			$cnt++;
		}

		fclose($handle);

		echo json_encode(['newrows'=> "$newrows record(s) added successfully"]);
	}

	function listing_ajax(){

		if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}

		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$from = $this->input->post('from');
		$keywords = $this->input->post('keywords');
		//print_r($_POST);exit;
		$sfilters = [];

		$page = $this->input->post('page');
		$totalRec = '';
		
        $offset = (!$page) ? 0 : intval($page);
        $this->perPage = 5;

        $view_file_name = '';

		switch ($from) {
 
			case 'comments':
			
				$this->data['columns'] = ['User Name','User Email','Comment','Comment Date Time'];

				$sfilters = array("ud.upload_data_id" => $id);
				
				if($page==1 || $page==0){
					$this->data['collection'] = $this->model->get_upload_data_comments_collection($sfilters, $keywords, $this->perPage);
				}else if($page>1){
					$this->data['collection'] = $this->model->get_upload_data_comments_collection($sfilters, $keywords, $this->perPage, $page);	
				}

				$totalRec = count($this->model->get_upload_data_comments_collection($sfilters, $keywords));
				//print_r($this->data['collection']);exit;
				$view_file_name='listing_ajax';

				break;

			case 'patient_invoice':
			
				$this->data['columns'] = ['Invoice Image','Action'];

				$sfilters = array("pi.patient_id" => $id,"pi.patient_cycle_id" => $cycle_id);
				
				if($page==1 || $page==0){
					$this->data['collection'] = $this->model->get_patient_invoice_collection($sfilters, $keywords, $this->perPage);
				}else if($page>1){
					$this->data['collection'] = $this->model->get_patient_invoice_collection($sfilters, $keywords, $this->perPage, $page);	
				}

				$totalRec = count($this->model->get_patient_invoice_collection($sfilters, $keywords));

				if(!empty($this->data['collection'])){

					foreach ($this->data['collection'] as $key => $value) {
						
						$this->data['collection'][$key]->invoice_image_path = $this->model->get_image_path($value->invoice_image,$this->config->item('invoice_images').$value->patient_id.'/'.$value->patient_cycle_id.'/',$this->config->item('invoice_images_exists').$value->patient_id.'/'.$value->patient_cycle_id.'/');
					}
				}

				$view_file_name='invoice_listing_ajax';

				break;

				default:
				# code...
				break;

			
		}

		$session_data = $this->session->userdata('adminIPCAData');
		$role = $session_data['role'];
		$this->data['role'] = $role;
		
		$this->paginate_grid($this->data['controller'], $totalRec,'',$this->perPage);
		$this->load->view($this->data['controller'].'/'.$view_file_name, $this->data);		
		
	}

	function sort_posts(){
		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);
		
		$array = $this->uri->uri_to_assoc();
		$id = (array_key_exists('id', $array)) ? (int) $array['id'] : 0;
		
		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';
			
		if($this->input->post('category_id')!="") {
				$sfilters['ud.category_id'] = $this->input->post('category_id');
			}	
		if($this->input->post('sub_category_id')!="") {
				$sfilters['ud.sub_category_id'] = $this->input->post('sub_category_id');
			}		
				
		$this->data['sort_collection'] = $this->model->get_search_collection($sfilters, $keywords, $this->perPage, $page);
        
		//echo'<pre>';print_r($this->data['collection']);exit;

		$totalRec = count($this->model->get_collection($sfilters, $keywords));
		$this->paginate($this->data['controller'], $totalRec);

		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		//$this->data['download_url'] = $this->data['controller'] . '/download';
		//$this->data['searching_url'] = $this->data['controller'] . '/search';

        $title_txt = 'Manage '. ucfirst($this->module);
        $this->data['js'] = ['readmore.js','generic-add.js', 'subcategory.js'];

       //echo json_encode($sort_collection);
        if ($this->input->post('search') == 1) {
     
	     	$this->load->view($this->data['controller'].'/sort_lists', $this->data);
        }else
        {
			$this->set_view($this->data, 'lists',  '_admin', $title_txt);
		}
	}


	function sort(){
		$sort_arr = $this->input->post('val');
		$temp = 1;
		for($i=0;$i<count($sort_arr);$i++){
			$this->model->_update(['upload_data_id'=>$sort_arr[$i]], ['sort_order'=>$temp],'upload_data'); 
			$temp++;
		}
		$result = 'success';
		echo json_encode($result);
	}
}
