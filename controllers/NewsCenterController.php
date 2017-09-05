<?php  
	namespace app\controllers;
	use yii\web\Controller;
	use app\modules\models\News;
	use app\modules\models\GovernmentAffairs;
	use app\modules\models\DP;
	use yii\data\Pagination;
	use yii;

	class NewsCenterController extends Controller
	{
		public function behaviors(){
	        return [
	            [
	                'class' => 'yii\filters\HttpCache',
	                'only' => ['index'],
	                'lastModified' => function () {
	                	$mews = (new News)->find()->count();
	                	$mews_dp = (new DP)->find()->count();
	                	$mews_ga = (new GovernmentAffairs)->find()->count();
	                    $count = $mews + $mews_dp + $mews_ga + 1;
	                    return $count;
	                }
	            ]
	        ];
	    }
		public function articlesParams($data,$pageSize){
			$pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $pageSize]);//实例化分页类,带上参数(总条数,每页显示条数)
			$articles = $data->offset($pages->offset)->limit($pages->limit)->all();
			return [
				'articles'=> $articles,
				'pager'=> $pages,
			];
	 	}
		public function actionIndex(){
			$this->layout = 'header&footer';
			$pageSize = yii::$app->params['pageSize']['newscenter-new'];
			$data = News::find()->orderBy('id desc');
			return $this->render('index',$this->articlesParams($data,$pageSize));
		}
		public function actionNewsDetial(){
			$this->layout = 'header&footer';
			$id = yii::$app->request->get('id');
			$new = News::findOne(['id'=>$id]);
			return $this->render('news-detial',['new'=>$new]);
		}

		public function actionDp(){
			$this->layout = 'header&footer';
			$pageSize = yii::$app->params['pageSize']['newscenter-new'];
			$data = DP::find()->orderBy('id desc');
			return $this->render('dp',$this->articlesParams($data,$pageSize));
		}
		public function actionDpDetial(){
			$this->layout = 'header&footer';
			$id = yii::$app->request->get('id');
			$dp = DP::findOne(['id'=>$id]);
			return $this->render('dp-detial',['dp'=>$dp]);
		}

		public function actionGovernmentAffairs(){
			$this->layout = 'header&footer';
			$pageSize = yii::$app->params['pageSize']['newscenter-ga'];
			$data = GovernmentAffairs::find()->orderBy('id desc');
			return $this->render('government-affairs',$this->articlesParams($data,$pageSize));
		}
		public function actionGovernmentAffairsDetial(){
			$this->layout = 'header&footer';
			$id = yii::$app->request->get('id');
			$article = GovernmentAffairs::findOne(['id'=>$id]);
			return $this->render('government-affairs-detial',['article'=>$article]);
		}
		

	}
?>