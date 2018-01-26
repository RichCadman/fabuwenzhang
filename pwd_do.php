<?php
session_start();
include("check_login.php");
include("mysql_connect.inc");
header("Content-type: text/html; charset=utf-8"); 
$ip=$_SERVER["REMOTE_ADDR"];
if(isset($_POST['modu'])){
	$names = $_SESSION['admin']['name'];
	$id=$_GET['id'];
	$name = $_POST['name'];
	$passwd =md5($_POST['passwd']);
	$esql = "update admin set name='$name',passwd='$passwd' where id ='$id'";
	mysql_query($esql);
	if(mysql_affected_rows()>=0){
		mysql_query("insert into operation(title,admin,operation,ip) values('修改信息','$names','修改','$ip')");
		echo "<script>alert('修改成功!');</script>";
		echo "<script>location.href='info.php'</script>";
	}else{
		echo "<script>alert('系统繁忙请稍后再试!(edit)');</script>";
		echo "<script>history.back();</script>";
	}
}
?>