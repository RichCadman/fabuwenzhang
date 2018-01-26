<?php
 // //引入核心库文件
 
  include "phpqrcode/phpqrcode.php";	
 
 // //定义纠错级别
 
 // $errorLevel = "L";
 
 // //定义生成图片宽度和高度;默认为3
 
 // $size = "4";
 
 // //定义生成内容
 
 // // $content="尝试一下内容测试";
 // // //调用QRcode类的静态方法png生成二维码图片//
 
 // // QRcode::png($content, false, $errorLevel, $size);
 
 // //生成网址类型
 
 // $url="http://www.lpcblog.com/";
 
 
 
 // QRcode::png($url, false, $errorLevel, $size);
function png($text, $outfile=false, $level=QR_ECLEVEL_L, $size=3, $margin=4,  
$saveandprint=false)  
{ 
    $enc = QRencode::factory($level, $size, $margin); 
    return $enc->encodePNG($text, $outfile, $saveandprint=false); 
} 
