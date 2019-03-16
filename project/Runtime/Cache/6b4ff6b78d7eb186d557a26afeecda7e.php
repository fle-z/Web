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

    <title>登入</title>

    <!-- Bootstrap core CSS -->
    <link href="__ROOT__/Public/static/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="__ROOT__/Public/static/css/login.css" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="__ROOT__/Public/static/js/login.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body{
            background-color: #ccc;
        }
    </style>
  </head>

  <body>

    <div class="container">
      <form class="form-signin" method = "POST" action = "__ROOT__/index.php/PaperSharing/checkLogin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="username" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password"placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Verification Code</label>
        <input type="verify" id="inputVerify" class="form-control" name="verify" placeholder="Verification Code" required>
        <img class="verify" src="__ROOT__/index.php/PaperSharing/verify" alt="" onClick="this.src=this.src+'?'+Math.random()"/>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="__ROOT__/Public/static/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>