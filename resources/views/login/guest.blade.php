@extends('templates.public.template')
@section('main')
<form action="{{route('public.payInfo_guest')}}" id="frmGuest" method="post" >
	{{csrf_field()}}
			<div class="left_content">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Nhập thông tin
				</div>
				<div class="title">
					<span class="title_icon">
						<img alt="" src="{{$urlPublic}}images/bullet1.gif"> 
					</span> Thông tin của bạn
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
		        			<input type="text"  value="{!!old('name')!!}" name="name">
		        		</p>
		        		<p>
		        			Số phone: <br>
		        			<input type="text"  value="{!!old('phone')!!}" name="phone">
		        		</p>
		        		<p>
		        			Email: <br>
		        			<input type="text"  value="{!!old('email')!!}" name="email">
		        		</p>
		        		<p>
		        			Địa chỉ: <br>
		        			<input type="text"  value="{!!old('address')!!}" name="address">
		        		</p>
		        		
		        		<p>
		        			<input type="submit" value="Tiếp tục" name="submit">
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
							$('#frmGuest').validate({	
						rules:{
							"name": {
								required: true,
								minlength: 3,
							},
							"phone": {
								required: true,
							},
							
							"email": {
								required: true,
								email: true,
							},
							
							"address": {
								required: true,

							},
						},
						messages: {
							"name": {
								required: 'Không được để trống name !!',
								minlength: 'Nhập tối thiểu 3 ký tự !!',
							},
							
							"email": {
								required: 'Không được để trống email !!',
								email: 'Email không chính xác !!',
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