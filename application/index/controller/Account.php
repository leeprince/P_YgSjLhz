<?php 
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\AccountModel;

class Account extends Controller
{

	/*login _leeprince_20170513*/
	public function login(){
		$loginM = new AccountModel();
		if(Request::instance()->isPost()){
			$captchaVerify = input("post.captchaVerify");
			$data = array();
			$map = array();
			$time = array();
			$data['account'] = input("post.account");
			$map['account'] = input("post.account");
			$map['password'] = MD5(input("post.password"));
			$time['last_login_date'] = date('Y-m-d H:i:s');

			if(!captcha_check($captchaVerify)){
			    $result = 'captcha-error';
			    // $return['msg'] = '请输入正确的验证码';
			}else{
				$result = $loginM->login_verify($data,$map,$time);

			}
			return $result;
		}else{
			return $this -> fetch();
		}
	}
}



 ?>