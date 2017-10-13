@extends('templates.admin.template')
@section('main')
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    CHỈNH SỬA GIỚI THIỆU
                </div>
                <?php
                    $id         = $arItem['id'];
                    $name       = $arItem['name'];
                    $active     = $arItem['active'];
                    $content    = $arItem['content'];
                ?>
                    <div class="panel-body">
                        <form action="{{route('admin.aboutus.edit',$id)}}" id="frmAboutUs" method="post" enctype="multipart/form-data"  >
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tên</label>
                                    <input name="name" class="form-control" value="{{$name}}" type="text" required>
                                    <p class="help-block"></p>
                            </div>
                             <div class="form-group col-md-2">
                                <label>Kích hoạt</label><br />
                                    <input name="active"
                                    @if($arItem['active'] ==1)
                                            checked="checked"
                                        @endif 
                                         value="1"  type="checkbox" >

                                    <p class="help-block"></p>
                            </div>
                        </div>
                       
                        <div class="row">
                        <div class="form-group col-md-12">
                           
                           <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" rows="3"  name="content">{{$content}}</textarea>
                                <script type="text/javascript">ckeditor ("content")</script>
                            </div>
                            
                           </div>
                           
                            <button type="submit" class="btn btn-info">Chỉnh sửa</button>
                            <button type="reset" class="btn btn-info">Nhập lại</button>
                       </form>
                            </div>
                        </div>
                            </div>
        </div>
@endsection