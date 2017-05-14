<?php
namespace app\index\controller;
use think\Controller;

class Common extends Base
{
    public $user_id;    //用户id
    public $user_name;  //用户名
    /**
     * 初始执行
     */
    public function _initialize(){
        parent::_initialize();
        $this->user_id = session('user_id') ? session('user_id') : '';
        $this->user_name = session('user_name');
        //权限验证
        $this->check_login();   //检查是否登录
    }

    private function check_login(){
        if($this->user_id == '' || $this->user_name == ''){
            if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){
                $ret['code'] = 800;
                $ret['msg'] = '登录信息失效，请重新登录';
                return $ret;
                die;
            }else{
                $this->redirect('/index.php/index/Account/login');
            }
        }
    }
}
