<?php 
$time = time();
echo $time;

 
    $im = imagegrabscreen();   
    imagepng($im, "myscreenshot.png");   

 ?>