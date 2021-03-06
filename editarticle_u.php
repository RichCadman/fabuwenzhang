<?php
session_start();
include("check_loginu.php");
include("mysql_connect.inc");

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $newsql = "select * from articles where id = '$id'";
  $newres = mysql_query($newsql);
  if(mysql_num_rows($newres)>0){
    $newrow = mysql_fetch_array($newres);
  }else{
    echo "该页面暂无内容!";exit;
  }
}else{
  echo "该页面暂无内容!";exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link rel="stylesheet" href="css/table.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
<script>
    KindEditor.ready(function(K) {
        var editor1 = K.create('textarea[name="contents"]', {
            width: "91.3%", //编辑器的宽度
            height: "430px", //编辑器的高度
            filterMode: false, //不会过滤HTML代码
            resizeType: 0,
            allowPreviewEmoticons: true,
            allowImageUpload: true,
            cssPath: 'kindeditor/plugins/code/prettify.css',
            uploadJson: 'kindeditor/php/upload_json.php',
            fileManagerJson: 'kindeditor/php/file_manager_json.php',
            allowFileManager: true,
            afterCreate: function() {
                var self = this;
                K.ctrl(document, 13, function() {
                    self.sync();
                    K('form[name=news]')[0].submit();
                });
                K.ctrl(self.edit.doc, 13, function() {
                    self.sync();
                    K('form[name=news]')[0].submit();
                });
            }
        });
        prettyPrint();
    });
   

</script>
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
    <li><a href="indexu.php"><i class="icon icon-home"></i> <span>已发布文章</span></a></li>
    <li><a href="pubarticle_u.php"><i class="icon icon-fullscreen"></i> <span>发布文章</span></a></li>
    <li><a href="addvipcn_u.php"><i class="icon icon-th-list"></i> <span>添加公众号</span></a> </li>    
    <!-- <li><a href="indexu_xj.php"><i class="icon icon-inbox"></i> <span>已下架文章</span></a> </li> -->
  </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="tip-bottom">修改文章</a></div>
  <h1>修改文章</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">   
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5></h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
            <form  action="edit_do.php" method="post" name="pubform">
              <input type="hidden" name="eid" value="<?php echo $newrow['id'];?>"/>
              <div class="control-group">
                <label class="control-label">文章标题 :</label>
                <div class="controls">
                  <input type="text" class="span11" name="title" value="<?php echo $newrow['title'];?>"  required="" placeholder="请输入文章标题" />
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label">点击量 :</label>
                <div class="controls">
                  <input type="text" name="clicknum" value="<?php //echo $newrow['clicknum'];?>"  required="" class="span11" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">总点击量 :</label>
                <div class="controls">
                  <input type="text" value="<?php //echo $newrow['zclicknum'];?>" name="zclicknum" required=""  class="span11" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">客户用户名 :</label>
                <div class="controls">
                  <input type="text" class="span11" name="user" value="<?php //echo $newrow['user'];?>" required="" placeholder="请输入用户名" />
                </div>
              </div> -->
         
              <label class="control-label">文章内容 </label>
              <div class="controls">
                <textarea  name="contents"><?php echo $newrow['contents'];?></textarea>
              </div>
            
              <script>
                $(function(){
                  //alert(123);
                  $(":text[name=user]").blur(function(){
                    alert(123);
                    var user = $(this).val();
                    //alert(user);
                    $.post("checkuser.php",{"user":user},
                      function(data){
                        if(data==0){
                          alert("无此用户,请重新输入用户名");
                          $(":text[name=user]").val("");
                        }
                      }
                    );
                  });
                });
                </script>
              <div class="form-actions">
              <button type="submit"   name="editsub" class="btn btn-success">修改</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div></div>
<!--Footer-part-->
<!-- <div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in/">Themedesigner.in</a> </div>
</div> -->
<!--end-Footer-part--> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.html"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 


</body>
</html>
