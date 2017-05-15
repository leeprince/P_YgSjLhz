<?php 
namespace app\index\controller;

use think\Controller;

class Investment extends Common
{

	public function investment_list(){

		return $this->fetch();
	}


}


 ?>