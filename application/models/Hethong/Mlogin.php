<?php 
	/**
	 * 
	 */
	class Mlogin extends MY_Model
	{
		public function insert_sv($data, $taikhoan){
			$this->db->where("sMaSV", $data['sMaSV']);
			$this->db->or_where("sEmail", $data['sEmail']);
			$this->db->or_where("sSDT", $data['sSDT']);
			$kq = $this->db->get("tbl_sinhvien")->row_array();
			if(!empty($kq)){
				return "Thông tin sinh viên của bạn đã được đăng ký trên hệ thống!";
			}else{
				$this->db->insert("tbl_sinhvien", $data);
				$this->db->insert("tbl_taikhoan", $taikhoan);
				return $this->db->affected_rows();
			}
		}

		public function insert_taikhoan($data){
			$this->db->insert("tbl_taikhoan", $data);
			return $this->db->affected_rows();
		}
		public function tongsoSV_DT(){
			$this->db->select("count(sMaSV) as tongsoSV");
	    	$this->db->where("tbl_sinhvien.trangthai_lambai", 1);
			return $this->db->get("tbl_sinhvien")->row_array();
		}
		public function checkPermission($maquyen, $segment){
	 		if($maquyen==1){
	 			return true;
	 		}else{
	 			$this->db->where('tbl_chucnang.route', $segment);
		        $this->db->where('tbl_chucnang.maquyen', $maquyen);
		        $this->db->from('tbl_chucnang');
		        $result =  $this->db->get()->num_rows();
		        return $result > 0 ? true : false;
	 		}
    	}

    	public function checksv($taikhoan,$matkhau){
			$this->db->where('tbl_taikhoan.sEmail', $taikhoan);
			$this->db->where('tbl_taikhoan.sMatkhau', $matkhau);
			$this->db->from('tbl_taikhoan');
			$this->db->join('tbl_quyen', 'tbl_taikhoan.iMaQuyen = tbl_quyen.iMaQuyen','inner');
			$this->db->join('tbl_sinhvien', 'tbl_taikhoan.sMaSV = tbl_sinhvien.sMaSV','inner');
			return $this->db->get()->row_array();
		}

		public function getSV($masv){
			$this->db->where('tbl_sinhvien.sMaSV', $masv);
			$this->db->from('tbl_sinhvien');
			return $this->db->get()->row_array();
		}
		public function get_svDiemMax(){
	    	$this->db->select("tbl_sinhvien.sTenSV, tbl_sinhvien.dtTgianBatdau, tbl_sinhvien.dtTgianKetthuc, tbl_khoa.tenkhoa, tbl_sinhvien.ketqua");
	    	$this->db->where("tbl_sinhvien.trangthai_lambai", 1);
	    	$this->db->join("tbl_khoa", "tbl_sinhvien.FK_makhoa = tbl_khoa.makhoa", "inner");
	    	// $this->db->order_by("tbl_sinhvien.ketqua", "DESC");
	    	$this->db->order_by("CAST(tbl_sinhvien.ketqua AS DECIMAL(5,2)) DESC, (UNIX_TIMESTAMP(tbl_sinhvien.dtTgianKetthuc)- UNIX_TIMESTAMP(tbl_sinhvien.dtTgianBatdau)) ASC");
	    	$this->db->limit(30);
	    	$sinhvien = $this->db->get("tbl_sinhvien")->result_array();
	    	// pr($this->db->last_query());
	    	return $sinhvien;
	    	// pr($sinhvien);
	    }
	    public function get_Khoa(){
	    	$this->db->order_by("(heso*soSV_DuThi)","DESC");
	    	return $this->db->get("tbl_khoa")->result_array();
	    }
	    public function getSV_Khoa($makhoa, $trangthai){
			$this->db->select("count(sMaSV) as tongso");
			$this->db->from('tbl_sinhvien');
			$this->db->where('tbl_sinhvien.trangthai_lambai', $trangthai);
			$this->db->where('tbl_sinhvien.FK_makhoa', $makhoa);
			return $this->db->get()->row_array();
		}

	}
 ?>