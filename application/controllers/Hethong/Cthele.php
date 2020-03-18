<?php 
	/**
	 * summary
	 */
	class Cthele extends CI_Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->model("Mlogin");
			date_default_timezone_set('Asia/Bangkok');
	        
	    }
	    public function index(){

	    	$data['message'] = getMessages();
	    	$temp['data'] = $data;
        	$temp['template'] = 'Vthele';
        	$this->load->view('layout/content', $temp);
	    }
	    public function huongdan(){
	    	$data['message'] = getMessages();
	    	$temp['data'] = $data;
        	$temp['template'] = 'Vhuongdansudung';
        	$this->load->view('layout/content', $temp);
	    }
	}
 ?>