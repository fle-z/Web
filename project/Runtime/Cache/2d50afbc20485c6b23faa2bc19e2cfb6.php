<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Backstage</title>
<link href="__ROOT__/Public/static/css/bootstrap.css" rel="stylesheet" />
<!-- Bootstrap core CSS -->
<link href="__ROOT__/Public/static/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="__ROOT__/Public/static/css/login.css" rel="stylesheet" type="text/css">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="__ROOT__/Public/static/js/login.js"></script>

</head>

<style>
#main-nav {
          margin-left: 1px;
      }


       #main-nav.nav-tabs.nav-stacked > li > a {
           padding: 10px 8px;
           font-size: 12px;
           font-weight: 600;
           color: #4A515B;
           background: #E9E9E9;
           background: -moz-linear-gradient(top, #FAFAFA 0%, #E9E9E9 100%);
           background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FAFAFA), color-stop(100%,#E9E9E9));
           background: -webkit-linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
           background: -o-linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
           background: -ms-linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
           background: linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
           filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FAFAFA', endColorstr='#E9E9E9');
           -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#FAFAFA', endColorstr='#E9E9E9')";
           border: 1px solid #D5D5D5;
           border-radius: 4px;
       }


        #main-nav.nav-tabs.nav-stacked > li > a > span {
            color: #4A515B;
        }


        #main-nav.nav-tabs.nav-stacked > li.active > a, #main-nav.nav-tabs.nav-stacked > li > a:hover {
            color: #FFF;
            background: #3C4049;
            background: -moz-linear-gradient(top, #4A515B 0%, #3C4049 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#4A515B), color-stop(100%,#3C4049));
            background: -webkit-linear-gradient(top, #4A515B 0%,#3C4049 100%);
            background: -o-linear-gradient(top, #4A515B 0%,#3C4049 100%);
            background: -ms-linear-gradient(top, #4A515B 0%,#3C4049 100%);
            background: linear-gradient(top, #4A515B 0%,#3C4049 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#4A515B', endColorstr='#3C4049');
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#4A515B', endColorstr='#3C4049')";
            border-color: #2B2E33;
        }

        #main-nav.nav-tabs.nav-stacked > li.active > a, #main-nav.nav-tabs.nav-stacked > li > a:hover > span {
            color: #FFF;
        }


        #main-nav.nav-tabs.nav-stacked > li {
            margin-bottom: 4px;
        }


        /*定义二级菜单样式*/
        .secondmenu a {
            font-size: 10px;
            color: #4A515B;
            text-align: left;
        }

        .navbar-static-top {

            margin-bottom: 5px;
        }

        .navbar-brand {
            background: url('') no-repeat 10px 8px;
            display: inline-block;
            vertical-align: middle;
            padding-left: 50px;
            color: #fff;
        }


</style>
<body>
<header id="header" class="navbar navbar-default  navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <a class="navbar-brand" data-i18n="title" href="#" id="logo">后台管理系统
               </a>

              <a class="navbar-brand"  class="btn btn-default" onclick="divhide()">
  <span class="glyphicon glyphicon-align-justify"></span>
</a>
                    <span class="navbar-brand" data-i18n="title"></span>
                </div>

                <nav id="menu" class="navbar-collapse collapse" role="navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="__ROOT__/index.php/PaperSharing/logout">退出</a></li>
                    </ul>
                </nav>
            </div>
        </header>

  <div class="container-fluid">
       <div class="row">
           <div class="col-md-2" id="hiddendiv">
               <ul id="main-nav" class="nav nav-tabs nav-stacked" style="">
                   <li class="active">
                       <a href="index">
                           <i class="glyphicon glyphicon-th-large"></i>
                           首页
                       </a>
                   </li>
                   <li>
                       <a href="#systemSetting" data-toggle="collapse" class="nav-header collapsed"  data-parent="hiddendiv">
                           <i class="glyphicon glyphicon-cog"></i>
                           系统管理
                           <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                       </a>
                       <ul id="systemSetting" class="nav nav-list collapse secondmenu" style="height: 0px;">
                           <li><a href="#" onclick="createTabs('usercode','用户管理','./listUser.html')"><i class="glyphicon glyphicon-user"></i>用户管理</a></li>
                           <li><a href="#" onclick="createTabs('articlecode','文章管理','./listArticle.html')"><i class="glyphicon glyphicon-th-list"></i>文章管理</a></li>
                           <li><a href="#" onclick="createTabs('rolecode','角色管理','./bootgrid.html')"><i class="glyphicon glyphicon-asterisk"></i>角色管理</a></li>
                           <li><a data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i>添加管理员</a></li>
                           <li><a href="#"><i class="glyphicon glyphicon-eye-open"></i>日志查看</a></li>
                       </ul>
                   </li>
                   <li onclick="createTabs('statistics','图表统计','./showstatistics.html')">
                       <a href="#"  data-toggle="collapse"  data-parent="hiddendiv">
                           <i class="glyphicon glyphicon-calendar"></i>
                           图表统计
                           <span class="label label-warning pull-right">5</span>
                       </a>
                   </li>
                   <li>
                       <a href="#"  data-toggle="collapse"  data-parent="hiddendiv">
                           <i class="glyphicon glyphicon-fire"></i>
                           关于系统
                       </a>
                   </li>

               </ul>

           </div>
           <div class="col-md-9" id="tabs2">
                <ul class="nav" role="tablist" id="maintab">

  </ul>
<!-- Tab panes
<div class="tab-content" id="maindiv">
<div class="tab-pane active" id="home"></div>
</div> -->


<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
               aria-hidden="true">×
            </button>
            <h2 class="form-signin-heading" id="myModalLabel">AddAdmin</h2>
         </div>
         <div class="modal-body">
            <form class="form-signin" method = "POST" action = "__ROOT__/index.php/PaperSharing/checkAddAdmin">
                <label for="inputUsername" class="sr-only">Username</label>
                <input type="username" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required>
                <label for="inputPhoneNumber" class="sr-only">PhoneNumber</label>
                <input type="phoneNumber" id="inputPhoneNumber" class="form-control" name="phonenumber" placeholder="PhoneNumber" required>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">register</button>
                </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
   $(function () { $('#myModal').modal('hide')});
</script>
           </div>
       </div>
   </div>
</body>
<script src="__ROOT__/Public/static/js/jquery-1.11.1.min.js"></script>
<script src="__ROOT__/Public/static/js/bootstrap.js"></script>
<link type="text/css" href="__ROOT__/Public/static/js/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="__ROOT__/Public/static/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="__ROOT__/Public/static/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript">
function divhide(){
    $("#hiddendiv").fadeToggle(250);
}
</script>
<script>
 //createTabs('rolecode','角色管理','./bootgrid.html')"
function createTabs(functionCode,functionName,url){
    addTab(functionName,functionCode,url);
 }
 //<!-- tabs  jquery ui bootstrap 中的案例，有些改变，但总体还是借鉴。-->
 var tabTitle ="new Tab",
      tabTemplate = "<li class='active' ><a href='#{href}'>#{label}</a> <span class='ui-icon ui-icon-close'>移除标签</span></li>",
      tabCounter = 0;
var tabs = $( "#tabs2" ).tabs();

function addTab(functionName,functionCode,url ) {
    var label = functionName || "Tab " + tabCounter,
    id = "tabs-" + functionCode,
    li = $( tabTemplate.replace( /#\{href}/g, "#" + id ).replace( /#\{label}/g, label ) );
    if($("#tabs-"+functionCode).length>0) //如果有相同的functionCode ，说明已经有了tab，不用新建，选中就行了。
    {
        tabs.tabs('select', '#' +id);
        return;
    }
        tabs.find( ".ui-tabs-nav" ).append( li );
        //每个div 中都有一个iframe ,这种方式不是太好，可自己优化。
        tabs.append( "<div id='" + id + "'><iframe src=\""+url+"\"  width=\"100%\" height=\"550px;\" frameborder=0 scrolling=\"no\"></iframe></div>" );
        tabs.tabs( "refresh" );

      tabs.tabs('select', '#' +id);   //根据id 选中tab
        tabCounter++;
}

      //<!--关闭-->
$( "#tabs2" ).on( "click",'span.ui-icon-close', function() {
      var panelId = $( this ).closest( "li" ).remove().attr( "aria-controls" );
      $( "#" + panelId ).remove();
      tabs.tabs( "refresh" );
});


</script>
</html>