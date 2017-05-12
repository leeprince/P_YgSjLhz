<?php
namespace app\index\controller;
use app\index\model\AuthRule;
use app\index\model\User;
use think\View;

class Index extends \think\Controller
{
    public function index()
    {
        $model_rule = new AuthRule();
        $map = array();
        $map['is_menu'] = AuthRule::IS_MENU;
        $rule_list = $model_rule->getRuleList($map);
        $this->assign("rule_list",$rule_list);
//        dump($rule_list[1]['child']);die;
//        dump($rule_list[1]['child']);die;
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
