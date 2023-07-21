<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_consumptions extends Generic_Controller
{
	private $model_name = 'mdl_consumptions';

	function __construct()
	{
		parent::__construct();
		$this->load->model($this->model_name, 'model');
	}

	public function index()
	{
		$consumptions_allocated_data = $this->model->get_records(['is_deleted' => "0", '(MONTH(CURDATE())-1) = month' => NULL, "YEAR(CURDATE()) = YEAR(insert_dt)" => NULL], 'phlebo_consumptions_allocation', ['*'], 'phlebo_consumptions_allocation_id asc');

		$previous_count = count($consumptions_allocated_data);
		$i=0;

		if(!empty($consumptions_allocated_data)){

			$data_arr = array();		

			foreach ($consumptions_allocated_data as $key => $value) {
				
				$data['phlebo_id'] = $value->phlebo_id;
				$data['consumptions_id'] = $value->consumptions_id;
				$data['opening_stock'] = $value->closing_stock;
				$data['closing_stock'] = $value->closing_stock;
				$data['month'] = date("n");
				$data['insert_dt'] = date('Y-m-d H:i:s');
				$data['update_dt'] = date('Y-m-d H:i:s');

				$data_arr[] = $data;
				$i++;
			}

			$insert_id = $this->model->_insert_batch($data_arr, 'phlebo_consumptions_allocation');

			echo "Insertion successful!";
		}else{
			echo "No Previous Data Found!";
		}

		
		exit;
	}
	
}