@extends('templates.admin.template')
@section('main')
<div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           ĐĂNG KÝ NGƯỜI DÙNG
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
                            <form action="{{route('admin.users.add')}}" method="post" id="frmUsers" enctype="multipart/form-data"  >
                                {{ csrf_field()}}
                                        
                                 <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" value="{!!old('username')!!}" name="username" type="text">
                                     
                                        </div>
                                        <div class="form-group">
                                        <label>Roles: </label>
                                            Admin: 
                                            <input type="radio"  value="1" name="roles">||
                                            Mod: 
                                            <input type="radio" value="2" name="roles">||
                                            Khách:
                                             <input type="radio" value="0" name="roles">||
                                     
                                        </div>
                                            <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" id="repassword" value="{!!old('password')!!}" name="password" type="password">
                                        </div>
                                        <div class="form-group">
                                            <label>Re Password </label>
                                            <input class="form-control" value="{!!old('repassword')!!}" name="repassword" type="password">
                                    
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" value="{!!old('email')!!}" name="email" type="text">
                                     
                                        </div>
                                         <div class="form-group">
                                            <label>Fullname</label>
                                            <input class="form-control" value="{!!old('fullname')!!}" name="fullname" type="text">
                                     
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" value="{!!old('phone')!!}" name="phone" type="text">
                                     
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" value="{!!old('address')!!}" name="address" type="text">
                                     
                                        </div>
                                 
                                        <button type="submit" class="btn btn-danger">Register Now </button>

                                    </form>
                            </div>
                        </div>
                            </div>
           
@endsection
@section('script')
@include('templates.admin.validate')
@endsection