<div class="container" id="main-cauhoi">
    <div class="row mt-3">
        <div class="col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title title-sadow-chung ">Nhóm câu hỏi:</h4>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="button" class="btn btn-info btn-flat btn-lg" data-toggle="modal" data-target=".modal-xl" name="demo">Xem Demo bài làm sinh viên</button>
                        </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg modal-xl" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Xem Demo bài làm sinh viên</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="header-title title-sadow-left"><span>Mã đề thi:</span><b> {rand (1 ,10000)}</b></h4>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {foreach $nhomCH as $val}
                    <form method="post" >
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="example-datetime-local-input" class="col-form-label">Tên nhóm:</label>
                                    <input type="text" name="data[sTenNhom]" class="form-control" value="{$val.sTenNhom}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="example-datetime-local-input" class="col-form-label">Số câu hỏi của nhóm:</label>
                                    <input type="text" name="data[soCH_Random]" class="form-control" value="{$val.soCH_Random}">
                                </div>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary btn-sm" type="submit" name="capnhat" value="{$val.sMaNhom}" style="margin-top: 34px;" data-toggle="tooltip" title="Cập nhật">Cập nhật</button>
                                <button class="btn btn-danger btn-sm" type="submit" name="xoa" value="{$val.sMaNhom}" style="margin-top: 34px;" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm câu hỏi này không?');">Xóa</button>
                            </div>
                        </div>                    
                    </form>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>
 <link rel="stylesheet" href="{$url}public/bootstrap/css/bootstrap.min.css">
