@extends('templates.public.template')
@section('main')
<form action="{{route('public.login.register')}}" id="frmDangKy" method="post" >
	{{csrf_field()}}
			<div class="left_content">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Đăng ký
				</div>
				<div class="title">
					<span class="title_icon">
						<img alt="" src="images/bullet1.gif"> 
					</span> Đăng ký tài khoản
				</div>
				@if (count($errors) > 0)
                                    <div class="erorr">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

				<div class="dangnhap">
		        	<div class="col-content">
		        		        		<p>
		        			Họ và tên: <br>
		        			<input type="text"  value="{!!old('fullname')!!}" name="fullname">
		        		</p>
		        		<p>
		        			Số phone: <br>
		        			<input type="text"  value="{!!old('phone')!!}" name="phone">
		        		</p>
		        		<p>
		        			E-mail: <br>
		        			<input type="text"  value="{!!old('email')!!}" name="email">
		        		</p>
		        		<p>
		        			Địa chỉ: <br>
		        			<input type="text"  value="{!!old('address')!!}" name="address">
		        		</p>
		        		<p>
		        			Tên đăng nhập: <br>
		        			<input type="text"  value="{!!old('username')!!}" name="username">
		        		</p>
		        		<p>
		        			Mật khẩu: <br>
		        			<input type="password"  value="{!!old('password')!!}" name="password">
		        		</p>
		        		<p>
		        			 Xác nhận mật khẩu: <br>
		        			<input type="password" id="repassword" value="" name="repassword">
		        		</p>
		        		<p>
		        			<input type="submit" value="Đăng ký" name="submit">
		        			<input type="reset" value="Nhập lại" name="reset">
		        		</p>
		        	</div>
		        <div class="clear"></div>
			</div>
				<div class="clear"></div>
			</div>
			</form>
			<script type="text/javascript">
				$(document).ready(function(){
							$('#frmDangKy').validate({	
						rules:{
							"username": {
								required: true,
								minlength: 3,
							},
							
							"password": {
								required: true,
								minlength: 6,
							},
							"repassword": {
								equalTo: "#repassword"
							},
							"email": {
								required: true,
								email: true,
							},
							"fullname": {
								required: true,
								minlength: 3,
							},
							"phone": {
								required: true,

							},
							"address": {
								required: true,

							},
						},
						messages: {
							"username": {
								required: 'Không được để trống username !!',
								minlength: 'Nhập tối thiểu 3 ký tự !!',
							},
							
							"password": {
								required: 'Không được để trống mật khẩu !!',
								minlength: 'Nhập tối thiểu 6 ký tự !!',
							},
							"repassword": {
								equalTo: 'Xác nhận mật khẩu không chính xác !! '
							},
							"email": {
								required: 'Không được để trống email !!',
								email: 'Email không chính xác !!',
							},
							"fullname": {
								required: 'Không được để trống tên !!',
								minlength: 'Nhập tối thiểu 6 ký tự !!',
							},
							"phone": {
								required: 'Không được để trống số điện thoại !!',
							},
							"address": {
								required: 'Không được để trống địa chỉ !!',

							},
							
						},
					});
				});
			</script>
@endsection