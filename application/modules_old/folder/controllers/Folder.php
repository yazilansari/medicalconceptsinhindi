<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Folder extends Generic_Controller
{
	private $module = 'folder';
	private $model_name = 'mdl_folder';

	function __construct() {
		parent::__construct();
		$this->load->model($this->model_name, 'model');
		$this->load->helper('common_helper');

		//echo $key = bin2hex($this->encryption->create_key(16)); die();
		$this->data['controller'] = $this->data['menu'] = $this->data['m_title'] = $this->module;
		$this->data['mainmenu'] = 'folder';
		$this->data['columns'] = ['Folder Name'];
		$this->csv_fields = ['Category Name'];
		$this->perPage = 12;
	}

	function options(){
			$this->session->is_Ajax_and_logged_in();

			$limit = $this->dropdownlength;
			$page = (int) $this->input->post('page') - 1;
			$page = ($page <= 0) ? 0 : $page;

			$new = array(); $json['results'] = array(); $filters = array();

			$s_term = (isset($_POST['search'])) ? $this->db->escape_like_str($_POST['search']) : '';
			$id = (isset($_POST['id'])) ? (int) $this->input->post('id') : 0;

			if($id){ $filters['f.category_id'] = $id; }

			$_options = $this->model->get_collection($filters, $s_term, $page * $limit, $limit);

			$_opt_count = count($this->model->get_collection($filters, $s_term));
			
			foreach($_options as $option){
				$new = [ 'id' => $option->folder_id, 'text' => $option->folder_name	];
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

//echo '<pre>';var_dump($this->data['collection']);exit;
		$totalRec = count($this->model->get_collection($sfilters, $keywords));
		$this->paginate($this->data['controller'], $totalRec);

       // $this->data['csv_fields'] = $this->csv_fields;
		$this->data['plugins'] = ['paginate'];
		
		$this->data['listing_url'] = $this->data['controller'] . '/lists';
		$this->data['download_url'] = $this->data['controller'] . '/download';

        $title_txt = 'Manage '. ucfirst($this->module);

        if ($this->input->post('search') == TRUE) {

        	$this->load->view($this->data['controller'].'/results', $this->data);
        }else
        { //echo "string";exit;
			$this->set_view($this->data, 'lists',  '_admin', $title_txt);
		}
	}



	function add(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$this->data['plugins'] = ['select2'];
		$this->data['js'] = ['generic-add.js', 'folder_creation.js'];

		$title_txt = 'Add '. ucfirst($this->module);

		$this->set_view($this->data, 'add', '_admin', $title_txt);
	}

	function save(){
		$this->session->is_Ajax_and_logged_in();
		$result = $this->model->save();
		echo json_encode($result);
	}

	function edit(){
		if( ! $this->session->is_logged_in() )
			redirect('admin/login','refresh');

		$array = $this->uri->uri_to_assoc();
		$key = $this->model->p_key;

		$this->data[$key] = $id = (array_key_exists('record', $array)) ? (int) $array['record'] : 0;
		
		$this->data['info'] = $this->model->get_collection([ 'f.folder_id' => $id ]);
		if(! count($this->data['info']) ){ show_404(); }

		$this->data['plugins'] = ['select2'];
		$this->data['js']	= ['generic-edit.js', 'subcategory.js'];

		$title_txt = 'Edit '. ucfirst($this->module);
		$this->set_view($this->data, 'edit', '_admin', $title_txt);
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
}