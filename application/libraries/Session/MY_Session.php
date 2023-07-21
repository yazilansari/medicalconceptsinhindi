<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Session extends CI_Session {
    private $session_key;

    function __construct(){
        parent::__construct();
        $this->session_key = config_item('session_data_key');
    }

    public function array_keys_exist( array $array, $keys ) {
	    $count = 0;
	    if ( ! is_array( $keys ) ) {
	        $keys = func_get_args();
	        array_shift( $keys );
	    }
	    foreach ( $keys as $key ) {
	        if ( array_key_exists( $key, $array ) ) {
	            $count ++;
	        }
	    }

	    return count( $keys ) === $count;
	}

	public function is_logged_in(){
		$is_session_set = $this->userdata($this->session_key);

		if( isset($is_session_set) ){
			return ( $this->array_keys_exist( $is_session_set, ['user_id', 'user_name', 'role']) ) ? TRUE : FALSE;
		}
		else{
			return FALSE;
		}
	}

	public function get_field_from_session($field = 'role'){

		$session_data = $this->userdata($this->session_key);
		if(! count($session_data)){ return FALSE; }

		switch($field){
			case 'user_id':
				$value = $session_data['user_id']; break;
			case 'user_name':
				$value = $session_data['user_name']; break;
			case 'role':
				$value = $session_data['role']; break;
			default:
				$value = $session_data['role'];
		}

		return $value;
	}

	public function is_Ajax(){
		$CI = &get_instance();
		return ($CI->input->is_ajax_request()) ? TRUE : FALSE;
	}

	public function is_Ajax_and_logged_in(){
		if( ! $this->is_Ajax() ){ show_404(); }

		$login_status = (int) $this->is_logged_in();

		if( ! $login_status){
			echo json_encode(['status'=> FALSE, 'error'=> 'Access Denied']); exit;
		}
	}
}  