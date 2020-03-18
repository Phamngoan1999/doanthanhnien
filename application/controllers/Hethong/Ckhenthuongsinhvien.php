<?php 
	/**
	 * summary
	 */
	class Ckhenthuongsinhvien extends MY_Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	        
	    }
	    public function index(){
	    	$data['message'] = getMessages();
	    	$temp['data'] = $data;
        	$temp['template'] = 'hethong/Vkhenthuongsinhvien';
        	$this->load->view('layout/content', $temp);
	    }
	}
 ?>