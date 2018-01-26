<?php
session_start();
include("check_login.php");
include("mysql_connect.inc");
header("Content-type: text/html; charset=utf-8");

//$ip=mt_rand(1,255).'.'.mt_rand(1,255).'.'.mt_rand(1,255).'.'.mt_rand(1,255);
$ip=$_SERVER["REMOTE_ADDR"];
$name = $_SESSION['admin']['name'];
if(isset($_POST['pubsxwz'])){
	$title = $_POST['title'];
	//$user = $_POST['user'];
	$contents = $_POST['contents'];
	$vipcn_id = $_POST['vipcn_id'];
	$user_id = $_SESSION['admin']['id'];
	//$clicknum = $_POST['clicknum'];
	//$zclicknum = $_POST['zclicknum'];
	if($contents != "" && $vipcn_id){
		$pubsql = "insert into articles(title,user_id,contents,vipcn_id) values('$title','$user_id','$contents',$vipcn_id)";
		$pubres = mysql_query($pubsql);
		if($pubres){
			mysql_query("insert into operation(title,admin,operation,ip) values('$title','$name','发布','$ip')");
			//echo $pubsql;
			echo "<script>alert('发布成功')</script>";
			echo "<script>location.href='index.php'</script>";
		}else{
			echo "<script>history.back();</script>";
		}
	}else{
		echo "<script>alert('请填写完整再试!');</script>";
		echo "<script>history.back();</script>";
	}
}
if(isset($_POST['pubcsxwz'])){
	$fid = $_POST['fid'];
	$title = $_POST['title'];
	$user = $_POST['user'];
	$contents = $_POST['contents'];
	$clicknum = $_POST['clicknum'];
	$zclicknum = $_POST['zclicknum'];
	if($contents!=""){
		$pubsql = "insert into articles(title,user,contents,clicknum,zclicknum) values('$title','$user','$contents','$clicknum',
'$zclicknum')";
		$pubres = mysql_query($pubsql);
		if($pubres){
			$dsql = "delete from articles_xj where id = '$fid'";
			$dres = mysql_query($dsql);
			mysql_query("insert into operation(title,admin,operation,ip) values('$title','$name','上架','$ip')");
			echo "<script>alert('发布成功')</script>";
			echo "<script>location.href='index.php'</script>";
		}else{
			echo "<script>history.back();</script>";
		}
	}else{
		echo "<script>alert('请编辑文章内容再试!');</script>";
		echo "<script>history.back();</script>";
	}
}
?>