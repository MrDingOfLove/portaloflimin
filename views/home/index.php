<?php 
	use yii\helpers\Url;
	use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
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
					<li class="konwledge-list-item"><a href="<?php echo Url::to(['water-quality-report/index','category'=>'common-sense','#'=>'question1']); ?>">为什么不得私自移动水表位置,如何查看水表用量</a></li>
					<li class="konwledge-list-item"><a href="<?php echo Url::to(['water-quality-report/index','category'=>'common-sense','#'=>'question2']); ?>">水表冻坏、烫坏、砸坏怎么办,如何发现漏水</a></li>
					<li class="konwledge-list-item"><a href="<?php echo Url::to(['water-quality-report/index','category'=>'common-sense','#'=>'question3']); ?>">为什么自来水有时发浑、发白</a></li>
					<li class="konwledge-list-item"><a href="<?php echo Url::to(['water-quality-report/index','category'=>'common-sense','#'=>'question4']); ?>">如何做好用水设备的防冻保暖工作</a></li>
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
					<a href="<?php echo Url::to(['bussiness/index','category'=>'alipay']); ?>">
						<div class="img-back"><img class="animation" src="img/home_payment.png"></div>
						<p>缴费管理</p>
					</a>
				</div>
				<div class="business-item float-left">
					<a id="history" class="checklogin">
						<div class="img-back"><img class="animation" src="img/home_history.png"></div>
						<p>历史查询</p>
					</a>
				</div>
				<div class="business-item float-left">
					<a id="information" class="checklogin">
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
				<div class="form">
					<?php $form = ActiveForm::begin([
						'fieldConfig'=>[
							'template'=>'<div style="position:relative;">{error}{input}</div>'
						],
					]);?>
					<?php echo $form->field($user,'client_id')->textInput(['class'=>'username','placeholder'=>'请输入您的用户编号']); ?>
					<?php echo $form->field($user,'client_pwd')->passwordInput(['class'=>'password','placeholder'=>'请输入密码']); ?>
					<span class="no-account float-right">还没有账号？&nbsp<a href="<?php echo Url::to(['user-center/register']); ?>" onclick="register()">立即注册</a></span>
				    <?php echo Html::submitButton('登录',['class'=>'login-btn animation','style'=>'font-size: 20px; margin-left: 10px;']);?>
					<?php ActiveForm::end();?>
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
		$('.checklogin').click(function() {
			var islogin = '<?php echo $isLogin; ?>';
			if (!islogin) {
				$('.alert').css('display','block');
			}
		});
		$('.back_btn').click(function() {
			$('.alert').css('display','none');
		});
	});
</script>


