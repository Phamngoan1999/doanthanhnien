<?php 
	/**
	 * summary
	 */
	class Ccanbo extends MY_Controller
	{
	    public function __construct()
	    {
	        parent::__construct();
	        
	    }
	    public function index(){
	    	$data['message'] = getMessages();
	    	$temp['data'] = $data;
        	$temp['template'] = 'hethong/Vcanbo';
        	$this->load->view('layout/content', $temp);
	    }
	}
 ?>