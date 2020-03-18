<div class="container container-shadow" id="dsQuestion">
     <div class="panel panel-default" style="background: #ffffff;">
        <div class="panel-body">
            <div class="col-md-4">
               <div class="panel panel-info">
                   <div class="panel-heading">
                       <h3 class="panel-title">DANH SÁCH NHÓM CÂU HỎI</h3>
                   </div>
                   <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked" id="myTab">
                            <li class="active">
                                <a data-toggle="tab" href="#tatca"><b>Tất cả</b></a>
                            </li>
                            {foreach $nhomCH as $key => $val}
                                <li><a data-toggle="tab" href="#{$key}"><b>{$val.TenNhom}</b></a></li>
                            {/foreach}
                        </ul>
                   </div>
               </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">DANH SÁCH CÂU HỎI</h3>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="tatca" class="tab-pane fade in active">
                                {foreach $nhomCH as $key => $val}
                                    {$stt=1}
                                    <div class="col-md-12 text-center">
                                        <p class="tg bg-warning "><span>{$val.TenNhom}</span></p>
                                    </div>
                                    {foreach $val as  $v}
                                        <button class="btn btn-primary btn-flat ttcauhoi1" data-order="" data-info="" type="button" value="">{$stt++}</button>
                                    {/foreach}
                                    <hr>
                                {/foreach}
                            </div>
                            {foreach $nhomCH as $key => $val}
                                {$stt=1}
                                <div id="{$key}" class="tab-pane fade">
                                    {foreach $val as  $v}
                                        <button class="btn btn-primary btn-flat ttcauhoi1" data-order="" data-info="" type="button" value="">{$stt++}</button>
                                    {/foreach}
                                </div>
                            {/foreach}
                    </div>
                </div>
            </div>
        </div>

     </div>
</div>
<div class="panel-footer">
    <small> <!-- Remove this notice or replace it with whatever you want -->
        <b>Phát triển và xây dựng bởi <span class="glyphicon glyphicon-heart" style="color: red;" aria-hidden="true"></span> Tổ phát triển Khoa CNTT - Trường ĐH Mở HN</b>
        <br>
    </small>
</div><!-- End #footer -->
