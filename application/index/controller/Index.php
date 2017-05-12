<?php
namespace app\index\controller;
use app\index\model\AuthRuleModel;
use app\index\model\User;
use think\Controller;
use think\View;

class Index extends Controller
{
    public function index()
    {
        $model_rule = new AuthRuleModel();
        $map = array();
        $map['is_menu'] = AuthRuleModel::IS_MENU;
        $rule_list = $model_rule->getRuleList($map);
        $this->assign("rule_list",$rule_list);
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
