<?php 
	/**
	 * summary
	 */
	class Cxetthoigian extends MY_Controller
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
	    	if($this->input->post("xetthoigian")){
	    		$this->xetthoigian();
	    	}
	    	$tg		 = $this->Mhethong->get_where_row("tbl_tglambai_sv", "thoigian_xet !=", " ");
	    	$data['socauhoi'] = $tg['socauhoi'];
	    	
	    	if(!empty($tg)){
	    		$tg = explode(":", $tg['thoigian_xet']);
	    		$data['tg'] = $tg;
	    		$data['tongso'] = $tg[0]*60 + $tg[1];
	    	}else{
	    		$data['tg'] = $tg;
	    		$data['tongso'] = 0;
	    	}
	    	$data['message'] = getMessages();
	    	$temp['data'] = $data;
        	$temp['template'] = 'hethong/Vxetthoigian';
        	$this->load->view('layout/content', $temp);
	    }

	    public function xetthoigian(){
	    	$gio 				= $this->input->post('gio');
	    	$phut 				= $this->input->post('phut');
	    	$giay 				= $this->input->post('giay');
	    	$data['socauhoi'] 	= $this->input->post('socauhoi');
	    	$data['thoigian_xet'] = $gio.":".$phut.":".$giay;
    		$success  = 'Cập nhật thời gian thành công';
	        $error    = 'Thêm nhóm câu hỏi thất bại';
	        $redirect = base_url().'XetThoiGian'; 
	        $this->Mhethong->delete("tbl_tglambai_sv", "thoigian_xet !=", "");
	        $this->insert("tbl_tglambai_sv", $data, $success, $error, $redirect);
	    }
	}
 ?>