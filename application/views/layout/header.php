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
	<style>
		body{
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			-o-user-select: none;
			user-select: none;
		}
	</style>
	{/if}
</head>

<body class="body-bg">
	
	<div class="horizontal-main-wrapper">
		<div class="container">
			<div class="row align-items-center">
				<a href="{base_url()}"><img src="{$url}public/images/dang.jpg" alt="logo"></a>
			</div>
		</div>
		<!-- header area start -->
		<div class="header-area header-bottom">
			<div class="container">
				<div class="row align-items-center row-menu">
					<div class="col-lg-{if isset($session) && $session['maquyen'] == 1}9{else}6{/if}  d-none d-lg-block">
						<div class="horizontal-menu">
							<nav>
								<ul id="nav_menu">
									<li>
										<a href="{base_url()}"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home </span></a>
									</li>
									{if isset($session) && $session['maquyen'] == 1}
									<li>
										<a href="javascript:void(0)"><i class="fa fa-th-large"></i>&nbsp;Danh mục hệ thống &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
										<ul class="submenu">
											<li><a href="QuanLyThoiGianHeThong"><span class="ti-layout-grid4"></span>&nbsp; Thời gian truy cập hệ thống</a></li>
											<li><a href="XetThoiGian"><i class="fa fa-line-chart"></i>thiết lập thời gian </a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><i class="fa fa-th-large"></i>&nbsp;Câu hỏi &nbsp; <i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
										<ul class="submenu">
											<li><a href="TaoCauHoi">Tạo câu hỏi</a></li>
											<li><a href="NhomCauHoi">Nhóm câu hỏi</a></li>
										</ul>
									</li>
									<li><a href="XemChiTietBailam"><i class="fa fa-fw fa-gg"></i>&nbsp;&nbsp;Xem chi tiết bài làm sinh viên</a></li>
									
									<li><a href="DanhSachThongKe"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;Danh sách thống kê</a></li>
									{/if}
									
									<li class="active">
										<a href="HuongDan" target="blank"><i class="ti-layout-sidebar-left"></i><span>Hướng dẫn</span></a>
									</li>
									<li>
										<a href="{$url}TheLeCuocThi" target="blank"><i class="ti-pie-chart"></i><span>Thể lệ</span></a>
									</li>
									<li>
										<a href="{base_url('DangNhap')}#hotro"><i class="ti-pie-chart"></i><span>Liên Hệ Hỗ Trợ</span></a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="col-lg-{if isset($session) && $session['maquyen'] == 1}3{else}6{/if} clearfix">
						<div class="search-box">
							<div class="row">
								{if isset($session)}
								<div class="col-7 ttdn">
									<a><span class="ti-user"></span><span><span>&nbsp;&nbsp;{$session['sTenSV']} - {$session['tenkhoa']}</span></a> 
								</div>
								<div class="col-5 dangxuat">
									<a href="Logout"><span> Đăng xuất&nbsp; &nbsp;<span class="ti-arrow-circle-right"></span></span></a>
								</div>
								{/if}
							</div>
						</div>
					</div>
					<!-- mobile_menu -->
					<div class="col-12 d-block d-lg-none menu">
						<div id="mobile_menu"></div>
					</div>
				</div>
			</div>
		</div>
		
