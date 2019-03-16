<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>统计管理</title> 
<link rel="icon" href="__ROOT__/Public/static/Amazon 32.ico">
<script src="__ROOT__/Public/static/js/datetable/laydate.js" type="text/javascript" ></script>
<link href="__ROOT__/Public/static/css/bootstrap.min.css" rel="stylesheet">
<script src="__ROOT__/Public/static/js/jquery.min.js"></script>
<script src="__ROOT__/Public/static/js/bootstrap.min.js"></script>
</head>

<body>
    <hr>
    <div class="content clearfix">
        <div class="main">
            <div class="cont">
                <div class="fr" style="margin-right:15%">
                    <form class="text" method = "POST" action = "__ROOT__/index.php/PaperSharing/statistics">
		                 开始日期：<input type="text" class="inline laydate-icon" id="start" name="startdate" style="width:200px; margin-right:10px;">
		                 结束日期：<input type="text" class="inline laydate-icon" id="end" name="deadline" style="width:200px;">
                         <button value="查询" class="search" tupe="submit">查询</button>
                    </form>
                        </div>
                        <hr>
                    <!--表格-->
                    <h2 style="text-align:center">用户下载排行榜</h2>
                    <table class="table table-hover table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">用户编号</th>
                                <th width="15%">用户名称</th>
                                <th width="25%">用户邮箱</th>
                                <th width="15%">用户积分</th>
                                <th width="10%">用户下载次数</th>
                                <th style="text-align:center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($listUser)): $i = 0; $__LIST__ = $listUser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                                    <!--这里的id和for里面的c1 需要循环出来-->
                                        <td><input type="checkbox" id="c1" class="check">&nbsp;&nbsp;<label><?php echo ($data["0"]); ?></label></td>
                                        <td><?php echo ($data["username"]); ?></td>
                                        <td><?php echo ($data["email"]); ?></td>
                                        <td><?php echo ($data["point"]); ?></td>
                                        <td><?php echo ($data["download_times"]); ?></td>
                                        <td align="center">
                                            <a href="<?php echo U('PaperSharing/modUser', array('id'=>$data['userid']));?>"><input type="button" value="修改" class="btn"></a>
                                            <a href="<?php echo U('PaperSharing/delUser', array('id'=>$data['userid']));?>"><input type="button" value="删除" class="btn"></a>
                                        </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                    <!--表格-->
                    <h2 style="text-align:center">文章下载排行榜</h2>
                    <table class="table table-hover table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">文章编号</th>
                                <th width="20%">文章名称</th>
                                <th width="20%">文章作者</th>
                                <th width="15%">文章积分</th>
                                <th width="10%">文章下载次数</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($listArticle)): $i = 0; $__LIST__ = $listArticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                                    <!--这里的id和for里面的c1 需要循环出来-->
                                        <td><input type="checkbox" id="c1" class="check">&nbsp;&nbsp;<label><?php echo ($data["0"]); ?></label></td>
                                        <td><a href="<?php echo U('PaperSharing/download', array('id'=>$data['articleid']));?>"><?php echo ($data["title"]); ?></a></td>
                                        <td><?php echo ($data["author"]); ?></td>
                                        <td><?php echo ($data["point"]); ?></td>
                                        <td><?php echo ($data["download_times"]); ?></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
           </div>
      </div>
</body>
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
    min: '2014-01-01', //设定最小日期为当前日期
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
</html>