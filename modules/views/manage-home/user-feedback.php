<?php  
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
	//设置title
	$this->title = '咨询投诉';
	// 引入css
	$this->registerCssFile('css/admin/manage-page.css');
?>
<link rel="stylesheet" type="text/css" href="css/admin/article-list.css">
<link rel="stylesheet" type="text/css" href="css/admin/info-detial.css">
<style type="text/css">
	.info{
		width: 10%;
		text-align: center;
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
			<li class="list-item"><a href="<?php echo Url::to(['manage-home/dp']); ?>">行政动态</a></li>
			<li class="list-item"><a href="<?php echo Url::to(['manage-home/government-affairs']); ?>">政务公开</a></li>
			<li class="list-item"><a href="<?php echo Url::to(['manage-home/article-add','category'=>'news']); ?>">文章添加</a>
			<li class="list-item list-item-active"><a href="<?php echo Url::to(['manage-home/user-feedback']); ?>">资讯投诉</a></li>
			</li>
		</ul>
	</div>
	<div class="show-content float-right">
		<div class="content-right float-right">
			<table>
				<tr>
					<td class="info" style="width: 5%">序号</td>
					<td class="info">问题类别</td>
					<td class="info">时间</td>
					<td class="info">用户名</td>
					<td class="info">联系方式</td>
					<td class="info">操作</td>
					<td class="info">处理结果</td>
				</tr>
				<?php $index = 1; ?>
				<?php foreach ($artcles as $information):?>
				<tr>
					<td class="info" style="width: 5%"><?php echo $index++; ?></td>
					<td class="info"><?php echo $information->category; ?></td>
					<td class="info"><?php echo substr($information->time, 0,10); ?></td>
					<td class="info"><?php echo $information->username; ?></td>
					<td class="info"><?php echo $information->phone; ?></td>
					<td class="info"><a class="info-change info-change-see" onclick="show_detial(<?php echo $information->id; ?>)" href="<?php if (isset($page)&&isset($per_page)) {
							echo Url::to(['manage-home/user-feedback','id'=>$information->id,'page'=>$page,'per-page'=>$per_page]);
					} else{
						echo Url::to(['manage-home/user-feedback','id'=>$information->id]);
					} ?>">查看</a></td>
					<td class="info">
						<?php if ($information->handleresult):?>
							<span class="handled">已处理</span>
						<?php else :?>
							<span class="nothandled">未处理</span>
						<?php endif ?>
					</td>
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
		<?php if (isset($article_one)):?>
			<div id='backimg'></div>
			<div id='info-detial'>
				<div>
					<label class='tip'>姓名</label><span><?php echo $article_one->username; ?></span>
					&nbsp&nbsp&nbsp
					<label class='tip'>联系方式</label><span><?php echo $article_one->phone; ?></span>
				</div>
				<div>
					<label class='tip'>地址</label><span><?php echo $article_one->address; ?></span>
				</div>
				<div>
					<label class='tip'>问题类别</label><span><?php echo $article_one->category; ?></span>
				</div>
				<div><label class='tip'>详情信息</label></div>
				<div class='info-detial-show'>
					<div><p><?php echo $article_one->detial; ?></p></div>
				</div>
				<?php if ($article_one->handleresult) :?>
					<label class='tip'>处理结果</label>
					<div class='info-detial-show'>
						<div><p><?php echo $article_one->handledinfo; ?></p></div>
					</div>
					<a class="processed">已处理</a>
				<?php else : ?>
					<?php  $form = ActiveForm::begin([
						'action'=>Url::to(['manage-home/handled','id'=>$article_one->id,'page'=>$page,'per-page'=>$per_page]),
						'fieldConfig'=>[
		 					'template'=>'<div>{error}{input}</div>'
			 			],
			 		]);?>
						<p style="padding-top: 10px;">填写处理结果</p>
						<?php echo $form->field($article_one,'handledinfo')->textArea(['rows'=>'6','class'=>'brief','style'=>'width:100%; font-size:18px;']); ?>
						<?php echo Html::submitButton('标记为已处理');?>
					<?php ActiveForm::end();?>
				<?php endif ?>
				<a class='info-change back'  href="<?php echo Url::to(['manage-home/user-feedback','page'=>$page,'per-page'=>$per_page]); ?>">返回</a>
			</div>
		<?php endif ?>
	</div>
</div>
<script type="text/javascript">
	var pagination = document.getElementsByClassName('pagination')[0];
	if(pagination){
		var a_s = pagination.getElementsByTagName('a');
		for (var i = 0; i < a_s.length; i++) {
			a_s[i].href = a_s[i].href.replace(/&id=/,'&a=');
			if(a_s[i].href.indexOf("Fhandled") > 0 ){
				a_s[i].href = a_s[i].href.replace(/handled/,'user-feedback');
			} 	
		}
	};
	var form = document.getElementsByTagName('form')[0];
	// if(form){
	// 	form.action = form.action.replace(/user-feedback/,'handled');
	// };
</script>