$(document).ready(function($) {
	$(document).on('click','#logout', function(){
     	$('#mb-signout').show();
    });
    $(document).on('click','.mb-control-close',function(){
     	$('#mb-signout').hide();
     });
    $(document).on('click','#nopbai', function(){
     	$('#nopbai1').show();
    });
    $(document).on('click','.mb-control-close',function(){
     	$('#nopbai1').hide();
    });

    top();
     function top(){
     	var scrollTop = $(".scrollTop");
    	$(window).scroll(function() {
    		    var topPos = $(this).scrollTop();
    		    if (topPos > 100) {
    		      $(scrollTop).css("opacity", "1");

    		    } else {
    		      $(scrollTop).css("opacity", "0");
    		    }
    	});
	    $(scrollTop).click(function() {
	      $('html, body').animate({
	      	scrollTop: 0
	      }, 800);
	    	return false;
	    });
    }
    $('[data-toggle="tooltip"]').tooltip();
    $('.timepicker').timepicker({
        showInput: false,
        showMeridian: false,
        secondStep: 1 ,
        minuteStep: 1
    });
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    $('.js-example-basic-multiple').select2();
        $('.datepicker').datepicker({
          format: 'dd/mm/yyyy',
          autoclose: true
    });
    $('.js-example-basic-single').select2();
    $(function () {
        $('#datatable').DataTable({
            ordering: true,
            paging: true,
            "pageLength": 10
        })
    })
    $('select').select2({
        theme: 'bootstrap4',
    });
    $(".slicknav_menutxt").text("");
 var topPos = $(this).scrollTop();
            if (topPos > 403) {
                $(".minimap").addClass('minimap-fixed');
                 $(".minimap-fixed").css("opacity", "1");
            } else {
                $(".minimap").removeClass('minimap-fixed');
            }
    minimap();
     function minimap(){
        var scrollMiniMap = $(".minimap");
        $(window).scroll(function() {
            var topPos = $(this).scrollTop();
            if (topPos > 403) {
                $(".minimap").addClass('minimap-fixed');
                 $(".minimap-fixed").css("opacity", "1");
            } else {
                $(".minimap").removeClass('minimap-fixed');
            }
        });
        
        // $(window).scroll(function() {
        //         var topPos = $(this).scrollTop();
        //         if (topPos > 100) {
        //           $(scrollTop).css("opacity", "1");

        //         } else {
        //           $(scrollTop).css("opacity", "0");
        //         }
        //     });
        // $(scrollTop).click(function() {
        //   $('html, body').animate({
        //     scrollTop: 0
        //   }, 800);
        //     return false;
        // });
    }
});
