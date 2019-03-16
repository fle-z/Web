<?php
class PaperSharingModel extends Model{
    protected $_validate = array(
        array('username', 'require', '用户名未填写！'),
        array('username',  '', '用户名已经存在！', 0, 'unique', 1),
        array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
    );
    protected $auto = array(
        array('password', 'md5', 1, 'function')
    );
}