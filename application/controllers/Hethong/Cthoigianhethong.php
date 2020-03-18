<?php 
	/**
	 * summary
	 */
	class Cthoigianhethong extends MY_Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Hethong/Mhethong');

	    }
	    public function index(){
	    	if($this->input->post("capnhat")){
	    		$this->capnhat();
	    	}
	    	$data['tg'] = $this->Mhethong->get_where_row("tbl_tglambai_sv", "thoigian_xet", ""); 
	    	$data['message'] = getMessages();
	    	$temp['data'] = $data;
        	$temp['template'] = 'hethong/Vxetthoigianhethong';
        	$this->load->view('layout/content', $temp);
	    }
	    public function capnhat(){
	    	$data = $this->input->post('data');
	    	$data['thoigian_xet'] = "";
    		$success  = 'Xét thời gian thành công';
	        $error    = 'Xét thời gian thất bại';
	        $redirect = base_url().'QuanLyThoiGianHeThong'; 
	        $this->Mhethong->delete("tbl_tglambai_sv", "ngayBD !=", "");
	        $this->insert("tbl_tglambai_sv", $data, $success, $error, $redirect);
	    }
	}
 ?>