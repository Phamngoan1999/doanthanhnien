 <div class="container">
    <div class="row">
        <div class="col-lg-4 mt-5 pd-0-re d-block d-sm-none hiendau">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title title-sadow">Bảng xếp hạng cuộc thi</h4>
                    {$stt=1}
                    {foreach $sinhvien_max as $key => $val}
                    <div class="row mt-3 ">
                        <div class="col-2 out-img-xh">
                            <img src="{$url}public/images/{$val['huychuong']}">
                            <span class="stt-xh">{$stt++}</span>
                        </div>
                        <div class="col-7 font-chu col-7-tenxh">
                            <p class="tenxh">{$val['sTenSV']}</p>
                            <p class="khoaxh">{$val['tenkhoa']}</p>
                        </div>
                        <div class="col-2 diemxh font-chu">
                            {$val['ketqua']} Điểm
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <div class="col-lg-8 mt-5 pd-0-re">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="header-title title-sadow-left">Thông tin</h4> -->
                    <div class="row rowluuy">
                        <div class="col-12 text-center">
                              <h4 class="header-title text-center title-wel-sv">Chào mừng Sinh Viên<br ><span class="toxanhTen" style="text-transform: capitalize;">{$session['sTenSV']}</span> <br> Đến với cuộc thi trực tuyến <br>
                                Tuổi trẻ Trường Đại học Mở Hà Nội <br> Sắt son niềm tin với Đảng
                              </h4>
                        </div>
                      <div class="col-sm-12 text-center">
                          <h5 style="color:#999797" class="batdaulambai1">
                              Hãy bắt đầu làm bài đi nào. Bằng cách Click vào Bắt đầu làm bài
                          </h5>
                      </div>
                        <div class="col-sm-12 text-center">
                            <hr> 
                            <form method="post">
                                <button type="submit" name="batdaulambai" value="lambai" class="btn btn-lg btn-rounded btn-info mb-3 batdaulambai">Bắt đầu làm bài &nbsp;<span class="round"><i class="fa fa-chevron-right"></i></span></button>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Statistics area end -->
        <!-- Advertising area start -->
        <div class="col-lg-4 mt-5 pd-0-re hiensau d-none d-md-block d-lg-block d-xl-block">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title title-sadow">Bảng xếp hạng cuộc thi</h4>
                    {$stt=1}
                    {foreach $sinhvien_max as $key => $val}
                    <div class="row mt-3 ">
                        <div class="col-2 out-img-xh">
                            <img src="{$url}public/images/{$val['huychuong']}">
                            <span class="stt-xh soXH">{$stt++}</span>
                        </div>
                        <div class="col-7 font-chu col-7-tenxh">
                            <p class="tenxh">{$val['sTenSV']}</p>
                            <p class="khoaxh">{$val['tenkhoa']}</p>
                        </div>
                        <div class="col-2 diemxh font-chu">
                            {$val['ketqua']} Điểm
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
 </div>
 <link rel="stylesheet" type="text/css" href="{$url}public/css/sinhvientrangchu.css?v=1">
 <style>
     .soXH{
        font-size: 26px;
        left: 31px;
        top: 13px;
     }
 </style>
