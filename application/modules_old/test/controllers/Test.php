<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Test extends Generic_Controller
{
	
function lists(){
	for($i=1;$i<19;$i++){
		for($j=1;$j<124;$j++){
			$ab = $this->db->select('*')
					 ->from('upload_data')
					 ->where('upload_data.category_id = ', $i)
					 ->where('upload_data.sub_category_id = ', $j)
					 ->order_by('upload_data.sort_order')
					 ->get()->result();
			/*echo'<pre>';print_r($ab);exit;*/
			$temp = 1;
			foreach ($ab as $a ) {
			  	$this->db->where('upload_data_id', $a->upload_data_id);
    			$this->db->update('upload_data', array('sort_order' => $temp));
    			$temp++;
			  }  
		}
	}

}

}