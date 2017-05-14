<?php
namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
    /**
     * 初始执行
     */
    public function _initialize()
    {
        //跳过权限验证的操作，防止域名重定向
    }
}
