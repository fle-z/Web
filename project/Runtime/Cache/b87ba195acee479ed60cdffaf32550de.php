<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title>新竹书画社</title>
		<link rel="stylesheet" href="__ROOT__/baoming/Public/static/css/layout.css" type="text/css">
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="logo">
					<img src="C:/wamp/ww/baoming/Public/社徽.jpg" width="80">
				</div>
				<div id="banner">
					<div id="title"><h1 style='white-space:pre;'>竹            轩</h1></div>
					<div id="login">
						<form id="form" method="post" action="save.php">
							<lable for="username">用户名：</lable>
							<input type="text" name="username" id="username" value=""/><br/>
							<lable for="password">密码：</lable>
							<input type="password" name="password" id="password" value=""/><br/>
							<input type="submit" name="submitBtn" id="submitBtn" value="提交"/>
							<input type="reset" name="resetBtn" id="resetBtn" value="重置"/>
						</form>
					</div>
				</div>
			</div>	
			<div class="nav"></div>
			<div id="navigation">
				<ul>
					<li><a herf='#'>社团介绍</a></li>
					<li class="line"></li>
					<li><a herf='#'>书法部</a></li>
					<li class="line"></li>
					<li><a herf='#'>绘画部</a></li>
					<li class="line"></li>
					<li><a herf='#'>策划部</a></li>
					<li class="line"></li>
					<li><a herf='#'>宣传部</a></li>
				</ul>
				
			</div>
			<div class="nav"></div>
			<div id="content">
				<div class="left_box border"></div>
				<div class="right_box border"></div>
				<div class="bar border"></div>
				<div class="nav"></div>
				<div class="left_box">
					<div class="left border"></div>
				    <div class="right border"></div>
				</div>
				<div class="right_box">
					<div class="left border"></div>
				    <div class="right border"></div>
				</div>
			</div>
			<div id="sidebar">
				<div class="bar border"></div>
				<div class="nav"></div>
				<div class="bar border"></div>
				<div class="nav"></div>
				<div class="bar border"></div>
			</div>
			<div class="nav"></div>
			<div id="footer">
				
			</div>
		</div>
	</body>
</html>