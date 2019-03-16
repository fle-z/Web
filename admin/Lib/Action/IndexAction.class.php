<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        $xxx = 'name';
        $this->xxx = $xxx;
        echo $xxx;
        $this->assign('name', $xxx1);
		$this->display();
    }
    
	public function add(){
		//echo "wefwef";
		$name  = $_POST['text'];
		$neirong = $_POST['textarea'];
		echo "你的昵称是".$name.',你的留言内容为：'.$neirong;
	}
}