<?php
namespace app\index\model;
use think\Model;

/**
 * 角色用户关联模型
 * Class AccountRoleModel
 * @package app\index\model
 */
class AccountRoleModel extends Model
{
    protected $tableName = 'account_role';

    /**
     * 获取角色权限
     * @param $map
     * @return array|false|\PDOStatement|string|Model
     * @auth sunjie
     * @time 2017-05-14
     */
    public function getRoleRule($map){
        $role_rule = db($this->tableName)->alias("ar")
            ->field("r.rules")
            ->join("role r","r.id = ar.role_id","LEFT")
            ->where($map)->find();
        return $role_rule;
    }

}
