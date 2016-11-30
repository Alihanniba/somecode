<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf8">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" name="viewport" id="viewport" />
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/image.css">
	<meta property="wb:webmaster" content="7ae6dd82bddfbf80" />
	<html xmlns:wb="http://open.weibo.com/wb">
	<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=3991219688" type="text/javascript" charset="utf-8"></script>
	<title>中秋节我们在声牙</title>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/weibo.js"></script>
	<script src="js/webuploader.js"></script>
	<!-- // <script src="js/cityList.js"></script> -->

	<script>
		    var BASE_URL = "./";
			// 图片上传demo
			    $(function() {
			                    $list = $('#fileList'),
			                    // 优化retina, 在retina下这个值是2
			                    ratio = window.devicePixelRatio || 1,
			                    // 缩略图大小
			                    thumbnailWidth = 100 * ratio,
			                    thumbnailHeight = 160 * ratio,
			                    // Web Uploader实例
			                   // uploader;
			                // 初始化Web Uploader
			                uploader = WebUploader.create({
			                    // 自动上传。
			                    auto: true,
			                    // swf文件路径
			                    swf: BASE_URL + 'js/Uploader.swf',
			                    // 文件接收服务端。
			                    server: './get.php',
			                    // 选择文件的按钮。可选。
			                    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
			                    pick: '#filePicker',
			                    // 只允许选择文件，可选。
			                    accept: {
			                        title: 'Images',
			                        extensions: 'gif,jpg,jpeg,bmp,png',
			                        mimeTypes: 'image/*'
			                    }
			                });
			                // 当有文件添加进来的时候
			                uploader.on( 'fileQueued', function( file ) {
			                    var $li = $(
			                            '<div id="' + file.id + '" class="file-item thumbnail">' +
			                                '<img>' +
			                            '</div>'
			                            ),
			                        $img = $li.find('img');

			                    $list.html( $li );
			                    // 创建缩略图
			                    uploader.makeThumb( file, function( error, src ) {
			                        if ( error ) {
			                            $img.replaceWith('<span>不能预览</span>');
			                            return;
			                        }
			                        $img.attr( 'src', src );
			                        // $img.attr( 'style', '' );
			                    }, thumbnailWidth, thumbnailHeight );
			                });

			                uploader.on( 'beforeFileQueued', function( file ) {
			                    
			                });

			                // 文件上传过程中创建进度条实时显示。
			                uploader.on( 'uploadProgress', function( file, percentage ) {
			                    var $li = $( '#'+file.id ),
			                        $percent = $li.find('.progress span');

			                        $li.on('click', 'true', function() {
			                    uploader.removeFile( file );
			                })

			                    // 避免重复创建
			                    if ( !$percent.length ) {
			                        $percent = $('<p class="progress"><span></span></p>')
			                                .appendTo( $li )
			                                .find('span');
			                    }

			                    $percent.css( 'width', percentage * 100 + '%' );
			                });

			                // 文件上传成功，给item添加成功class, 用样式标记上传成功。
			                uploader.on( 'uploadSuccess', function(file, response) {
			                    $( '#'+file.id ).addClass('upload-state-done');
			                    $("#img_url").val(response);
			                    console.log(response);
			                    console.log("文件上传成功");
			                    $("#your_img img").attr("src",response);
			                    $("#distance").css('display', 'none');
			                    $("#mid_autumn").css('display', 'block');

			                    // $("#mid_autumn").css("background","url(./images/b-g-2.png)");
			                });

			                // 文件上传失败，现实上传出错。
			                uploader.on( 'uploadError', function( file ) {
			                    var $li = $( '#'+file.id ),
			                        $error = $li.find('div.error');

			                    // 避免重复创建
			                    if ( !$error.length ) {
			                        $error = $('<div class="error"></div>').appendTo( $li );
			                    }

			                    $error.text('上传失败');
			                    alert("上传失败");

			                });

			                // 完成上传完了，成功或者失败，先删除进度条。
			                uploader.on( 'uploadComplete', function( file ) {
			                    $( '#'+file.id ).find('.progress').remove();
			                });
			                });
	</script>
	
</head>
<body>
	<div id="index_hype_container" style="margin:auto;position:relative;width:100%;height:100%;overflow:hidden;" aria-live="polite">
		<script type="text/javascript" charset="utf-8" src="index.hyperesources/index_hype_generated_script.js?86283"></script>
	</div>
	<div id="add_address">
		<img src="images/card2.png" alt="">
		 <div id="kown">
		 	<p id="foreign_land">身在异乡</p>
		 	<p id="question">想知道自己跟爸妈相距多远吗？</p>
			<label for="">我的住址</label><br>
			<input type="text" placeholder="点击修改" id="address" ><br>
		</div>
		 <div id="parents">
			<label for="">爸妈的住址</label><br>
			<input type="text" placeholder="点击修改" id="moon_cake" ><br>
			<!-- autocomplete="off" onclick="this.value='';GetCityList(this);" onkeyup="selCity(event)" -->
		</div>
		<div style="height:44px;width:100%;text-align:center;">
			<button id="enter">确定</button>
		</div>
	</div>

	<div id="distance">
		<img src="images/card.png"  alt="" id="card2">
		<div id="create_t">
			<p id="km">离父母 <label for="">0</label> 公里</p>
			<p id="reunion">与父母中秋团聚有</p>
			<label for="" id="number">0</label>
			<p id="moon_cake">个月饼的距离</p>
			<div id="guide">
				<img src="./images/share.png" alt="">
			</div>
			<p id="remarks">加入我们一起拍一张手护月亮的照片<br> 表达想要回去与父母中秋团聚的愿望吧！</p>
			<button>立即拍照</button>
			<div id="uploader-demo">
				    <div id="fileList" class="uploader-list"></div>
				    <div id="filePicker"></div>
			</div>
		</div>
	</div>
	<div id="mid_autumn">
		<img src="./images/b-g-2.png"  alt="" id="bg2"> 
		<div id="third_bg">
			<img src="./images/left_top.png"  alt="">
		</div>
		<div id="shareAnd">
			<div id="your_img">
				<img src="" alt="">
			</div>
			<p id="local">您身在 <label for="" id="my_local">地球</label> 距离父母<label for="" id="how_many">0</label>公里</p>
			<p id="yuebing">相当于 <label for="" id="moonCake">0</label>个月饼的距离 </p>
			<p id="first">个月饼的距离</p>
			<p id="second">个月饼的距离</p>
			<p id="third">个月饼的距离</p>
			<button type="button" id="wb_publish" >分享并抽奖</button>
		</div>
	</div>
	<div id="guide_page">
		<div id="shadow"></div>
		<img src="images/share.png"  alt="">
	</div>
	<div id="lucky_co">
		<img src="./images/b-g-3.png"  alt="" id="ticket_bg">
		<p id="ticketCode">123456</p>
		<div id="copy_co">
			<img src="./images/content.png"  alt="">
		</div>
		<div id="load_now">
			<img src="./images/down.png" alt="">
		</div>
	</div>
	<script>
	console.log($("#your_img img")[0].src);
		WB2.anyWhere(function(W){
			W.widget.publish({
				'id' : 'wb_publish',
				'default_text' : '预置方案　& \r\n我可以换行.',
				'type':'mobile',
				'default_image' : $("#your_img img")[0].src,
				'callback' : function(o) {
					//do something...
					  $.ajax({
				                          url: './zhongqiu.php',
				                         type: 'POST',
				                          dataType: 'json',
				                          async: false,
				                          data: {
				                              'img_url': $("#your_img img")[0].src,
				                              'open_id':0,
				                          },
				                         })
				                         .done(function(data) {
				                              //alert("success");
				                              console.log(data);
				                              $("#ticketCode").html(data.generate_code);
				                              $("#add_address").css("display","none");
				                              $("#distance").css("display","none");
				                              $("#mid_autumn").css("display","none");
				                              $("#guide_page").css("display","none");
				                              $("#lucky_co").css("display","block");
				                         })
				                         .fail(function(data) {
				                          console.log("error");
				                          alert("erroryes");
				                         })
				                         .always(function() {
				                          console.log("complete");
				                         });
				}
			});
 		});	
	</script>
</body>
</html>