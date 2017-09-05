<?php
namespace app\modules\controllers;
use yii\web\Controller;
use app\modules\models\News;
use app\modules\models\GovernmentAffairs;
use app\modules\models\DP;
use app\modules\models\UploadForm;
use app\modules\models\Information;
use Yii;
use yii\data\Pagination;
use yii\app;
use yii\web\UploadedFile;
 
class ManageHomeController extends Controller
 {
 	public function checkLogin(){
 		$session = yii::$app->session;
 		if (!isset($session['admin']['isLogin'])) {
 			$this->redirect(['login-status/login']);
 			yii::$app->end();
 		}
 	}
	public function articlesParams($data){
		$pageSize = yii::$app->params['pageSize']['manager'];
		$pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $pageSize]);//实例化分页类,带上参数(总条数,每页显示条数)
		$articles = $data->offset($pages->offset)->limit($pages->limit)->all();
		$page = yii::$app->request->get('page');
		$per_page = yii::$app->request->get('per-page');
		return [
			'artcles'=> $articles,
			'pager'=> $pages,
			'page'=>$page,
			'per_page'=>$per_page,
		];
 	}
 	public function actionManagePage(){
 		$this->checkLogin();
 		$this->layout = 'layout';
 		$data = News::find()->orderBy('id desc');
 		return $this->render('manage-page',$this->articlesParams($data));
 	}
 	public function actionManagePageEdit(){
 		$this->checkLogin();
 		$this->layout = 'layout';
 		$data = News::find()->orderBy('id desc');

 		$params = $this->articlesParams($data);

 		$id = yii::$app->request->get('id');
 		$article = News::findOne(['id'=>$id]);
 		$article->time = substr($article->time, 0,10);
 		$params['article'] = $article;

 		$uploadForm = new UploadForm;
 		$params['picture'] = $uploadForm;

 		if (yii::$app->request->isPost) {
 			$post = yii::$app->request->post();
 			$filePath = '';
 			if (isset($post['UploadForm'])) {
 				$filePath = $uploadForm->upload();
 			}
 			if ($article->updatedata($post,$filePath,$id)) {
 				yii::$app->getSession()->setFlash('edit','修改成功');
 			}else{
 				yii::$app->getSession()->setFlash('edit','修改失败');
 			}
 		}
 		return $this->render('manage-page',$params);
 	}
 	public function actionManagePageDelete(){
 		$this->checkLogin();
 		$this->layout = 'layout';

 		$id = yii::$app->request->get('id');
 		News::deleteAll(['id'=>$id]);

 		$data = News::find()->orderBy('id desc');
 		return $this->render('manage-page',$this->articlesParams($data));
 	}
 	public function actionDp(){
 		$this->checkLogin();
 		$this->layout = 'layout';
 		$data = DP::find()->orderBy('id desc');
 		return $this->render('DP',$this->articlesParams($data));
 	}
 	public function actionDpEdit(){
 		$this->checkLogin();
 		$this->layout = 'layout';
 		$data = DP::find()->orderBy('id desc');

 		$params = $this->articlesParams($data);

 		$id = yii::$app->request->get('id');
 		$article = DP::findOne(['id'=>$id]);
 		$article->time = substr($article->time, 0,10);
 		$params['article'] = $article;

 		$uploadForm = new UploadForm;
 		$params['picture'] = $uploadForm;

 		if (yii::$app->request->isPost) {
 			$post = yii::$app->request->post();
 			$filePath = '';
 			if (isset($post['UploadForm'])) {
 				$filePath = $uploadForm->upload();
 			}
 			if ($article->updatedata($post,$filePath,$id)) {
 				yii::$app->getSession()->setFlash('edit','修改成功');
 			}else{
 				yii::$app->getSession()->setFlash('edit','修改失败');
 			}
 		}
 		return $this->render('DP',$params);
 	}
 	public function actionDpDelete(){
 		$this->checkLogin();
 		$this->layout = 'layout';

 		$id = yii::$app->request->get('id');
 		DP::deleteAll(['id'=>$id]);

 		$data = DP::find()->orderBy('id desc');
 		return $this->render('DP',$this->articlesParams($data));
 	}
 	public function actionGovernmentAffairsEdit(){
 		$this->checkLogin();
 		$this->layout = 'layout';
 		$data = GovernmentAffairs::find()->orderBy('id desc');

 		$params = $this->articlesParams($data);

 		$id = yii::$app->request->get('id');
 		$article = GovernmentAffairs::findOne(['id'=>$id]);
 		$article->time = substr($article->time, 0,10);
 		$params['article'] = $article;

 		if (yii::$app->request->isPost) {
 			$post = yii::$app->request->post();
 			$filePath = '';
 			if (isset($post['UploadForm'])) {
 				$filePath = $uploadForm->upload();
 			}
 			if ($article->updatedata($post,$filePath,$id)) {
 				yii::$app->getSession()->setFlash('edit','修改成功');
 			}else{
 				yii::$app->getSession()->setFlash('edit','修改失败');
 			}
 		}
 		return $this->render('government-affairs',$params);
 	}
 	public function actionGovernmentAffairsDelete(){
 		$this->checkLogin();
 		$this->layout = 'layout';

 		$id = yii::$app->request->get('id');
 		GovernmentAffairs::deleteAll(['id'=>$id]);

 		$data = GovernmentAffairs::find()->orderBy('id desc');
 		return $this->render('government-affairs',$this->articlesParams($data));
 	}
 	public function actionGovernmentAffairs(){
 		$this->checkLogin();
 		$this->layout = 'layout';
 		$data = GovernmentAffairs::find()->orderBy('id desc');
 		return $this->render('government-affairs',$this->articlesParams($data));
 	}
 	public function actionArticleAdd(){
 		$this->checkLogin();
 		$this->layout = 'layout';
 		yii::$app->getSession()->setFlash('info','');
 		$category = yii::$app->request->get('category');
 		$uploadForm = new UploadForm;
 		switch ($category) {
 			case 'news':
 				$article = new News;
 				break;
 			case 'DP':
 				$article = new DP;
 				break;
 			case 'government-affairs':
 				$article = new GovernmentAffairs;
 				break;
 			default:
 				break;
 		}
 		if (yii::$app->request->isPost) {
 			$post = yii::$app->request->post();
 			$filePath = '';
 			if (isset($post['UploadForm'])) {
 				$filePath = $uploadForm->upload();
 			}
 			if ($article->add($post,$filePath)) {
 				yii::$app->getSession()->setFlash('info','添加成功');
 				$article->title = '';
 				$article->time = '';
 				if (isset($article->brief)) {
 					$article->brief = '';
 				}
 				$article->detial = '';
 			}else{
 				yii::$app->getSession()->setFlash('info','添加失败');
 			}
 		}
 		return $this->sw($category,$uploadForm,$article);
 		
 	}
 	public function sw($category,$uploadForm,$article){
 		switch ($category) {
 			case 'news':
 				return $this->render('article-add-news',['article'=>$article,'picture'=>$uploadForm,'category'=>$category]);
 				break;
 			case 'DP':
 				return $this->render('article-add-dp',['article'=>$article,'picture'=>$uploadForm,'category'=>$category]);
 				break;
 			case 'government-affairs':
 				return $this->render('article-add-government-affairs',['article'=>$article,'category'=>$category]);
 				break;
 			default:
 				break;
 		}
 	}
 	public function actionUserFeedback(){
 		$this->checkLogin();
 		$this->layout = 'layout';
 		$data = Information::find()->orderBy('id desc');
 		$pageSize = yii::$app->params['pageSize']['manager'];
		$pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $pageSize]);//实例化分页类,带上参数(总条数,每页显示条数)
		$articles = $data->offset($pages->offset)->limit($pages->limit)->all();

		$id = yii::$app->request->get('id');
		$article_one = Information::findOne(['id'=>$id]);

		$page = yii::$app->request->get('page');
		$per_page = yii::$app->request->get('per-page');

 		return $this->render('user-feedback',[
 			'artcles'=> $articles,
			'pager'=> $pages,
			'article_one'=>$article_one,
			'page'=>$page,
			'per_page'=>$per_page,
 		]);
 	}
 	public function actionHandled(){
 		$this->checkLogin();
 		$this->layout = 'layout';

 		$id = yii::$app->request->get('id');
		$article_one = NULL;

		$handle_info =  yii::$app->request->post('Information')['handledinfo'];

		Information::updateAll(['handleresult' => 1,'handledinfo'=>$handle_info], "id = $id");

		$page = yii::$app->request->get('page');
		$per_page = yii::$app->request->get('per-page');

 		$data = Information::find()->orderBy('id desc');
 		$pageSize = yii::$app->params['pageSize']['manager'];
		$pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $pageSize]);//实例化分页类,带上参数(总条数,每页显示条数)
		$articles = $data->offset($pages->offset)->limit($pages->limit)->all();

 		return $this->render('user-feedback',[
 			'artcles'=> $articles,
			'pager'=> $pages,
			'article_one'=>$article_one,
			'page'=>$page,
			'per_page'=>$per_page,
 		]);
 	}
 }
?>