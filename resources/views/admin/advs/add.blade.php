@extends('templates.admin.template')
@section('main')
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    THÊM MỚI QUẢNG CÁO
                </div>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                    <div class="panel-body">
                        <form action="{{route('admin.advs.add')}}" id="frmAdvs" method="post" enctype="multipart/form-data"  >
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tên quảng cáo</label>
                                    <input name="name" class="form-control" value="{!! old('name') !!}" type="text" placeholder="Nhập tên quảng cáo..." >
                                    <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="row">
                                 <div class="form-group col-md-6">
                                            <input name="picture" type="file">      
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Link</label>
                                    <input name="link" class="form-control" type="text" placeholder="Links quảng cáo" value="{!! old('link') !!}" > 
                                    <p class="help-block"></p>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Kích hoạt</label><br />
                                    <input name="active" value="1" value="{!! old('active') !!}" type="checkbox" >

                                    <p class="help-block"></p>
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