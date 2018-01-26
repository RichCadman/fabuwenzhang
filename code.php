<?php  
//设置 php.ini的报错级别  
error_reporting(E_ERROR | E_WARNING | E_PARSE);  
//设置默认的时间为格林时间  
date_default_timezone_set('UTC');  
session_start();  
header("Content-type: image/PNG");  
//创建一个图片设置 宽 高  
$im=imagecreate(44,18);  
//载入图片 设置图形的颜色 参数 red、green、blue 是色彩三原色  
$back=imagecolorallocate($im,0,200,100);  
//图形着色  
imagefill($im,0,0,$back);  
srand((double)microtime()*1000000);  
//输出文字长度  
for ($i=0;$i<4;$i++){  
 //随机颜色  
 $font=imagecolorallocate($im,rand(100,255),rand(0,100),rand(100,255));  
 //随机数字  
 $authnum=rand(0,9);  
 //数字叠加  
 $vcode.=$authnum;  
 //绘横式字符串  
 imagestring($im,5,2+$i*10,1,$authnum,$font);   
}  
for ($i=0;$i<100;$i++)  
{  
$randcolor=imagecolorallocate($im,rand(100,255),rand(0,50),rand(0,255));  
//在图片上绘出一点。参数 x、y 为欲绘点的坐标，参数 col 表示该点的颜色。  
imagesetpixel($im,rand()%70,rand()%30,$randcolor);  
}  
//来建立一张 PNG 格式图形  
imagepng($im);  
//本函数将图片 handle 解构，释于内存空间。参数 im 为 ImageCreate() 所建立的图片 handle。  
imagedestroy($im);  
$_SESSION['vode']=$vcode;  
?> 