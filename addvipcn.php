<?php
session_start();
include("check_login.php");
include("mysql_connect.inc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/table.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
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

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>Forms</a>
  <ul>
    <li><a href="index.php"><i class="icon icon-home"></i> <span>已发布文章</span></a></li>
    <li><a href="pubarticle.php"><i class="icon icon-fullscreen"></i> <span>发布文章</span></a></li>
    <!-- <li><a href="index_xj.php"><i class="icon icon-inbox"></i> <span>客户信息</span></a> </li> -->
    <li class="active"><a href="addvipcn.php"><i class="icon icon-th-list"></i> <span>添加公众号</span></a> </li>
    <li><a href="adduser.php"><i class="icon icon-th-list"></i> <span>添加用户</span></a> </li>
    <li><a href="info.php"><i class="icon icon-th-list"></i> <span>用户信息</span></a> </li>
    <li><a href="operation.php"><i class="icon icon-pencil"></i> <span>操作日志</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#">添加公众号</a> </div>
    <h1>添加公众号</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5></h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" action="addvipcn_do.php" method="post">
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">公众号</label>
                  <div class="controls">
                    <input id="username" type="text"  name="vipcn_name" required="" />
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" name="addu" class="btn btn-success">添加</button>
              </div>
              
            </form>
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
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.wizard.js"></script>
</body>
</html>
