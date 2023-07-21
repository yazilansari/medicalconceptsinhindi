<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_front extends MY_Model
{


	public $p_key = '';
	public $table = '';

	public $session_key;

	function __construct()
	{
		parent::__construct($this->table);
		//$this->session_key = config_item('session_data_key');
	}

	function get_category_collection($f_filters = [], $keywords = '', $limit = 0, $offset = 0)
	{

		$q = $this->db->select('c.category_id, c.category_name, mc.main_category_id, mc.main_category_name')
			->from('category c')
			->join('main_category_mapping mcm', 'mcm.category_id = c.category_id')
			->join('main_category mc', 'mc.main_category_id = mcm.main_category_id');

		if (sizeof($f_filters)) {
			foreach ($f_filters as $key => $value) {
				$q->where("$key", $value);
			}
		}

		if (!empty($keywords)) {
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				category.category_name like '%" . $s_key . "%'
			) ";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("c.is_active", "1");
		$q->order_by('c.category_id asc');

		if (!empty($limit)) {
			$q->limit($limit, $offset);
		}

		$collection1 	= $q->get(); //echo $this->db->last_query();exit;
		$collection 	= $collection1->result();


		return $collection;
	}

	function get_sub_category_collection($f_filters = [], $keywords = '', $limit = 0, $offset = 0, $filter_in = [])
	{

		$q = $this->db->select('c.category_id, c.category_name, mc.main_category_id, mc.main_category_name, sc.sub_category_id, sc.sub_category_name,ud.upload_type,(Select count(ud1.upload_data_id) from upload_data as ud1 where ud1.sub_category_id = sc.sub_category_id AND sc.is_active="1" AND ud1.is_active="1") as total_upload_count,sc.upload_for_user_type')
			->from('category c')
			->join('main_category_mapping mcm', 'mcm.category_id = c.category_id')
			->join('main_category mc', 'mc.main_category_id = mcm.main_category_id')
			->join('sub_category sc', 'sc.category_id = c.category_id AND sc.is_active="1"')
			->join('upload_data ud', 'ud.sub_category_id = sc.sub_category_id AND ud.is_active="1"', 'LEFT');

		if (sizeof($f_filters)) {
			foreach ($f_filters as $key => $value) {
				$q->where("$key", $value);
			}
		}

		if ($filter_in) {
			$where_cond = "ud.upload_type IN ('" . implode("','", $filter_in) . "')";
			$q->where($where_cond, NULL, FALSE);
		}


		if (!empty($keywords)) {
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				category.category_name like '%" . $s_key . "%'
			) ";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("c.is_active", "1");
		$q->group_by('sc.sub_category_id,mc.main_category_id');
		$q->order_by('sc.sort_order asc');

		if (!empty($limit)) {
			$q->limit($limit, $offset);
		}

		$collection1 	= $q->get();

		// echo $this->db->last_query();

		if (!empty($collection)) {
			$collection 	= $collection1->result();

			return $collection;
		}
	}

	function get_post_collection($f_filters = [], $keywords = '', $limit = 0, $offset = 0)
	{

		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('ud.*,sc.sub_category_id,sc.sub_category_name,md.meta_slug')
			->from('upload_data ud')
			->join('sub_category sc', 'sc.sub_category_id = ud.sub_category_id')
			->join('category c', 'c.category_id = sc.category_id')
			->join('meta_tag_details md', 'md.meta_upload_data_id = ud.upload_data_id and md.is_active = 1', 'left');

		if (sizeof($f_filters)) {
			foreach ($f_filters as $key => $value) {
				$q->where("$key", $value);
			}
		}

		if (!empty($keywords)) {
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				category.category_name like '%" . $s_key . "%'
			) ";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("ud.is_active", "1");
		$q->order_by('ud.sort_order asc');

		if (!empty($limit)) {
			$q->limit($limit, $offset);
		}

		$collection1 	= $q->get(); //echo $this->db->last_query();exit;
		$collection 	= $collection1->result();

		foreach ($collection as $key => $value) {

			$collection[$key]->thumbnail_path = $this->get_thumbnail_image_path($value->thumbnail, $this->config->item('posts_thumbnail_path') . $value->sub_category_id . '/', $value->sub_category_id);
		}

		return $collection;
	}

	function get_thumbnail_image_path($image_name, $path, $id)
	{

		$image_path = $path . $image_name;

		$image = "";

		if ($image_name != "") {
			if (file_exists(UPLOADPATH . $this->config->item('posts_thumbnail_exists') . $id . '/' . $image_name)) {
				$image = $image_path;
			} else {
				$image = $this->config->item('no_image_path') . "medicalDirectors.jpg";
			}
		} else {
			$image = $this->config->item('no_image_path') . "medicalDirectors.jpg";
		}

		return $image;
	}

	function get_post_image_path($image_name, $path, $id)
	{

		$image_path = $path . $image_name;

		$image = "";

		if ($image_name != "") {
			if (file_exists(UPLOADPATH . $this->config->item('posts_image_exists') . $id . '/' . $image_name)) {
				$image = $image_path;
			} else {
				$image = $this->config->item('no_image_path') . "medicalDirectors.jpg";
			}
		} else {
			$image = $this->config->item('no_image_path') . "medicalDirectors.jpg";
		}

		return $image;
	}

	function contact_save()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('contact_name', 'Your Name', 'trim|required|valid_name|max_length[150]|xss_clean');
		$this->form_validation->set_rules('contact_email', 'Your E-Mail', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('contact_number', 'Mobile Number', 'trim|required|valid_mobile|xss_clean');
		$this->form_validation->set_rules('contact_message', 'Message', 'trim|required|xss_clean');
		$this->form_validation->set_rules('g_recaptcha_response', 'Captcha', 'trim|required');

		$contact_name = !empty($this->input->post('contact_name')) ? $this->input->post('contact_name') : '';
		$contact_email = !empty($this->input->post('contact_name')) ? $this->input->post('contact_email') : '';
		$contact_number = !empty($this->input->post('contact_number')) ? $this->input->post('contact_number') : '';
		$contact_message = !empty($this->input->post('contact_message')) ? $this->input->post('contact_message') : '';

		if (!$this->form_validation->run()) {
			$errors = array();
			foreach ($this->input->post() as $key => $value)
				$errors[$key] = form_error($key, '<label class="error" style="color:red;font-weight:normal;">', '</label>');

			$response['errors'] = array_filter($errors); // Some might be empty
			$response['status'] = FALSE;
		} else {
			$data = array();
			$data['contact_name'] = $contact_name;
			$data['contact_email'] = $contact_email;
			$data['contact_number'] = $contact_number;
			$data['contact_message'] = $contact_message;
			$data['contact_dt'] = date('Y-m-d H:i:s');
			$contact_id = $this->_insert($data, 'contacts');

			// if ($contact_id) {
			// 	$text = "Dear Admin,<br><br>
			// 		You have received the mail from User.<br><br>
			// 		Following are the details : <br>
			// 		Name : " . $contact_name . "<br>
			// 		Email : " . $contact_email . "<br>
			// 		Contact Number : " . $contact_number . "<br><br>
			// 		Message : " . $contact_message . "
			// 		";
			// 	$data_send_email = send_email(['pratikkamble2103@gmail.com', 'pratik@techizer.in', 'softech@techizerindia.com'], 'Contact Us', $text, [], $contact_email);
			// }

			$response['status'] = ((int) ($contact_id)) ? TRUE : FALSE;
		}
		return $response;
	}

	function get_upload_mapping_records($f_filters = [], $keywords = '', $limit = 0, $offset = 0)
	{

		$q = $this->db->select('c.category_id, c.category_name, mc.main_category_id, mc.main_category_name,ud.upload_title,ud.upload_data_id,ud.sub_category_id,ud.thumbnail,ud.upload_type,md.meta_slug,ud.video_type,ud.youtube_video_id,ud.upload_path')
			->from('category c')
			->join('main_category_mapping mcm', 'mcm.category_id = c.category_id')
			->join('main_category mc', 'mc.main_category_id = mcm.main_category_id')
			->join('sub_category sc', 'sc.category_id = c.category_id AND sc.is_active="1"')
			->join('upload_data ud', 'ud.sub_category_id = sc.sub_category_id AND ud.is_active="1"')
			->join('meta_tag_details md', 'md.meta_upload_data_id = ud.upload_data_id and md.is_active = 1', 'left');

		if (sizeof($f_filters)) {
			foreach ($f_filters as $key => $value) {
				$q->where("$key", $value);
			}
		}

		if (!empty($keywords)) {
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				category.category_name like '%" . $s_key . "%'
			) ";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("c.is_active", "1");
		$q->order_by('ud.upload_data_id desc');

		if (!empty($limit)) {
			$q->limit($limit, $offset);
		}

		$collection1 	= $q->get(); //echo $this->db->last_query();exit;
		$collection 	= $collection1->result();

		foreach ($collection as $key => $value) {

			if ($value->upload_type == 'audio' || $value->upload_type == 'text' || $value->upload_type == 'pdf' || ($value->upload_type == 'video' && $value->video_type == 'inhouse')) {
				$collection[$key]->thumbnail_path = $this->get_thumbnail_image_path($value->thumbnail, $this->config->item('posts_thumbnail_path') . $value->sub_category_id . '/', $value->sub_category_id);
			}

			if ($value->upload_type == 'video' && $value->video_type == 'youtube') {
				$collection[$key]->thumbnail_path = "https://img.youtube.com/vi/" . $value->youtube_video_id . "/0.jpg";
			}

			if ($value->upload_type == 'image') {
				$collection[$key]->thumbnail_path = $this->get_post_image_path($value->upload_path, $this->config->item('posts_images_path') . $value->sub_category_id . '/', $value->sub_category_id);
			}
		}

		return $collection;
	}
}
