<?php 
	/**
	 * summary
	 */
	class Cdanhsachthongke extends MY_Controller
	{
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Hethong/Mhethong');
	    	$this->load->library('Excel');
	    }

	    public function index(){
	    	$khoa  = $this->Mhethong->get('tbl_khoa');
	    	$svKhoa  = $this->Mhethong->get_svKhoa("<");
	    	foreach ($svKhoa as $key => $value) {
	    		$svKhoa[$key]['svdu_dk'] 	= $value['tongsoSVDT'];
	    		$svKhoa[$key]['diemTB'] 	= round($value['tongsoSVDT']*$value['heso']);
	    		$svKhoa[$key]['sv_ko_du_dk'] = $this->Mhethong->get_ConLai_svkhoa($value['makhoa'])['tongso'] - $value['tongsoSVDT'];
	    	}
	    	
	    	if($this->input->get('xuatbaocaothongke')){
	    		$this->xuatbaocaothongke($svKhoa);
	    		return 0;
	    	}
	    	if($this->input->post('xuatbaocaothongke')){
	    		$soSv = $this->input->post('soSV');
	    		$this->xuatTopSV($soSv);
		    	return 0;
	    	}
		    if($this->input->post('xuatbaocaotong_sv')){
		    	$this->xuatbaocaotong_sv();
		    	return 0;
		    }
	    	$temp = array(
	    		'template' => 'hethong/Vdanhsachthongke',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'khoa'		 => $svKhoa,
	    			'dskhoa'     => $khoa
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }

	    public function xuatbaocaothongke($khoa){
	    	$trangthai  = $this->input->get('xuatbaocaothongke');
	    	switch ($trangthai) {
	    		case 'xuatbaocaotong':
	    			$this->xuatbaocaotong($khoa);
	    			break;
	    		case 'xuatbaocaokhoa':
	    			$this->xuatbaocaokhoa($this->input->get('khoa'));
	    			break;
	    		default:
	    			break;
	    	}
	    }
	    public function xuatbaocaotong($khoa){
	    	$data['session']    = $this->session->userdata('user');
            $temp = array(
	    		'template' => 'hethong/Vdstongsvtheokhoa',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'khoa'		 => $svKhoa,
	    			'dskhoa'     => $khoa
	    		),
	    	);
	    	$this->load->view('layout/content_in', $temp);
	    }
	    public function xuatbaocaotong_sv(){
	        $session = $this->session->userdata('user');
	        $sinhvien = $this->Mhethong->ThongKeSV_Tong();
            $temp = array(
	    		'template' => 'hethong/Vdssinhvienthamgia_in',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'dssvthamgia'     => $sinhvien
	    		),
	    	);
	    	$this->load->view('layout/content_in', $temp);
	    }

	    public function xuatTopSV($sosv){
	        $session = $this->session->userdata('user');
	        $sinhvien = $this->Mhethong->ThongKeSV_CaoNhat($sosv);
            $temp = array(
	    		'template' => 'hethong/VTopSv_in',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'top'     => $sinhvien
	    		),
	    	);
	    	$this->load->view('layout/content_in', $temp);
	    }

	    public function xuatbaocaokhoa($makhoa){
	    	$data['session']             = $this->session->userdata('user');
	    	$tenkhoa                     = $this->Mhethong->get_where_row("tbl_khoa", "makhoa", $makhoa)['tenkhoa'];
	        $sinhvien = $this->Mhethong->ThongKeSV_TheoKhoa($makhoa);
	    	$temp = array(
	    		'template' => 'hethong/Vdssinhvientheokhoa',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'khoa'		 => $tenkhoa,
	    			'dssv'     => $sinhvien
	    		),
	    	);
        	$this->load->view('layout/content_in', $temp);
	    }
	}
?>
