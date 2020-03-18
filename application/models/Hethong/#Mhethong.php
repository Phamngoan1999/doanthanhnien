<?php 
	/**
	 * 
	 */
	class Mhethong extends MY_Model
	{
		 public function get_question($ques){
		 	if($ques != ""){
				$this->db->where('tbl_cauhoi.sMaCauhoi', $ques);
		 	}
			$this->db->from('tbl_cauhoi');
			$this->db->join('tbl_dapan','tbl_cauhoi.sMaCauhoi = tbl_dapan.sMaCauhoi', 'inner');
			$this->db->order_by('iStt', 'asc');
			return $this->db->get()->row_array();
		}
		public function get_Group_Question($manhom){
			$this->db->where('tbl_nhomcauhoi.sMaNhom', $manhom);
			$this->db->from('tbl_cauhoi');
			$this->db->join('tbl_dapan','tbl_cauhoi.sMaCauhoi = tbl_dapan.sMaCauhoi', 'inner');
			$this->db->join('tbl_nhomcauhoi','tbl_nhomcauhoi.sMaNhom = tbl_cauhoi.sMaNhom_CauHoi', 'inner');
			$this->db->order_by('iStt', 'asc');
			return $this->db->get()->result_array();
		}

		public function check_CauHoi($macauhoi){
			$this->db->where_in('sMacauhoi', $macauhoi);
			$this->db->from('tbl_ketqua_sv');
			return $this->db->get()->result_array();
		}

		public function getSV_LamBai($makhoa){
			$this->db->from('tbl_sinhvien');
			$this->db->where('tbl_sinhvien.FK_makhoa', $makhoa);
			$this->db->where('tbl_sinhvien.sMaSV !=', "admin");
			$this->db->order_by("SUBSTRING(`sTenSV`, CHAR_LENGTH(SUBSTRING_INDEX(`sTenSV`,' ',CHAR_LENGTH(`sTenSV`)- CHAR_LENGTH(REPLACE(`sTenSV`,' ','')))) + 1)");
			return $this->db->get()->result_array();
		}

		public function xemCT_SV($masv){
			$this->db->from('tbl_ketqua_sv');
			$this->db->where('tbl_ketqua_sv.sMaSV', $masv);
			$this->db->join('tbl_cauhoi','tbl_cauhoi.sMaCauhoi = tbl_ketqua_sv.sMaCauhoi', 'inner');
			$this->db->join('tbl_dapan','tbl_dapan.sMaCauhoi = tbl_cauhoi.sMaCauhoi', 'inner');
			return $this->db->get()->result_array();
		}

		public function getSV_Khoa($makhoa, $trangthai){
			$this->db->select("count(sMaSV) as tongso, sum(ketqua) as kqsv");
			$this->db->from('tbl_sinhvien');
			$this->db->where('tbl_sinhvien.trangthai_lambai', $trangthai);
			$this->db->where('tbl_sinhvien.FK_makhoa', $makhoa);
			return $this->db->get()->row_array();
		}

		public function ThongKeSV_TheoKhoa($makhoa){
			$this->db->from('tbl_sinhvien');
			$this->db->where('tbl_sinhvien.FK_makhoa', $makhoa);
			$this->db->where('tbl_sinhvien.sMaSV !=', "admin");
			$this->db->order_by("tbl_sinhvien.ketqua", "DESC");
			$this->db->order_by("SUBSTRING(`sTenSV`, CHAR_LENGTH(SUBSTRING_INDEX(`sTenSV`,' ',CHAR_LENGTH(`sTenSV`)- CHAR_LENGTH(REPLACE(`sTenSV`,' ','')))) + 1)");
			return $this->db->get()->result_array();
		}
		public function ThongKeSV_CaoNhat($sosv){
	    	$this->db->where("tbl_sinhvien.trangthai_lambai", 1);
	    	$this->db->join("tbl_khoa", "tbl_sinhvien.FK_makhoa = tbl_khoa.makhoa", "inner");
	    	// $this->db->order_by("tbl_sinhvien.ketqua", "DESC");
	    	$this->db->order_by("CAST(tbl_sinhvien.ketqua AS DECIMAL(5,2)) DESC, (UNIX_TIMESTAMP(tbl_sinhvien.dtTgianKetthuc)- UNIX_TIMESTAMP(tbl_sinhvien.dtTgianBatdau)) ASC");
			$this->db->order_by("SUBSTRING(`sTenSV`, CHAR_LENGTH(SUBSTRING_INDEX(`sTenSV`,' ',CHAR_LENGTH(`sTenSV`)- CHAR_LENGTH(REPLACE(`sTenSV`,' ','')))) + 1)");
	    		$this->db->limit($sosv);
	    	$sinhvien = $this->db->get("tbl_sinhvien")->result_array();
	    	return $sinhvien;
		}

		public function ThongKeSV_Tong(){
	    	$this->db->where("tbl_sinhvien.sMaSV !=", 'admin');
	    	$this->db->join("tbl_khoa", "tbl_sinhvien.FK_makhoa = tbl_khoa.makhoa", "inner");
	    	$this->db->order_by("SUBSTRING(tbl_khoa.tenkhoa, CHAR_LENGTH(SUBSTRING_INDEX(tbl_khoa.tenkhoa,' ',CHAR_LENGTH(tbl_khoa.tenkhoa)- CHAR_LENGTH(REPLACE(tbl_khoa.tenkhoa,' ','')))) + 1)");
	    	$this->db->order_by("tbl_sinhvien.ketqua", "DESC");
	    	$sinhvien = $this->db->get("tbl_sinhvien")->result_array();
	    	return $sinhvien;
		}
		public function getNHOM_cH_SV($manhom){
	    	$this->db->where("tbl_cauhoi.sMaNhom_CauHoi", $manhom);
	    	$this->db->join("tbl_ketqua_sv", "tbl_cauhoi.sMaCauhoi = tbl_ketqua_sv.sMaCauhoi", "inner");
	    	$sinhvien = $this->db->get("tbl_cauhoi")->result_array();
	    	return $sinhvien;
		}
		public function get_CauHoi($manhom, $socauhoi)
	    {
	    	$this->db->where("tbl_nhomcauhoi.sMaNhom", $manhom);
	        $this->db->from('tbl_cauhoi');
	        $this->db->join('tbl_dapan','tbl_cauhoi.sMaCauhoi = tbl_dapan.sMaCauhoi','inner');
	        $this->db->join('tbl_nhomcauhoi','tbl_cauhoi.sMaNhom_CauHoi = tbl_nhomcauhoi.sMaNhom','inner');
	        $this->db->order_by('tbl_cauhoi.sMaCauhoi', 'RANDOM');
	        // $this->db->order_by('tbl_dapan.sMaDapan', 'RANDOM');
	        $this->db->limit($socauhoi);
	        return $this->db->get()->result_array();
	    }
	    public function get_nhomCH(){
	    	$this->db->order_by('tbl_nhomcauhoi.sMaNhom', 'RANDOM');
	    	$result = $this->db->get("tbl_nhomcauhoi")->result_array();
	    	return $result;
	    }
	}
 ?>