<?php
/**
 *
 * @authors alihanniba          alihanniba@gmail.com
 * @date    2016-03-09 18:27:10
 * @version \www.alihanniba.com\
 */

header("content-type:text/html;charset=utf-8");

$fileInfo = $_FILES['myFile'];
echo json_encode($fileInfo);


$fileName = $fileInfo['name'];
$fileType = $fileInfo['type'];
$fileTmpName = $fileInfo['tmp_name'];
$fileError = $fileInfo['error'];
$fileSize = $fileInfo['size'];

$maxSize = 2097152;     //允许的最大值
$allowExt = array('jpeg','jpg','gif','png');
$flag = true;           //检测是否为真实图片类型


if($fileError == UPLOAD_ERR_OK){
    //判断上传文件大小
    if($fileSize > $maxSize){
        exit("上传文件过大");
    }
    //判断上传文件类型
    $ext = pathinfo($fileName,PATHINFO_EXTENSION);
    if(!in_array($ext,$allowExt)){
        exit("非法文件类型");
    }
    //判断文件是否是通过HTTP POST方式上传
    if(!is_uploaded_file($fileTmpName)){
        exit("文件不是通过HTTP POST方式上传!");
    }
    //判断是否为真正图片类型
    if($flag){
        if(!getimagesize($fileTmpName)){
            exit("文件不是真正图片类型");
        }
    }
    //判断目录是否存在,如不存在则创建并修改超级权限
    $path = 'img';
    if(!file_exists($path)){
        mkdir($path,0777,true);
        chmod($path,0777);
    }

    $uniName = md5(uniqid(microtime(true),true)).'.'.$ext;
    $destination = $path.'/'.$uniName;
    if(move_uploaded_file($fileTmpName,$destination)){
        echo "文件上传成功";
    }else{
        echo "文件上传失败";
    }
}else{
    //匹配错误信息
    switch($fileError){
        case 1:
            echo '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
            break;
        case 2:
            echo '超过了表单MAX_FILE_SIZE限制的大小';
            break;
        case 3:
            echo '文件部分被上传';
            break;
        case 4:
            echo '没有选择上传文件';
            break;
        case 6:
            echo '没有找到临时目录';
            break;
        case 7:
        case 8:
            echo '系统错误';
            break;
    }
}







