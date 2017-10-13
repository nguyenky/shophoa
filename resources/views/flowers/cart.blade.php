@extends('templates.public.template')
@section('main')
<?php
	// $n = Cart::content();
	// foreach ($n as $key => $value) {
	// 	echo 'đc ko';
	// }
?>
<div class="left_content">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Giỏ hàng
				</div>
				<div class="title">
					<span class="title_icon">
						<img alt="" src="{{$urlPublic}}images/bullet1.gif"> 
					</span> Giỏ hàng của bạn 
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
			            <td>Tùy chỉnh</td>
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
			            	<input type="text" class="qty" size="4" value="{{$qty}}" name="">	
			            </td>
			            <td>
			            	<div class="icon">
                                 
                                 <a  href="#" class="updateCart" id="{{$rowid}}" title="Chỉnh sửa"><img src="{{ $urlPublic}}/images/update.png" alt="" /></a>&nbsp;||&nbsp;
                                 <a href="{{ $urlDel}}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng ?');" title="Xóa"><img src="{{ $urlPublic}}/images/delete.png" alt="" /></a> 
                            <div>
			            </td>
			            <td align="right">{{$price*$qty}}</td>
			          </tr>
			             @endforeach     
			        </table>
			        <div class="button">
			        	
						<a title="" href="{{route('public.flowers.flowers')}}" class="more">Mua tiếp</a> 
						<a title="" href="{{route('public.pay.format')}}" class="more">Thanh toán</a> 
					</div>
					</form>
				</div>
				
				<div class="clear"></div>
			</div>
@endsection