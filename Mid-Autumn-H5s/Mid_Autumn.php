<!DOCTYPE html>
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf8">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no" name="viewport" id="viewport" />
	<title>input images</title>
	<link rel="stylesheet" href="css/webuploader.css">
	<link rel="stylesheet" href="css/image.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/webuploader.js "></script>
	<script src="js/create.js"></script>
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
	 <input type="hidden" value="" id="img_url">
	<label for="">距离:</label>
	<input type="text" placeholder="距离" id="distance"><br>
	<label for="">月饼:</label>
	<input type="text" placeholder="月饼" id="moon_cake">
	<div id="uploader-demo">
		    <!--用来存放item-->
		    <div id="fileList" class="uploader-list"></div>
		    <div id="filePicker">选择图片</div>
	</div>
	<button id="create" >生成海报</button>
</body>
</html>