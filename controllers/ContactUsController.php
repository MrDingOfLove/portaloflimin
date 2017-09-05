<?php
	namespace app\controllers;
	use yii\web\Controller;
	
	class ContactUsController extends Controller
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
		public function actionIndex(){
			$this->layout = 'header&footer';
			return $this->render('index');
		}
	}
?>