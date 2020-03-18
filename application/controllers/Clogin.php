<?php
	class Clogin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("Mlogin");
			date_default_timezone_set('Asia/Bangkok');
		}
		public function index()
		{
			$this->session->unset_userdata('user');	
			
			if($this->input->post('dangky')){
				$thoigian  = $this->Mlogin->get_where_row("tbl_tglambai_sv", "thoigian_xet", ""); 
				$tgbd  = explode("/", $thoigian['ngayBD']); 
				$tgbd  = $tgbd[2]."/".$tgbd[1]."/".$tgbd[0]." ". $thoigian['giobd'].":00";
				$tgkt  = explode("/", $thoigian['ngayKT']); 
				$tgkt  	= $tgkt[2]."/".$tgkt[1]."/".$tgkt[0]." ". $thoigian['giokt'].":00";

				$current_date = time();	 // thời gian hiện tại
				if(($current_date < strtotime($tgbd) || $current_date > strtotime($tgkt))){
					setMessages("warning","Cuộc thi chưa bắt đầu, nên bạn không thể đăng ký được!", "Thông báo");
					return redirect(base_url());
				}else{
					$this->Login();
				}
			}
			if($this->input->post('action') == 'check'){
				$mang = $this->input->post("mang");
				$masv = $this->Mlogin->get_where_row("tbl_sinhvien", "sMaSV", $mang[0]);
				$sdt  = $this->Mlogin->get_where_row("tbl_sinhvien", "sSDT", $mang[1]);
				$email = $this->Mlogin->get_where_row("tbl_sinhvien", "sEmail", $mang[2]);
				if(!empty($masv) || !empty($sdt) || !empty($email)){
					echo "error"; //Thông tin sinh viên của bạn đã được đăng ký trên hệ thông!
				}else{
					echo "thanhcong";
				}
				exit();
			}
			$sinhvien_max = $this->Mlogin->get_svDiemMax();
			// usort($sinhvien_max, function($a, $b) {
			//     // compare the tab option value
			//     $diff = $a['ketqua'] - $b['ketqua'];
			//     // and return it. Unless it's zero, then compare order, instead.
			//     return ($diff !== 0) ? $a['ketqua'] < $b['ketqua'] : $a['tongtg'] - $b['tongtg'];
			// });
			foreach ($sinhvien_max as $key => $value) {
				$sinhvien_max[$key]['tgbd'] = strtotime($value['dtTgianBatdau'] );
				$sinhvien_max[$key]['tgkt'] = strtotime($value['dtTgianKetthuc'] );
				$sinhvien_max[$key]['tongtg'] = $sinhvien_max[$key]['tgkt'] - $sinhvien_max[$key]['tgbd'];
				$sinhvien_max[$key]['tongtg_chu'] = $this->secondsToTime1($sinhvien_max[$key]['tongtg']);
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
	

			
			
			$data['SVDT'] = $this->Mlogin->get_svKhoa();
			$tongluot = 0;
			foreach ($data['SVDT'] as $key => $value) {
				$data['SVDT'][$key]['hesosv'] = round($value['heso']*$value['tongsoSVDT']);
				switch ($key) {
					case 0:
						$data['SVDT'][$key]['mausac']  = "bt-xhKhoa";
						break;
					case 1:
						$data['SVDT'][$key]['mausac']  = "bt-xhKhoa2";
						break;
					case 2:
						$data['SVDT'][$key]['mausac']  = "bt-xhKhoa3";
						break;
					case 3:
						$data['SVDT'][$key]['mausac']  = "bt-xhKhoa4";
						break;
					case 4:
						$data['SVDT'][$key]['mausac']  = "bt-xhKhoa5";
						break;
					default:
						$data['SVDT'][$key]['mausac']  = "bt-xhKhoa-df";
						break;
				}
				if( $data['SVDT'][$key]['hesosv'] > 0){
	    			$khoa[$key]['diemTB']  = $data['SVDT'][$key]['hesosv'];
	    		}else{
	    			$khoa[$key]['diemTB'] = 0;
	    		}
				$tongluot += $khoa[$key]['diemTB'];
			}
			// pr($data['SVDT']);
			$dsKhoa = $data['SVDT'][0]['tenkhoa']."/".$data['SVDT'][0]['hesosv'];
			foreach ($data['SVDT'] as $key => $value) {
				if($key != 0){
					$dsKhoa .= ",". $value['tenkhoa']."/".$value['hesosv'];
				}
			}
			
			if($this->input->post('action') == "showTime"){
				$thoigian = $this->Mlogin->get_where_row("tbl_tglambai_sv", "thoigian_xet", "");
				$tgbd  = explode("/", $thoigian['ngayBD']); 
				$ngaybd = $tgbd[0];
				$thangbd = $tgbd[1];
				$tgbd  = $tgbd[2]."/".$tgbd[1]."/".$tgbd[0]." ". $thoigian['giobd'].":00";
				$tgkt  = explode("/", $thoigian['ngayKT']); 
				$ngaykt = $tgkt[0];
				$thangkt = $tgkt[1];
				$tgkt  	= $tgkt[2]."/".$tgkt[1]."/".$tgkt[0]." ". $thoigian['giokt'].":00";

				$current_date = time();
				$dem = strtotime($tgbd) - $current_date; // đếm xem còn bao nhiều thời gian nữa xem đến cuộc thi
				// pr(strtotime($tgkt) - strtotime($tgbd));
				if($dem > 0){
					$data['thoigiansapbatdau']  = $this->secondsToTime($dem);
					$data['thoigiandangchay'] = 0;
					$data['trangthai'] = 1;
				}else{
					$data['trangthai'] = 0;
					$data['thoigiansapbatdau'] = 0;
					$data['thoigiandangchay'] = strtotime($tgkt) - $current_date;
					if($data['thoigiandangchay'] < 0){
						$data['trangthai'] = 2;
						$data['thoigiandangchay'] = 0;
					}else{
						$data['thoigiandangchay'] = $this->secondsToTime($data['thoigiandangchay']);
					}
				}
				echo  json_encode($data);
				exit();
			}

			// pr($sinhvien_max);
			$temp = array(
	    		'template' => 'sinhvien/Vsinhvien',
	    		'data'     => array(
	    			'message' 	 	=> getMessages(),
	    			'khoa'			=> $this->Mlogin->get_where("tbl_khoa", "makhoa !=", ""),
	    			'sinhvien_max'  => $sinhvien_max,
	    			'sinhvienDT'	=> $data['SVDT'],
	    			'dsKhoa'		=> $dsKhoa,
	    			'tongSoSV'		=> $this->Mlogin->tongsoSV_DT()['tongsoSV'],
	    			'tongluot'		=> $tongluot,
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
		}
		
		function secondsToTime1($seconds) {
		    $dtF = new \DateTime('@0');
		    $dtT = new \DateTime("@$seconds");
		    return $dtF->diff($dtT)->format('%i minutes and %s seconds');
		}

		function secondsToTime($seconds) {
		    $dtF = new \DateTime('@0');
		    $dtT = new \DateTime("@$seconds");
	    	$ngay = $dtF->diff($dtT)->format('%a');
	    	$gio  = $dtF->diff($dtT)->format('%h');
	    	$phut = $dtF->diff($dtT)->format('%i');
	    	$giay = $dtF->diff($dtT)->format('%s');
	    	$date = $ngay.":".$gio.":".$phut.":".$giay;
		    return $date;
		}
		public function Login()
		{
			$data   			= $this->input->post('data');
			$data['sNgaysinh']  = date("d/m/Y", strtotime($data['sNgaysinh']));
			$data['iMaNganh']   = $data['FK_makhoa'];
			$matkhau    		= $this->input->post('matkhau');
			$taikhoan = array(
				'sMaTaikhoan' 	=> "TK".time().$data['sMaSV'],
				'sEmail' 		=> $data['sEmail'],
				'sMatkhau'  	=> sha1($matkhau),
				'iMaQuyen'  	=> 2,
				'sMaSV'			=> $data['sMaSV'],
			);
			$insert = $this->Mlogin->insert_sv($data, $taikhoan);
			if($insert > 0){
				$data['maquyen'] = 2;
	    		$data['tenkhoa'] = $this->Mlogin->get_where_row("tbl_khoa", 'makhoa', $data['FK_makhoa'])['tenkhoa'];
				$this->session->set_userdata("user", $data);
				setMessages("success", "Đăng ký thành công! <br> Chào mừng ".$data['sTenSV']." đến với hệ thống!", "Thông báo");
				return redirect(base_url("SinhVien"));
			}else{
				setMessages("error", $insert, "Thông báo");
				return redirect(base_url());
			}
		}
		public function logout(){
			$this->session->userdata = array();
	    	$this->session->sess_destroy();
	    	$this->input->set_cookie('', '', time()-36000);
	    	return redirect(base_url());
		}
	}
?>