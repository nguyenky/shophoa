@extends('templates.admin.template')
@section('main')
<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Chi tiết hóa đơn</h1>
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

                                <table align="conter" class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Tên hoa</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($arItems as $key => $value)
                                    <?php
                                        $product    = $value['name'];
                                        $price      = $value['price'];
                                        $qty        = $value['qty'];
                                        $amount     = $value['amount'];
                                    ?>
                                        <tr>
                                            
                                            <td>{{ $product }}</td>
                                            <td>{{ $price }}</td>
                                            <td>{{$qty}}</td>
                                            <td>{{ $amount }}</td> 
                                        </tr>
                                    @endforeach
                                    
                                    </tbody>
                                    <tr></tr>
                                </table>
                                <div style="margin-right: 150px; 
                                " align="right" >Tổng tiền:  <strong>{{$allAmount['amount']}} VNĐ</strong></div>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
            </div>
                <!-- /. ROW  -->

            </div>
@endsection