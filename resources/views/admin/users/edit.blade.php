@extends('templates.admin.template')
@section('main')
<?php
    $username = $arItem['username'];
    $id       = $arItem['id'];
    $roles    = $arItem['roles'];
    $fullname = $arItem['fullname'];
    $email    = $arItem['email'];
    $phone    = $arItem['phone'];
    $address  = $arItem['address'];

?>
<div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           CHỈNH SỬA THÔNG TIN NGƯỜI DÙNG
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
                            <form action="{{route('admin.users.edit',$id)}}" method="post" enctype="multipart/form-data"  >
                                {{ csrf_field()}}
                                        
                                 <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" value="{{$username}}" name="username" type="text">
                                     
                                        </div>
                                        @if(Auth::user()->id != $id)
                                        <div class="form-group">
                                        <label>Roles: </label>
                                            <?php
                                                $checked1='';
                                                $checked2='';
                                                $checked3='';
                                                if($roles==1){
                                                    $checked1 = " checked='checked' ";
                                                }
                                                elseif ($roles ==2)
                                                {
                                                    $checked2=" checked='checked' ";
                                                }
                                                else
                                                {
                                                    $checked3 =" checked='checked' ";
                                                }
                                            ?>
                                            Admin: 
                                            <input {{$checked1}} type="radio"  value="1" name="roles">||
                                            Mod: 
                                            <input  {{$checked2}} type="radio" value="2" name="roles">||
                                            Khách:
                                             <input {{$checked3}} type="radio" value="0" name="roles">||
                                     
                                        </div>
                                        @endif
                                        <div>
                                            <input type="checkbox" id="changepassword" value="1" onchange="show_alert();" name="changepassword"> : Update Password
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control password" name="password" type="password" disabled="">
                                            </div>

                                            <div class="form-group">
                                                <label>Re Password </label>
                                                <input class="form-control password" name="repassword" type="password" disabled="">
                                    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" value="{{$email}}" name="email" type="text">
                                     
                                        </div>
                                         <div class="form-group">
                                            <label>Fullname</label>
                                            <input class="form-control" value="{{$fullname}}" name="fullname" type="text">
                                     
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" value="{{$phone}}" name="phone" type="text">
                                     
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" value="{{$address}}" name="address" type="text">
                                     
                                        </div>
                                 
                                        <button type="submit" class="btn btn-danger">Update Now </button>

                                    </form>
                            </div>
                        </div>
                            </div>
                           
           
@endsection