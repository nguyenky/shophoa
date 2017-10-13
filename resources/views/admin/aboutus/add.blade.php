@extends('templates.admin.template')
@section('main')
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    THÊM MỚI GIỚI THIỆU
                </div>
                    <div class="panel-body">
                        <form id="frmAboutUs" action="{{route('admin.aboutus.add')}}" method="post" enctype="multipart/form-data"  >
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tên</label>
                                    <input name="name" class="form-control" type="text" required>
                                    <p class="help-block"></p>
                            </div>
                             <div class="form-group col-md-2">
                                <label>Kích hoạt</label><br />
                                    <input name="active" value="1"  type="checkbox" >

                                    <p class="help-block"></p>
                            </div>
                        </div>
                       
                        <div class="row">
                        <div class="form-group col-md-12">
                           
                           <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" rows="3" name="content"></textarea>
                                <script type="text/javascript">ckeditor ("content")</script>
                            </div>
                            
                           </div>
                        </div>

                            <button type="submit" class="btn btn-info">Thêm mới</button>
                            <button type="reset" class="btn btn-info">Nhập lại</button>
                       </form>
                            </div>
                        </div>
                            </div>
        </div>
@endsection
@section('script')
@include('templates.admin.validate')
@endsection