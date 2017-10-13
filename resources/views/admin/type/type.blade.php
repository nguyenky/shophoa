@extends('templates.admin.template')
@section('main')
<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Quản lý kiểu hoa hoa</h1>
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
                                <a href="{{route('admin.type.add')}}" title="Thêm mới"><img src="{{ $urlPublic}}/images/add.ico" alt="" /></a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                <input type="submit" name="select" value="Chọn tất cả" onclick="checkedAll(document.form_type.checkbox)" class="btn btn-sm btn-warning" />
                                <input type="submit" name="select" value="Bỏ chọn tất cả" onclick="unCheckedAll(document.form_type.checkbox)" class="btn btn-sm btn-warning" />
                                
                                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="{{route('admin.type.delall')}}"><button type="button" class="btn btn-sm btn-warning">Xóa các mục đã chọn</button></a>
                               
                            </div>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form name="form_type" method="post">
                                <table align="conter" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="50px">Chọn</th>
                                            <th>ID</th>
                                            <th>Tên kiểu hoa hoa</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($arItems as $key => $value)
                                    <?php
                                        $id         = $value['id'];
                                        $name       = $value['name'];
                                        
                                       

                                        $urlDel     =route('admin.type.del',$id);;
                                        $urlEdit    =route('admin.type.edit',$id);

                                    ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkbox" value="{{$id}}"/></td>
                                            <td>{{ $id }}</td>
                                            <td>{{ $name }}</td>
                                            
                                           
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