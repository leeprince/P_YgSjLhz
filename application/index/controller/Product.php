<?php
namespace app\index\controller;
use app\index\model\ProductModel;
use think\Controller;
use think\View;

class Product extends Controller
{
    /**
     * 产品列表
     * @return mixed
     */
    public function product_list(){
        $model = new ProductModel();
        $status = input("post.status");
        $title = input("post.title");
        $map = array();
        if($status){
            $map['status'] = array('like','%'.$status.'%');
        }
        if($title){
            $map['title'] = array('like','%'.$title.'%');
        }
        $product_list = $model->getProductList($map);
        $this->assign("status",$status);
        $this->assign("title",$title);
        $this->assign("product_list",$product_list);
        return $this->fetch();
    }
}
