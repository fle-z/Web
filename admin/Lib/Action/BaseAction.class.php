<?php

class BaseAction extends Action {
    public function _initialize() {
        $this->checklogin();
    }

    public function checklogin() {
        if (in_array(MODULE_NAME, array('Admin'))) {
            return true;
        }
        if (in_array(MODULE_NAME, array('Index')) && in_array(ACTION_NAME, array('index','info'))) {
            return true;
        }
        if ((!isset($_SESSION['admin']) || !$_SESSION['admin'])) {
            $this->error("没有登录", '__APP__/PaperSharing/login');
        }
    }
}