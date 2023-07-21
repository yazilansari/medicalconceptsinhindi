<?php
class Api_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->query("SET session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
		$this->db->query("SET time_zone = '+05:30'");
	}
	
	function getLatestVersion(){
		$sql = "SELECT * FROM `version_control` WHERE version_status = 'active'";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $each_version){
			$result[$each_version['os']] = $each_version['version_code'];
		}
		
		return $result;
	}
	
	function updatePatientAppVersion($patient_id, $version){
		$sql = "UPDATE `patient_access_token` SET app_version = " . $this->db->escape($version) . " WHERE patient_id = '" . (int)$patient_id . "' ORDER BY token_id DESC LIMIT 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
		
	function patientLogin($mobile, $digi_code){
		$query = $this->db->query("SELECT p.patient_id, patient_name, gender, mobile  FROM `patient` p 
				INNER JOIN `patient_to_doctor` p2d ON (p.patient_id = p2d.patient_id AND p2d.status = 'active')
				INNER JOIN `doctor` d ON (p2d.doctor_id = d.doctor_id) 
				WHERE p.mobile = " . $this->db->escape($mobile) . "  AND d.doctor_code = " . $this->db->escape($digi_code) . " LIMIT 1");
		return $query->row_array();
	}
	
	function get_user_token($access_token){
		$query = $this->db->query("SELECT * FROM users WHERE access_token = " . $this->db->escape($access_token) . "LIMIT 1");
		return $query->row_array();
	}
		
	function patientLogout($patient_id){
		$sql = "UPDATE `patient_access_token` SET token_status = 'inactive' WHERE patient_id = '" . (int)$patient_id . "'";
		
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
}