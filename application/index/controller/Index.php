<?php
namespace app\index\controller;
use app\index\model\User;
use think\View;

class Index extends \think\Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function welcome()
    {
        $model_user = new User();
        $map = array();
        $user_list = $model_user->getList($map);
        $this->assign("user_list",$user_list);
        return $this->fetch();
    }
}
