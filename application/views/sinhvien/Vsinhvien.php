<link rel="stylesheet" type="text/css" href="{$url}public/css/sinhvientrangchu.css?v=1">
 <div class="container">
    <div class="row">
        <!-- sales area start -->
        <div class="col-xl-12 col-lg-12 mt-3 col-12-repone">
            <div class="card poster">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card card-title-lg animated " style="background: none;">
                                <div class="card-body">
                                    <h1 class="cuocthi-noidung text-center"><span class="cd-span1 ">Chào mừng 89 năm ngày thành lập<br> Đoàn TNCS Hồ Chí Minh (26/3/1931-26/3/2020)<br></span> <span class="cd-span1">Hướng tới Chào mừng Đại hội <br>Đảng bộ <span class="tdhm">Trường Đại học Mở Hà Nội lần thứ VII, nhiệm kỳ 2020-2025</span></span></h1>
                                   <!--  <p class="text-center" style=" margin-top: 20px;color: #eeef7d;font-size: 28px;text-transform: uppercase;"><span>Hệ thống đang trong quá trình thử nghiệm</span></p> -->
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-4">
                            <div class="card" style="background: none;">
                                <div class="card-body">
                                        <p class="text-center" style="color:#d3d3d3; text-transform: uppercase;"><span class="title-ct"></span></p>
                                    <div class="countdown" id="" data-end="2019/12/20 23:00:00">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="part days">
                                                    <div class="number1">00</div>
                                                    <div class="lb">Ngày</div>
                                                </div>
                                                <div class="part hours">
                                                    <div class="number2">00</div>
                                                    <div class="lb">Giờ</div>
                                                </div>
                                                <div class="part minutes">
                                                    <div class="number3">00</div>
                                                    <div class="lb">Phút</div>
                                                </div>
                                                <div class="part seconds">
                                                    <div class="number4">00</div>
                                                    <div class="lb">Giây</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-md-12 text-center">
                                                <a href="#dangky" class="btn btn-flat btn-primary thamgia"><span class="ti-widget"></span><span>&nbsp;&nbsp;Đăng ký</span></a>&nbsp;&nbsp; 
                                                <a href="DangNhap"  class="btn btn-flat btn-info thamgia"><span class="ti-user"></span><span>&nbsp;&nbsp;Đăng nhập</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 mt-3 reponsive-col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row rowtk">
                        <div class="col-lg-6 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title title-sadow">SỐ LƯỢT THÍ SINH THAM GIA THEO THỂ LỆ</h4>
                                    {$tt = 1}
                                    {foreach $sinhvienDT as $key => $val}
                                        {if $tt < 6}
                                            <div class="row mt-3">
                                                <div class="col-2 ">
                                                    <span class="{$val.mausac} btn ">
                                                       {$tt++} 
                                                    </span>
                                                </div>
                                                <div class="col-10 font-chu">
                                                    <p class="khoaxh khoatk"><span class="soSV">{$val.hesosv}&nbsp;</span> <span class="lammo">{if $val.tenkhoa !="Chi đoàn Cán bộ"}lượt dự thi{/if}</span> <span>{$val.tenkhoa}</span></p>
                                                </div>
                                            </div>
                                        {/if}
                                    {/foreach}
                                    <div class="row">
                                        <div class="col-12 text-center">
                                        <hr>
                                            <button type="button" class="btn btn-primary btn-flat btn-lg  btn-sm" data-toggle="modal" data-target="#xemthemkhoa">Xem thêm
                                            </button>
                                           <div class="modal fade show" id="xemthemkhoa">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Số lượt thí sinh thi tham gia theo theo thể lệ</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                                    </div>
                                                    <div class="col-12">
                                                        {$stt1 = 1}
                                                       {foreach $sinhvienDT as $key => $val}

                                                            <div class="row mt-3">
                                                                <div class="col-2 ">
                                                                    <span class="{$val.mausac} btn">
                                                                       {$stt1++} 
                                                                    </span>
                                                                </div>
                                                                <div class="col-10 font-chu text-left" >
                                                                    <p class="khoaxh khoatk"><span class="soSV">{$val.hesosv}&nbsp;</span> <span class="lammo">{if $val.tenkhoa !="Chi đoàn Cán bộ"}lượt dự thi{/if}</span> <span>{$val.tenkhoa}</span></p>
                                                                </div>
                                                            </div>
                                                        {/foreach}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title title-sadow">XẾP HẠNG THÍ SINH</h4>
                                    {$stt=1}
                                    {foreach $sinhvien_max as $key => $val}
                                        {if $stt <4}
                                        <div class="row mt-3 ">
                                            <div class="col-2 out-img-xh">
                                                <img src="{$url}public/images/{$val['huychuong']}">
                                                <span class="stt-xh">{$stt++}</span>
                                            </div>
                                            <div class="col-7 font-chu col-7-tenxh">
                                                <p class="tenxh" style="text-transform: capitalize;">{$val['sTenSV']}</p>
                                                <p class="khoaxh">{$val['tenkhoa']}</p>
                                                 <p style="font-size: 12px;">{$val.tongtg_chu}</p>
                                            </div>
                                            <div class="col-2 diemxh font-chu">
                                                {$val['ketqua']} Điểm
                                            </div>
                                        </div>
                                        {/if}
                                    {/foreach}
                                     <div class="row">
                                        <div class="col-12 text-center">
                                        <hr>
                                        {if $stt > 3}
                                            <button type="button" class="btn btn-primary btn-flat btn-lg  btn-sm" data-toggle="modal" data-target="#xemxemhang">Xem thêm
                                            </button>
                                        {/if}
                                           <div class="modal fade show" id="xemxemhang">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Xếp hạng của thí sinh</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                                    </div>
                                                    <div class="col-12">
                                                        {$stt=1}
                                                       {foreach $sinhvien_max as $key => $val}
                                                            <div class="row mt-3 ">
                                                                <div class="col-2 out-img-xh">
                                                                    <img src="{$url}public/images/{$val['huychuong']}" style="width: 62px;">
                                                                    <span class="stt-xh1 {($stt > 9) ? sobe : 'solon'}">{$stt++}</span>
                                                                </div>
                                                                <div class="col-7 font-chu col-7-tenxh">
                                                                    <p class="tenxh">{$val['sTenSV']}</p>
                                                                    <p class="khoaxh">{$val['tenkhoa']}</p>
                                                                    <p style="font-size: 12px;">{$val.tongtg_chu}</p>
                                                                </div>
                                                                <div class="col-2 diemxh font-chu">
                                                                    {$val['ketqua']} Điểm
                                                                </div>
                                                            </div>
                                                        {/foreach}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row -block d-sm-none bieudo">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title title-sadow">Thống kê tỉ lệ phần trăm các khoa</h4>
                            </div>
                            <div class="col-md-12 repon-bd">
                                <div id="ampiechart3"></div>
                            </div>
                                <div class="row chitietbieudo2">
                                    
                                </div>
                            <div class="col-12 tketong-re">
                                <img src="{$url}public/images/icon-thongke.png" alt="Thống kê tổng" class="imgtong"><span class="tktong">Thống kê tổng:<br></span> <strong class="tongsosvdt">{$tongluot} <span>sinh viên dự thi</span></strong>
                            </div>
                        </div>
                    </div>
                    <div class="row bieudo d-none d-sm-block">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title title-sadow">Thống kê tỉ lệ phần trăm các khoa</h4>
                            </div>
                        </div>
                        <div class="col-7 chitietbieudo">
                            <div class="row chitietbieudo1">
                            </div>
                            <div class="row mt-5" style="padding-left: 12px;">
                               <img src="{$url}public/images/icon-thongke.png" alt="Thống kê tổng"><span class="tktong">Thống kê tổng:</span> <strong class="tongsosvdt">{$tongluot} <span>lượt tham gia</span></strong>
                            </div>
                        </div>
                        <div class="col-sm-6 pie-fx">
                                <div id="ampiechart1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- sales area end -->
        <!-- timeline area start -->
        <div class="col-xl-4 col-lg-4 mt-3" id="dangky">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title title-sadow">Thông tin sinh viên</h4>
                    <span class="text-danger"></span>
                    <div class="ttsv">
                        <form method="post" onsubmit="return check()">
                            <div class="form-group">
                                <label>Mã sinh viên( <span class="text-center" style="color:#d3d3d3; font-size: 13px;">Mã SV đối với sinh viên | Số điện thoại đối với Chi đoàn Cán bộ)<strong class="text-red todo">*</strong></label>
                                <input type="text" id="masv" name="data[sMaSV]" class="form-control" value="" required >
                            </div>
                            <div class="form-group">
                                <label>Họ và tên <strong class="text-red todo">*</strong></label>
                                <input type="text" id="tensv" name="data[sTenSV]" class="form-control"  value="" required>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh <strong class="text-red">*</strong></label>
                                <input type="date" name="data[sNgaysinh]" class="form-control" id="ngaysinh" data-inputmask="'alias': 'dd/mm/yyyy'"    autocomplete="off"  required>
                            </div>
                            <div class="form-group">
                                <label>Đơn vị <strong class="text-red todo">*</strong></label>
                                <select name="data[FK_makhoa]" id="nganh" class=" form-control" required>
                                    <option disabled selected value="">----Chọn đơn vị----</option>
                                    {foreach $khoa as $val}
                                    <option value="{$val['makhoa']}" >{$val['tenkhoa']}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>SĐT <strong class="text-red todo">*</strong></label>
                                <input type="text" id="sdt" name="data[sSDT]" class="form-control"  value="" required>
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-red todo">*</span></label>
                                <input type="email" id="email" name="data[sEmail]" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu ( <span class="text-center" style="color:#d3d3d3; font-size: 13px;">Dùng để xem kết quả hoặc làm bài)</span><span class="text-red todo">*</span></label>
                                <input type="password" id="matkhau" name="matkhau" class="form-control" required>
                            </div>
                            <div class="form-group text-center" >
                                <button type="submit" class="btn btn-primary dangky" name="dangky" value="Đăng ký"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

 <input type="hidden" value="{$dsKhoa}" name="dskhoa">
 <script type="text/javascript">
    function check () {
        // 19C-41-11.0-000001
        masv        = $("#masv").val().length;
        hoten       = $("#tensv").val().length;
        sdt         = $("#sdt").val().length;
        ngaysinh    = $("#ngaysinh").val().length;
        email       = $("#email").val();
        khoa        = $("select[name='data[FK_makhoa]']").val();
        khoa  = $("option[value="+khoa+"]").text().split(" ")[0];
        if(khoa !='Khoa' && masv != 11 && masv != 10){
            toastr.error('Số điện thoại của cán bộ phải đúng 10 hoặc 11 kí tự');
            return false;
        }
        else if( khoa !='Chi' && masv != 11 && masv != 18){
            toastr.error('Mã sinh viên không đúng định dạng, xin vui lòng kiểm tra lại');
            return false;
        }
        else if( hoten < 8){
            toastr.error('Xin vui lòng nhập đầy đủ Họ và Tên');
            return false;
        }
        else if(ngaysinh != 10){
            toastr.error('Ngày sinh của bạn không đúng! Xin vui lòng kiểm tra lại');
            return false;
        }
        else if(sdt != 10 && sdt != 11){
            toastr.error('Số điện thoại không đúng! Xin vui lòng nhập lại');
            return false;
        }
        else if(khoa =='Chi' && (masv == 11 || masv == 10)){
            $("#sdt").val($("#masv").val());
        }else{
            setTimeout(function(){
                return true;
            },1000);
        }
    }
   $("select[name='data[FK_makhoa]']").change(function(event) {
        masv  = $("#masv").val().length;
        khoa  = $("select[name='data[FK_makhoa]']").val();
        khoa  = $("option[value="+khoa+"]").text().split(" ")[0];
        if(khoa !='Khoa' && masv != 11 && masv != 10){
        }else{
            $("#sdt").val($("#masv").val());
        }
        if(khoa =='Khoa'){
            $("#sdt").val("");
        }
   });
</script>
<style>
    .ttsv strong{
        color: red !important;
    }
</style>
<script src="{$url}assets/js/amcharts.js"></script>
<script src="{$url}assets/js/pie.js"></script>
<script src="{$url}assets/js/pie-chart.js?time={time()}"></script>
<script src="{$url}public/jquery/showTime.js?time={time()}"></script>
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
