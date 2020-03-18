
	<div class="contaier">
	<div class="container" id="main-cauhoi">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title title-sadow-chung ">Thống kê danh sách khoa</h4>
                    <hr>
                    <form method="post">
                    	<div class="row">
                    		<div class="col-2">
                    			<div class="form-group">
                    				<label for="example-text-input" class="col-form-label">Chọn số người có điểm cao và thời gian nhanh nhất</label>
                    				<input class="form-control" type="number" value="3" name="soSV" id="soSV">
                    			</div>
                    		</div>
                    		<div class="col-2 text-left" style="margin-top: 58px;">
                    			<button type="submit" class="btn btn-info btn-flat" name="xuatbaocaothongke" value="xuatbaocaothongke">&nbsp;Xuất báo cáo</button>
                    		</div>
							<div class="col-2" style="margin-top: 58px;">
							</div>
                    		<div class="col-3" style="margin-top: 58px;">
								<button type="submit" name="xuatbaocaotong_sv" class="btn btn-info btn-flat margin" value="1">&nbsp;Báo cáo sinh viên các khoa</button>
							</div>
                    	</div>
                    </form>
                    <div class="row">
						<div class="col-6" style="margin-top: 10px;">
							<div class="form-group">
								<label for="">Tìm kiếm</label>
								<div class="input-group">
									<input type="text" name="timkiem" id="myInput" class="form-control" placeholder="Tìm kiếm...">
								</div>
							</div>
						</div>
						<div class="col-2" style="margin-top: 40px;">
							<a class="btn btn-primary btn-flat margin" href="{$url}DanhSachThongKe?xuatbaocaothongke=xuatbaocaotong" target="_blank">&nbsp;Báo cáo dự thi</a>
						</div>
                  </div>
                  <div class="row">
	                  	<div class="col-12">
	                  		
	                  	</div>
                  		<div class="col-12">
                  			<form action="" method="post" id="form">
	  							<table class="table table-bordered table-striped table-hover" id="example1">
									<thead>
										<tr>
											<th style="text-align: center; width: 103px;" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="STT: activate to sort column ascending">
												STT
											</th>
											<th style="text-align: left; width: 259px;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tên tài khoản: activate to sort column ascending">
												Tên Khoa
											</th>
											<th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tên cán bộ: activate to sort column ascending" style="width: 159px;">
												Tổng số sinh viên không hoàn thành theo thể lệ
											</th>
											<th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tên cán bộ: activate to sort column ascending" style="width: 159px;">
												Tổng số sinh viên tham gia theo thể lệ
											</th>
											<th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tên cán bộ: activate to sort column ascending" style="width: 214px;">
												Hệ số
											</th>
											<th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Tên cán bộ: activate to sort column ascending" style="width: 214px;">
												Điểm trung bình của khoa
											</th>
											<th style="text-align: center; width: 135px;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
												Tác vụ
											</th>
										</tr>
									</thead>
									<tbody id="table_sort">
										{foreach $khoa as $key => $val}
										<tr>
											<td class="text-center">{$key+1}</td>
											<td>{$val.tenkhoa}</td>
											<td class="text-center">{$val.sv_ko_du_dk}</td>
											<td class="text-center"><b>{$val.svdu_dk}</b></td>
											<td class="text-center"><b>{$val.heso}</b></td>
											<td class="text-center"><b>{$val.diemTB}</b></td>
											<td class="text-center">
												<a class="btn btn-primary btn-flat margin" href="{$url}DanhSachThongKe?xuatbaocaothongke=xuatbaocaokhoa&khoa={$val.makhoa}" target="_blank">&nbsp;DSSV Khoa</a>
											</td>
										</tr>
										{/foreach}
									</tbody>
								</table>
	  						</form>
                  		</div>
  						
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <link rel="stylesheet" href="{$url}public/bootstrap/css/bootstrap.min.css">

 <style>
	thead tr th, tbody tr td{
		vertical-align: middle !important;
	} 
	.datepicker {
	     padding: 11px !important; 
	}	
 </style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myInput').on("keyup",function(){
			var value = $(this).val().toLowerCase();
			$("#table_sort tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1);
			});
		});
	});
</script>
