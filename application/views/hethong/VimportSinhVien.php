<div class="container container-shadow">
     <div class="panel panel-default" style="background: #ffffff;">
        <div class="panel-body">
             <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">File Excel</label>
                                <input type="file" class="form-control" required="" name="file_import" id="file_import" data-toggle="tooltip" data-ariginal-title="Chọn file Import" accept=".xls,.xlsx" data-original-title="" title="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">&nbsp;</label>
                                <br>
                                <input type="submit" name="upload" value="Tải lên" class="btn btn-primary btn-flat" data-toggle="tooltip" data-original-title="Xác nhận Import">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="alert  flat" role="alert" style="font-size:14px; padding: 0px;">
                            Chú ý: File Excel phải có định dạng .xls, .xlsx và theo một định dạng sau.
                            <br>
                            <br>
                            <a href="http://localhost:8080/tuanshcd/public/HDexcel/filemau1.xls" id="url">
                                <button type="button" name="download" id="download" value="download" class="btn  btn-success btn-flat" data-toggle="tooltip" data-original-title="Tải danh sách mẫu tại đây"> Tải về <i class="fa fa-download"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <small> <!-- Remove this notice or replace it with whatever you want -->
                <b>Phát triển và xây dựng bởi <span class="glyphicon glyphicon-heart" style="color: red;" aria-hidden="true"></span> Tổ phát triển Khoa CNTT - Trường ĐH Mở HN</b>
                <br>
            </small>
        </div><!-- End #footer -->
     </div>
</div>