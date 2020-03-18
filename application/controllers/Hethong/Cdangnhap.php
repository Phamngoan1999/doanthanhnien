<?php
	class Cdangnhap extends CI_Controller
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
			if($this->input->post('dangnhap')){
				$this->Login();
			}
			$temp = array(
	    		'template' => 'hethong/Vdangnhap',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
		}
		public function Login()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$row 	  =  $this->Mlogin->checksv($username, sha1($password));
			if(!empty($row)){
				$session = array(
					'sMaSV' 		=> $row['sMaSV'],
					'sTenSV' 		=> $row['sTenSV'],
					'maquyen' 		=> $row['iMaQuyen'],
					'sNgaysinh' 	=> $row['sNgaysinh'],
					'iMaNganh' 		=> $row['iMaNganh'],
					'FK_makhoa' 	=> $row['FK_makhoa'],
					'tenkhoa' 		=> $this->Mlogin->get_where_row("tbl_khoa", 'makhoa', $row['FK_makhoa'])['tenkhoa']
				);
				$this->session->set_userdata("user", $session);
				$thoigian  = $this->Mlogin->get_where_row("tbl_tglambai_sv", "thoigian_xet", ""); 
				$tgbd  = explode("/", $thoigian['ngayBD']); 
				$tgbd  = $tgbd[2]."/".$tgbd[1]."/".$tgbd[0]." ". $thoigian['giobd'].":00";
				$tgkt  = explode("/", $thoigian['ngayKT']); 
				$tgkt  	= $tgkt[2]."/".$tgkt[1]."/".$tgkt[0]." ". $thoigian['giokt'].":00";

				$current_date = time();	 // thời gian hiện tại
				if(($current_date < strtotime($tgbd) || $current_date > strtotime($tgkt)) && $session['maquyen'] != 1){
					setMessages("error", "Bạn không nằm trong thời gian đăng nhập của hệ thống", "Thông báo");
					return redirect(base_url('DangNhap'));
				}else{
					if($session['maquyen'] == 1){
						setMessages("success", "Đăng ký thành công! <br> Chào mừng ".$session['sTenSV']." đến với hệ thống!", "Thông báo");
						return redirect(base_url('TrangChu'));
					}
					if($session['maquyen'] == 2){
						$check = $this->Mlogin->getSV($session['sMaSV']);
						if($check['trangthai_lambai'] == 1 || !empty($check['dtTgianKetthuc'])){
							setMessages("success", "Đăng nhập thành công! <br> Chào mừng ".$session['sTenSV']." đến với hệ thống!", "Thông báo");
							return redirect(base_url('KetQuaSinhVien'));
						}
						setMessages("success", "Đăng nhập thành công! <br> Chào mừng ".$session['sTenSV']." đến với hệ thống!", "Thông báo");
						return redirect(base_url('SinhVien'));
					}
				}
				
			}else{
				setMessages("error", "Tài khoản hoặc mật khẩu của bạn không chính sác!", "Thông báo");
				return redirect("DangNhap");
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