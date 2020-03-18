<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Hệ thống*/
$route['CanBo'] 					= 'Hethong/Ccanbo';
$route['TaoCauHoi'] 				= 'Hethong/Ctaocauhoi';
$route['XetThoiGian'] 				= 'Hethong/Cxetthoigian';
$route['DanhSachThongKe'] 			= 'Hethong/Cdanhsachthongke';
$route['XemChiTietBailam'] 			= 'Hethong/Cxemchitiet';
$route['QuanLyThoiGianHeThong'] 	= 'Hethong/Cthoigianhethong';
$route['ImportSinhVien'] 			= 'Hethong/CimportSinhVien';
$route['KhenThuongSinhVien'] 		= 'Hethong/Ckhenthuongsinhvien';
$route['Logout'] 					= 'Clogin/logout';
$route['NhomCauHoi'] 				= 'Hethong/Ctaocauhoi/DanhSachCauHoi';
$route['DangNhap'] 					= 'Hethong/Cdangnhap';
$route['ThietLapCauHoi'] 			= 'Hethong/Ctaocauhoi/ThietLapCauhoi';
$route['TheLeCuocThi'] 			    = 'Hethong/Cthele';
$route['HuongDan'] 			    	= 'Hethong/Cthele/huongdan';

/*End Hệ thống*/
$route['TrangChu'] 					= 'Hethong/Ctrangchu';
/*Sinh viên*/
$route['KetQuaSinhVien'] 			= 'sinhvien/Cketquasinhvien';
$route['SinhVien'] 		 			= 'sinhvien/Csinhvien';
$route['SinhVienLamBai']    		= 'sinhvien/Clambai';
/*end Sinh viên*/
$route['login'] = 'Clogin';
// $route['login1'] = 'Clogin';
$route['default_controller'] 	= 'Clogin';
$route['403_Forbidden'] 		= 'C403';
$route['404'] 					= 'C404';
$route['404_override'] 			= 'C404';
$route['translate_uri_dashes'] = FALSE;
