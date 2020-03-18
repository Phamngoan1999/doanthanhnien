<div class="container" id="dangnhap-sv">
	<div class="row row-dnsv">
		<div class="col-lg-4 offset-md-4 mt-3 out-dn">
			<h3 class="text-center dangnhapht"><img src="{$url}public/images/locked.png" alt=""> &nbsp; &nbsp; Đăng nhập hệ thống</h3>
			<p class="ttdn">Thông tin đăng nhập</p>
			<form method="post">
				<div class="input-group mb-2">
					<input type="text" class="form-control" placeholder="Email..." name="username" required>
					<div class="input-group-append">
						<span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
					<div class="input-group-append">
						<span class="input-group-text" id="basic-addon2"><i class="fa fa-key" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="col-6">
						<a href="{base_url()}" class="btn btn-secondary btn-xs btn-block mb-3"><i class="fa fa-reply-all" aria-hidden="true"></i>&nbsp;Thoát</a>
					</div>
					<div class="col-6">
						<button class="btn btn-primary btn-xs btn-block mb-3" type="submit" name="dangnhap" value="dangnhap">Đăng nhập&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
					</div>
				</div>
				<div class="col-12" id="hotro">
					<p>Liên hệ hỗ trợ SĐT:<strong> <a href="tel:0868378653"> 0868378653</a> || <a href="tel:0339845395">0339845395</a></strong></p>
				</div>
			</form>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="{$url}public/css/login_sinhvien.css">	

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
