<div class="container" id="main-cauhoi">
    <div class="row mt-3">
        <div class="col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title title-sadow-chung ">Thời gian truy cập hệ thống:</h4>
                    <hr>
                    <form method="post" onsubmit="return checkdate()">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="example-datetime-local-input" class="col-form-label">Thời gian bắt đầu truy cập hệ thống</label>
                                     <input type="text" class="form-control timepicker" name="data[giobd]" value="{(!empty($tg)) ? $tg['giobd'] : ''}">
                                </div>
                                <div class="form-group">
                                    <label for="example-datetime-local-input" class="col-form-label">Ngày bắt đầu truy cập hệ thống</label>
                                     <input type="text" class="form-control datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="{(!empty($tg)) ? $tg['ngayBD'] : date('d/m/Y')}" name="data[ngayBD]">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="example-datetime-local-input" class="col-form-label">Thời gian kết thúc truy cập hệ thống</label>
                                     <input type="text" class="form-control timepicker" name="data[giokt]" value="{(!empty($tg)) ? $tg['giokt'] : ''}"></span>
                                </div>
                                <div class="form-group">
                                    <label for="example-datetime-local-input" class="col-form-label">Ngày bắt đầu truy cập hệ thống</label>
                                    <input type="text" class="form-control datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" value="{(!empty($tg)) ? $tg['ngayKT'] : date('d/m/Y')}" name="data[ngayKT]">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-info mb-3" name="capnhat"  value="capnhat">Cập nhật</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
 <link rel="stylesheet" href="{$url}public/bootstrap/css/bootstrap.min.css">
 <script type="text/javascript">
 function checkdate(){
      if(parseDate($('input[name="data[ngaybd]"]').val()).getTime() > parseDate($('input[name="data[ngaykt]"]').val()).getTime())
      {
        toastr.error('Ngày bắt đầu phải nhỏ hơn ngày kết thúc');
        return false;
      }else{
        return true;
        }
}
function parseDate(str) {
  var mdy = str.split('/');
  return new Date(mdy[2], mdy[1], mdy[0]);
}
</script>
