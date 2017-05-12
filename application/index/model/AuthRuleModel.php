<?php
namespace app\index\model;
use think\Model;
class AuthRuleModel extends Model
{
    protected $tableName = 'auth_rule';

    const IS_MENU = 'Y';
    const IS_NOT_MENU = 'N';

    /**
     * 获取左导航列表
     * @param $map
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getRuleList($map)
    {
        $rule_list = db($this->tableName)->where($map)->select();
        if($rule_list){
            foreach($rule_list as $key=>&$rule){
                $map_get_child = array();
                $map_get_child['pid'] = $rule['id'];
                $rule['child'] = db($this->tableName)->where($map_get_child)->select();
            }
        }
        return $rule_list;
    }
}