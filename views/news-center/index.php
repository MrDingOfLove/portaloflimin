<?php 
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	//设置title
	$this->title = '新闻资讯-企业新闻';
?>
<script type="text/javascript" src="js/vendor/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/news.css">
<link rel="stylesheet" type="text/css" href="css/page-break.css">
<div class="main_content">
	<div class="content_top">
		<p class="float_left">新闻中心/</p>
		<span>News</span>
		<p class="float_right location"><img src="img/location.png" alt="">当前位置:&nbsp;&nbsp;<a href="<?php echo Url::to(['home/index']); ?>">首页</a>><span>企业新闻</span></p>
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
				<?php foreach ($articles as $article):?>
					<div class="article_lists">
						<img src="<?php echo $article->cover; ?>" alt="">
						<a href="<?php echo Url::to(['news-center/news-detial','id'=>$article->id]); ?>">
							<div class="article_block" onmouseover="hoverOnThis(this)" onmouseout="hoverOutThis(this)">
								<div class="big_left clearfix">
									<div class="block_left float_left">
										<span class="block_date_day"><?php echo substr($article->time,8,2); ?></span>
										<span class="block_date_month"><?php echo substr($article->time, 0,10); ?></span>
									</div>
								</div>
								<div class="block_right float_left">
									<h4><?php echo $article->title; ?></h4>
									<span><?php echo $article->brief; ?></span>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach ?>
				<div class="page-break">
					<?php  
						echo LinkPager::widget([
				    		'pagination' => $pager,
				    		'prevPageLabel'=>'&#8249',
				    		'nextPageLabel'=>'&#8250',
						]);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<script text="text/javascript">
	function hoverOnThis(parm) {
		parm.style.boxShadow = "0 3px 9px 0 rgba(141,144,149,0.5)"
		var left = parm.getElementsByClassName("big_left")[0];
		left.style.background = "#4C96E9";
		var day = parm.getElementsByClassName("block_date_day")[0];
		day.style.color = "#FFF";
		var month = parm.getElementsByClassName("block_date_month")[0];
		month.style.color = "#FFF";
		var detail = parm.getElementsByClassName("block_right")[0].getElementsByTagName("span")[0];
		detail.style.textDecoration = "underline";
	}
	function hoverOutThis(parm) {
		parm.style.boxShadow = "none";
		var left = parm.getElementsByClassName("big_left")[0];
		left.style.background = "#FFF";
		var day = parm.getElementsByClassName("block_date_day")[0];
		day.style.color = "#D6D6D6";
		var month = parm.getElementsByClassName("block_date_month")[0];
		month.style.color = "#999";
		var detail = parm.getElementsByClassName("block_right")[0].getElementsByTagName("span")[0];
		detail.style.textDecoration = "none";
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#five').addClass('li_active');
	});
</script>