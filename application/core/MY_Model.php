<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public $table;

	function __construct($table = '') {
		parent::__construct();
		$this->table = $table;
		$this->load->helper('upload_helper');
		$this->load->helper('image_upload_helper');
		$this->load->helper('upload_pdf_helper');
		$this->load->helper('upload_audio_video_helper');
	}

	function get_table() {
		return $this->table;
	}

	function req_field_error($check_in, $elem, $field_name){
		if($check_in == 'post'){
			return (! isset($_POST[$elem])) ? '<p>'. $field_name .' is required</p>' : '';
		}
		else{
			return ( empty($_FILES[$elem]['name'])) ? '<p>'. $field_name .' is required</p>' : '';
		}
	}

	function file_upload($path, $field_name, $new_name){

		if(!empty($_FILES[$field_name]['name'])){
			$details = upload(array('upload_path'=>$path, 'name'=> $field_name, 'new_name'=> $new_name));

			if(array_key_exists('errors', $details)){
				return ['status'=> FALSE, 'u_response'=> $details];
			}
			elseif(array_key_exists('filename', $details)){
				return ['status'=> TRUE, 'u_response'=> $details];
			}
		}
	}

	function ppt_upload($path, $field_name, $new_name){

		if(!empty($_FILES[$field_name]['name'])){
			$details = upload_ppt(array('upload_path'=>$path, 'name'=> $field_name, 'new_name'=> $new_name));

			if(array_key_exists('errors', $details)){
				return ['status'=> FALSE, 'u_response'=> $details];
			}
			elseif(array_key_exists('filename', $details)){
				return ['status'=> TRUE, 'u_response'=> $details];
			}
		}
	}

	function pdf_upload($path, $field_name, $new_name){

		if(!empty($_FILES[$field_name]['name'])){
			$details = upload_pdf(array('upload_path'=>$path, 'name'=> $field_name, 'new_name'=> $new_name));

			if(array_key_exists('errors', $details)){
				return ['status'=> FALSE, 'u_response'=> $details];
			}
			elseif(array_key_exists('filename', $details)){
				return ['status'=> TRUE, 'u_response'=> $details];
			}
		}
	}

	function video_upload($path, $field_name, $new_name){

		if(!empty($_FILES[$field_name]['name'])){
			$details = upload_video(array('upload_path'=>$path, 'name'=> $field_name, 'new_name'=> $new_name));

			if(array_key_exists('errors', $details)){
				return ['status'=> FALSE, 'u_response'=> $details];
			}
			elseif(array_key_exists('filename', $details)){
				return ['status'=> TRUE, 'u_response'=> $details];
			}
		}
	}

	function audio_video_upload($path, $field_name, $new_name){

		if(!empty($_FILES[$field_name]['name'])){
			$details = upload_audio_video(array('upload_path'=>$path, 'name'=> $field_name, 'new_name'=> $new_name));

			if(array_key_exists('errors', $details)){
				return ['status'=> FALSE, 'u_response'=> $details];
			}
			elseif(array_key_exists('filename', $details)){
				return ['status'=> TRUE, 'u_response'=> $details];
			}
		}
	}

	function _insert($data, $table = '') {
		 // echo $table;die();
		 $table = (! empty($table)) ? $table : $this->get_table();
		 //$data['insert_dt'] = $data['update_dt'] = date('Y-m-d H:i:s');
		return ($this->db->insert($table, $data)) ? $this->db->insert_id() : FALSE;


	}

	function _insert_batch($data, $table='') {
		$table = (! empty($table)) ? $table : $this->get_table();
		return $this->db->insert_batch($table, $data);
		 //echo $this->db->last_query();exit;
	}

	function _update($conditions = [], $data, $table = '') {
		$table = (! empty($table)) ? $table : $this->get_table();
		$this->db->where($conditions);

		//$data['update_dt'] = date('Y-m-d H:i:s');
		return $this->db->update($table, $data);
	}

	function _update_with($field_name, $id_array = [], $conditions = [], $data = [], $table = '') {

		$table = (! empty($table)) ? $table : $this->get_table();

		if(count($conditions)){
			$this->db->where($conditions);
		}

		if(count($id_array)){
			$this->db->where_in($field_name, $id_array);
		}

		//$data['update_dt'] = date('Y-m-d H:i:s');
		
		return $this->db->update($table, $data);
	}

	function _delete($field_name, $id_array = [], $table = '') {

		$table = (! empty($table)) ? $table : $this->get_table();
		$this->db->where_in($field_name, $id_array);
		return $this->db->delete($table);
	}

	function _delete_from($field_name, $id_array = [], $table = '', $filters = []) {

		$table = (! empty($table)) ? $table : $this->get_table();
		
		if(sizeof($filters) > 0){
			$this->db->where($filters);
		}

		$this->db->where_in($field_name, $id_array);
		return $this->db->delete($table);
	}

	function get_records($filters = [], $table = '', $select = [], $order_by = '', $limit = 0, $offset = 0) {
		$table = (! empty($table)) ? $table : $this->get_table();

		if(sizeof($select) > 0){
			$this->db->select($select);
		}

		if(sizeof($filters) > 0){
			$this->db->where($filters);
		}

		if(!empty($order_by)){
			$this->db->order_by($order_by);
		}

		if(!empty($limit)) { $this->db->limit($limit, $offset); }

		$this->db->from($table);

		if(!in_array($table, ['notification_request_devices'])) {
			$this->db->where("$table.is_active","1");
		}
		$query = $this->db->get();
		// echo $this->db->get_compiled_select();exit;
		return $query->result();
	}

	function get_or_records($filters = [], $table = '', $select = [], $order_by = '', $limit = 0, $offset = 0) {
		$table = (! empty($table)) ? $table : $this->get_table();

		if(sizeof($select) > 0){
			$this->db->select($select);
		}

		if(sizeof($filters) > 0){
			$this->db->or_where($filters);
		}

		if(!empty($order_by)){
			$this->db->order_by($order_by);
		}

		if(!empty($limit)) { $this->db->limit($limit, $offset); }

		$this->db->from($table);

		$query = $this->db->get();
		return $query->result();
	}

	function check_for_posted_record( $field, $table ){
		$table = (! empty($table)) ? $table : $this->get_table();
		
		if(! isset($_POST[$field]) ){
			$response['status'] = FALSE;
			$response['error_msg'] = 'Invalid Request.';
			return $response;
		}

		$posted_value = $this->input->post($field);
		$value = $this->db->escape_like_str($posted_value);

		$record = $this->get_records([$field => $value], $table, [], $field, 1);

		if(! count($record) ){
			$response['status'] = FALSE;
			$response['error_msg'] = 'Requested record does not exist';
			return $response;
		}

		$response['status'] = TRUE;
		$response['data'] = $record;

		return $response;
	}

	function get_options($s_key = '', $field = '', $filters = [], $offset = 0, $limit = 0, $select = [], $table = ''){

		$table = (! empty($table)) ? $table : $this->get_table();

		$q = (count($select)) ? $this->db->select($select) : $this->db->select("$table.*");
		$q->from($table);

		if(sizeof($filters)){
			$q->where($filters);
		}

		if(!empty($s_key)) {

			$where_condition1 = " (" . $field . " like '%". $q->escape_like_str($s_key) ."%') ";
			$q->where($where_condition1, NULL, FALSE);
		}
		$q->where("$table.is_active","1");
		$p_key = $this->p_key;
		$q->order_by("$p_key desc");

		if(!empty($limit)) { $q->limit($limit, $offset); }

		$collection = $q->get()->result();
		return $collection;
	}

	function _delete_with($where, $table = '') {

		$table = (! empty($table)) ? $table : $this->get_table();
		$this->db->where($where);
		return $this->db->delete($table);
	}

	function get_image_path($image_name,$path){

		$image_path = $path.$image_name;

		$image = "";

		if($image_name!=""){
			if(file_exists(UPLOADPATH.$this->config->item('sub_category_image_exists').$image_name)){
			$image = $image_path;

			}else{
				$image = $this->config->item('no_image_path')."user.png";
			}	
		}else{
			$image = $this->config->item('no_image_path')."user.png";
		}
		
		return $image;
	}

	function video_thumbnail_upload($thumbnail_path,$sub_category_id,$filename){

		if (!file_exists($thumbnail_path)) {
						
		    mkdir($thumbnail_path, 0777, true);
		}

      	$video_thumb = $this->config->item('posts_video_path').$sub_category_id."/".$filename;
		$thumb_temp = explode(".", $filename);
		$thumb_temp = $thumb_temp[0].'.jpg';
		$thumbnail = $thumbnail_path."/".$thumb_temp;
		$result = shell_exec("/usr/bin/ffmpeg -i $video_thumb -deinterlace -an -ss 1 -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $thumbnail 2>&1");

		if($result){
			return $thumb_temp;
		}
	}

	function image_file_upload($path, $field_name, $new_name){

		if(!empty($_FILES[$field_name]['name'])){
			$details = image_upload(array('upload_path'=>$path, 'name'=> $field_name, 'new_name'=> $new_name));

			if(array_key_exists('errors', $details)){
				return ['status'=> FALSE, 'u_response'=> $details];
			}
			elseif(array_key_exists('filename', $details)){
				return ['status'=> TRUE, 'u_response'=> $details];
			}
		}
	}
}
