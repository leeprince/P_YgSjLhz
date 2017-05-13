<?php
namespace app\index\controller;
use app\index\model\ProductModel;
use think\Controller;
use think\Request;

class Product extends Controller
{
    /**
     * 产品列表
     * @return mixed
     * @auth sunjie
     * @time 2017-05-12
     */
    public function product_list(){
        $model = new ProductModel();
        $status = input("post.status");
        $title = input("post.title");
        $map = array();
        $map['is_delete'] = ProductModel::IS_NOT_DELETE;
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


    /**
     * 添加产品
     * @return mixed
     * @auth sunjie
     * @time 2017-05-12
     */
    public function product_add(){
        $model = new ProductModel();
        if(Request::instance()->isPost()){
            $title = input("post.title");
            $status = input("post.status");
            $establish_date = input("post.establish_date");
            $administrator = input("post.administrator");
            $product_deadline = input("post.product_deadline");
            $currency = input("post.currency");
            $investment_scope = input("post.investment_scope");
            $trusteeship_body = input("post.trusteeship_body");
            $subscription_fee = input("post.subscription_fee");
            $redemption_fee = input("post.redemption_fee");
            $management_fee = input("post.management_fee");
            $trust_fee = input("post.trust_fee");
            $outsourcing_service_fee = input("post.outsourcing_service_fee");
            $data = array();
            $data['title'] = $title;
            $data['status'] = $status;
            $data['establish_date'] = $establish_date;
            $data['administrator'] = $administrator;
            $data['product_deadline'] = $product_deadline;
            $data['currency'] = $currency;
            $data['investment_scope'] = $investment_scope;
            $data['trusteeship_body'] = $trusteeship_body;
            $data['subscription_fee'] = $subscription_fee;
            $data['redemption_fee'] = $redemption_fee;
            $data['management_fee'] = $management_fee;
            $data['trust_fee'] = $trust_fee;
            $data['outsourcing_service_fee'] = $outsourcing_service_fee;
            $data['createtime'] = $data['updatetime'] = date("Y-m-d H:i:s");
            $result = $model->addProduct($data);
            return $result;
        }else{
            return $this->fetch();
        }
    }

    /**
     * 修改产品
     * @return mixed
     * @auth sunjie
     * @time 2017-05-13
     */
    public function product_save(){
        $model = new ProductModel();
        if(Request::instance()->isPost()){
            $id = input("post.id");
            $title = input("post.title");
            $status = input("post.status");
            $establish_date = input("post.establish_date");
            $administrator = input("post.administrator");
            $product_deadline = input("post.product_deadline");
            $currency = input("post.currency");
            $investment_scope = input("post.investment_scope");
            $trusteeship_body = input("post.trusteeship_body");
            $subscription_fee = input("post.subscription_fee");
            $redemption_fee = input("post.redemption_fee");
            $management_fee = input("post.management_fee");
            $trust_fee = input("post.trust_fee");
            $outsourcing_service_fee = input("post.outsourcing_service_fee");
            $map = array();
            $data = array();
            $map['id'] = $id;
            $data['title'] = $title;
            $data['status'] = $status;
            $data['establish_date'] = $establish_date;
            $data['administrator'] = $administrator;
            $data['product_deadline'] = $product_deadline;
            $data['currency'] = $currency;
            $data['investment_scope'] = $investment_scope;
            $data['trusteeship_body'] = $trusteeship_body;
            $data['subscription_fee'] = $subscription_fee;
            $data['redemption_fee'] = $redemption_fee;
            $data['management_fee'] = $management_fee;
            $data['trust_fee'] = $trust_fee;
            $data['outsourcing_service_fee'] = $outsourcing_service_fee;
            $data['updatetime'] = date("Y-m-d H:i:s");
            $result = $model->saveProduct($map,$data);
            return $result;
        }else{
            $id = input("get.id");
            $map = array();
            $map['id'] = $id;
            $product_detail = $model->getOne($map);
            $this->assign("product_detail",$product_detail);
            $this->assign("id",$id);
            return $this->fetch();
        }
    }

    /**
     * 产品详情
     * @return mixed
     * @auth sunjie
     * @time 2017-05-13
     */
    public function product_detail(){
        $model = new ProductModel();
        $id = input("get.id");
        $map = array();
        $map['id'] = $id;
        $product_detail = $model->getOne($map);
        $this->assign("product_detail",$product_detail);
        $this->assign("id",$id);
        return $this->fetch();
    }

    /**
     * 删除产品
     * @return mixed
     * @auth sunjie
     * @time 2017-05-13
     */
    public function product_delete(){
        $model = new ProductModel();
        $id = input("post.id");
        $map = array();
        $data = array();
        $map['id'] = $id;
        $data['is_delete'] = ProductModel::IS_DELETE;
        $result = $model->deleteProduct($map,$data);
        return $result;
    }
}
