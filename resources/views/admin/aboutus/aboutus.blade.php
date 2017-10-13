@extends('templates.admin.template')
@section('main')
<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Quản lý giới thiệu</h1>
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
                                <a href="{{route('admin.aboutus.add')}}" title="Thêm mới"><img src="{{ $urlPublic}}/images/add.ico" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form name="form_cats" method="post">
                                <table align="conter" class="table table-hover">
                                    <thead>
                                        <tr>
                                          
                                            <th>ID</th>
                                            <th>Tên </th>
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
                                        if($active == 1){
                                            $kichhoat = 'Hoạt động';
                                        }else{
                                            $kichhoat = 'Không hoạt động';
                                        }
                                        $urlDel     =route('admin.aboutus.del',$id);;
                                        $urlEdit    =route('admin.aboutus.edit',$id);

                                    ?>
                                        <tr>
                                        
                                            <td>{{ $id }}</td>
                                            <td>{{ $name }}</td>
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