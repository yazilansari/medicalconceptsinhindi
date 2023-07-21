<?php 

class App_vision_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    
    public function get_appvision(){
        //$this->db->order_by("app_vision_id","asc");
        $query= $this->db->get_where("app_vision", array("app_vision_id"=> 1))->row();
        // return $query->result_array();
        return $query;
    }
    
     public function update_app_vision(){

        $this->db->set("app_vision", $this->input->post("app_vision"));
        // $this->db->set("app_vision", htmlspecialchars($this->input->post("app_vision")));
        $this->db->where("app_vision_id", 1);
        $this->db->update("app_vision");
        // print_r($this->db->last_query());
        // die;
        return true;
    }
    
}