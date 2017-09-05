<?php  
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Html;
	//设置title
	$this->title = '行政动态';
	// 引入css
	$this->registerCssFile('css/admin/manage-page.css');
?>
<link rel="stylesheet" type="text/css" href="css/admin/article-list.css">
<link rel="stylesheet" type="text/css" href="css/admin/article-edit.css">
<style type="text/css">
	#article-edit{
		width:calc(100% - 305px);
		position: absolute;
		right: 100px;
		top:30px;

	}
	.backimg{
		top: 30px;
		position: absolute;
		width:calc(100% - 105px);
		height: 1307px;
		background: #333;
		opacity: 0.5;
		right: 0;
	}	
</style>
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
			<li class="list-item list-item-active"><a href="<?php echo Url::to(['manage-home/dp']); ?>">行政动态</a></li>
			<li class="list-item"><a href="<?php echo Url::to(['manage-home/government-affairs']); ?>">政务公开</a></li>
			<li class="list-item"><a href="<?php echo Url::to(['manage-home/article-add','category'=>'news']); ?>">文章添加</a>
			<li class="list-item"><a href="<?php echo Url::to(['manage-home/user-feedback']); ?>">咨询投诉</a></li>
			</li>
		</ul>
	</div>
	<div class="show-content float-right">
		<div class="content-right float-right">
			<table>
				<tr>
					<td class="new-id">序号</td>
					<td class="new-title">标题</td>
					<td class="new-time">时间</td>
					<td class="new-edit">操作</td>
				</tr>
				<?php $index = 1; ?>
				<?php foreach ($artcles as $artcle):?>
				<tr>
					<td class="new-id"><?php echo $index++; ?></td>
					<td class="new-title"><?php echo $artcle->title; ?></td>
					<td class="new-time"><?php echo substr($artcle->time, 0,10); ?></td>
					<td class="new-edit"><a href="<?php echo Url::to(['manage-home/dp-edit','id'=>$artcle->id,'page'=>$page,'per_page'=>$per_page]); ?>">编辑</a><a style="cursor: pointer; ?>" onclick = "isDelete('<?php echo Url::to(['manage-home/dp-delete','id'=>$artcle->id,'page'=>$page,'per_page'=>$per_page]);?>')">删除</a></td>
				</tr>
				<?php endforeach?>
			</table>
		</div>
			<div class="bottom">
			<?php  
				echo LinkPager::widget([
		    		'pagination' => $pager,
		    		'firstPageLabel'=>'首页',
		    		'prevPageLabel'=>'&#8249',
		    		'nextPageLabel'=>'&#8250',
		    		'lastPageLabel'=>'尾页',
				]);
			?>
		</div>
	</div>
	<?php if (isset($article)):?>
		<div class="backimg"></div>
		<div class="show-content float-right" id="article-edit">
			<div class="content-right float-right">
			 	<?php $form = ActiveForm::begin([
			 		'options'=>['class'=>''],
			 		'fieldConfig'=>[
			 			'template'=>'<div>{input}{error}</div>'
			 		],
			 	]);?>
			    <div class="title_content">
			    	<a style="float: right;" href="<?php echo Url::to(['manage-home/dp','page'=>$page,'per_page'=>$per_page]); ?>">返回</a>
			    	<p style="text-align: center; color: red;"><?php 
					    if (yii::$app->session->hasFlash('edit')) {
					     	 echo yii::$app->session->getFlash('edit');
					     } 
			    	?></p>
			    	<p>文章标题</p>
				    <?php echo $form->field($article,'title')->textInput(['class'=>'title','placeholder'=>'输入标题']); ?>
				    <p>发布时间</p>
				    <?php echo $form->field($article,'time')->textInput(['class'=>'title','placeholder'=>'输入时间']); ?>
				    <p>文章简介</p>
			        <?php echo $form->field($article,'brief')->textArea(['rows'=>'5','class'=>'brief','placeholder'=>'输入文章简介']); ?>
			        <p>封面图</p>
			        <?php echo $form->field($picture,'file')->fileInput(['class'=>'cover']); ?>
		        	<p>文章内容</p>
		    	</div>
			    <div class="article-edit-arear">
			        <!-- 加载编辑器的容器 -->
			        <script id="container" class="udetior" name="detial" type="text/plain"><?php echo $article->detial; ?></script>
			        <?php echo Html::submitButton('保存修改');?>
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
	<?php endif ?>
</div>
<script type="text/javascript">
	function isDelete(url){
		var result=confirm("是否删除");
		if (result) {
			window.location.href=url; 
		}
	}
</script>