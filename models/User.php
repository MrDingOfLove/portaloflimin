<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii;
use app\models\Check;
/**
* 
*/
class User extends ActiveRecord
{	public $pwd_sure = '';
	public static function tableName(){
		return "{{tb_client}}";
	}
	public function rules(){
		return[
			['client_id','required','message'=>'用户编号不能为空','on'=>['register','login']],
			['client_email','email','message'=>'请填写正确的邮箱地址','on'=>'register'],
			['client_tel','required','message'=>'请填写手机号','on'=>'register'],
			['pwd_sure','required','message'=>'请确认密码','on'=>'register'],
			['client_pwd','required','message'=>'密码不能为空','on'=>['register','login']],
			['client_pwd','validatePass','on'=>'login'],
			['client_id','validateId','on'=>'register'],
			['pwd_sure','validatepwd_sure','on'=>'register'],

		];
	}
	public function validateId(){
		if (!$this->hasErrors()) {
			$registerId = self::find()->where('client_id = :userid',[':userid'=>$this->client_id])->one();
			if ($registerId) {
				if (!is_null($registerId['client_pwd'])) {
					$this->addError('client_id','此用户编号已注册');
				}
			}else{
				$this->addError('client_id','此用户编号不存在');
			}
		}
	}
	public function validatepwd_sure(){
		if (!$this->hasErrors()) {
			if ($this->client_pwd != $this->pwd_sure) {
				$this->addError('pwd_sure','两次密码不一致');
			}
		}
	}
	public function validatePass(){
		if (!$this->hasErrors()) {
			$user = self::find()->where('client_id = :user_id',[':user_id'=>$this->client_id])->one();
			$loginData = self::find()->where('client_id = :user_id and client_pwd = :pass',[':user_id'=>$this->client_id,':pass'=>md5(md5($this->client_pwd)+$user->client_salt)])->one();
			if (is_null($loginData)) {
				$this->addError('client_pwd','用户名或者密码错误');
			}
		}
	}
	public function login ($data){
		if ($this->load($data)&&$this->validate()){
			//有意义的事
			$user = self::find()->where('client_id = :user_id',[':user_id'=>$this->client_id])->one();
			$lifetime = 0;
			$session = yii::$app->session;
			session_set_cookie_params($lifetime);
			$session['user']=[
				'user_info'=> $user,
				'isLogin'=> 1,
			];
			return true;
		}
		return false;
	}
	function register($data){
		if ($this->load($data)&&$this->validate()) {
			$rows = 0;
			$salt = $this->getRandomStr();
			$rows = $this->updateAll(['client_pwd' => md5(md5($this->client_pwd)+$salt),'client_email' => $this->client_email,'client_tel' => $this->client_tel,'client_salt'=>$salt],"client_id=:user_id",['user_id'=>$this->client_id]);
			if ($rows >0) {
				$session = yii::$app->session;
				yii::$app->getSession()->setFlash('register_success', '注册成功');
				return true;
			}
			return false;
		}
	}
	public function getRandomStr(){
		$randomStr = '';
		for ($i=0; $i < 20; $i++) { 
			$randomStr .= chr(rand(33,126));
		}
		return $randomStr;
	}
}
?>