$(document).ready(function(){
    var check = $('input[type="radio"]');
    tongsocauhoi = $(".soCH").length;
    $("#socauHoi").text(tongsocauhoi);
    var soCauLam = $('input[type="radio"]:checked').length;
    $(".hoanthanh").text(soCauLam+"/"+tongsocauhoi);
	setTime_NopBai();

	function setTime_NopBai(){
		$.ajax({
			url: window.location.pathname,
			type: 'post',
			data: {
				'action': 'xetthoigian'
			},
			success: function(data) {
				data = JSON.parse(data);
				if (data['trangthai'] == 1) {
					$('.hetthoigian').text('Hết thời gian');
                    $(".tg").remove();
                    success("Bài làm của bạn đã tự động nộp bài khi hết thời gian!");
                    setTimeout(function() {
                                    saveBaiAuto();
                    }, 100);
                }else{
                	var thoigian = data['demthoigian'].split(':');
                	sumHours = (parseInt(thoigian[0]) * 3600) + (parseInt(thoigian[1]) * 60) + parseInt(thoigian[2]);
                	if (sumHours <= 0) {
                        setTimeout(function() {
                            saveBaiAuto();
                        }, 100);
                        return;
                    }
                    hours = parseInt(thoigian[0]);
                    minute = parseInt(thoigian[1]);
                    seconds = parseInt(thoigian[2]);
                    if (sumHours > 0) {
						var downloadTimer = setInterval(function() {
							sumHours--;
							hours = Math.floor(sumHours / 3600);
                            minute = Math.floor((sumHours - (hours * 3600)) / 60);
                            seconds = sumHours - (hours * 3600) - (minute * 60);
							if (hours < 10) {
                                hours = '0' + hours;
                            }
                            if (minute < 10) {
                                minute = '0' + minute;
                            }
                            if (seconds < 10) {
                                seconds = '0' + seconds;
                            }
                            if (hours > 0) {
                                $(".hours_dongho").text(hours);
                            } else {
                                $(".hours").remove();
                                $(".hours_dongho").next().remove();
                            }
							$(".minutes_dongho").text(minute);
                            $(".second_dongho").text(seconds);
                            if (sumHours <= 600) {
                                $(".hours_dongho").attr('style', 'color:red;font-weight:bold');
                                $(".minutes_dongho").attr('style', 'color:red;font-weight:bold');
                                $(".second_dongho").attr('style', 'color:red;font-weight:bold');
                                $('.seconds, .minutes, .hours').attr('style', 'color:red');
                                $('.donho').attr('style', 'color:red');
                            }
                            if (sumHours <= 0) {
                                clearInterval(downloadTimer);
                                $('.hetthoigian').text('Hết thời gian');
                                $(".tg").remove();
                                success("Bài làm của bạn đã tự động nộp bài khi hết thời gian!");
                                setTimeout(function() {
                                    saveBaiAuto();
                                }, 100);
                            }
						}, 1000);
                    }
                    if (!sumHours) {
                        $('.hetthoigian').text('Hết thời gian');
                        $(".tg").remove();
                    }
                
                }
			},
			complete: function() {
                // setTimeout(setTime_NopBai, 1000);
            }
        });
	}


	$(document).on("click","button.nopbai", function(){
        tongsocauhoi = $(".soCH").length;
        var soCauLam = $('input[type="radio"]:checked').length;
        if(soCauLam != tongsocauhoi){
            error("Bạn phải làm hết câu hỏi trắc nghiệm không được sẽ không tính điểm!");
            $(".mb-control-close").click();
            return;
        }
        success("Nộp bài thành công!");
        setTimeout(function() {
             saveBaiAuto();
         }, 200);
	});


    function saveBaiAuto(){
        var arr_cautl = luubai();
        tongsocauhoi = $(".soCH").length;
        $.ajax({
            url: window.location.pathname,
            type: 'post',
            data: {
                'action'  : 'nopbai',
                'traloi'  : arr_cautl,
                'tongsoCH': tongsocauhoi,
            },
            success: function(kq) {
                setTimeout(function() {
                    window.location.href = 'KetQuaSinhVien';
                }, 100);
            }
        });
    } 


	// function luu_auto(){
	// 	var arr_cautl = luubai();
	// 	$.ajax({
	// 		url: window.location.pathname,
	// 		type: 'post',
	// 		data: {
	// 			'action'  : 'luu_auto',
	// 			'traloi'  : arr_cautl
	// 		},
	// 		success: function(kq) {
	// 			if (kq == 'luu_auto') {
	// 				success("Bài làm của bạn đã được tự động lưu lại!");
	// 			} else {
	// 				warning("Không được để đáp án trống");
	// 			}
	// 		}
	// 	});
	// }


	 function luubai() {
        arr_cauhoi = $('input[type="radio"]');
        arr_cautl = [];
        for (var i = 0; i < arr_cauhoi.length; i++) {
            if (arr_cauhoi.eq(i)[0].checked == true) {
                tam = [];
                tam.push(arr_cauhoi.eq(i).attr('name'));
                tam.push(arr_cauhoi.eq(i).attr('value'));
                tam.push(arr_cauhoi.eq(i).attr('data-select'));
                arr_cautl.push(tam);
            }
        }
        return arr_cautl;
    }

  
	DemCauTL();
    tovang();

    function tovang() {
        check.change(function() {
        	tongsocauhoi = $(".soCH").length;
            var dem = $('input[type="radio"]:checked');
            dem.parent().parent().parent().attr('style', 'background:#c3e6ff24 !important;');
            var soCauLam = $('input[type="radio"]:checked').length;
            $('.span1').text(soCauLam);
            maCH = $(this).attr("name");
            $("input#"+maCH+".cauhoi-mini").parent().addClass("btn-active_cauhoi");
            $(".hoanthanh").text(soCauLam+"/"+tongsocauhoi);
        });
    }
    function DemCauTL() {
        dem = 0;
        tongsocauhoi = $(".soCH").length;
        $('.span1').text(dem);
        $('.span2').text(tongsocauhoi);
    }

    $("[data-scroll-to]").click(function() {
        var $this = $(this),
          $toElement      = $this.attr('data-scroll-to'),
          $focusElement   = $this.attr('data-scroll-focus'),
          $offset         = $this.attr('data-scroll-offset') * 1 || 0,
          $speed          = $this.attr('data-scroll-speed') * 1 || 500;

        $('html, body').animate({
            scrollTop: $($toElement).offset().top + $offset
        }, $speed);
      
        if ($focusElement) $($focusElement).focus();
    });

});