<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation{

    function run($module = '', $group = ''){

        (is_object($module)) AND $this->CI = &$module;

        return parent::run($group);

    }

    function valid_url_format($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->set_message('valid_url_format', 'URL you entered is not correctly formatted.');
            return FALSE;
        }
        return TRUE;
    }

    function url_exists($url){
        $url_data = parse_url($url); // scheme, host, port, path, query
        if(!fsockopen($url_data['host'], isset($url_data['port']) ? $url_data['port'] : 80)){
            $this->set_message('url_exists', 'URL you entered is not accessible.');
            return FALSE;
        }
        return TRUE;
    }

    function valid_pincode($data, $country = 'IN'){

        /*$ZIPREG=array(
            "US"=>"^\d{5}([\-]?\d{4})?$",
            "UK"=>"^(GIR|[A-Z]\d[A-Z\d]??|[A-Z]{2}\d[A-Z\d]??)[ ]??(\d[A-Z]{2})$",
            "DE"=>"\b((?:0[1-46-9]\d{3})|(?:[1-357-9]\d{4})|(?:[4][0-24-9]\d{3})|(?:[6][013-9]\d{3}))\b",
            "CA"=>"^([ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ])\ {0,1}(\d[ABCEGHJKLMNPRSTVWXYZ]\d)$",
            "FR"=>"^(F-)?((2[A|B])|[0-9]{2})[0-9]{3}$",
            "IT"=>"^(V-|I-)?[0-9]{5}$",
            "AU"=>"^(0[289][0-9]{2})|([1345689][0-9]{3})|(2[0-8][0-9]{2})|(290[0-9])|(291[0-4])|(7[0-4][0-9]{2})|(7[8-9][0-9]{2})$",
            "NL"=>"^[1-9][0-9]{3}\s?([a-zA-Z]{2})?$",
            "ES"=>"^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$",
            "DK"=>"^([D-d][K-k])?( |-)?[1-9]{1}[0-9]{3}$",
            "SE"=>"^(s-|S-){0,1}[0-9]{3}\s?[0-9]{2}$",
            "BE"=>"^[1-9]{1}[0-9]{3}$",
            "IN"=>"^([1-9])([0-9]){5}$"
        );*/

        $this->set_message('valid_pincode', 'Invalid pincode');

        return (preg_match("/^([1-9])([0-9]){5}$/", $data)) ? TRUE : FALSE;
    }

    function valid_name($data){
      $first_lett = $data[0];
        if(!preg_match('/^[a-zA-Z ]+$/',$first_lett)){
            $this->set_message('valid_name', 'Must start with an alphabet');
            return FALSE;
        }
        elseif(!preg_match('/^[a-z0-9\040\.\-\']+$/i', $data)){
            $this->set_message('valid_name', 'Invalid characters');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    /*function valid_mobile($data){
        $this->set_message('valid_mobile', 'Invalid Mobile Number');
        return (preg_match('/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/', $data)) ? TRUE : FALSE;
    }*/

    function valid_date($data){
    
        $this->set_message('valid_date', 'Invalid Date Format');
        if(preg_match("/(\d{2})\-(\d{2})\-(\d{4})$/", $data, $matches)){
            return (checkdate((int) $matches[2],(int)$matches[1],(int) $matches[3]) );
        }else{
            return false ;
        }
    }

     function validate_time($str){
      //Assume $str SHOULD be entered as HH:MM
       /*if(!is_numeric($str)){
            $this->set_message('validate_time', 'Invalid time');
            return FALSE;
       } */
      list($hh, $mm) = explode(':', $str);
      if (!is_numeric($hh) || !is_numeric($mm))
      {
          $this->set_message('validate_time', 'Invalid time');
          return FALSE;
      }
      else if (((int) $hh < 0) || ((int) $hh > 24) || ((int) $mm < 0) || ((int) $mm > 59))
      {
          $this->set_message('validate_time', 'Invalid time');
          return FALSE;
      }

      return TRUE;
      }

      function in_future($to,$from)
      {     
          $time_to = $to;
          
          if(!empty($_POST)){
            $time_from = $_POST[$from];
          }else{
            $time_from = $from;
          }
          

          $validate_time = strtotime($time_to) - strtotime($time_from);
          if($validate_time <= 0){
            $this->set_message('in_future', 'End Time Should be Greater.');
            return FALSE;
          }else{
            return TRUE;
          }

      }

      function validate_previous_date($str)
      {
        $current_date = date('Y-m-d');
        $input_date = date('Y-m-d',strtotime($str));
        $future_date = strtotime($input_date) - strtotime($current_date);
        if($future_date < 0){
          $this->set_message('validate_previous_date', 'Date should be today or future date');
          return FALSE;
        }

        return TRUE;
      }

    function valid_mon_year($data){
        $this->set_message('valid_mon_year', 'Invalid Month/Year Format should be (mm/yyyy)');

        if(preg_match("/(\d{2})\/(\d{4})$/", $data, $matches)){
            return (checkdate((int) $matches[1], 1 ,(int) $matches[2]) );
        }else{
            return false ;
        }
    }

    function valid_mobile($data){
        $this->set_message('valid_mobile', 'Invalid Mobile Number');
        return (preg_match('/^[1-9][0-9]{9}$/', $data)) ? TRUE : FALSE;
    }


    function valid_landline($data){
        $this->set_message('valid_landline', 'Invalid Telephone Number');
        return (preg_match('/\d{3}([- ]*)\d{6}/', $data)) ? TRUE : FALSE;
    }

    function unique_key($str, $field){
        $this->set_message('unique_key', "%s already exists");

        sscanf($field, '%[^.].%[^.]', $table, $field);

        $record = $this->CI->db->select($field)->from($table)->where([$field=> $str,"is_active" =>"1"])->limit(1)->get()->num_rows();
        return ($record) ? FALSE : TRUE;
    }

    function check_record($str, $field){
        $this->set_message('check_record', "%s does not exists");

        sscanf($field, '%[^.].%[^.]', $table, $field);

        $record = $this->CI->db->select($field)->from($table)->where([$field=> $str])->limit(1)->get()->num_rows();
        return ($record) ? TRUE : FALSE;
    }

    function required_file($field){
        return (!empty($_FILES[$field]['name'])) ? TRUE : FALSE;
    }

    function word_count_min($data, $min){
        $this->set_message('word_count_min', "%s must have atleast $min words");
        return (str_word_count($data) < $min) ? FALSE : TRUE;
    }

    function word_count_max($data, $max){
        $this->set_message('word_count_max', "%s exceeds $max words");
        return (str_word_count($data) > $max) ? FALSE : TRUE;
    }

    function valid_hour($data){
        $this->set_message('valid_hour', '%s is not valid');
        return ((int) $data >= 0 && (int) $data <= 23) ? TRUE : FALSE;
    }

    function valid_minute($data){
        $this->set_message('valid_minute', '%s is not valid');
        return ((int) $data >= 0 && (int) $data <= 59) ? TRUE : FALSE;
    }

    function youtube_video_exists($key){

        $ci = &get_instance();
        $ci->load->config('config');
        $yt_api_key = $ci->config->item('youtube_api_key');
        $url = "https://www.googleapis.com/youtube/v3/videos?id=$key&part=snippet%2CcontentDetails%2Cstatistics%20&key=$yt_api_key";
        $youtube_data = json_decode(file_get_contents($url));
        
        $item = $youtube_data->items;
        
        if(empty($item)){
          $this->set_message('youtube_video_exists', 'Please enter valid YouTube Video ID. Video with following ID does not exists.');
            return FALSE;
        }
        return TRUE;
    }
}
