<style>
	#viethoa{
		text-transform: uppercase;
	}	
	.cantrai{
		text-align: right;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="col-md_6">
				<p><strong>TRƯỜNG ĐẠI HỌC MỞ HÀ NỘI</strong></p>
				<p id="viethoa">{$khoa}</p>
			</div>
		</div>	
	</div>
	<center>
		<div class="tieude">
			<h2>DANH SÁCH THỐNG KÊ SINH VIÊN DỰ THI THEO KHOA</h2>
		</div>
	</center>
	<div>
		<table id="canchinh">	
			<tr>
				<th>STT</th>
				<th>Mã SV</th>	
				<th>Tên SV</th>
				<th>Ngày sinh</th>
				<th>Số điện thoại</th>
				<th>Email</th>
				<th>Tổng số câu</th>
				<th>Số câu TL đúng</th>
				<th>Kết quả</th>
			</tr>
			{foreach $dssv as $key => $val}
				<tr>
					<td>{$key+1}</td>
					<td>{$val.sMaSV}</td>	
					<td>{$val.sTenSV}</td>
					<td>{$val.sNgaysinh}</td>
					<td>{$val.sSDT}</td>
					<td>{$val.sEmail}</td>
					<td>{$val.iSocautraloi}</td>
					<td class="cantrai">{$val.iSocaudung}</td>
					<td class="cantrai">{$val.ketqua}</td>
				</tr>
			{/foreach}
		</table>
		</table>
	</div>
</div>
