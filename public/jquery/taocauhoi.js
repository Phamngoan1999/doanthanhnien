$(document).ready(function() {
	cauhoi   = $("#cauhoi").html();
	$("button[name='DeleteQuestion']").attr("disabled","true");
    window.dangthem = null;
	manhom = $("select[name='nhomCauHoi']").val();
	ShowQuestion(manhom);

	$(document).on("change", "select[name='nhomCauHoi']", function(){
		if (window.dangthem != null) {
			jQuery('button.ttcauhoi:last').parent().remove();
			dangthem = null;
		}
		manhom = $(this).val();
		ShowQuestion(manhom);
	});

	function ShowQuestion(manhom){
		$.ajax({
			url: window.location.pathname,
            type:"post",
			data: {
				'action' : "saveSession_Nhom",
				'nhomCH' : manhom,
			},
			success:function(data){
				data = JSON.parse(data);
				var html = '';
				if(data['NhomCH'].length == 0){
					$("#cauhoi").html(cauhoi);
				}
				$("#tongsocau").html("<span style='font-weight:bold'>Tổng số câu hỏi: &nbsp;<b><span class='badge badge-primary'>"+data['NhomCH'].length+"</span>")
				$(".showQuestion").html("");
				data['NhomCH'].map(function(index, elem) {
					html += '<div class="mt-2 nutcauhoi">';
					html += '<button class="btn btn-primary btn-flat ttcauhoi" data-order="'+[elem+1]+'" data-info="'+index['iStt']+'" style="width: 100%;" type="button" value="'+index['sMaCauhoi']+'">'+[elem+1]+'</button>';
					html += '</div>';
					$(".showQuestion").html(html);
				});
				if(data['NhomCH'].length > 0){
					$('input[name="checkdapan"]').attr('checked',false);
					sNdCauhoi 	= data['NhomCH'][0]['sNdCauhoi'];
					sDapandung 	= data['NhomCH'][0]['sDapandung'];
					sDapanA 	= data['NhomCH'][0]['sDapanA'];
					sDapanB		= data['NhomCH'][0]['sDapanB'];
					sDapanC  	= data['NhomCH'][0]['sDapanC'];
					sDapanD   	= data['NhomCH'][0]['sDapanD'];
					$('#caumay').text(1);
					$('input[value='+sDapandung +']').click();
					$('input[name="datcauhoi"]').val(sNdCauhoi);
					$('input[name="dapanA"]').val(sDapanA);
					$('input[name="dapanB"]').val(sDapanB);
					$('input[name="dapanC"]').val(sDapanC);
					$('input[name="dapanD"]').val(sDapanD);
					$('button[name="DeleteQuestion"]').val(data['NhomCH'][0]['sMaCauhoi']);
					if(data['NhomCH'][0]['check_sv'] > 0){
						$("button[name='DeleteQuestion']").hide();
					}else{
						$("button[name='DeleteQuestion']").show();
					}
				}else{
					$("#cauhoi").html(cauhoi);
					themcauhoi();
				}

				// tô màu câu đầu tiên
				active_1 = $('button[data-order=1]');
				$(active_1).removeClass('btn-primary');
				$(active_1).addClass('btn-danger');
			}
		});
	}
	

    // thêm câu hỏi//
	$(document).on('click','button[name="themcauhoi"]',function(){
		if (window.dangthem != null) {
			error('Không thể thêm câu hỏi khi câu hỏi chưa được lưu!');
			$('button.ttcauhoi:last').click();
			return;
		}
		if($("select[name='nhomCauHoi']").val() == null){
			error("Bạn phải chọn nhóm câu hỏi!");
		}else{
			themcauhoi();
		}
	});
	function themcauhoi(){
		manhom = $("select[name='nhomCauHoi']").val();
		$("#cauhoi").html(cauhoi);
		ttcauhoi = $('.ttcauhoi');
		dem = $('.ttcauhoi').length ;
		dem++;
		$("#caumay").text(dem);
		value_ch = 'CH'+dem+Math.floor((Math.random() * 9000) + 1000) + $.now() ;
		html = '';
		html = '<div class="mt-2 nutcauhoi">';
		html += '<button type="button" class="btn btn-danger btn-flat ttcauhoi" data-order="'+dem+'" value="'+value_ch +'" style="width: 100%;">'+ dem +'</button>';
		html+='</div>';
		$('.showQuestion').append(html);
		$(ttcauhoi).removeClass('btn-danger');
		$(ttcauhoi).addClass('btn-primary');
		window.dangthem = jQuery('button.ttcauhoi:last')[0];
	}

	$(document).on("click","button.ttcauhoi",function(){
		if (window.dangthem != null) {
			if (window.dangthem == $(this)[0]) {
				return;
			} else {
				if (confirm("Bạn có muốn bỏ câu hỏi này không!") != true) {
					return;
				} else {
					jQuery('button.ttcauhoi:last').parent().remove();
					dangthem = null;
				}
			}
		}
		$("button[name='DeleteQuestion']").removeAttr("disabled");
		active = $('.ttcauhoi');
		$(active).removeClass('btn-danger');
		$(active).addClass('btn-primary');
		$(this).toggleClass('btn-primary btn-danger');
		macauhoi = $(this).val();
		stt 	 = $(this).attr('data-order');
		$('#caumay').text(stt);
		$.ajax({
			url: window.location.pathname,
			type:"post",
			data: {
				'action':'get-cau-hoi',
	 			'value':macauhoi
			},
			success:function(data){
				var res = JSON.parse(data);
				if(res==0){
					$("#cauhoi").html(cauhoi);
					$('#caumay').text(dem);
				}else{
					$('input[name="checkdapan"]').attr('checked',false);
					sNdCauhoi 	= res['sNdCauhoi'];
					sDapandung 	= res['sDapandung'];
					sDapanA 	= res['sDapanA'];
					sDapanB		= res['sDapanB'];
					sDapanC  	= res['sDapanC'];
					sDapanD   	= res['sDapanD'];
					$('#caumay').text(stt);
					$('input[value='+sDapandung +']').click();
					$('input[name="datcauhoi"]').val(sNdCauhoi);
					$('input[name="dapanA"]').val(sDapanA);
					$('input[name="dapanB"]').val(sDapanB);
					$('input[name="dapanC"]').val(sDapanC);
					$('input[name="dapanD"]').val(sDapanD);
					$('button[name="DeleteQuestion"]').val(macauhoi);
					if(data['NhomCH'][0]['check_sv'] > 0){
						$("button[name='DeleteQuestion']").hide();
					}else{
						$("button[name='DeleteQuestion']").show();
					}
				}
			}
		});
	});


	// lưu câu hỏi
	
	$(document).on('click','button[name="btnSaveQuestion"]',function(){ // lưu câu hoi
		manhom 	  = $("select[name='nhomCauHoi']").val();
		mch       = $('.btn-danger').val();
		dad 	  = $('input[type=radio]:checked').val();
		dch       = $('input[name="datcauhoi"]').val();
		stt       = $('.btn-danger').attr('data-order');
		stt       = $('.btn-danger').attr('data-order');
		madapan   = 'DA-'+dad+'-'+Math.floor((Math.random() * 9000) + 1000); // mã đáp án tự tạo
		a         = $('input[name="dapanA"]').val();
		b         = $('input[name="dapanB"]').val();
		c         = $('input[name="dapanC"]').val();
		d         = $('input[name="dapanD"]').val();
		if(!dch){
			error('Câu hỏi không được để trống!');
		}
		else{
				$.ajax({
				url:window.location.pathname,
				type:'post',
				data:{
					'action':'saveQuestion',
					'a'		:a,
					'b'		:b,
					'c'		:c,
					'd'		:d,
					'mch'	:mch,
					'dad'	:dad,
					'mda'	:madapan,
					'dch'	:dch,
					'stt'	:stt,
					'nhomCH': manhom,
				},
				success:function(data){
					data = JSON.parse(data);
					if(data['notification']==2){
						error('Lưu câu hỏi thất bại! Sinh viên đã làm câu hỏi này!');
					}else{
						if(data['notification'] == 1){
							$("#tongsocau").html("<span style='font-weight:bold'>Tổng số câu hỏi: &nbsp;<b><span class='badge badge-primary'>"+data['nhomCH']+"</span>");
							success('Lưu thành công!');
						}else {
							error('Câu hỏi phải có đáp án.Mời bạn chọn đáp án!');
						}
					}
					window.dangthem = null;
				}
			});
		}
	});

	// xóa câu hỏi
	
	$(document).on('click','button[name="DeleteQuestion"]',function(){
		if (window.dangthem != null) {
			if (window.dangthem == $(this)[0]) {
				return;
			} else {
				if (confirm("Bạn có muốn bỏ câu hỏi này không!") != true) {
					return;
				} else {
					jQuery('button.ttcauhoi:last').parent().remove();
					dangthem = null;
					$('button.ttcauhoi:last').click();
				}
			}
		}else{
			if (confirm("Bạn có chắc chắn muốn xóa câu hỏi này không!") == true) {
				arr_cauhoi = $('.ttcauhoi');
				arr_cautl  = [];
				for (var i = 0; i< arr_cauhoi.length ; i++) {
					tam = [];
					tam.push(arr_cauhoi.eq(i).attr('data-order'));
					tam.push(arr_cauhoi.eq(i).attr('value'));
					arr_cautl.push(tam);
				}
				console.log(arr_cautl);
				custom =  JSON.stringify(arr_cautl);
				question_code = $(this).val();
				$.ajax({
					url:window.location.pathname,
					type:'post',
					data:{
						'action':'deleteQuestion',
						'question_code':question_code,
						'arr_stt'	   : custom
					},
					success:function(data){
						data = JSON.parse(data);
						console.log(data);
						if(data['notification']==1){
							success('Xóa câu hỏi thành công!');
							$('button.ttcauhoi.btn-danger').parent().remove();
							// setNull();
							setTimeout(function () {
								reorderQuestionNums();
								$('button.ttcauhoi:last').click();
								$("#tongsocau").html("<span style='font-weight:bold'>Tổng số câu hỏi: &nbsp;<b><span class='badge badge-primary'>"+data['nhomCH']+"</span>");
								if(data['nhomCH'] == 0){
									$("#cauhoi").html(cauhoi);
								}
							}, 100);
						}else if(data['notification']==2){
							error('Xóa câu hỏi thất bại! Sinh viên đã làm câu hỏi này!');
						}else{
							error('Xóa câu hỏi thất bại!');
						}
					}
				});
			}
		}
	});

	function reorderQuestionNums() {
		var i = 1;
		$('button.ttcauhoi').each(function (idx, row) {
			$(row).text('Câu ' + i);
			$(row).attr('data-order', i);
			$(row).attr('data-info', i);
			i++;
		});
	}

});