<style>
 table tr th,table tr td{
 	line-height: 	50px;
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
			<h2>BÁO CÁO SINH VIÊN CÓ ĐIỂM CAO NHẤT</h2>
		</div>
	</center>
	<div>
		<table>	
			<tr>
				<th>STT</th>
				<th>Mã SV</th>	
				<th>Tên SV</th>
				<th>Ngày sinh</th>
				<th>Số điện thoại</th>
				<th>Email</th>
				<th>Tên Khoa</th>
				<th>Tổng số câu</th>
				<th>Số câu TL đúng</th>
				<th>Thời gian</th>
				<th>Kết quả</th>
			</tr>
			{foreach $top as $key => $val}
				<tr>
					<td>{$key+1}</td>
					<td>{$val.sMaSV}</td>	
					<td>{$val.sTenSV}</td>
					<td>{$val.sNgaysinh}</td>
					<td>{$val.sSDT}</td>
					<td>{$val.sEmail}</td>
					<td>{$val.tenkhoa}</td>
					<td>{$val.iSocautraloi}</td>
					<td>{$val.iSocaudung}</td>
					<td>{$val.dtTgianKetthuc-$val.dtTgianBatdau}</td>
					<td>{$val.ketqua}</td>
				</tr>
			{/foreach}
		</table>	
	</div>
</div>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}	