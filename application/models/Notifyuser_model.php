<?php 

class Notifyuser_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    
    public function get_useremails(){
        $this->db->select("email_id");
        $this->db->from("users");
        return $this->db->get();
    }
    
    public function getstudentemails(){
        $this->db->select("email_id");
        $this->db->where("users_type","Student");
        $this->db->from("users");
        return $this->db->get();
    }
    
    public function getgeneralemails(){
        $this->db->select("email_id");
        $this->db->where("users_type","General");
        $this->db->from("users");
        return $this->db->get();
    }
}
