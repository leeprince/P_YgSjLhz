<?php 
namespace app\index\controller;

use think\Controller;

class Vote extends Controller
{

	public function vote_list(){

		return $this->fetch();
	}
}


 ?>