<?php
session_start();
include("check_loginu.php");
include("mysql_connect.inc");
header("Content-type: text/html; charset=utf-8"); 
/*
* 登录处理
*/
//$ip=mt_rand(1,255).'.'.mt_rand(1,255).'.'.mt_rand(1,255).'.'.mt_rand(1,255);
$ip=$_SERVER["REMOTE_ADDR"];
if(isset($_POST['editsub'])){
	$name = $_SESSION['admin']['name'];
	$id = $_POST['eid'];
	$title = $_POST['title'];
	//$user = $_POST['user'];
	$contents = $_POST['contents'];
	//$clicknum = $_POST['clicknum'];
	//$zclicknum = $_POST['zclicknum'];
	$esql = "update articles set title='$title',contents='$contents' where id ='$id'";
	mysql_query($esql);
	if(mysql_affected_rows()>=0){
		mysql_query("insert into operation(title,admin,operation,ip) values('$title','$name','修改','$ip')");
		echo "<script>alert('修改成功!');</script>";
		if($_SESSION['admin']['p_id'] == 0){
			echo "<script>location.href='editarticle.php?id=".$id."'</script>";
		}else{
			echo "<script>location.href='editarticle_u.php?id=".$id."'</script>";
		}
		
	}else{
		echo "<script>alert('系统繁忙请稍后再试!(edit)');</script>";
		echo "<script>history.back();</script>";
	}
}

?>