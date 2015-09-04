<?php 
//ffmpeg 视频转码,调整分辨率,调整采样率
echo "ffmpeg  -i  input.mp4  -s 1280x720 -ar 44100 -strict -2   output.mp4";

//终极解决方案。
//这个的思路是先将 mp4 转化为同样编码形式的 ts 流，因为 ts流是可以 concate 的，
//先把 mp4 封装成 ts ，然后 concate ts 流， 最后再把 ts 流转化为 mp4


 echo "ffmpeg -i 1.mp4 -vcodec copy -acodec copy -vbsf h264_mp4toannexb 1.ts";
 echo " ffmpeg -i 2.mp4 -vcodec copy -acodec copy -vbsf h264_mp4toannexb 2.ts";
  echo 'ffmpeg -i "concat:1.ts|2.ts" -acodec copy -vcodec copy -absf aac_adtstoasc output.mp4';

//php命令行执行
  shell_exec(cmd);
 ?>