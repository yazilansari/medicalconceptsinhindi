<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Generic_Controller
{

	private $module = 'category';
	private $model_name = 'mdl_category';
	private $csv_fields;
	
	function __construct() {
		parent::__construct();
		$this->load->model($this->model_name, 'model');

		$this->data['mainmenu'] = 'category';
		$this->data['controller'] = $this->data['menu'] = $this->data['m_title'] = $this->module;
		$this->data['columns'] = ['Category Name', 'Main Category Name'];
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
		$main_id = (isset($_POST['main_id'])) ? (int) $this->input->post('main_id') : 0;

		if($id){ $filters['category.category_id'] = $id; }
		if($main_id){ $filters['mc.main_category_id'] = $main_id; }

		$_options = $this->model->get_collection($filters, $s_term, $page * $limit, $limit);

		$_opt_count = count($this->model->get_collection($filters, $s_term));

		foreach($_options as $option){
			$new = [ 'id' => $option->category_id, 'text' => $option->category_name];
			array_push($json['results'], $new);
		}
		
		$more = ($_opt_count > count($_options)) ? TRUE : FALSE;
		$json['pagination']['more'] = $more;

		echo json_encode($json);
	}

	function options_new(){
		$this->session->is_Ajax_and_logged_in();

		$limit = $this->dropdownlength;
		$page = (int) $this->input->post('page') - 1;
		$page = ($page <= 0) ? 0 : $page;

		$new = array(); $json['results'] = array(); $filters = array();

		$s_term = (isset($_POST['search'])) ? $this->db->escape_like_str($_POST['search']) : '';
		$id = (isset($_POST['id'])) ? (int) $this->input->post('id') : 0;
		$main_id = (isset($_POST['main_id'])) ? (int) $this->input->post('main_id') : 0;
		if($id){ $filters['mch_categories.id'] = $id; }
		if($main_id){ $filters['parent_category_id'] = $main_id; }
		// print_r($filters);

		$_options = $this->model->get_collections_new($filters, $s_term, $page * $limit, $limit);

		$_opt_count = count($this->model->get_collections_new($filters, $s_term));

		foreach($_options as $option){
			$new = [ 'id' => $option->id, 'text' => $option->category_name];
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

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);


		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage);
		} else {

			$this->data['collection'] = $this->model->get_collection($sfilters, $keywords, $this->perPage, $page);
			
		}


		$totalRec = count($this->model->get_collection($sfilters, $keywords));
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

		$sfilters = array();

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);


		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';

		if (!empty($keywords)) {
			$this->data['collection'] = $this->model->get_collections_new($sfilters, $keywords, $this->perPage);
		} else {

			$this->data['collection'] = $this->model->get_collections_new($sfilters, $keywords, $this->perPage, $page);
			
		}


		$totalRec = count($this->model->get_collections_new($sfilters, $keywords));
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


	function add(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$this->data['plugins'] = ['select2'];
		$this->data['js'] = ['generic-add.js', 'subcategory.js'];

		$title_txt = 'Add '. ucfirst($this->module);

		$this->set_view($this->data, 'add', '_admin', $title_txt);
	}

	function add_new(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$this->data['plugins'] = ['select2'];
		$this->data['js'] = ['generic-add.js', 'subcategory.js'];

		$title_txt = 'Add '. ucfirst($this->module).' New';

		$this->set_view($this->data, 'add_new', '_admin', $title_txt);
	}

	function edit(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$array = $this->uri->uri_to_assoc();
		$key = $this->model->p_key;

		$this->data[$key] = $id = (array_key_exists('record', $array)) ? (int) $array['record'] : 0;
		
		$this->data['info'] = $this->model->get_collection([ 'category.category_id' => $id ]);

		if(! count($this->data['info']) ){ show_404(); }

		$this->data['plugins'] = ['select2'];
		$this->data['js']	= ['generic-edit.js', 'subcategory.js'];

		$title_txt = 'Edit '. ucfirst($this->module);
		$this->set_view($this->data, 'edit', '_admin', $title_txt);
	}

	function edit_new(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$array = $this->uri->uri_to_assoc();
		$key = $this->model->p_key_new;


		$this->data[$key] = $id = (array_key_exists('record', $array)) ? (int) $array['record'] : 0;
		
		$this->data['info'] = $this->model->get_collections_new([ 'mch_categories.id' => $id ]);

		// print_r($this->data['info']);die();


		if(! count($this->data['info']) ){ show_404(); }

		$this->data['plugins'] = ['select2'];
		$this->data['js']	= ['generic-edit.js', 'subcategory.js'];

		$title_txt = 'Edit '. ucfirst($this->module).' New';
		$this->set_view($this->data, 'edit_new', '_admin', $title_txt);
	}

	function save(){
		$this->session->is_Ajax_and_logged_in();

		$result = $this->model->save();
		echo json_encode($result);
	}

	function save_new(){
		$this->session->is_Ajax_and_logged_in();

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
}
