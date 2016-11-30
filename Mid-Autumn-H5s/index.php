<?php 
require_once("./cc.php");

$temp = $dbh->prepare("SELECT COUNT(*) FROM `Soundtooth_M`");
if(!$temp->execute()){
	echo "select error";	
}

$id= $temp->fetch();
$id = $id[0];
//var_dump($id);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf8">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" name="viewport" id="viewport" />
	<title>你支持中秋国庆连放9天么？</title>
	<meta name="viewport" content="user-scalable=yes, width=373" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="description" content="如果你也支持中秋国庆连放9天，请分享出去">
	<script>
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "//hm.baidu.com/hm.js?6665e48b5cd54df3f79ce6491a8ce872";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	</script>


	<script src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<style>
		html {
			height:100%;
		}
		body {
			background-color: #FFFFFF;
			margin:0;
			height:100%;
		}
	</style>
</head>
<body style="height:100%;width:100%;">
	
	<div id="index_hype_container" style="margin:auto;position:relative;width:100%;height:100%;overflow:hidden;" aria-live="polite">
		<script type="text/javascript" charset="utf-8" src="index.hyperesources/index_hype_generated_script.js?79324"></script>
	</div>


	<script type="text/javascript" src="js/jssdk.php"></script>
	<script type="text/javascript">
	    shareData = {
	        "title": "你支持中秋国庆连放9天假么？我是第"+(64521+<?php echo $id; ?>)+"个支持者",
	        "imgUrl": "http://sandbox-api.soundtooth.cn/Soundtooth_M/images/1.jpg",
	        "desc": "中秋节,声牙与你一起回家!",
	    };
	</script>
</body>
</html>