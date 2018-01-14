@extends('templates.new_public.template')
@section('main')
	
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Features Items</h2>
		@foreach($arrItems as $value)
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{$value['picture']}}" alt="" />
							<h2>${{$value['price']}}</h2>
							<p>{{$value['name']}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						</div>
						<div class="product-overlay">
							<div class="overlay-content">
								<h2>${{$value['price']}}</h2>
							<p>{{$value['name']}}</p>
								<div>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
							</div>
						</div>
				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
						<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<!--features_items-->

@endsection