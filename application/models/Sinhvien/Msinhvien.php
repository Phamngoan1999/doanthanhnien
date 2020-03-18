<?php 
	/**
	 * 
	 */
	class Msinhvien extends MY_Model
	{
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

	     public function setTraloi($masv,$mang)
	    {
	    	$this->db->trans_start();
	    	try {
	    		$this->db->where('sMaSV',$masv);
	    		$this->db->delete('tbl_ketqua_sv');
	    		$this->db->insert_batch('tbl_ketqua_sv',$mang);
	    		$row = $this->db->affected_rows();
	    		if($row <= 0 ){
	    			return $this->db->last_query();
	    		}
	    	} catch (Exception $e) { 
	    		$row = 0;
	    	}
	    	$this->db->trans_complete(); 
	    	return $row;
	    }

	    public function getKetquaSV($masv){
	    	$this->db->where('tbl_ketqua_sv.sMaSV', $masv);
	    	$this->db->from('tbl_cauhoi');
	    	$this->db->join('tbl_ketqua_sv','tbl_cauhoi.sMaCauhoi = tbl_ketqua_sv.sMaCauhoi','inner');
	    	return $this->db->get()->result_array();
	    }
	    public function get_svDiemMax(){
	    	$this->db->select("tbl_sinhvien.sTenSV, tbl_sinhvien.dtTgianBatdau, tbl_sinhvien.dtTgianKetthuc, tbl_khoa.tenkhoa, tbl_sinhvien.ketqua");
	    	$this->db->where("tbl_sinhvien.trangthai_lambai", 1);
	    	$this->db->join("tbl_khoa", "tbl_sinhvien.FK_makhoa = tbl_khoa.makhoa", "inner");
	    	$this->db->where("UNIX_TIMESTAMP(tbl_sinhvien.dtTgianKetthuc)- UNIX_TIMESTAMP(tbl_sinhvien.dtTgianBatdau) <=", 1505);
	    	// $this->db->order_by("tbl_sinhvien.ketqua", "DESC");
	    	$this->db->order_by("CAST(tbl_sinhvien.ketqua AS DECIMAL(5,2)) DESC, (UNIX_TIMESTAMP(tbl_sinhvien.dtTgianKetthuc)- UNIX_TIMESTAMP(tbl_sinhvien.dtTgianBatdau)) ASC");
	    	$this->db->limit(30);
	    	$sinhvien = $this->db->get("tbl_sinhvien")->result_array();
	    	// pr($this->db->last_query());
	    	return $sinhvien;
	    	// pr($sinhvien);
	    }

	    public function get_nhomCH1(){
	    	$this->db->select("SUM(`soCH_Random`) as tongsoCH");
	    	$result = $this->db->get("tbl_nhomcauhoi")->row_array();
	    	return $result;
	    }

	    public function get_nhomCH(){
	    	$this->db->order_by('tbl_nhomcauhoi.sMaNhom', 'RANDOM');
	    	$result = $this->db->get("tbl_nhomcauhoi")->result_array();
	    	return $result;
	    }
	    
	
	}
 ?>