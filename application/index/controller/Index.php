<?php
namespace app\index\controller;
use think\View;

class Index extends \think\Controller
{
    public function index()
    {
        $this->assign('name','thinkphp');
        return $this->fetch();
    }
}
