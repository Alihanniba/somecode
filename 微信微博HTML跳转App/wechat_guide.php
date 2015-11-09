<?php
// ini_set("display_errors", 1);

if(stripos($_SERVER['HTTP_USER_AGENT'], 'micromessenger')){
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>微信引导页</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <style>
        *{margin:0;}
        body,html{width:100%;height:100%}
        img{display:block;}
        </style>
    </head>
    <body>
        <img src="self.png" width="100%" height="100%">
    </body>
    </html>
    ';
    exit;
} else if (stripos($_SERVER['HTTP_USER_AGENT'], 'weibo')){
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>微博引导页</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <style>
        *{margin:0;}
        body,html{width:100%;height:100%}
        img{display:block;}
        </style>
    </head>
    <body>
        <img src="self.png" width="100%" height="100%">
    </body>
    </html>
    ';
    exit;
}

/** 
 * @author       default7<default7@zbphp.com> 
 * @param        $url 
 * @param string $method 
 * @param array  $postData 
 * 
 * @return mixed|null|string 
 */  
 
$jInfo = $_GET['jInfo'];
$vid = $_GET['vid'];
$is_over = $_GET['is_over'];

$scheme_Adr = ''.$jInfo;
$over_scheme_Adr = ''.$vid;
$scheme_IOS = ''.$jInfo;

if(stripos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || 
    stripos($_SERVER['HTTP_USER_AGENT'], 'iPad') || 
    stripos($_SERVER['HTTP_USER_AGENT'], 'iPod')){
    header("Location: " . './turn_page.php?url=' . $scheme_IOS);
    exit;
}else if(stripos($_SERVER['HTTP_USER_AGENT'], 'Android')){
    if($is_over==0){
        header("Location: " . './turn_page.php?url=' . $scheme_Adr);
        exit;
    }else{
        header("Location: " . './turn_page.php?url=' . $over_scheme_Adr);
        exit;
    }
//    header("Location: ./turn_page.php");
    exit;
}else{
    // echo 'unknown type';
    exit;
}




