<?php 
	//php手机端PC端跳转
	function is_mobile() { 
	    $user_agent = $_SERVER['HTTP_USER_AGENT']; 
	    $mobile_agents = array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi", 
	    "android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio", 
	    "au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu", 
	    "cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ", 
	    "fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi", 
	    "htc","huawei","hutchison","inno","ipad","ipaq","iphone","ipod","jbrowser","kddi", 
	    "kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo", 
	    "mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-", 
	    "moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia", 
	    "nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-", 
	    "playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo", 
	    "samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank", 
	    "sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit", 
	    "tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin", 
	    "vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce", 
	    "wireless","xda","xde","zte"); 
	    $is_mobile = false; 
	    foreach ($mobile_agents as $device) { 
	        if (stristr($user_agent, $device)) { 
	            $is_mobile = true; 
	            break; 
	        } 
	    } 
	    return $is_mobile; 
	} 
	if (!is_mobile()) { 
	    header('Location: http://www.baidu.com/');
	    return;
	} 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>判断PC端与客户端</title>
</head>
<body>
	<script>
		//js手机端PC端跳转
		function browserRedirect() {
			var sUserAgent = navigator.userAgent.toLowerCase();
			var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
			var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
			var bIsMidp = sUserAgent.match(/midp/i) == "midp";
			var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
			var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
			var bIsAndroid = sUserAgent.match(/android/i) == "android";
			var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
			var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";

			if (! (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM)) {
		    	window.location.href = "http://www.baidu.com";
			}
		}
		window.onload = function(){
			browserRedirect();
		}
	</script>
</body>
</html>

