<div class="container">
	<div class="row">
		<div class="col-12 mt-5 pd-0-lambai">
			<div class="card">
				<div class="card-body">
					<div class="row andi">
						<div class="col-3">
							<img src="{$url}public/images/ri-left.png" alt="">
						</div>
						<div class="col-6">
							<h4 class="header-title title-lambai"> <span style="color:#b3005555 !important;">Cuộc thi trực tuyến</span><Br><span class="title-sp"> Tuổi trẻ trường Đại Học Mở Hà Nội <Br> Sắt son Niềm Tin với Đảng</span></h4>
						</div>
						<div class="col-3">
							<img src="{$url}public/images/ri-righ1t.png" alt="">
						</div>
					</div>
					<div class="row d-none hienthi">
						<h4 class="header-title title-lambai"> <span>Cuộc thi trực tuyến</span><Br><span class="title-sp"> Tuổi trẻ trường Đại Học Mở Hà Nội <Br> Sắt son Niềm Tin với Đảng</span></h4>
					</div>
					<div class="row mt-4 row-warn">
						<p class="warning">
							<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <span> <b>Chú ý:</b> </span><br>
						
							<span>
								<b>Khi bạn bắt đầu làm bài</b> thì thì thời gian sẽ được tính, bạn bắt buộc phải hoàn thành bài thi của mình trong thời gian cho phép không sẽ không được tính điểm.
							</span><br>
							<span>
								<b>Khi load lại trang </b>thì câu hỏi của bạn cũng sẽ bị reset lại những câu đã làm và thời gian vẫn tiếp tục tính. 
							</span>
							<span><br>
								Trường hợp sinh viên <b>hết thời gian</b> làm bài mà vẫn chưa làm xong <b>50 câu hỏi trắc nghiệm </b>thì hệ thống sẽ tự động nộp bài và kết quả của bạn sẽ không được tính.
							</span><br>
							<span>
								<b>Nếu thông tin đăng ký không đúng thông tin sinh viên thì sẽ bị hủy kết quả lượt thi.
							</span><br>
						</p>

					</div>
					<div class="row mt-5 pading-0-repon">
						<div class="col-sm-9 mt-2">
							<div class="card">
								<h4 class="header-title title-sadow-left"><span>Mã đề thi:</span><b> {rand (1 ,10000)}</b> - <span>Số câu hỏi: <b><span id="socauHoi"></span> câu hỏi</b></span></h4>
								{$stt = 1}
								{foreach $cauHoi as $key => $v}
									{if !empty($v)}
									{foreach $v as $val}
									{$a = $phrases[array_rand($phrases)]}
									{$array = array_diff($phrases, [$a])}
									{$b = $phrases[array_rand($array)]}
									{$array = array_diff($array, [$a, $b])}
									{$c = $phrases[array_rand($array)]}
									{$array = array_diff($array, [$a, $b, $c])}
									{$d = $phrases[array_rand($array)]}
										<div class="ttCH col-12 form-group Question_lambai">
											<div class="col-12">
												<p><span class="badge badge-pill badge-info soCH font-chu" id="{$val.sMaCauhoi}">Câu  {$stt++}:</span><strong class="ndCH font-chu"> {$val.sNdCauhoi}</strong></p>
											</div>
											<div class="col-12 dapanQuestion font-chu">
						        				<div class="custom-control custom-radio">
		                                            <input type="radio" id="A{$val.sMaCauhoi}" value="A" data-select="{$a}" name="{$val.sMaCauhoi}" class="custom-control-input">
		                                            <label class="custom-control-label " for="A{$val.sMaCauhoi}"><span class="dapanselect">A.</span><b></b> <span class="dapanQS">&nbsp; {$val[$a]}</span></label>
		                                        </div>
											</div>
											<div class="col-12 dapanQuestion font-chu">
						        				<div class="custom-control custom-radio">
		                                            <input type="radio" id="B{$val.sMaCauhoi}" value="B" data-select="{$b}" name="{$val.sMaCauhoi}" class="custom-control-input">
		                                            <label class="custom-control-label " for="B{$val.sMaCauhoi}"><span class="dapanselect">B.</span><b></b> <span class="dapanQS">&nbsp; {$val[$b]}</span></label>
		                                        </div>
											</div>
											<div class="col-12 dapanQuestion font-chu">
						        				<div class="custom-control custom-radio">
		                                            <input type="radio" id="C{$val.sMaCauhoi}" value="C" data-select="{$c}" name="{$val.sMaCauhoi}" class="custom-control-input">
		                                            <label class="custom-control-label " for="C{$val.sMaCauhoi}"><span class="dapanselect">C.</span><b></b> <span class="dapanQS">&nbsp; {$val[$c]}</span></label>
		                                        </div>
											</div>
											<div class="col-12 dapanQuestion font-chu">
						        				<div class="custom-control custom-radio">
		                                            <input type="radio" id="D{$val.sMaCauhoi}" value="D" data-select="{$d}" name="{$val.sMaCauhoi}" class="custom-control-input">
		                                            <label class="custom-control-label " for="D{$val.sMaCauhoi}"><span class="dapanselect">D.</span><b></b> <span class="dapanQS">&nbsp; {$val[$d]}</span></label>
		                                        </div>
											</div>
										</div>
									{/foreach}
									{/if}
								{/foreach}
							</div>
						</div>
						<div class="col-sm-3 mt-2 minimap">
							<div class="card ">
								<h4 class="header-title title-sadow-right text-center">{$session['sTenSV']}</h4>
								<div class="col-sm-12">
									<div style="margin-bottom:10px; text-align: center;">
								    	<span class="hetthoigian" style="color:red"></span>
										<div class="tg">
											<span class="donho" style="color: #000000"><i class="fa fa-clock-o"></i></span>
											<span class="hours">
												<span class="hours_dongho">00</span>&nbsp;<span class="haicham">:</span>
											</span>
											<span class="minutes">
												<span class="minutes_dongho">00</span>&nbsp;<span class="haicham">:</span>
											</span>
											<span class="seconds">
												<span class="second_dongho">00</span>
											</span>
										</div>
						            </div>
								</div>
								<div class="alert alert-dark alert-dismissible fade show soCHHT font-chu" role="alert">
									<strong>Số câu hoàn thành: <span class="tongsocau"><span class="span1">0</span> <span>/&nbsp;</span><span class="span2">  50</span></span></strong>
								</div>
								<div class="col-sm-12 out-click d-none d-sm-block">
									{$stt = 1}
						            {foreach $cauHoi as $key => $v}
										{if !empty($v)}
											{foreach $v as $val}
											<label class="btn btn-success2 btn-cauhoi clickcauhoi"    data-scroll-to="#{$val['sMaCauhoi']}"
							                    data-scroll-speed="500"
							                    data-scroll-offset="-20">
							                    <input id="{$val['sMaCauhoi']}" name="chuyen_radio_tab_or_button" class="cauhoi-mini">{$stt++}
							                </label>
							                {/foreach}
						                {/if}
						            {/foreach}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="col-md-12 ">
	<div class="type-2 text-center">
		<div class="button1">
			<button id="nopbai" class="btn btn-2">
				<span class="txt"><i class="fa fa-file-text-o" aria-hidden="true" style="font-size: 18px;"></i> &nbsp;Nộp bài đánh giá</span>
				<span class="round"><i class="fa fa-chevron-right"></i></span>
			</button>
		</div>
	</div>
</div>
<div class="message-box animated fadeIn" id="nopbai1">
	<div class="mb-container">
		<div class="mb-middle">
			<div class="mb-title"><div class="mb-title"><i class="fa fa-info" aria-hidden="true"></i><strong>Nộp bài</strong> ?</div></div>
			<div class="mb-content">
				<div class="mb-content">
					<h3>Bạn đã hoàn thành <b><span class="hoanthanh">0/30</span></b> câu</h3>
					<p class="luuynopbai">Lưu ý:<span> Sau khi nộp bài bạn không có quyền chỉnh sửa gì thêm</span></p>
					<h4>Bạn có chắc chắn muốn nộp bài không?</h4>
				</div>
			</div>
			<div class="mb-footer">
				<div class="pull-right" style="display: -webkit-box;">
					<div class="btn-group mr-2" role="group" aria-label="First group">
						<button type="button" class="btn btn-flat btn-primary btn-lg mb-control-close ">Hủy</button>
						<button type="button" class="btn btn-flat btn-info btn-lg nopbai" value="nopbai" name="nopbaisv"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Nộp bài</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="stop" class="scrollTop">
	<span><a href=""><i class="fa fa-chevron-circle-up" aria-hidden="true"></i></a></span>
</div>
<link rel="stylesheet" type="text/css" href="{$url}public/css/pink.css">
<link rel="stylesheet" type="text/css" href="{$url}public/css/svlambai.css?v=1">
<script type="text/javascript" src="{$url}public/jquery/lambai.js?time={time()}"></script>