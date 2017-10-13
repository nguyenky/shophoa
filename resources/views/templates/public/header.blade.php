
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{{ $titlePublic }}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<link rel="stylesheet" type="text/css" href="{{$urlPublic}}style.css" />
	<link rel="icon" href="{{$urlPublic}}images/basket.ico" />
	<script src="{{$urlPublic}}js/jquery-1.10.2.js"></script>
	<script src="{{$urlPublic}}js/myscript.js"></script>

	<script src="{{$urlPublic}}js/java.js" type="text/javascript"></script>
	<!-- -------------VALIDATE---------
 --> <script type="text/javascript" src="{{ url('resources/assets/jquery/jquery-1.12.3.min.js')}}"> </script>
    <script type="text/javascript" src="{{ url('resources/assets/jquery/jquery.validate.min.js')}}"> </script>
</head>
<body>
	<div id="wrap">
		<div class="header">
			<div class="logo">
				<a href="{{route('admin.index.index')}}"><img src="{{$urlPublic}}images/logo.gif" alt="" border="0" /></a>
			</div>
			<div id="menu">
			<?php
				$urlCurrent =url()->current();
				$arUrl = explode("/", $urlCurrent);
				//-------------------------
					$selected_trangchu='';
					$selected_gioithieu='';
					$selected_sanpham='';
					$selected_quatang='';
					$selected_lienhe='';
					$selected_dangnhap='';
				if(strpos($urlCurrent,'trang-chu')==true){
					$selected_trangchu='selected';
				}elseif(strpos($urlCurrent,'gioi-thieu')==true){
					$selected_gioithieu='selected';
				}elseif(strpos($urlCurrent,'san-pham')==true){
					$selected_sanpham='selected';
				}elseif(strpos($urlCurrent,'qua-tang')==true){
					$selected_quatang='selected';
				}elseif(strpos($urlCurrent,'lien-he')==true){
					$selected_lienhe='selected';
				}elseif(strpos($urlCurrent,'dang-ky')==true){
					$selected_dangnhap='selected';
				}else{
					$selected_trangchu='selected';
				}
			?>
				<ul>
					<li class="{{$selected_trangchu}}"><a href="/">Trang chủ</a></li>
					<li class="{{$selected_gioithieu}}"><a href="{{route('public.index.aboutus')}}">Giới thiệu</a></li>
					<li class="{{$selected_sanpham}}"><a href="{{route('public.flowers.flowers')}}">Sản phẩm</a></li>
					<li class="{{$selected_quatang}}"><a href="{{route('public.flowers.gift')}}">Quà tặng nổi bật</a></li>
					<li class="{{$selected_lienhe}}"><a href="{{ route('public.contacts.contacts')}}">Liên hệ</a></li>
					<?php
					 	$arUser = Auth::user();
					?>
					@if($arUser['roles'] !='')
					<li class="{{$selected_dangnhap}}"><a href="{{route('admin.auth.logout')}}">Đăng xuất</a></li>
					@else
					<li class="{{$selected_dangnhap}}"><a href="{{route('public.login.login')}}">Đăng nhập</a></li>
					@endif
				</ul>
			</div>
		</div>
	<!-- ----------CSS bổ sung-------- -->
	<style type="text/css">
		.icon img{
			width:20px;
			margin-right: 5px;
		}
		.quen{
			margin-bottom: 20px ;
		}
	</style>
	<!-- ----------------------------- -->