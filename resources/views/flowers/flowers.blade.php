@extends('templates.public.template')
@section('main')
<div class="left_content">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Sản phẩm
				</div>
				<div class="title">
					<span class="title_icon"> <img alt=""
						src="{{$urlPublic}}images/bullet1.gif">
					</span> Các sản phẩm tại Shop
				</div>

				<div class="new_products">
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
					
					<div class="pagination">
						{{$arItems->Links()}}
					</div>

				</div>

				<div class="clear"></div>
			</div>
			@endsection