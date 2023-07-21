<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('notification')) {

  function notification($registrationIds,$user_id,$request_id,$device_ids,$title,$n_req_id,$session_owner,$upload_data_id,$upload_type,$upload_path,$video_type,$youtube_video_id,$upload_for_user_type,$short_description,$sub_category_id,$each_device_type)
  {
    //var_dump($user_ids);exit;
    $chunk = array_chunk($registrationIds,1000,true);
    //$chunk2 = array_chunk($user_ids,1000,true);


    fcm_push($chunk[0],$user_id,$request_id,$device_ids,$title,$n_req_id,$session_owner,$upload_data_id,$upload_type,$upload_path,$video_type,$youtube_video_id,$upload_for_user_type,$short_description,$sub_category_id,$each_device_type);
  }

  /**
   * Gets Result Array with Key (Register Ids) <=> Value (Notification Result) Pair
   * @param register_ids[] Registration Ids  List Of Registration Ids
   * @param notification_result Result Json registration result
   * 
   * @return registration_result[] Registration with result
   */
  function get_notification_status($register_ids,$notification_json_result){
    $notification_result = json_decode($notification_json_result,TRUE);
    if(count($notification_result) < 0 || !is_array($notification_result)){ return; }
    $keys1  = [];
    foreach ($notification_result["results"] as $key => $value) {
        if(array_key_exists("error", $value) || array_key_exists("message_id",$value)){
            foreach ($value as $k1 => $v1) {
                array_push($keys1,$v1);
            }
        }
    }   
    return array_combine($register_ids,$keys1);
  }

  function fcm_push($registration_ids,$user_id,$request_id,$device_ids,$title,$n_req_id,$session_owner,$upload_data_id,$upload_type,$upload_path,$video_type,$youtube_video_id,$upload_for_user_type,$short_description,$sub_category_id,$device_type)
  {
    
    $log_file = APPPATH . 'logs/notification_log' . date('Y-m-d') . ".log";
    if(! $device_type){
      error_log("NOTIFICATION CALLED USING EMPTY DEVICE TYPE FOR Registeration IDs :: " . json_encode($registration_ids) . PHP_EOL, 3, $log_file);
      return;
    }

    // Fields Length Fixes
    $title = mb_strimwidth($title,0,255,'...');
    //$desc = 'New Content Uploaded';
    $desc = mb_strimwidth($short_description,0,1152,'...');

    $ci =& get_instance();
    $ci->load->database();

    $base_url = $ci->config->base_url();
    // Set POST variables
    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = [];
    if($device_type) {

      $notification_data = array(
        "body"            => $desc, 
        "title"           => $title,
        "upload_data_id"  => $upload_data_id,
        "upload_type"     => $upload_type,
        "upload_path"     => $upload_path,
        "video_type"     => $video_type,
        "youtube_video_id"     => $youtube_video_id,
        "upload_for_user_type"  => $upload_for_user_type,
      );

      switch (strtolower($device_type)) {
        case 'android':          
          $fields['registration_ids'] = (array)$registration_ids;
          // $fields['notification'] = $notification_data;
          $fields['data'] = $notification_data;
          $fields['priority'] = 'high';
          break;

        case 'ios':
          $fields['registration_ids'] = (array)$registration_ids;
          $fields['notification'] = $notification_data;
          $fields['mutable_content'] = TRUE;
          $fields['content_available'] = TRUE;
          break;
        
        default:
          error_log("NOTIFICATION CALLED USING :: " . $device_type . " :: DEVICE TYPE FOR Registeration IDs :: " . json_encode($registration_ids) . PHP_EOL, 3, $log_file);
          break;
      }
    }

    $headers = array('Authorization: key='.API_ACCESS_KEY,'Content-Type: application/json');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    
    $log = 'message: ' . json_encode($fields) . ' :: response: ' . $result . PHP_EOL;
    error_log($log, 3, $log_file);

    if ($result === FALSE) {
      return;
    }else{

      $registration_log_ids = get_notification_status($registration_ids,$result);

      foreach ($registration_log_ids as $key => $value) {

          $data = [
            'insert_user_id'  =>  $user_id,
            'register_id'     =>  $key,
            'status'          =>  $value,
            'title'           =>  $title,
            'upload_data_id'  => $upload_data_id,
            'upload_type'     => $upload_type,
            'upload_path'     => $upload_path,
            'video_type'      => $video_type,
            'youtube_video_id'     => $youtube_video_id,
            'upload_for_user_type'  => $upload_for_user_type,
            'sub_category_id'  => $sub_category_id,
            'desc'            =>  $desc,
            'insert_dt'       =>  date('Y-m-d H:i:s')
          ];
        $ci->db->insert('notification_log', $data);
      }
    }
    }
  }

 ?>
