<?php if(Session::has('search')){
            echo Session::get('search');
                                            }
                                            ?>
@extends('templates.admin.template')
@section('main')
<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Quản lý hoa</h1>
                        <h1 class="page-subhead-line">
                        @if(Session::has('msg'))
                            {{ Session::get('msg')}}
                        @endif
                        </h1>

                    </div>
                </div>
           
                <div class="row">
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="icon2">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="{{route('admin.flowers.add')}}" title="Thêm mới"><img src="{{ $urlPublic}}/images/add.ico" alt="" /></a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                <input type="submit" name="select" value="Chọn tất cả" onclick="checkedAll(document.form_flowers.checkbox)" class="btn btn-sm btn-warning" />
                                <input type="submit" name="select" value="Bỏ chọn tất cả" onclick="unCheckedAll(document.form_flowers.checkbox)" class="btn btn-sm btn-warning" />

                                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<button type="button" class="btn btn-sm btn-warning">Xóa các mục đã chọn</button>
                                </div>
                                <div class="col-md-4"> 
                                    <div class="search-bar">
                                        <form action="{{route('admin.flowers.search')}}" method="get">
                                        {{ csrf_field() }}
                                            <input type="text" value="<?php 
                                            if(Session::has('search')){
                                                echo Session::get('search');
                                            }
                                            ?>" placeholder="Nhập từ khóa" name="search" >
                                            <input type="submit" value="search">
                                        </form>
                                    </div>
                                </div>
                            </div>
                                

                                

                            </div>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form name="form_flowers" method="get" action="#">
                            
                                <table align="conter" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="50px">Chọn</th>
                                            <th>ID</th>
                                            <th>Tên hoa</th>
                                            <th>Hình ảnh</th>
                                            <th width="100px">Danh mục</th>
                                            <th width="100px">Kiểu hoa</th>
                                            <th>Giá</th>
                                            <th>Giảm giá</th>
                                            <th width="100px">Ngày tạo</th>
                                            
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($arItems as $key => $value)
                                    <?php
                                        $id         = $value['fid'];
                                        $name       = $value['fname'];
                                        $cats_name  = $value['cname'];
                                        $picture    = $value['picture'];
                                        $price      = $value['price'];
                                        $discount   = $value['discount'];
                                        $created_at = $value['created_at'];
                                        $type       = $value['tname'];

                                        if($type!=''){
                                            $kieuHoa = $value['tname'];
                                        }else{
                                            $kieuHoa ='-------';
                                        }

                                        //---------------
                                        if($picture != ''){
                                            $urlPicture = asset("/storage/app/files/{$picture}");
                                        }else{
                                            $urlPicture = asset('/storage/app/defoult/no-hoa.jpg');
                                        }
                                        //-------------

                                        $urlDel     = route('admin.flowers.del',$id);
                                        $urlEdit    = route("admin.flowers.edit",$id);

                                    ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkbox" value="{{$id}}"/></td>
                                            <td>{{ $id }}</td>
                                            <td>{{ $name }}</td>
                                            <td>
                                                    <img src = "{{ $urlPicture}}" width ="40px" />
                                            </td>
                                            <td>{{ $cats_name }}</td>
                                            <td>{{ $kieuHoa }}</td>
                                            <td>{{ $price }} VNĐ</td>
                                            <td>{{ $discount }}</td>
                                            <td>{{ $created_at }}</td>
                                            
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
                                <div class="paginate">
                                    {{$arItems->Links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
            </div>
                <!-- /. ROW  -->

            </div>
@endsection