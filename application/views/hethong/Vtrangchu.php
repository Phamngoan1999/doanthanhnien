<div id="main_lambai">
    <div class="col-md-12 sinhvien">
        <div class="col-md-12 ttsvv ">
            <div class="col-md-2 text-center main-ttsv">
                <p class="ttsv"><span style=""><b> Mã sinh viên</b></span> </p>
                <p>17A10010216</p>
            </div>
            <div class="col-md-3 text-center main-ttsv">
                <p class="ttsv"><span style=""><b> Họ và Tên</b></span> </p>
                <p>
                    Nguyễn Văn Lâm
                </p>
            </div>
            <div class="col-md-2 text-center main-ttsv">
                <p class="ttsv"><span style=""><b> Ngày sinh</b></span> </p>
                <p class="text-center">
                    02/10/1999
                </p>

            </div>
            <div class="col-md-4 text-center main-ttsv">
                <p class="ttsv">
                	<span style=""> <b>Khoa</b></span> 
	               
	            </p>
                <p>
                    Công Nghệ Thông Tin
                </p>
            </div>
            <div class="col-md-1 text-center main-ttsv">
            	<p>
                   <a id="logout"><i class="fa  fa-sign-out"></i>&nbsp;Đăng xuất</a>
                </p>
            	<!-- <span class="text-right" style="position: absolute; top: 0;right: -107px;font-size: 20px;">
	                    
	            </span> -->
            </div>
        </div>
    </div>
    <div class="welcome-container container-fluid">
    	<div class="row">
	    	<div class="container"><marquee>Chào mừng bạn đến với cuộc thi : "Tìm hiểu về tư tưởng Hồ Chí Minh, Chủ nghĩa Mác Lênin và lịch sử Đảng Cộng sản Việt Nam - "đoàn thanh niên hồ chí minh"</marquee>
	    	</div>
    	</div>
    </div>
    <div class="container main">
        <div class="container side-bar">
            <div class="col-md-12">
                <div class="pr-a-title text-center">
                    <h1><span class="title-lambai">ĐOÀN THANH NIÊN CỘNG SẢN HỒ CHÍ MINH</span></h1>
                    <p class="td2">Tìm hiểu về tư tưởng Hồ Chí Minh, Chủ nghĩa Mác Lênin và lịch sử Đảng Cộng sản Việt Nam</p>
                </div>
            </div>
            <div class="text-center hidden">
                <div class="col-md-12">
                  <div class="type-2 text-center">
                    <button class="btn btn-2" onclick="location.href='{$url}lambai';">
                      <span class="txt">Bắt đầu làm bài</span>
                      <span class="round"><i class="fa fa-chevron-right"></i></span>
                    </button>
                  </div>
                </div>
            </div>
            <div class="col-md-12">
            	{for $i=1 to 50}
            	<div class="col-md-12 cauhoi" style="text-align: justify;">
            		<div class="row form-group">
            			<p><strong>Câu {$i} : Chọn cụm từ đúng điền vào chỗ trống trong câu viết sau đây của Hồ Chí Minh:"Toàn quốc đồng bào hãy đứng dậy.... mà tự giải phóng cho ta".</strong></p>
            			<div class="col-md-6 col-xs-12">
            				<div class="radio radio-primary">
			            		<input type="radio" name="radio{$i}" id="a{$i}" value="option{$i}">
			            		<label for="a{$i}"> A. dựa vào sự giúp đỡ quốc tế</label>
			            	</div>
            			</div>
            			<div class="col-md-6 col-xs-12">
			            	<div class="radio radio-primary">
			            		<input type="radio" name="radio{$i}" id="b{$i}" value="option{$i}">
			            		<label for="b{$i}">B. dựa vào sự đoàn kết toàn dân</label>
			            	</div>
            			</div>
            			<div class="col-md-6 col-xs-12">
            				<div class="radio radio-primary">
			            		<input type="radio" name="radio{$i}" id="c{$i}" value="option{$i}">
			            		<label for="c{$i}"> C. dưới sự lãnh đạo của Đảng</label>
			            	</div>
            			</div>
            			<div class="col-md-6 col-xs-12">
            				<div class="radio radio-primary">
			            		<input type="radio" name="radio{$i}" id="d{$i}" value="option{$i}">
			            		<label for="d{$i}"> D. đem sức ta</label>
			            	</div>
            			</div>
            		</div>
            	</div>
            	{/for}
            </div>
          
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="{$url}public/css/ttsv.css">

<style type="text/css">
	.sinhvien{
		box-shadow: 0px 0px 10px 0px #ccc;
		position: absolute;
		top: 0;
		padding: 10px;
		background-image: url("public/images/hoisvhou.png");
	}
	.welcome-container{
	    background: #006dbafa;
	    margin-top: 91px;
	    margin-bottom: 11px;
	}
	marquee{
		 margin-top: 11px;
	    color: #ffff;
	    padding: 4px;
	    font-weight: bold;
	}
	.title-lambai{
		color: #4b68be;
	    font-weight: bold;
	    font-family: none;
	    /*border-bottom: 1px solid;*/
	}
	.td2 {
	    font-size: 17px;
	    color: #a0afdb;
	    padding-bottom: 30px;
	}
	.cauhoi{
		/*font-family: "Times New Roman";*/
	}
</style>
