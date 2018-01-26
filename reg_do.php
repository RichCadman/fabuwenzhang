<?php
session_start();
date_default_timezone_set('PRC');
include("mysql_connect.inc");
header("Content-type: text/html; charset=utf-8");
$ip=$_SERVER["REMOTE_ADDR"];
if(isset($_GET['id'])){
  //判断验证码
  $code = $_POST['code'];
  if($code == $_SESSION['vode']){
    //新闻id
    $id = $_GET['id'];
    $phone = $_POST['phone'];
    $newsql = "select * from articles where id = '$id'";
    $newres = mysql_query($newsql);
    if(mysql_num_rows($newres)>0){
      $newrow = mysql_fetch_array($newres);
      $user_id = $newrow['user_id'];
      //查看用户是否已经存在
      $phonesql = "select * from relation where user_id = '$user_id' and phone = '$phone'";
      $phoneres = mysql_query($phonesql);
      if(mysql_num_rows($phoneres)>0){
        echo "<script>location.href='news.php?id=".$id."'</script>";
      }else{
        //添加到关联表
        $pubsql = "insert into relation(user_id,phone,news_id) values('$user_id','$phone',$id)";
        $pubres = mysql_query($pubsql);
        if($pubres){
          mysql_query("insert into operation(title,admin,operation,ip) values('新增用户','$phone','新增用户','$ip')");
          echo "<script>alert('注册成功！');location.href='news.php?id=".$id."'</script>";
        }
      }
    } 
  }else{
    echo "<script>alert('验证码有误！');window.history.back();</script>";
  }
}


?>