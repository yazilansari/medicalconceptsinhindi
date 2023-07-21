<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_gallery extends MY_Model
{

	public $p_key = 'id';
	public $table = 'mch_gallery';

	function __construct()
	{
		parent::__construct($this->table);
	}

	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ,$key_filters = []) {

    	$q = $this->db->select('id, title, image, created_at')->from('mch_gallery');
		
		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($key_filters)){			
			$q->where($key_filters);
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(title like '%". $s_key ."%')";


			$q->where($where_condition, NULL, FALSE);
		}
		$q->where('is_active', '1');
		$q->order_by('id', 'DESC');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		$collection = $q->get()->result();

		return $collection;
	}

	function is_a_unique_category($category_name = '')
	{
		if (empty($category_name)) {
			return TRUE;
		}
		if (!empty($category_name)) {
			$filters = [
				'category_name' => $category_name
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
	
	
		$this->form_validation->set_rules('upload_title','Title','trim|required|max_length[250]|xss_clean');
		

		if(!isset($_FILES['upload_path']) || $_FILES['upload_path']['name']==''){
			$errors['gallery_image'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Galllery Image field is required.' . '</label>';		
		}


		/*	if (empty($_FILES['contributors_image']['name']))
		{
			$this->form_validation->set_rules('contributors_image', 'Document', 'required');
		}*/

		
		if(!$this->form_validation->run()){
			
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
				$errors[$key] = form_error($key, '<label class="error">', '</label>');
			
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();
			$data['title'] = $upload_title =  !empty($this->input->post('upload_title'))?$this->input->post('upload_title'):NULL;
			$data['created_at'] = date('Y-m-d H:i:s');
			
			$gallery_id = $this->_insert($data);


			if($gallery_id !=""){
				$new_image_name = "Image_".time()."-".$gallery_id;
				
				$image_upload = $this->file_upload($this->config->item("gallery_images_upload_path"), 'upload_path', $new_image_name);
				
				
				if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$update_image = $this->_update(['id' => $gallery_id],
						['image' => $image_name], 'mch_gallery');
				
				}
			}

			$response['status'] = ((int) ($gallery_id)) ? TRUE : FALSE;
		}
		return $response;
	}
	

	function modify()
	{
		ini_set("upload_max_filesize","300M");
		ini_set("post_max_size","300M");

		/*Load the form validation Library*/
		$this->load->library('form_validation');
	
		
		$this->form_validation->set_rules('upload_title','Title','trim|required|max_length[250]|xss_clean');
		

		// if(!isset($_FILES['contributors_image']) || $_FILES['contributors_image']['name']==''){
		// 	$errors['contributors_image'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Contributors Image field is required.' . '</label>';		
		// }


		/*	if (empty($_FILES['contributors_image']['name']))
		{
			$this->form_validation->set_rules('contributors_image', 'Document', 'required');
		}*/

		
		if(!$this->form_validation->run()){
			
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
				$errors[$key] = form_error($key, '<label class="error">', '</label>');
			
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}
		else{
			$data = array();

			$data['title'] = $upload_title =  !empty($this->input->post('upload_title'))?$this->input->post('upload_title'):NULL;
			$gallery_id = $this->input->post('id');

			
			$status = $this->_update(['id' => $gallery_id], $data);
				
			$response['status'] = ($status) ? TRUE : FALSE;
			// $response['redirect'] = 'lists_new';
		}
		return $response;
	}



	function remove()
	{

		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			
			$ids1 = implode(",", $ids);
			if(!empty($ids1)){
				$data['is_active'] = 0;

				$response = $this->_update_with($this->p_key, $ids, array(), $data, $this->table);

				$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "{$affected_rows} Record(s) Successfully deleted" : 'Error while deleting record(s)';
			}else{
				$msg = "Contributor(s) can not be deleted!!";
			}
			
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}


	function _format_data_to_export($data)
	{

		$resultant_array = [];

		foreach ($data as $rows) {
			$records['Area Name'] = $rows->area_name;
			$records['Region Name'] = $rows->region_name;
			$records['Zone Name'] = $rows->zone_name;

			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}

	function get_upload_data_comments_collection($f_filters = [], $keywords = '', $limit = 0, $offset = 0)
	{
		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('c.*,ud.upload_title,ud.upload_data_id,sc.sub_category_id,
    		sc.sub_category_name,c1.category_id,c1.category_name')
			->from('comments c')
			->join('upload_data ud', 'c.upload_data_id = ud.upload_data_id')
			->join('sub_category sc', 'ud.sub_category_id = sc.sub_category_id')
			->join('category c1', 'sc.category_id = c1.category_id');

		if (sizeof($f_filters)) {
			foreach ($f_filters as $key => $value) {
				$q->where("$key", $value);
			}
		}

		if (!empty($keywords)) {
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				c.users_name like '%" . $s_key . "%'
				OR c.users_email like '%" . $s_key . "%'
				OR c1.category_name like '%" . $s_key . "%'
				OR sc.sub_category_name like '%" . $s_key . "%'
			) ";


			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("c.is_active", "1");
		$q->where("ud.is_active", "1");
		$q->where("c1.is_active", "1");
		$q->where("sc.is_active", "1");
		$q->order_by('c.comments_id desc');

		if (!empty($limit)) {
			$q->limit($limit, $offset);
		}
		$collection = $q->get()->result();

		return $collection;
	}


	function format_post_data($post_id)
	{
		if (!$post_id) {
			return;
		}

		$post_data = $this->get_collection(['ud.upload_data_id' => $post_id], '', 1);
		if (!count($post_data)) {
			return;
		}

		$users = $this->get_records([], 'users');

		if (!count($users)) {
			return;
		}

		$notification_request = [];

		$notification_request['upload_data_id'] = $post_id;
		$notification_request['upload_type'] = (!empty($post_data[0]->upload_type)) ? $post_data[0]->upload_type : null;
		$notification_request['upload_title'] = $post_data[0]->upload_title;
		$notification_request['video_type'] = $post_data[0]->video_type;
		$notification_request['upload_for_user_type'] = $post_data[0]->upload_for_user_type;
		$notification_request['short_description'] = $post_data[0]->short_description;
		$notification_request['youtube_video_id'] = $post_data[0]->youtube_video_id;
		$notification_request['upload_path'] = $post_data[0]->upload_path;
		$notification_request['sub_category_id'] = $post_data[0]->sub_category_id;
		$notification_request['category_id'] = $post_data[0]->category_id;

		if ($post_data[0]->category_id == 5 || $post_data[0]->category_id == 9) {
			if ($post_data[0]->upload_type == 'text') {
				$notification_request['upload_path'] = '';
			}
			$notification_request['upload_type'] = 'word';
		} else {
			$notification_request['upload_type'] = $post_data[0]->upload_type;
		}

		$notification_request_id = $this->_insert($notification_request, 'notification_request');

		$notification_devices = [];
		foreach ($users as $key => $value) {

			if (empty($value->device_id)) {
				continue;
			}
			if (empty($value->device_type)) {
				continue;
			}

			if (strlen($value->device_id) < 35) {
				continue;
			}
			if ($post_data[0]->upload_for_user_type == $value->users_type) {
				$temp = [];
				$temp['request_id'] = $notification_request_id;
				$temp['user_id'] = $value->users_id;
				$temp['device_id'] = $value->device_id;
				$temp['device_type'] = $value->device_type;
				array_push($notification_devices, $temp);
			} elseif ($post_data[0]->upload_for_user_type == 'Both') {
				$temp = [];
				$temp['request_id'] = $notification_request_id;
				$temp['user_id'] = $value->users_id;
				$temp['device_id'] = $value->device_id;
				$temp['device_type'] = $value->device_type;
				array_push($notification_devices, $temp);
			}
		}
		if (count($notification_devices)) {
			$this->_insert_batch($notification_devices, 'notification_request_devices');
		}
		return;
	}
	function get_image_path($image_name,$path){
		
			// echo UPLOADPATH.$this->config->item('gallery_image_exists').$image_name;die();
		$image_path = $path.$image_name;
		
		$image = "";

		if($image_name!=""){
			if(file_exists(UPLOADPATH.$this->config->item('gallery_image_exists').$image_name)){
			$image = $image_path;

			}else{
				$image = $this->config->item('no_image_path')."user.png";
			}	
		}else{
			$image = $this->config->item('no_image_path')."user.png";
		}
		
		return $image;
	}
}

