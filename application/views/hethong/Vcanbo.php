<div class="container container-shadow" >
    <div class="col-md-12 col-xs-12 them1" style="background: white; min-height: 490px">
        <div class="panel panel-body col-md-12 col-xs-12 " style="background: white">
            <div class="col-md-12">
                <form method="post">
                    <div class="col-md-7">
                        <h3 style="font-family: serif;font-size: 34px;">Danh sách cán bộ</h3>
                    </div>
                    <div class="col-md-5 text-right">
                        <h3>
                            <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#addteacher">Thêm cán bộ</button>
                        </h3>

                        <!-- /.modal-content -->
                    </div>
                    <div class="modal fade in" id="addteacher" style="display: none; padding-right: 17px;">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Tạo tài khoản khoa</h4>
                            </div>
                            <div class="modal-body">
                                <div class="doimk">
                                    <h3 class="name"></h3>
                                    <div class="form-group">
                                        <label>Chọn khoa:</label>
                                        <select name="chonkhoa" class="form-control" id="nganh" required="">
                                             <option value="">---------------Chọn ngành----------</option>
                                        </select>
                                    </div>
                                    <label>Nhập tên tài khoản:</label>
                                    <input type="text" name="tentaikhoan" value="" placeholder="" class="form-control" required="">
                                    <label>Nhập mật khẩu:</label>
                                    <input type="password" name="mkmoi" value="" placeholder="" class="form-control" required="">
                                    <label>Nhập lại mật khẩu:</label>
                                    <input type="password" name="re-mkmoi" value="" placeholder="" class="form-control" required="">
                                    <label>Tên cán bộ:</label>
                                    <input type="text" name="tencanbo" value="" placeholder="" class="form-control" required="">
                                    <label>Nhập email:</label>
                                    <input type="email" name="email" value="" placeholder="" class="form-control">
                                    <label>Nhập số điện thoại:</label>
                                    <input type="text" name="sdt" value="" placeholder="" class="form-control">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Đóng</button>
                                <input type="submit" name="addteacher" class="btn btn-primary btn-flat" value="Lưu">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <hr style="border-bottom: 1px solid red;">
        </div>
        <div class="col-md-12">
            <form method="post">
                <table class="table table-bordered table-striped table-hover " id="datatable">
                    <tbody id="table_sort">
                        <tr>
                            <th style="text-align: center; width: 103px;" class="sorting_asc" tabindex="0">
                                STT
                            </th>
                            <th style="text-align: center; width: 259px;" class="sorting" >
                                Tên tài khoản
                            </th>
                            <th class="text-left sorting" style="width: 214px;">
                                Tên cán bộ
                            </th>
                            <th class="text-left sorting" tabindex="0"  style="width: 214px;">
                                Tên ngành
                            </th>
                            <th style="text-align: left; width: 135px;" >
                                Email
                            </th>
                            <th style="text-align: center; width: 250px;" >
                                Số điện thoại
                            </th>
                            <th style="text-align: center; width: 149px;" >
                                Tác vụ
                            </th>
                        </tr>
                        <tr>
                            <td class="text-center"><b>1</b></td>
                            <td class="text-center">Admin</td>
                            <td>Admin</td>
                            <td><b>Công nghệ thông tin</b></td>
                            <td></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#edit-"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-danger xoacb" data-toggle="tooltip" data-original-title="Xóa cán bộ" value=""><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </td>
                            <div class="modal fade in" id="edit-" style="display: none; padding-right: 17px;">
                                <form method="post">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Sửa tài khoản khoa</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="doimk">
                                                <h3 class="name"></h3>
                                                <div class="form-group">
                                                    <label>Chọn khoa:</label>
                                                    <select name="chonkhoa" class="form-control" >
                                                    </select>
                                                </div>
                                                <label>Tên tài khoản:</label>
                                                <input type="text" name="s_tentaikhoan" value="" placeholder="" class="form-control" required="" disabled="">
                                                <label>Mật khẩu mới:</label>
                                                <input type="password" name="s_mk" value="" placeholder="" class="form-control">
                                                <label>Tên cán bộ:</label>
                                                <input type="text" name="s_tencanbo" value="" placeholder="" class="form-control" required="">
                                                <label>Nhập email:</label>
                                                <input type="email" name="s_email" value="" placeholder="" class="form-control">
                                                <label>Nhập số điện thoại:</label>
                                                <input type="text" name="s_sdt" value="" placeholder="" class="form-control">

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Đóng</button>
                                            <input type="hidden" name="suacb" value="}">
                                            <button  class="btn btn-primary btn-flat" value="">
                                                Cập nhật
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
</div>
</div>
<script type="text/javascript" src="{$url}public/js/danhmuc.js"></script>


