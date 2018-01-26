<?php
if(!isset($_SESSION)) session_start();
include "mysql_connect.inc";

/*
	非法验证

*/
if(isset($_SESSION['admin']) && $_SESSION['admin']['p_id'] == 0){

}else{
	echo "<script>location.href='login.html'</script>";
}
?>