<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="__ROOT__/Public/static/Amazon 32.ico">

    <title>文章发布管理</title>

    <!-- Bootstrap core CSS -->
    <link href="__ROOT__/Public/static/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="__ROOT__/Public/static/css/fileUpload.css" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="__ROOT__/Public/static/js/login.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method = "POST" enctype = "multipart/form-data"" action = "__ROOT__/index.php/PaperSharing/upload">
        <h2 class="form-signin-heading">Upload Article</h2>
        <label for="inputTitle" class="sr-only">Title</label>
        <input type="title" id="inputTitle" class="form-control" name="title" placeholder="Title" required autofocus>
        <label for="inputAuthor" class="sr-only">Author</label>
        <input type="author" id="inputAuthor" class="form-control" name="author" placeholder="Author" required>
        <label for="inputKeyword" class="sr-only">Keyword</label>
        <input type="keyword" id="inputKeyword" class="form-control" name="keyword" placeholder="Keyword" required>
        <label for="inputDescription" class="sr-only">Description</label>
        <input type="description" id="Description" class="form-control" name="description" placeholder="Description" required>
        <label for="inputPoint" class="sr-only">Point</label>
        <input type="Point" id="Point" class="form-control" name="point" placeholder="Point" required>
        <input type="hidden" name="MAX_FILE_SIZE" value="3145728" /> <!--设置允许提交表单的最大字节数-->
        <input type="file" id="File" class="form-control" name="file" placeholder="File" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="__ROOT__/Public/static/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>