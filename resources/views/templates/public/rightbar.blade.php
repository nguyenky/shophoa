
<div class="right_content">

<div class="cart">
	<div class="title">
	<div class="icon">
	<?php
		$arUser = Auth::user();
	?>
	@if($arUser['fullname'] !='')
		<span class="title_icon"><img alt="" src="{{$urlPublic}}images/shopping-cart-icon.gif"> </span>Giỏ hàng của {{$arUser['fullname']}}</div>
	@else
		<span class="title_icon"><img alt="" src="{{$urlPublic}}images/shopping-cart-icon.gif"> </span>Giỏ hàng
		</div>
	@endif
	</div>
<?php
	$content = Cart::content();

	$subtotal = Cart::subtotal();
	$count = Cart::content()->count();
	
	// $cart->search(function ($cartItem, $rowId) {
 //    	return $cartItem->id === 1;
	// });

?>
		@if($subtotal=='0')
			
		@else
	<div class="home_cart_content">
		
		<table>
			<tr>
				<th>Tên</th>
				<th width="10%">Số lượng</th>
				<th width="20%">Thành tiền</th>
			</tr>
			@foreach( $content as $key =>$value)
			<?php
				$id = $value->id;
				$name = $value->name;
				$price = $value->price;
				$qty = $value->qty;
				
			?>
			<tr>
				<td>
					<a title="Xem chi tiết Hoa Violet" href="/san-pham/detail.php?id=18">{{$name}}</a>
				</td>
				<td width="24%" class="text-right">{{ $qty}}</td>
				<td width="24%" class="text-right">{!!$price*$qty!!}</td>
			</tr>
			@endforeach
				<tr>
				<td colspan="2">Tổng tiền</td>
				<td class="text-right"><span class="red">{!!$subtotal!!}</span></td>
				

			</tr>
		</table>
		<p><a title="Xem giỏ hàng của bạn" href="{{route('public.flowers.cart')}}">Xem giỏ hàng</a></p>
		
	</div>
	@endif
</div>

<div class="title">
	<span class="title_icon">
	<div class="icon"> 
		<img src="{{$urlPublic}}images/about.png" alt="" /> 
		</div>
	</span>Giới thiệu chung
</div>
<div class="about">
	<p>
		<img src="{{$urlPublic}}images/tmp/about.gif" alt="" class="right" />
		KysFlowers là nơi hội tụ của tất cả các loài hoa, đang thịnh hành nhất hiện nay
		như: hoa hồng, hoa cẩm chướng, hoa lan, hoa bách hợp... 
		[<a href="{{route('public.index.aboutus')}}" title="">chi tiết</a>]
	</p>
</div>

<div class="left_box">
	<div class="title">
		<span class="title_icon">
		<div class="icon">
			<img src="{{$urlPublic}}images/sale.png" alt="" /> 
			</div>
		</span><!-- Khuyến mãi -->
	</div>
	<!-- <div class="new_prod_box">
		<a href="/san-pham/detail.php?id=19" title="Hoa thủy tiên 1">Hoa thủy tiên 1 </a>
		<div class="new_prod_bg">
			<span class="new_icon"><img
				src="{{$urlPublic}}images/promo_icon.gif" alt="Hoa thủy tiên 1" /> </span>
			<a href="/san-pham/detail.php?id=19" title="Hoa thủy tiên 1"> <img
				src="{{$urlPublic}}images/tmp/ThuyTien_01.jpg" alt="Hoa thủy tiên 1" class="thumb" border="0" />
			</a>
		</div>
	</div> -->
</div>
<div class="right_box">
	<div class="title">
		<span class="title_icon"><img
			src="{{$urlPublic}}images/bullet5.gif" alt="" /> </span>Loại hoa
	</div>
	<ul class="list">
			@foreach($catsPublic as $key => $value)
			<?php
				$id = $value['id'];
				$name = $value['name'];
				//$id = $value['id'];
			?>
			<li><a href="{{route('public.cats.cats',$id)}}" title="{{$name}}">{{$name}}</a></li>
			@endforeach
			</ul>
</div>
<div class="clear"></div>

<div class="advs">
	<span class="title_icon">
	<div class="icon">
	<img src="{{$urlPublic}}images/images.jpg" alt="" /> </span>Quảng cáo
	</div>
</div>
<div class="advs-content">
	<img src="{{$urlPublic}}images/tmp/adv1.png" alt="" />
</div>
</div>