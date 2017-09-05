<?php
namespace app\modules\controllers;
use yii\web\Controller;
use app\modules\models\Admin;
use Yii;
 
class LoginStatusController extends Controller
 {
 	public function actionLogin(){
 		$model = new Admin;
 		$this->layout = 'layout';
 		$session = yii::$app->session;
 		if ($session['admin']['isLogin']=='1') {
 			$this->redirect(['manage-home/manage-page']);
 			yii::$app->end();
 		}
 		if (yii::$app->request->isPost){
 			$post = yii::$app->request->post();
 			if ($model->login($post)){
 				$this->redirect(['manage-home/manage-page']);
 				yii::$app->end();
 			}
 		}
 		return $this->render('login',['model' => $model]); 
 	}
 	public function actionLogout(){
 		yii::$app->session->removeAll();
 		if (!isset(yii::$app->session['admin']['isLogin'])) {
 			$this->redirect(['login-status/login']);
 			yii::$app->end();
 		}
 		var_dump(yii::$app->session);
 		$this->goback();
 	}
 }
 ?>