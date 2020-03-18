<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Cuộc thi trực tuyến - Tuổi trẻ Trường Đại Học Mở Hà Nội - Sắt Son Niềm Tin với Đảng</title>
	<base href="{base_url()}" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
	<link rel="shortcut icon" type="image/png" href="{$url}public/images/DV01.png">
	<link rel="stylesheet" href="{$url}assets/css/bootstrap.min.css">
	<script src="{$url}public/jquery/jquery.js"></script>
	<link rel="stylesheet" href="{$url}assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="{$url}assets/css/themify-icons.css">
	<link rel="stylesheet" href="{$url}assets/css/metisMenu.css">
	<link rel="stylesheet" href="{$url}assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{$url}assets/css/slicknav.min.css">
	<!-- amchart css -->
	<link rel="stylesheet" href="{$url}assets/css/export.css" type="text/css" media="all" />
	<!-- others css -->
	<link rel="stylesheet" href="{$url}assets/css/typography.css">
	<link rel="stylesheet" href="{$url}assets/css/default-css.css">
	<link rel="stylesheet" href="{$url}assets/css/styles.css">
	<link rel="stylesheet" href="{$url}assets/css/responsive.css">
	<!-- font chữ -->
	<link href="https://fonts.googleapis.com/css?family=Arima+Madurai&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

	<!-- end font -->
	<!-- Lâm -->
	<script src="{$url}assets/js/vendor/modernizr-2.8.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{$url}public/css/style.css?v=1">
	<link rel="stylesheet" type="text/css" href="{$url}public/css/animate.css">
	<link rel="stylesheet" href="{$url}public/plugin/timepicker/bootstrap-timepicker.min.css">
	<link href="{$url}public/plugin/bootstrap-datepicker.min.css" rel="stylesheet">
	<!-- Thông báo -->
	<link rel="stylesheet" type="text/css" href="{$url}public/Toastr/toastr.css">
	<script type="text/javascript" src="{$url}public/Toastr/tienganh.js"></script>
	<script type="text/javascript" src="{$url}public/Toastr/toastr.js"></script>
	<!-- select2 -->
	<link rel="stylesheet" href="{$url}public/select2-bootstrap4-theme/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{$url}public/select2-bootstrap4-theme/css/select2-bootstrap4.css">
	<!-- select2 -->
	<script src="{$url}public/select2-bootstrap4-theme/js/select2.min.js"></script>
	<!-- select2-bootstrap4-theme -->
	<script src="{$url}public/select2-bootstrap4-theme/js/script.js"></script>
	<!-- js -->
	<script type="text/javascript" src="{$url}public/jquery/jstop.js?time={time()}"></script>
	<script src="{$url}public/plugin/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="{$url}public/plugin/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{$url}public/css/theme-default.css">
	<link rel="stylesheet" type="text/css" href="{$url}public/css/responsive.css?v=1">
	
	<!-- Start datatable js -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	{if isset($session) && $session['maquyen'] != 1}
	<script src="{$url}public/jquery/chongchuotphai.js"></script>
	{/if}
	<style>
		body{
			font-family: initial !important;
		}
		table, tr, th, td {
			margin: 5px;
			border-collapse: collapse;
	  		border: 1px solid #020202!important;
			font-size: 15px;
		}
		table tr th, table tr td {
		    border-top: 1px solid #141414 !important;
		}
		table tr th{
			text-align: center;
		}
		#canchinh{
			width:100%;
			line-height: 25px;
			border-top: 1px solid #020202!important;
			font-size: 15px; 
		}
		h2{
			font-family: initial;
		}
		.tieude{
			margin: 20px;
		}
		p{
			font-family: initial; 
			font-size: 20px;
		}
	</style>
</head>
<body>
	