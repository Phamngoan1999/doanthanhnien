<div class="container container-main">
    <div class="row rowtc">
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <h4 class="header-title title-sadow-chung ">Xem chi tiết bài làm sinh viên</h4>
                        <hr>
                        {if $trangthai == null}
                        <form method="post">
                            <div id="accordion11" class="collapse show" >
                                    <label>Chọn khoa:</label>
                                <div class="input-group">
                                    <select name="khoa" class="form-control">
                                   Khoa----</option>
                                    <option disabled selected value="">----Chọn Khoa----</option>
                                    {foreach $khoa as $val}
                                        <option value="{$val['makhoa']}" {(!empty($dulieu) && $dulieu['khoa'] == $val['makhoa']) ? selected : ''}>{$val['tenkhoa']}</option>
                                    {/foreach}
                                    </select>
                                    <span class="input-group-btn">
                                    <button type="submit" value="timkiem" name="timkiem" class="btn btn-sm btn-success btn-flat">Tìm kiếm</button>
                                    </span>
                                </div>
                            </div>
                            <div id="accordion11" class="collapse show mt-3" >
                                <table id="dataTable" class="table table-bordered">
                                    <thead class="bg-light ">
                                        <tr>
                                            <th class="text-center">STT</th>
                                            <th>Mã sinh viên</th>
                                            <th>Tên sinh viên</th>
                                            <th class="text-center">Ngày sinh</th>
                                            <th>Khoa</th>
                                            <th class="text-center">Trạng Thái</th>
                                            <th class="text-center">Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {if !empty($dulieu)}
                                            {foreach $dulieu['sv'] as $key => $val}
                                                <tr>
                                                    <td class="text-center"><b>{$key+1}</b></td>
                                                    <td>{$val.sMaSV}</td>
                                                    <td class="text-left">{$val.sTenSV}</td>
                                                    <td class="text-center">{$val.sNgaysinh}</td>
                                                    <td>{$tenkhoa[$val.FK_makhoa]}</td>
                                                    <td class="text-center">
                                                    <span class="badge badge-primary">      
                                                        {if $val.trangthai_lambai == 1}
                                                            Đã làm bài
                                                        {else}
                                                            {if $val.trangthai_lambai == "tudongnopbai"}
                                                                Tự động nộp bài
                                                            {else}
                                                                Không làm bài
                                                            {/if}
                                                        {/if}
                                                    </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="submit" class="btn btn-info btn-xs mb-3" name="xemchitiet" value="{$val.sMaSV}">Xem chi tiết</button>
                                                    </td>
                                                </tr>
                                            {/foreach}
                                        {/if}
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        {else}
                            <div class="row">
                                <div class="col-12 mt-3 text-center ttsv">
                                    <span class="ttsv-span">Mã sinh viên:</span><strong>{$ttsv['sMaSV']}</strong>
                                    <span class="ttsv-span">, Họ và tên:</span><strong>{$ttsv['sTenSV']}</strong><br>
                                    <span class="ttsv-span">Thời gian bắt đầu làm bài:</span><strong>{$ttsv['dtTgianBatdau']}</strong>
                                    <span class="ttsv-span">, Thời kết thúc làm bài:</span><strong>{$ttsv['dtTgianKetthuc']}</strong>
                                    <span class="ttsv-span">, Tổng số câu đúng:</span><strong>{$ttsv['iSocaudung']}</strong>
                                    <span class="ttsv-span">,Số câu  trả lời:</span><strong>{$ttsv['iSocautraloi']}</strong>
                                    <span class="ttsv-span">,Kết quả:</span><strong>{$ttsv['ketqua']} điểm</strong>
                                    <hr>
                                    <p class="warning">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <span> <b>Chú ý:</b> </span><br>
                                        <span>
                                            <b>Đáp án được tích vào là đáp án đúng</b>
                                        </span><br>
                                        <span>
                                            <b>Đáp án to màu là đáp án của sinh viên chọn</b>
                                        </span>
                                    </p>
                                </div>
                                <div class="col-12 mt-5">
                                    {foreach $sinhvien as $key => $val}
                                        <div class="ttCH col-12 form-group Question_lambai">
                                            <div class="col-12">
                                                <p><span class="badge badge-pill badge-info soCH font-chu" id="{$val.sMaCauhoi}">Câu  {$key+1}:</span><strong class="ndCH font-chu"> {$val.sNdCauhoi}</strong></p>
                                            </div>
                                            <div class="col-12 dapanQuestion font-chu">
                                                <div class="custom-control custom-radio {if $val['sDapanchon'] == 'A'}tomau{/if}">
                                                    <input type="radio" disabled id="A{$val.sMaCauhoi}" value="A" name="{$val.sMaCauhoi}" class="custom-control-input"  {if $val['sDapandung'] == 'A'}checked{/if}>
                                                    <label class="custom-control-label " for="A{$val.sMaCauhoi}"><span class="dapanselect">A.</span><b></b> <span class="dapanQS">&nbsp; {$val['sDapanA']}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-12 dapanQuestion font-chu">
                                                <div class="custom-control custom-radio {if $val['sDapanchon'] == 'B'}tomau{/if}">
                                                    <input type="radio" id="B{$val.sMaCauhoi}" value="B" name="{$val.sMaCauhoi}" class="custom-control-input" disabled {if $val['sDapandung'] == 'B'}checked{/if}>
                                                    <label class="custom-control-label " for="B{$val.sMaCauhoi}"><span class="dapanselect">B.</span><b></b> <span class="dapanQS">&nbsp; {$val['sDapanB']}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-12 dapanQuestion font-chu">
                                                <div class="custom-control custom-radio {if $val['sDapanchon'] == 'C'}tomau{/if}">
                                                    <input type="radio" id="C{$val.sMaCauhoi}" value="C"  name="{$val.sMaCauhoi}" class="custom-control-input" disabled {if $val['sDapandung'] == 'C'}checked{/if}>
                                                    <label class="custom-control-label " for="C{$val.sMaCauhoi}"><span class="dapanselect">C.</span><b></b> <span class="dapanQS">&nbsp; {$val['sDapanC']}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-12 dapanQuestion font-chu">
                                                <div class="custom-control custom-radio {if $val['sDapanchon'] == 'D'}tomau{/if}">
                                                    <input type="radio" id="D{$val.sMaCauhoi}" value="D"  name="{$val.sMaCauhoi}" class="custom-control-input" disabled {if $val['sDapandung'] == 'D'}checked{/if}>
                                                    <label class="custom-control-label " for="D{$val.sMaCauhoi}"><span class="dapanselect">D.</span><b></b> <span class="dapanQS">&nbsp; {$val['sDapanD']}</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    {/foreach}
                                </div>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="{$url}public/css/svlambai.css?time={time()}">

