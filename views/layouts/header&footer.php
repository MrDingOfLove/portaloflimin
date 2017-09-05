<?php 
	use yii\helpers\Html;
    use yii\helpers\Url;
	$this->registerCssFile('css/header&footer.css');
	$this->registerCssFile('css/reset.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<title><?= Html::encode($this->title)?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/header_footer.css" type="text/css">
	<?php $this->head() ?>
</head>
<body>
<header class="header">
    <div class="header_top">
        <div class="header_top_left">
            <img src="img/logo.png">
            <div class="img_des">
                <span>哈尔滨利民经济开发区自来水有限公司</span><br />
                <p>Harbin&nbsp;Limin&nbsp;economic&nbsp;Development&nbsp;Zone&nbsp;Water&nbsp;Company&nbsp;Limited</p>
            </div>
        </div>
        <div class="header_top_right">
            <p>欢迎访问利民自来水有限公司!</p>
            <div class="htr">
                <span>服务热线:&nbsp;123456789</span>
                <input type="text" placeholder="Search">
                <a href=""><img src="img/search_normal.png" onmouseover="this.src='img/search_hover.png'" onmouseout="this.src='img/search_normal.png'" alt=""></a>
            </div>
        </div>
    </div>
    <div class="imgs_show">
        <div class="img_contain">
            <img src="img/scroll_img_1.png" alt="">
            <img src="img/scroll_img_2.png" style="display: none;" alt="">
            <img src="img/scroll_img_3.png" style="display: none;" alt="">
            <div class="go_prev animation" onclick="goToBeforeImg()"><img src="./img/go_prev.png" alt=""></div>
            <div class="go_next animation" onclick="goToBackImg()"><img src="./img/go_next.png" alt=""></div>
            <ul class="imgs_ul">
            </ul>
        </div>
    </div>
    <div class="header_nav">
        <ul class="nav_ul">
            <li id="one" class="nav_title"><a href="<?php echo Url::to(['home/index']); ?>">首页</a></li><li id="two" class="nav_title"><a href="<?php echo Url::to(['bussiness/index','category'=>'alipay']); ?>">业务办理</a></li><li id="three" class="nav_title"><a href="<?php echo Url::to(['company-profile/index']); ?>">企业简介</a></li><li id="four" class="nav_title"><a href="<?php echo Url::to(['water-quality-report/index','category'=>'quality-report']); ?>">水质报告</a></li><li id="five" class="nav_title"><a href="<?php echo Url::to(['news-center/index']); ?>">新闻资讯</a></li><li id="six" class="nav_title"><a href="<?php echo Url::to(['contact-us/index']); ?>">联系我们</a></li>
        </ul>
    </div>
</header>
<div class="content">
	<?=$content?>
</div>
<footer class="footer">
    <div class="footer_top">
        <img src="img/logo_btm.png" alt="">
        <div class="img_des">
            <span>哈尔滨利民经济开发区自来水有限公司</span><br />
            <p>Harbin&nbsp;Limin&nbsp;economic&nbsp;Development&nbsp;Zone&nbsp;Water&nbsp;Company&nbsp;Limited</p>
        </div>
    </div>
    <div class="footer_middle">
        <ul class="fo_ul">
            <li class="fo_nav_title"><a href="<?php echo Url::to(['home/index']); ?>">首页</a></li>
            <li class="fo_nav_title"><a href="<?php echo Url::to(['bussiness/index','category'=>'alipay']); ?>">业务办理</a></li>
            <li class="fo_nav_title"><a href="<?php echo Url::to(['company-profile/index']); ?>">企业简介</a></li>
            <li class="fo_nav_title"><a href="<?php echo Url::to(['water-quality-report/index','category'=>'quality-report']); ?>">水质报告</a></li>
            <li class="fo_nav_title"><a href="<?php echo Url::to(['news-center/index']); ?>">新闻资讯</a></li>
            <li class="fo_nav_title"><a href="<?php echo Url::to(['contact-us/index']); ?>">联系我们</a></li>
        </ul>
    </div>
    <hr>
    <div class="footer_btm">
        <span>地址:&nbsp;哈尔滨利民经济技术开发区</span>
        <span>联系电话:&nbsp;0451-57351438</span>
        <span>官方网站:&nbsp;www.liminwater.com</span>
        <span>邮箱地址:&nbsp;limin@limin.com</span>
    </div>
    <p class="record"><a href="http://www.miitbeian.gov.cn/" target="blank">黑ICP备17006567号</a></p>
</footer>
</body>
<script type="text/javascript" src="js/vendor/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/header.js"></script>
</html>
<?php $this->endPage() ?>