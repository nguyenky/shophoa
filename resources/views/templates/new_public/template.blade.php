@include('templates.new_public.header')
@include('templates.new_public.slide')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('templates.new_public.left_bar')
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('main')
					@include('templates.new_public.mini_categories')
					
				</div>
			</div>
		</div>
	</section>
@include('templates.new_public.footer')
@yield('angularjs')

