<div class="container" id="main-cauhoi">
    <div class="row mt-3">
        <div class="col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title title-sadow-chung ">Thời gian truy cập hệ thống:</h4>
                    <hr>
                    <form method="post" >
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="example-datetime-local-input" class="col-form-label">Giờ</label>
                                    <select name="gio" class="form-control">
                                        {for $i=0 to 10}
                                            <option value="{($i < 10) ? 0 : ""}{$i}" {if $i == $tg[0]}selected{/if}>{($i < 10) ? 0 : ""}{$i}</option>
                                        {/for}
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="example-datetime-local-input" class="col-form-label">Phút</label>
                                    <select name="phut" class="form-control">
                                        {for $i=0 to 59}
                                         <option value="{($i < 10) ? 0 : ""}{$i}" {if $i == $tg[1]}selected{/if}>{($i < 10) ? 0 : ""}{$i}</option>
                                        {/for}
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="example-datetime-local-input" class="col-form-label">Giây</label>
                                    <select name="giay" class="form-control">
                                        <option value="00">00</option>
                                        {for $i=1 to 59}
                                         <option value="{($i < 10) ? 0 : ""}{$i}" {if $i == $tg[2]}selected{/if}>{($i < 10) ? 0 : ""}{$i}</option>
                                        {/for}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-info mb-3" name="xetthoigian"  value="capnhat">Cập nhật</button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <div class="alert alert-info" role="alert">
                                     Thời gian làm bài của sinh viên: <strong>{$tongso} phút </strong>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
 <link rel="stylesheet" href="{$url}public/bootstrap/css/bootstrap.min.css">
