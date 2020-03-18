<?php 
	/**
	 * summary
	 */
	class Cketquasinhvien extends MY_Controller
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
	    	$session  = $this->session->userdata("user");
	    	$sinhvien = $this->Msinhvien->get_where_row('tbl_sinhvien', 'sMaSV', $session['sMaSV']);
	    	$sinhvien['tongtg_chu'] = $this->secondsToTime1(strtotime($sinhvien['dtTgianKetthuc'] ) - strtotime($sinhvien['dtTgianBatdau'] ));
	    	$sinhvien['tb']     = strtotime($sinhvien['dtTgianKetthuc'] ) - strtotime($sinhvien['dtTgianBatdau']);
			if($sinhvien['tb'] > 1505){
				$sinhvien['ketqua'] 	= "Không điểm";
				$sinhvien['iSocaudung'] = "0";
			}
	    	$sinhvien['tongsocau'] = explode("/", $sinhvien['iSocautraloi'])[1];
	    	$temp = array(
	    		'template' => 'sinhvien/Vketqua',
	    		'data'     => array(
	    			'message' 	 => getMessages(),
	    			'sinhvien'	 => $sinhvien,
	    		),
	    	);
        	$this->load->view('layout/content', $temp);
	    }
	    function secondsToTime1($seconds) {
		    $dtF = new \DateTime('@0');
		    $dtT = new \DateTime("@$seconds");
		    return $dtF->diff($dtT)->format('%i minutes and %s seconds');
		}
	}
 ?>