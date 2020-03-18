$(document).ready(function(){
	timeNowSV();
	function timeNowSV(){
		$.ajax({
			url: window.location.pathname,
			type: 'post',
			data: {
				'action'  : 'showTime',
			},
			success: function(data) {
				data = JSON.parse(data);
				console.log(data);
				if(data['trangthai'] == 1){
					time = data['thoigiansapbatdau'].split(":");
					$(".ttsv input,select").attr("disabled","true");
					$("button[name='dangky']").addClass("d-none");
					$(".title-ct").text("Cuộc thi bắt đầu sau:");
					$("#dangky .text-danger").text("Cuộc thi chưa bắt đầu, sinh viên chưa được đăng ký.");
				}else if(data['trangthai'] == 0){
					$(".title-ct").text("Cuộc thi kết thúc sau:");
					time = data['thoigiandangchay'].split(":");
					$(".ttsv input,select").removeAttr("disabled");
					$("button[name='dangky']").removeClass("d-none");
				}else{
					$(".title-ct").text("Cuộc thi trực tuyến đã kết thúc");
					time = 0;
					$("button[name='dangky']").hide();
				}
				sumHours = 0;
				if(time != 0){
					sumHours = (parseInt(time[0]) * 86400)+ (parseInt(time[1]) * 3600) + (parseInt(time[2]) * 60) + parseInt(time[3]);
				}
				if(sumHours > 0){
					var downloadTimer = setInterval(function() {
						sumHours--;
						day  = Math.floor(sumHours / 86400);
						hours = Math.floor((sumHours - day*86400)/3600);
						minute = Math.floor((sumHours - (day*86400) - (hours * 3600)) / 60);
						seconds = sumHours - (day*86400) - (hours * 3600) - (minute * 60);
						if (day < 10) {
							day = '0' + day;
						}
						if (hours < 10) {
							hours = '0' + hours;
						}
						if (minute < 10) {
							minute = '0' + minute;
						}
						if (seconds < 10) {
							seconds = '0' + seconds;
						}

						$(".number1").text(day);
						$(".number2").text(hours);
						$(".number3").text(minute);
						$(".number4").text(seconds);
						if (sumHours <= 0) {
							clearInterval(downloadTimer);
							$("button[name='dangky']").hide();
							$(".title-ct").text("Cuộc thi trực tuyến đã kết thúc");
							$("button[name='dangky']").addClass("d-none");

							// $("#dangky").remove();
							// $(".reponsive-col-8").attr("class", "col-xl-12 col-lg-12 mt-3 reponsive-col-8");
							 setTimeout(function() {
			                    window.location.href = '';
			                }, 500);
						}
					},1000);
				}
			}
		});
	} 
});