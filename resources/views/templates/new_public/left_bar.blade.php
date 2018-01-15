<div class="left-sidebar">
	<h2>Category</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
		@foreach( $catsPublic as $key =>$value)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					
							<?php
								if($value['has_categories']){
							?>		
									<a data-toggle="collapse" data-parent="#accordian" href="#{{$value['name']}}">
										<span class="badge pull-right">
										<i class="fa fa-plus"></i>
										</span>
										{{$value['name']}}
									</a>
							<?php
								}else{
							?>
								<a href="{{route('public.cats.cats',['slug'=>$value['name'],'id'=>$value['id']])}}">{{$value['name']}}</a>
							<?php
								}
							?>
							
						
					
				</h4>
			</div>
			<div id="{{$value['name']}}" class="panel-collapse collapse">
				<div class="panel-body">
					<ul>
						@foreach( $value['has_categories'] as $key =>$cat)
							<li><a href="{{route('public.cats.cats',['slug'=>$cat['name'],'id'=>$cat['id']])}}">{{$cat['name']}}</a></li>
						@endforeach	
					</ul>
				</div>
			</div>
		</div>
		@endforeach		
	</div><!--/category-products-->

	<div class="brands_products"><!--brands_products-->
		<h2>Brands</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked">
				@foreach($brands as $value)
				<li><a href="#"> <span class="pull-right">({{$value['count']}})</span>{{$value['name']}}</a></li>
				@endforeach
			</ul>
		</div>
	</div><!--/brands_products-->
	
	<div class="price-range"><!--price-range-->
		<h2>Price Range</h2>
		<div class="well text-center">
			 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
			 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
		</div>
	</div><!--/price-range-->
	
	<div class="shipping text-center"><!--shipping-->
		<img src="{{$urlPublic}}images/home/shipping.jpg" alt="" />
	</div><!--/shipping-->

</div>