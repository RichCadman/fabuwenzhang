<?php
if(!isset($_SESSION['phone'])) session_start();
date_default_timezone_set('PRC');
include("mysql_connect.inc");
header("Content-type: text/html; charset=utf-8"); 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $newsql = "select * from articles where id = '$id'";
    $newres = mysql_query($newsql);
    if(mysql_num_rows($newres)>0){
      $newrow = mysql_fetch_array($newres);
    }
  //echo $newrow;
}
?>

<!DOCTYPE html>
<!-- saved from url=(0074)http://www.pyzhuan.com/article/s119878?from=singlemessage&isappinstalled=0 -->
<html style="font-size: 50px;">
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta name="Content-Security-Policy" content="default-src:*">
    <meta name="viewport" content="height=device-height, width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript">document.documentElement.style.fontSize = "50px"</script>
    <title><?php echo $newrow['title'];?></title>
    <link rel="shortcut icon" type="image/x-icon" href="resources/images/icons/logo.ico">
    <link type="text/css" rel="stylesheet" href="./news_files/main.min.css">
    <link rel="stylesheet" href="css/table.css" />
    <script type="text/javascript">var HuoNiu = {
        "version": "3.5.4 Stable",
        "versionCode": "20160621",
        "timestamp": 1475024672,
        "dateTime": "2016-09-28 09:04:32",
        "errorReportUrl": "http:\/\/www.87762899.com\/business\/errorReport"
      }</script>
    <script type="text/javascript" src="./news_files/zepto-1.1.6.min.js"></script>
    <script type="text/javascript" src="./news_files/fingerprint.min.js"></script>
    <script type="text/javascript" src="./news_files/main.min.js"></script>
  </head>
  
  <body class="">
    <div class="hide">
      <img src=""></div>
    <!-- <div id="loading" class="loading" style="display: none;">
      <div class="masked"></div>
      <div class="tip">
        <div class="ff ff-spin"></div>
        <div class="text">正在加载数据...</div></div>
    </div> -->
    <div class="content article-detail" style="min-height: 920px;">
      <article class="article">
        <div class="title-bar">
      	  <!-- 文章标题 -->
          <h2 class="title" title="<?php echo $newrow['title'];?>"><?php echo $newrow['title'];?></h2>
          <div class="meta">
          	<!-- 发布日期 -->
            <span class="item"><?php echo date("Y-m-d",strtotime($newrow['pubdate']));?></span>
            <!-- 发布人 -->
            <a href="" class="item link">公司名称</a></div>
        </div>
        <div class="block"></div>
        <!-- 文章内容 -->
        <div class="content-body " id="content-body">
          <?php echo $newrow['contents'];?>
        </div>
        <div class="content-footer">
        </div>
      </article>
      <div class="block"></div>
      <div class="block"></div>
      <div class="block"></div>
    </div>
    <div class="hide"></div>
  </body>

</html>