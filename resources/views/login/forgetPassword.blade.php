@extends('templates.public.template')
@section('main')
<form action="{{route('public.login.forgetPassword')}}" method="post" >
	{{csrf_field()}}
			<div class="left_content">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Nhập thông tin
				</div>
				<div class="title">
					<span class="title_icon">
						<img alt="" src="{{$urlPublic}}images/bullet1.gif"> 
					</span> Nhập vào thông tin của bạn

				</div>
				<style type="text/css">
					.message{
                		color: #85C800;
                        font-size: 17px;
                        margin-left: 180px;
                    }
				</style>
				<div class="message">
					@if(Session::has('msgs'))
						<i>{{Session::get('msgs')}}</i>
					@endif
				</div>

				<div class="erorr">
					@if(Session::has('msg'))
                                    
                                    <label id="name-error" class="error" for="name">{{Session::get('msg')}}</label>
                                @endif
                     </div>
				<div class="dangnhap">
		        	<div class="col-content">
		        		        		<p>
		        		<p>
		        			Username: <br>
		        			<input type="text" value="" name="username">
		        		</p>
		        		
		        		<p>
		        			Xác nhận email : <br>
		        			<input type="text" value="" name="email">
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
@endsection