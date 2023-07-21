<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * NDEP ABM Class
 *
 * Library managing all the abm related calls
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	Amey
 */
class Common {
	protected $_ci; // CodeIgniter instance
	public $cModel;
	public $qModel;

	function __construct()
	{
		$this->_ci = & get_instance();
	}

  function time2str($ts) {
	    if(!ctype_digit($ts)) {
	        $ts = strtotime($ts);
	    }
	    $diff = time() - $ts;
	    if($diff == 0) {
	        return 'Updated now';
	    } elseif($diff > 0) {
	        $day_diff = floor($diff / 86400);
	        if($day_diff == 0) {
	            if($diff < 60) return 'Updated just now';
	            if($diff < 120) return 'Updated 1 minute ago';
	            if($diff < 3600) return 'Updated '.floor($diff / 60) . ' minutes ago';
	            if($diff < 7200) return 'Updated 1 hour ago';
	            if($diff < 86400) return 'Updated '.floor($diff / 3600) . ' hours ago';
	        }
	        if($day_diff == 1) { return 'Updated Yesterday'; }
	        if($day_diff < 7) { return 'Updated '.$day_diff . ' days ago'; }
	        if($day_diff < 31) { return 'Updated '.ceil($day_diff / 7) . ' weeks ago'; }
	        if($day_diff < 60) { return 'Updated last month'; }
	        return 'Updated '.date('F Y', $ts);
	    } else {
	        $diff = abs($diff);
	        $day_diff = floor($diff / 86400);
	        if($day_diff == 0) {
	            if($diff < 120) { return 'Updated in a minute'; }
	            if($diff < 3600) { return 'Updated in ' . floor($diff / 60) . ' minutes'; }
	            if($diff < 7200) { return 'Updated  in an hour'; }
	            if($diff < 86400) { return 'Updated in ' . floor($diff / 3600) . ' hours'; }
	        }
	        if($day_diff == 1) { return 'Updated Tomorrow'; }
	        if($day_diff < 4) { return 'Updated '.date('l', $ts); }
	        if($day_diff < 7 + (7 - date('w'))) { return 'Updated next week'; }
	        if(ceil($day_diff / 7) < 4) { return 'Updated  in ' . ceil($day_diff / 7) . ' weeks'; }
	        if(date('n', $ts) == date('n') + 1) { return 'Updated next month'; }
	        return 'Updated '.date('F Y', $ts);
	    }
	}
}
