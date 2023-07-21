<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_consumptions extends MY_Model {

	public $p_key = 'phlebo_consumptions_allocation_id';
	public $table = 'phlebo_consumptions_allocation';

	function __construct() {
		parent::__construct($this->table);
	}

	function get_collection() {

    	
	}
		
}