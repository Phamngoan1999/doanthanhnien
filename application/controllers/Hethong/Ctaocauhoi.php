<?php 
	/**
	 * summary
	 */
	class Ctaocauhoi extends MY_Controller
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
	    	$session = $this->session->userdata('user');
	    	$action = $this->input->post('action');
	    	switch ($action) {
	    		case 'saveSession_Nhom':
	    			$this->saveSession($session);
	    			break;
	    		case 'saveQuestion':
	    			$this->save_question();
	    			break;
	    		case 'get-cau-hoi':
	    			$this->get_cau_hoi();
	    			break;
	    		case 'deleteQuestion':
	    			$this->delete_question();
	    		default:
	    			# code...
	    			break;
	    	}
	    	if($this->input->post('themnhom')){
	    		$data = $this->input->post('data');
	    		$success  = 'Thêm nhóm câu hỏi thành công';
		        $error    = 'Thêm nhóm câu hỏi thất bại';
		        $redirect = base_url().'TaoCauHoi'; 
		        $this->insert("tbl_nhomcauhoi", $data, $success, $error, $redirect);
	    	}
	    	$temp = array(
	    		'template' => 'hethong/Vtaocauhoi',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'nhomcauhoi' => $this->Mhethong->get('tbl_nhomcauhoi'),
	    			'session'	 => $session,
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }
	    public function saveSession($session){
	    	$session['nhomCH'] = $this->input->post('nhomCH');
	    	$this->session->set_userdata('user', $session);
	    	$Nhomcauhoi   = $this->Mhethong->get_Group_Question($session['nhomCH']);
	    	foreach ($Nhomcauhoi as $key => $value) {
	    		$Nhomcauhoi[$key]['check_sv'] = count($this->Mhethong->get_where("tbl_ketqua_sv", "sMaCauhoi", $value['sMaCauhoi']));
	    	}
	    	$data = array(
	    		'NhomCH' 		=> $Nhomcauhoi,
	    	);
	    	echo json_encode($data);
	    	exit();
	    }

	    public function save_question(){
	    	$tbl_cauhoi = array(
	    		'sMaCauhoi'  	=> $this->input->post('mch'),
	    		'iStt' 		 	=> $this->input->post('stt'),
	    		'sNdCauhoi'  	=> $this->input->post('dch'),
	    		'sDapandung' 	=> $this->input->post('dad'),
	    		'sMaNhom_CauHoi'=> $this->input->post('nhomCH'),
	    	);
	    	$tbl_dapan = array(
	    		'sMaDapan'  => $this->input->post('mda'),
	    		'sMaCauhoi' => $tbl_cauhoi['sMaCauhoi'],
	    		'sDapanA'  	=> $this->input->post('a'),
	    		'sDapanB' 	=> $this->input->post('b'),
	    		'sDapanC'  	=> $this->input->post('c'),
	    		'sDapanD' 	=> $this->input->post('d')
	    	);
	    	if(empty($tbl_cauhoi['sDapandung'])){
	    		$notification = 0; // câu hỏi phải có đáp án
	    	}else{
	    		$check = $this->Mhethong->get_where('tbl_cauhoi','sMaCauhoi',$tbl_cauhoi['sMaCauhoi']);
	    		if(!empty($check)){
	    			$kiemtraSV = $this->Mhethong->get_where("tbl_ketqua_sv", 'sMaCauhoi',$tbl_cauhoi['sMaCauhoi'], $tbl_cauhoi);
					if(!empty($kiemtraSV)){
			    		$notification = 2; // sinh viên đã làm và không có quyền sửa
					}else{
		    			$row1 = $this->Mhethong->update('tbl_cauhoi','sMaCauhoi',$tbl_cauhoi['sMaCauhoi'],$tbl_cauhoi);
			    		$row2 = $this->Mhethong->update('tbl_dapan','sMaCauhoi',$tbl_cauhoi['sMaCauhoi'],$tbl_dapan);
			    		$notification = 1; // update khi không có sinh viên câu nào.
					}

		    	}else{
		    		$row1  		= $this->Mhethong->insert('tbl_cauhoi',$tbl_cauhoi);
		    		$row2  		= $this->Mhethong->insert('tbl_dapan',$tbl_dapan);
		    		$notification = 1; // lưu thành công câu hỏi;
		    	}
	    	}
	    	$session = $this->session->userdata('user');
	    	$nhomCH = count($this->Mhethong->get_where('tbl_cauhoi', "sMaNhom_CauHoi", $session['nhomCH']));
	    	$data = array(
	    		'nhomCH' 		=> $nhomCH,
	    		'notification' => $notification,
	    	);
	    	echo json_encode($data);
	    	exit();
	    }

	    public function get_cau_hoi(){
	    	$stt = $this->input->post('stt');
	    	$macauhoi = $this->input->post('value');
	    	$data = $this->Mhethong->get_question($macauhoi);
	    	$data['check_sv'] = count($this->Mhethong->get_where("tbl_ketqua_sv", "sMaCauhoi", $data['sMaCauhoi']));
	    	if(isset($data)){
	    		$notification = $data;
	    	}else{
	    		$notification =0;
	    	}
	    	echo json_encode($notification);
	    	exit();
	    }

	    public function delete_question(){
	    	$question_code 	= $this->input->post('question_code');
	    	$check  		= $this->Mhethong->check_CauHoi($question_code);
	    	if(empty($check)){
	    		$row1 = $this->Mhethong->delete('tbl_dapan','sMaCauhoi',$question_code);
	    		$row = $this->Mhethong->delete('tbl_cauhoi','sMaCauhoi',$question_code);
	    		if($row1>0 && $row >0){
	    			$notification = 1;
	    		}else{
					$notification = 0;
	    		}
	    	}else{
	    		$notification = 2;
	    	}
	    	$session = $this->session->userdata('user');
	    	$nhomCH = count($this->Mhethong->get_where('tbl_cauhoi', "sMaNhom_CauHoi", $session['nhomCH']));
	    	$data = array(
	    		'nhomCH' 		=> $nhomCH,
	    		'notification' => $notification,
	    	);
	    	echo json_encode($data);
	    	exit();
	    }

	    public function DanhSachCauHoi(){
	    	$getNhom = $this->Mhethong->get('tbl_nhomcauhoi');
	    	if($this->input->post('capnhat')){
	    		$data   = $this->input->post('data');
	    		$maNhom = $this->input->post('capnhat');
	    		$data = $this->input->post('data');
	    		$success  = 'Cập nhật nhóm Câu Hỏi thành công';
		        $error    = 'Cập nhật nhóm Câu Hỏi thất bại';
		        $redirect = base_url().'NhomCauHoi'; 
		        $this->update("tbl_nhomcauhoi", 'sMaNhom', $maNhom, $data, $success, $error, $redirect);
	    	}
	    	if($this->input->post('xoa')){
	    		$data   = $this->input->post('data');
	    		$maNhom = $this->input->post('xoa');
	    		$check = $this->Mhethong->getNHOM_cH_SV($maNhom);
	    		if(!empty($check)){
	    			setMessages("error", "Không thế xóa nhóm câu hỏi vì sinh viên đã làm bài","Thông báo");
	    			return redirect( base_url().'NhomCauHoi');
	    		}else{
		    		$success  = 'Xóa nhóm Câu Hỏi thành công';
			        $error    = 'Xóa nhóm Câu Hỏi thất bại';
			        $redirect = base_url().'NhomCauHoi'; 
			        $this->delete("tbl_nhomcauhoi", 'sMaNhom', $maNhom, $success, $error, $redirect);
	    		}
	    	}
	    	$nhomCH = $this->Mhethong->get_nhomCH();
	    	foreach ($nhomCH as $key => $value) {
	    		$data['CH'][$value['sMaNhom']] = $this->Mhethong->get_CauHoi($value['sMaNhom'], $value['soCH_Random']);
	    		
	    	}
	    	// random đáp án
	    	$phrases = array(
			    'sDapanA',
			    'sDapanB',
			    'sDapanC',
			    'sDapanD'
			);
	    	$temp = array(
	    		'template' => 'hethong/Vdanhsachcauhoi',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'nhomCH'	 => $getNhom,
	    			'cauHoi' 	 => $data['CH'],
	    			'phrases'    => $phrases
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }

	    public function ThietLapCauhoi(){
	    	$temp = array(
	    		'template' => 'hethong/Vthietlapcauhoi',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }
	}
 ?>