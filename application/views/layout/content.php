<?php
	$data['title'] = "Cuộc thi trực tuyến - Tuổi trẻ Trường Đại Học Mở Hà Nội";
	$data['url'] 	= base_url();
	$data['message'] = getMessages();
    date_default_timezone_set('Asia/Bangkok');
	if(!empty($this->session->get_userdata('user')['user'])){
		$data['session'] = $this->session->get_userdata('user')['user'];

		$result = checkPermission($data['session']['maquyen'], getSegment());
		if (!$result){
			$this->session->sess_destroy();
			redirect(base_url().'403_Forbidden');
		}
	}
	$this->parser->parse('layout/header', $data);
	$this->parser->parse($template, $data);
	$this->parser->parse('layout/footer', $data);
 ?>