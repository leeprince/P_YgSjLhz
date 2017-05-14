<?php 
namespace app\weixin\controller;

use think\Controller;

class Company extends Controller
{
	public function introduction(){
		
		return $this -> fetch();
	}
}


 ?>