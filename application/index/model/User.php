<?php
namespace app\index\model;
use think\Model;
class User extends Model
{
    protected $tableName = 'user';

    const SEX_MAN = 1;
    const SEX_WOMAN = 2;

    const SEX_MAN_STR = '男';
    const SEX_WOMAN_STR = '女';

    /**
     * 获取用户性别字段文案
     * @param $sex
     * @return string
     */
    private static function getSex($sex){
        switch($sex){
            case self::SEX_MAN : {
                $sex_str = self::SEX_MAN_STR;
                break;
            }
            case self::SEX_WOMAN : {
                $sex_str = self::SEX_WOMAN_STR;
                break;
            }
            default : {
                $sex_str = '';
            }
        }
        return $sex_str;
    }

    public function getList($map)
    {
        $user_list = db($this->tableName)->alias('u')
            ->field('u.*,up.age,up.sex')
            ->join('dev_user_profile up','up.user_code = u.user_code','LEFT')
            ->where($map)->select();
        if($user_list){
            foreach($user_list as &$user){
                $user['sex_str'] = self::getSex($user['sex']);
            }
        }
        return $user_list;
    }
}
