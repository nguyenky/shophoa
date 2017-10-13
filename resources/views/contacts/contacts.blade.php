@extends('templates.public.template')
@section('main')
<div class="left_content">
				<div class="crumb_nav">
					<a href="/">Trang chủ</a> &gt;&gt; Liên hệ
				</div>
				<div class="title">
					<span class="title_icon">
						<img alt="" src="{{$urlPublic}}images/bullet1.gif"> 
					</span> Liên hệ với chúng tôi

				</div>
				<!-- ---------------------- -->
				<style type="text/css">
					.message{
						color: #85C800;
						font-size: 17px;
						margin-left: 180px;
					}
					.errors{
						margin-left: 175px;
						color: red;
		                font-style: italic;
					}
					label.errors {
		                color: red;
		                font-style: italic;
		                
		            }
				</style>
				<!-- ----------------------- -->
				<div class="message">
					@if(Session::has('msg'))
						<i>{{Session::get('msg')}}</i>
					@endif
				</div>
				<div class="errors">
				 @if (count($errors) > 0)
                                    <div class="erorrs">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                </div>
				<div class="feat_prod_box_details lien-he">
					
					<form method="post" id="frmContacts" action="{{route('public.contacts.contacts')}}">
					{{csrf_field()}}
						<table>
							<tr>
								<td width="30%">Họ và tên: </td>
								<td>
									<input type="text" value="{!!old('name')!!}"  name="name" >
								</td>
							</tr>
							<tr>
								<td width="30%">Số điện thoại: </td>
								<td>
									<input type="text" value="{!!old('phone')!!}"  name="phone"  >
								</td>
							</tr>
							<tr>
								<td width="30%">Email: </td>
								<td>
									<input type="text" email="" value="{!!old('email')!!}"  name="email" >
								</td>
							</tr>
							<tr>
								<td width="30%">Nội dung: </td>
								<td>
									<textarea name="message"></textarea>

								</td>
							</tr>
							<tr>
								<td width="30%"></td>
								<td>
									<input type="submit" value="Gửi liên hệ" name="submit">
									<input type="reset" value="Nhập lại" name="reset">
								</td>
							</tr>
						</table>
					</form>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#frmContacts').validate({	
								rules:{
									"name": {
										required: true,
									},
									"phone": {
										required: true,
									},
									"email": {
										required: true,
										email: true
									},
								},
								messages: {
									"name": {
										required: "Vui lòng nhập tên !!",
									},
									"phone": {
										required: "Vui lòng nhập số điện thoại !!",
									},
									"email": {
										required: "Vui lòng nhập email !!!",
										email : "Cú pháp email không chính xác !!"
									},
								},
							});
						});
					</script>
				</div>
				<div class="clear"></div>
			</div>
@endsection
