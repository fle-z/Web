<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>后台管理页面</title>
   <link rel="icon" href="__ROOT__/Public/static/Amazon 32.ico">
   <script type="text/javascript" src="__ROOT__/Public/static/js/datetable/laydate.js"></script>
   <link href="__ROOT__/Public/static/css/bootstrap.min.css" rel="stylesheet">
   <script src="__ROOT__/Public/static/js/jquery.min.js"></script>
   <script src="__ROOT__/Public/static/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand" href="#">后台管理</a>
   </div>

   <div id="myexample">
      <ul class="nav navbar-nav">
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户<b class="caret"></b></a>
               <ul class="dropdown-menu">
                  <li><a id="action-1">用户管理</a></li>
                  <li class="divider"></li>
                  <li><a href="#">用户统计</a></li>
               </ul>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">文章<b class="caret"></b></a>
               <ul class="dropdown-menu">
                  <li><a id="action-1">文章管理</a></li>
                  <li class="divider"></li>
                  <li><a href="#">文章统计</a></li>
               </ul>
            </li>
         </ul>
      </div>
   </nav>
   
   <div class="fr" style="margin-right:15%">
          <form class="text" method = "POST" action = "__ROOT__/index.php/PaperSharing/statistics">
		                         开始日期：<input type="text" class="inline laydate-icon" id="start" name="startdate" style="width:200px; margin-right:10px;">
		                         结束日期：<input type="text" class="inline laydate-icon" id="end" name="deadline" style="width:200px;">
                                 <button value="查询" class="search" tupe="submit">查询</button>
                            </form>
                        </div>
                        <input type="button" value="添加管理员" class="add" onclick = "window.location = 'addAdmin'">
<script>
   $(function(){
      $(".dropdown-toggle").dropdown('toggle');
      }); 
</script>

</body>
</html>



<script type="text/javascript">
!function(){
	laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
	laydate({elem: '#demo'});//绑定元素
}();

//日期范围限制
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};

var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，充值开始日的最大日期
    }
};
laydate(start);
laydate(end);

//自定义日期格式
laydate({
    elem: '#test1',
    format: 'YYYY年MM月DD日',
    festival: true, //显示节日
    choose: function(datas){ //选择日期完毕的回调
        alert('得到：'+datas);
    }
});

//日期范围限定在昨天到明天
laydate({
    elem: '#hello3',
    min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
    max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
});
</script>