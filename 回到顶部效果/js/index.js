//页面加载完毕触发
window.onload = function(){
	var obtn = document.getElementById('btn');
	var clientHeight = document.documentElement.clientHeight;
	var timer = null;
	var isTop = true;

	//滚动条滚动时触发
	window.onscroll = function(){
		var osTop = document.documentElement.scrollTop || document.body.scrollTop;
		if(!isTop){
			clearInterval(timer);
		}
		isTop = false;
		if(osTop >= clientHeight){
			obtn.style.display = 'block';
		}else{
			obtn.style.display = 'none';
		}
	}

	obtn.onclick = function(){
		//设置定时器
		timer = setInterval(function(){
			var osTop = document.documentElement.scrollTop || document.body.scrollTop;
			//获取滚动条距离顶部的高度
			var ispeed = Math.floor(-osTop/6);
			document.documentElement.scrollTop = document.body.scrollTop = osTop + ispeed;
			isTop = true;
			if(osTop == 0){
				clearInterval(timer);
			}
		},30);
	}
}