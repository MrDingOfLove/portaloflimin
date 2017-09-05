<?php 
	use yii\helpers\Url;
	//设置title
	$this->title = '联系我们';
?>
<script type="text/javascript" src="js/vendor/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/contact_us.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<div class="main_content">
	<div class="content_top">
		<p class="float_left">联系我们/</p>
		<span>Contact Us</span>
		<p class="float_right location"><img src="img/location.png" alt="">当前位置:&nbsp;&nbsp;<a href="<?php echo Url::to(['home/index']); ?>">首页</a>><span>联系我们</span></p>
	</div>
	<div class="content_middle">
		<iframe src="other/contact_us_location.html" frameborder="0" scrolling="no" width="1200px;"
				height="540px;"></iframe>
		<hr>
		<h2>哈尔滨利民经济开发区自来水有限公司</h2>
		<span>Harbin Limin Economic Development Zone Water Company Limited</span>
		<div class="contact_btm clearfix">
			<div class="sty_three">
				<img src="img/contact_code.png" alt="">
				<span>关注官方微信</span>
			</div>
			<div class="sty_one contact_detail">
				<img src="img/contact_explore.png" alt="">
				<p>官方网站<br/>www.limin.com</p>
			</div>
			<div class="sty_two contact_detail">
				<img src="img/contact_location.png" alt="">
				<p>详细地址<br/>哈尔滨利民经济开发区自来水有限公司</p>
			</div>
			<div class="sty_one contact_detail">
				<img src="img/contact_tel.png" alt="">
				<p>联系电话<br/>0755-28767633</p>
			</div>
			<div class="sty_two contact_detail">
				<img src="img/contact_email.png" alt="">
				<p>企业邮箱<br/>limin@limin.com</p>
			</div>
			<a href="">点击下载官方APP</a>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#six').addClass('li_active');
	});
</script>