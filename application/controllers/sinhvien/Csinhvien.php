<?php 
	/**
	 * summary
	 */
	class Csinhvien extends MY_Controller
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
	    	$session = $this->session->userdata("user");
	    	$thoigian  = $this->Msinhvien->get_where_row("tbl_tglambai_sv", "thoigian_xet", ""); 
			$tgbd  = explode("/", $thoigian['ngayBD']); 
			$tgbd  = $tgbd[2]."/".$tgbd[1]."/".$tgbd[0]." ". $thoigian['giobd'].":00";
			$tgkt  = explode("/", $thoigian['ngayKT']); 
			$tgkt  	= $tgkt[2]."/".$tgkt[1]."/".$tgkt[0]." ". $thoigian['giokt'].":00";

			$current_date = time();	 // thời gian hiện tại
			if(($current_date < strtotime($tgbd) || $current_date > strtotime($tgkt)) && $session['maquyen'] != 1){
				setMessages("warning","Cuộc thi chưa bắt đầu, nên bạn không thể đăng ký được!", "Thông báo");
				return redirect(base_url());
			}

	    	if($this->input->post('batdaulambai')){
	    		$data['dtTgianBatdau'] 		= date("Y/m/d H:i:s");
	    		$data['trangthai_lambai'] 	= 0; // đã vào làm bài
	    		$update = $this->Msinhvien->update("tbl_sinhvien", "sMaSV", $session['sMaSV'], $data);
	    		if($update > 0){
	    			return redirect(base_url('SinhVienLamBai')); 
	    		}
	    	}
	    	$sinhvien = $this->Msinhvien->get_where_row("tbl_sinhvien", "sMaSV", $session['sMaSV']);
	    	if($sinhvien['trangthai_lambai'] == 1 && $sinhvien['dtTgianKetthuc'] != ""){
	    		return redirect(base_url('KetQuaSinhVien')); 
	    	}else if($sinhvien['dtTgianBatdau']){
	    		$get_gio  = $this->Msinhvien->get_where_row("tbl_tglambai_sv", "thoigian_xet !=", ""); // tổng thời gian làm bài sv';
	    		$tongso = $this->Msinhvien->get_nhomCH1()['tongsoCH'];
				$current_date = time();	 // thời gian hiện tại
				// // tổng thời gian làm bài
				$tgBD = $sinhvien['dtTgianBatdau'];
				$date2        = strtotime($tgBD) + strtotime('1970-01-01 ' . $get_gio['thoigian_xet'] . ' GMT');
				$demthoigian = $date2 - $current_date;
				if($demthoigian <= 0){
					$tongsocauhoi 					= $tongso;
		    		$data['iSocautraloi'] 			= 0 . '/'. $tongsocauhoi;
		    		$data['dtTgianKetthuc'] 		= date('Y/m/d H:i:s');
		    		$data['ketqua'] 				= 0; // 2 điểm 1 câu- > tổng điểm
					$data['iSocaudung']     		= 0; // tổng số câu đúng
					$data['trangthai_lambai']     	= "khonglambai"; // tổng số câu đúng
			    	$row = $this->Msinhvien->update("tbl_sinhvien","sMaSV", $session["sMaSV"], $data);
					return redirect(base_url('KetQuaSinhVien'));
				}else{
					return redirect(base_url('SinhVienLamBai'));
				}
	    	}
	    	$sinhvien_max = $this->Msinhvien->get_svDiemMax();
			foreach ($sinhvien_max as $key => $value) {
				switch ($key) {
					case 0:
						$sinhvien_max[$key]['huychuong']  = "hcvang.png";
						break;
					case 1:
						$sinhvien_max[$key]['huychuong']  = "hcbac.png";
						break;
					case 2:
						$sinhvien_max[$key]['huychuong']  = "hcdong.png";
						break;
					default:
						$sinhvien_max[$key]['huychuong']  = "hc.png";
						break;
				}
			}

	    	$temp = array(
	    		'template' => 'sinhvien/VsinhvienTrangChu',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'sinhvien_max'  => $sinhvien_max,
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }
	}
 ?>