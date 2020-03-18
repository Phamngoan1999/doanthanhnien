<?php 
	/**
	 * summary
	 */
	class Cdanhsachthongke extends MY_Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Hethong/Mhethong');
	    	$this->load->library('Excel');
	    }

	    public function index(){
	    	$khoa  = $this->Mhethong->get('tbl_khoa');
	    	foreach ($khoa as $key => $value) {
	    		$khoa[$key]['svdu_dk'] = $this->Mhethong->getSV_Khoa($value['makhoa'], 1);
	    		
	    		$khoa[$key]['svko_du_dk'] = $this->Mhethong->getSV_Khoa($value['makhoa'], "khonglambai") + $this->Mhethong->getSV_Khoa($value['makhoa'], "tudongnopbai");
	    	}
	    	foreach ($khoa as $key => $value) {
	    		if($value['svdu_dk']['tongso'] != 0){
	    			$khoa[$key]['diemTB'] = round($value['svdu_dk']['kqsv'] / $value['svdu_dk']['tongso']);
	    		}else{
	    			$khoa[$key]['diemTB'] = 0;
	    		}
	    	}
	    	if($this->input->get('xuatbaocaothongke')){
	    		$this->xuatbaocaothongke($khoa);
	    	}
	    	if($this->input->post("xuatbaocaothongke")){
    			$this->xuatTopSV($this->input->post('soSV'));
		    }
	    	$temp = array(
	    		'template' => 'hethong/Vdanhsachthongke',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'khoa'		 => $khoa,
	    			
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
	    			$this->xuatbaocaokhoa( $this->input->get('khoa'));
	    			break;	
	    		case 'xuatbaocaotong_sv':
	    			$this->xuatbaocaotong_sv();
	    			break;	
	    		default:
	    			break;
	    	}
	    }

	    public function xuatbaocaotong_sv(){
	    	$objPHPExcel                 = new PHPExcel(); 
	    	$nam                         = date('d/m/Y H:i:s');
	    	$filename                    = 'Xuất báo cáo tổng';
	    	$objPHPExcel->getProperties()->setCreator("Văn Lâm")
	    	->setLastModifiedBy("Administrator")
	    	->setTitle("Xuất báo cáo tổng")
	    	->setSubject("Xuất báo cáo tổng");
	    	$objPHPExcel->getDefaultStyle()->getFont()->setName('Times new Roman')->setSize(13);

	        /**********************************************************************
	        ****************          FILE EXCEL 8.1               ****************
	        ****************                                       ****************
	        ***********************************************************************/
	        $objPHPExcel->getActiveSheet()->setTitle("Xuất báo cáo tổng");
	        $session = $this->session->userdata('user');
	        $sinhvien = $this->Mhethong->ThongKeSV_Tong();
	        $dem = count( $sinhvien) +5;
	        //Border
	        $styleArray = array(
	        	'borders' => array(
	        		'allborders' => array(
	        			'style' => PHPExcel_Style_Border::BORDER_THIN
	        		)
	        	)
	        );
	        $objPHPExcel->getActiveSheet()->getStyle('A5:I'.$dem)->applyFromArray($styleArray);
	        unset($styleArray);
	        // Căn cỡ cột tự động
	        foreach(range('A','Z') as $columnID){
	        	$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
	        }

	        // Căn cỡ hàng tự động
	        foreach($objPHPExcel->getActiveSheet()->getRowDimensions() as $rd) {
	        	$rd->setRowHeight(-1);
	        }

	        //Xuống dòng
	        $objPHPExcel->getActiveSheet()->getStyle('A5:I5')->getAlignment()->setWrapText(true);

	        // Merge cell
	        $array_merge = array('A4:H4','A2:B2', 'A'.($dem+1).':C'.($dem+1));
	        foreach($array_merge as $cell){
	        	$objPHPExcel->getActiveSheet()->mergeCells($cell);
	        }
	        // Căn giữa ngang
	        $canngang= array('A5:H5','A2','B6:B'.$dem,'G6:G'.$dem, 'G6:G'.$dem, 'H6:H'.$dem, 'A6:A'.$dem, 'E6:E'.$dem, 'A4:F4', 'A'.($dem+1).':C'.($dem+1),  'I6:I'.$dem);
	        foreach($canngang as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	        }

	        // Căn giữa dọc
	        $array_vertical_center = array('A1:K15');
	        foreach($array_vertical_center as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	        }

	        // In đậm
	        $array_bold = array('A2','A5:F5','C3', 'A4:F4', 'A5:I5');
	        foreach($array_bold as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setBold(true);
	        }
	    	// In nghiêng
	        $array_italic = array('A'.($dem+1).':C'.($dem+1));
	        foreach($array_italic as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setItalic(true);
	        }

	        // Chỉnh cỡ font
	        $array_font_size = array(
	        	'A1' => 14,
	        	'A2' => 14,
	        	'C3' => 20,
	        	'A5:H5' => 13,
	        	'A4:F4' => 16
	        );
	        foreach($array_font_size as $key => $value){
	        	$objPHPExcel->getActiveSheet()->getStyle($key)->getFont()->setSize($value);
	        }

	        // Chỉnh cỡ cột
	        $array_column = array(
	        	'A' => 4,
	        	'B' => 25,
	        	'C' => 20,
	        	'D' => 12,
	        	'E' => 12,
	        	'F' => 24,
	        	'G' => 14,
	        	'H' => 14,
	        	'J'=> 10,
	        	'I'=>10,
	        );
	        foreach($array_column as $key => $value){
	        	$objPHPExcel->getActiveSheet()->getColumnDimension($key)->setAutoSize(false);
	        	$objPHPExcel->getActiveSheet()->getColumnDimension($key)->setWidth($value);
	        }
	    	//Chỉnh cỡ hàng fix cứng
	        $array_row = array(
	        	'5' => 25,
	        	'4' => 39

	        );
	        foreach($array_row as $key => $value){
	        	$objPHPExcel->getActiveSheet()->getRowDimension($key)->setRowHeight($value);
	        }
	        //*******************************************
		    //************* NỘI DUNG ********************
		    //*******************************************
	        $title = "XUẤT BÁO TỔNG SỐ SINH VIÊN CỦA CÁC KHOA";
	        // $array_content = $this->column_tieude($title)['header'];
	        $array_content = $this->column_tieude($title, "")['header'];
	        $column = $this->column_tieude($title, "")['column'];
	        $cot=0;
	        $index = 5;
	        for ($i='A'; $i < 'J' ; $i++) {
	        	$array_content[$i.$index] = $column[$cot];
	        	$cot++;
	        }
	        $indexRow = 6;
	        $session = $this->session->userdata('user');
	        foreach ($sinhvien AS $k => $v)
	        {
	        	if($v['trangthai_lambai'] == null){
	        		$kq = 'Chưa làm bài';
	        	}else{
	        		if($v['trangthai_lambai'] == 0 && $v['dtTgianKetthuc'] == NULL){
	        			$kq = 'Chưa nộp bài';
	        		}else{
	        			$kq  =  $v['ketqua'];
	        		}
	        	}
	        	$tenkhoa = $this->Mhethong->get_where_row("tbl_khoa", "makhoa", $v['FK_makhoa'])['tenkhoa'];
	        	$mang = [$k+1, 'sMaSV', 'sTenSV', 'sNgaysinh', 'sSDT',$tenkhoa, 'iSocautraloi','iSocaudung' ,$kq];
	        	$cot = 0;
	        	for ($i='A'; $i < 'J' ; $i++) {
	        		if(($cot != 0) && ($cot != 5) && ($cot != 8)){
	        			$array_content[$i.$indexRow] = $v[$mang[$cot]];
	        		}else{
	        			$array_content[$i.$indexRow] = $mang[$cot];
	        		}
	        		$cot++;
	        	}
	        	$indexRow++;
	        }
	        // Muốn thêm nội dung động thì foreach array push là xong.
	        foreach($array_content as $key => $value){
	        	$objPHPExcel->getActiveSheet()->setCellValue($key,$value);
	        }
	        // End chỉnh sửa nội dung
	    	// ob_end_clean();
	        if (ob_get_contents()) ob_end_clean();

	        header("Content-type: application/vnd.ms-excel");
	        header("Content-Disposition: attachment;filename=".$filename.".xls");
	        header("Cache-Control: max-age=0");

	        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	        $objWriter->save('php://output');
	        exit();
	    }

	    public function xuatTopSV($sosv){
	    	$objPHPExcel                 = new PHPExcel(); 
	    	$nam                         = date('d/m/Y H:i:s');
	    	$filename                    = 'DSSV_TopCaoNhat_' .$nam;
	    	$objPHPExcel->getProperties()->setCreator("Văn Lâm")
	    	->setLastModifiedBy("Administrator")
	    	->setTitle("Top".$sosv."CaoNhat")
	    	->setSubject("DSSV_Khoa");
	    	$objPHPExcel->getDefaultStyle()->getFont()->setName('Times new Roman')->setSize(13);

	        /**********************************************************************
	        ****************          FILE EXCEL 8.1               ****************
	        ****************                                       ****************
	        ***********************************************************************/
	        $objPHPExcel->getActiveSheet()->setTitle("Top".$sosv."CaoNhat");
	        $session = $this->session->userdata('user');
	        $sinhvien = $this->Mhethong->ThongKeSV_CaoNhat($sosv);
	        $dem = count( $sinhvien) +5;
	        //Border
	        $styleArray = array(
	        	'borders' => array(
	        		'allborders' => array(
	        			'style' => PHPExcel_Style_Border::BORDER_THIN
	        		)
	        	)
	        );
	        $objPHPExcel->getActiveSheet()->getStyle('A5:I'.$dem)->applyFromArray($styleArray);
	        unset($styleArray);
	        // Căn cỡ cột tự động
	        foreach(range('A','Z') as $columnID){
	        	$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
	        }

	        // Căn cỡ hàng tự động
	        foreach($objPHPExcel->getActiveSheet()->getRowDimensions() as $rd) {
	        	$rd->setRowHeight(-1);
	        }

	        //Xuống dòng
	        $objPHPExcel->getActiveSheet()->getStyle('A5:I5')->getAlignment()->setWrapText(true);

	        // Merge cell
	        $array_merge = array('A4:H4','A2:B2', 'A'.($dem+1).':C'.($dem+1));
	        foreach($array_merge as $cell){
	        	$objPHPExcel->getActiveSheet()->mergeCells($cell);
	        }
	        // Căn giữa ngang
	        $canngang= array('A5:H5','A2','B6:B'.$dem,'G6:G'.$dem, 'G6:G'.$dem, 'H6:H'.$dem, 'A6:A'.$dem, 'E6:E'.$dem, 'A4:F4', 'A'.($dem+1).':C'.($dem+1), 'F6:F'.$dem, 'I6:I'.$dem);
	        foreach($canngang as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	        }

	        // Căn giữa dọc
	        $array_vertical_center = array('A1:K15');
	        foreach($array_vertical_center as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	        }

	        // In đậm
	        $array_bold = array('A2','A5:F5','C3', 'A4:F4', 'A5:I5');
	        foreach($array_bold as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setBold(true);
	        }
	    	// In nghiêng
	        $array_italic = array('A'.($dem+1).':C'.($dem+1));
	        foreach($array_italic as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setItalic(true);
	        }

	        // Chỉnh cỡ font
	        $array_font_size = array(
	        	'A1' => 14,
	        	'A2' => 14,
	        	'C3' => 20,
	        	'A5:H5' => 13,
	        	'A4:F4' => 16
	        );
	        foreach($array_font_size as $key => $value){
	        	$objPHPExcel->getActiveSheet()->getStyle($key)->getFont()->setSize($value);
	        }

	        // Chỉnh cỡ cột
	        $array_column = array(
	        	'A' => 4,
	        	'B' => 25,
	        	'C' => 20,
	        	'D' => 12,
	        	'E' => 12,
	        	'F' => 24,
	        	'G' => 14,
	        	'H' => 14,
	        	'J'=> 10,
	        	'I'=>10,
	        );
	        foreach($array_column as $key => $value){
	        	$objPHPExcel->getActiveSheet()->getColumnDimension($key)->setAutoSize(false);
	        	$objPHPExcel->getActiveSheet()->getColumnDimension($key)->setWidth($value);
	        }
	    	//Chỉnh cỡ hàng fix cứng
	        $array_row = array(
	        	'5' => 25,
	        	'4' => 39

	        );
	        foreach($array_row as $key => $value){
	        	$objPHPExcel->getActiveSheet()->getRowDimension($key)->setRowHeight($value);
	        }
	        //*******************************************
		    //************* NỘI DUNG ********************
		    //*******************************************
		    $title = "TỐP ".$sosv." CAO NHẤT TRONG CUỘC THI";
	        // $array_content = $this->column_tieude($title)['header'];
	        $array_content = $this->column_tieude($title, "")['header'];
	        $column = $this->column_tieude($title, "")['column'];
	        $cot=0;
	        $index = 5;
	        for ($i='A'; $i < 'J' ; $i++) {
	            $array_content[$i.$index] = $column[$cot];
	            $cot++;
	        }
	        $indexRow = 6;
	        $session = $this->session->userdata('user');
	        foreach ($sinhvien AS $k => $v)
	        {
	        	if($v['trangthai_lambai'] == null){
	        		$kq = 'Chưa làm bài';
	        	}else{
	        		if($v['trangthai_lambai'] == 0 && $v['dtTgianKetthuc'] == NULL){
	        			$kq = 'Chưa nộp bài';
	        		}else{
	        			$kq  =  $v['ketqua'];
	        		}
	        	}
	        	$tenkhoa = $this->Mhethong->get_where_row("tbl_khoa", "makhoa", $v['FK_makhoa'])['tenkhoa'];
	       	 	$mang = [$k+1, 'sMaSV', 'sTenSV', 'sNgaysinh', 'sSDT',$tenkhoa, 'iSocautraloi','iSocaudung' ,$kq];
	        	$cot = 0;
	        	for ($i='A'; $i < 'J' ; $i++) {
	        		if($cot != 0 && $cot != 5 && $cot != 8){
		            	$array_content[$i.$indexRow] = $v[$mang[$cot]];
	        		}else{
		            	$array_content[$i.$indexRow] = $mang[$cot];
	        		}
		            $cot++;
		        }
	        	$indexRow++;
	        }
	        // pr($array_content);
	        // Muốn thêm nội dung động thì foreach array push là xong.
	        foreach($array_content as $key => $value){
	        	$objPHPExcel->getActiveSheet()->setCellValue($key,$value);
	        }
	        // End chỉnh sửa nội dung
	    	// ob_end_clean();
	        if (ob_get_contents()) ob_end_clean();
	        header("Content-type: application/vnd.ms-excel");
	        header("Content-Disposition: attachment;filename=".$filename.".xls");
	        header("Cache-Control: max-age=0");

	        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	        $objWriter->save('php://output');
	        exit();
	    }

	    public function xuatbaocaokhoa($makhoa){
	    	$data['session']             = $this->session->userdata('user');

	    	$objPHPExcel                 = new PHPExcel(); 
	    	$nam                         = date('d/m/Y H:i:s');
	    	$filename                    = 'DSSV_Khoa_';
	    	$tenkhoa                     = $this->Mhethong->get_where_row("tbl_khoa", "makhoa", $makhoa)['tenkhoa'];
	    	$objPHPExcel->getProperties()->setCreator("Văn Lâm")
	    	->setLastModifiedBy("Administrator")
	    	->setTitle($tenkhoa)
	    	->setSubject("DSSV_Khoa");
	    	$objPHPExcel->getDefaultStyle()->getFont()->setName('Times new Roman')->setSize(13);

	        /**********************************************************************
	        ****************          FILE EXCEL 8.1               ****************
	        ****************                                       ****************
	        ***********************************************************************/
	        $objPHPExcel->getActiveSheet()->setTitle($tenkhoa);
	        $session = $this->session->userdata('user');
	        $sinhvien = $this->Mhethong->ThongKeSV_TheoKhoa($makhoa);
	        $dem = count( $sinhvien) +5;
	        //Border
	        $styleArray = array(
	        	'borders' => array(
	        		'allborders' => array(
	        			'style' => PHPExcel_Style_Border::BORDER_THIN
	        		)
	        	)
	        );
	        $objPHPExcel->getActiveSheet()->getStyle('A5:I'.$dem)->applyFromArray($styleArray);
	        unset($styleArray);
	        // Căn cỡ cột tự động
	        foreach(range('A','Z') as $columnID){
	        	$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
	        }

	        // Căn cỡ hàng tự động
	        foreach($objPHPExcel->getActiveSheet()->getRowDimensions() as $rd) {
	        	$rd->setRowHeight(-1);
	        }

	        //Xuống dòng
	        $objPHPExcel->getActiveSheet()->getStyle('A5:I5')->getAlignment()->setWrapText(true);

	        // Merge cell
	        $array_merge = array('A4:H4','A2:B2', 'A'.($dem+1).':C'.($dem+1));
	        foreach($array_merge as $cell){
	        	$objPHPExcel->getActiveSheet()->mergeCells($cell);
	        }
	        // Căn giữa ngang
	        $canngang= array('A5:H5','A2','B6:B'.$dem,'G6:G'.$dem, 'G6:G'.$dem, 'H6:H'.$dem, 'A6:A'.$dem, 'E6:E'.$dem, 'A4:F4', 'A'.($dem+1).':C'.($dem+1),  'I6:I'.$dem);
	        foreach($canngang as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	        }

	        // Căn giữa dọc
	        $array_vertical_center = array('A1:K15');
	        foreach($array_vertical_center as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	        }

	        // In đậm
	        $array_bold = array('A2','A5:F5','C3', 'A4:F4', 'A5:I5');
	        foreach($array_bold as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setBold(true);
	        }
	    	// In nghiêng
	        $array_italic = array('A'.($dem+1).':C'.($dem+1));
	        foreach($array_italic as $cell){
	        	$objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setItalic(true);
	        }

	        // Chỉnh cỡ font
	        $array_font_size = array(
	        	'A1' => 14,
	        	'A2' => 14,
	        	'C3' => 20,
	        	'A5:H5' => 13,
	        	'A4:F4' => 16
	        );
	        foreach($array_font_size as $key => $value){
	        	$objPHPExcel->getActiveSheet()->getStyle($key)->getFont()->setSize($value);
	        }

	        // Chỉnh cỡ cột
	        $array_column = array(
	        	'A' => 4,
	        	'B' => 25,
	        	'C' => 20,
	        	'D' => 12,
	        	'E' => 12,
	        	'F' => 22,
	        	'G' => 14,
	        	'H' => 14,
	        	'J'=> 10,
	        	'I'=>10,
	        );
	        foreach($array_column as $key => $value){
	        	$objPHPExcel->getActiveSheet()->getColumnDimension($key)->setAutoSize(false);
	        	$objPHPExcel->getActiveSheet()->getColumnDimension($key)->setWidth($value);
	        }
	    	//Chỉnh cỡ hàng fix cứng
	        $array_row = array(
	        	'5' => 25,
	        	'4' => 39

	        );
	        foreach($array_row as $key => $value){
	        	$objPHPExcel->getActiveSheet()->getRowDimension($key)->setRowHeight($value);
	        }
	        //*******************************************
		    //************* NỘI DUNG ********************
		    //*******************************************
		    $title = "DANH SÁCH THỐNG KÊ SINH VIÊN DỰ THI THEO KHOA";
	        // $array_content = $this->column_tieude($title)['header'];
	        $array_content = $this->column_tieude($title, $tenkhoa)['header'];
	        $column = $this->column_tieude($title, $tenkhoa)['column'];
	        $cot=0;
	        $index = 5;
	        for ($i='A'; $i < 'J' ; $i++) {
	            $array_content[$i.$index] = $column[$cot];
	            $cot++;
	        }
	        $indexRow = 6;
	        foreach ($sinhvien AS $k => $v)
	        {
	        	if($v['trangthai_lambai'] == null){
	        		$kq = 'Chưa làm bài';
	        	}else{
	        		if($v['trangthai_lambai'] == 0 && $v['dtTgianKetthuc'] == NULL){
	        			$kq = 'Chưa nộp bài';
	        		}else{
	        			$kq  =  $v['ketqua'];
	        		}
	        	}
	       	 	$mang = [$k+1, 'sMaSV', 'sTenSV', 'sNgaysinh', 'sSDT',$tenkhoa ,'iSocautraloi','iSocaudung' ,$kq];
	        	$cot = 0;
	        	for ($i='A'; $i < 'J' ; $i++) {
	        		if($cot != 0 && $cot != 5 && $cot != 8){
		            	$array_content[$i.$indexRow] = $v[$mang[$cot]];
	        		}else{
		            	$array_content[$i.$indexRow] = $mang[$cot];
	        		}
		            $cot++;
		        }
	        	$indexRow++;
	        }
	        // pr($array_content);
	        // Muốn thêm nội dung động thì foreach array push là xong.
	        foreach($array_content as $key => $value){
	        	$objPHPExcel->getActiveSheet()->setCellValue($key,$value);
	        }
	        // End chỉnh sửa nội dung
	    	// ob_end_clean();
	        if (ob_get_contents()) ob_end_clean();
	        header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: attachment;filename=".$filename.".xls");
            header("Cache-Control: max-age=0");

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit();
	    }

	    public function xuatbaocaotong($khoa){
	    	$data['session']    = $this->session->userdata('user');
	    	$objPHPExcel        = new PHPExcel(); 
	    	$nam                = date('d/m/Y H:i:s');
	    	$filename           = 'ThongKe_Khoa' .$nam;
	    	$objPHPExcel->getProperties()->setCreator("Văn Lâm")
	    	->setLastModifiedBy("Administrator")
	    	->setTitle("ThongKe_Khoa")
	    	->setSubject("ThongKe_Khoa");
	    	$objPHPExcel->getDefaultStyle()->getFont()->setName('Times new Roman')->setSize(13);
	    	$trangthai_lambai = 1;
	    	$dem              = 0;
            $maquyen          = 3; // sịnh viên
            $tt               = 1; // đã nôp bài còn 0 là đăng làm còn null chưa nộp
            $dem = count($khoa) + 6;
            /**********************************************************************
            ****************          FILE EXCEL 8.1               ****************
            ****************                                       ****************
            ***********************************************************************/
            $objPHPExcel->getActiveSheet()->setTitle("DSSV_Thi");
            $session = $this->session->userdata('user');
            //Border
            $styleArray = array(
            	'borders' => array(
            		'allborders' => array(
            			'style' => PHPExcel_Style_Border::BORDER_THIN
            		)
            	)
            );
            $objPHPExcel->getActiveSheet()->getStyle('A6:G'.$dem)->applyFromArray($styleArray);
            unset($styleArray);
            // Căn cỡ cột tự động
            foreach(range('A','Z') as $columnID){
            	$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            // Căn cỡ hàng tự động
            foreach($objPHPExcel->getActiveSheet()->getRowDimensions() as $rd) {
            	$rd->setRowHeight(-1);
            }

            //Xuống dòng
            $objPHPExcel->getActiveSheet()->getStyle('A6:G6')->getAlignment()->setWrapText(true);

            // Merge cell
            $array_merge = array('A2:C2','A4:D4','A1:B1');
            foreach($array_merge as $cell){
            	$objPHPExcel->getActiveSheet()->mergeCells($cell);
            }
            // Căn giữa ngang
            $canngang= array('A6:A'.$dem,'A6:G6', 'A4:D4', 'C7:C'.$dem, 'D7:D'.$dem, 'E7:G'.$dem);
            foreach($canngang as $cell){
            	$objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            }

            // Căn giữa dọc
            $array_vertical_center = array('A1:G'.$dem);
            foreach($array_vertical_center as $cell){
            	$objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            }

            // In đậm
            $array_bold = array('A2','A1','A6:A'.$dem,'C3', 'A6:G6', 'A4:D4' ,'A2:D2');
            foreach($array_bold as $cell){
            	$objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setBold(true);
            }

            // In nghiêng
            $array_italic = array();
            foreach($array_italic as $cell){
            	$objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setItalic(true);
            }

            // Chỉnh cỡ font
            $array_font_size = array(
            	'A1' => 13,
            	'A2' => 13,
            	'A4' => 15,
            	'A5:H5' => 13
            );
            foreach($array_font_size as $key => $value){
            	$objPHPExcel->getActiveSheet()->getStyle($key)->getFont()->setSize($value);
            }

            // Chỉnh cỡ cột
            $array_column = array(
            	'A' => 4,
            	'B' => 36,
            	'C' => 12,
            	'D' => 11,
            	'E' => 13,
            	'F' => 7,
            	'G' => 8,
            	'H' => 11,
            	'J'=> 10,
            	'I'=>10,
            );
            foreach($array_column as $key => $value){
            	$objPHPExcel->getActiveSheet()->getColumnDimension($key)->setAutoSize(false);
            	$objPHPExcel->getActiveSheet()->getColumnDimension($key)->setWidth($value);
            }

            //Chỉnh cỡ hàng fix cứng

            $array_row = array(


            );
            foreach($array_row as $key => $value){
            	$objPHPExcel->getActiveSheet()->getRowDimension($key)->setRowHeight($value);
            }

            //*******************************************
            //************* NỘI DUNG ********************
            //*******************************************
            $title = 'DANH SÁCH THỐNG KÊ SINH VIÊN';
            $array_content = array(
            	'A1' => 'BỘ GIÁO DỤC VÀ ĐÀO TẠO',
            	'A2' => 'TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI',
            	'A4' => $title,
            	'A6' => 'STT',
                // 'B6' => 'Mã Ngành',
            	'B6' => 'Tên Khoa',
            	'C6' => 'Tổng số sinh dư thi',
            	'D6' => 'Tổng số sinh viên hoàn thành bài thi',
            	'E6' => 'Hệ số',
            	'F6' => 'Tổng điểm của khoa',
            	'G6' => 'Điểm trung bình khoa',
            );
            $indexRow = 7;
            $dem = 1;
            foreach ($khoa as $key => $value) {
	    		$khoa[$key]['svdu_dk'] = $this->Mhethong->getSV_Khoa($value['makhoa'], 1);
	    		
	    		$khoa[$key]['svko_du_dk'] = $this->Mhethong->getSV_Khoa($value['makhoa'], "khonglambai") + $this->Mhethong->getSV_Khoa($value['makhoa'], "tudongnopbai");
	    	}
	    	foreach ($khoa as $key => $value) {
	    		if($value['svdu_dk']['tongso'] != 0){
	    			$khoa[$key]['diemTB'] = round($value['svdu_dk']['kqsv'] / $value['svdu_dk']['tongso']);
	    		}else{
	    			$khoa[$key]['diemTB'] = 0;
	    		}
	    	}
            foreach ($khoa AS $k => $v)
            {
            	$array_content['A'.$indexRow] = $dem++;
            	$array_content['B'.$indexRow] = $v['tenkhoa'];
            	$array_content['C'.$indexRow] = $v['svko_du_dk']['tongso'];
            	$array_content['D'.$indexRow] = $v['svdu_dk']['tongso'];
            	$array_content['E'.$indexRow] = $v['heso'];
            	$array_content['F'.$indexRow] = $v['svdu_dk']['kqsv'];
            	$array_content['G'.$indexRow] = $v['diemTB'];
            	$indexRow++;
            }

            // Muốn thêm nội dung động thì foreach array push là xong.
            foreach($array_content as $key => $value){
            	$objPHPExcel->getActiveSheet()->setCellValue($key,$value);
            }

            // End chỉnh sửa nội dung
            // ob_end_clean();
            if (ob_get_contents()) ob_end_clean();

            header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: attachment;filename=".$filename.".xls");
            header("Cache-Control: max-age=0");

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit();
	    }

	    public function column_tieude($title, $tenkhoa){
            $data['header'] = array(
                'A1'            => 'TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI',
	        	'A2'            =>  $tenkhoa,
	        	'A4'            =>  $title,
            );
            $data['column'] = [
                'STT',
	        	'Mã SV',
	        	'Tên SV',
	        	'Ngày sinh',
	        	'Số điện thoại',
	        	'Tên Khoa',
	        	'Tổng số câu',
	        	'Số câu TL đúng',
	        	'Kết quả',
            ];
            return $data;
        }

        public function xxx(){
        	$filename 		= "DSSV".date("d/m/Y");
        	$title    		= "DSSV";
        	$subject  		= "DSSV";
        	$$title_active  = "DSSV";
        	$dulieu   		= 0;
        	$style    		= 'A5:H'.$dem;
        	$this->$xuatexcel($filename, $title, $subject, $title_active, $dulieu, $style);
        }
        public function xuatexcel(){
        	$array = array(
        		'title' 		=> 'Thống kê',
        		'subject' 		=> 'Thống kê',
        		'title_active' 	=> 'Thống kê danh sách sinh viên',
        		'dulieu'		=> array(),
        		'style'			=> array(),
        	);
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("Văn Lâm")
                                             ->setLastModifiedBy("Administrator")
                                             ->setTitle($array['title'])
                                             ->setSubject($array['subject']);
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Times new Roman')->setSize(13);


            /**********************************************************************
            ****************          FILE EXCEL 8.1               ****************
            ****************                                       ****************
            ***********************************************************************/
            $objPHPExcel->getActiveSheet()->setTitle($array['title_active']);
            $dem = count($array['dulieu'])+5;
            //Border
            $styleArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $objPHPExcel->getActiveSheet()->getStyle()->applyFromArray($styleArray);
            unset($styleArray);
            // Căn cỡ cột tự động
            foreach(range('A','Z') as $columnID){
                    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
            }

            // Căn cỡ hàng tự động
            foreach($objPHPExcel->getActiveSheet()->getRowDimensions() as $rd) {
                $rd->setRowHeight(-1);
            }

            $xuongdong  = 'A5:J'.$dem;

            //Xuống dòng
            $objPHPExcel->getActiveSheet()->getStyle()->getAlignment($xuongdong)->setWrapText(true);

            $merge = 'A3:D3';

            // Merge cell
             $array_merge = array($merge);
             foreach($array_merge as $cell){
                 $objPHPExcel->getActiveSheet()->mergeCells($cell);
            }

            $canngang = array();
            // Căn giữa ngang
             foreach($canngang as $cell){
                 $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            }
			$can_giua_doc = 'A1:J15';
            // Căn giữa dọc
            $array_vertical_center = array($can_giua_doc);
            foreach($array_vertical_center as $cell){
                $objPHPExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            }
            // In đậm
            $array_bold = array();
            foreach($array_bold as $cell){
                $objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setBold(true);
            }
            $in_nghieng = "";
            // In nghiêng
            $array_italic = array($in_nghieng);
            foreach($array_italic as $cell){
                $objPHPExcel->getActiveSheet()->getStyle($cell)->getFont()->setItalic(true);
            }
            // Chỉnh cỡ font
            $array_font_size = array();
            foreach($array_font_size as $key => $value){
                $objPHPExcel->getActiveSheet()->getStyle($key)->getFont()->setSize($value);
            }

            // Chỉnh cỡ cột
            $array_column = array();
            foreach($array_column as $key => $value){
                $objPHPExcel->getActiveSheet()->getColumnDimension($key)->setAutoSize(false);
                $objPHPExcel->getActiveSheet()->getColumnDimension($key)->setWidth($value);
            }

            //Chỉnh cỡ hàng fix cứng

            $array_row = array();
            foreach($array_row as $key => $value){
                $objPHPExcel->getActiveSheet()->getRowDimension($key)->setRowHeight($value);
            }

            // đổ dữ liệu từ đây
            
            $indexRow = 6;
         
            // Muốn thêm nội dung động thì foreach array push là xong.
            foreach($array_content as $key => $value){
                $objPHPExcel->getActiveSheet()->setCellValue($key,$value);
            }

            // End chỉnh sửa nội dung
            // ob_end_clean();
            if (ob_get_contents()) ob_end_clean();
            header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: attachment;filename=".$filename.".xls");
            header("Cache-Control: max-age=0");
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit();
        }
	    
	}
?>