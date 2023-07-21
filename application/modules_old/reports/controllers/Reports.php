<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Reports extends Generic_Controller
{
	public $data = [];
	public $module = 'reports';

	function __construct() {
		parent::__construct();
		$this->load->library('Ajax_pagination');
		$this->load->library('user_agent');
		$this->load->model('mdl_reports');
		$this->data['mainmenu'] = 'report';
		$this->rpt_collection = ['registered','viewed','contact'];

		$this->perPage = PAGINATION_PAGE;
		/*m_tile stands for module title*/
		$this->data['controller'] = $this->data['page'] = $this->module;
		$this->data['columns'] = $this->csv_fields = ['SMS Log For', 'SMS Log Mobile', 'SMS Log Message', 'SMS Log Datetime'];
	}

	function view(){
		if( ! $this->session->is_logged_in() ){
			show_404(); 
			die();
		}

		$array = $this->uri->uri_to_assoc();
		$type = (array_key_exists('type', $array)) ? $array['type'] : '';
		$record = (array_key_exists('record', $array)) ? $array['record'] : '';
		$report_type = $this->rpt_collection;

		if(! in_array($type, $report_type)){
			show_404();
		}

		$this->data['menu'] = ($type != 'diagnostic') ? $type : 'diagnostic-rpt';
		$this->data['controller'] = 'reports';
		$this->data['rpt_type'] = $type;

		$sfilters = [];

		if($record!=""){
			$sfilters = array("c.camp_id" => $record);
		}

		$page = $this->input->post('page');
        $offset = (!$page) ? 0 : intval($page);

		$keywords = !empty($this->input->post('keywords'))?$this->input->post('keywords'):'';
		$role = $this->session->get_field_from_session('role');

		$from = !empty($this->input->post('from'))?$this->input->post('from'):'';
		$to = !empty($this->input->post('to'))?$this->input->post('to'):'';
		
		switch ($type) {

			case 'registered':
				#Planned Camp List
				$via = 'registered';
				$listFile =  'lists-users-registered';
				$resultFile = 'users-registered-results';
				$title_txt = $sectionTitle = 'Users Registered Reports';
				
				$this->data['columns'] = array('Users Email','Users Mobile Number','Users Type','Name and City of College','Qualification','Added Date');
				$this->data['listing_url'] = $this->data['controller'] . '/view/type/registered';
				$this->data['download_url'] = $this->data['controller'] . '/download/type/registered';
				
				$records = $this->mdl_reports->get_registered_users_collection($sfilters, $keywords, $this->perPage, $page, $from, $to);
				$total = count($this->mdl_reports->get_registered_users_collection($sfilters, $keywords, 0, 0, $from, $to));
				break;

			case 'viewed':
				#Planned Camp List
				$via = 'viewed';
				$listFile =  'lists-users-viewed';
				$resultFile = 'users-viewed-results';
				$title_txt = $sectionTitle = 'Users Posts Viewed Reports';
				
				$this->data['columns'] = array('Users Email','Users Mobile Number','Users Type','Category Name','Sub Category Name','Posts Title','Posts For Users Type','Viewed Date Time');
				$this->data['listing_url'] = $this->data['controller'] . '/view/type/viewed';
				$this->data['download_url'] = $this->data['controller'] . '/download/type/viewed';
				
				$records = $this->mdl_reports->get_users_posts_viewed_collection($sfilters, $keywords, $this->perPage, $page, $from, $to);
				$total = count($this->mdl_reports->get_users_posts_viewed_collection($sfilters, $keywords, 0, 0, $from, $to));
				break;

			case 'contact':
				#Planned Camp List
				$via = 'contact';
				$listFile =  'lists-users-contact';
				$resultFile = 'users-contact-results';
				$title_txt = $sectionTitle = 'Contact Us Reports';
				
				$this->data['columns'] = array('User Name','Contact Number','Email-ID','Message','Contacted DateTime');
				$this->data['listing_url'] = $this->data['controller'] . '/view/type/contact';
				$this->data['download_url'] = $this->data['controller'] . '/download/type/contact';
				
				$records = $this->mdl_reports->get_contact_us_collection($sfilters, $keywords, $this->perPage, $page, $from, $to);//echo "<pre>";print_r($records);echo "</pre>";exit;
				$total = count($this->mdl_reports->get_contact_us_collection($sfilters, $keywords, 0, 0, $from, $to));
				break;

			default:
				# code...
				break;
		}

		
		$template = ($role == 'HO') ? '_ho' : '_admin'; 

		if($type!="consum"){

			$this->data['collection'] = $records;
			$this->data['plugins'] = ['paginate','select2'];
			$this->data['resultFile'] = $resultFile . '.php';
			$this->data['role'] = $role;

			$this->paginate($this->data['controller'], $total,5 , $this->perPage);	
		}
		

        if ($this->input->post('search') == TRUE) {
        	$this->load->view( $this->data['controller'].'/'.$via.'/'. $resultFile ,$this->data);
        }else
        {
			$this->set_view($this->data, $via.'/'.$listFile, $template, $title_txt, $sectionTitle);
		}
	}

	function download(){
		if( ! $this->session->is_logged_in() ){
			show_404(); 
			die();
		}
		
		$array = $this->uri->uri_to_assoc();
		$type = (array_key_exists('type', $array)) ? $array['type'] : '';
		$record_check = (array_key_exists('record', $array)) ? $array['record'] : '';
		$report_type = $this->rpt_collection;

		if(! in_array($type, $report_type)){
			show_404();
		}
		
		$this->load->library('export');
		$filters = [];
		
		$keywords = (isset($_GET['keywords'])) ? $_GET['keywords'] : '';
		$from_date = (isset($_GET['from'])) ? $_GET['from'] : '';
		$to_date = (isset($_GET['to'])) ? $_GET['to'] : '';
		
		switch ($type) {

			case 'registered':

				$file_name = 'Users Registered Reports';

				$records = $this->mdl_reports->get_registered_users_collection($filters, $keywords, 0, 0, $from_date, $to_date);
				break;

			case 'viewed':

				$file_name = 'Users Posts Viewed Reports';

				$records = $this->mdl_reports->get_users_posts_viewed_collection($filters, $keywords, 0, 0, $from_date, $to_date);
				break;

			case 'contact':

				$file_name = 'Contact Us Reports';

				$records = $this->mdl_reports->get_contact_us_collection($filters, $keywords, 0, 0, $from_date, $to_date);
				break;

			default:
				# code...
				break;
		}
		
		$fields = $this->mdl_reports->_format_data_to_export($records, $type);
		$this->export->download_send_headers( $file_name . "_Report-" . date("Y-m-d") . ".xls");
		$this->export->array2csv($fields);
	}

	function data_formatting_for_charts(){

		if( ! $this->session->is_logged_in() ){
			show_404(); 
		}
		//print_r($this->input->post());exit;
		$type = $this->input->post('type');
		$id = $this->input->post('id');
		$value = $this->input->post('value');

		$records = array();
		$sfilters = array();
		$data_arr = array();
		
		if($id!=""){
			
			switch ($id) {			

				case 'division_patient_count': 					
					$keywords = !empty($value) ? "MONTH(c.camp_date) = {$value}" : "";						
					$records[$id] = $this->mdl_reports->get_division_wise_patient_data([],$keywords);		
					break;

				case 'region_wise_patient': 
					$keywords = !empty($value) ? "MONTH(c.camp_date) = {$value}" : "";						
					$records[$id] = $this->mdl_reports->get_region_wise_patient_count([],$keywords);		
					break;

				case 'camp_type_wise_patient':
					
					if($type=="month" && $value!=""){
						$sfilters = array("MONTH(c.camp_date) = {$value}" => NULL);
					}

					if($type=="gender" && $value!=""){
						$sfilters = array("p.patient_gender" => $value);
					}
					$sfilters = !empty($sfilters) ? $sfilters : [];
					$records[$id] = $this->mdl_reports->get_camp_type_wise_patient_data($sfilters);
					break;
				
				case 'below_normal_range':

					if($type=="month" && $value!=""){
						$sfilters = array("MONTH(c.camp_date) = {$value}" => NULL);
					}

					if($type=="gender" && $value!=""){
						$sfilters = array("p.patient_gender" => $value);
					}

					if($type=="camp_type" && $value!=""){
						$sfilters = array("ct.camp_type_id" => $value);
					}

					if($type=="division" && $value!=""){
						$sfilters = array("cd.division_id" => $value);
					}

					$sfilters = !empty($sfilters) ? $sfilters : [];
					$records[$id] = $this->mdl_reports->get_below_normal_range_patient_data($sfilters);
					break;

				case 'above_normal_range':

					if($type=="month" && $value!=""){
						$sfilters = array("MONTH(c.camp_date) = {$value}" => NULL);
					}

					if($type=="gender" && $value!=""){
						$sfilters = array("p.patient_gender" => $value);
					}

					if($type=="camp_type" && $value!=""){
						$sfilters = array("ct.camp_type_id" => $value);
					}

					if($type=="division" && $value!=""){
						$sfilters = array("cd.division_id" => $value);
					}

					$sfilters = !empty($sfilters) ? $sfilters : [];
					$records[$id] = $this->mdl_reports->get_above_normal_range_patient_data($sfilters);
					break;

				case 'within_normal_range':

					if($type=="month" && $value!=""){
						$sfilters = array("MONTH(c.camp_date) = {$value}" => NULL);
					}

					if($type=="gender" && $value!=""){
						$sfilters = array("p.patient_gender" => $value);
					}

					if($type=="camp_type" && $value!=""){
						$sfilters = array("ct.camp_type_id" => $value);
					}

					if($type=="division" && $value!=""){
						$sfilters = array("cd.division_id" => $value);
					}

					$sfilters = !empty($sfilters) ? $sfilters : [];
					$records[$id] = $this->mdl_reports->get_within_normal_range_patient_data($sfilters);
					break;

				case 'phlebo_camp_total':

					if($type=="month" && $value!=""){
						$sfilters = array("MONTH(c.camp_date) = {$value}" => NULL);
					}

					if($type=="camp_status" && $value!=""){
						$sfilters = array("c.camp_status = '{$value}'" => NULL);
					}

					$sfilters = !empty($sfilters) ? $sfilters : [];
					$records[$id] = $this->mdl_reports->get_phlebo_camp_total_data($sfilters);
					break;

				case 'phlebo_camp_exe_comp':

					$status_filter = array();

					if($type=="month" && $value!=""){
						$sfilters = array("MONTH(c.camp_date) = {$value}" => NULL);
					}

					if($type=="camp_status" && $value!=""){
						$status_filter = array("c.camp_status = '{$value}'" => NULL);
					}

					$sfilters = !empty($sfilters) ? $sfilters : [];
					$status_filter = !empty($status_filter) ? $status_filter : [];
					$records[$id] = $this->mdl_reports->get_phlebo_camp_exe_data($sfilters, '', $status_filter);
					break;

				case 'rsm_total_camp':

					$status_filter = array();

					if($type=="month" && $value!=""){
						$sfilters = array("MONTH(c.camp_date) = {$value}" => NULL);
					}

					if($type=="camp_status" && $value!=""){
						$status_filter = array("c.camp_status = '{$value}'" => NULL);
					}

					$sfilters = !empty($sfilters) ? $sfilters : [];
					$status_filter = !empty($status_filter) ? $status_filter : [];
					$records[$id] = $this->mdl_reports->get_rsmwise_camp_exe_data($sfilters, '', $status_filter);
					break;

				default:
				# code...
				break;
			}

			if(!empty($records[$id])){
				$data_arr['success'] = "0";
				$data_arr['message'] = "Data Found";	
				$data_arr['result'] = $records;
			}else{
				$data_arr['success'] = "1";
				$data_arr['message'] = "No Relevant Data Found";	
				
			}
		}else{
			$data_arr['success'] = "1";
			$data_arr['message'] = "Please select the {$type}";
		}

		echo json_encode($data_arr);
		exit;
	}

	function load_phlebo_consum_reports(){
		
		if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}
		//print_r($this->input->post());exit;
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$from = $this->input->post('from');
		$keywords = $this->input->post('keywords');
		$month = !empty($this->input->post('month')) ? $this->input->post('month') : '';
		$year = !empty($this->input->post('year')) ? $this->input->post('year') : date("Y");

		$sfilters = [];

		$page = $this->input->post('page');
		
        $offset = (!$page) ? 0 : intval($page);
        $this->perPage = 5;

		
		if($page==1 || $page==0){
			$this->data['collection'] = $this->mdl_reports->get_phlebo_consumption($sfilters, $keywords, $this->perPage,'',$month, $year);
		}else if($page>1){
			$this->data['collection'] = $this->mdl_reports->get_phlebo_consumption($sfilters, $keywords, $this->perPage, $page, $month, $year);	
		}			
		
		/*$consumptions = json_decode(json_encode($this->mdl_reports->get_records(['is_deleted' => "0"], "consumptions", ['consumptions_id','consumptions_name'], 'consumptions_id asc')),TRUE);
		

		if(!empty($this->data['collection'])){

			foreach ($this->data['collection'] as $key => $value) {
				
				if($month!=""){
					$where = array('pca.month' => $month, 'pca.phlebo_id' => $value->phlebo_id, 'pca.is_deleted' => "0" ,"YEAR(pca.insert_dt)" => $year);
				}else{
					$where = array('MONTH(CURDATE()) = pca.month' => NULL, 'pca.phlebo_id' => $value->phlebo_id, 'pca.is_deleted' => "0" ,"YEAR(CURDATE()) = YEAR(pca.insert_dt)" => NULL);	
				}
				

				$phlebo_data = json_decode(json_encode($this->mdl_reports->get_records_phlebo_data($where)),TRUE);
				
				$phlebo_arr = array();
				foreach ($phlebo_data as $key1 => $value1) {
					
					$phlebo_arr[$value1['consumptions_id']] = $value1;
				}

				$data_arr = array();
				foreach ($consumptions as $key2 => $value2) {
					
					if(array_key_exists($value2['consumptions_id'], $phlebo_arr)){
						$data_arr[$key2] = $phlebo_arr[$value2['consumptions_id']];
						$data_arr[$key2]['consumptions_id'] = $value2['consumptions_id'];
						$data_arr[$key2]['consumptions_name'] = $value2['consumptions_name'];					
								
					}else{
						$data_arr[$key2] = $value2;
						$data_arr[$key2]['opening_stock'] = "0";
						$data_arr[$key2]['closing_stock'] = "0";
						$data_arr[$key2]['used_stock'] = "0";
						$data_arr[$key2]['receipt_stock'] = "0";
					}
				}

				$this->data['collection'][$key]->consumptions_arr = $data_arr;
			}					
			
		}*/
		
		//echo "<pre>";print_r($this->data);echo "</pre>";exit;

		$session_data = $this->session->userdata('adminIPCAData');
		$role = $session_data['role'];
		$this->data['role'] = $role;

		$totalRec = count($this->mdl_reports->get_phlebo_consumption($sfilters, $keywords, '','',$month, $year));
		$this->paginate_grid($this->data['controller'], $totalRec,'',$this->perPage);
		$this->load->view($this->data['controller'].'/listing_ajax_phlebo_consum', $this->data);
		
		
	}

	function load_camp_consum_reports(){
		
		if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}
		//print_r($this->input->post());exit;
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$from = $this->input->post('from');
		$keywords = $this->input->post('keywords');

		$sfilters = [];

		$page = $this->input->post('page');
		
        $offset = (!$page) ? 0 : intval($page);
        $this->perPage = 5;

		
		if($page==1 || $page==0){
			$this->data['collection'] = $this->mdl_reports->get_camp_collection($sfilters, $keywords, $this->perPage);
		}else if($page>1){
			$this->data['collection'] = $this->mdl_reports->get_camp_collection($sfilters, $keywords, $this->perPage, $page);	
		}			
		
		/*$consumptions = json_decode(json_encode($this->mdl_reports->get_records(['is_deleted' => "0"], "consumptions", ['consumptions_id','consumptions_name'], 'consumptions_id asc')),TRUE);
		

		if(!empty($this->data['collection'])){

			foreach ($this->data['collection'] as $key => $value) {
				
				$where = array('ccc.phlebo_id' => $value->phlebo_id, 'ccc.is_deleted' => "0" ,'ccc.camp_id' => $value->camp_id);

				$phlebo_data = json_decode(json_encode($this->mdl_reports->get_camp_consumption_data($where)),TRUE);
			
				$phlebo_arr = array();
				foreach ($phlebo_data as $key1 => $value1) {
					
					$phlebo_arr[$value1['consumptions_id']] = $value1;
				}

				$data_arr = array();
				foreach ($consumptions as $key2 => $value2) {
					
					if(array_key_exists($value2['consumptions_id'], $phlebo_arr)){
						$data_arr[$key2] = $phlebo_arr[$value2['consumptions_id']];					
								
					}else{
						$data_arr[$key2] = $value2;
						$data_arr[$key2]['consumptions_used_quantity'] = "0";
					}
				}

				$this->data['collection'][$key]->consumptions_arr = $data_arr;
			}					
			
		}*/
		
		//echo "<pre>";print_r($this->data);echo "</pre>";exit;

		$session_data = $this->session->userdata('adminIPCAData');
		$role = $session_data['role'];
		$this->data['role'] = $role;

		$totalRec = count($this->mdl_reports->get_camp_collection($sfilters, $keywords));
		$this->paginate_grid($this->data['controller'], $totalRec,'',$this->perPage);
		$this->load->view($this->data['controller'].'/listing_ajax_camp_consum', $this->data);
		
		
	}
}
