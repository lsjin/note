﻿<?php
session_start();
//生成验证码图片
ob_clean();
header("Content-type: image/png");
//全数字
$str = "1,2,3,4,5,6,7,8,9,0";      //要显示的字符，可自己进行增删
$list = explode(",", $str);
$cmax = count($list) - 1;
$verifyCode = '';
for ( $i=0; $i < 5; $i++ ){
      $randnum = mt_rand(0, $cmax);
      $verifyCode .= $list[$randnum];           //取出字符，组合成为我们要的验证码字符
}
$_SESSION['code'] = $verifyCode;        //将字符放入SESSION中

$im = imagecreate(58,28);    //生成图片
$black = imagecolorallocate($im, 0,0,0);     //此条及以下三条为设置的颜色
$white = imagecolorallocate($im, 255,255,255);
$gray = imagecolorallocate($im, 200,200,200);
$red = imagecolorallocate($im, 255, 0, 0);
imagefill($im,0,0,$white);     //给图片填充颜色

//将验证码绘入图片
imagestring($im, 5, 10, 8, $verifyCode, $black);    //将验证码写入到图片中

/*for($i=0;$i<50;$i++)  //加入干扰象素
{
    imagesetpixel($im, rand() , rand() , $black);    //加入点状干扰素
    imagesetpixel($im, rand() , rand() , $red);
    imagesetpixel($im, rand() , rand() , $gray);
    //imagearc($im, rand()p, rand()p, 20, 20, 75, 170, $black);    //加入弧线状干扰素
    //imageline($im, rand()p, rand()p, rand()p, rand()p, $red);    //加入线条状干扰素
}*/

for($i=0;$i<50;$i++) //加入干扰象素 
{
	imagesetpixel($im, mt_rand(0, 58) , mt_rand(0, 28) , $black); //加入点状干扰素 
	imagesetpixel($im, mt_rand(0, 58) , mt_rand(0, 28) , $red); 
	imagesetpixel($im, mt_rand(0, 58) , mt_rand(0, 28) , $gray); 
}

imagepng($im);
imagedestroy($im);
?>