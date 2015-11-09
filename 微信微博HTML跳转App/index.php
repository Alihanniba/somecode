<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>微信微博HTML跳转App</title>
</head>
<body>
	<button id="click_start">点击</button>
	<script>
		$(document).ready(function() {
        var myFunc = function(){
            var ua = navigator.userAgent.toLowerCase();
            var config = {
                /*scheme:必须*/
                scheme_Adr: '',
                over_scheme_Adr: '',
                scheme_IOS: '',
                download_url: '',
                timeout: 600
            };
            function openclient() {
                if (ua.indexOf('os 9') > 0) {
                    //window.location.href = ua.indexOf('os') > 0 ? config.scheme_IOS : config.scheme_Adr;
                	if(ua.indexOf('os') > 0){
		            	window.location.href = config.scheme_IOS;
		            }else{
		            	if(is_over==0){
		            		window.location.href = config.scheme_Adr;
		            	}else{
		            		window.location.href = config.over_scheme_Adr;
		            	}
		            }
                }
                var startTime = Date.now();
                var ifr = document.createElement('iframe');
                //ifr.src = ua.indexOf('os') > 0 ? config.scheme_IOS : config.scheme_Adr;
                if(ua.indexOf('os') > 0){
	            	ifr.src = config.scheme_IOS;
	            }else{
	            	if(is_over==0){
	            		ifr.src = config.scheme_Adr;
	            	}else{
	            		ifr.src = config.over_scheme_Adr;
	            	}
	            }
                ifr.style.display = 'none';
                document.body.appendChild(ifr);
                var t = setTimeout(function() {
                    var endTime = Date.now();


                    if (!startTime || endTime - startTime < config.timeout + 200) {

                        window.location = config.download_url;
                    } else {
                         
                    }
                }, config.timeout);
                window.onblur = function() {
                    clearTimeout(t);
                }
            }

            function openClientInWechat () {
                window.location.href = "./wechat_guide.php?jInfo=<?php echo $jInfo; ?>&vid=<?php echo $vid; ?>&is_over=<?php echo $is_over; ?>";
            }

            var flag = ua.indexOf('micromessenger') > 0 ? true : false;
            flag = ua.indexOf('weibo') > 0 ? true : flag;
//            alert(flag);
            if (flag) {
                openClientInWechat();
            } else {
                setTimeout(function(){
                    openclient();
                }, 500)

            }
        };
        $("#click_start").on('click',  myFunc);
    });

	</script>
</body>
</html>