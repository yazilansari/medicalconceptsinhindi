<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privacy extends CI_Controller
{
    public function index(){
        $this->load->model('front/mdl_front');

		$data['main_category'] = $this->mdl_front->get_records(['is_active' => '1'],'main_category');

		$category = array();
		foreach ($data['main_category'] as $key2 => $value2) {
			
			$category_data = $this->mdl_front->get_category_collection(['c.is_active' => '1','mc.is_active' => '1','mcm.is_active' => '1', 'mc.main_category_id' => $value2->main_category_id]);
			$category = array_merge($category,$category_data);
		}
		
		$data['category'] = $category;
		$upload_data = array();
		foreach ($data['main_category'] as $key => $value) {
			
			foreach ($category as $key1 => $value1) {
				
				if($value->main_category_id == $value1->main_category_id){
					$upload_data[$value->main_category_id][$value1->category_id] = $this->mdl_front->get_upload_mapping_records(['mc.main_category_id' => $value->main_category_id, 'c.category_id' => $value1->category_id], '', 3);	
				}
				
			}

		}
		$data['upload_data'] = $upload_data;
		
		$data['text_data'] = $this->mdl_front->get_sub_category_collection(['c.is_active' => '1','mc.is_active' => '1','mcm.is_active' => '1','sc.is_active' => '1',  'c.category_name' => 'Text'],0, 0, 0, ['text','pdf'] );

		$data['recent_post'] = $this->mdl_front->get_post_collection(['sc.is_active' => '1','ud.is_active' => '1'], '',3);

		$data['app_vision'] = $this->mdl_front->get_records(['is_active' => '1'],'app_vision',['*'],'app_vision_id desc',1);

        $this->load->view("privacy", $data);
    }
}