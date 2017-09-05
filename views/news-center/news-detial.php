<?php 
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	//设置title
	$this->title = '新闻详情-'.$new->title;
?>
<script type="text/javascript" src="./js/vendor/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/news.css">
<div class="main_content">
	<div class="content_top">
		<p class="float_left">新闻中心/</p>
		<span>News</span>
		<p class="float_right location"><img src="img/location.png" alt="">当前位置:&nbsp;&nbsp;
			<a href="<?php echo Url::to(['home/index']); ?>">首页</a>><span>企业新闻</span></p>
	</div>
	<div class="content_middle">
		<div class="content_left">
			<ul class="nav_list">
				<span>新闻资讯</span>
				<li class="selected"><a href="<?php echo Url::to(['news-center/index']); ?>">企业新闻</a></li>
				<li><a href="<?php echo Url::to(['news-center/dp']); ?>">行业动态</a></li>
				<li><a href="<?php echo Url::to(['news-center/government-affairs']); ?>">政务公开</a></li>
			</ul>
		</div>
		<div class="content_right">

			<div class="content_page">
				<div class="new-header">
					<p class="new-title"><?php echo $new->title; ?></p>
					<p class="new-time"><?php echo substr($new->time, 0,10); ?></p>
				</div>
				<div class="new-detial">
					<?php echo $new->detial; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#five').addClass('li_active');
	});
</script>