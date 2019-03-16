<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="__ROOT__/Public/static/Amazon 32.ico">

    <title>文章展示</title>

    <!-- Bootstrap core CSS -->
    <link href="__ROOT__/Public/static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="__ROOT__/Public/static/css/article.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="__ROOT__/Public/static/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <nav class="navbar-header">
          <a class="navbar-brand active" href="__ROOT__/index.php/PaperSharing/index">Home</a>
          <a class="navbar-brand" href="__ROOT__/index.php/PaperSharing/fileUpload">Upload</a>
          <a class="navbar-brand" href="__ROOT__/index.php/PaperSharing/logout">Logout</a>
        </nav>
      </div>
    </div>

    <div class="container">
     <?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i;?><div class="blog-header">
        <h1 class="blog-title"><?php echo ($content["title"]); ?></h1>
        <p class="lead blog-description">Keyword:<?php echo ($content["keyword"]); ?></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">Description：<?php echo ($content["description"]); ?></h2>
            <p class="blog-post-meta"><?php echo ($content["deadline"]); ?> by <a href="#"><?php echo ($content["author"]); ?></a></p>

            <p><?php echo ($content["content"]); ?></p>
          </div><!-- /.blog-post -->
          <nav>
            <ul class="pager">
              <li><a href="__ROOT__/index.php/PaperSharing/article/id/<?php echo ($content['articleid']-1); ?>">Previous</a></li>
              <li><a href="<?php echo U('PaperSharing/download', array('id'=>$content['articleid']));?>">download</a></li>
              <li><a href="__ROOT__/index.php/PaperSharing/article/id/<?php echo ($content['articleid']+1); ?>">Next</a></li>
            </ul>
          </nav>
          <table class = "table">
            <tbody>
                <tr>
                    <td>下载积分：<?php echo ($content["point"]); ?></td>
                    <td>下载次数：<?php echo ($content["downloadTimes"]); ?></td>
                </tr>
                <tr>
                    <td>资源类型：<?php echo ($content["type"]); ?></td>
                    <td>资源大小：<?php echo ($content["size"]); ?>kb</td>
                </tr>
            </tbody>
        </table>
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row --><?php endforeach; endif; else: echo "" ;endif; ?>
    </div><!-- /.container -->

    <footer class="blog-footer">
        <p>
            <a href="#">Back to top</a>
        </p>
        <div class="row" style="margin-left:15%">
        <div class="col-sm-8 blog-main">
            <h2 class="blog-post-title" style="float:left">您的评论：</h2>
            <form class="form-signin" method = "POST" action = "<?php echo U('PaperSharing/message', array('id'=>$content['articleid']));?>">
                <textarea type="message" id="inputMessage" class="form-control" style="margin-bottom:10px"
                            rows="5" cols="20" name="message" placeholder="comment..." required></textarea>
                <button class="btn btn-lg btn-primary" type="submit">submit</button>
                <button class="btn btn-lg btn-primary" type="reset" >reset...</button>
            </form>
            <br/>
            <hr>
            <br/>
            <h2 class="blog-post-title" style="float:left">user_comment</h2>
            <p><?php echo ($sum["sum"]); ?>&nbsp;person have comment</p>
            <br/>
            <br/><hr>
            <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="container">
                    <p style="float:left"><?php echo ($comment["sender_author"]); ?></p>
                    <br>
                        <div class="row" >
                            <div class="col-xs-3" style="float:left">
                                <h4><?php echo ($comment["content"]); ?></h4>
                            </div class="col-xs-3">
                        </div>
                        <p style="float:left">时间：<?php echo ($comment["inputTime"]); ?></p>
                </div>
                <hr><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="__ROOT__/Public/static/js/jquery.min.js"></script>
    <script src="__ROOT__/Public/static/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="__ROOT__/Public/static/js/ie10-viewport-bug-workaround.js"></script>
    <!--<script type="text/javascript">
         var span = document.getElementsByTagName('span');
         var num;
         var flag = 0;

         for(var i = 1; i < span.length + 1; i++){
            senddata(i);
         }

         function goodplus(gindex){
         flag = 1;
         num = parseInt(span.item(gindex-1).innerHTML);
         if(checkcookie(gindex) == true){
            num = num + 1;
            senddata(gindex);
         }else{
            alert("你已经点过赞咯！")
         }
         }

         function senddata(aindex){
            var xmlhttp;
            var txt;
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
              }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function(){
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                  txt = xmlhttp.responseText;
                  var cookieindex = aindex - 1;
                  document.getElementsByTagName('span').item(cookieindex).innerHTML = txt;
              }
         }
         xmlhttp.open("GET","__ROOT__/index.php/PaperSharing/good?num=" + num + '&flag=' + flag + '&aindex=' + aindex,true);
         xmlhttp.send();
         }

        //判断是否已经存在了cookie
         function checkcookie(gindex){
         var thiscookie = 'sdcity_foodmap_goodplus' + gindex;
         var mapcookie = getCookie(thiscookie)
         if (mapcookie!=null && mapcookie!=""){
         return false;
         }else {
            setCookie(thiscookie,thiscookie,365);
         return true;
         }
         }

        //获取cookie
         function getCookie(c_name){
        //获取cookie，参数是名称。
         if (document.cookie.length > 0){
        //当cookie不为空的时候就开始查找名称
         c_start = document.cookie.indexOf(c_name + "=");
         if (c_start != -1){
        //如果开始的位置不为-1就是找到了、找到了之后就要确定结束的位置
         c_start = c_start + c_name.length + 1 ;
        //cookie的值存在名称和等号的后面，所以内容的开始位置应该是加上长度和1
         c_end = document.cookie.indexOf(";" , c_start);
         if (c_end == -1) {
          c_end = document.cookie.length;
         }
         return unescape(document.cookie.substring(c_start , c_end));//返回内容，解码。
         }
         }
         return "";
         }

        //设置cookie
         function setCookie(c_name,value,expiredays){
        //存入名称，值，有效期。有效期到期事件是今天+有效天数。然后存储cookie，
         var exdate=new Date();
         exdate.setDate( exdate.getDate() + expiredays )
         document.cookie = c_name + "=" + escape(value) + ((expiredays==null) ? "" : "; expires=" + exdate.toGMTString())
         }
       </script>-->
  </body>
</html>