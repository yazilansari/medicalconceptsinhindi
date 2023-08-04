<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_posts extends MY_Model
{

	public $p_key = 'upload_data_id';
	public $table = 'upload_data';

	public $p_key_new = 'id';
	public $table_new = 'mch_posts';

	function __construct()
	{
		parent::__construct($this->table);
	}

	function get_search_collection($f_filters = [], $keywords = '', $limit = 0, $offset = 0)
	{
		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('ud.upload_data_id,ud.upload_title,ud.contributors_id,c.contributors_name,ud.upload_type,ud.upload_for_user_type,ud.short_description,ud.upload_description,ud.thumbnail,ud.category_id,cat.category_name,ud.sub_category_id,sc.sub_category_name,ud.upload_path,ud.tags,ud.added_date_time,ud.sort_order,md.*,COUNT(c1.comments_id) comments_count,ud.video_type,
			ud.youtube_video_id')
			->from('upload_data ud')
			->join('contributors c', 'c.contributors_id = ud.contributors_id and c.is_active = 1', 'left')
			->join('category cat', 'cat.category_id = ud.category_id and cat.is_active = 1')
			->join('sub_category sc', 'sc.sub_category_id = ud.sub_category_id and sc.is_active = 1')
			->join('meta_tag_details md', 'md.meta_upload_data_id = ud.upload_data_id and md.is_active = 1', 'left')
			->join('comments c1', 'c1.upload_data_id = ud.upload_data_id AND c1.is_active="1"', 'LEFT');

		if (sizeof($f_filters)) {
			foreach ($f_filters as $key => $value) {
				$q->where("$key", $value);
			}
		}

		/*	if(!empty($keywords)) { 
		$s_key = $this->db->escape_like_str($keywords);


			$where_condition = "(
				ud.upload_title like '%". $s_key ."%'
				or ud.short_description like '%". $s_key ."%'
				or ud.tags like '%". $s_key ."%'
				OR ud.upload_description like '%". $s_key ."%'
				OR c.contributors_name like '%". $s_key ."%'
				OR ud.upload_type like '%". $s_key ."%'
				OR ud.upload_for_user_type like '%". $s_key ."%'
				OR cat.category_name like '%". $s_key ."%'
				
				
			)";

			$q->where($where_condition, NULL, FALSE);
		}*/

		$q->where("ud.is_active", "1");
		$q->group_by('ud.upload_data_id');
		$q->order_by('ud.sort_order asc');

		/*	if(!empty($limit)) { $q->limit($limit, $offset); }*/

		$collection1 = $q->get(); //echo $this->db->last_query();exit;
		$collection = $collection1->result();
		return $collection;
	}


	function get_collection($f_filters = [], $keywords = '', $limit = 0, $offset = 0)
	{

		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('ud.upload_data_id,ud.upload_title,ud.contributors_id,c.contributors_name,ud.upload_type,ud.upload_for_user_type,ud.short_description,ud.upload_description,ud.thumbnail,ud.category_id,cat.category_name,ud.sub_category_id,sc.sub_category_name,ud.upload_path,ud.tags,ud.added_date_time,ud.sort_order,ud.event_link,ud.event_date,ud.event_time,md.*,COUNT(c1.comments_id) comments_count,ud.video_type,
			ud.youtube_video_id,mc.main_category_id,mc.main_category_name')
			->from('upload_data ud')
			->join('contributors c', 'c.contributors_id = ud.contributors_id and c.is_active = 1', 'left')
			->join('category cat', 'cat.category_id = ud.category_id and cat.is_active = 1')
			->join('main_category_mapping mcm', 'cat.category_id = mcm.category_id')
			->join('main_category mc', 'mcm.main_category_id = mc.main_category_id')
			->join('sub_category sc', 'sc.sub_category_id = ud.sub_category_id and sc.is_active = 1')
			->join('meta_tag_details md', 'md.meta_upload_data_id = ud.upload_data_id and md.is_active = 1', 'left')
			->join('comments c1', 'c1.upload_data_id = ud.upload_data_id AND c1.is_active="1"', 'LEFT');

		if (sizeof($f_filters)) {
			foreach ($f_filters as $key => $value) {
				$q->where("$key", $value);
			}
		}

		if (!empty($keywords)) {
			$s_key = $this->db->escape_like_str($keywords);


			$where_condition = "(
				ud.upload_title like '%" . $s_key . "%'
				or ud.short_description like '%" . $s_key . "%'
				or ud.tags like '%" . $s_key . "%'
				OR ud.upload_description like '%" . $s_key . "%'
				OR c.contributors_name like '%" . $s_key . "%'
				OR ud.upload_type like '%" . $s_key . "%'
				OR ud.upload_for_user_type like '%" . $s_key . "%'
				OR cat.category_name like '%" . $s_key . "%'
				OR sc.sub_category_name like '%" . $s_key . "%'
				
			)";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("ud.is_active", "1");
		$q->group_by('ud.upload_data_id');
		$q->order_by('ud.upload_data_id desc');

		//if(!empty($limit)) { $q->limit($limit, $offset); }

		$collection1 = $q->get(); //echo $this->db->last_query();exit;
		$collection = $collection1->result();

		return $collection;
	}

	function get_collections_new($f_filters = [], $keywords = '', $limit = 0, $offset = 0)
	{

		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

		$q = $this->db->select('p.id, p.title, p.contributor_id, c.name AS contributor_name, p.type, p.thumbnail_image, p.category_id, cat.name AS category_name, p.sub_category_id, sc.name AS sub_category_name, p.created_at, p.date, p.*, COUNT(c1.id) comment_count,
			p.video_url')
			->from('mch_posts p')
			->join('mch_contributors c', 'c.id = p.contributor_id and c.is_active = 1', 'left')
			->join('mch_categories cat', 'cat.id = p.category_id and cat.is_active = 1')
			// ->join('main_category_mapping mcm', 'cat.category_id = mcm.category_id')
			// ->join('main_category mc', 'mcm.main_category_id = mc.main_category_id')
			->join('mch_sub_categories sc', 'sc.id = p.sub_category_id and sc.is_active = 1')
			// ->join('meta_tag_details md', 'md.meta_upload_data_id = ud.upload_data_id and md.is_active = 1', 'left')
			->join('mch_comments c1', 'c1.post_id = p.id AND c1.is_active="1"', 'LEFT');

		if (sizeof($f_filters)) {
			foreach ($f_filters as $key => $value) {
				$q->where("$key", $value);
			}
		}

		if (!empty($keywords)) {
			$s_key = $this->db->escape_like_str($keywords);


			$where_condition = "(
				p.title like '%" . $s_key . "%'
				OR c.name like '%" . $s_key . "%'
				OR p.type like '%" . $s_key . "%'
				OR cat.name like '%" . $s_key . "%'
				OR sc.name like '%" . $s_key . "%'
				
			)";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->where("p.is_active", "1");
		$q->group_by('p.id');
		$q->order_by('p.id', 'DESC');

		//if(!empty($limit)) { $q->limit($limit, $offset); }

		$collection1 = $q->get(); //echo $this->db->last_query();exit;
		$collection = $collection1->result();

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



	function save()
	{
		//$this->format_post_data(653);
		$this->load->helper('upload_media');

		ini_set("upload_max_filesize", "300M");
		ini_set("post_max_size", "300M");

		/*Load the form validation Library*/
		$this->load->library('form_validation');

		$errors = array();

		$this->form_validation->set_rules('main_category_id', 'Main Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('category_id', 'Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sub_category_id', 'Sub Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contributors_id', 'Contributors', 'trim|required|xss_clean');
		$this->form_validation->set_rules('upload_title', 'Upload Title', 'trim|required|max_length[150]|unique_key[upload_data.upload_title]|xss_clean');
		$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('meta_slug', 'Meta Slug', 'trim|required|xss_clean');
		/*$this->form_validation->set_rules('sort_order', 'Sort Sequence Number','trim|required|xss_clean');*/

		$upload_type 					= !empty($this->input->post('upload_type')) ? TRUE : FALSE;
		$video_type 					= !empty($this->input->post('video_type')) ? TRUE : FALSE;
		$sub_category_id				= $_POST['sub_category_id'];
		if ($upload_type == FALSE) {
			$errors['upload_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Type field is required.' . '</label>';
		} else {

			if ($_POST['upload_type'] == 'text') {
				/*$errors['desc_errors'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Description field is required.' . '</label>';			*/
				$this->form_validation->set_rules('upload_description', 'Upload Description', 'trim|required|xss_clean');
			} else if ($_POST['upload_type'] == 'video') {

				if ($video_type == FALSE) {
					$errors['video_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Video Type field is required.' . '</label>';
				} else {

					if ($this->input->post('video_type') == 'inhouse') {

						if (!isset($_FILES['upload_path']) || $_FILES['upload_path']['name'] == '') {
							$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload File field is required.' . '</label>';
						} else if ($_POST['video_type'] == 'inhouse' && ($_FILES['upload_path']['type'] != 'video/mp4' && $_FILES['upload_path']['type'] != 'video/mkv' && $_FILES['upload_path']['type'] != 'video/flv' && $_FILES['upload_path']['type'] != 'video/avi' && $_FILES['upload_path']['type'] != 'video/3gp')) {
							$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Video File.' . '</label>';
						}
					} else if ($this->input->post('video_type') == 'youtube') {
						$this->form_validation->set_rules('youtube_video_code', 'YouTube Video ID', 'trim|required|xss_clean');
					}
				}
			} else {

				if (!isset($_FILES['upload_path']) || $_FILES['upload_path']['name'] == '') {
					$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload File field is required.' . '</label>';
				} else {

					if ($_POST['upload_type'] == 'audio' && ($_FILES['upload_path']['type'] != 'audio/basic' && $_FILES['upload_path']['type'] != 'audio/mpeg' && $_FILES['upload_path']['type'] != 'audio/x-wav' && $_FILES['upload_path']['type'] != 'audio/mp3' && $_FILES['upload_path']['type'] != 'audio/aac')) {
						$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Audio File.' . '</label>';
					}

					if ($_POST['upload_type'] == 'pdf' && $_FILES['upload_path']['type'] != 'application/pdf') {
						$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate PDF File.' . '</label>';
					}

					if ($_POST['upload_type'] == 'image' && ($_FILES['upload_path']['type'] != 'image/png' && $_FILES['upload_path']['type'] != 'image/jpeg' && $_FILES['upload_path']['type'] != 'image/jpg')) {
						$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Image File.' . '</label>';
					}
				}
			}
		}

		$upload_for_user_type 			= !empty($this->input->post('upload_for_user_type')) ? TRUE : FALSE;
		if ($upload_for_user_type == FALSE) {
			$errors['upload_for_user_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload For User Type field is required.' . '</label>';
		}

		if (!isset($_FILES['thumbnail']) || $_FILES['thumbnail']['name'] == '') {
			$errors['thumbnail'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Thumbnail field is required.' . '</label>';
		}

		if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != '' && ($_FILES['thumbnail']['type'] != 'image/png' && $_FILES['thumbnail']['type'] != 'image/jpeg' && $_FILES['thumbnail']['type'] != 'image/jpg')) {
			$errors['thumbnail'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Thumbnail Image File.' . '</label>';
		}

		if (empty($_POST['tags'])) {
			$errors['error_tags'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Tags field is required.' . '</label>';
		}

		if (isset($_POST['video_type']) && $_POST['video_type'] == 'youtube' && $_POST['youtube_video_code'] != '') {
			$this->form_validation->set_rules('youtube_video_code', 'YouTube Video ID', 'trim|required|youtube_video_exists|xss_clean');
		}

		if (!$this->form_validation->run() || !empty($errors)) {

			foreach ($this->input->post() as $key => $value)
				$errors[$key] = form_error($key, '<label class="error">', '</label>');

			$response['errors'] = array_filter($errors); // Some might be empty
			$response['status'] = FALSE;
		} else {
			$data = array();
			$data['category_id'] = $category_id =  !empty($this->input->post('category_id')) ? $this->input->post('category_id') : NULL;

			$data['sub_category_id'] = $sub_category_id =  !empty($this->input->post('sub_category_id')) ? $this->input->post('sub_category_id') : NULL;

			$data['event_date'] = !empty($this->input->post('eventdate')) ? $this->input->post('eventdate') : "0000-00-00";

			$data['event_time'] = !empty($this->input->post('eventtime')) ? $this->input->post('eventtime') : "00:00:00";

			$data['event_link'] = !empty($this->input->post('event_link')) ? htmlentities($this->input->post('event_link')) : NULL;

			$data['contributors_id'] =  !empty($this->input->post('contributors_id')) ? $this->input->post('contributors_id') : NULL;

			$data['upload_title'] = !empty($this->input->post('upload_title')) ? $this->input->post('upload_title') : NULL;

			$data['short_description'] = !empty($this->input->post('short_description')) ? $this->input->post('short_description') : NULL;

			$data['upload_for_user_type'] = !empty($this->input->post('upload_for_user_type')) ? $this->input->post('upload_for_user_type') : NULL;

			/*	if($category_id == 5 || $category_id == 9){
				$data['upload_type'] = 'word';
			}else{*/

			$data['upload_type'] = !empty($this->input->post('upload_type')) ? $this->input->post('upload_type') : NULL;
			//}

			$data['video_type'] = !empty($this->input->post('video_type')) ? $this->input->post('video_type') : NULL;

			if ($_POST['upload_type'] == 'text') {
				$data['upload_description'] = !empty($this->input->post('upload_description')) ? $this->input->post('upload_description') : NULL;
			}

			if (isset($_POST['video_type']) && $_POST['video_type'] == 'youtube') {
				$data['youtube_video_id'] = $_POST['youtube_video_code'];
			}

			$data['tags'] = !empty($this->input->post('tags')) ? $this->input->post('tags') : NULL;


			$sort_last_record = $this->model->get_records(['category_id' => $category_id, 'sub_category_id' => $sub_category_id], 'upload_data', [], 'sort_order desc', 1);
			//print_r($sort_last_record);exit;
			if (!empty($sort_last_record)) {
				$order = $sort_last_record[0]->sort_order + 1;
			} else {
				$order = 1;
			}

			$data['sort_order'] = !empty($sort_last_record[0]->sort_order) ? $order : NULL;
			//echo'<pre>';print_r($all_records);exit;

			// mkdir("999",0777,false);

			// $myfile = fopen("testfilt.txt", "w") or die("Unable to open file!");
			// $txt = "Please vote for your city to become No.1\n";
			// fwrite($myfile, $txt);
			// fclose($myfile);

			// print_r($data);
			// die;
			$upload_data_id = $this->_insert($data);


			/*	if($upload_data_id){
				$all_records = $this->model->get_records(['category_id'=>$category_id,'sub_category_id'=>$sub_category_id],'upload_data');
				// auto change in sequence of the files on addition of posts
				foreach ($all_records as $record) {

					if(($data['sort_order'] <= $record->sort_order) && ($upload_data_id != $record->upload_data_id)){
						$this->db->set('sort_order', 'sort_order+1', FALSE);
						$this->db->where('upload_data_id', $record->upload_data_id);
						$this->db->update('upload_data');
					}
				}
		}*/

			if ($upload_data_id) {

				$meta_data = array();
				$meta_data['meta_upload_data_id'] = $upload_data_id;
				$meta_data['meta_title'] = !empty($this->input->post('meta_title')) ? $this->input->post('meta_title') : '';
				$meta_data['meta_description'] = !empty($this->input->post('meta_description')) ? $this->input->post('meta_description') : '';
				$meta_data['meta_keyword'] = !empty($this->input->post('meta_keyword')) ? $this->input->post('meta_keyword') : '';
				$meta_data['meta_post_url'] = !empty($this->input->post('meta_post_url')) ? $this->input->post('meta_post_url') : '';
				$meta_data['meta_slug'] = !empty($this->input->post('meta_slug')) ? $this->input->post('meta_slug') : '';

				$meta_data_id = $this->_insert($meta_data, 'meta_tag_details');
			}

			if ($upload_data_id != "" && $_POST['upload_type'] == 'image') {

				$imgpath = $this->config->item("s3_posts_images_upload_path") . $sub_category_id . '/';
				$image_upload = upload_media('upload_path', $imgpath, false, $imgpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'upload_path' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}

				//	echo'<pre>';print_r($image_upload);exit;
				//$new_image_name = $data['upload_type']."_".time()."-".$upload_data_id;
				//$image_upload = $this->file_upload($this->config->item("posts_images_upload_path").$sub_category_id.'/','upload_path',$new_image_name);

				if (!empty($image_upload[0]['full_path'])) {
					$image_name = $image_upload[0]['raw_name'] . $image_upload[0]['file_ext'];

					$update_image = $this->_update(
						['upload_data_id' => $upload_data_id],
						['upload_path' => $image_name],
						'upload_data'
					);
				}
			}

			if ($upload_data_id != "" && $_POST['upload_type'] == 'pdf') {
				$pdfpath = $this->config->item("s3_posts_pdf_upload_path") . $sub_category_id . '/';
				$pdf_upload = upload_media('upload_path', $pdfpath, false, $pdfpath, ['pdf', 'jpeg', 'png'], 300000);

				if (array_key_exists('error', $pdf_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'upload_path' => "<label class='error'>" . $pdf_upload['error'] . "</label>"
					];
					return $response;
				}

				//$new_pdf_name = $data['upload_type']."_".time()."-".$upload_data_id;

				//$pdf_upload = $this->pdf_upload($this->config->item("posts_pdf_upload_path").$sub_category_id.'/','upload_path',$new_pdf_name);
				if (!empty($pdf_upload[0]['full_path'])) {
					$pdf_name = $pdf_upload[0]['raw_name'] . $pdf_upload[0]['file_ext'];

					$update_pdf = $this->_update(
						['upload_data_id' => $upload_data_id],
						['upload_path' => $pdf_name],
						'upload_data'
					);
				}
			}

			$av_file_name = '';
			if ($upload_data_id != "" && ($_POST['upload_type'] == 'audio' || $_POST['upload_type'] == 'video')) {

				$new_file_name = $data['upload_type'] . "_" . time() . "-" . $upload_data_id;

				$path = '';

				if ($_POST['upload_type'] == 'audio') {
					$path = $this->config->item("s3_posts_audio_upload_path") . $sub_category_id . '/';
				}

				if ($_POST['upload_type'] == 'video' && $_POST['video_type'] == 'inhouse') {
					$path = $this->config->item("s3_posts_video_upload_path") . $sub_category_id . '/';
				}

				if ($path != '') {
					$file_upload = upload_media('upload_path', $path, false, $path, ['mpeg', 'x-wav', 'aac', 'mp3', 'mp4', 'mkv', 'flv', 'avi', '3gp'], 300000);


					if (array_key_exists('error', $file_upload)) {
						$response['status'] = false;
						$response['errors'] = [
							'upload_path' => "<label class='error'>" . $file_upload['error'] . "</label>"
						];
						return $response;
					}
					//$file_upload = $this->audio_video_upload($path,'upload_path',$new_file_name);
					//echo'<pre>';print_r($file_upload);exit;
					if (!empty($file_upload[0]['full_path'])) {
						//$av_file_name = $file_upload[0]['full_path'];
						$av_file_name = $file_upload[0]['raw_name'] . $file_upload[0]['file_ext'];

						$update_file = $this->_update(
							['upload_data_id' => $upload_data_id],
							['upload_path' => $av_file_name],
							'upload_data'
						);
					}
				}
			}

			if ($upload_data_id != "" && $_POST['upload_type'] != 'video') {

				$thumbnailpath = $this->config->item("s3_posts_thumbnail_upload_path") . $sub_category_id . '/';
				$image_upload = upload_media('thumbnail', $thumbnailpath, false, $thumbnailpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'thumbnail' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}

				if (!empty($image_upload[0]['full_path'])) {

					$image_name = $image_upload[0]['raw_name'] . $image_upload[0]['file_ext'];

					$update_image = $this->_update(
						['upload_data_id' => $upload_data_id],
						['thumbnail' => $image_name],
						'upload_data'
					);
				}

				//$new_image_name = $data['upload_type']."_".time()."-".$upload_data_id;

				//$image_upload = $this->image_file_upload($this->config->item("posts_thumbnail_upload_path").$sub_category_id,'thumbnail',$new_image_name);
				/*if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$update_image = $this->_update(['upload_data_id' => $upload_data_id],
						['thumbnail' => $image_name], 'upload_data');
				}*/
			} else if ($upload_data_id != "" && $_POST['upload_type'] == 'video' && $_POST['video_type'] == 'inhouse') {

				$thumbnailpath = $this->config->item("s3_posts_thumbnail_upload_path") . $sub_category_id . '/';
				$image_upload = upload_media('thumbnail', $thumbnailpath, false, $thumbnailpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

				//echo'<pre>';print_r($image_upload);exit;

				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'thumbnail' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}

				/*$image_upload = $this->video_thumbnail_upload($this->config->item("posts_thumbnail_upload_path").$sub_category_id.'/',$sub_category_id,$av_file_name);*/


				if (!empty($image_upload[0]['full_path'])) {
					$video_thumbnail_file_name = $image_upload[0]['raw_name'] . $image_upload[0]['file_ext'];

					$update_image = $this->_update(
						['upload_data_id' => $upload_data_id],
						['thumbnail' => $video_thumbnail_file_name],
						'upload_data'
					);
				}
			}

			$response['status'] = ((int) ($upload_data_id)) ? TRUE : FALSE;

			$this->format_post_data($upload_data_id);
		}
		return $response;
	}

	function save_new()
	{
		//$this->format_post_data(653);
		$this->load->helper('upload_media');

		ini_set("upload_max_filesize", "300M");
		ini_set("post_max_size", "300M");

		/*Load the form validation Library*/
		$this->load->library('form_validation');

		$errors = array();

		$this->form_validation->set_rules('main_category_id', 'Main Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('category_id', 'Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sub_category_id', 'Sub Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contributors_id', 'Contributors', 'trim|required|xss_clean');
		$this->form_validation->set_rules('upload_title', 'Upload Title', 'trim|required|max_length[150]|unique_key[mch_posts.title]|xss_clean');
		// $this->form_validation->set_rules('short_description', 'Short Description', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('meta_slug', 'Meta Slug', 'trim|required|xss_clean');
		/*$this->form_validation->set_rules('sort_order', 'Sort Sequence Number','trim|required|xss_clean');*/

		$upload_type 					= !empty($this->input->post('upload_type')) ? TRUE : FALSE;
		// $video_type 					= !empty($this->input->post('video_type')) ? TRUE : FALSE;
		$sub_category_id				= $_POST['sub_category_id'];
		if ($upload_type == FALSE) {
			$errors['upload_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Type field is required.' . '</label>';
		} else {

			if ($_POST['upload_type'] == 'text') {
				/*$errors['desc_errors'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Description field is required.' . '</label>';			*/
				$this->form_validation->set_rules('upload_description', 'Upload Description', 'trim|required|xss_clean');
			} elseif ($_POST['upload_type'] == 'image') {

				// if ($video_type == FALSE) {
				// 	$errors['video_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Video Type field is required.' . '</label>';
				// } else {

					// if ($this->input->post('video_type') == 'inhouse') {

					// 	if (!isset($_FILES['upload_path']) || $_FILES['upload_path']['name'] == '') {
					// 		$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload File field is required.' . '</label>';
					// 	} else if ($_POST['video_type'] == 'inhouse' && ($_FILES['upload_path']['type'] != 'video/mp4' && $_FILES['upload_path']['type'] != 'video/mkv' && $_FILES['upload_path']['type'] != 'video/flv' && $_FILES['upload_path']['type'] != 'video/avi' && $_FILES['upload_path']['type'] != 'video/3gp')) {
					// 		$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Video File.' . '</label>';
					// 	}
					// } else if ($this->input->post('video_type') == 'youtube') {
					// 	$this->form_validation->set_rules('youtube_video_code', 'YouTube Video ID', 'trim|required|xss_clean');
					// }
				// }
			// } else {

				if (!isset($_FILES['upload_path']) || $_FILES['upload_path']['name'] == '') {
					$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload File field is required.' . '</label>';
				} else {

					// if ($_POST['upload_type'] == 'audio' && ($_FILES['upload_path']['type'] != 'audio/basic' && $_FILES['upload_path']['type'] != 'audio/mpeg' && $_FILES['upload_path']['type'] != 'audio/x-wav' && $_FILES['upload_path']['type'] != 'audio/mp3' && $_FILES['upload_path']['type'] != 'audio/aac')) {
					// 	$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Audio File.' . '</label>';
					// }

					// if ($_POST['upload_type'] == 'pdf' && $_FILES['upload_path']['type'] != 'application/pdf') {
					// 	$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate PDF File.' . '</label>';
					// }

					if ($_POST['upload_type'] == 'image' && ($_FILES['upload_path']['type'] != 'image/png' && $_FILES['upload_path']['type'] != 'image/jpeg' && $_FILES['upload_path']['type'] != 'image/jpg')) {
						$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Image File.' . '</label>';
					}
				}
			}
		}

		// $upload_for_user_type 			= !empty($this->input->post('upload_for_user_type')) ? TRUE : FALSE;
		// if ($upload_for_user_type == FALSE) {
		// 	$errors['upload_for_user_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload For User Type field is required.' . '</label>';
		// }

		if (!isset($_FILES['thumbnail']) || $_FILES['thumbnail']['name'] == '') {
			$errors['thumbnail'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Thumbnail field is required.' . '</label>';
		}

		if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != '' && ($_FILES['thumbnail']['type'] != 'image/png' && $_FILES['thumbnail']['type'] != 'image/jpeg' && $_FILES['thumbnail']['type'] != 'image/jpg')) {
			$errors['thumbnail'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Thumbnail Image File.' . '</label>';
		}

		// if (empty($_POST['tags'])) {
		// 	$errors['error_tags'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Tags field is required.' . '</label>';
		// }

		// if (isset($_POST['video_type']) && $_POST['video_type'] == 'youtube' && $_POST['youtube_video_code'] != '') {
		// 	$this->form_validation->set_rules('youtube_video_code', 'YouTube Video ID', 'trim|required|youtube_video_exists|xss_clean');
		// }

		if (!$this->form_validation->run() || !empty($errors)) {

			foreach ($this->input->post() as $key => $value)
				$errors[$key] = form_error($key, '<label class="error">', '</label>');

			$response['errors'] = array_filter($errors); // Some might be empty
			$response['status'] = FALSE;
		} else {
			$data = array();
			$data['category_id'] = $category_id =  !empty($this->input->post('category_id')) ? $this->input->post('category_id') : NULL;

			$data['sub_category_id'] = $sub_category_id =  !empty($this->input->post('sub_category_id')) ? $this->input->post('sub_category_id') : NULL;

			$data['date'] = !empty($this->input->post('eventdate')) ? date('Y-m-d', strtotime($this->input->post('eventdate'))) : "0000-00-00";

			// $data['event_time'] = !empty($this->input->post('eventtime')) ? $this->input->post('eventtime') : "00:00:00";

			// $data['event_link'] = !empty($this->input->post('event_link')) ? htmlentities($this->input->post('event_link')) : NULL;

			$data['contributor_id'] =  !empty($this->input->post('contributors_id')) ? $this->input->post('contributors_id') : NULL;

			$data['title'] = !empty($this->input->post('upload_title')) ? $this->input->post('upload_title') : NULL;

			// $data['short_description'] = !empty($this->input->post('short_description')) ? $this->input->post('short_description') : NULL;

			// $data['upload_for_user_type'] = !empty($this->input->post('upload_for_user_type')) ? $this->input->post('upload_for_user_type') : NULL;

			/*	if($category_id == 5 || $category_id == 9){
				$data['upload_type'] = 'word';
			}else{*/

			$data['type'] = !empty($this->input->post('upload_type')) ? $this->input->post('upload_type') : NULL;
			//}

			// $data['video_type'] = !empty($this->input->post('video_type')) ? $this->input->post('video_type') : NULL;

			// if ($_POST['upload_type'] == 'text') {
				$data['description'] = !empty($this->input->post('upload_description')) ? $this->input->post('upload_description') : NULL;
			// }

			// if ($_POST['video_type'] == 'youtube') {
				$data['video_url'] = $_POST['youtube_video_code'];
			// }

			// $data['tags'] = !empty($this->input->post('tags')) ? $this->input->post('tags') : NULL;
			$data['created_at'] = date('Y-m-d H:i:s');

			$sort_last_record = $this->model->get_records(['category_id' => $category_id, 'sub_category_id' => $sub_category_id], 'mch_posts', [], 'sort_order desc', 1);
			//print_r($sort_last_record);exit;
			if (!empty($sort_last_record)) {
				$order = $sort_last_record[0]->sort_order + 1;
			} else {
				$order = 1;
			}

			$data['sort_order'] = !empty($sort_last_record[0]->sort_order) ? $order : NULL;
			//echo'<pre>';print_r($all_records);exit;

			// mkdir("999",0777,false);

			// $myfile = fopen("testfilt.txt", "w") or die("Unable to open file!");
			// $txt = "Please vote for your city to become No.1\n";
			// fwrite($myfile, $txt);
			// fclose($myfile);

			// print_r($data);
			// die;
			$upload_data_id = $this->_insert($data, $this->table_new);


			/*	if($upload_data_id){
				$all_records = $this->model->get_records(['category_id'=>$category_id,'sub_category_id'=>$sub_category_id],'upload_data');
				// auto change in sequence of the files on addition of posts
				foreach ($all_records as $record) {

					if(($data['sort_order'] <= $record->sort_order) && ($upload_data_id != $record->upload_data_id)){
						$this->db->set('sort_order', 'sort_order+1', FALSE);
						$this->db->where('upload_data_id', $record->upload_data_id);
						$this->db->update('upload_data');
					}
				}
		}*/

			// if ($upload_data_id) {

			// 	$meta_data = array();
			// 	$meta_data['meta_upload_data_id'] = $upload_data_id;
			// 	$meta_data['meta_title'] = !empty($this->input->post('meta_title')) ? $this->input->post('meta_title') : '';
			// 	$meta_data['meta_description'] = !empty($this->input->post('meta_description')) ? $this->input->post('meta_description') : '';
			// 	$meta_data['meta_keyword'] = !empty($this->input->post('meta_keyword')) ? $this->input->post('meta_keyword') : '';
			// 	$meta_data['meta_post_url'] = !empty($this->input->post('meta_post_url')) ? $this->input->post('meta_post_url') : '';
			// 	$meta_data['meta_slug'] = !empty($this->input->post('meta_slug')) ? $this->input->post('meta_slug') : '';

			// 	$meta_data_id = $this->_insert($meta_data, 'meta_tag_details');
			// }

			if ($upload_data_id != "" && $_POST['upload_type'] == 'image') {

				$imgpath = $this->config->item("s3_posts_images_upload_path") . $sub_category_id . '/';
				$image_upload = upload_media('upload_path', $imgpath, false, $imgpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'upload_path' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}

				//	echo'<pre>';print_r($image_upload);exit;
				//$new_image_name = $data['upload_type']."_".time()."-".$upload_data_id;
				//$image_upload = $this->file_upload($this->config->item("posts_images_upload_path").$sub_category_id.'/','upload_path',$new_image_name);

				if (!empty($image_upload[0]['full_path'])) {
					$image_name = $image_upload[0]['raw_name'] . $image_upload[0]['file_ext'];

					$update_image = $this->_update(
						['id' => $upload_data_id],
						['image' => $image_name],
						'mch_posts'
					);
				}
			}

			// if ($upload_data_id != "" && $_POST['upload_type'] == 'pdf') {
			// 	$pdfpath = $this->config->item("s3_posts_pdf_upload_path") . $sub_category_id . '/';
			// 	$pdf_upload = upload_media('upload_path', $pdfpath, false, $pdfpath, ['pdf', 'jpeg', 'png'], 300000);

			// 	if (array_key_exists('error', $pdf_upload)) {
			// 		$response['status'] = false;
			// 		$response['errors'] = [
			// 			'upload_path' => "<label class='error'>" . $pdf_upload['error'] . "</label>"
			// 		];
			// 		return $response;
			// 	}

			// 	//$new_pdf_name = $data['upload_type']."_".time()."-".$upload_data_id;

			// 	//$pdf_upload = $this->pdf_upload($this->config->item("posts_pdf_upload_path").$sub_category_id.'/','upload_path',$new_pdf_name);
			// 	if (!empty($pdf_upload[0]['full_path'])) {
			// 		$pdf_name = $pdf_upload[0]['raw_name'] . $pdf_upload[0]['file_ext'];

			// 		$update_pdf = $this->_update(
			// 			['upload_data_id' => $upload_data_id],
			// 			['upload_path' => $pdf_name],
			// 			'upload_data'
			// 		);
			// 	}
			// }

			// $av_file_name = '';
			// if ($upload_data_id != "" && ($_POST['upload_type'] == 'audio' || $_POST['upload_type'] == 'video')) {

			// 	$new_file_name = $data['upload_type'] . "_" . time() . "-" . $upload_data_id;

			// 	$path = '';

			// 	if ($_POST['upload_type'] == 'audio') {
			// 		$path = $this->config->item("s3_posts_audio_upload_path") . $sub_category_id . '/';
			// 	}

			// 	if ($_POST['upload_type'] == 'video' && $_POST['video_type'] == 'inhouse') {
			// 		$path = $this->config->item("s3_posts_video_upload_path") . $sub_category_id . '/';
			// 	}

			// 	if ($path != '') {
			// 		$file_upload = upload_media('upload_path', $path, false, $path, ['mpeg', 'x-wav', 'aac', 'mp3', 'mp4', 'mkv', 'flv', 'avi', '3gp'], 300000);


			// 		if (array_key_exists('error', $file_upload)) {
			// 			$response['status'] = false;
			// 			$response['errors'] = [
			// 				'upload_path' => "<label class='error'>" . $file_upload['error'] . "</label>"
			// 			];
			// 			return $response;
			// 		}
			// 		//$file_upload = $this->audio_video_upload($path,'upload_path',$new_file_name);
			// 		//echo'<pre>';print_r($file_upload);exit;
			// 		if (!empty($file_upload[0]['full_path'])) {
			// 			//$av_file_name = $file_upload[0]['full_path'];
			// 			$av_file_name = $file_upload[0]['raw_name'] . $file_upload[0]['file_ext'];

			// 			$update_file = $this->_update(
			// 				['upload_data_id' => $upload_data_id],
			// 				['upload_path' => $av_file_name],
			// 				'upload_data'
			// 			);
			// 		}
			// 	}
			// }

			// if ($upload_data_id != "" && $_POST['upload_type'] != 'video') {

				$thumbnailpath = $this->config->item("s3_posts_thumbnail_upload_path") . $sub_category_id . '/';
				$image_upload = upload_media('thumbnail', $thumbnailpath, false, $thumbnailpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'thumbnail' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}

				if (!empty($image_upload[0]['full_path'])) {

					$image_name = $image_upload[0]['raw_name'] . $image_upload[0]['file_ext'];

					$update_image = $this->_update(
						['id' => $upload_data_id],
						['thumbnail_image' => $image_name],
						'mch_posts'
					);
				}

				//$new_image_name = $data['upload_type']."_".time()."-".$upload_data_id;

				//$image_upload = $this->image_file_upload($this->config->item("posts_thumbnail_upload_path").$sub_category_id,'thumbnail',$new_image_name);
				/*if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$update_image = $this->_update(['upload_data_id' => $upload_data_id],
						['thumbnail' => $image_name], 'upload_data');
				}*/
			// }
			// else if ($upload_data_id != "" && $_POST['upload_type'] == 'video' && $_POST['video_type'] == 'inhouse') {

			// 	$thumbnailpath = $this->config->item("s3_posts_thumbnail_upload_path") . $sub_category_id . '/';
			// 	$image_upload = upload_media('thumbnail', $thumbnailpath, false, $thumbnailpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

			// 	//echo'<pre>';print_r($image_upload);exit;

			// 	if (array_key_exists('error', $image_upload)) {
			// 		$response['status'] = false;
			// 		$response['errors'] = [
			// 			'thumbnail' => "<label class='error'>" . $image_upload['error'] . "</label>"
			// 		];
			// 		return $response;
			// 	}

			// 	/*$image_upload = $this->video_thumbnail_upload($this->config->item("posts_thumbnail_upload_path").$sub_category_id.'/',$sub_category_id,$av_file_name);*/


			// 	if (!empty($image_upload[0]['full_path'])) {
			// 		$video_thumbnail_file_name = $image_upload[0]['raw_name'] . $image_upload[0]['file_ext'];

			// 		$update_image = $this->_update(
			// 			['upload_data_id' => $upload_data_id],
			// 			['thumbnail' => $video_thumbnail_file_name],
			// 			'upload_data'
			// 		);
			// 	}
			// }

			$response['status'] = ((int) ($upload_data_id)) ? TRUE : FALSE;
			$response['redirect'] = 'lists_new';

			// $this->format_post_data($upload_data_id);
		}
		return $response;
	}

	function modify()
	{
		/*Load the form validation Library*/
		$this->load->helper('upload_media');

		$this->load->library('form_validation');

		$is_Available = $this->check_for_posted_record($this->p_key, $this->table);
		if (!$is_Available['status']) {
			return $is_Available;
		}

		$this->load->library('form_validation');

		$errors = array();

		/*$this->form_validation->set_rules('category_id', 'Category','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_category_id', 'Sub Category','trim|required|xss_clean');*/
		$this->form_validation->set_rules('contributors_id', 'Contributors', 'trim|required|xss_clean');
		$this->form_validation->set_rules('upload_title', 'Upload Title', 'trim|required|max_length[150]|xss_clean');
		$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('meta_slug', 'Meta Slug', 'trim|required|xss_clean');
		/*$this->form_validation->set_rules('sort_order', 'Sort Sequence Number','trim|required|xss_clean');*/

		$upload_type 					= !empty($this->input->post('upload_type')) ? TRUE : FALSE;
		$video_type 					= !empty($this->input->post('video_type')) ? TRUE : FALSE;
		$upload_data_id 				= $this->input->post('upload_data_id');/*
		$sub_category_id 				= $this->input->post('sub_category_id');*/
		$check_data = $this->get_records(['upload_data_id' => $upload_data_id], 'upload_data');

		$category_id = $check_data[0]->category_id;
		$sub_category_id = $check_data[0]->sub_category_id;

		if ($upload_type == FALSE) {
			$errors['upload_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Type field is required.' . '</label>';
		} else {

			if ($_POST['upload_type'] == 'text') {
				/*$errors['desc_errors'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Description field is required.' . '</label>';			*/
				$this->form_validation->set_rules('upload_description', 'Upload Description', 'trim|required|xss_clean');
			} else if ($_POST['upload_type'] == 'video') {

				if ($video_type == FALSE) {
					$errors['video_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Video Type field is required.' . '</label>';
				} else {

					if ($this->input->post('video_type') == 'inhouse') {

						if (!isset($_FILES['upload_path']) && $_POST['upload_path_name']) {
							$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload File field is required.' . '</label>';
						} else if (isset($_FILES['upload_path']) && $_FILES['upload_path']['name'] != '' && $_POST['video_type'] == 'inhouse' && ($_FILES['upload_path']['type'] != 'video/mp4' && $_FILES['upload_path']['type'] != 'video/mkv' && $_FILES['upload_path']['type'] != 'video/flv' && $_FILES['upload_path']['type'] != 'video/avi' && $_FILES['upload_path']['type'] != 'video/3gp')) {
							$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Video File.' . '</label>';
						}
					} else if ($this->input->post('video_type') == 'youtube') {
						$this->form_validation->set_rules('youtube_video_code', 'YouTube Video ID', 'trim|required|xss_clean');
					}
				}
			} else {

				if (!isset($_FILES['upload_path']) && $_POST['upload_path_name']) {
					$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload File field is required.' . '</label>';
				} else {

					if ($_FILES['upload_path']['name'] != '' && $_POST['upload_type'] == 'audio' && ($_FILES['upload_path']['type'] != 'audio/basic' && $_FILES['upload_path']['type'] != 'audio/mpeg' && $_FILES['upload_path']['type'] != 'audio/x-wav' && $_FILES['upload_path']['type'] != 'audio/mp3' && $_FILES['upload_path']['type'] != 'audio/aac')) {
						$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Audio File.' . '</label>';
					}
					if ($_FILES['upload_path']['name'] != '' && $_POST['upload_type'] == 'pdf' && $_FILES['upload_path']['type'] != 'application/pdf') {
						$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate PDF File.' . '</label>';
					}
					if ($_FILES['upload_path']['name'] != '' &&  $_POST['upload_type'] == 'image' && ($_FILES['upload_path']['type'] != 'image/png' && $_FILES['upload_path']['type'] != 'image/jpeg' && $_FILES['upload_path']['type'] != 'image/jpg')) {
						$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Image File.' . '</label>';
					}
				}
			}
		}

		$upload_for_user_type 			= !empty($this->input->post('upload_for_user_type')) ? TRUE : FALSE;
		if ($upload_for_user_type == FALSE) {
			$errors['upload_for_user_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload For User Type field is required.' . '</label>';
		}

		if (!isset($_FILES['thumbnail']) && $_POST['thumbnail_name']) {
			$errors['thumbnail'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Thumbnail field is required.' . '</label>';
		}

		if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != '' && ($_FILES['thumbnail']['type'] != 'image/png' && $_FILES['thumbnail']['type'] != 'image/jpeg' && $_FILES['thumbnail']['type'] != 'image/jpg')) {
			$errors['thumbnail'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Thumbnail Image File.' . '</label>';
		}

		if (empty($_POST['tags'])) {
			$errors['error_tags'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Tags field is required.' . '</label>';
		}

		if (isset($_POST['video_type']) && $_POST['video_type'] == 'youtube' && $_POST['youtube_video_code'] != '') {
			$this->form_validation->set_rules('youtube_video_code', 'YouTube Video ID', 'trim|required|youtube_video_exists|xss_clean');
		}

		if (!$this->form_validation->run() || !empty($errors)) {


			foreach ($this->input->post() as $key => $value)
				$errors[$key] = form_error($key, '<label class="error">', '</label>');

			$response['errors'] = array_filter($errors); // Some might be empty
			$response['status'] = FALSE;
		} else {
			$data = array();
			$data['category_id'] = $category_id =  !empty($this->input->post('category_id')) ? $this->input->post('category_id') : NULL;

			$data['sub_category_id'] = $sub_category_id =  !empty($this->input->post('sub_category_id')) ? $this->input->post('sub_category_id') : NULL;

			$data['event_date'] = !empty($this->input->post('eventdate')) ? $this->input->post('eventdate') : "0000-00-00";

			$data['event_time'] = !empty($this->input->post('eventtime')) ? $this->input->post('eventtime') : "00:00:00";

			$data['event_link'] = !empty($this->input->post('event_link')) ? htmlentities($this->input->post('event_link')) : NULL;

			$data['contributors_id'] =  !empty($this->input->post('contributors_id')) ? $this->input->post('contributors_id') : NULL;

			$data['upload_title'] = !empty($this->input->post('upload_title')) ? $this->input->post('upload_title') : NULL;

			$data['short_description'] = !empty($this->input->post('short_description')) ? $this->input->post('short_description') : NULL;

			$data['upload_for_user_type'] = !empty($this->input->post('upload_for_user_type')) ? $this->input->post('upload_for_user_type') : NULL;

			$data['upload_type'] = !empty($this->input->post('upload_type')) ? $this->input->post('upload_type') : NULL;

			$data['video_type'] = !empty($this->input->post('video_type')) ? $this->input->post('video_type') : NULL;

			if ($_POST['upload_type'] == 'text') {
				$data['upload_description'] = !empty($this->input->post('upload_description')) ? $this->input->post('upload_description') : NULL;
			}

			if (isset($_POST['video_type']) && $_POST['video_type'] == 'youtube') {
				$data['youtube_video_id'] = $_POST['youtube_video_code'];
			}

			$data['tags'] = !empty($this->input->post('tags')) ? $this->input->post('tags') : NULL;

			/*$data['sort_order'] = !empty($this->input->post('sort_order'))?$this->input->post('sort_order'):NULL;*/

			$one_record = $this->model->get_records(['upload_data_id' => $_POST['upload_data_id']], 'upload_data');
			$one_record_sort_order = $one_record[0]->sort_order;

			$affected_rows = $this->_update(['upload_data_id' => $_POST['upload_data_id'], 'is_active' => '1'], $data, 'upload_data');

			/*if(!empty($affected_rows) && ($one_record_sort_order != $data['sort_order'])){
				$all_records = $this->model->get_records(['category_id'=>$category_id,'sub_category_id'=>$sub_category_id],'upload_data');
				// auto change in sequence of the files on edit of post
				foreach ($all_records as $record) {
					if(($data['sort_order'] <= $record->sort_order) && ($upload_data_id !=$record->upload_data_id )){
						$this->db->set('sort_order', 'sort_order+1', FALSE);
						$this->db->where('upload_data_id', $record->upload_data_id);
						$this->db->update('upload_data');
					}
				}
			}*/

			if ($affected_rows) {

				$check_for_meta = $this->get_records(['meta_upload_data_id' => $_POST['upload_data_id'], 'is_active' => '1'], 'meta_tag_details', ['*']);

				if (empty($check_for_meta)) {

					$meta_data = array();
					$meta_data['meta_upload_data_id'] = $_POST['upload_data_id'];
					$meta_data['meta_title'] = !empty($this->input->post('meta_title')) ? $this->input->post('meta_title') : '';
					$meta_data['meta_description'] = !empty($this->input->post('meta_description')) ? $this->input->post('meta_description') : '';
					$meta_data['meta_keyword'] = !empty($this->input->post('meta_keyword')) ? $this->input->post('meta_keyword') : '';
					$meta_data['meta_post_url'] = !empty($this->input->post('meta_post_url')) ? $this->input->post('meta_post_url') : '';
					$meta_data['meta_slug'] = !empty($this->input->post('meta_slug')) ? $this->input->post('meta_slug') : '';

					$meta_data_id = $this->_insert($meta_data, 'meta_tag_details');
				} else {

					$meta_data = array();
					$meta_data['meta_title'] = !empty($this->input->post('meta_title')) ? $this->input->post('meta_title') : '';
					$meta_data['meta_description'] = !empty($this->input->post('meta_description')) ? $this->input->post('meta_description') : '';
					$meta_data['meta_keyword'] = !empty($this->input->post('meta_keyword')) ? $this->input->post('meta_keyword') : '';
					$meta_data['meta_post_url'] = !empty($this->input->post('meta_post_url')) ? $this->input->post('meta_post_url') : '';
					$meta_data['meta_slug'] = !empty($this->input->post('meta_slug')) ? $this->input->post('meta_slug') : '';

					$affected_rows = $this->_update(['meta_upload_data_id' => $_POST['upload_data_id']], $meta_data, 'meta_tag_details');
				}
			}

			if ($affected_rows != "" && $_POST['upload_type'] == 'image' && isset($_FILES['upload_path']) && $_FILES['upload_path']['name'] != '') {

				$image_upload = upload_media('upload_path', '', true, $this->config->item("s3_posts_images_upload_path") . $sub_category_id . '/', ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'upload_path' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}

				if (!empty($image_upload[0]['full_path'])) {
					$image_name = $image_upload[0]['full_path'];

					$update_image = $this->_update(
						['upload_data_id' => $upload_data_id],
						['upload_path' => $image_name],
						'upload_data'
					);
				}

				//$new_image_name = $data['upload_type']."_".time()."-".$upload_data_id;

				//$image_upload = $this->file_upload($this->config->item("posts_images_upload_path").$sub_category_id.'/','upload_path',$new_image_name);
				/*if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$update_image = $this->_update(['upload_data_id' => $upload_data_id],
						['upload_path' => $image_name], 'upload_data');
				}*/
			}

			if ($affected_rows != "" && $_POST['upload_type'] == 'pdf' && isset($_FILES['upload_path']) && $_FILES['upload_path']['name'] != '') {

				$pdf_upload = upload_media('upload_path', '', true, $this->config->item("s3_posts_pdf_upload_path") . $sub_category_id . '/', ['pdf', 'jpeg', 'png'], 300000);

				if (array_key_exists('error', $pdf_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'upload_path' => "<label class='error'>" . $pdf_upload['error'] . "</label>"
					];
					return $response;
				}

				if (!empty($pdf_upload[0]['full_path'])) {
					$pdf_name = $pdf_upload[0]['full_path'];

					$update_pdf = $this->_update(
						['upload_data_id' => $upload_data_id],
						['upload_path' => $pdf_name],
						'upload_data'
					);
				}



				//$new_pdf_name = $data['upload_type']."_".time()."-".$upload_data_id;

				//$pdf_upload = $this->pdf_upload($this->config->item("posts_pdf_upload_path").$sub_category_id.'/','upload_path',$new_pdf_name);
				/*if($pdf_upload['status']==1){
					$pdf_name = $pdf_upload['u_response']['filename'];

					$update_pdf = $this->_update(['upload_data_id' => $upload_data_id],
						['upload_path' => $pdf_name], 'upload_data');
				}*/
			}

			if ($affected_rows != "" && isset($_FILES['upload_path']) && ($_POST['upload_type'] == 'audio' || $_POST['upload_type'] == 'video') && $_FILES['upload_path']['name'] != '') {

				$new_file_name = $data['upload_type'] . "_" . time() . "-" . $upload_data_id;

				$path = '';

				if ($_POST['upload_type'] == 'audio') {
					$path = $this->config->item("posts_audio_upload_path") . $sub_category_id . '/';
				}

				if ($_POST['upload_type'] == 'video' && $_POST['video_type'] == 'inhouse') {
					$path = $this->config->item("s3_posts_video_upload_path") . $sub_category_id . '/';
				}

				if ($path != '') {

					$file_upload = upload_media('upload_path', $path, false, $path, ['mpeg', 'x-wav', 'aac', 'mp3', 'mp4', 'mkv', 'flv', 'avi', '3gp'], 300000);
					if (array_key_exists('error', $file_upload)) {
						$response['status'] = false;
						$response['errors'] = [
							'upload_path' => "<label class='error'>" . $file_upload['error'] . "</label>"
						];
						return $response;
					}
					//print_r($file_upload); die();

					if (!empty($file_upload[0]['full_path'])) {
						$av_file_name = $file_upload[0]['raw_name'] . $file_upload[0]['file_ext'];

						$update_file = $this->_update(
							['upload_data_id' => $upload_data_id],
							['upload_path' => $av_file_name],
							'upload_data'
						);
					}
				}
			}

			if ($affected_rows != "" && $_POST['upload_type'] != 'video' && isset($_FILES['thumbnail'])) {

				$thumbnailpath = $this->config->item("s3_posts_thumbnail_upload_path") . $sub_category_id . '/';
				$image_upload = upload_media('thumbnail', $thumbnailpath, false, $thumbnailpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'thumbnail' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}

				if (!empty($image_upload[0]['full_path'])) {

					$image_name = $image_upload[0]['raw_name'] . $image_upload[0]['file_ext'];

					$update_image = $this->_update(
						['upload_data_id' => $upload_data_id],
						['thumbnail' => $image_name],
						'upload_data'
					);
				}
			} else {
				$thumbnailpath = $this->config->item("s3_posts_thumbnail_upload_path") . $sub_category_id . '/';
				$image_upload = upload_media('thumbnail', $thumbnailpath, false, $thumbnailpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);



				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'thumbnail' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}


				if (!empty($image_upload[0]['full_path'])) {

					$video_thumbnail_file_name = $image_upload[0]['full_path'];

					$update_image = $this->_update(
						['upload_data_id' => $upload_data_id],
						['thumbnail' => $video_thumbnail_file_name],
						'upload_data'
					);
				}
			}

			$response['status'] = ((int) ($affected_rows)) ? TRUE : FALSE;
		}

		return $response;
	}

	function modify_new()
	{
		/*Load the form validation Library*/
		$this->load->helper('upload_media');

		$this->load->library('form_validation');

		$is_Available = $this->check_for_posted_record($this->p_key_new, $this->table_new);
		if (!$is_Available['status']) {
			return $is_Available;
		}

		$this->load->library('form_validation');

		$errors = array();

		/*$this->form_validation->set_rules('category_id', 'Category','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_category_id', 'Sub Category','trim|required|xss_clean');*/
		$this->form_validation->set_rules('contributors_id', 'Contributors', 'trim|required|xss_clean');
		$this->form_validation->set_rules('upload_title', 'Upload Title', 'trim|required|max_length[150]|xss_clean');
		// $this->form_validation->set_rules('short_description', 'Short Description', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('meta_slug', 'Meta Slug', 'trim|required|xss_clean');
		/*$this->form_validation->set_rules('sort_order', 'Sort Sequence Number','trim|required|xss_clean');*/

		$upload_type 					= !empty($this->input->post('upload_type')) ? TRUE : FALSE;
		// $video_type 					= !empty($this->input->post('video_type')) ? TRUE : FALSE;
		$post_id 				= $this->input->post('id');/*
		$sub_category_id 				= $this->input->post('sub_category_id');*/
		$check_data = $this->get_records(['id' => $post_id], 'mch_posts');

		$category_id = $check_data[0]->category_id;
		$sub_category_id = $check_data[0]->sub_category_id;

		if ($upload_type == FALSE) {
			$errors['upload_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Type field is required.' . '</label>';
		} else {

			if ($_POST['upload_type'] == 'text') {
				/*$errors['desc_errors'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Description field is required.' . '</label>';			*/
				$this->form_validation->set_rules('upload_description', 'Upload Description', 'trim|required|xss_clean');
			} else if ($_POST['upload_type'] == 'video') {

				// if ($video_type == FALSE) {
				// 	$errors['video_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Video Type field is required.' . '</label>';
				// } else {

					// if ($this->input->post('video_type') == 'inhouse') {

					// 	if (!isset($_FILES['upload_path']) && $_POST['upload_path_name']) {
					// 		$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload File field is required.' . '</label>';
					// 	} else if (isset($_FILES['upload_path']) && $_FILES['upload_path']['name'] != '' && $_POST['video_type'] == 'inhouse' && ($_FILES['upload_path']['type'] != 'video/mp4' && $_FILES['upload_path']['type'] != 'video/mkv' && $_FILES['upload_path']['type'] != 'video/flv' && $_FILES['upload_path']['type'] != 'video/avi' && $_FILES['upload_path']['type'] != 'video/3gp')) {
					// 		$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Video File.' . '</label>';
					// 	}
					// } else if ($this->input->post('video_type') == 'youtube') {
						$this->form_validation->set_rules('youtube_video_code', 'YouTube Video ID', 'trim|required|xss_clean');
					// }
				// }
			} else {

				if (!isset($_FILES['upload_path']) && $_POST['upload_path_name']) {
					$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload File field is required.' . '</label>';
				} else {

					// if ($_FILES['upload_path']['name'] != '' && $_POST['upload_type'] == 'audio' && ($_FILES['upload_path']['type'] != 'audio/basic' && $_FILES['upload_path']['type'] != 'audio/mpeg' && $_FILES['upload_path']['type'] != 'audio/x-wav' && $_FILES['upload_path']['type'] != 'audio/mp3' && $_FILES['upload_path']['type'] != 'audio/aac')) {
					// 	$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Audio File.' . '</label>';
					// }
					// if ($_FILES['upload_path']['name'] != '' && $_POST['upload_type'] == 'pdf' && $_FILES['upload_path']['type'] != 'application/pdf') {
					// 	$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate PDF File.' . '</label>';
					// }
					if ($_FILES['upload_path']['name'] != '' &&  $_POST['upload_type'] == 'image' && ($_FILES['upload_path']['type'] != 'image/png' && $_FILES['upload_path']['type'] != 'image/jpeg' && $_FILES['upload_path']['type'] != 'image/jpg')) {
						$errors['upload_path'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Image File.' . '</label>';
					}
				}
			}
		}
		// print_r($this->form_validation->run());die(';;');
		// $upload_for_user_type 			= !empty($this->input->post('upload_for_user_type')) ? TRUE : FALSE;
		// if ($upload_for_user_type == FALSE) {
		// 	$errors['upload_for_user_type'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload For User Type field is required.' . '</label>';
		// }

		// if (!isset($_FILES['thumbnail']) && $_POST['thumbnail_name']) {
		// 	$errors['thumbnail'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Thumbnail field is required.' . '</label>';
		// }

		// if ($_FILES['thumbnail']['name'] != '' && ($_FILES['thumbnail']['type'] != 'image/png' && $_FILES['thumbnail']['type'] != 'image/jpeg' && $_FILES['thumbnail']['type'] != 'image/jpg')) {
		// 	$errors['thumbnail'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'Please Upload Appropriate Thumbnail Image File.' . '</label>';
		// }

		// if (empty($_POST['tags'])) {
		// 	$errors['error_tags'] = '<label class="error" style="color:#F44336; font-size:12px; font-weight:normal;">' . 'The Upload Tags field is required.' . '</label>';
		// }

		// if (isset($_POST['video_type']) && $_POST['video_type'] == 'youtube' && $_POST['youtube_video_code'] != '') {
		// 	$this->form_validation->set_rules('youtube_video_code', 'YouTube Video ID', 'trim|required|youtube_video_exists|xss_clean');
		// }

		if (!$this->form_validation->run() || !empty($errors)) {

			foreach ($this->input->post() as $key => $value) {
				print_r($value);
				$errors[$key] = form_error($key, '<label class="error">', '</label>');
			}
			$response['errors'] = array_filter($errors); // Some might be empty
			$response['status'] = FALSE;
		} else {
			// die('nnnn');
			$data = array();
			// $data['category_id'] = $category_id =  !empty($this->input->post('category_id')) ? $this->input->post('category_id') : NULL;

			// $data['sub_category_id'] = $sub_category_id =  !empty($this->input->post('sub_category_id')) ? $this->input->post('sub_category_id') : NULL;

			$data['date'] = !empty($this->input->post('eventdate')) ? date('Y-m-d', strtotime($this->input->post('eventdate'))) : "0000-00-00";

			// $data['event_time'] = !empty($this->input->post('eventtime')) ? $this->input->post('eventtime') : "00:00:00";

			// $data['event_link'] = !empty($this->input->post('event_link')) ? htmlentities($this->input->post('event_link')) : NULL;

			$data['contributor_id'] =  !empty($this->input->post('contributors_id')) ? $this->input->post('contributors_id') : NULL;

			$data['title'] = !empty($this->input->post('upload_title')) ? $this->input->post('upload_title') : NULL;

			// $data['short_description'] = !empty($this->input->post('short_description')) ? $this->input->post('short_description') : NULL;

			// $data['upload_for_user_type'] = !empty($this->input->post('upload_for_user_type')) ? $this->input->post('upload_for_user_type') : NULL;

			$data['type'] = !empty($this->input->post('upload_type')) ? $this->input->post('upload_type') : NULL;

			// $data['video_type'] = !empty($this->input->post('video_type')) ? $this->input->post('video_type') : NULL;

			// if ($_POST['upload_type'] == 'text') {
				$data['description'] = !empty($this->input->post('upload_description')) ? $this->input->post('upload_description') : NULL;
			// }

			// if (isset($_POST['video_type']) && $_POST['video_type'] == 'youtube') {
				$data['video_url'] = !empty($this->input->post('youtube_video_code')) ? $this->input->post('youtube_video_code') : NULL;;
			// }

			// $data['tags'] = !empty($this->input->post('tags')) ? $this->input->post('tags') : NULL;

			/*$data['sort_order'] = !empty($this->input->post('sort_order'))?$this->input->post('sort_order'):NULL;*/

			$one_record = $this->model->get_records(['id' => $_POST['id']], 'mch_posts');
			$one_record_sort_order = $one_record[0]->sort_order;

			$affected_rows = $this->_update(['id' => $_POST['id'], 'is_active' => '1'], $data, 'mch_posts');

			/*if(!empty($affected_rows) && ($one_record_sort_order != $data['sort_order'])){
				$all_records = $this->model->get_records(['category_id'=>$category_id,'sub_category_id'=>$sub_category_id],'upload_data');
				// auto change in sequence of the files on edit of post
				foreach ($all_records as $record) {
					if(($data['sort_order'] <= $record->sort_order) && ($upload_data_id !=$record->upload_data_id )){
						$this->db->set('sort_order', 'sort_order+1', FALSE);
						$this->db->where('upload_data_id', $record->upload_data_id);
						$this->db->update('upload_data');
					}
				}
			}*/

			// if ($affected_rows) {

				// $check_for_meta = $this->get_records(['meta_upload_data_id' => $_POST['upload_data_id'], 'is_active' => '1'], 'meta_tag_details', ['*']);

				// if (empty($check_for_meta)) {

				// 	$meta_data = array();
				// 	$meta_data['meta_upload_data_id'] = $_POST['upload_data_id'];
				// 	$meta_data['meta_title'] = !empty($this->input->post('meta_title')) ? $this->input->post('meta_title') : '';
				// 	$meta_data['meta_description'] = !empty($this->input->post('meta_description')) ? $this->input->post('meta_description') : '';
				// 	$meta_data['meta_keyword'] = !empty($this->input->post('meta_keyword')) ? $this->input->post('meta_keyword') : '';
				// 	$meta_data['meta_post_url'] = !empty($this->input->post('meta_post_url')) ? $this->input->post('meta_post_url') : '';
				// 	$meta_data['meta_slug'] = !empty($this->input->post('meta_slug')) ? $this->input->post('meta_slug') : '';

				// 	$meta_data_id = $this->_insert($meta_data, 'meta_tag_details');
				// } else {

				// 	$meta_data = array();
				// 	$meta_data['meta_title'] = !empty($this->input->post('meta_title')) ? $this->input->post('meta_title') : '';
				// 	$meta_data['meta_description'] = !empty($this->input->post('meta_description')) ? $this->input->post('meta_description') : '';
				// 	$meta_data['meta_keyword'] = !empty($this->input->post('meta_keyword')) ? $this->input->post('meta_keyword') : '';
				// 	$meta_data['meta_post_url'] = !empty($this->input->post('meta_post_url')) ? $this->input->post('meta_post_url') : '';
				// 	$meta_data['meta_slug'] = !empty($this->input->post('meta_slug')) ? $this->input->post('meta_slug') : '';

				// 	$affected_rows = $this->_update(['meta_upload_data_id' => $_POST['upload_data_id']], $meta_data, 'meta_tag_details');
				// }
			// }

			if ($affected_rows != "" && $_POST['upload_type'] == 'image' && isset($_FILES['upload_path']) && $_FILES['upload_path']['name'] != '') {
				$imgpath = $this->config->item("s3_posts_images_upload_path") . $sub_category_id . '/';
				$image_upload = upload_media('upload_path', $imgpath, false, $imgpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'upload_path' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}

				if (!empty($image_upload[0]['full_path'])) {
					$image_name = $image_upload[0]['raw_name'] . $image_upload[0]['file_ext'];

					$update_image = $this->_update(
						['id' => $post_id],
						['image' => $image_name],
						'mch_posts'
					);
				}

				//$new_image_name = $data['upload_type']."_".time()."-".$upload_data_id;

				//$image_upload = $this->file_upload($this->config->item("posts_images_upload_path").$sub_category_id.'/','upload_path',$new_image_name);
				/*if($image_upload['status']==1){
					$image_name = $image_upload['u_response']['filename'];

					$update_image = $this->_update(['upload_data_id' => $upload_data_id],
						['upload_path' => $image_name], 'upload_data');
				}*/
			}

			// if ($affected_rows != "" && $_POST['upload_type'] == 'pdf' && isset($_FILES['upload_path']) && $_FILES['upload_path']['name'] != '') {

			// 	$pdf_upload = upload_media('upload_path', '', true, $this->config->item("s3_posts_pdf_upload_path") . $sub_category_id . '/', ['pdf', 'jpeg', 'png'], 300000);

			// 	if (array_key_exists('error', $pdf_upload)) {
			// 		$response['status'] = false;
			// 		$response['errors'] = [
			// 			'upload_path' => "<label class='error'>" . $pdf_upload['error'] . "</label>"
			// 		];
			// 		return $response;
			// 	}

			// 	if (!empty($pdf_upload[0]['full_path'])) {
			// 		$pdf_name = $pdf_upload[0]['full_path'];

			// 		$update_pdf = $this->_update(
			// 			['upload_data_id' => $upload_data_id],
			// 			['upload_path' => $pdf_name],
			// 			'upload_data'
			// 		);
			// 	}



				//$new_pdf_name = $data['upload_type']."_".time()."-".$upload_data_id;

				//$pdf_upload = $this->pdf_upload($this->config->item("posts_pdf_upload_path").$sub_category_id.'/','upload_path',$new_pdf_name);
				/*if($pdf_upload['status']==1){
					$pdf_name = $pdf_upload['u_response']['filename'];

					$update_pdf = $this->_update(['upload_data_id' => $upload_data_id],
						['upload_path' => $pdf_name], 'upload_data');
				}*/
			// }

			// if ($affected_rows != "" && isset($_FILES['upload_path']) && ($_POST['upload_type'] == 'audio' || $_POST['upload_type'] == 'video') && $_FILES['upload_path']['name'] != '') {

			// 	$new_file_name = $data['upload_type'] . "_" . time() . "-" . $upload_data_id;

			// 	$path = '';

			// 	if ($_POST['upload_type'] == 'audio') {
			// 		$path = $this->config->item("posts_audio_upload_path") . $sub_category_id . '/';
			// 	}

			// 	if ($_POST['upload_type'] == 'video' && $_POST['video_type'] == 'inhouse') {
			// 		$path = $this->config->item("s3_posts_video_upload_path") . $sub_category_id . '/';
			// 	}

			// 	if ($path != '') {

			// 		$file_upload = upload_media('upload_path', $path, false, $path, ['mpeg', 'x-wav', 'aac', 'mp3', 'mp4', 'mkv', 'flv', 'avi', '3gp'], 300000);
			// 		if (array_key_exists('error', $file_upload)) {
			// 			$response['status'] = false;
			// 			$response['errors'] = [
			// 				'upload_path' => "<label class='error'>" . $file_upload['error'] . "</label>"
			// 			];
			// 			return $response;
			// 		}
			// 		//print_r($file_upload); die();

			// 		if (!empty($file_upload[0]['full_path'])) {
			// 			$av_file_name = $file_upload[0]['raw_name'] . $file_upload[0]['file_ext'];

			// 			$update_file = $this->_update(
			// 				['upload_data_id' => $upload_data_id],
			// 				['upload_path' => $av_file_name],
			// 				'upload_data'
			// 			);
			// 		}
			// 	}
			// }
				// print_r($affected_rows);die();
			if ($affected_rows != "" && isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != '') {

				$thumbnailpath = $this->config->item("s3_posts_thumbnail_upload_path") . $sub_category_id . '/';
				$image_upload = upload_media('thumbnail', $thumbnailpath, false, $thumbnailpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);

				if (array_key_exists('error', $image_upload)) {
					$response['status'] = false;
					$response['errors'] = [
						'thumbnail' => "<label class='error'>" . $image_upload['error'] . "</label>"
					];
					return $response;
				}

				if (!empty($image_upload[0]['full_path'])) {

					$image_name = $image_upload[0]['raw_name'] . $image_upload[0]['file_ext'];

					$update_image = $this->_update(
						['id' => $post_id],
						['thumbnail_image' => $image_name],
						'mch_posts'
					);
				}
			} else {
				// die(';;;');
				// $thumbnailpath = $this->config->item("s3_posts_thumbnail_upload_path") . $sub_category_id . '/';
				// $image_upload = upload_media('thumbnail', $thumbnailpath, false, $thumbnailpath, ['gif', 'jpeg', 'jpg', 'jpe', 'png', 'tiff', 'tif'], 300000);



				// if (array_key_exists('error', $image_upload)) {
				// 	$response['status'] = false;
				// 	$response['errors'] = [
				// 		'thumbnail' => "<label class='error'>" . $image_upload['error'] . "</label>"
				// 	];
				// 	return $response;
				// }


				// if (!empty($image_upload[0]['full_path'])) {

				// 	$video_thumbnail_file_name = $image_upload[0]['full_path'];

				// 	$update_image = $this->_update(
				// 		['id' => $post_id],
				// 		['thumbnail_image' => $video_thumbnail_file_name],
				// 		'mch_posts'
				// 	);
				// }
			}

			$response['status'] = ((int) ($affected_rows)) ? TRUE : FALSE;
			$response['redirect'] = 'lists_new';
		}

		return $response;
	}



	function remove()
	{

		if (isset($_POST['ids']) && sizeof($_POST['ids']) > 0) {
			$ids = $this->input->post('ids');

			$ids1 = implode(",", $ids);
			if (!empty($ids1)) {
				for ($i = 0; $i < count($ids); $i++) {
					$one_record = $this->model->get_records(['upload_data_id' => $ids[$i]], 'upload_data');
					$one_record_sort_order = $one_record[0]->sort_order;
					$all_records = $this->model->get_records(['category_id' => $one_record[0]->category_id, 'sub_category_id' => $one_record[0]->sub_category_id], 'upload_data');
					foreach ($all_records as $record) {
						if ($one_record_sort_order < $record->sort_order) {
							$this->db->set('sort_order', 'sort_order-1', FALSE);
							$this->db->where('upload_data_id', $record->upload_data_id);
							$this->db->update('upload_data');
						}
					}
				}
				$data['is_active'] = 0;

				$response = $this->_update_with($this->p_key, $ids, array(), $data, $this->table);

				$meta_response = $this->_update_with('meta_upload_data_id', $ids, array(), $data, 'meta_tag_details');

				//$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "Record(s) Successfully deleted" : 'Error while deleting record(s)';
			} else {
				$msg = "Post(s) can not be deleted!!";
			}

			return ['msg' => $msg];
		}

		return ['msg' => 'No Records Selected'];
	}

	function remove_new()
	{

		if (isset($_POST['ids']) && sizeof($_POST['ids']) > 0) {
			$ids = $this->input->post('ids');

			$ids1 = implode(",", $ids);
			if (!empty($ids1)) {
				// for ($i = 0; $i < count($ids); $i++) {
				// 	$one_record = $this->model->get_records(['id' => $ids[$i]], 'mch_posts');
				// 	$one_record_sort_order = $one_record[0]->sort_order;
				// 	$all_records = $this->model->get_records(['category_id' => $one_record[0]->category_id, 'sub_category_id' => $one_record[0]->sub_category_id], 'mch_posts');
				// 	foreach ($all_records as $record) {
				// 		if ($one_record_sort_order < $record->sort_order) {
				// 			$this->db->set('sort_order', 'sort_order-1', FALSE);
				// 			$this->db->where('upload_data_id', $record->upload_data_id);
				// 			$this->db->update('upload_data');
				// 		}
				// 	}
				// }
				$data['is_active'] = 0;

				$response = $this->_update_with($this->p_key_new, $ids, array(), $data, $this->table_new);

				// $meta_response = $this->_update_with('meta_upload_data_id', $ids, array(), $data, 'meta_tag_details');

				//$affected_rows = $this->db->affected_rows();
				$msg = ($response) ? "Record(s) Successfully deleted" : 'Error while deleting record(s)';
			} else {
				$msg = "Post(s) can not be deleted!!";
			}

			return ['msg' => $msg];
		}

		return ['msg' => 'No Records Selected'];
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
}
