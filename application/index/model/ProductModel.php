<?php
namespace app\index\model;
use think\Model;
class ProductModel extends Model
{
    protected $tableName = 'product';

    const STATUS_RAISE = 1;     //募集中
    const STATUS_DEPOSIT = 2;   //续存
    const STATUS_QUIT = 3;      //退出

    const STATUS_RAISE_STR = '募集中';
    const STATUS_DEPOSIT_STR = '续存';
    const STATUS_QUIT_STR = '退出';

    const STATUS_KNOWN = '未知状态';

    /**
     * 获取产品状态文案
     * @param $status
     * @return string
     */
    private static function getStatus($status){
        switch($status){
            case self::STATUS_RAISE : {
                $status_str = self::STATUS_RAISE_STR;
                break;
            }
            case self::STATUS_DEPOSIT : {
                $status_str = self::STATUS_DEPOSIT_STR;
                break;
            }
            case self::STATUS_QUIT : {
                $status_str = self::STATUS_QUIT_STR;
                break;
            }
            default : {
                $status_str = self::STATUS_KNOWN;
            }
        }
        return $status_str;
    }


    /**
     * 根据条件获取产品列表
     * @param $map
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getProductList($map){
        $product_list = db($this->tableName)->where($map)->select();
        if($product_list){
            foreach($product_list as &$product){
                $product['status_str'] = self::getStatus($product['status']);
            }
        }
        return $product_list;
    }

}
