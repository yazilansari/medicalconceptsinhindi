<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Generic_Controller
{
	private $module = 'admin';
	private $model_name = 'mdl_admin';

	function __construct() {
		parent::__construct();
		$this->load->model($this->model_name, 'model');

		//echo $key = bin2hex($this->encryption->create_key(16)); die();
		$this->data['controller'] = $this->data['mainmenu'] = $this->module;
		$this->data['menu'] = '';
	}

	function search(){
		if( $this->session->is_logged_in() ){
			redirect('admin/home','refresh');
		}

		$this->data['module'] = 'admin';

		$this->set_view($this->data, 'login-form',  '_login');
	}


	function login(){
		if( $this->session->is_logged_in() ){
			redirect('admin/home','refresh');
		}

		$this->data['module'] = 'admin';

		$this->set_view($this->data, 'login-form',  '_login');
	}	

	function submit(){
		if(! $this->input->post()){ show_404();	}
		$status = $this->model->authenticate();

		if($status){
			redirect('admin/home','refresh');
		}
		
		$errors = validation_errors();
		if(empty($errors)) {
			$this->data['error_msg'] = 'Username and Password don\'t match';
		}
		
		$this->data['module'] = 'admin';
		$this->set_view($this->data, 'login-form',  '_login');
	}

	function home(){
		if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}

		if ($this->input->post('search') == TRUE) {
			$this->set_view($this->data, 'home',  '_admin');
		}

		$this->data['plugins'] = ['countTo'];

		$this->data['categoryCount'] = count($this->model->getCategoryCount());
		$this->data['subCategoryCount'] = count($this->model->getSubCategoryCount());
		$this->data['postsCount'] = count($this->model->getPostsCount());
		$this->data['usersCount'] = count($this->model->getUsersRegistered());
		$this->data['medicoCount'] = count($this->model->getUsersRegistered('u.users_type="student"'));
		$this->data['generalCount'] = count($this->model->getUsersRegistered('u.users_type="general"'));

		$this->set_view($this->data, 'home',  '_admin');
	}

	function logout(){
		$session_key = config_item('session_data_key');
		$sessionData = array('user_id'=>'',	'user_name'=>'', 'role'=>'');
		
		$this->session->unset_userdata($session_key, $sessionData);
     	redirect('admin/login','refresh');
	}
}