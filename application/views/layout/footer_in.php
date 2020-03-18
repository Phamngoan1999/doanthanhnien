
	
</body>
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
