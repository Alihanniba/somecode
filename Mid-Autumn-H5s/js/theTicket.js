$(document).ready(function() {
	$("#bbg button").on('click', function(event) {
		$.ajax({
		url: './theTicket.php',
		type: 'POST',
		dataType: ' json',
		data: {
			'generate_code':$("#input_code").val(),
		},
		})
		.done(function(data) {
			console.log("success");
			$("#shadom").css("display","block");
			if(data[0]==1){
				$("#yes").css("display","block");
			}else if(data[0] == 0){
				$("#no").css("display","block");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
});