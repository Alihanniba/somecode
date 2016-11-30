$(document).ready(function() {
	$("#enter").on('click',  function() {
		$.ajax({
			url: './API.php?action=getGeoCode',
			type: 'POST',
			dataType: 'json',
			data: {
				'local' : $("#address").val(),
				'address' :$("#moon_cake").val(),
			},
		})
		.done(function(data) {
			console.log("success");
			console.log(data.info);
			// console.log(data.info.Mooncake);
			distance = data.info.distance;
			distance = distance.substring(0,distance.length-2);
			distance = Math.round(distance);
			$("#local #my_local").html($("#address").val());
			$("#km label").html(distance);
			$("#local #how_many").html(distance);
			$("#number").html(data.info.Mooncake);
			$("#yuebing label").html(data.info.Mooncake);
			$("#add_address").css("display","none");
			$("#distance").css("display","block");

			// window.location.replace("./index.php");
		})
		.fail(function() {
			console.log("error");
			window.location.replace("./index.php");
		})
		.always(function() {
			console.log("complete");
		});
		
	});


		// $("#wb_publish").on('click',function(event) {
		// 	console.log($("#my_local").text());
		// 	console.log($("#how_many").text());
		// 	console.log($("#moonCake").text());
		// 	 $.ajax({
		//                           url: './zhongqiu.php',
		//                          type: 'POST',
		//                           dataType: 'json',
		//                           async: false,
		//                           data: {
		//                               'img_url': $("#your_img img")[0].src,
		//                               'open_id':0,
		//                               'local':$("#my_local").text(),
		//                               'distance':$("#how_many").text(),
		//                               'moon_cake':$("#moonCake").text(),
		//                           },
		//                          })
		//                          .done(function(data) {
		//                               //alert("success");
		//                               console.log(data);
		//                               $("#ticketCode").html(data.generate_code);
		//                               $("#add_address").css("display","none");
		//                               $("#distance").css("display","none");
		//                               $("#mid_autumn").css("display","none");
		//                               $("#guide_page").css("display","none");
		//                               $("#lucky_co").css("display","block");
		//                          })
		//                          .fail(function(data) {
		//                           console.log("error");
		//                           alert("erroryes");
		//                          })
		//                          .always(function() {
		//                           console.log("complete");
		//                          });
		// });

			
	

});