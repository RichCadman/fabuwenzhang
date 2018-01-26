<?php
session_start();
include("check_loginu.php");
include("mysql_connect.inc");
header("Content-type: text/html; charset=utf-8"); 
$user_id = $_SESSION['admin']['id'];
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
    
    <li class="active"><a href="indexu.php"><i class="icon icon-home"></i> <span>已发布文章</span></a></li>
    <li><a href="pubarticle_u.php"><i class="icon icon-fullscreen"></i> <span>发布文章</span></a></li>
    <li><a href="addvipcn_u.php"><i class="icon icon-th-list"></i> <span>添加公众号</span></a> </li>    
    <!-- <li><a href="indexu_xj.php"><i class="icon icon-inbox"></i> <span>已下架文章</span></a> </li> --> 
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="current">文章列表</a> </div>
    <h1>文章列表</h1>
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
            <table  style="overflow:hidden" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>文章标题</th>
                  <th>发布日期</th>
                  <th>发表人</th>
                  <th>文章链接</th>
                  <th>二维码链接</th>
                  <th>操作选项</th>
                  <th>详情</th>
                </tr>
              </thead>
              <tbody>
                
                 <?php
                    $artisql = "select a.title,a.pubdate,a.id,b.name from articles as a,admin as b where a.user_id = b.id and a.user_id = $user_id order by a.pubdate desc";
                    $res = mysql_query($artisql);
                    if(mysql_num_rows($res)>0){
                      while($row = mysql_fetch_array($res)){
                    ?>
                    <tr>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo $row['pubdate'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td>
                    <a href='<?php echo "news.php?id=".$row['id'];?>' target="__blank">
                      <?php echo "http://".$_SERVER ['HTTP_HOST']."/news.php?id=".$row['id'];?>
                    </a>
                  </td>
                  <td>
                      <?php echo "http://".$_SERVER ['HTTP_HOST']."/reg.php?news_id=".$row['id'];?>
                  </td>
                  <td><a href="editarticle_u.php?id=<?php echo $row['id'];?>">修改</a></td>
                    <td><a href="xiangqing_u.php?id=<?php echo $row['id'];?>">详情</a></td>
                </tr>
                <?php
                  }
                }else{
                ?>
                <tr>
                  <td colspan="8" style="font-size:18px;color:red;"><?php echo "暂无文章!";?></td>
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
<!-- <script src="js/jquery.dataTables.min.js"></script>  -->
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
