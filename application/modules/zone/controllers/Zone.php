<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Zone extends Generic_Controller
{
	private $module = 'zone';
	private $model_name = 'mdl_zone';
	private $csv_fields;

	function __construct() {
		parent::__construct();
		$this->load->model($this->model_name, 'model');

		$this->data['mainmenu'] = 'geography';
		$this->data['controller'] = $this->data['menu'] = $this->data['m_title'] = $this->module;
		$this->data['columns'] = $this->csv_fields = ['Zone Name'];
	}

	function options(){
		$this->session->is_Ajax_and_logged_in();

		$limit = $this->dropdownlength;
		$page = intval($_POST['page']) - 1;
		$page = ($page <= 0) ? 0 : $page;

		$s_term = (isset($_POST['search'])) ? $this->db->escape_like_str($_POST['search']) : '';

		$new = array(); $json['results'] = array();

		$_options = $this->model->get_options($s_term, 'zone_name', [], $page * $limit, $limit);
		$_opt_count = count($this->model->get_options($s_term, 'zone_name'));

		foreach($_options as $option){
			$new['id'] = $option->zone_id;
			$new['text'] = $option->zone_name;

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

        $csv_fields = ['Zone Name'];
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

	function add(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$this->data['js'] = ['generic-add.js'];
		$title_txt = 'Add '. ucfirst($this->module);

		$this->set_view($this->data, 'add', '_admin', $title_txt);
	}

	function edit(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$array = $this->uri->uri_to_assoc();
		$key = $this->model->p_key;

		$this->data[$key] = $id = (array_key_exists('record', $array)) ? (int) $array['record'] : 0;
		$this->data['info'] = $this->model->get_collection([ $key => $id ]);

		if(! count($this->data['info']) ){ show_404(); }

		$this->data['js']	= ['generic-edit.js'];

		$title_txt = 'Edit '. ucfirst($this->module);
		$this->set_view($this->data, 'edit', '_admin', $title_txt);
	}

	function save(){
		$this->session->is_Ajax_and_logged_in();

		$result = $this->model->save();
		echo json_encode($result);
	}

	function modify(){
		$this->session->is_Ajax_and_logged_in();

		$result = $this->model->modify();
		echo json_encode($result);
	}

	function remove(){
		$this->session->is_Ajax_and_logged_in();

		$response = $this->model->remove();
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
				$zone_name = trim($data[0]);

				if( empty($zone_name) ){
					continue;
				}

				if( !preg_match('/^[a-zA-Z][a-zA-Z0-9 \.]+$/', $zone_name) ){
					continue;
				}

				$z_records = $this->model->get_records([ 'zone_name'=> $zone_name ], 'zone', ['zone_id', 'zone_name'], 'zone_id', 1);

				if(! count($z_records)){
					$insert['zone_name'] = $zone_name;

					$this->model->_insert($insert);
					$newrows++;
				}
			}

			$cnt++;
		}

		fclose($handle);

		echo json_encode(['newrows'=> "$newrows record(s) added successfully"]);
	}
}
