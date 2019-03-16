<?php
//前台应用入口文件
//common 存放当前项目的公共函数
//Conf 存放当前项目的配置文件
//lang 存放当前项目的语言包
//Runtime 存放当前项目的运行时文件
//Tpl 存放当前项目的模板文件
//MC -> Lib 
define('APP_DEBUG',TRUE);//打开调试模式
define('APP_NAME','project');//确定应用名称
define('APP_PATH','./project/');//确定应用路径
require'./ThinkPHP/ThinkPHP.php'//引入核心文件
?>