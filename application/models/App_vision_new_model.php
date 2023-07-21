<?php 

class App_vision_new_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    
    public function get_appvision(){
        //$this->db->order_by("app_vision_id","asc");
        $query = $this->db->get_where("mch_about", array("id"=> 1))->row();
        // return $query->result_array();
        // echo $this->db->last_query();die();
        return $query;
    }
    
     public function update_app_vision(){

        $this->db->set("about", $this->input->post("app_vision_new"));
        // $this->db->set("app_vision", htmlspecialchars($this->input->post("app_vision")));
        $this->db->where("id", 1);
        $this->db->update("mch_about");
        // print_r($this->db->last_query());
        // die;
        return true;
    }
    
}