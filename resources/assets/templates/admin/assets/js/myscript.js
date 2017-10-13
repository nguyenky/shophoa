
function update_status(id){

	// var status = document.getElementById("status").checked;
	var status = 0;
	if($('#status'+id).is(':checked')){
		status = 1;
	}
	var token = $("input[name='_token']").val();
	// $.ajaxSetup({
	//         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	//   });
	//
	$.ajax({
		type :  "POST",
		url  : "/ajax/update-status",
		dataType : "json",
		data   : {status : status, 
				  id 	: id,
				   "_token" : token
				},
		success: function(data){
			console.log(data);
			location.reload();
		},

	});

}


	
function update_active(id){
	var active = 0;
	if($('#active'+id).is(':checked')){
		active = 1;
	}
	var token = $("input[name='_token']").val();
	// $.ajaxSetup({
	//         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	//   });
	//
	$.ajax({
		type :  "POST",
		url  : "/ajax/update-active",
		dataType : "json",
		data   : {active : active, 
				  id 	: id,
				   "_token" : token
				},
		success: function(data){
			console.log(data);
			location.reload();
		},

	});

}

function update_ship(id){
	var ship = 0;
	if($('#ship'+id).is(':checked')){
		ship = 1;
	}
	var token = $("input[name='_token']").val();
	// $.ajaxSetup({
	//         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	//   });
	//
	$.ajax({
		type :  "POST",
		url  : "/ajax/update-ship",
		dataType : "json",
		data   : {ship : ship, 
				  id 	: id,
				   "_token" : token
				},
		success: function(data){
			console.log(data);
			location.reload();
		},

	});

}
//-----------ajax demo-----

//-------------xu li checkbox----------------
		function checkedAll(field){
			for(i=0; i< field.length; i++)
				field[i].checked = true;
		}
		function unCheckedAll(field){
			for(i=0; i< field.length; i++)
				field[i].checked = false;
		}
        //--------đổi pass------
        function show_alert(){
			var cheked = document.getElementById("changepassword").checked;
			if (cheked ==1){
				$(".password").removeAttr('disabled');
			}else{
				$(".password").attr('disabled','');
			}
			
		}
		//---------------VALIDATE-------------------------

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