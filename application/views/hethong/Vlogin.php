<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đoàn TNCS Hồ Chí Minh</title>
    <link rel="icon" href="{$url}public/images/DV01.png">
    <link rel="stylesheet" href="{$url}public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{$url}public/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{$url}public/css/login.css">
    <script src="{$url}public/jquery/jquery.js"></script>
    <script src="{$url}public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
    <link rel="stylesheet" type="text/css" href="{$url}public/Toastr/toastr.css">
    <script type="text/javascript" src="{$url}public/Toastr/tienganh.js"></script>
    <script type="text/javascript" src="{$url}public/Toastr/toastr.js"></script>
</head>

<body>
    <div id="main-login" class="container-fluid">
        <header style="color:#Fff" class="animated fadeInDown">
                <img src="{$url}public/images/logo1.ico" style="margin-bottom: 11px;">
                <b class="title"> Trường Đại học Mở Hà Nội</b>
        </header>
        <section class="container" id="content-login">
            <div class="col-md-12 text-center animated flipInX title-nd">
                 <b>Đoàn Thanh Niên Cộng Sản Hồ Chí Minh</b>
            </div>
            <div class="col-md-6 col-lg-offset-3">
                <form id="form-login" method="post">
                    <div class="form-group has-feedback animated fadeInLeft">
                        <label style="color:#fff;">Tên đăng nhập:</label>
                        <input type="text" class="form-control border-radius" placeholder="Tên đăng nhập" required="" name="username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback animated fadeInRightBig">
                        <label style="color:#fff;">Mật khẩu:</label>
                        <input type="password" class="form-control border-radius" placeholder="Mật khẩu" required="" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <!-- <p class="bg-danger">Tài khoản hoặc mật khẩu của bạn không chính sác!</p> -->
                    </div>
                    <div class="row">
                        <div class="col-lg-offset-4 col-xs-offset-3 col-md-4 col-xs-6 animated shake">
                            <input type="hidden" name="login" value="1">
                            <button type="submit" value="Đăng nhập" class="btn btn-primary btn-block btn-flat border-radius">Đăng nhập &nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </section>
    </div>
</body>
</html>
{if !empty($message)}
<script type="text/javascript">
setTimeout(function() {
toastr.options = {
closeButton: true,
progressBar: true,
showMethod: 'slideDown',
timeOut: 5000
};
toastr.{$message.type}("{$message.title}","{$message.message}");
}, 200);
</script>
{/if}