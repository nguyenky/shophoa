<div class="footer">
	<div class="left_footer">
		<img src="{{$urlPublic}}images/footer_logo.gif" alt="" />
	</div>
	<div class="right_footer">
	<?php
					 	$arUser = Auth::user();
					?>
		<ul>
			<li><a href="{{route('public.index.aboutus')}}">Trang chủ</a></li>
			<li><a href="/gioi-thieu/">Giới thiệu</a></li>
			<li><a href="{{route('public.flowers.flowers')}}">Sản phẩm</a></li>
			@if($arUser['roles'] !='')
			<li><a href="{{route('admin.auth.logout')}}">Đăng xuất</a></li>
			@else
			<li><a href="{{route('public.login.login')}}">Đăng nhập</a></li>
			@endif
			
		</ul>
	</div>
	<div class="clear"></div>
</div>
</div>
</body>
</html>