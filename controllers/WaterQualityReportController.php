<?php  
	namespace app\controllers;
	use yii\web\Controller;
	use yii;
	
	class WaterQualityReportController extends Controller
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
			$get = yii::$app->request->get();
			$category = $get['category'];
			return $this->render('index',['category'=>$category]);
		}
	}
?>