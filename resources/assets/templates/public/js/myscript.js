
$(document).ready(function() {
	$('.updateCart').click(function(){
		var rowid = $(this).attr('id');
		var qty = $(this).parent().parent().parent().find('.qty').val();
		var token = $("input[name='_token']").val();
		$.ajax({
			url:'cap-nhat-san-pham/'+rowid+'/'+qty,
			type:'GET',
			cache:false,
			data:{"_token":token,"slug":rowid,"qty":qty},
			success: function (data){
				if(data=="oke"){
					window.location = "gio-hang";
					// alert("yes");
				}
				}
		});
	});
});