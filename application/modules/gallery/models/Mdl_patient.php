<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_patient extends MY_Model {

	public $p_key = 'patient_id';
	public $table = 'patient';

	function __construct() {
		parent::__construct($this->table);
	}
	
	function get_patient_count($users_id = '', $users_type = '') {
		
		$sql = "SELECT 
					count(`patient`.patient_id) AS patient_cnt,
					`tb_mr`.users_id as mr,
					`tb_asm`.users_id as asm,
					`tb_rsm`.users_id as rsm,`tb_zsm`.users_id as zsm
				FROM `patient`
				LEFT JOIN `doctor` ON `doctor`.doc_id = `patient`.doctor_id
				JOIN `manpower` `tb_mr` ON `doctor`.`city_id` = `tb_mr`.users_city_id
				JOIN `manpower` `tb_asm` ON `tb_asm`.`users_id` = `tb_mr`.users_parent_id
				JOIN `manpower` `tb_rsm` ON `tb_rsm`.`users_id` = `tb_asm`.users_parent_id
				JOIN `manpower` `tb_zsm` ON `tb_zsm`.`users_id` = `tb_rsm`.`users_parent_id`
				WHERE 1";

		if(!empty($users_type)){
			$sql.= " GROUP BY $users_type";
		}

		if((int) $users_id){
			switch($users_type){
				case 'mr':
					$sql .= " HAVING  mr = $users_id ";
					break;
				case 'asm':
					$sql .= " HAVING  asm = $users_id ";
					break;
				case 'rsm':
					$sql .= " HAVING  rsm = $users_id ";
					break;
				case 'zsm':
					$sql .= " HAVING  zsm = $users_id ";
					break;
			}
		}
		
		$result = $this->db->query($sql)->result_array();
		return (count($result)) ? $result[0]['patient_cnt'] : 0;
	}

	function get_patient_fso($patient_id = '') {
		if(empty($patient_id)) {return;}
		
		$q = $this->db->select('
			p.patient_id,p.name_1,p.mobile_1,p.name_2,p.mobile_2,p.type,city.city_name,city.city_id,
			d.doctor_name,mr.users_name as mr,mr.users_mobile,p.patient_code
    	')
		->from('patient p')
		->join('doctor d', 'd.doc_id = p.doctor_id', 'LEFT')
		->join('coupon_code cc', 'p.coupon_code = cc.coupon_id','LEFT')
		->join('bunch_code bc', 'bc.bunch_code_id = cc.bunch_code','LEFT')
		->join('manpower mr ','d.city_id = mr.users_city_id','LEFT')
		->join('city','city.city_id = mr.users_city_id','LEFT');

		$q->where('p.patient_id', $patient_id, FALSE);
		// print_r($this->db->get_compiled_select());exit;
		$collection = $q->get()->result();
		return $collection;
	}

    function get_time_based_response_message(){
		if(((date('N') >= 1 && date('N') <= 5) && ((date('H:i')>="09:30")&& (date('H:i')<="18:30")))){
            $msg = 'Thank You for calling WE ASSIST Patient Support Program!!! Our executive will call you shortly.';
		}
        else if((date('N') == 6) && ( (date('H:i')>="09:30" ) && ( date('H:i')<="14:30") )){
            $msg = 'Thank You for calling WE ASSIST Patient Support Program!!! Our executive will call you shortly.';
        }
        else{
            $msg = 'Thank You for calling WE ASSIST Patient Support Program!!! Our executive will call you shortly.';				
        }

        return $msg;
    }


	function send_link($mobile_no){
		//$patient_id = '';
		$this->load->helper('send_sms');

		if(empty($mobile_no)) { 
			return FALSE; 
		}
		
		$patient_old_id = $this->is_patient_unique($mobile_no);
		//var_dump($patient_id);exit;
		if (! $patient_old_id) {

            $patient_code = $this->get_patient_unique_code();
			$patient_id = $this->_insert([ 'mobile_1' => $mobile_no, 'patient_code'=> $patient_code,'patient_added_by'=>'Miss call' ], 'patient');
			
		}else{
			$patient_id = $patient_old_id;
		}
        $call_history = $this->_insert(['mobile' => $mobile_no], 'call_history');
       // $sms_text = $this->get_time_based_response_message();
        
		//$sms_log_entry_for = 'Patient Mobile Register';
		
		//send_sms($mobile_no, $sms_text, $sms_log_entry_for);

		$this->load->helper('tiny_url');
		$encrypt_patient_id = rtrim(base64_encode($patient_id), '=');
		$code = str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT);
		$encrypt_link_code = rtrim(base64_encode($code), '=');

		$data = array();
		$data['patient_id'] = $patient_id;
		$data['code'] =  $code;
		$data['link'] = $link = base_url("consent/form?uid=$encrypt_patient_id&lc=$encrypt_link_code");
		$data['tiny_url'] = $tiny_url = !empty(tiny_url($link)) ? tiny_url($link) : NULL;
		$link_url = !empty($tiny_url) ? $tiny_url : $link;
		$insert_validate_sms = $this->_insert($data, 'consent_document');
			
       	$patient_mobile = $mobile_no;
		$patient_sms = 'Thank you for calling WE ASSIST Patient Support Program. Kindly share your consent by clicking on the link - '.PHP_EOL.''.$link_url.' '.'to receive a call back from our helpdesk for further benefits.';
	

		send_sms($patient_mobile,$patient_sms,'Patient Enrollment');

		$alert_sms = 'You have received a Missed call on We Assist PSP from '.$patient_mobile;
		
		$miss_call_1 = '7738847069'; 
		$miss_call_2 = '9967367159';
		$miss_call_3 = '9773627120';

		send_sms($miss_call_1,$alert_sms,'Miss Call Alert');
		send_sms($miss_call_2,$alert_sms,'Miss Call Alert');
		send_sms($miss_call_3,$alert_sms,'Miss Call Alert');

		echo 'Success';
		die();
	}

	function is_patient_unique($mobile_no) {

		$get_patient = $this->get_records(['mobile_1' => $mobile_no],'patient',['patient_id']);
		if(count($get_patient)) {
			return $get_patient[0]->patient_id;
		} else {

			return FALSE;
		}
	}


	function get_collection($f_filters = [], $keywords ='', $limit = 0, $offset = 0 ) {

    	$q = $this->db->select('
			p.patient_id,p.name_1,p.mobile_1,p.lang_code,p.patient_code,p.insert_dt,p.email, 
			p.mode,p.name_2,p.mobile_2,p.brand_id,b.brand_name,p.type,p.coupon_code,p.patient_reminder,p.caretaker_reminder,p.patient_served_by_aahar,p.aahar_questions,p.patient_added_by,p.consultation_date,p.revisit_date as revisit,p.is_active,
			d.doctor_name,d.doc_id,d.geo_city as geo_city,cc.coupon_id,cc.coupon_code,cc.coupon_type_id,
			add.address_line,add.pincode, cit.city_name,cit.city_id,
			d.doctor_name,
			lan.language_id,lan.language_name,
			mr.users_name as mr,bc.bunchCode,
			city.city_name, area.area_name, region.region_name, zone.zone_name,
			asm.users_name as asm_name, rsm.users_name as rsm_name, zsm.users_name as zsm_name,
			ch.dose,ch.duration,ch.strength,ch.quantity_pills,
			ch.purchase_date,ch.quantity_pills,
			ch.dose_time_1,ch.dose_time_2,ch.dose_time_3,ch.dose_time_4,
			ch.dose_intake_1,ch.dose_intake_2,ch.dose_intake_3,ch.dose_intake_4,ch.revisit_date,
			cs.status_name,ch.call_status_id,p.insert_dt as miss_call_date,ch.comment,
			(
				SELECT 
				COUNT(ch1.call_history_id) 
				FROM call_history ch1
				WHERE ch1.mobile = p.mobile_1 AND ch1.call_status_id IS NOT NULL
				GROUP BY ch1.mobile
			)AS total_calls
    	',FALSE)
		->from('patient p')
		->join('doctor d', 'd.doc_id = p.doctor_id', 'LEFT')
		->join('coupon_code cc', 'p.coupon_code = cc.coupon_id','LEFT')
		->join('bunch_code bc', 'bc.bunch_code_id = cc.bunch_code','LEFT')
		->join('manpower mr ','d.city_id = mr.users_city_id','LEFT')
		->join('manpower asm ','asm.users_id = mr.users_parent_id','LEFT')
		->join('manpower rsm ','rsm.users_id = asm.users_parent_id','LEFT')
		->join('manpower zsm ','zsm.users_id = rsm.users_parent_id','LEFT')
		->join('city','city.city_id = mr.users_city_id','LEFT')
		->join('area','area.area_id = city.area_id','LEFT')
		->join('region','region.region_id = area.region_id','LEFT')
		->join('zone','zone.zone_id = region.zone_id','LEFT')
		->join('address add','add.patient_id = p.patient_id', 'LEFT')
		->join('cities cit','cit.city_id = add.city', 'LEFT')
		->join('language lan', 'lan.language_code = p.lang_code', 'LEFT')
		->join('brand b', 'p.brand_id = b.brand_id', 'LEFT')
		->join("( SELECT *
				FROM call_history chl
				WHERE 1=1 
				AND chl.call_history_id IN (
					SELECT 
						MAX(call_history_id) As call_history_id
					FROM call_history ch 
					WHERE 1=1
						AND call_status_id IS NOT NULL
					GROUP BY ch.mobile
				) ) ch",'p.mobile_1 = ch.mobile','LEFT')
		->join('call_status cs','cs.status_id = ch.call_status_id','LEFT');

		if(sizeof($f_filters)) { 
			foreach ($f_filters as $key=>$value) { $q->where("$key", $value); }
		}

		if(!empty($keywords)) { 
			$s_key = $this->db->escape_like_str($keywords);

			$where_condition = "(
				d.doctor_name like '%". $s_key ."%'
				OR d.mobile like '%". $s_key ."%'
				OR lan.language_name like '%". $s_key ."%'
				OR p.name_1 like '%". $s_key ."%'
				OR p.name_2 like '%". $s_key ."%'
				OR p.mobile_1 like '%". $s_key ."%'
				OR p.mobile_2 like '%". $s_key ."%'
				OR p.patient_code like '%". $s_key ."%'
			) ";

			$q->where($where_condition, NULL, FALSE);
		}

		$q->group_by('p.patient_id');
		$q->order_by('p.update_dt desc, p.patient_id desc');

		if(!empty($limit)) { $q->limit($limit, $offset); }
		//echo '<pre>';print_r($this->db->get_compiled_select());exit;
		$collection = $q->get()->result();
		return $collection;
    }
    
    function get_therapy_unique_code(){
        
        $unique = TRUE;
        while($unique){
            $therapy_code = 'TH'. str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $record = $this->get_records(['therapy_code'=> $therapy_code], 'therapy', ['therapy_id'], '', 1);

            $unique = count($record) ? TRUE : FALSE;
            
        }
        
        return $therapy_code; 
    }

    function get_purchase_unique_code(){
        
        $unique = TRUE;
        while($unique){
            $purchase_code = 'PR'. str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $record = $this->get_records(['purchase_code'=> $purchase_code], 'purchase', ['purchase_id'], '', 1);

            $unique = count($record) ? TRUE : FALSE;
            
        }
        
        return $purchase_code; 
    }

    function get_patient_unique_code(){
        
        $unique = TRUE;
        while($unique){
            $patient_code = 'PT'. str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $record = $this->get_records(['patient_code'=> $patient_code], 'patient', ['patient_id'], '', 1);

            $unique = count($record) ? TRUE : FALSE;
            
        }
        
        return $patient_code; 
    }

    function get_standard_sms_string($name, $patient_id = ''){
		$this->load->helper('tiny_url');
		if (empty($patient_id)) {
			return "Dear $name, kindly send your Invoice and Prescription copy on 7700997151 via whatsapp";
		}

		$encrypt_patient_id = rtrim(base64_encode($patient_id), '=');

		$code = str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT);
		$encrypt_link_code = rtrim(base64_encode($code), '=');

		$data = array();
		$data['patient_id'] = $patient_id;
		$data['code'] =  $code;
		$data['link'] = $link = base_url("consent/form?uid=$encrypt_patient_id&lc=$encrypt_link_code");
		$data['tiny_url'] = $tiny_url = !empty(tiny_url($link)) ? tiny_url($link) : NULL;
		$link_url = !empty($tiny_url) ? $tiny_url : $link;
		$message = "Dear Patient, you are successfully enrolled under We Assist PSP!!!
  		To avail further benefits, kindly share the prescription copy on whats app no. 7700997151";/* or upload on the link - ".PHP_EOL.''.$link_url*/;
		
		$insert_validate_sms = $this->_insert($data, 'consent_document');
        return $message;
    }

    function send_message(){
        $patient_id = (int) $this->input->post('patient_id');
        $message_type = ($this->input->post('message_type') != 'standard') ? 'whatsapp' : 'standard';

        $record = $this->get_records(['patient_id'=> $patient_id], 'patient', ['name_1', 'mobile_1'], '', 1);

        if( ! count($record)){
            return ['status'=> FALSE, 'message'=> 'Patient requested not found'];
        }

        $name = $record[0]->name_1; 

        if(empty($name)){
            return ['status'=> FALSE, 'message'=> 'Patient Name is not specified yet!'];
        }

        if($message_type == 'standard'){
            $message = $this->get_standard_sms_string($name, $patient_id);
    	//var_dump($message);exit;
            $sms_for = 'REQUEST INVOICE & RXN COPY';
        }
        else{
            $message = "Dear $name, kindly send your Invoice and Prescription copy on 7700997151 via whatsapp";
            $sms_for = 'Whatsapp Invoice & RXN Request';
        }
        $patient_mobile = $record[0]->mobile_1;

        send_sms($patient_mobile,$message, $sms_for);
        return ['status'=> TRUE, 'message'=> 'SMS sent successfully!'];
	}
	
	function valid_coupon_doctor($coupon_code)
	{
        $doctor_id = $this->input->post('doc_id');
        
		if(!empty($coupon_code)) {

            $bunch_data = $this->get_records(['coupon_id' => $coupon_code], 'coupon_code', ['bunch_code']);

            if(!empty($bunch_data)) {
				$bunch_code = $bunch_data[0]->bunch_code;

                $is_doctor_exist = $this->get_records(['bunch_code' => $bunch_code, 'doc_id' => $doctor_id], 'doctor', ['doc_id']);

                if(empty($is_doctor_exist)) {
					$this->form_validation->set_message('valid_coupon_doctor', 'Coupon Code is not associated with Doctor');
					return FALSE;
				} else {
					return TRUE;
				}
			}
        }
        
        return TRUE;
	}

	function format_dose_intake_data($data = []) {
		$dose = $this->input->post('dose');
		if($dose) {
			switch ($dose) {
				case 1:
					$data['dose_time_1'] = date('H:i:00', strtotime($this->input->post('dose_time_1')));
					$data['dose_intake_1'] = $this->input->post('dose_intake_1');
					break;

				case 2:
					$data['dose_time_1'] = date('H:i:00', strtotime($this->input->post('dose_time_1')));
					$data['dose_intake_1'] = $this->input->post('dose_intake_1');
					$data['dose_time_2'] = date('H:i:00', strtotime($this->input->post('dose_time_2')));
					$data['dose_intake_2'] = $this->input->post('dose_intake_2');
					break;

				case 3:
					$data['dose_time_1'] = date('H:i:00', strtotime($this->input->post('dose_time_1')));
					$data['dose_intake_1'] = $this->input->post('dose_intake_1');
		
					$data['dose_time_2'] = date('H:i:00', strtotime($this->input->post('dose_time_2')));
					$data['dose_intake_2'] = $this->input->post('dose_intake_2');
		
					$data['dose_time_3'] = date('H:i:00', strtotime($this->input->post('dose_time_3')));
					$data['dose_intake_3'] = $this->input->post('dose_intake_3');
					break;
				
				case 4:
					$data['dose_time_1'] = date('H:i:00', strtotime($this->input->post('dose_time_1')));
					$data['dose_intake_1'] = $this->input->post('dose_intake_1');
		
					$data['dose_time_2'] = date('H:i:00', strtotime($this->input->post('dose_time_2')));
					$data['dose_intake_2'] = $this->input->post('dose_intake_2');
		
					$data['dose_time_3'] = date('H:i:00', strtotime($this->input->post('dose_time_3')));
					$data['dose_intake_3'] = $this->input->post('dose_intake_3');
		
					$data['dose_time_4'] = date('H:i:00', strtotime($this->input->post('dose_time_4')));
					$data['dose_intake_4'] = $this->input->post('dose_intake_4');
					break;
				
				default:
					break;
			}
		}
		return $data;
	}

	/** 
	 * Call Status [No Validation]
	 * 
	 * a. Not Responding	=> 2
	 * b. Not Interested	=> 4
	 * c. Call Back			=> 1
	 * d. Wrong Number		=> 3
	 * e. Dropped Out		=> 6
	 * f. Ringing  			=> 7 
	 * g. Language Barrier  => 8
	 * i. Duplicate  		=> 12
	 * j. Others 			=> 13 [Other Brands- eg.:- Ivabrand]
	 * 
	 * Call Status [Validation]
	 * 
	 * a. Enquiry			=> 10	
	 * b. Ongoing			=> 11
	 * c. Done				=> 5
	 */
	function save_undefined_patient() {
		$this->load->helper('send_sms');

		$ud_doctor['call_status_id'] = $call_status_id = $this->input->post('call_status');
		$ud_doctor['doctor_city'] = $this->input->post('doctor_city');
		$patient_reminders = !empty($this->input->post('reminder[1]')) ? implode(',', $this->input->post('reminder[1]')) : NULL;
		$caretaker_reminders = !empty($this->input->post('reminder[2]')) ? implode(',', $this->input->post('reminder[2]')) : NULL;

		$ud_doctor['comment']  = $this->input->post('comment');
		$ud_doctor['patient_id'] = $patient_id = $this->input->post('patient_id');
		$ud_doctor['doctor_id'] =  $doctor_id = $this->input->post('doc_id');
		$ud_doctor['type'] =  $this->input->post('type');
		$ud_doctor['name_1'] = $name_1	=  $this->input->post('name_1');
		$ud_doctor['name_2'] = $name_2	=  $this->input->post('name_2');
		$ud_doctor['mobile_1'] = $mobile_1 =  $this->input->post('mobile_1');
		$ud_doctor['mobile_2'] =  $this->input->post('mobile_2');
		
		if(! empty($this->input->post('coupon_code'))) {
			$ud_doctor['coupon_code'] = $this->input->post('coupon_code');
		}

		$ud_doctor['lang_code'] = $this->input->post('language_code');
		$ud_doctor['patient_reminder'] = $patient_reminders;
		$ud_doctor['caretaker_reminder'] = $caretaker_reminders;
		$ud_doctor['city'] =  $this->input->post('patient_city');
		$ud_doctor['address'] =  $this->input->post('patient_address');
		$ud_doctor['pincode'] =  $this->input->post('patient_pincode');	

		$ud_doctor['duration'] = (int) $this->input->post('therapy_duration');
		$ud_doctor['strength'] = $this->input->post('strength');
		$ud_doctor['dose'] = $dose = (int) $this->input->post('dose');
		$ud_doctor['quantity_pills'] = $this->input->post('purchase_qty');


		if (!empty($this->input->post('purchase_date'))) {
			$ud_doctor['purchase_date'] = date('Y-m-d', strtotime($this->input->post('purchase_date')));
		}

		if(!empty($this->input->post('revisit_date'))){
			$ud_doctor['revisit_date'] = date('Y-m-d', strtotime($this->input->post('revisit_date')));
		}

		if(!empty($this->input->post('consultation_date'))){
			$ud_doctor['consultation_date'] = date('Y-m-d', strtotime($this->input->post('consultation_date')));
		}

		$ud_doctor = $this->format_dose_intake_data($ud_doctor);

        $last_call_history = $this->get_records(['mobile' => $mobile_1], 'call_history', ['call_history_id'],'insert_dt DESC',1);
        if(empty($last_call_history)){
        	$call['mobile'] = (int) $this->input->post('mobile_1');
        	$this->model->_insert($call, 'call_history');
        }
        $last_call_history = $this->get_records(['mobile' => $mobile_1], 'call_history', ['call_history_id'],'insert_dt DESC',1);
        
		$last_call_update_result = '';
		if(!empty($last_call_history)) {            
			$call_status_non_res = [];
			$call_status_res = [5,10,11];
			$call_status_duplicate = [12];
			$call_status_other_brand = [13];

			$res_data = [];
			$res_data['comment'] = $this->input->post('comment');
			$res_data['call_status_id'] = $call_status_id;
			$res_data['patient_id'] = $patient_id;

			if (in_array($call_status_id, $call_status_non_res)) {
                $last_call_update_result = $this->_update(['mobile' => $mobile_1, 'call_history_id' => $last_call_history[0]->call_history_id], $ud_doctor, 'call_history');
				$nonres_msg = "Dear Patient, We tried reaching you to extend alternate month free therapy of Zita/Zita Met Plus. Plz give a missed call again on 9513669700.".PHP_EOL."Regards,".PHP_EOL."We Assist Helpdesk";
				send_sms($mobile_1, $nonres_msg, 'PATIENT NON RESPONDANT REMINDER');
			} else if (in_array($call_status_id, $call_status_other_brand))  {
				$update_other_brand_patient = $this->_update(['patient_id' => $patient_id],['other_brand' => 1], 'patient');
				$last_call_update_result = $this->_update(['mobile' => $mobile_1, 'call_history_id' => (int) $last_call_history[0]->call_history_id], $res_data, 'call_history');
			} else {
				$last_call_update_result = $this->_update(['mobile' => $mobile_1, 'call_history_id' => (int) $last_call_history[0]->call_history_id], $res_data, 'call_history');
			}
		}
		
		if($call_status_id == 2){
			$date = date("d/m/Y H:i");
			$msg = 'Dear Sir/Madam, Greetings from We Assist Patient Support Program!!! We tried connecting you but could not get through as the call went unanswered on '. $date. ', kindly give us a missed call again on 9513669700 to avail the benefits.';
			send_sms($mobile_1,$msg,'PATIENT NOT RESPONDING');
		}

		return $last_call_update_result;		
	}

	function validate_dose_time_intake()
	{
		$dose = (int)$this->input->post('dose');

		switch ($dose) {
			case 1:
				$this->form_validation->set_rules('dose_time_1', 'Dose Time 1','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_intake_1', 'Dose Intake 1','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_time_2', 'Dose Time 2','trim|xss_clean');	
				$this->form_validation->set_rules('dose_intake_2', 'Dose Intake 2','trim|xss_clean');	
				$this->form_validation->set_rules('dose_time_3', 'Dose Time 3','trim|xss_clean');	
				$this->form_validation->set_rules('dose_intake_3', 'Dose Intake 3','trim|xss_clean');	
				$this->form_validation->set_rules('dose_time_4', 'Dose Time 4','trim|xss_clean');	
				$this->form_validation->set_rules('dose_intake_4', 'Dose Intake 4','trim|xss_clean');	
				break;
			
			case 2:
				$this->form_validation->set_rules('dose_time_1', 'Dose Time 1','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_intake_1', 'Dose Intake 1','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_time_2', 'Dose Time 2','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_intake_2', 'Dose Intake 2','trim|required|xss_clean');	
				$this->form_validation->set_rules('dose_time_3', 'Dose Time 3','trim|xss_clean');	
				$this->form_validation->set_rules('dose_intake_3', 'Dose Intake 3','trim|xss_clean');	
				$this->form_validation->set_rules('dose_time_4', 'Dose Time 4','trim|xss_clean');	
				$this->form_validation->set_rules('dose_intake_4', 'Dose Intake 4','trim|xss_clean');	
				break;

			case 3:
				$this->form_validation->set_rules('dose_time_1', 'Dose Time 1','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_intake_1', 'Dose Intake 1','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_time_2', 'Dose Time 2','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_intake_2', 'Dose Intake 2','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_time_3', 'Dose Time 3','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_intake_3', 'Dose Intake 3','trim|required|xss_clean');	
				$this->form_validation->set_rules('dose_time_4', 'Dose Time 4','trim|xss_clean');	
				$this->form_validation->set_rules('dose_intake_4', 'Dose Intake 4','trim|xss_clean');	
				break;

			case 4:
				$this->form_validation->set_rules('dose_time_1', 'Dose Time 1','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_intake_1', 'Dose Intake 1','trim|required|xss_clean');
				$this->form_validation->set_rules('dose_time_2', 'Dose Time 2','trim|required|xss_clean');	
				$this->form_validation->set_rules('dose_intake_2', 'Dose Intake 2','trim|required|xss_clean');	
				$this->form_validation->set_rules('dose_time_3', 'Dose Time 3','trim|required|xss_clean');	
				$this->form_validation->set_rules('dose_intake_3', 'Dose Intake 3','trim|required|xss_clean');	
				$this->form_validation->set_rules('dose_time_4', 'Dose Time 4','trim|required|xss_clean');	
				$this->form_validation->set_rules('dose_intake_4', 'Dose Intake 4','trim|required|xss_clean');	
			default:							
				break;
		}
	}
	
	function modify(){
	//var_dump($_POST);exit;
		/*Load the form validation Library*/
		$this->load->library('form_validation');
		$this->load->helper('send_sms');

		$patient_id = (int) $this->input->post('patient_id');
		$is_Available = $this->check_for_posted_record($this->p_key, $this->table);
		if(! $is_Available['status']){ return $is_Available; }

		$this->form_validation->set_rules('call_status','Call Status','trim|required|xss_clean');

		/*if(in_array($this->input->post('call_status'), [5,11])) {
			$this->form_validation->set_rules('language_code','Language','trim|required|xss_clean');
			$this->form_validation->set_rules('doc_id', 'Doctor Name','trim|required|xss_clean');
			$this->form_validation->set_rules('name_1', 'Caller Name','trim|required|valid_name|max_length[250]|xss_clean');
			$this->form_validation->set_rules('mobile_1', 'Caller Mobile','trim|required|exact_length[10]|valid_mobile|xss_clean');
			$this->form_validation->set_rules('name_2', 'Name','trim|valid_name|max_length[250]|xss_clean');
			$this->form_validation->set_rules('mobile_2', 'Mobile','trim|exact_length[10]|valid_mobile|xss_clean');
			
			if($is_Available['data'][0]->coupon_code  != $this->input->post('coupon_code')) {
				$this->form_validation->set_rules('coupon_code', 'Coupon Code','trim|unique_key[patient.coupon_code]|callback_valid_coupon_doctor|xss_clean');
			}
			
			$therapies = $this->get_records(['patient_id'=> $patient_id], 'therapy', ['therapy_id'], '', 1);
			
			$this->form_validation->set_rules('type', 'Type','trim|required|in_list[patient,caretaker]|xss_clean');
			$this->form_validation->set_rules('doctor_city', 'Doctor City','trim|required|xss_clean');
			$this->form_validation->set_rules('patient_city', 'Patient City','trim|required|xss_clean');
			$this->form_validation->set_rules('patient_address', 'Patient Address','trim|required|xss_clean');
			$this->form_validation->set_rules('patient_pincode', 'Patient Pincode','trim|required|valid_pincode|xss_clean');
			
			if(!count($therapies)){
				$this->form_validation->set_rules('therapy_duration', 'Therapy Duration','trim|required|is_natural_no_zero|xss_clean');
				$this->form_validation->set_rules('strength', 'Strength','trim|required|xss_clean');
				$this->form_validation->set_rules('purchase_date', 'Purchase Date','trim|required|valid_date|xss_clean');
				$this->form_validation->set_rules('purchase_qty', 'Purchase Qty','trim|required|is_natural_no_zero|xss_clean');
				$this->form_validation->set_rules('dose', 'Dose','trim|required|in_list[1,2,3,4]|xss_clean');
				$this->form_validation->set_rules('revisit_date', 'Revisit Date','trim|valid_date|xss_clean');
								
				if((int)$this->input->post('dose')){
					$this->validate_dose_time_intake();
				}
			}
		}*/

		/*if(! $this->form_validation->run($this)){
			$errors = array();	        
	        foreach ($this->input->post() as $key => $value)
	            $errors[$key] = form_error($key, '<label class="error">', '</label>');
			
	        $response['errors'] = array_filter($errors); // Some might be empty
	        $response['status'] = FALSE;
		}		
		else{*/

			$result_undefined_patient = $this->save_undefined_patient();				

			$doctor_data = array();
			$doctor_data['geo_city'] = $this->input->post('doctor_city');

			$patient_reminders = !empty($this->input->post('reminder[1]')) ? implode(',', $this->input->post('reminder[1]')) : NULL;
			$caretaker_reminders = !empty($this->input->post('reminder[2]')) ? implode(',', $this->input->post('reminder[2]')) : NULL;

			$patient_data = array();
			if (!empty($this->input->post('doc_id'))) {
				$patient_data['doctor_id'] =  $doctor_id = $this->input->post('doc_id');
			}
			$patient_data['type'] =  $this->input->post('type');
			$patient_data['name_1'] = $name_1	=  $this->input->post('name_1');
			$patient_data['name_2'] = $name_2	=  $this->input->post('name_2');
			$patient_data['mobile_1'] = $mobile_1 =  $this->input->post('mobile_1');
			$patient_data['mobile_2'] =  $this->input->post('mobile_2');
			$patient_data['email'] =  $this->input->post('email');
			$patient_data['brand_id'] =  $this->input->post('brand_id');
			
			if(! empty($this->input->post('coupon_code'))) {
				$patient_data['coupon_code'] = $this->input->post('coupon_code');
			}

			if(!empty($this->input->post('consultation_date'))){
				$patient_data['consultation_date'] = date('Y-m-d', strtotime($this->input->post('consultation_date')));
			}

			if (!empty($this->input->post('language_code'))) {
				$patient_data['lang_code'] = $this->input->post('language_code');
			}
			$patient_data['patient_reminder'] = $patient_reminders;
			$patient_data['caretaker_reminder'] = $caretaker_reminders;

			$address = array();
			$address['city'] =  $this->input->post('patient_city');
			$address['address_line'] =  $this->input->post('patient_address');
			$address['pincode'] =  $this->input->post('patient_pincode');

			$p_key = $this->p_key;			

			if(!empty($doctor_id)) {
				$doctor_update = $this->_update(['doc_id' => $doctor_id], $doctor_data, 'doctor');
			}
			$status = (int) $this->_update([$p_key => $patient_id], $patient_data, 'patient');
			
			if($status) {							
				/* Address Table data enter or update */
				$is_address_exist = $this->get_records(['patient_id' => $patient_id],'address',['address_id']);
				if(count($is_address_exist)) {
					$address_update = (int) $this->_update(['patient_id' => $patient_id],$address, 'address');
				} else {
					$address['patient_id'] = $patient_id;
					$address_insert = (int) $this->_insert($address,'address');
				}

				$therapies = $this->get_records(['patient_id'=> $patient_id], 'therapy', ['therapy_id'], '', 1);
				
				if(in_array($this->input->post('call_status'), [5,11])) {
					if(! count($therapies)){
						/* check for whether patient is new i.e 1st visit */
						
						/*  Therapy table Insert if patient is new*/
						$therapy_data['patient_id'] = $patient_id;
						$therapy_data['duration'] = (int) $this->input->post('therapy_duration');
						$therapy_data['strength'] = $this->input->post('strength');
						$therapy_data['dose'] = $dose = (int) $this->input->post('dose');
						$therapy_data['therapy_code'] = $this->get_therapy_unique_code();

						$therapy_data = $this->format_dose_intake_data($therapy_data);
		
						$therapy_id = $this->_insert($therapy_data, 'therapy');
						
						$purchase_data['patient_id'] = $patient_id;
						$purchase_data['therapy_id'] = $therapy_id;
						$purchase_data['purchase_code'] = $this->get_purchase_unique_code();
						$purchase_data['purchase_date'] = date('Y-m-d', strtotime($this->input->post('purchase_date')));
						$purchase_data['quantity_pills'] = $this->input->post('purchase_qty');
	
						$purchase_id = $this->_insert($purchase_data, 'purchase');
	
						/* Enter data in visit Table as if patient is new */
						if(!empty($this->input->post('revisit_date'))){
							$visit_data['therapy_id'] = $therapy_id;
							$visit_data['revisit_date'] = date('Y-m-d', strtotime($this->input->post('revisit_date')));
							$therapy_id = $this->_insert($visit_data, 'visit');
						}
						
						// Send SMS
						$invoice_sms = $this->get_standard_sms_string($name_1, $patient_id);
						send_sms($mobile_1, $invoice_sms,'REQUEST INVOICE & RXN COPY');
						
						// Send FSO SMS
						$patient_fso_data = $this->get_patient_fso($patient_id);
						if(!empty($patient_fso_data)) {
							$mr_name = $patient_fso_data[0]->mr;
							$mr_mobile = $patient_fso_data[0]->users_mobile;
							$patient_code = $patient_fso_data[0]->patient_code;
							$doctor_name = $patient_fso_data[0]->doctor_name;
							$city_name = $patient_fso_data[0]->city_name;
							$enroll_sms = "Dear $mr_name, patient $patient_code has been successfully enrolled under Dr. $doctor_name from your HQ $city_name.";
							send_sms($mr_mobile, $enroll_sms,'PATIENT ENROLLMENT');
						}
					}
				}
			}
			$response['status'] = ($status) ? TRUE : FALSE;			
		//}
		return $response;
	}

	function remove(){
		
		if(isset($_POST['ids']) && sizeof($_POST['ids']) > 0){
			$ids = $this->input->post('ids');
			$response = $this->_delete($this->p_key, $ids, $this->table);

			$msg = ($response) ? "Record(s) Successfully deleted" : 'Error while deleting record(s)';
			return ['msg'=> $msg];
		}

		return ['msg'=> 'No Records Selected'];
	}


	function _format_data_to_export($data){
		
		$resultant_array = [];
		foreach ($data as $rows) {
		//echo '<pre>';print_r($rows);exit;
			$records['Doctor Name'] = $rows->doctor_name;
			$records['Patient Code'] = $rows->patient_code;
            
			$records['Patient Name'] = ($rows->type == 'caretaker') ? $rows->name_2 : $rows->name_1;
            $records['Patient Mobile'] = ($rows->type == 'caretaker') ? $rows->mobile_2 : $rows->mobile_1;
            
			$records['Caretaker Name'] = ($rows->type == 'caretaker') ? $rows->name_1 : $rows->name_2;
			$records['Caretaker Mobile'] = ($rows->type == 'caretaker') ? $rows->mobile_1 : $rows->mobile_2;
			
			$records['Type'] = $rows->type;
			$records['Address'] = !empty($rows->address_line) ? '"'.$rows->address_line.'"' : '';
			$records['Pincode'] = $rows->pincode;

            $records['Language'] = $rows->language_name;
			$records['MR Name'] = $rows->mr;
			$records['MR City'] = $rows->city_name;

			$records['Registered On'] = $rows->insert_dt;
			$records['Status'] = $rows->status_name;
			$records['Comment'] = $rows->comment;
			$records['Added By'] = $rows->patient_added_by;
			if(strtolower($rows->patient_added_by) == 'miss call'){
				$records['Misscall Date'] = $rows->miss_call_date;
			}else{
				$records['Misscall Date'] = '--';
			}
			$records['Total Calls'] = $rows->total_calls;
			$records['Coupon Code'] = $rows->coupon_code;
			$records['Brand Name'] = $rows->brand_name;
			$records['Strength'] = $rows->strength;


			array_push($resultant_array, $records);
		}
		return $resultant_array;
	}
}
