<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Update extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
	}

	function index($file = '')
	{
		ini_set('display_errors', 1);
		$f = read_file('./assets/csv/'.$file.'.csv');
		if ($f) {
			$array = explode("\n", $f);
	        $data = array();
	        foreach ($array as $value) {
	        	if(strlen($value) > 0){
	        		$data[] = str_getcsv($value);
	        	}
	        }
	        echo "<pre>";
	        print_r($data);
	        echo "</pre>";
	        $i = 0;
	        foreach ($data as $var) {
	        	$lname = trim($var[0]);
	        	$fname = trim($var[1]);
	        	$mname = trim($var[2]);
	        	$dept = trim($var[7]);
	        	$clg = trim($var[6]);
	        	$yr = trim($var[5]);
	        	$info = $this->db->like(array('LastName' => $lname, 'FirstName' => $fname, 'MiddleName' => $mname))->get('graduates');
	        	if($info->num_rows() > 0){
	        		$row = $info->row();
	        		$grad_id = $row->GraduateId;
	        		$update = array(
	        			'Department' => $dept,
	        			'College' => $clg
        			);
	        		$this->db->where('GraduateId', $grad_id)->update('graduates', $update);
	        		++$i;
	        	}
	        }
	        echo $i;
		} else {
		    echo 'error';
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */