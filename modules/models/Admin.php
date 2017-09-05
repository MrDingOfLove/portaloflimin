<?php
namespace app\modules\models;
use yii\db\ActiveRecord;
use yii;
/**
* 
*/
class Admin extends ActiveRecord
{
	public $rememberMe = true;
	public static function tableName(){
		return "{{admin}}";
	}
	public function rules(){
		return[
			['adminuser','required','message'=>'管理员账号不能为空'],
			['adminpass','required','message'=>'管理员密码不能为空'],
			['rememberMe','boolean'],
			['adminpass','validatePass'],
		];
	}
	public function validatePass(){
		if (!$this->hasErrors()) {
			$loginData = self::find()->where('adminuser = :user and adminpass = :pass',[':user'=>$this->adminuser,':pass'=>md5($this->adminpass)])->one();
			if (is_null($loginData)) {
				$this->addError('adminpass','用户名或者密码错误');
			}
		}
	}
	public function login($loginData){
		if($this->load($loginData)&&$this->validate()){
			//有意义的事
			$lifetime = $this->rememberMe ? 24*3600 : 0;
			$session = yii::$app->session;
			session_set_cookie_params($lifetime);
			$session['admin']=[
				'adminuser'=> $this->adminuser,
				'isLogin'=> 1,
			];
			$this->updateAll(['logintime'=>time(),'loginip'=>ip2long(yii::$app->request->userIp)],'adminuser=:user',[':user'=>$this->adminuser]);
			return (bool)$session['admin']['isLogin'];
		}
		return false;
	}
}
?>