<?php 
namespace app\weixin\controller;

use think\Controller;

class Product extends Controller
{
	public function product_query(){
		
		return $this -> fetch();
	}
}


 ?>