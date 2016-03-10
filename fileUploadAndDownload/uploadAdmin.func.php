<?php
/**
 *
 * @authors alihanniba          alihanniba@gmail.com
 * @date    2016-03-10 11:42:00
 * @version \www.alihanniba.com\
 */

public function uploadAdmin()
{

    if($_FILES['error'] > 0){
        switch ($_FILES ['error']) {
            case 1 :
                $mes = '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
                break;
            case 2 :
                $mes = '超过了表单MAX_FILE_SIZE限制的大小';
                break;
            case 3 :
                $mes = '文件部分被上传';
                break;
            case 4 :
                $mes = '没有选择上传文件';
                break;
            case 6 :
                $mes = '没有找到临时目录';
                break;
            case 7 :
            case 8 :
                $mes = '系统错误';
                break;
        }
        echo ( $mes );
        return false;
    }

    $ext = getExt($_FILES['name']);
    $allowExt = array('jpeg','jpg','gif','png');

    if(!in_array($ext,$allowExt)){
        exit("非法文件类型");
    }

    $maxSize = 2097152;

    if($maxSize < $_FILES['size']){
        exit("上传文件过大");
    }

    $flag = true;
    if($flag){
        if(!getimagesize($_FILES['tmp_name'])){
            exit("不是真实的图片类型");
        }
    }

    if(!is_uploaded_file($_FILES['tmp_name'])){
        exit("文件不是通过HTTP POST 方式上传的");
    }

    $uploadPath = 'img';
    if(!file_exists($uploadPath)){
        mkdir($uploadPath,0777,true);
        chmod($uploadPath,0777);
    }

    $uniName = getUniName().$ext;
    $destination = $uploadPath.'/'.$uniName;

    if(!move_uploaded_file($_FILES['tmp_name'],$destination)){
        exit("文件移动失败");
    }
    return $destination;
}
