@extends('templates.admin.template')
@section('main')
<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Quản lý đơn hàng</h1>
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


                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form method="POST" >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                <table align="conter" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Khách hàng</th> 
                                            <th width="100px">Ngày tạo</th>
                                            <th width="50px">TT Thanh toán</th>
                                            <th width="50px">TT Kích hoạt</th>
                                            <th width="50px">TT Gửi hàng</th>
                                            <th width="120px">PP thanh toán</th>
                                            <th width="100px">Thông tin thêm</th>
                                            <!-- <th>Tên khách hàng</th> -->
                                            <th>Địa chỉ</th>
                                            <th width="70px">SĐT</th>
                                            <th width="70px">Email</th>
                                            <th width="100px">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($arItems as $key => $value)
                                    <?php
                                        $id         = $value['oid'];
                                        $username   = $value['user_name'];
                                        $date       = $value['ocreated_at'];
                                        $status     = $value['status'];
                                        $active     = $value['active'];
                                        $ship       = $value['ship'];
                                        $payment    = $value['name'];
                                        $message    = $value['message'];
                                        // $name       = $value['fullname'];
                                        $address    = $value['user_address'];
                                        $phone      = $value['user_phone'];
                                        $email      = $value['user_email'];

                                        $urlDel     = route('admin.orders.del',$id);
                                        $urlDetail  = route('admin.orders.order_detail',$id);
                                    ?>
                                        <tr>

                                            <td>{{ $id }}</td>
                                            <td>{{ $username }}</td>
                                            <td>{{ $date}}</td>
                                            <td>
                                                <input  
                                                    <?php 
                                                        if( $status == 1){
                                                            echo "checked='checked'";
                                                        }
                                                    ?> 
                                                type="checkbox" id="status{{$id}}" name="status" value="1"  
                                                onchange="update_status({{$id}});"

                                                />

                                            </td>
                                            <td>
                                                <input  
                                                    <?php 
                                                        if( $active ==1){
                                                            echo "checked='checked'";
                                                        }
                                                    ?> 
                                                type="checkbox" id="active{{$id}}" name="active" value="1"  
                                                onchange="update_active({{$id}});" >
                                            </td>
                                            <td>
                                                <input  
                                                    <?php 
                                                        if( $ship ==1){
                                                            echo "checked='checked'";
                                                        }
                                                    ?> 
                                                type="checkbox" id="ship{{$id}}" name="ship" value="1"  
                                                onchange="update_ship({{$id}});" >
                                            </td>
                                            <td>{{ $payment }}</td>
                                            <td>{{ $message }}</td>
                                            <!--  -->
                                            <td>{{ $address }}</td>
                                            <td>0{{ $phone }}</td>
                                            <td>{{ $email }}</td>
                                            
                                            
                                            <td>
                                                <div class="icon">
                                                    <a href="{{$urlDel}}" title="Xóa"><img src="{{ $urlPublic}}/images/delete.png" alt="" /></a>|
                                                    <a href="{{$urlDetail}}" title="Chỉnh sửa"><img src="{{ $urlPublic}}/images/detail.png" alt="" /></a>
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
                     {{$arItems->Links()}}
                </div>
            </div>
                <!-- /. ROW  -->

            </div>
@endsection