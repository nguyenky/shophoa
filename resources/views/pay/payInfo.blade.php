@extends('templates.public.template')
@section('main')
<?php
	$id = $arUser['id'];
	$fullname = $arUser['fullname'];
	$address = $arUser['address'];
	

?>
<form method="post" action="{{route('public.pay.payConfirm')}}">
{{csrf_field()}}
			<div class="left_content cthongtin">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Thông tin
				</div>
				<div class="title">
					<span class="title_icon">
						<img alt="" src="{{$urlPublic}}images/bullet1.gif"> 
					</span> Thông tin thanh toán
				</div>
				
				<div class="feat_prod_box_details">
			       <p class="bold">Địa chỉ giao hàng</p>
			       <div class="content">
			       		<table width="100%">
			       			<tr>
			       				<td width="20%" align="right" class="tdtitle">Họ và tên: </td>
			       				<td>{{$fullname}}</td>
			       			</tr>
			       			<tr>
			       				<td width="20%" align="right" class="tdtitle">Địa chỉ: </td>
			       				<td>{{$address}}</td>
			       			</tr>
			       		</table>
			       </div>
				</div>
				
				<div class="feat_prod_box_details">
			       <p class="bold">Phương thức thanh toán</p>
			       <div class="content">
			       @foreach($arPays as $key =>$value)
       		       		<input type="radio" value="{{$value['id']}}" required="" name="thanhtoan">{{$value['name']}}<br>
       			      @endforeach
			       	</div>
				</div>
				
				<div class="feat_prod_box_details">
			       <p class="bold">Thông tin thêm</p>
			       <div class="content">
			       		<textarea name="thongtinthem"></textarea>
			       </div>
				</div>
				
				<div class="clear"></div>
				
				<div class="button">
					<a title="" href="javaScript:window.history.back();" class="more">Quay lại</a> 
					<input type="submit" value="Tiếp tục" name="submit">
				</div>
			</div>
			</form>
@endsection