<div class="container" id="main-cauhoi">
	<div class="row mt-3">
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title title-herderCH1 ">Danh sách câu hỏi:</h4>
					<hr>
					<div class="row">
						<div class="col-2">
							<button type="button" name="themcauhoi" class="btn btn-sm btn-success" data-placement="right" data-toggle="tooltip" title="Thêm câu hỏi"><i class="fa fa-plus"></i></button>
						</div>
						<div class="col-10">
							<select name="nhomCauHoi" class="form-control">
								<option value="" disabled selected>---Chọn nhóm câu hỏi---</option>
								{foreach $nhomcauhoi as $val}
								<option value="{$val.sMaNhom}" {if isset($session['nhomCH']) && $session['nhomCH'] == $val.sMaNhom}selected{/if}>{$val.sTenNhom}</option>
								{/foreach}
							</select>
							<button type="button" class="btn btn-xs btn btn-primary pull-right" data-toggle="modal" data-target="#themnhomCH"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
							<div class="modal fade" id="themnhomCH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<form method="post">
									    <div class="modal-content">
										    <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel"  style="color: green;"><label for="">Thêm nhóm câu hỏi:</label></h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										    </div>
										    <div class="modal-body">
							    				<div class="modal-body">
							    					<div class="form-group">
							    						<div class="row form-group">
							    							<div class="col-md-4">
							    								<p class="text-muted">Tên nhóm câu hỏi:</p>
							    							</div>
							    							<div class="col-md-7">
							    								<input type="text" required="" name="data[sTenNhom]" class="form-control " required>
							    							</div>
							    						</div>
							    					</div>
							    				</div>
										    </div>
										    <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
										        <button type="submit" class="btn btn-primary" value="themnhomCH" name="themnhom">Xác nhận</button>
										    </div>
									    </div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class='col-12' style='padding:10px;' id="tongsocau">
							
						</div>
					</div>
					<div class="timeline-area">
						<div class="row showQuestion">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title title-herderCH2">Nội dung câu hỏi:</h4>
					<hr>
					<div class="col-md-12 ancauhoi">
						<form method="post">
							<div id="cauhoi">
								<div class="form-group row">
								    <label for="inputPassword" class="col-sm-2 col-form-label"><small class="text-muted smail-ch">Câu hỏi <b id="caumay" class="questionNumber questionNumber1">1</b>:</small></label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" placeholder="Đặt câu hỏi ..." name="datcauhoi">
								    </div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2 text-right">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="IDdapanA" name="checkdapan" class="custom-control-input" value="A">
											<label class="custom-control-label dapan" for="IDdapanA">A</label>
										</div>
									</div>
									<div class="col-sm-10">
										<input type="text" class="form-control inputDA" placeholder="Đáp án A ..." name="dapanA">
									</div>

									<div class="col-sm-2 text-right mt-2">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="IDdapanB" name="checkdapan" class="custom-control-input" value="B">
											<label class="custom-control-label dapan" for="IDdapanB">B</label>
										</div>
									</div>
									<div class="col-sm-10 mt-2">
										<input type="text" class="form-control inputDA" placeholder="Đáp án B ..." name="dapanB">
									</div>

									<div class="col-sm-2 text-right mt-2">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="IDdapanC" name="checkdapan" class="custom-control-input" value="C">
											<label class="custom-control-label dapan" for="IDdapanC">C</label>
										</div>
									</div>
									<div class="col-sm-10 mt-2">
										<input type="text" class="form-control inputDA" placeholder="Đáp án C ..." name="dapanC">
									</div>

									<div class="col-sm-2 text-right mt-2">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" id="IDdapanD" name="checkdapan" class="custom-control-input" value="D">
											<label class="custom-control-label dapan" for="IDdapanD">D</label>
										</div>
									</div>
									<div class="col-sm-10 mt-2">
										<input type="text" class="form-control inputDA" placeholder="Đáp án D ..." name="dapanD">
									</div>
									<div class="col-sm-2"></div>
									<div class="col-sm-10 mt-3">
										<button type="button" class="btn btn-flat btn-primary btn-sm mb-3" name="btnSaveQuestion" ><i class="fa fa-save"></i>&nbsp; Lưu câu hỏi</button>
										<button type="button" name="DeleteQuestion" class="btn btn-flat btn-danger btn-sm mb-3"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp; Xóa câu hỏi</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="{$url}public/css/taocauhoi.css?time={time()}">
<script type="text/javascript" src="{$url}public/jquery/taocauhoi.js?t={time()}"></script>
