@extends('templates.admin.template')
@section('main')
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    CHỈNH SỬA DANH MỤC HOA
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
                        <form action="{{route('admin.cats.edit',$arItem['id'])}}" id="frmCats" method="post" enctype="multipart/form-data"  >
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tên danh mục hoa</label>
                                    <input name="name" class="form-control" type="text" value="{{ $arItem['name']}}" placeholder="Nhập tên danh mục hoa..." >
                                    <p class="help-block"></p>
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
@section('script')
@include('templates.admin.validate')
@endsection