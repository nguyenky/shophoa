@extends('templates.public.template')
@section('main')

<div class="left_content">
	<div class="title">
		<span class="title_icon"><img
			src="{{$urlPublic}}images/bullet1.gif" alt="" /> </span>Sản phẩm
		nổi bật
	</div>
		@foreach($arItems as $key =>$value)
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
		<div class="feat_prod_box">
		<div class="prod_img">
			<a href="{{$urlDetail}}" title="{{ $name}}"><img
				src="{{$urlPicture}}" alt="{{ $name}}" border="0" /> </a>
		</div>
		<div class="prod_det_box">
			<div class="box_center">
				<div class="prod_title">
				{{ $name}}				
				</div>
				<p class="details">
				{!!$preview!!}</p>
				<a href="{{$urlDetail}}" title="Hoa thủy tiên 1" class="more">- Chi
					tiết -</a>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	@endforeach
		
		<div class="clear"></div>
	
	
	<div class="title">
		<span class="title_icon"><img
			src="{{$urlPublic}}images/bullet2.gif" alt="" /> </span>Sản phẩm
		mới
	</div>
	<div class="new_products">
	@foreach($arItems_news as $key =>$value)
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
						<a title="{{$name}}" href="{{$urlDetail}}">{{$name}}</a>
						<div class="new_prod_bg">

							<span class="new_icon"> <img alt=""
								src="{{$urlPublic}}images/new_icon.gif">
							</span> <a title="{{$name}}" href="{{$urlDetail}}">
								<img border="0" class="thumb" alt="{{$name}}"
								src="{{$urlPicture}}">
							</a>
						</div>
					</div>
				@endforeach
			</div>
	<div class="clear"></div>
</div>
@endsection