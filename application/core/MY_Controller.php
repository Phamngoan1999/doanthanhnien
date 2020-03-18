<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
    protected $_session;
    protected $_manhom;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->model("Hethong/Mhethong");
        if (!empty($this->session->userdata('user'))){
            $this->_session = $this->session->userdata('user');
            // Không có session, đá về trang đăng nhập
            if(!isset($this->_session) || empty($this->_session))
            {
                redirect(base_url());
                exit();
            }
        }else{
            redirect(base_url());
            exit();
        }
    }

    public function getGroup(){
        $router = getSegment();
        $this->_manhom = $this->Mdangnhap->getManhomPL($router);
        return $this->_manhom;
    }


    public function insert($table, $data,  $success, $error, $redirect){
        $row = $this->Mhethong->insert($table, $data);
        if($row > 0){
            setMessages("success",$success, "Thông báo");
        }else{
            setMessages("error", $error, "Thông báo");
        } 
        return redirect($redirect);
    }

    public function update($table, $key, $ma, $data, $success, $error, $redirect){
        $row =  $this->Mhethong->update($table, $key, $ma, $data);
        if($row > 0){
            setMessages("success",$success, "Thông báo");
        }else{
            setMessages("error", $error, "Thông báo");
        } 
        return redirect($redirect);
    }

    public function delete($table, $key, $ma, $success, $error, $redirect){
        $row = $this->Mhethong->delete($table, $key, $ma);
        if($row > 0){
            setMessages("success",$success, "Thông báo");
        }else{
            setMessages("error",$error, "Thông báo");
        }
        return redirect($redirect);
    }
    
} // End class

