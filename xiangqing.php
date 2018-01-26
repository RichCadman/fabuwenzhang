<?php
session_start();
include("check_login.php");
include("mysql_connect.inc");
header("Content-type: text/html; charset=utf-8");
//新闻id
$news_id = $_GET['id']; 
//根据新闻id查询用户id
$sql = "select * from articles where id = '$news_id'";
$res = mysql_query($sql);
$info = mysql_fetch_array($res);
$user_id = $info['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/table.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<style>
  .table td {
    text-align: center;
  }
</style>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <?php
      $name = $_SESSION['admin']['name'];
      ?>
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $name;?></span></a>
    </li>
    <li class=""><a title="" href="login_do.php?out=1"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
    <li><a href="index.php"><i class="icon icon-home"></i> <span>已发布文章</span></a></li>
    <li><a href="pubarticle.php"><i class="icon icon-fullscreen"></i> <span>发布文章</span></a></li>
    <!-- <li class="active"><a href="index_xj.php"><i class="icon icon-inbox"></i> <span>客户信息</span></a> </li> -->
    <li><a href="addvipcn.php"><i class="icon icon-th-list"></i> <span>添加公众号</span></a> </li>
    <li><a href="adduser.php"><i class="icon icon-th-list"></i> <span>添加用户</span></a> </li>
    <li><a href="info.php"><i class="icon icon-th-list"></i> <span>用户信息</span></a> </li>
    <li><a href="operation.php"><i class="icon icon-pencil"></i> <span>操作日志</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">客户信息</a> </div>
    <h1>客户信息</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
     
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5></h5>
          </div>
          <div class="widget-content nopadding over">
            <table style="overflow:hidden" class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>文章标题</th>
                    <!-- <th>下架日期</th>
                    <th>总点击量</th>
                    <th>点击量</th>
                    <th>剩余点击量</th> -->
                    <th>客户</th>
                    <!--th>文章url</th-->
                    <!-- <th>操作选项</th> -->
                    <th>所属人</th>
                    <th>公众号</th>
                    <th>时间</th>
                </tr>
              </thead>
              <tbody>
                
                 <?php
                 //根据用户id查询手机号
                  $artisql = "select * from relation as a,articles as b,vipcn as c,admin as d where a.news_id = b.id and b.vipcn_id = c.id and a.user_id = d.id and a.user_id = $user_id and a.news_id = $news_id";
                  $res = mysql_query($artisql);
                  if(mysql_num_rows($res)>0){
                    while($row = mysql_fetch_array($res)){
                  ?>
                  <tr>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['vipcn_name'];?></td>
                    <td><?php echo $row['add_time'];?></td>
                  </tr>
                  <?php
                    }
                  }else{
                  ?>
                  <tr>
                    <td colspan="8" style="font-size:18px;color:red;"><?php echo "暂无客户!";?></td>
                  </tr>
                  <?php  
                  }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<!-- <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in/">Themedesigner.in</a> </div>
</div> -->
<div id="zzcdiv" style="display:none;">
  <div style="background:#000;opacity:.5;width:100%;height:100%;position:fixed;top:0px;">123</div>
    <div style="background:#fff;border:3px solid green;width:400px;position:fixed;top:35%;left:40%;padding: 40px;">
      <div style="padding:0px 100px 0px 100px;text-align:center;">
        <span style="color:red;font-size:20px;font-weight:900;">确认删除该文章?</span><br/><br/><br/>
        <input id="yesdel" type="button" value="确认" list-id="" onclick="yesdel($(this).attr('list-id'))"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="取消" onclick="javascript:$('#zzcdiv').hide();"/>
      </div>
    </div>
</div>
<script>
function showchecks(id){
  $("#zzcdiv").show();
  $("#yesdel").attr("list-id",id);
}
function yesdel(id){
  //alert(id);
  location.href="delete_do.php?id="+id;
}
</script>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
