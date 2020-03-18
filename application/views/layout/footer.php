<footer id="footer">
    <div class="text-center border-top" style="background-color:#1e5c8b;  padding:15px 5px; font-size:13px; font-weight:300">
        <h4 class="text-center" style="color:rgba(255, 255, 255, 0.8);">Trường Đại học Mở Hà Nội</h4>
        <p style="color:rgba(255, 255, 255, 0.8); font-size: 13px;"><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;  B101 Nguyễn Hiền, Bách Khoa, Hai Bà Trung, Hà Nội</p>
        <p style="color:rgba(255, 255, 255, 0.8); font-size: 12px;">
            Copyright © 2020 Cuộc thi trực tuyến <br class="d-none hienthi"> Tuổi trẻ Trường Đại học Mở Hà Nội - Sắt son niềm tin với Đảng
        </p>
        <p style="color:rgba(255, 255, 255, 0.8); font-size: 13px;">
            <b>Website được xây dựng và phát triển bởi:</b> <br class="d-none hienthi"><span class="tpt"><a href="https://www.facebook.com/tophatrienvachuyengiaocongnghe/?pnref=story" style="color:rgba(255, 255, 255, 0.8); font-size: 13px;" target="blank">Tổ phát triển - Khoa công nghệ thông tin © 2020-2021</a></span>
        </p>
    </div>
</footer>
</div>
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
<!-- bootstrap 4 js -->
<script src="{$url}assets/js/popper.min.js"></script>
<script src="{$url}assets/js/bootstrap.min.js"></script>
<script src="{$url}assets/js/owl.carousel.min.js"></script>
<script src="{$url}assets/js/metisMenu.min.js"></script>
<script src="{$url}assets/js/jquery.slimscroll.min.js"></script>
<script src="{$url}assets/js/jquery.slicknav.min.js"></script>
<!-- others plugins -->
<script src="{$url}assets/js/plugins.js"></script>
<script src="{$url}assets/js/scripts.js"></script>
</body>

</html>
