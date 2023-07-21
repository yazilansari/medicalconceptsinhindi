<?php
    class Notifyuser extends CI_Controller{
        public function index(){
            if( ! $this->session->is_logged_in() ){
    			redirect('admin/login','refresh');
    		}
    
    		if ($this->input->post('search') == TRUE) {
    			$this->set_view($this->data, 'home',  '_admin');
    		}
            $this->load->view("usernotification_header");
        }
        
        public function get_useremails(){
            if( ! $this->session->is_logged_in() ){
    			redirect('admin/login','refresh');
    		}
    		
            $this->load->model("Notifyuser_model");
            $data= $this->Notifyuser_model->get_useremails();
            if($data->num_rows() == "0"){
                $this->session->set_flashdata('update_app_vision_failed','Database is empty!');
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                header("Content-Type: text/csv; charset=utf-8");
        		header("Content-Disposition: attachment; filename=user_emails.csv");
        		$output = fopen("php://output", "w");
        		fputcsv($output, array('Email'));
        		foreach ($data->result_array() as $row) {
        			fputcsv($output, $row);
        		}
        		fclose($output);
            }
        }
        
        public function getstudentemails(){
            if( ! $this->session->is_logged_in() ){
    			redirect('admin/login','refresh');
    		}
    		
            $this->load->model("Notifyuser_model");
            $data= $this->Notifyuser_model->getstudentemails();
            if($data->num_rows() == "0"){
                $this->session->set_flashdata('update_app_vision_failed','Database is empty!');
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                header("Content-Type: text/csv; charset=utf-8");
        		header("Content-Disposition: attachment; filename=studentemails.csv");
        		$output = fopen("php://output", "w");
        		fputcsv($output, array('Email'));
        		foreach ($data->result_array() as $row) {
        			fputcsv($output, $row);
        		}
        		fclose($output);
            }
        }
        
        public function getgeneralemails(){
            if( ! $this->session->is_logged_in() ){
    			redirect('admin/login','refresh');
    		}
    		
            $this->load->model("Notifyuser_model");
            $data= $this->Notifyuser_model->getgeneralemails();
            if($data->num_rows() == "0"){
                $this->session->set_flashdata('update_app_vision_failed','Database is empty!');
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                header("Content-Type: text/csv; charset=utf-8");
        		header("Content-Disposition: attachment; filename=generalemails.csv");
        		$output = fopen("php://output", "w");
        		fputcsv($output, array('Email'));
        		foreach ($data->result_array() as $row) {
        			fputcsv($output, $row);
        		}
        		fclose($output);
            }
        }
        
        public function import_emails(){
            $file_data = fopen($_FILES['importcsv_input']['tmp_name'], 'r');
    		fgetcsv($file_data);
    		while ($row = fgetcsv($file_data)) {
              $data[] = array(
    				'Email' => $row[0],
    			);
    		}
    		echo json_encode($data);
        }
        
        public function sendmail(){
            $mailcount= count($_POST['emails']);
            $unique= array_unique($_POST['emails']);
            
            $mailsubj= htmlentities($_POST['emailsubject']);
            $mailmsg= htmlentities($_POST['emailmsg']);
	        
	        $myfile = fopen("mailarr.txt", "w") or die("Unable to open file!");
            foreach($unique as $mail){
                $mailres = $this->sendmail_config($mail);
                if($mailres == true){
                    $txt = $mail."\n";
				    fwrite($myfile, $txt);
                }
            }
            fclose($myfile);
        }
        
        public function sendsinglemail(){
            $mail= htmlentities($_POST['emails']);
            $mailsubj= htmlentities($_POST['emailsubject']);
            $mailmsg= htmlentities($_POST['emailmsg']);
            $mailattc= $_POST['emailattac'];
            
            $mailres = $this->sendmail_config($mail,$mailsubj,$mailmsg);
            // $mailres = true;
            
            $data['mail']= $mail;
            $data['sub']= $mailsubj;
            $data['msg']= $mailmsg;
            $data['res']= $mailres;
            
            echo json_encode($data);
        }
        
        public function sendmail_config($mail){
    		$config['protocol']    = 'sendmail';
    		$config['smtp_host']    = 'mail.nktechipl.com';
    		$config['smtp_port']    =  465;
    		$config['smtp_timeout'] = '7';
    		$config['smtp_user']    = 'mch@nktechipl.com';
    		$config['smtp_pass']    = ';9zle&Yf^d^Y';
    		$config['charset']    = 'UTF-8';
    		$config['mailtype'] = 'html';
    		$config['validate']     = FALSE;
           
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            
    		$body= "Dear Medico,<br>";
    		$body.= "Please find the attached document as an invitation for the Insulin workshop by Dr. Pankaj Agarwal,<br>";
    		$body.= "Hormone Care and Research Center Ghaziabad<br><br>";
    // 		$body.= '<a style="text-decoration:none" href="'.base_url("mailtemplate/Insulin Workshop Dr Pankaj Agarwal invite.pdf").'">PDF File</a>';
    		$body.= '<a style="text-decoration:none" href="'.base_url("mailtemplate/Insulin Workshop Dr Pankaj Agarwal invite.pdf").'"><img src="'.base_url("mailtemplate/insulin.png").'" width="300px"></a>';
            
    		$this->email->from('mch@nktechipl.com','MCH');
    		$this->email->to($mail);
    		$this->email->subject("Insulin workshop by Dr. Pankaj Agarwal Invitation");
    		$this->email->message($body);
    
    		if ($this->email->send()) {
    			return true;
    		} else {
    			return $this->email->print_debugger();
    		}
    	}
    }