<?php if (!defined('THINK_PATH')) exit();?><!--欢迎您
<?php
if($_SESSION[userid] == "" && $_COOKIE['userid'] == "") { header("location:login.php"); } if(isset($_SESSION['username'])) { echo $_SESSION['username']; } else if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>
-->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="__ROOT__/Public/static/css/backstage.css">
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">慕课电子商务后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl"><a href="#">慕课</a><span>&gt;&gt;</span><a href="#">商品管理</a><span>&gt;&gt;</span>商品修改</div>
        <div class="link fr">
            <a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="#" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">产品管理</div>
                <div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add">
                        </div>
                        <div class="fr">
                            <div class="text">
                                <span>商品名称：</span>
                                <div class="bui_select">
                                    <select name="" id="" class="select">
                                        <option value="1">测试内容</option>
                                        <option value="1">测试内容</option>
                                        <option value="1">测试内容</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>上架时间：</span>
                                <div class="bui_select">
                                    <select name="" id="" class="select">
                                        <option value="1">测试内容</option>
                                        <option value="1">测试内容</option>
                                        <option value="1">测试内容</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search">
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="25%">标题</th>
                                <th width="35%">来源</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label">001</label></td>
                                <td>后台设计</td>
                                <td>测试内容</td>
                                <td align="center"><input type="button" value="修改" class="btn"><input type="button" value="删除" class="btn"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="c2" class="check"><label for="c2" class="label">001</label></td>
                                <td>后台设计</td>
                                <td>测试内容</td>
                                <td align="center"><input type="button" value="修改" class="btn"><input type="button" value="删除" class="btn"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="c3" class="check"><label for="c3" class="label">001</label></td>
                                <td>后台设计</td>
                                <td>测试内容</td>
                                <td align="center"><input type="button" value="修改" class="btn"><input type="button" value="删除" class="btn"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="c4" class="check"><label for="c4" class="label">001</label></td>
                                <td>后台设计</td>
                                <td>测试内容</td>
                                <td align="center"><input type="button" value="修改" class="btn"><input type="button" value="删除" class="btn"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="c5" class="check"><label for="c5" class="label">001</label></td>
                                <td>后台设计</td>
                                <td>测试内容</td>
                                <td align="center"><input type="button" value="修改" class="btn"><input type="button" value="删除" class="btn"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="c6" class="check"><label for="c6" class="label">001</label></td>
                                <td>后台设计</td>
                                <td>测试内容</td>
                                <td align="center"><input type="button" value="修改" class="btn"><input type="button" value="删除" class="btn"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="c7" class="check"><label for="c7" class="label">001</label></td>
                                <td>后台设计</td>
                                <td>测试内容</td>
                                <td align="center"><input type="button" value="修改" class="btn"><input type="button" value="删除" class="btn"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="c8" class="check"><label for="c8" class="label">001</label></td>
                                <td>后台设计</td>
                                <td>测试内容</td>
                                <td align="center"><input type="button" value="修改" class="btn"><input type="button" value="删除" class="btn"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="c9" class="check"><label for="c9" class="label">001</label></td>
                                <td>后台设计</td>
                                <td>测试内容</td>
                                <td align="center"><input type="button" value="修改" class="btn"><input type="button" value="删除" class="btn"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span>-</span>商品管理</h3>
                        <dl>
                            <dd><a href="#">商品修改</a></dd>
                            <dd><a href="#">商品分类</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span>+</span>订单管理</h3>
                        <dl>
                            <dd><a href="#">订单修改</a></dd>
                            <dd><a href="#">订单又修改</a></dd>
                            <dd><a href="#">订单总是修改</a></dd>
                            <dd><a href="#">测试内容你看着改</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</body>
</html>