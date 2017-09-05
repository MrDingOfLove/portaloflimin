<?php  
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\bootstrap\Alert;
	//设置title
	$this->title = '文章添加-政务公开';
	// 引入css
	$this->registerCssFile('css/admin/manage-page.css');
?>
<link rel="stylesheet" type="text/css" href="css/admin/article-list.css">
<link rel="stylesheet" type="text/css" href="css/admin/article-edit.css">
<div class="header">
	<div class="logo float-left"><img src="img/admin/logo.png"></div>
	<div class="title_top float-left"><p>利民后台管理系统</p></div>
	<div class="exit float-right">
		<a href="<?php echo Url::to(['login-status/logout']); ?>">
			<img src="/img/admin/exit.png">
			<p>退出</p>
		</a>
	</div>
</div>
<div class="content">
	<div class="content-left float-left">
		<ul>
			<li class="list-item"><a href="<?php echo Url::to(['manage-home/manage-page']); ?>">新闻管理</a></li>
			<li class="list-item"><a href="<?php echo Url::to(['manage-home/dp']); ?>">行政动态</a></li>
			<li class="list-item"><a href="<?php echo Url::to(['manage-home/government-affairs']); ?>">政务公开</a></li>
			<li class="list-item list-item-active" ><a>文章添加</a>
			</li>
			<ul id = "sub-list">
				<li class="sub-list-item "><a href="<?php echo Url::to(['manage-home/article-add','category'=>'news']); ?>">新闻管理</a></li>
				<li class="sub-list-item "><a href="<?php echo Url::to(['manage-home/article-add','category'=>'DP']); ?>">行业动态</a></li>
				<li class="sub-list-item sub-list-item-active"><a href="<?php echo Url::to(['manage-home/article-add','category'=>'government-affairs']); ?>">政务公开</a></li>
				<li class="list-item"><a href="<?php echo Url::to(['manage-home/user-feedback']); ?>">咨询投诉</a></li>
			</ul>
		</ul>
	</div>
	<div class="show-content float-right">
		<div class="content-right float-right">
			
		 	<?php $form = ActiveForm::begin([
		 		'options'=>['class'=>''],
		 		'fieldConfig'=>[
		 			'template'=>'<div>{input}{error}</div>'
		 		],
		 	]);?>
		    <div class="title_content">
		    	<p style="text-align: center; color: red;"><?php 
				    if (yii::$app->session->hasFlash('info')) {
				     	 echo yii::$app->session->getFlash('info');
				     } 
		    	?></p>
		    	<p>文章标题</p>
			    <?php echo $form->field($article,'title')->textInput(['class'=>'title','placeholder'=>'输入标题']); ?>
			    <p>发布时间</p>
			    <?php echo $form->field($article,'time')->textInput(['class'=>'title','placeholder'=>'输入时间 格式 xxxx-xx-xx']); ?>
	        	<p>文章内容</p>
		    </div>
		    <div class="article-edit-arear">
		        <!-- 加载编辑器的容器 -->
		        <script id="container" class="udetior" name="detial" type="text/plain"><?php if (isset($article)) {echo $article->detial;} ?></script>
		        <?php echo Html::submitButton('添加');?>
		    </div>

		    <?php ActiveForm::end();?>

		    <!-- 配置文件 -->
	        <script type="text/javascript" src="../uedtior/ueditor.config.js"></script>
	        <!-- 编辑器源码文件 -->
	        <script type="text/javascript" src="../uedtior/ueditor.all.js"></script>
	        <!-- 实例化编辑器 -->
	        <script type="text/javascript">
	            var ue = UE.getEditor('container');
	        </script>
		</div>
	</div>
	<script type="text/javascript">
		
	</script>
</div>
