<?php 
require_once("./cc.php");
// require_once("./jssdk.php");

$open_id = $_GET['openid'];
$query = $dbh->prepare("SELECT generate_code FROM `Mid_Autumn` WHERE open_id = $open_id");
if($query->execute()){
	$generate_code = $query->fetch();
}else{

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf8">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" name="viewport" id="viewport" />
	<link rel="stylesheet" href="css/index.css">
	<title>精彩大奖尽在声牙APP</title>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
        	<script type="text/javascript" src="http://192.168.199.126/Soundtooth_Mid_Autumn/jssdk.php?url=<?php echo urlencode("http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);?>"></script>
</head>
<body>
	<div id="lucky">
		<p id="lucky_code">您的抽奖幸运码为</p>
		<label for="" id="lucky_number">123,456,789</label>
		<p id="copy_code">长按复制幸运码</p>
		<p id="load_app">下载安装声牙APP后 </p>
		<p>在抽奖页面填入幸运码 </p>
		<p>幸运好礼等您来抽</p>
		<button>立即下载</button>
	</div>
	<div id="shadow">
		<p>分享给好友<br> 即可参加幸运抽奖</p>
	</div>
	<script>
		wx.config({
		    debug: true, 
		    appId: "wx0769a9b69455a468", 
		    timestamp: '1442374835', 
		    nonceStr: 'soundtooth', 
		    signature: 'd2cecabb8715d050266df6e64da35061c7ee20a4',
		    jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 功能列表，我们要使用JS-SDK的什么功能
		});


		
			wx.ready(function(){
				wx.onMenuShareTimeline({
					    title: 'nihao ', // 分享标题
					    link: 'www.baidu.com', // 分享链接
					    imgUrl: '', // 分享图标
					    success: function () { 
					        // 用户确认分享后执行的回调函数
					        
					    },
					    cancel: function () { 
					        // 用户取消分享后执行的回调函数
					        alert("2");
					    }
				});
			});
			
	</script>
</body>
</html>