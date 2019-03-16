<?php
    /**用于请求是，通过验证码类的对象像客户输出图片*/
    session_start();
    require_once('vcode.class.php');
    echo new Vcode();