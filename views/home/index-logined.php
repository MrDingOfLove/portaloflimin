<?php 
	use yii\helpers\Url;
	use yii\app;

	//设置title
	$this->title = '哈尔滨利民经济技术开发区自来水有限公司';
	// 引入css
	$this->registerCssFile('./css/home.css');
?>
<link rel="stylesheet" type="text/css" href="./css/alert.css">
<div class="home-body">
	<div class="home-left float-left">
		<div class="news">
			<div class="category">
				<span class="name float-left">
					<a href="<?php echo Url::to(['news-center/index']); ?>">
						<span class="name-cn">新闻/</span>
						<span class="name-en">NEWS</span>
					</a>
				</span>
				<canvas class="myCanvas"></canvas>
				<a href="<?php echo Url::to(['news-center/index']);?>" class="float-right">MORE></a>
				<div class="clearfloat"></div>
			</div>
			<div class="news-article-area">
				<?php foreach ($news as $key => $new):?>
					<?php if ($key ==2) {
						break;
					} ?>
					<div class="news-article-detial">
						<a href="<?php echo Url::to(['news-center/news-detial','id'=>$new['id']]); ?>"><img class="article-img float-left" src="<?php echo $new['cover']; ?>"></a>
						<div class="article-content float-left">
							<a href="<?php echo Url::to(['news-center/news-detial','id'=>$new['id']]); ?>"><p class="title"><?php echo $new['title']; ?></p></a>
							<a href="<?php echo Url::to(['news-center/news-detial','id'=>$new['id']]); ?>"><p class="time"><?php echo substr($new['time'], 0,10); ?></p></a>
							<a href="<?php echo Url::to(['news-center/news-detial','id'=>$new['id']]); ?>"><p class="brief"><?php echo $new['brief']; ?></p></a>
						</div>
						<div class="clearfloat"></div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="water-knowledge">
			<div class="category">
				<span class="name float-left">				
					<a href="<?php echo Url::to(['water-quality-report/knowledge']); ?>">
						<span class="name-cn">用水常识/</span>
						<span class="name-en">WATER KNOWLEDGE</span>
					</a>
				</span>
				<canvas class="myCanvas"></canvas>
				<a href="<?php echo Url::to(['water-quality-report/knowledge']); ?>" class="float-right">MORE></a>
				<div class="clearfloat"></div>
			</div>
			<img class="water-show" src="img/home_waterKnowledge.png">
			<div class="konwledge-list">
				<ul>
					<li class="konwledge-list-item"><a href="#">水表故障、水费帐单没有收到、水费与实际不符如何处理</a></li>
					<li class="konwledge-list-item"><a href="#">居民用水如何抄读水表</a></li>
					<li class="konwledge-list-item"><a href="#">居住房室内装修时为什么不宜改装水表</a></li>
					<li class="konwledge-list-item"><a href="#">如何做好用水设备的防冻保暖</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="home-right float-left">
		<div class="affairs-publicity">
			<div class="category">
				<span class="name float-left">
					<span class="name-cn">办事公开/</span>
					<span class="name-en">AFFAIRS PUBLICITY</span>
				</span>
				<canvas class="myCanvas"></canvas>
				<div class="clearfloat"></div>
			</div>
			<div class="business">
				<div class="alert" style="display: none;">
					<span>请先登录</span>
					<span class="back_btn">x</span>
				</div>
				<div class="business-item float-left">
					<a href="<?php echo Url::to(['company-profile/index']); ?>">
						<div class="img-back"><img class="animation" src="img/home_des.png"></div>
						<p>企业介绍</p>
					</a>
				</div>
				<div class="business-item float-left">
					<a href="#">
						<div class="img-back"><img class="animation" src="img/home_laws.png"></div>
						<p>政策法规</p>
					</a>
				</div>
				<div class="business-item float-left">
					<a href="<?php echo Url::to(['water-quality-report/index']); ?>">
						<div class="img-back"><img class="animation" src="img/home_water.png"></div>
						<p>水质报告</p>
					</a>
				</div>
				<div class="business-item float-left">
					<a href="<?php echo Url::to(['water-quality-report/index','category'=>'supply-system']); ?>">
						<div class="img-back"><img class="animation" src="img/home_useWater.png"></div>
						<p>用水流程</p>
					</a>
				</div>
				<div class="business-item float-left">
					<a href="<?php echo Url::to(['bussiness/index']); ?>">
						<div class="img-back"><img class="animation" src="img/home_payment.png"></div>
						<p>缴费管理</p>
					</a>
				</div>
				<div class="business-item float-left">
					<a id="history" class="checklogin" href="<?php echo Url::to(['user-center/water-history-query']); ?>">
						<div class="img-back"><img class="animation" src="img/home_history.png"></div>
						<p>历史查询</p>
					</a>
				</div>
				<div class="business-item float-left">
					<a id="information" class="checklogin" href="<?php echo Url::to(['user-center/information-complaints']); ?>">
						<div class="img-back"><img class="animation" src="img/home_complain.png"></div>
						<p>咨询投诉</p>
					</a>
				</div>
				<div class="business-item float-left">
					<a href="<?php echo Url::to(['contact-us/index']); ?>">
						<div class="img-back"><img class="animation" src="img/home_tel.png" ></div>
						<p>服务热线</p>
					</a>
				</div>
				<div class="clearfloat"></div>
			</div>
			<div class="user-center">
				<div class="category">
					<span class="name float-left">
						<span class="name-cn">用户中心/</span>
						<span class="name-en">USER CENTER</span>
					</span>
					<canvas class="myCanvas"></canvas>
					<div class="clearfloat"></div>
				</div>
				<div class="user-detial">
					<div class="img"><img src="./img/template/template.png"></div>
					<div class="detial">
						<div><span class="label">用户名 :</span><span><?php echo $user->client_name; ?></span></div>
						<div><span class="label">用户类型 :</span><span><?php echo $user->client_type;?></span></div>
						<div><span class="label">联系电话 :</span><span><?php echo $user->client_tel;?></span></div>
						<div><span class="label">邮箱地址 :</span><span><?php echo $user->client_email; ?></span></div>
					</div>
				</div>
			</div>
			<div class="payment-management">
				<div class="category">
					<span class="name float-left">
						<span class="name-cn">缴费管理/</span>
						<span class="name-en">PAYMENT MANAHEMENT</span>
					</span>
					<canvas class="myCanvas"></canvas>
					<div class="clearfloat"></div>
				</div>
				<div class="business">
					<div class="business-item float-left">
						<a href="<?php echo Url::to(['bussiness/index','category'=>'alipay']); ?>">
							<div class="img-back"><img class="animation" src="img/home_alipay.png"></div>
							<p>支付宝缴费</p>
						</a>
					</div>
					<div class="business-item float-left">
						<a href="<?php echo Url::to(['bussiness/index','category'=>'wechat']); ?>">
							<div class="img-back"><img class="animation" src="img/home_tencent.png"></div>
							<p>微信缴费</p>
						</a>
					</div>
					<div class="business-item float-left">
						<a href="<?php echo Url::to(['bussiness/index','category'=>'offline']); ?>">
							<div class="img-back"><img class="animation" src="img/home_offline.png"></div>
							<p>线下缴费</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="home-bottom clearfloat">
		<img class = "bottom-img float-left" src="img/home_btm_1.png">
		<img class = "bottom-img float-left bottom-img-middle" src="img/home_btm_2.png">
		<img class = "bottom-img float-left" src="img/home_btm_3.png">
		<div class="clearfloat"></div>
	</div>
	<div class="clearfloat"></div>
</div>
<script type="text/javascript" src="plugins/jQuery/jquery-3.2.0.min.js"></script>
<script type="text/javascript">
var draw = function(x1,y1,x2,y2,x3,y3,color,type){
	var ctx = this.ctx;
	ctx.beginPath();
	ctx.moveTo(x1,y1);
	ctx.lineTo(x2,y2);
	ctx.lineTo(x3,y3);
	var my_gradient=ctx.createLinearGradient(0,0,0,150);
	my_gradient.addColorStop(0,'rgba(76,187,233,1)');
	my_gradient.addColorStop(1,"rgba(9,89,179,1)");
	ctx.fillStyle=my_gradient;
	ctx.closePath();
	ctx[type]();
}

var canvas=document.getElementsByClassName('myCanvas');
for(var i=0;i<canvas.length;i++){
	canvas[i].style.width = '10px';
	canvas[i].style.height = '40px';	
	var ctx=canvas[i].getContext('2d');
	draw(0,0,0,150,300,150,'red','fill');
}

</script>
<script type="text/javascript">
	$(document).ready(function($) {
		$('#one').addClass('li_active');
		$('.back_btn').click(function() {
			$('.alert').css('display','none');
		});
	});
</script>


