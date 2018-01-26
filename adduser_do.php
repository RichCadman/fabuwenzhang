<?php
session_start();
include("check_login.php");
include("mysql_connect.inc");
header("Content-type: text/html; charset=utf-8"); 

if(isset($_POST['addu'])){
	$name = $_POST['name'];

	//echo $name;exit;
	$sql = "select * from admin where name='$name'";
	$res = mysql_query($sql);
	if(mysql_num_rows($res)<=0){
		//父级id（管理员id）
		$p_id = $_SESSION['admin']['id'];
		$passwd = md5($_POST['passwd']);
		$pubsql = "insert into admin(name,passwd,p_id) values('$name','$passwd',$p_id)";
		$pubres = mysql_query($pubsql);
		if($pubres){
			//echo $pubsql;
			echo "<script>alert('添加成功!')</script>";
			echo "<script>location.href='adduser.php'</script>";
		}else{
			echo "<script>history.back();</script>";
		}
	}else{
		echo "<script>alert('添加失败,该用户名已被注册!')</script>";
		echo "<script>location.href='adduser.php'</script>";
	}
}
?>