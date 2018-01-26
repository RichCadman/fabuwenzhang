<?php
session_start();
header("Content-type: text/html; charset=utf-8");
include("mysql_connect.inc");
/*
* 登录处理
*/
$ip=$_SERVER["REMOTE_ADDR"];
if(isset($_POST['submit_login'])){
	$name = $_POST['name'];
	$passwd = md5($_POST['passwd']);
	$sql = "select * from admin where name='$name' and passwd='$passwd'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	if($row){
		$p_id = $row['p_id'];
		if($p_id==0){
			mysql_query("insert into operation(title,admin,operation,ip) values('登录','$name','登录','$ip')");
			$_SESSION['admin'] = $row;
			echo "<script>location.href='index.php'</script>";
		}else{
			mysql_query("insert into operation(title,admin,operation,ip) values('登录','$name','登录','$ip')");
			$_SESSION['admin'] = $row;
			echo "<script>location.href='indexu.php'</script>";
		}
	}else{
		echo "<script>alert('用户名或密码错误!')</script>";
		echo "<script>location.href='login.html'</script>";
	}
}

if(isset($_GET['out'])){
	$name = $_SESSION['admin']['name'];
	unset($_SESSION['admin']);
	mysql_query("insert into operation(title,admin,operation,ip) values('退出','$name','注销登录','$ip')");
	echo "<script>location.href='login.html'</script>";
}
?>