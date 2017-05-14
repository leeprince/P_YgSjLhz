<?php
namespace app\index\model;
use think\Model;

/**
 * 产品管理模型
 * Class ProductModel
 * @package app\index\model
 */
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

    const IS_DELETE = 'Y';
    const IS_NOT_DELETE = 'N';

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

    /**
     * 修改产品
     * @param $map
     * @return array|false|\PDOStatement|string|Model
     * @auth sunjie
     * @time 2017-05-13
     */
    public function getOne($map){
        $product_detail = db($this->tableName)->where($map)->find();
        if($product_detail){
            $product_detail['status_str'] = self::getStatus($product_detail['status']);
        }
        return $product_detail;
    }

    public function saveProduct($map,$data){
        $result = db($this->tableName)->where($map)->update($data);
        if($result){
            $return['code'] = 200;
            $return['msg'] = '修改成功';
        }else{
            $return['code'] = 300;
            $return['msg'] = '修改失败，请重试';
        }
        return $return;
    }

    /**
     * 删除产品
     * @param $map
     * @param $data
     * @return mixed
     * @auth sunjie
     * @time 2017-05-13
     */
    public function deleteProduct($map,$data){
        $result = db($this->tableName)->where($map)->update($data);
        if($result){
            $return['code'] = 200;
            $return['msg'] = '删除成功';
        }else{
            $return['code'] = 300;
            $return['msg'] = '删除失败，请重试';
        }
        return $return;
    }
}
