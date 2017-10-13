@extends('templates.public.template')
@section('main')
<div class="left_content">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Đăng nhập
				</div>
				<div class="title">
					<span class="title_icon">
					<div class="icon">
						<img alt="" src="{{ $urlPublic}}images/login.png"> 
						</div>
					</span> Đăng nhập
				</div>
				<div class="frmdangnhap">
			        <div class="col-left fl">
			        	<p class="tit">Bạn là khách hàng mới</p>
			        	<div class="col-content">
			        		<form name="frmShop" method="post" action="{{route('public.login.login')}}">
			        		{{csrf_field()}}
				        		<p>Tùy chọn Thanh toán:</p>
				        		<input type="radio" required="" value="register" name="register"> Đăng ký tài khoản<br> 
				        		<input type="radio" required="" value="guest" name="register"> Mua hàng không cần đăng ký tài khoản
				        		<p class="dangky">Bạn hãy đăng ký một tài khoản, hoàn toàn nhanh chóng và miễn phí.</p>
				        		<input type="submit" value="Tiếp tục" name="submit">
				        	</form>
			        	</div>
			        </div>
			        <div class="col-right fr">
			        	<p class="tit">Chào mừng bạn trở lại</p>
			        	<div class="col-content">
			        		<form name="frmShopLogin" method="post" action="{{route('admin.auth.login')}}">
			        		{{csrf_field()}}
				        		<p>Vui lòng đăng nhập.</p>
				        		
				        			        		<p>
				        			Tên đăng nhập: <br>
				        			<input type="text" required="" value="" name="username">
				        		</p>
				        		<p>
				        			Mật khẩu: <br>
				        			<input type="password" required="" value="" name="password">
				        		</p>
				        		<p>	<div class="quen">
				        			<a href="{{route('public.login.forgetPassword')}}">Quên mật khẩu</a> 
				        			</div>
				        			<input type="submit" value="Đăng nhập" name="submit">
				        		</p>
			        		</form>
			        	</div>
			        </div>
			        <div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
@endsection