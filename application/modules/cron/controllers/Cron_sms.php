<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_sms extends Generic_Controller
{
	private $model_name = 'mdl_sms';

	function __construct()
	{
		parent::__construct();
		$this->load->model($this->model_name, 'model');
	}

	public function index()
	{
		$this->load->helper('send_sms');
		$doctors = $this->model->get_collection();
		if(!empty($doctors))
		{
			foreach($doctors as $doc)
			{
				if(!empty($doc->expected_dt)){
					$previous_date = date('Y-m-d', strtotime($doc->expected_dt .' -1 day'));
					$todaydate = date("Y-m-d");
					if($previous_date == $todaydate)
					{
						$doctor_msg = "Dear Dr. ".$doc->doctor_name.",\nGentle reminding about your Bioflash documents which will be collected by our AFM ".$doc->asm_name." tomorrow.\nRegards,\nTeam Ridacne";
						send_sms($doc->doctor_mobile, $doctor_msg, 'DOCTOR REMINDER');

						$afm_msg = "Dear ".$doc->asm_name." , \nGentle reminding about Bioflash documents.Please collect the documents of bioflash of Dr. ".$doc->doctor_name." tomorrow .\nRegards,\nTeam Ridacne";
						send_sms($doc->users_mobile, $afm_msg, 'AFM REMINDER');
					}
				}
			}
			exit;
		}
	}

	public function sendTemplate() {
		$this->load->helper('send_sms');
		$patientsForTemplate = $this->model->getPatientsForTemplate();
		if(!empty($patientsForTemplate)) {
			foreach($patientsForTemplate as $patientRow) {
				send_sms($patientRow->patient_mobile, trim($patientRow->message), 'Health Tip');
			}
		}
		echo "Done";exit;
	}

	public function voiceCall(){
		$this->load->helper('send_voice_call');
		$month = date('m');
		$year = date('Y');
		$patients = $this->model->get_patient_collection($month,$year);
		if(!empty($patients))
		{
			foreach($patients as $pat)
			{
				if(!empty($pat->doctor_ivr) && !empty($pat->patient_mobile) ){
					send_voice_call($pat->patient_mobile, $pat->doctor_ivr, 'DOCTOR VOICE CALL');
				}
			}
			exit;
		}
	}
}