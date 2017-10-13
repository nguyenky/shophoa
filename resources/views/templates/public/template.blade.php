@include('templates.public.header')
	<div class="center_content">
		@yield('main')
		@yield('script')
		@include('templates.public.rightbar')
		<div class="clear"></div>
	</div>
@include('templates.public.footer')
