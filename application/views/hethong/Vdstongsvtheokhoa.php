<style>
 table tr th,table tr td{
 	line-height: 	40px;
 }	
 table tr td{
 	text-align: right;
 }	
 .cantrai{
 	text-align: left;
 }
</style>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<p><strong>TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</strong></p>
		</div>	
	</div>
	<center>
		<div class="tieude">
			<h2>BÁO CÁO TỔNG QUAN</h2>
		</div>
	</center>
	<div>
		<table id="canchinh">	
			<tr>
				<th>Tên Khoa</th>
				<th>Tổng số sinh viên không tham gia đúng thể lệ</th>	
				<th>Tổng số sinh viên hoàn thành đúng thể lệ</th>
				<th>Hệ số</th>
				<th>Tổng điểm của khoa</th>
				<th>Điểm trung bình khoa</th>
			</tr>
			{foreach $dskhoa as $val}
				<tr>
					<td class="cantrai">{$val.tenkhoa}</td>	
					<td>{$val.sv_ko_du_dk}</td>
					<td>{$val.svdu_dk}</td>
					<td>{$val.heso}</td>
					<td>{$val.sv_ko_du_dk + $val.svdu_dk}</td>
					<td>{$val.diemTB}</td>
				</tr>
			{/foreach}
		</table>
			
	</div>
</div>
<style>