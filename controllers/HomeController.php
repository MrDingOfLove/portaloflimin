<?php  
	namespace app\controllers;
	use yii\web\Controller;
	use app\modules\models\News;
	use yii;
	use yii\app;
	use app\models\User;

	class HomeController extends Controller
	{
		public function behaviors(){
	        return [
	            [
	                'class' => 'yii\filters\HttpCache',
	                'only' => ['index'],
	                'lastModified' => function () {
	                  	return 1;
	                }
	            ]
	        ];
	    }
		public function checkLogin_str(){
			$session = yii::$app->session;
			if (isset($session['user']['isLogin'])) {
				return true;
			}
			return false;
		}
		public function actionIndex(){
			$this->layout = 'header&footer';
			$session = yii::$app->session;
			$user = $this->checkLogin_str() ? $session['user']['user_info'] : new User;
			$data = News::find()->orderBy('id desc')->asArray()->all();
			$user->scenario = 'login';//登陆场景
			$isLogin = $this->checkLogin_str();//是否登录
			if (yii::$app->request->isPost) {
				$post = yii::$app->request->post();
				if ($user->login($post)) {
					$this->redirect(['home/index']);
 					yii::$app->end();
				}
			}
			$index_str = $this->checkLogin_str() ? 'index-logined':'index';
		    return $this->render($index_str,['user'=>$user,'news'=>$data,'isLogin'=>$isLogin]);
		}
	}
?>