@extends('templates.admin.template')
@section('main')
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    THÊM MỚI DANH MỤC HOA
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
                        <form action="{{route('admin.cats.add')}}" id="frmCats" method="post" enctype="multipart/form-data"  >
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tên danh mục hoa</label>
                                    <input name="name" class="form-control" value="{!! old('name') !!}" type="text" placeholder="Nhập tên danh mục hoa..." >
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