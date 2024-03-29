<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>jQuery Bootgrid Demo</title>
        <link href="__ROOT__/Public/static/css/bootstrap.css" rel="stylesheet" />
        <link href="__ROOT__/Public/static/css/jquery.bootgrid.css" rel="stylesheet" />
        <style>
            @-webkit-viewport { width: device-width; }
            @-moz-viewport { width: device-width; }
            @-ms-viewport { width: device-width; }
            @-o-viewport { width: device-width; }
            @viewport { width: device-width; }


            
            
            .column .text { color: #f00 !important; }
            .cell { font-weight: bold; }
            
           .pagination {
                float: right;
                display: inline-block;
                padding-right: 0;
                margin: 0px 0px;
                border-radius: 4px;
            }
        </style>
    </head>
    <body>
        <hr>
        <div class="container-fluid">
            <div class="row">
               
                <div class="col-md-12">
                    <!--div class="table-responsive"-->
                       <!--  <table id="grid" class="table table-condensed table-hover table-striped" 
                        data-selection="true" data-multi-select="true" 
                        data-row-select="true" data-keep-selection="true"> -->
                        <!-- 按钮触发模态框 -->
                        <button id="getSelectedRows" type="button" class="btn btn-success" 
                        data-toggle="modal"  data-target="#myModal">添加</button>
                        <button id="getSelectedRows" type="button" class="btn btn-wran">修改</button>
                         <table id="grid" data-ajax="true" data-selection="true" data-multi-select="true" data-url="UserSerlvt" data-toggle="bootgrid" class="table table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-formatter="id" data-identifier="true"  data-visible="true"  data-width="15px" data-align="left" >ID</th>
                                    <th data-column-id="sender"  data-order="asc" data-align="left" data-header-align="left" data-width="75%">发送者</th>
                                    <th data-column-id="received" data-css-class="cell" data-header-css-class="column" data-filterable="true">回复人</th>
                                    <th data-column-id="link" data-formatter="links" data-sortable="false" data-width="75px">地址</th>
                                    <th data-column-id="status" data-type="numeric" data-visible="true">状态</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    <!--/div-->
                </div>
            </div>
        </div>
<!-- 按钮触发模态框 -->


<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" 
              data-dismiss="modal" aria-hidden="true">
                 &times;
           </button>
           <h4 class="modal-title" id="myModalLabel">
              模态框（Modal）标题
           </h4>
        </div>
        <div class="modal-body">
      <form class="form-horizontal" role="form">
  <div class="form-group">
     <label for="firstname" class="col-sm-2 control-label">名字</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="firstname" 
           placeholder="请输入名字">
     </div>
  </div>
  <div class="form-group">
     <label for="lastname" class="col-sm-2 control-label">姓</label>
     <div class="col-sm-10">
        <input type="text" class="form-control" id="lastname" 
           placeholder="请输入姓">
     </div>
  </div>
  <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
           <label>
              <input type="checkbox"> 请记住我
           </label>
        </div>
     </div>
  </div>
  <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">登录</button>
     </div>
  </div>
</form>
      
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-default" 
              data-dismiss="modal">关闭
           </button>
           <button type="button" class="btn btn-primary">
              提交更改
           </button>
        </div>
     </div><!-- /.modal-content -->
</div><!-- /.modal -->
      


        <script src="__ROOT__/Public/static/js/jquery-1.11.1.min.js"></script>
        <script src="__ROOT__/Public/static/js/bootstrap.js"></script>
        <script src="__ROOT__/Public/static/js/jquery.bootgrid.js"></script>
        <script>
             /**
              <th>参数说明
              data-visible="false" 是否可见 true 可见，false 不可见
              data-width="15px" 设置宽度 可谓px 或百分比。
              data-type="numeric" 数据格式
              data-sortable="false" 是否排序
              data-filterable="true" 是否是过滤条件
              <table> 参数说明
              data-url="UserSerlvt" url 地址 返回json格式
              data-ajax="true"  是否是ajax方式
              数据选择相关
              data-selection="true" 
              data-multi-select="true" 
                    data-row-select="true" 
                    data-keep-selection="true"
              
             */




             /* $("a[href=#showModal]").click(function(){
             
                 $("#showModal").load($(this).attr("data-url"));
             }); */
             function acb(id){
             $("#showModal").modal({
               remote: "test.jsp?str="+id
            });
             }
             $("#showModal").on("hidden.bs.modal", function() {
               $(this).removeData("bs.modal");
            });
             
             


             function init()
             {
                // $("#grid").bootgrid("destroy");//测试时formatter 不管用，因为先执行了加载数据，加载后formatter无法影响样式。
                 //先destroy 后formatters 可以使用
                 $("#grid").bootgrid({
                 // ajax:true,
                 // url:"/UserSerlvt",


                     formatters: {
                         "links": function(column, row)
                         {
                             return "<a data-toggle=\"modal\" onclick=\"acb("+row.id+")\" data-target=\"#showModal\">" + row.id  + ": " + row.id + "</a>";
                         },
                         "id":function(column, row)
                         {
                             return "<a href=\"#\">" + column.id + ": " + row.id + "</a>";
                         }
                     },
                     rowCount: [10, 25, 50, 75] //-1是显示全部
                     
                 });
             }
             
            $(function()
            {
                init();
                
            });
        </script>
    </body>
</html>