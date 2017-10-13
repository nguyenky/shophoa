<script type="text/javascript">
	$(document).ready(function(){
		$('#frmForm').validate({	
			rules:{
				"tentin": {
					required: true,
				},
				"mota": {
					required: true,
				},
			},
			messages: {
				"tentin": {
					required: "Vui lòng nhập Tên tin",
				},
				"mota": {
					required: "Vui lòng nhập Mô tả",
				},
			},
		});
		$('#frmAboutUs').validate({	
			rules:{
				"name": {
					required: true,
				},
				"content": {
					required: true,
				},
			},
			messages: {
				"name": {
					required: "Không được để trống !!",
				},
				"content": {
					required: "Vui lòng nhập nội dung !!",
				},
			},
		});
		$('#frmAdvs').validate({	
			rules:{
				"name": {
					required: true,
				},
				"link": {
					required: true,
				},
			},
			messages: {
				"name": {
					required: "Không được để trống !!",
				},
				"link": {
					required: "Vui lòng nhập nội dung !!",
				},
			},
		});
		$('#frmCats').validate({	
			rules:{
				"name": {
					required: true,
					minlength: 6,
				},
				
			},
			messages: {
				"name": {
					required: "Không được để trống !!",
					minlength: "Không được nhỏ hơn 6 ký tự !!",
				},
			},
		});
		$('#frmPays').validate({	
			rules:{
				"name": {
					required: true,
					minlength: 6,
				},
				"document": {
					required: true,
					minlength: 6,
				},
				
			},
			messages: {
				"name": {
					required: "Không được để trống !!",
					minlength: "Không được nhỏ hơn 6 ký tự !!",
				},
				"document": {
					required: "Không được để trống !!",
					minlength: "Không được nhỏ hơn 6 ký tự !!",
				},
			},
		});
		$('#frmContacts').validate({	
			rules:{
				"name": {
					required: true,
					minlength: 6,
				},
				"phone": {
					required: true,
				},
				"email":
				{
					required: true,
					email: true
				},

				
			},
			messages: {
				"name": {
					required: "Không được để trống !!",
					minlength: "Không được nhỏ hơn 6 ký tự !!",
				},
				"phone": {
					required: "Không được để trống !!",
				},
				"email":{
							required: "Vui lòng nhập Email !!!",
							email: "Vui lòng nhập đúng cấu trúc email !!!"
						},
			},
		});
		$('#frmFlowers').validate({	
			rules:{
				"name": {
					required: true,
					minlength: 6,
				},
				"price": {
					required: true,
				},
				"preview":
				{
					required: true,
					email: true
				},
				"detail":
				{
					required: true,
					email: true
				},

				
			},
			messages: {
				"name": {
					required: "Không được để trống !!",
					minlength: "Không được nhỏ hơn 6 ký tự !!",
				},
				
			},
		});
		$('#frmType').validate({	
			rules:{
				"name": {
					required: true,
					minlength: 6,
				}
				
			},
			messages: {
				"name": {
					required: "Không được để trống !!",
					minlength: "Không được nhỏ hơn 6 ký tự !!",
				},
				
			},
		});
		$('#frmUsers').validate({	
			rules:{
				"username": {
					required: true,
					minlength: 3,
				},
				"roles": {
					required: true,
				},
				"password": {
					required: true,
					minlength: 6,
				},
				"repassword": {
					equalTo: "#repassword"
				},
				"email": {
					required: true,
					email: true,
				},
				"fullname": {
					required: true,
					minlength: 3,
				},
				"phone": {
					required: true,

				},
				"address": {
					required: true,

				},
			},
			messages: {
				"username": {
					required: 'Không được để trống username !!',
					minlength: 'Nhập tối thiểu 3 ký tự !!',
				},
				"roles": {
					required: 'Chọn quyền user !!',

				},
				"password": {
					required: 'Không được để trống mật khẩu !!',
					minlength: 'Nhập tối thiểu 6 ký tự !!',
				},
				"repassword": {
					equalTo: 'Xác nhận mật khẩu không chính xác !! '
				},
				"email": {
					required: 'Không được để trống email !!',
					email: 'Email không chính xác !!',
				},
				"fullname": {
					required: 'Không được để trống tên !!',
					minlength: 'Nhập tối thiểu 6 ký tự !!',
				},
				"phone": {
					required: 'Không được để trống số điện thoại !!',
				},
				"address": {
					required: 'Không được để trống địa chỉ !!',

				},
				
			},
		});
	});
</script>