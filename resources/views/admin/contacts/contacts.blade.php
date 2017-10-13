@extends('templates.admin.template')
@section('main')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Danh sách liên hệ</h1>
        <h1 class="page-subhead-line">
            @if(Session::has('msg'))
                {{ Session::get('msg')}}
            @endif
        </h1>
    </div>
</div>
               
            
                <div class="col-md-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Tên liên hệ</th>
                                            <th>Email</th>
                                            <th>SĐT</th>

                                            <th>Địa chỉ</th>
                                            <th>Tin nhắn</th>

                                            
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($arItems as $key => $value)
                                    <?php
                                        $id         = $value['id'];
                                        $name       = $value['name'];
                                        $email      = $value['email'];
                                        $phone      = $value['phone'];
                                        $message    = $value['message'];
                                        $address    = $value['address'];
                                        $urlDel     = route('admin.contacts.del',$id);

                                    ?>
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{ $name }}</td>
                                            <td>{{ $email }}</td>
                                            <td>{{ $phone }}</td>
                                            <td>{{ $address }} </td>
                                            <td>{{ $message }} </td>
                                            
                                            
                                            <td>
                                                <div class="icon">
                                                    <a href="{{ $urlDel}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ? ');" title="Xóa"><img src="{{ $urlPublic}}/images/delete.png" alt="" />
                                                <div>


                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="paginate">
                                {{$arItems->Links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
    </div>
           
@endsection