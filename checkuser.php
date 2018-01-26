<?php
include("mysql_connect.inc");
if(isset($_POST['user'])) {
    $user = $_POST['user'];
    $sql = "select * from admin where name='$user'";
    $res = mysql_query($sql);
    if (mysql_num_rows($res)>0) {
        echo 1;
    } else {
        echo 0;
    }
}


?>