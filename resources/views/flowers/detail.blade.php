@extends('templates.public.template')
@section('main')
<?php
			$id = $arItem['id'];
			$name = $arItem['name'];
			$picture = $arItem['picture'];
			$preview = $arItem['preview'];
			$price = $arItem['price'];
			$detail = $arItem['detail'];

			if($picture !=''){
				$urlPicture = asset("/storage/app/files/{$picture}");
			}else{
				$urlPicture = asset("/storage/app/defoult/nohoa.png");
			}	
?>
<div class="left_content">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Sản phẩm
				</div>
				<div class="title">
					<span class="title_icon"><img alt="" src="{{$urlPublic}}images/bullet1.gif"> </span>
						{{$name}}</div>
				<div class="feat_prod_box_details">
					<div class="prod_img">
						<img border="0" class="imgDetail" alt="Hoa thủy tiên 1" src="{{$urlPicture}}">
					</div>
					<div class="prod_det_box">
						<div class="box_top"></div>
						<div class="box_center">
							<div class="prod_title">Giới thiệu</div>
							<p class="details">
							{!!$preview!!}</p>
							<div class="price">
								<strong>Giá:</strong> <span class="red">{{$price}} VNĐ</span>
							</div>
							<!-- ------------------------------------------------ -->
							<style type="text/css">
								button.more {
									  background: none repeat scroll 0 0 #961B1E;
									  border-radius: 5px;
									  color: #FFFFFF;
									  float: right;
									  font-size: 12px;
									  font-weight: bold;
									  margin-right: 10px;
									  padding: 5px 12px;
									  text-decoration: none;
									}
							</style>
							<!-- ------------------------------------------------ -->
							<form method="post" action="{{route('public.flowers.giaodich',$id)}}">
							{{csrf_field()}}
							Số lượng: <input type="text" id="item_number" size="3" value="1" name="number">
							<!-- <a id="buynow" title="Click để mua sản phẩm này" class="more" href="">Mua ngay</a> -->
							<!-- <input type="submit" name="" id="buynow" class="more" value="Mua Ngay"> -->
							<button class="more">Mua </button>
							</form>
							<div class="clear"></div>
						</div>
						<div class="box_bottom"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="demolayout" id="demo">
					<ul class="demolayout" id="demo-nav">
						<li><a href="#tab1" class="active">Thông tin chi tiết</a></li>
						<li><a href="#tab2" class="active">Sản phẩm liên quan</a></li>
					</ul>
					<div class="tabs-container">
						<div id="tab1" class="tab">
							{!!$detail!!}
						</div>
						<div id="tab2" class="tab" style="display: none;">
								@foreach($arItemsLQ as $key =>$value)
								<?php
									$id = $value['id'];
									$name = $value['name'];
									$picture = $value['picture'];
									$preview = $value['preview'];
									if($picture !=''){
										$urlPicture = asset("/storage/app/files/{$picture}");
									}else{
										$urlPicture = asset("/storage/app/defoult/nohoa.png");
									}
									//--------------
									$nameSeo = str_slug($name);
									$urlDetail =route('public.flowers.detail',['slug'=>$nameSeo,'id'=>$id]);
								?>	
								<div class="new_prod_box">
									<a title="{{ $name}}" href="{{$urlDetail}}">{{$name}}</a>
									<div class="new_prod_bg">
										<a title="{{$name}}" href="{{$urlDetail}}"> <img border="0" class="thumb" alt="{{$name}}" src="{{$urlPicture}}">
										</a>
									</div>
								</div>
								@endforeach
											
											<div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<script type="text/javascript">
		//begin tab
		var tabber1 = new Yetii({
			id: 'demo'
		});
	</script>
@endsection