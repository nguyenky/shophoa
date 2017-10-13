@extends('templates.public.template')
@section('main')
<?php
	$uid 		=  $arItem->id;
	$name 		=  $arItem->name;
	$message 	=  $arItem->message;
	$content 	= Cart::content();
	$pay_id 	= $payment['id'];
	$pays 		= $payment['name'];
	$document 	= $payment['document'];

?>
<form method="post" action="{{route('public.pay.order_guest',['id'=>$uid])}}">
{{csrf_field()}}
			<div class="left_content cthongtin">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Xác nhận
				</div>
				<div class="title">
					<span class="title_icon">
						<img alt="" src="{{$urlPublic}}images/bullet1.gif"> 
					</span> Xác nhận thanh toán của {{$name}}
				</div>
				
				<div class="feat_prod_box_details">
			       <p class="bold">Địa chỉ giao hàng</p>
			       <div class="content">
			       		<table width="100%">
			       			<tr>
			       				<td width="20%" align="right" class="tdtitle">Họ và tên: </td>
			       				<td>{{$name}}</td>
			       			</tr>
			       			<tr>
			       				<td width="20%" align="right" class="tdtitle">Địa chỉ: </td>
			       				<td>{{$message}}</td>
			       			</tr>
			       		</table>
			       </div>
				</div>
				
				<div class="feat_prod_box_details">
					<form method="post" action="">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
			        <table class="cart_table">
			          <tr class="cart_title">
			            <td>Hình ảnh</td>
			            <td>Tên sản phẩm</td>
			            <td>Giá</td>
			            <td>Số lượng</td>
			            
			            <td>Tổng tiền</td>
			          </tr>
			          
			          @foreach( $content as $key => $value)
			          <?php
			          	$id 		= $value->id;
			          	$rowid 		= $value->rowId;
						$name 		= $value->name;
						$nameSeo 	= str_slug($name);
						$price 		= $value->price;
						$qty 		= $value->qty;
						$picture 	= $value->options->img;
						$urlPicture = asset("/storage/app/files/{$picture}");
						$urlDel 	=route('public.flowers.del',$rowid);
						$urlDetail 	=route('public.flowers.detail',['slug'=>$nameSeo,'id'=>$id]);
							
			          ?>
			          <tr valign="middle">
			          	
			            <td>
			            	<a href="{{$urlDetail}}">
			            		<img border="0" src="{{$urlPicture}}" alt="" class="cart_thumb">
			            	</a>
			            </td>
			            <td align="left">
							<a title="" href="{{$urlDetail}}">{{$name}}</a>
						</td>
			            <td align="right">{{$price}}</td>
			            <td align="center">
			            	{{$qty}}
			            </td>
			            
			            <td align="right">{{$price*$qty}}</td>
			          </tr>
			             @endforeach     
			        </table>
					</form>
				</div>
				
				<div class="feat_prod_box_details">
			       <p>Phương thức thanh toán</p>
			       <div class="content">
			       	{!!$pays!!}
			       </div>
			       <div class="content">
			       		HƯỚNG DẪN THANH TOÁN: <br />
			       		<p>
			       			{!!$document!!}

			       		</p>
			       			
					</div>
				</div>
				
				<div class="feat_prod_box_details">
			       <p>Thông tin thêm</p>
			       <div class="content">
			       		{!!$thongtinthem!!}  
			       		<input type="hidden" name="thongtinthem" value="{!!$thongtinthem!!}  ">    
			       		<input type="hidden" name="pays" value="{{$pay_id}}  ">    
			       	</div>
				</div>
				
				<div class="clear"></div>
				
				
				<div class="button">
					<a title="" href="javaScript:window.history.back();" class="more">Quay lại</a> 
					<input type="submit" value="Thanh toán" name="submit">
				</div>
			</div>
			</form>
@endsection