<?php
/**
 *
 * @authors alihanniba          alihanniba@gmail.com
 * @date    2016-03-10 11:33:17
 * @version \www.alihanniba.com\
 */

/**
 * [getExt description]获取文件扩展名
 * @param  [type] $fileName [description]
 * @return [type]           [description]
 */
public function getExt($fileName)
{
    $ext = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    return $ext;
}

/**
 * [getUniName description]获取唯一字符串
 * @return [type] [description]
 */
public function getUniName()
{
    $UniName = md5(uniqid(microtime(true),true));
    return $UniName;
}
/**
 * [getFiles description]构建上传文件信息
 * @return [type] [description]
 */
function getFiles(){
    $i=0;
    foreach($_FILES as $file){
        if(is_string($file['name'])){
            $files[$i]=$file;
            $i++;
        }elseif(is_array($file['name'])){
            foreach($file['name'] as $key=>$val){
                $files[$i]['name']=$file['name'][$key];
                $files[$i]['type']=$file['type'][$key];
                $files[$i]['tmp_name']=$file['tmp_name'][$key];
                $files[$i]['error']=$file['error'][$key];
                $files[$i]['size']=$file['size'][$key];
                $i++;
            }
        }
    }
    return $files;
}
