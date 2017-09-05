<?php  
	namespace app\controllers;
	use yii\web\Controller;
	use yii;
	use yii\app;
	use app\models\User;
	use app\modules\models\Information;
	use app\models\Check;
	use app\models\Overdue;
	use yii\data\Pagination;

	class UserCenterController extends Controller
	{
		public function behaviors(){
	        return [
	            [
	                'class' => 'yii\filters\HttpCache',
	                'only' => ['index'],
	                'lastModified' => function () {
	                	$user = $session['user']['user_info'];
	                	$count1 = Check::getAll($user->client_id)->count();
	                    $count = $count1 + 1;
	                    return $count;
	                }
	            ]
	        ];
	    }
		public function checkLogin(){
			$session = yii::$app->session;
			if (isset($session['user']['isLogin'])) {
				return true;
			}
			return false;
		}
		public function actionRegister(){
			$newuser = new User;
			$newuser->scenario = 'register';
			$this->layout = false;
			if (yii::$app->request->isPost) {
				$post = yii::$app->request->post();
				if ($newuser->register($post)) {
					$this->redirect(['user-center/register']);
 					yii::$app->end();
				}
			}
			return $this->render('register',['newuser'=>$newuser]);
		}
		public function actionChangePassword(){
			$this->layout = false;
			return $this->render('change-password');
		}
		public function actionWaterHistoryQuery(){
			$this->layout = 'header&footer';
			$session = yii::$app->session;
			$user = $session['user']['user_info'];
			$start_time = null;
			$end_time = null;
			if ($this->checkLogin()) {
				if (yii::$app->request->isPost) {
					$post = yii::$app->request->post();
					$start_time = $post['start_time'];
					$end_time = $post['end_time'];
					if ($start_time==''&&$end_time=='') {
						$data = Check::getAll($user->client_id);
					}else{
						$end_time = $end_time.' 23:59:59';
						$data = Check::filter($start_time,$end_time,$user->client_id);
					}
				}else{
					$data = Check::getAll($user->client_id);
				}
				// 分页
				$pageSize = yii::$app->params['pageSize']['history-check'];
				$pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $pageSize]);//实例化分页类,带上参数(总条数,每页显示条数)
				$checks = $data->offset($pages->offset)->limit($pages->limit)->all();
				return $this->render('water-history-query',['user'=>$user,'checks'=>$checks,'start_time'=>$start_time,'end_time'=>$end_time,'pager'=> $pages]);
			}else{
				$this->redirect(['home/index']);
			}
		}
		public function actionInformationComplaints(){
			$this->layout = 'header&footer';
			$session = yii::$app->session;
			$user = $session['user']['user_info'];
			$information = new Information;
			if (yii::$app->request->ispost) {
				$post = yii::$app->request->post();
				if ($information->commit($post)) {
					yii::$app->getSession()->setFlash('success', '提交成功');
					$this->redirect(['user-center/information-complaints']);
 					yii::$app->end();
				}
			}
			if ($this->checkLogin()) {
				return $this->render('information-complaints',['user'=>$user,'information'=>$information]);
			}else{
				$this->redirect(['home/index']);
			}
		}
	}
?>