<?php
date_default_timezone_set('PRC');
include("mysql_connect.inc");
header("Content-type: text/html; charset=utf-8");

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="author" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="format-detection" content="telephone=no, email=no" />
	<meta name="renderer" content="webkit">
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<title>手机验证</title>
	<link rel="stylesheet" type="text/css" href="css/base-v1.3.css">
	<link rel="stylesheet" type="text/css" href="css/style1.css"></head>
<body class="customer register">
	<section class="bg">
		<section class="flex">
			<div class="login__check"></div>
			<form action="reg_do.php?id=<?php echo $_GET['news_id'] ?>" method="post" onsubmit="return check()">
		<div class="group">
			<label>手机号：</label>
			<input type="number" name="phone" id="phone">
		</div>
		<div class="group">
			<label>验证码：</label>
			<input type="text" name="code" id="code">
			<div class="exam">
				<a href="javascript:void(0)" onclick="changeImage()"><img id="myImg" src="code.php"></a>
			</div>
		</div>
		<input class="btn" type="submit" name="" value="确认">
	</form>
		</section>
	</section>
</body>
<script>
	function check(){
		var phone = document.getElementById("phone").value;  
		var code = document.getElementById("code").value;
		if(!(/^1[34578]\d{9}$/.test(phone))){
			alert('格式错误！');
			return false;
		}else if(code == ""){
			alert('请输入验证码！');
			return false;
		}
	}
</script>
<script type="text/javascript">
	function changeImage(){
		var imageEle=document.getElementById("myImg");
		imageEle.src="code.php?rnd="+(new Date()).getTime();
	}
</script>
</html>