@extends('templates.admin.template')
@section('main')
<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Quản lý quảng cáo</h1>
                        <h1 class="page-subhead-line">
                        @if(Session::has('msg'))
                            <div class="alert">
                            {{ Session::get('msg')}}
                            </div>
                        @endif
                        
                        </h1>

                    </div>
                </div>
           
                <div class="row">
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div  class="icon2">
                                <a href="{{route('admin.advs.add')}}" title="Thêm mới"><img src="{{ $urlPublic}}/images/add.ico" alt="" />
                                </a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                <input type="submit" name="select" value="Chọn tất cả" onclick="checkedAll(document.form_cats.checkbox)" class="btn btn-sm btn-warning" />
                                <input type="submit" name="select" value="Bỏ chọn tất cả" onclick="unCheckedAll(document.form_cats.checkbox)" class="btn btn-sm btn-warning" />

                                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<button type="button" class="btn btn-sm btn-warning">Xóa các mục đã chọn</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form name="form_cats" method="post">
                                <table align="conter" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="50px">Chọn</th>
                                            <th>ID</th>
                                            <th>Tên quảng cáo</th>
                                            <th>Hình ảnh</th>
                                            <th>Link</th>
                                            <th>Trạng thái</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($arItems as $key => $value)
                                    <?php
                                        $id         = $value['id'];
                                        $name       = $value['name'];
                                        $active     = $value['active'];
                                        $picture    = $value['picture'];
                                        $link       = $value['link'];

                                        if($picture != ''){
                                            $urlPicture = asset("/storage/app/files/{$picture}");
                                        }else{
                                            $urlPicture = asset('/storage/app/defoult/no-hoa.jpg');
                                        }
                                        if($active == 1){
                                            $kichhoat = 'Hoạt động';
                                        }else{
                                            $kichhoat = 'Không hoạt động';
                                        }
                                        $urlDel     =route('admin.advs.del',$id);;
                                        $urlEdit    =route('admin.advs.edit',$id);

                                    ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkbox" value="{{$id}}"/></td>
                                            <td>{{ $id }}</td>
                                            <td>{{ $name }}</td>
                                            <td><img src = "{{ $urlPicture}}" width ="40px" /></td>
                                            <td>{{ $link }}</td>
                                            <td>{{ $kichhoat }}</td>
                                            
                                           
                                           
                                            <td>
                                                <div class="icon">
                                                    <a href="{{ $urlDel}}" title="Xóa"><img src="{{ $urlPublic}}/images/delete.png" alt="" /></a> &nbsp;||&nbsp;
                                                    <a href="{{ $urlEdit}}" title="Chỉnh sửa"><img src="{{ $urlPublic}}/images/update.png" alt="" /></a>
                                                <div>


                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
            </div>
                <!-- /. ROW  -->

            </div>
@endsection