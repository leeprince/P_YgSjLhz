<?php 
namespace app\index\model;

use think\Model;

class AccountModel extends Model
{
	protected $tableName = 'account';

	public function login_verify($verify_account,$verify_password,$udpate_time){
		$account_verify = db($this->tableName)->where($verify_account)->count();
		$all_verify = db($this ->tableName)->where($verify_password)->count();
		if($account_verify <= 0){
			$return = 'account-error';
			// $return = '请输入正确的账号';
		}elseif($all_verify <= 0){
			$return = 'password-error';
			// $return['msg'] = '请输入正确的密码';
		}else{
			$update = db($this->tableName)->where($verify_password)->update($udpate_time);
			$return = 'success';
			// $return['msg'] = '登录成功';
		}
		return $return;


	}
}



 ?>