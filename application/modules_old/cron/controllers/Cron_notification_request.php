<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_notification_request extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('mdl_notification_request');
        $this->load->helper(array('notification'));
	}

	public function index()
	{
        /** 
         * Check Cron In Progress
         */
        $cron_in_progress = $this->mdl_notification_request->get_records([],'notification_cron_status',['status']);
        if($cron_in_progress[0]->status){
            echo 'Cron Active';
            exit;
        }

        /**
         * Update Cron Status to Active
         */
        
        $this->mdl_notification_request->_update(['c_status_id' => 1],['status' => 1],'notification_cron_status');        
        
        // $notification_request = $this->mdl_notification_request->get_records(['request_status' => 0],'notification_request',[],'',0,0,'device_id,type');
        $notification_request = $this->mdl_notification_request->get_notification_request();
        //echo '<pre>';print_r($notification_request);exit;
        if(!empty($notification_request))
		{	
            $data = array();
            
            foreach ($notification_request as $value) {

                if(empty($value->device_id)) {
                    continue;
                }

                if(empty($value->device_type)) {
                    continue;
                }

                $data[$value->device_type][$value->n_req_id]['device_ids'][$value->user_id][] = $value->device_id;
                $data[$value->device_type][$value->n_req_id]['n_req_id'] = $value->n_req_id;
                $data[$value->device_type][$value->n_req_id]['user_id'] = $value->user_id;
                $data[$value->device_type][$value->n_req_id]['title'] = $value->upload_title;
                $data[$value->device_type][$value->n_req_id]['session_owner'] = $value->session_owner;
                $data[$value->device_type][$value->n_req_id]['upload_data_id'] = $value->upload_data_id;
                $data[$value->device_type][$value->n_req_id]['sub_category_id'] = $value->sub_category_id;
                $data[$value->device_type][$value->n_req_id]['upload_type'] = $value->upload_type;
                $data[$value->device_type][$value->n_req_id]['upload_title'] = $value->upload_title;
                if($value->video_type){
                  $data[$value->device_type][$value->n_req_id]['video_type'] = $value->video_type;
                }else{
                  $data[$value->device_type][$value->n_req_id]['video_type'] = "";
                }

                $data[$value->device_type][$value->n_req_id]['upload_for_user_type'] = $value->upload_for_user_type;
                $data[$value->device_type][$value->n_req_id]['short_description'] = $value->short_description;
                $data[$value->device_type][$value->n_req_id]['upload_path'] = $this->mdl_notification_request->get_file_path($value->upload_path,$value->upload_type,$value->sub_category_id);
                if($value->youtube_video_id){
                  $data[$value->device_type][$value->n_req_id]['youtube_video_id'] = $value->youtube_video_id;
                }else{
                  $data[$value->device_type][$value->n_req_id]['youtube_video_id'] = "";
                }
            }

            if(count($data)){               
                $device_types = array_keys($data);

                foreach($device_types as $k1 => $v1){

                    foreach($data[$v1] as $req_key => $notf_arr){
                        
                        $device_ids = $notf_arr['device_ids'];
                        
                        foreach ($device_ids as $doc_id => $register_doc_id) {
                            $register_ids = array_values($register_doc_id);
                        
                            if(empty($register_ids)) { continue; } 

                            $request_id = $req_key;
                            $user_id = $doc_id;
                            $device_ids = $notf_arr['device_ids'];
                            $n_req_id = $notf_arr['n_req_id'];
                            $title = $notf_arr['title'];
                            $session_owner = $notf_arr['session_owner'];
                            $upload_data_id = $notf_arr['upload_data_id'];
                            $upload_type = $notf_arr['upload_type'];
                            $video_type = $notf_arr['video_type'];
                            $upload_for_user_type = $notf_arr['upload_for_user_type'];
                            $short_description = $notf_arr['short_description'];
                            $upload_path = $notf_arr['upload_path'];
                            $sub_category_id = $notf_arr['sub_category_id'];
                            $youtube_video_id = $notf_arr['youtube_video_id'];
                            $each_device_type = $v1;
               // print_r($youtube_video_id);exit;

                        notification(
                            $register_ids,
                            $user_id,
                            $request_id,
                            $device_ids,
                            $title,
                            $n_req_id,
                            $session_owner,
                            $upload_data_id,
                            $upload_type,
                            $upload_path,
                            $video_type,
                            $youtube_video_id,
                            $upload_for_user_type,
                            $short_description,
                            $sub_category_id,
                            $each_device_type
                        );

                        

                     $temp = $this->mdl_notification_request->_delete_from('device_id',$register_ids,'notification_request_devices', ['request_id' => $request_id]);

                    // echo '<pre>';print_r($this->db->last_query());exit;
                    

                   $is_notification_device_exist =  $this->mdl_notification_request->get_records(['request_id' => $request_id], 'notification_request_devices');

                   
                     if(count($is_notification_device_exist) > 0){
                        continue;
                     }
                    
                    $this->mdl_notification_request->_delete('n_req_id',[$request_id],'notification_request');
                        
                        }
                                               
    
                    }

                }
                
            }
    
        }

        $this->mdl_notification_request->_update(['c_status_id' => 1],['status' => 0],'notification_cron_status');
        echo 'Success';
	}

    function is_notification_request_exist($request_id)
    {
        return $this->mdl_notification_request->get_records(['request_id' => $request_id], 'notification_request_devices');
    }

}
