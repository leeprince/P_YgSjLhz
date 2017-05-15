<?php 
namespace app\index\controller;

use think\Controller;

class Research extends Common
{

	public function research_list(){

		return $this->fetch();
	}

	public function research_answer_list(){
		
		return $this->fetch();
	}


}


 ?>