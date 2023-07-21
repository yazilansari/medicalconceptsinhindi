<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App_vision_new extends CI_Controller
{
	
    public function index(){
        if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}

		if ($this->input->post('search') == TRUE) {
			$this->set_view($this->data, 'home',  '_admin');
		}
        $this->load->model("App_vision_new_model");
        
        $data['visions']= $this->App_vision_new_model->get_appvision();
        
        $this->load->view("admin_header_new",$data);
    }
    
    public function update_app_vision_new(){
        if( ! $this->session->is_logged_in() ){
			redirect('admin/login','refresh');
		}
		$this->form_validation->set_rules("app_vision_new","App Vision", "required|trim");
		
		if($this->form_validation->run() == FALSE){
		    redirect("App_vision_new/index");
		}else{
		    $this->load->model("App_vision_new_model");
		    $res= $this->App_vision_new_model->update_app_vision();
		    if($res == false){
		        $this->session->set_flashdata("update_app_vision_failed","Failled to update!");
		        redirect("App_vision_new/index");
		    }else{
		        $this->session->set_flashdata("update_app_vision","Updated!");
		        redirect("App_vision_new/index");
		    }
		}
    }
}



?>