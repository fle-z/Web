<?php
    session_start();
    require "conn.inc.php";
    if(isset($_POST["submitBtn"])) {
        $stmt = $pdo -> prepare("SELECT id,
                                        username,
                                 FORM user
                                 WHERE username = ? and userpwd = ?");
        $stmt = execute(array($_POST["username"], md5($_POST["password"])));
        if($stmt -> rowCount() > 0) {
            $_SESSION = $stmt -> fetch(PDO::FETCH_ASSOC);
            $SESSION["isLogin"] = 1;
            header("Location:index.html");
        } else {
            echo '<font color = "red">用户名或密码错误！</font>';
        }
    }
?>
    
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html"; charset=utf-8>
		<title>登入页面</title>
        <link rel="stylesheet" href="__ROOT__/baoming/Public/static/css/login.css" type="text/css">
	</head>
    <body>
        <div id="background" style="position:absolute;z-index:-1;width:100%;height:100%;top:0px;left:0px;">
            <img style="height:100%;width: 100%;" src="__ROOT__/baoming/baoming/Tpl/Log/背景.jpg">
        </div>
        <center>
        <div id = "container">
            <form id="form" method="post" action="login.php">
				<lable for="username">用户名：</lable>
				<input type="text" name="username" id="username" size="20" value=""/><br/>
                <br/>
				<lable for="password">密&nbsp&nbsp&nbsp&nbsp码：</lable>
				<input type="password" name="password" id="password" size="20" value=""/><br/>
                <br/>
                <!--<lable for="code">验证码：</lable>
                <input type="text" name="code" id="password" size="20" value=""/><br/>
                <br/>
                <img src="imgcode.php" alt="看不清楚，换一张" style="cursor: pointer;" onclick="javascript:newgdcode(this, this.src);"/><br>
                <br/>-->
				<input type="submit" name="submitBtn" id="submitBtn" value="提交"/>
                &nbsp&nbsp
				<input type="reset" name="resetBtn" id="resetBtn" value="重置"/>
			</form>
        </div>
        </center>
    </body>