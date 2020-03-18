<?php 
	/**
	 * summary
	 */
	class Cxemchitiet extends MY_Controller
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
	    	$data = array();
	    	$trangthai = null;
	    	$sinhvien = [];
	    	$ttsv = [];
        	if($this->input->post('timkiem')){
        		$data['khoa'] = $this->input->post('khoa');
        		$data['sv']  = $this->Mhethong->getSV_LamBai($data['khoa']);
        	}
        	if($this->input->post('xemchitiet')){
        		$trangthai = "xemchitiet";
        		$sinhvien = $this->Mhethong->xemCT_SV($this->input->post('xemchitiet'));
        		$ttsv = $this->Mhethong->get_where_row('tbl_sinhvien', 'sMaSV', $this->input->post('xemchitiet'));
        	}
        	$khoa = $this->Mhethong->get('tbl_khoa');
        	foreach ($khoa as $key => $value) {
        		$tenkhoa[$value['makhoa']] = $value['tenkhoa'];
        	}
        	$temp = array(
	    		'template' => 'hethong/Vxemchitiet',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'khoa' 		 => $this->Mhethong->get('tbl_khoa'),
	    			'dulieu'     => $data,
	    			'tenkhoa'	 => $tenkhoa,
	    			'trangthai'  => $trangthai,
	    			'sinhvien'	 => $sinhvien,
	    			'ttsv'		 => $ttsv,
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }
	}
 ?>