<?php
class PaperSharingAction extends Action{
public function index() {
        $article = M('article');
        $list = $article->select();
        $this->assign('listArticle',$list);
        session_start();
        if($_SESSION['username'] != null)
        {
            $user['username'] = $_SESSION["username"];
            $user['point'] = M('user')->where('userid='.$_SESSION['userid'])->getField('point');
            $this->assign('user', array($user));
        }
        $this->display();
}

public function register(){
    $this->display();
}

public function login(){
    $this->display();
}

public function backstage() {
    session_start();
    if($_SESSION['username'] == null && $_SESSION['userflag'] == 1)
    {
        header("location: login.html");
        echo "请先登录";
    } else {
        $this -> display();
    }
}

public function modUser(){
    session_start();
    if($_SESSION['username'] == null && $_SESSION['userflag'] == 1)
    {
        header("location: login.html");
        echo "请先登录";
    } else {
        $this -> display();
    }
}

public function addAdmin(){
    session_start();
    if($_SESSION['username'] == null && $_SESSION['userflag'] == 1)
    {
        header("location: login.html");
        echo "请先登录";
    } else {
        $this -> display();
    }
}

public function fileUpload(){
    session_start();
    if($_SESSION['username'] == null)
    {
        header("location: login.html");
        echo "请先登录";
    } else {
        $this->display();
    }
}

public function alert($message,$location){
  header('Content-Type:text/html; charset=utf-8');//防止出现乱码
  echo "<script language='javascript'>";
  echo "alert('$message');";
  echo "window.location.href='$location';";
  echo "</script>";
}
public function article(){
    session_start();
    if($_SESSION['username'] == null)
    {
        $this->alert("请先登入","../../index.html");
    } else {
        $id = $_GET['id'];
        $article = M('article');
        $var['articleid'] = $id;
        $list = $article->where($var)->select();
        $comment = M('comment');
        $result = $comment->where($var)->select();
        $sum = $comment->where($var)->count();
        if($list) {
            $this -> assign('content', $list);
            $this -> assign('comment', $result);
            $this -> assign('sum', $sum);
            $this -> display();
        }else {
            $this -> error();
        }
    }
}

/**
    *列出数据库中的用户
*/
public function listUser(){
    $User = M('User');
    import('ORG.Util.Page');// 导入分页类
    $count      = $User->where()->count();// 查询满足要求的总记录数
    $Page       = new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
    $show       = $Page->show();// 分页显示输出
    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $list = $User->where()->limit($Page->firstRow.','.$Page->listRows)->select();
    for($i = 0; $i < count($list); $i++) {
        if($i < 10)
            array_unshift($list[$i], "00".($i+1));
        else if($i < 100)
            array_unshift($list[$i], "0".($i+1));
    }
    $this->assign('listUser',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出
    $this->display(); // 输出模板
}

/**
    *列出数据库中的文章
*/
public function listArticle(){
    $article = M('article');
    import('ORG.Util.Page');// 导入分页类
    $count      = $article->where()->count();// 查询满足要求的总记录数
    $Page       = new Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
    $show       = $Page->show();// 分页显示输出
    // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $list = $article->where()->limit($Page->firstRow.','.$Page->listRows)->select();
    for($i = 0; $i < count($list); $i++) {
        if($i < 10)
            array_unshift($list[$i], "00".($i+1));
        else if($i < 100)
            array_unshift($list[$i], "0".($i+1));
    }
    $this->assign('listArticle',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出
    $this->display(); // 输出模板
}

/*
*判断管理员登入
*/
function askAdmin($text) {
    echo "<script>
            if(confirm('$text'))
                window.location.href = 'backstage';
            else
                window.location.href = 'index';
        </script>" ;
}
/**
   *判断能否登入
*/
public function checkLogin() {
    header('Content-Type:text/html; charset=utf-8');//防止出现乱码
    $username = htmlspecialchars($_POST['username']);
    $pwd = htmlspecialchars($_POST['password']);
    $remember = htmlspecialchars($_POST['remember-me']);
    if($_SESSION['verify'] != md5($_POST['verify'])){
        $this->error('验证码错误！');
    } else {
        $DBuser = M('user');
        $result = $DBuser->where("username='" . $username . "' AND password='" . $pwd . "'")->find();
        if ($result) {
            if($remember) {
                setcookie("userid", $result['userid'], time()+24*3600);
                setcookie("username", $result['username'], time()+24*3600);
                setcookie("point", $result['username'], time()+24*3600);
            }
            $_SESSION['username'] = $result['username'];
            $_SESSION['userid'] = $result['userid'];
            $_SESSION['point'] = $result['point'];
            if($result['userflag'] == 0) {
                $_SESSION['userflag'] = 0;
                $this->success('登录成功', '__ROOT__/index.php/PaperSharing/index');
            } else if($result['userflag'] == 1) {
                $_SESSION['userflag'] = 1;
                $this -> askAdmin("您要登入后台管理页面吗？");
            }
        } else {
            $this->error('用户名或密码错误', '__URL__/login');
        }
    }
}

/**
   *注销用户
*/
public function logout(){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time()-1);
    }
    if(isset($_COOKIE['username'])) {
        setcookie("username", "", time()-1);
    }
    if(isset($_COOKIE['userid'])) {
        setcookie("userid", "", time()-1);
    }
    if(isset($_COOKIE['point'])) {
        setcookie("point", "", time()-1);
    }
    session_destroy();
    $this->success('退出成功，返回首页',U('PaperSharing/login'));
}

/**
   * 创建验证码
*/
public function verify(){
    //见thinkPHP参考手册
    import('ORG.Util.Image');
    Image::buildImageVerify(4, 1, png, 80, 35, verify);
}

/**
   *注册新用户
*/
public function addUser(){
    header('Content-Type:text/html; charset=utf-8');//防止出现乱码
    $DBuser = D('user');
    $result = $DBuser->create();
    if ($result) {
        if ($DBuser->add()) {
            $this->success('注册成功，请返回首页登录', '__APP__/PaperSharing/index');
        } else {
            $this->error('注册失败', '__URL__/register');
        }
    } else {
        $this->error($DBuser->getError(), '__URL__/register');
          }
}

/**
   *修改用户
*/
public function checkModUser(){
    header('Content-Type:text/html; charset=utf-8');//防止出现乱码
    $user['userid'] = $_POST['id'];
    $DBuser = D('user');
    if($_POST['username'] != null)
        $user['username'] = htmlspecialchars($_POST['username']);
    if($_POST['password'] != null)
        $user['password'] = htmlspecialchars($_POST['password']);
    if($_POST['email'] != null)
        $user['email'] = htmlspecialchars($_POST['email']);
    if($_POST['phonenumber'] != null)
        $user['phonenumber'] = htmlspecialchars($_POST['phonenumber']);
    $result = $DBuser->save($user);
    if ($result) {
         $this->alert("修改成功，请返回首页查看", __APP__."/PaperSharing/listUser");
    } else {
        $this->error($DBuser->getError(), '__APP__/PaperSharing/modUser');
    }
}

/**
   *删除用户
*/
function ask($text) {
    echo "<script>if(!confirm('$text'))window.history.go(-1)</script>" ;
}

public function delUser(){
    $this->ask("你确定要删除吗？");
    // 如果取消就返回上层页面，如果确定就执行下面的代码
    $userid = $_GET['id'];
    $User = M("user"); // 实例化User对象
    $var['userid'] = $userid;
    $result = $User->where($var)->delete();
    if($result) {
        $this->success('删除成功，请返回首页查看', '__APP__/PaperSharing/listUser');
    } else {
        $this->error('删除失败!', '__URL__/listUser');
    }
}

/**
   *注册管理员
*/
public function checkAddAdmin(){
    header('Content-Type:text/html; charset=utf-8');//防止出现乱码
    $DBuser = D('user');
    $user['username'] = htmlspecialchars($_POST['username']);
    $user['password'] = htmlspecialchars($_POST['password']);
    $user['email'] = htmlspecialchars($_POST['email']);
    $user['phonenumber'] = htmlspecialchars($_POST['phonenumber']);
    $userflag = 1;
    $user['$userflag'] = $userflag;
    if ($DBuser->add($user)) {
        $this->success('添加成功', '__APP__/PaperSharing/backstage');
    } else {
         $this->error('添加失败', '__APP__/PaperSharing/addAdmin');
    }
}

/**
   *查询文章
*/
public function searchArticle(){
    if(isset($_POST['title']) != null) {
       $content['title|keyword'] = array('like', "%{$_POST['title']}%");
    }
    $art = M('article');
    $list = $art->where($content)->select();
    if ($list == null) $this->alert("没有相关标题或关键字！","index.html");
    $this->assign('listArticle',$list);
    session_start();
        if($_SESSION['username'] != null)
        {
            $user['username'] = $_SESSION["username"];
            $user['point'] = M('user')->where('userid='.$_SESSION['userid'])->getField('point');
            $this->assign('user', array($user));
        }
    $this->display('index');
}


/**
   *文件上传
*/
Public function upload(){
    import('ORG.Net.UploadFile');
    $upload = new UploadFile();// 实例化上传类
    $upload->maxSize  = 3145728 ;// 设置附件上传大小
    $upload->allowExts  = array('doc', 'docx', 'pdf', 'txt');// 设置附件上传类型
    $upload->savePath =  'Public/Uploads/';// 设置附件上传目录
    $upload->saveRule = "uniqid";//设置上传文件名为原文件名
    $info   =   $upload->upload();
    if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getErrorMsg());
    }else{// 上传成功 获取上传文件信息
        $info =  $upload->getUploadFileInfo();
    }

   /// 保存表单数据 包括附件数据
   header('Content-Type:text/html; charset=utf-8');//防止出现乱码
    $Art = M("article"); // 实例化User对象
    $article['deadline'] = date("Y-m-d H:i:s", time());
    $article['filename'] = $info[0]['savename'];
    $article['size'] = $info[0]['size'];
    $article['type'] = $info[0]['type'];
    $article['title'] = htmlspecialchars($_POST['title']);
    $article['author'] = htmlspecialchars($_POST['author']);
    $article['keyword'] = htmlspecialchars($_POST['keyword']);
    $article['description'] = htmlspecialchars($_POST['description']);
    $article['point'] = htmlspecialchars($_POST['point']);
    $article['userid'] = $_SESSION['userid'];
    $article['path'] = $info[0]['savepath'];
    // 写入用户数据到数据库
    $user = M('user');
    if($Art->add($article) && $user->where('userid='.$_SESSION['userid'])->setInc('point',$_POST['point']))
    {
        $this->success('数据保存成功', '__APP__/PaperSharing/index');
    } else {
     $this->error('添加失败', '__APP__/PaperSharing/fileUpload');
   }
}

/**
 * 下载文件
 */
function alertMes($message) {
    echo "<script>alert '$messge'</script>";
}
public function download(){
   $userPoint = M('user')->where('userid='.$_SESSION['userid'])->getField('point');
   $articlePoint= M('article')->where('articleid='.$_GET['id'])->getField('point');
   $path = M('article')->where('articleid='.$_GET['id'])->getField('path');
   $filename = M('article')->where('articleid='.$_GET['id'])->getField('filename');
   $var['articleid']=$_GET['id'];
   $var['userid']=$_SESSION['userid'];
   if (is_null(M('download')->where("articleid=%d and userid=%d",array($var['articleid'],$var['userid']))->find()))
   {
        if($userPoint >= $articlePoint) {
            $filename = "$filename";    //要下载的文件名
            echo "<script>window.location.href='http://2015new.wenjin.in/zhengyongtuo/".$path.$filename."';</script>";
            //数据更新
            M('user')->where('userid='.$_SESSION['userid'])->setDec('point',$articlePoint);
            M('article')->where('articleid='.$_GET['id'])->setInc('downloadTimes',1);
            $author = M('article')->where('articleid='.$_GET['id'])->getField('userid');
            M('user')->where('id='.$authorid)->setInc('point',$articlePoint);
            $var["download_date"] = date("Y-m-d", time());
            M('download')->add($var);
        }else {
            $this->alert("积分不足",__ROOT__."/index.php/PaperSharing/article/id/".$_GET['id']);
        }
    }else {
        $filename = "$filename";    //要下载的文件名
        echo "<script>window.location.href='http://2015new.wenjin.in/zhengyongtuo/".$path.$filename."';</script>";
    }
      $this->alert("下载成功！",__ROOT__."/index.php/PaperSharing/article/id/".$_GET['id']);
}

public function message(){
    $var['sender_author'] = $_SESSION['username'];
    //判断是否下载过此文章
    $download = M('download');
    $articleid = $_GET['id'];
    if($_SESSION['userid'] == $download->where('articleid='.$_GET['id'])->getField('userid')) {
        $var['content'] = htmlspecialchars($_POST['message']);
        $comment=M("comment");
        $var['inputTime'] = date("Y-m-d", time());
        $var['articleid'] = $articleid;
        $result = $comment->add($var);
        if($result) {
            $this->success('添加成功！', '__ROOT__/index.php/PaperSharing/article/id/'.$articleid);
        } else {
            $this->error( '添加失败,请重试...', '__ROOT__/index.php/PaperSharing/article/id/'.$articleid);
        }
    }else{
      $this->alert("对不起，您没有下载过此文章！","../../article/id/{$articleid}");
    }
}

public function showstatistics(){
    $this->display();
}
/*
    *排序
*/
function sort($result){
    $data = array();
    $i=0;
    foreach($result as $k=>$v){
        $a = 0;
        foreach($v as $kk=>$vv){
            $a++;
        }
        $data[$i][$k] = $a;
        $i++;
    }
    asort($data);
    return $data;
}
/*
    *数据统计
*/
public function statistics(){
    $startdate = htmlspecialchars($_POST['startdate']);
    $deadline = htmlspecialchars($_POST['deadline']);
    $download = M('download');
    $date['download_date'] = array(array('EGT',$startdate),array('ELT',$deadline),'AND');
    $downloadlist = $download->where($date)->order('userid')->select();
    $userResult = array();
    $articleResult = array();
    foreach($downloadlist as $key=>$value) {
        $userResult[$value['userid']][] = $value['articleid'];
        $articleResult[$value['articleid']][] = $value['userid'];
    }
    //排序
    $userdata = $this->sort($userResult);
    $articledata = $this->sort($articleResult);
    //取出用户
    $i=0;
    foreach($userdata as $key=>$value) {
        foreach($value as $kk=>$vv){
            $userlist[$i] = M('user')->where('userid='.$kk)->find();
            $userlist[$i]['download_times'] = $vv;
            $i++;
        }
    }
    //取出文章
    $i=0;
    foreach($articledata as $key=>$value) {
        foreach($value as $kk=>$vv){
            $articlelist[$i] = M('article')->where('articleid='.$kk)->find();
            $articlelist[$i]['download_times'] = $vv;
            $i++;
        }
    }
    for($i = 0; $i < count($userlist); $i++) {
        if($i < 10)
            array_unshift($userlist[$i], "00".($i+1));
        else if($i < 100)
            array_unshift($userlist[$i], "00".($i+1));
    }
    for($i = 0; $i < count($articlelist); $i++) {
        if($i < 10)
            array_unshift($articlelist[$i], "00".($i+1));
        else if($i < 100)
            array_unshift($articlelist[$i], "00".($i+1));
    }

    $this->assign('listUser', $userlist);
    $this->assign('listArticle', $articlelist);
    $this -> display('showstatistics');
}


}
