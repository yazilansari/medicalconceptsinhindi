<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_sms extends MY_Model {

	public $p_key = 'doctor_id';
	public $table = 'doctor';

	function __construct() {
		parent::__construct($this->table);
	}

	function get_collection() {

    	$q = $this->db->select('
			doctor.doc_id, doctor.doc_name, doctor.doc_mobile, doctor.insert_dt, doctor.city_id,
			mr.users_name AS mr_name, city.city_name, mr.users_mobile
    	')
		->from('doctor')
		->join('city', 'doctor.city_id = city.city_id')
		->join('manpower mr', 'doctor.city_id = mr.users_city_id', 'LEFT')
		->where('doctor.is_deleted',0);
		$collection = $q->get()->result();
		return $collection;
	}

	function getPatientsForTemplate() {
		$q = $this->db->select('
			patient.*, doctor.doc_name, doctor_health_tips_translate.message, language.language_name
		')
		->from('patient')
		->join('language', 'language.language_code = patient.lang_code')
		->join('doctor', 'doctor.doc_id = patient.doctor_id')
		->join('doctor_health_tips', 'doctor_health_tips.doctor_id = doctor.doc_id')
		->join('doctor_health_tips_translate', 'doctor_health_tips_translate.doc_ht_id = doctor_health_tips.doc_ht_id and language.language_id = doctor_health_tips_translate.language_id')
		->where('doctor.is_deleted',0)
		->group_by('patient.patient_id');
		$collection = $q->get()->result();
		return $collection;
	}

	function get_patient_collection($month,$year)
	{
		$q = $this->db->select('
			p.patient_name,p.patient_mobile,dht.doctor_ivr')
		->from('doctor_health_tips dht')
		->join('patient p', 'p.doctor_id = dht.doctor_id');

		if(!empty($month)){
			$q->where('dht.doctor_month',$month);
		}
		
		if(!empty($year)){
			$q->where('dht.doctor_year',$year);
		}

		// print_r($this->db->get_compiled_select());exit;
		$collection = $q->get()->result();
		
		return $collection;
	}
}