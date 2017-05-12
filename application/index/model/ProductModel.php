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
     * @auth sunjie
     * @time 2017-05-12
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
     * @auth sunjie
     * @time 2017-05-12
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

    /**
     * 添加产品
     * @param $data
     * @return mixed
     * @auth sunjie
     * @time 2017-05-12
     */
    public function addProduct($data){
        $result  = db($this->tableName)->insert($data);
        if($result){
            $return['code'] = 200;
            $return['msg'] = '添加成功';
        }else{
            $return['code'] = 300;
            $return['msg'] = '创建失败，请重试';
        }
        return $return;
    }

}
