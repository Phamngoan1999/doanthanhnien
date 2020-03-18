
<div class="container-fluid" id="main-kq" style="min-height: 300px; padding: 65px;">
   
    <!-- <header class="header">
        <div class="row">
            <div class="col-4 text-right">
                <img src="{$url}public/images/doan.png">
            </div>
            <div class="col-4 text-center">  
                 <img src="{$url}public/images/207.png" class="img_kq"><br>
            </div>
            <div class="col-4 text-left">
                 <img src="{$url}public/images/hsv.png">
            </div>
        </div>
    </header> -->
    <section class="container content">
        <div class="row row-content">
            <div class="col-12 text-center animated fadeInLeft">
                <p><span  class="thongbao">CHÚC MỪNG BẠN <br class="d-none hienthi"><span class="name-kq">{$session['sTenSV']}</span> <span class="d-block d-sm-none"><br>ĐÃ HOÀN THÀNH BÀI THI</span></p>
            </div>

          <!--   <div class="col-12 text-center animated fadeInRightBig">
                <p><span class="title-tb">CUỘC THI TRỰC TUYẾN </span></p>
                <p><span class="title-tb">TUỔI TRẺ TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI SẮT SON NIỀM TIN VỚI ĐẢNG</span></p>
                <p><span class="title-tb"></span></p>
            </div> -->
            <div class="col-12 text-center">
                 <div class="col-12 text-center animated fadeInLeft">
                    <div class="banner1" id="demo3"> 
                         <span align="center">
                            <img >
                         </span>
                          <span align="center">
                            <img >
                         </span>
                          <span align="center">
                            <img >
                         </span>
                          <span align="center">
                            <img >
                         </span>
                    </div>
                </div>
                <p><span class="title-tb-tg">THỜI GIAN BĐ <span class="hidden-xs">LÀM BÀI</span>: {date('d/m/Y - H:i:s', strtotime($sinhvien['dtTgianBatdau']))}</span></p>
                <p>
                <span class="title-tb-tg">THỜI GIAN KT <span class="hidden-xs">BÀI LÀM</span>: {date('d/m/Y - H:i:s', strtotime($sinhvien['dtTgianKetthuc']))} </span>
                </p>
                {if $sinhvien['tb'] >1505}
                    <p class="tb">Bạn đã vượt quá thời gian làm bài nên không được tính điểm!</p>
                {/if}
                 <p>
                <span class="title-tb-tg">TỔNG SỐ CÂU ĐÚNG: {$sinhvien['iSocaudung']} / {$sinhvien['tongsocau']}</span>
               <!--  <span class="title-tb-tg">TỔNG THỜI GIAN LÀM BÀI: {$sinhvien['tongtg_chu']}</span> -->
                </p>
                <p class="kqq"><span class="title-tb-tg">ĐIỂM SỐ: {$sinhvien['ketqua']}</span>
                </p>
                <div class="col-12 text-center animated fadeInLeft">
                    <div class="banner1" id="demo2"> 
                         <p align="center">
                            <img >
                         </p>
                    </div>
                </div>
    </section>
  <!--   <div id="main-login" class="container-fluid " style="background:#fff">
        <div class="col-4 offset-md-4 bsw-btn hidden  text-center diemso" style="font-size: 30px;font-weight: bold;">
           <span></span><span></span><span></span>
            <b class='fter ' >ĐIỂM SỐ CỦA BẠN</b>
           <br><b>{$sinhvien['ketqua']} ĐIỂM</b>
       </div>
    </div> -->
</div>
<link rel="stylesheet" type="text/css" href="{$url}public/css/ketqua.css">
<link rel="stylesheet" type="text/css" href="{$url}public/css/hieuung.css">
<script src="{$url}public/css/xteam_fireworks.min.js" type="text/javascript"></script>
<style>
    .tb{
        color: #f7ea45;
        text-shadow: none !important;
        font-weight: bold;
    }

</style>
<script>
         jQuery(function($){
            var firework = Xteam.fireworkShow('#demo1', 400);
            var firework = Xteam.fireworkShow('#demo2', 400);
            var firework = Xteam.fireworkShow('#demo3', 400);
         }
         );
</script>