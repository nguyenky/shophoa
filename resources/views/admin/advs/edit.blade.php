@extends('templates.admin.template')
@section('main')
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    CHỈNH SỬA QUẢNG CÁO
                </div>
                <?php
                    $id         = $arItem['id'];
                    $name       = $arItem['name'];
                    $link       = $arItem['link'];
                    $active     = $arItem['active'];
                    $picture    = $arItem['picture'];
                    if($picture != ''){
                        $urlPicture = asset("/storage/app/files/{$picture}");
                            }else{
                        $urlPicture = asset('/storage/app/defoult/no-hoa.jpg');
                            }
                ?>
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

                        <form action="{{route('admin.advs.edit',$id)}}" id="frmAdvs" method="post" enctype="multipart/form-data"  >
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tên quảng cáo</label>
                                    <input name="name" class="form-control" value="{{$name}}" type="text" placeholder="Nhập tên quảng cáo..." >
                                    <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="row">
                                 <div class="form-group col-md-4">
                                            <input name="picture" type="file">      
                                </div>
                                @if($picture !="")
                                <div class="form-group col-md-2">
                                    <input type="checkbox" value="1" name="delete_picture">&nbsp &nbspXóa hình<br />
                                    <img src="{{$urlPicture}}" width="100px" height="100px" >
                                </div>
                                @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Link</label>
                                    <input name="link" value="{{$arItem['link']}}" class="form-control" type="text" placeholder="Links quảng cáo" >
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