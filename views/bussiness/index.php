<?php
	use yii\helpers\Url;
	//设置title
	$this->title = '业务办理-支付宝';
?>
<link rel="stylesheet" type="text/css" href="./plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/service_processing.css">
<div class="main_content">
	<div class="content_top">
		<p class="float_left">业务办理/</p>
		<span>Business management</span>
		<p class="float_right location"><img src="img/location.png" alt="">当前位置:&nbsp;&nbsp;<a href="<?php echo Url::to(['home/index']); ?>">首页</a>><span id="title_cn">业务办理</span></p>
	</div>
	<div class="content_middle">
		<div class="content_left">
			<ul class="nav_list">
				<span>业务办理</span>
				<li id="li_alipay" class="<?php if ($category == 'alipay') echo "selected"; {} ?>" data-target="#alipay" data-toggle="tab"><a href="">支付宝支付</a></li>
				<li id="li_wechat" class="<?php if ($category == 'wechat') echo "selected"; {} ?>" data-target="#wechat" data-toggle="tab"><a href="">微信支付</a></li>
				<li id="li_offline" class="<?php if ($category == 'offline') echo "selected"; {} ?>" data-target="#offline" data-toggle="tab"><a href="">线下支付</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="content_right tab-pane fade in <?php if ($category == 'alipay') echo "active"; {} ?>" id="alipay">
				<div class="content_page page_zhifubao">
					<p class="page_summary">支付宝缴水费步骤</p>
					<p>1、首先打开手机支付宝，找到水电费服务项，打开。</p>
					<p>2、然后是切换城市，以便找到对应的电力部门进行缴款。</p>
					<div class="img_contains">
						<img src="img/zhifubao_img_1.png" alt="">
						<img src="img/zhifubao_img_2.png" alt="">
					</div>
					<p>3、缴款单位一定要选对，可以查看纸质电费单等。否则后续会出现钱转不正确，而交不到位的现象。</p>
					<p>4、接下来是输入户号，每个家庭有唯一的户号，注意此户号是专门用来交电费的户号。</p>
					<div class="img_contains">
						<img src="img/zhifubao_img_3.png" alt="">
						<img src="img/zhifubao_img_4.png" alt="">
					</div>
					<p>5、若有欠款，即当月应缴的电费金额会根据户号自动显示，进一步确认账户是否正确。可以对照手机短信或纸	质电费单。</p>
					<p>6、最后就是用支付宝转账付款就可以了，和平时付款差别不大。另外还有其他服务项目也可以这么缴费</p>
					<div class="img_contains">
						<img src="img/zhifubao_img_5.png" alt="">
						<img src="img/zhifubao_img_6.png" alt="">
					</div>
				</div>
			</div>
			<div class="content_right tab-pane fade in <?php if ($category == 'wechat') echo "active"; {} ?>" id="wechat">
				<div class="content_page page_zhifubao">
					<p class="page_summary">微信缴水费步骤</p>
					<p>1、点击微信图标进入。</p>
					<p>2、然后是切换城市，以便找到对应的电力部门进行缴款</p>
					<div class="img_contains">
						<img src="img/weixin_img_1.png" alt="">
						<img src="img/weixin_img_2.png" alt="">
					</div>
					<p>3、然后点击钱包。</p>
					<p>4、里面会出现很多选项.点击【生活缴费】。</p>
					<div class="img_contains">
						<img src="img/weixin_img_3.png" alt="">
						<img src="img/weixin_img_4.png" alt="">
					</div>
					<p>5、如果说你想交水费，就点击【水】。</p>
					<p>6、水费，查看水表的1-10位的用户编号输入进去即可成功。</p>
					<div class="img_contains">
						<img src="img/weixin_img_5.png" alt="">
						<img src="img/weixin_img_6.png" alt="">
					</div>
				</div>
			</div>
			<div class="content_right tab-pane fade in <?php if ($category == 'offline') echo "active"; {} ?>" id="offline">
				<div class="content_page page_zhifubao">
					<p class="page_summary">线下支付站点</p>
					<div class="address_detail top_forty">
						<span class="address_title">利民开发区自来水公司自来水一水厂</span>
						<div class="address_show">
							<img src="img/location.png" alt="">
							<span>地址:&nbsp;&nbsp;利民大道760号</span>
						</div>
						<div class="tel_show">							
							<img src="img/telephone.png" alt="">
							<span>电话:&nbsp;&nbsp;0451-57351438</span>
						</div>
					</div>
					<div class="address_detail">
						<span class="address_title">利民开发区自来水公二厂</span>
						<div class="address_show">
							<img src="img/location.png" alt="">
							<span>地址:&nbsp;&nbsp;学院路762号</span>
						</div>
						<div class="tel_show">
							<img src="img/telephone.png" alt="">
							<span>电话:&nbsp;&nbsp;0451-57361394</span>
						</div>
					</div>
					<div class="address_detail">
						<span class="address_title">CBD营业厅</span>
						<div class="address_show">
							<img src="img/location.png" alt="">
							<span>地址:&nbsp;&nbsp;北京路CBD大厦行政服务大厅</span>
						</div>
						<div class="tel_show">
							<img src="img/telephone.png" alt="">
							<span>电话:&nbsp;&nbsp;0451-85947589</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- jQuery -->
<script src="./plugins/jQuery/jquery-3.2.0.min.js"></script>
<!-- Bootstrap -->
<script src="./plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/bussiness.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#two').addClass('li_active');
	});
</script>