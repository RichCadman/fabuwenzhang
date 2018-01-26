<?php
session_start();
date_default_timezone_set('PRC');
include("mysql_connect.inc");
include("check_loginu.php");
header("Content-type: text/html; charset=utf-8");
$ip=$_SERVER["REMOTE_ADDR"];
if($_POST){
	$name = $_SESSION['admin']['name'];
	$vipcn_name = $_POST['vipcn_name'];
	$sql = "insert into vipcn(vipcn_name) values('$vipcn_name')";
	$res = mysql_query($sql);
	if($res){
		mysql_query("insert into operation(title,admin,operation,ip) values('$vipcn_name','$name','添加公众号','$ip')");
		//echo $pubsql;
		echo "<script>alert('添加成功')</script>";
		if($_SESSION['admin']['p_id'] == 0){
			echo "<script>location.href='addvipcn.php'</script>";
		}else{
			echo "<script>location.href='addvipcn_u.php'</script>";
		}
		
	}
}