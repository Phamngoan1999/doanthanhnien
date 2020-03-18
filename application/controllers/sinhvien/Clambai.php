<?php 
	/**
	 * summary
	 */
	class Clambai extends MY_Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Sinhvien/Msinhvien');
	        
	    }
	    public function index(){
	    	$session = $this->session->userdata('user');
	    	$get_gio  = $this->Msinhvien->get_where_row("tbl_tglambai_sv", "thoigian_xet !=", ""); // tổng thời gian làm bài 50';
	    	$getSV 	= $this->Msinhvien->get_where_row('tbl_sinhvien', 'sMaSV', $session['sMaSV']);
	    	if($getSV['trangthai_lambai'] == 1){
				return redirect(base_url('KetQuaSinhVien'));
	    	}
			
	    	$nhomCH = $this->Msinhvien->get_nhomCH();
	    	foreach ($nhomCH as $key => $value) {
	    		$data['CH'][$value['sMaNhom']] = $this->Msinhvien->get_CauHoi($value['sMaNhom'], $value['soCH_Random']);
	    	}
	    	// random đáp án
	    	$phrases = array(
			    'sDapanA',
			    'sDapanB',
			    'sDapanC',
			    'sDapanD'
			);
	
			$action = $this->input->post('action');
	    	switch ($action) {
	    		case 'nopbai':
    				$this->nopbai();
	    			break;
	    		case 'luu_auto':
    				$this->luu_auto();
	    			break;
	    		case 'xetthoigian':
    				$this->settime();
    				break;
	    		default:
	    			break;
	    	}
	    	$temp = array(
	    		'template' => 'sinhvien/Vlambai',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'cauHoi' 	 => $data['CH'],
	    			'phrases'    => $phrases
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }

	    public function settime(){
	    	$session  = $this->session->userdata('user');
	    	$get_gio  = $this->Msinhvien->get_where_row("tbl_tglambai_sv", "thoigian_xet !=", "")['thoigian_xet']; // tổng thời gian làm bài 50';
			$current_date = time();	 // thời gian hiện tại
			// // tổng thời gian làm bài
			$getSV 	= $this->Msinhvien->get_where_row('tbl_sinhvien', 'sMaSV', $session['sMaSV']);
			$tgBD = $getSV['dtTgianBatdau'];
			$date2        = strtotime($tgBD) + strtotime('1970-01-01 ' . $get_gio . ' GMT');
			$demthoigian = $date2 - $current_date;
			if($demthoigian <= 0) {
				// if($getSV['trangthai_lambai'] == 0){
					$data['trangthai'] = 1;
				// }
			}else{
				$tz = date_default_timezone_get();
				date_default_timezone_set('GMT');
				$demthoigian = date('H:i:s', $demthoigian);
				date_default_timezone_set($tz);
				$data = array(
					'tongthoigian' => $get_gio,
					'demthoigian'  => $demthoigian,
					'trangthai'    => 0
				);
			}
			echo json_encode($data);
			exit();
	    }


	    public function nopbai(){
	    	$session	= $this->session->userdata('user');
	    	$mangtl 	= $this->input->post('traloi');
	    	$tongsoCH 	= $this->input->post('tongsoCH');
	    	$arr_new    = [];
	    	if(count($mangtl) == $tongsoCH){
		    	foreach ($mangtl as $key => $value) {
		    		switch ($value[2]) {
		    			case 'sDapanA':
		    				$value[2] = "A";
		    				break;
		    			case 'sDapanB':
		    				$value[2] = "B";
		    				break;
		    			case 'sDapanC':
		    				$value[2] = "C";
		    				break;
		    			case 'sDapanD':
		    				$value[2] = "D";
		    				break;
		    			default:
		    				break;
		    		}
		    		$tam =  array();
		    		$tam['sMaSV']		= $session["sMaSV"];
	    			$tam['sMaCauhoi	'] 	= $value[0];
	    			$tam['sDapanchon'] =  $value[2];
	    			$tam['DapAnChonWEB'] =  $value[1];
	    			array_push($arr_new,$tam);
		    	}
		    	$kq = $this->Msinhvien->setTraloi($session["sMaSV"],$arr_new);
		    	if($kq > 0){
		    		$kqsinhvien = $this->Msinhvien->getKetquaSV($session['sMaSV']);
			    	$tongsocaudung = 0;
			    	foreach ($kqsinhvien as $value) {
			    		if($value['sDapandung'] == $value['sDapanchon']){
			    			$tongsocaudung++;
			    		}		
			    	}
		    		$tongsocauhoi 					= $tongsoCH;
		    		$data['iSocautraloi'] 			= count($arr_new) . '/'. $tongsocauhoi;
		    		$data['dtTgianKetthuc'] 		= date('Y/m/d H:i:s');
		    		$data['ketqua'] 				= $tongsocaudung*2; // 2 điểm 1 câu- > tổng điểm
					$data['iSocaudung']     		= $tongsocaudung; // tổng số câu đúng
					$data['trangthai_lambai']     	= 1; // tổng số câu đúng
					$khoa = $this->Msinhvien->get_where_row("tbl_khoa", "makhoa", $session["FK_makhoa"]);
					$khoa1['soSV_DuThi'] = $khoa['soSV_DuThi'] + 1;
			    	$row1 = $this->Msinhvien->update("tbl_khoa","makhoa", $session["FK_makhoa"], $khoa1);
			    	$row = $this->Msinhvien->update("tbl_sinhvien","sMaSV", $session["sMaSV"], $data);
			    	if($row >0){
			    		echo "thanhcong";
	    				exit();
			    	}else{
			    		echo "error_update"; //khôn update được vào bảng sinh viên;
	    				exit();
			    	}
		    	}else{
		    		echo $kq;
	    			exit();
		    	}
	    	}else{
	    		$tongsocauhoi 					= $tongsoCH;
	    		$data['iSocautraloi'] 			= 0 . '/'. $tongsocauhoi;
	    		$data['dtTgianKetthuc'] 		= date('Y/m/d H:i:s');
	    		$data['ketqua'] 				= "Không điểm"; // 2 điểm 1 câu- > tổng điểm
				$data['iSocaudung']     		= 0; // tổng số câu đúng
				$data['trangthai_lambai']     	= "tudongnopbai"; // tổng số câu đúng
				$row = $this->Msinhvien->update("tbl_sinhvien","sMaSV", $session["sMaSV"], $data);
	    		echo "thatbai"; // chưa chọn câu hỏi nào;
	    		exit();
	    	}
		    
	    }

	    public function luu_auto(){
	    	$session	= $this->session->userdata('user');
	    	$mangtl 	= $this->input->post('traloi');
	    	$arr_new    = [];
	    	if(!empty($mangtl)){
		    	foreach ($mangtl as $key => $value) {
		    		$tam =  array();
		    		$tam['sMaSV']		= $session["sMaSV"];
	    			$tam['sMaCauhoi	'] 	= $value[0];
	    			$tam['sDapanchon'] =  $value[2];
	    			$tam['DapAnChonWEB'] =  $value[1];
	    			array_push($arr_new,$tam);
		    	}
		    	$kq = $this->Msinhvien->setTraloi($session["sMaSV"],$arr_new);
		    	if($kq < 0){
		    		echo $kq;
		    	}else{
		    		echo "luu_auto";
		    	}
	    	}else{
	    		echo "thatbai"; // chưa chọn câu hỏi nào;
	    	}
		    exit();
	    }

	}
 ?>