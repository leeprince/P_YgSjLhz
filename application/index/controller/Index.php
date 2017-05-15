<?php
namespace app\index\controller;
use app\index\model\AccountRoleModel;
use app\index\model\AuthRuleModel;
use app\index\model\User;
use think\Controller;
use think\View;

/**
 * 首页控制器
 * Class Index
 * @package app\index\controller
 */
class Index extends Common
{
    /**
     * 首页
     * @return mixed
     * @auth sunjie
     * @time 2017-05-11
     */
    public function index()
    {
        $model_account_role = new AccountRoleModel();
        $model_rule = new AuthRuleModel();
        //根据登录用户ID获取左导航列表
        $user_id = $this->user_id;
        $user_name = $this->user_name;
        $map_role = array();
        $map_role['ar.account_id'] = $user_id;
        $role_rule = $model_account_role->getRoleRule($map_role);
        $map = array();
        if("*" != $role_rule['rules']){
            $map['id'] = array('in',$role_rule['rules']);
        }
        $map['is_menu'] = AuthRuleModel::IS_MENU;
        $rule_list = $model_rule->getRuleList($map);
        $this->assign("rule_list",$rule_list);
        $this->assign("role_name",$role_rule['title']);
        $this->assign("user_name",$user_name);
        return $this->fetch();
    }

    /**
     * 欢迎页
     * @return mixed
     * @auth sunjie
     * @time 2017-05-11
     */
    public function welcome()
    {
        $model_user = new User();
        $map = array();
        $user_list = $model_user->getList($map);
        $this->assign("user_list",$user_list);
        return $this->fetch();
    }
}
