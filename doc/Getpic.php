<?php
$size = 72;
$image=imagecreatetruecolor($size, $size);

//设置透明背景
$back = imagecolorallocate($image, 255, 255, 255);
//$border = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, $size - 1, $size - 1, $back);
//imagerectangle($image, 0, 0, $size - 1, $size - 1, $border);//边框

$yellow_x = 34;
$yellow_y = 35;
$radius = 60;

//绘制圆形图案
$yellow = imagecolorallocatealpha($image, 255, 255, 0, 75);
imagefilledellipse($image, $yellow_x, $yellow_y, $radius, $radius, $yellow);

$str=substr($_GET['username'],-6);
$str = mb_convert_encoding($str, "UTF-8");
//字体路径
$fonts="C:\Windows\Fonts\simkai.ttf";
//绘制红色字体
$red = imagecolorallocatealpha($image, 255, 0, 0, 75);
imagettftext($image,20,0,10,46,$red,$fonts,$str);

header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?> 