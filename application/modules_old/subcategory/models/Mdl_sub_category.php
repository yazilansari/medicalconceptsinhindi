<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_sub_category extends MY_Model {

	public $p_key = 'sub_category_id';
	public $table = 'sub_category';

	function __construct() {
		parent::__construct($this->table);
	}



	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

    	$q = $this->db->select('*, (Select count(ud.upload_data_id) from upload_data as ud where ud.sub_category_id = sc.sub_category_id AND sc.is_active="1" AND ud.is_active="1") as total_upload_count,mc.main_category_id,mc.main_category_name,f.folder_id,f.folder_name,c.category_id')
		->from('sub_category sc')
		->join('category c', 'c.category_id = sc.category_id and c.is_active = 1')
		->join('main_category_mapping mcm','c.category_id = mcm.category_id')
		->join('main_category mc','mcm.main_category_id = mc.main_category_id')
		->join('folder f', 'f.folder_id = sc.folder_id and f.is_active = 1','left');
		

		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				sc.sub_category_name like '%". $s_key ."%'
				OR c.category_name like '%". $s_key ."%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("sc.is_active","1");
		$q->group_by('sc.sub_category_id');
		$q->order_by('sc.sub_category_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection = $q->get()->result();

		//var_dump($collection);exit;
		return $collection;
	}
	function is_a_unique_category( $category_name = '' ){
		if(empty($category_name)){
			return TRUE;
		}
		if(!empty($category_name)){
			$filters = [
				'category_name'=> $category_name
			];

			$r_records = $this->get_collection($filters);

			return (count($r_records)) ? FALSE : TRUE;
		}
		return FALSE;
	}

	

	function save(){
		
		ini_set("upload_max_filesize","300M");
		ini_set("post_max_size","300M");

		/*Load the form validation Library*/
		$this->load->library('form_validation');
		$this->load->helper('send_sms');
		$this->form_validation->set_rules('main_category_id', 'Main Category','trim|required|xss_clean');
		$this->form_validation->set_rules('category_id', 'Category','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_category_name','Sub Category Name','trim|required|unique_key[sub_category.sub_category_name]|xss_clean');
		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		$this->form_validation->set_rules('upload_for_user_type', 'Upload Data for User Type','trim|required|xss_clean');
		$this->form_validation->set_rules('sort_order','Sort Order','trim|required|xss_clean');


		$errors = array();	      
		if($_FILES['sub_category_image']['name']!='' && ($_FILES['sub_category_image']['type']!='image/png' && $_FILES['sub_category_image']['type']!='image/jpeg' && $_FILES['sub_category_image']['type']!='image/jpg')){
			$errors['sub_category_image'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Image File.' . '</label>';			
		}
		
		if(!$this->form_validation->run() || !empty($errors)){			
			  
	        foreach ($this->input->post() as $key => $value)
				$errors[$key] = form_error($key, '<label class="error">', '</label>');
			
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();
			$data['category_id'] = $category_id =  !empty($this->input->post('category_id'))?$this->input->post('category_id'):NULL;

			$data['folder_id'] = $folder_id =  !empty($this->input->post('folder_id'))?$this->input->post('folder_id'):NULL;

			$data['sub_category_name'] = !empty($this->input->post('sub_category_name'))?$this->input->post('sub_category_name'):NULL;

			$data['description'] = !empty($this->input->post('description'))?$this->input->post('description'):NULL;

			$data['upload_for_user_type'] = !empty($this->input->post('upload_for_user_type'))?$this->input->post('upload_for_user_type'):NULL;

			$data['sort_order'] = !empty($this->input->post('sort_order'))?$this->input->post('sort_order'):NULL;


			$subcategory_id = $this->_insert($data);
			if($subcategory_id){
				$all_records = $this->model->get_records([],'sub_category');
				// auto change in sequence of the files on addition of sub category 
				foreach ($all_records as $record ) {
					if(($data['sort_order'] <= $record->sort_order) && ($subcategory_id !=$record->sub_category_id )){
						$this->db->set('sort_order', 'sort_order+1', FALSE);
						$this->db->where('sub_category_id', $record->sub_category_id);
						$this->db->update('sub_category');
					}
				}
			}

			if($subcategory_id !=""){
				$new_image_name = "Image_".time()."-".$subcategory_id;
				
				$image_upload = $this->file_upload($this->config->item("sub_category_images_upload_path"), 'sub_category_image',$new_image_name);
				
				
				if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$update_image = $this->_update(['sub_category_id' => $subcategory_id],
						['sub_category_image' => $image_name], 'sub_category');
				
				}
			}

			$response['status'] = ((int) ($subcategory_id)) ? TRUE : FALSE;
		}
		return $response;
	}

	function modify(){
		/*Load the form validation Library*/
		$this->load->library('form_validation');

		$is_Available = $this->check_for_posted_record($this->p_key, $this->table);
		if(! $is_Available['status']){ return $is_Available; }
		
		/*$this->form_validation->set_rules('category_id', 'Category','trim|required|xss_clean');*/
		
		$sub_category_name = $this->input->post('sub_category_name');

		if( strtolower($sub_category_name) != strtolower($is_Available['data'][0]->sub_category_name) ){
			$this->form_validation->set_rules('sub_category_name','Sub Category Name','trim|required|unique_key[sub_category.sub_category_name]|xss_clean');
		}
		else{
			$this->form_validation->set_rules('sub_category_name','Sub Category Name','trim|required|xss_clean');
		}

		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		$this->form_validation->set_rules('upload_for_user_type', 'Upload Data for User Type','trim|required|xss_clean');
		$this->form_validation->set_rules('sort_order','Sort Order','trim|required|xss_clean');

		
		$errors = array();
		if($_FILES['sub_category_image']['name']!='' && ($_FILES['sub_category_image']['type']!='image/png' && $_FILES['sub_category_image']['type']!='image/jpeg' && $_FILES['sub_category_image']['type']!='image/jpg')){
			$errors['sub_category_image'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Image File.' . '</label>';			
		}
		
		if(! $this->form_validation->run() || !empty($errors)){
			
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');
			print_r($errors);exit;		        
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}		
		else{
			$data = array();

		$data['category_id'] = $category_id =  !empty($this->input->post('category_id'))?$this->input->post('category_id'):NULL;

			$data['sub_category_name'] = !empty($this->input->post('sub_category_name'))?$this->input->post('sub_category_name'):NULL;

			$data['description'] = !empty($this->input->post('description'))?$this->input->post('description'):NULL;

			$data['folder_id'] = $folder_id =  !empty($this->input->post('folder_id'))?$this->input->post('folder_id'):NULL;

			$data['upload_for_user_type'] = !empty($this->input->post('upload_for_user_type'))?$this->input->post('upload_for_user_type'):NULL;
			$data['sort_order'] = !empty($this->input->post('sort_order'))?$this->input->post('sort_order'):NULL;


			if(!empty($_FILES['sub_category_image'])){

				$new_image_name = "Image_".time()."-".$this->input->post('sub_category_id');
				$image_upload = $this->file_upload($this->config->item("sub_category_images_upload_path"), 'sub_category_image',$new_image_name);

				

				if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$data['sub_category_image'] = $image_name;
				}
			}

			$p_key = $this->p_key;
			$subcategory_id = (int) $this->input->post('sub_category_id');
			
			$one_record = $this->model->get_records([$p_key => $subcategory_id],'sub_category');
			$one_record_sort_order = $one_record[0]->sort_order;
			
			$status = (int) $this->_update([$p_key => $subcategory_id], $data);
			if(!empty($status) && ($one_record_sort_order != $data['sort_order'])){
				$all_records = $this->model->get_records([],'sub_category');
				// auto change in sequence of the files on addition of sub category 
				foreach ($all_records as $record) {
					if(($data['sort_order'] <= $record->sort_order) && ($subcategory_id !=$record->sub_category_id )){
						$this->db->set('sort_order', 'sort_order+1', FALSE);
						$this->db->where('sub_category_id', $record->sub_category_id);
						$this->db->update('sub_category');
					}
				}
			}
			$response['status'] = ($status) ? TRUE : FALSE;
		}
		return $response;
	}

	function remove(){
		
		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			
			$ids1 = implode(",", $ids);

			$where_condition = array("sub_category_id IN ({$ids1})" => NULL ,"is_active" => "1");
			$sub_category_records = $this->get_records($where_condition, 'upload_data', ['GROUP_CONCAT(sub_category_id) sub_category_id']);
			$sub_category_ids = explode(",", $sub_category_records[0]->sub_category_id);
			$sub_category_ids = array_diff($ids, $sub_category_ids);
			if(!empty($sub_category_ids)){
					// auto change in sequence of the files on deletion of sub category
				$all_records = $this->model->get_records([],'sub_category');
				for($i=0;$i < count($sub_category_ids); $i++){

					$one_record = $this->model->get_records(['sub_category_id' => $sub_category_ids[$i]],'sub_category');
					$one_record_sort_order = $one_record[0]->sort_order;
					foreach ($all_records as $record) {
						if($one_record_sort_order < $record->sort_order){ 
							$this->db->set('sort_order', 'sort_order-1', FALSE);
							$this->db->where('sub_category_id', $record->sub_category_id);
							$this->db->update('sub_category');
						}
					}
				}
				$data['is_active'] = "0";

				$response = $this->_update_with($this->p_key,$sub_category_ids, array(), $data, $this->table);

				$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "{$affected_rows} Record(s) Successfully deleted" : 'Error while deleting record(s)';
			}else{
				$msg = "Sub Category can not be deleted!!";
			}
			
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}


	function _format_data_to_export($data){
		
		$resultant_array = [];
		
		foreach ($data as $rows) {
			$records['Sub Category Name'] = $rows->sub_category_name;
			$records['Category Name'] = $rows->category_name;
			$records['Upload For User Type'] = $rows->upload_for_user_type;
			$records['Total Upload'] = $rows->total_upload_count;
			

			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}
}