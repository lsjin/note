<?php 
session_start(); 
/**去掉boom就是utf-8
* vCode(m,n,x,y) m个数字 显示大小为n 边宽x 边高y
* http://blog.qita.in
* 自己改写记录session $code
*/ 
 
vCode(4, 12); //4个数字，显示大小为15  
 
function vCode($num = 4, $size = 20, $width = 0, $height = 0) { 
!$width && $width = $num * $size * 4 / 5 + 5; 
!$height && $height = $size + 10; 
// 去掉了 0 1 O l 等  
$str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW"; 
$code = ''; 
for ($i = 0; $i < $num; $i++) { 
$code .= $str[mt_rand(0, strlen($str)-1)]; 
} 
// 画图像  
$im = imagecreatetruecolor($width, $height); 
// 定义要用到的颜色  
$back_color = imagecolorallocate($im, 235, 236, 237); 
$boer_color = imagecolorallocate($im, 118, 151, 199); 
$text_color = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120)); 
// 画背景  
imagefilledrectangle($im, 0, 0, $width, $height, $back_color); 
// 画边框  
imagerectangle($im, 0, 0, $width-1, $height-1, $boer_color); 
// 画干扰线  
for($i = 0;$i < 5;$i++) { 
$font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255)); 
imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color); 
} 
// 画干扰点  
for($i = 0;$i < 50;$i++) { 
$font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255)); 
imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $font_color); 
} 
// 画验证码 http://www.ruoshuiyx.com 转载请保留出处谢谢，不会影响您的代码执行速度如不会请资讯若水印象网络站长  
//@imagefttext($im, $size , 0, 5, $size + 3, $text_color, 'c:\\WINDOWS\\Fonts\\simsun.ttc', $code);  
//上边的是windows下试用的下边是LINUX系统下试用的，需要对应把字体上传上去  
@imagefttext($im, $size , 0, 5, $size + 3, $text_color, '../msyh.ttf', $code); 
$_SESSION["VerifyCode"]=strtolower($code); //转换成小写  
ob_clean();
header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate"); 
header("Content-type: image/png;charset=utf-8"); 
imagepng($im); 
imagedestroy($im); 
}  
 
?>