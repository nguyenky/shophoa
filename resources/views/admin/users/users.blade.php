@extends('templates.admin.template')
@section('main')
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line">Danh sách người dùng</h1>
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
                       
                        <div class="panel-heading">
                           <div class="icon2">
                                <a href="{{route('admin.users.add')}}" title="Thêm mới"><img src="{{ $urlPublic}}/images/add.ico" alt="" /></a>
                               
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="50px">Chọn</th>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Quyền</th>
                                            <th>Email</th>

                                            <th>Fullname</th>
                                            <th>SĐT</th>
                                            <th>Địa chỉ</th>

                                            
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($arItems as $key => $value)
                                    <?php
                                        $id         = $value['id'];
                                        $username   = $value['username'];
                                        $roles      = $value['roles'];
                                        $email      = $value['email'];
                                        if($roles == 1){
                                            $auth = 'Admin';
                                        }elseif($roles == 2){
                                            $auth ='Mod';
                                        }else{
                                            $auth = 'Khách';
                                        }

                                        $phone      = $value['phone'];
                                        $fullname   = $value['fullname'];
                                        $address    = $value['address'];
                                        $urlDel     = route('admin.users.del',$id);
                                        $urlEdit    = route("admin.users.edit",$id);

                                    ?>
                                        <tr>
                                            <td><input type="checkbox" name="" value="{{$id}}"/></td>
                                            <td>{{ $id }}</td>
                                            <td>{{ $username }}</td>
                                            <td>{{ $auth }}</td>
                                            <td>{{ $email }}</td>
                                            <td>{{ $fullname }}</td>
                                            <td>{{ $phone }} </td>
                                            <td>{{ $address }} </td>
                                            
                                            <td>
                                                <div class="icon">
                                                    <a href="{{ $urlDel}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ? ');" title="Xóa"><img src="{{ $urlPublic}}/images/delete.png" alt="" /></a> &nbsp;||&nbsp;
                                                    <a href="{{ $urlEdit}}" title="Chỉnh sửa"><img src="{{ $urlPublic}}/images/update.png" alt="" /></a>
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