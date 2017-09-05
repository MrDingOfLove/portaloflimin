<?php
	use yii\helpers\Url;
	use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>用户注册</title>
    <link rel="stylesheet" type="text/css" href="./css/userLog.css">
	<link rel="stylesheet" type="text/css" href="./css/reset.css">
	<style type="text/css">
		.help-block-error{
			font-size: 14px;
			color: red;
			right: -30px;
			position: absolute;
		}
	</style>
	<style type="text/css">
		.tel_input .field-information-phone{
			width: 75%;
		    display: inline-flex;				
		}
		.tel_input input {
		    width: 100%;
		}
	</style>
</head>
<body>
	<div class="main_content">
		<div class="main_top">
			<img src="img/logo.png">
	        <div class="img_des">
	            <span>哈尔滨利民经济开发区自来水有限公司</span>
	            <p>Harbin&nbsp;Limin&nbsp;economic&nbsp;Development&nbsp;Zone&nbsp;Water&nbsp;Company&nbsp;Limited</p>
	        </div>
		</div>
		<?php $form = ActiveForm::begin([
	 		'fieldConfig'=>[
	 			'template'=>'<div style="position:relative;">{error}{input}</div>'
	 		],
	 	]);?>
			<div class="main_btm">
			<div class="block">
				<span class="change_style">已有账号?&nbsp;<a href="<?php echo Url::to(['home/index']); ?>">马上登录</a></span>
				<div class="sub_block">
					<div class="input_label"><p>用户编号</p></div>
					<div class="input_content"><?php echo $form->field($newuser,'client_id')->textInput(['class'=>'user_name','placeholder'=>'请填写用户编号']); ?></div>
					<div style="clear: both;"></div>
				</div>
				<div class="sub_block">
					<div class="input_label"><p>密码</p></div>
					<div class="input_content"><?php echo $form->field($newuser,'client_pwd')->passwordInput(['class'=>'user_pwd','placeholder'=>'请确保密码长度大于6位']); ?></div>
					<div style="clear: both;"></div>
				</div>
				<div class="sub_block">
					<div class="input_label"><p>确认</p></div>
					<div class="input_content"><?php echo $form->field($newuser,'pwd_sure')->passwordInput(['class'=>'user_confirm','placeholder'=>'再次确认密码']); ?></div>
					<div style="clear: both;"></div>
				</div>
				<div class="sub_block">
					<div class="input_label"><p>邮箱</p></div>
					<div class="input_content"><?php echo $form->field($newuser,'client_email')->textInput(['class'=>'user_email','placeholder'=>'请输入您的邮箱']); ?></div>
					<div style="clear: both;"></div>
				</div>
				<div class="sub_block">
					<div class="input_label"><p>电话</p></div>
					<div class="input_content"><?php echo $form->field($newuser,'client_tel')->textInput(['class'=>'user_tel','placeholder'=>'请输入有效的联系方式']); ?></div>
					<div style="clear: both;"></div>
				</div>
				<div style="text-align: right;"><?php echo Html::submitButton('提交',['class'=>'btn_submit']);?>
				<div class="btn_reset">重置</div>
				</div>
			</div>
		<?php ActiveForm::end();?>
	</div>
	<?php if (yii::$app->session->hasFlash('register_success')) :?>
	<div id ="alert_back"></div>
	<div id ="alert_body">
		<div class="alert_content">
			<p><?php echo yii::$app->session->getFlash('register_success');?></p>
			<div id="hidden" onclick = "hidden_div()">确定</div>
		</div>
	</div>
	<?php endif ?>
	<style type="text/css">
		#alert_back{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 200%;
			background: #1f181f;
			opacity: 0.5;
			z-index:889;
		}
		#alert_body{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 200%;
			z-index:890;
		}
		.alert_content{
			width: 400px;
			height: 200px;
			border-radius: 10px;
			margin: 300px auto;
			background: #f8f8f8;
			opacity: 1;
		}
		.alert_content p{
			text-align: center;
			color: #000;
			line-height: 150px;
			font-size: 18px;
			font-weight: bolder;
		}
		#hidden{
			text-align: center;
			line-height: 40px;
			width: 90px;
			height: 40px;
			margin: 0 auto;
			border-radius: 5px;
			background: #77ab60;
			cursor: pointer;
			opacity: 0.9;
		}
		#hidden:hover{
			opacity: 1;
		}
	</style>
	<!-- jQuery -->
	<script src="./plugins/jQuery/jquery-3.2.0.min.js"></script>
	<script type="text/javascript">
		var alert_back = document.getElementById('alert_back');
		var alert_body = document.getElementById('alert_body');
		function hidden_div(){
			alert_back.style.display = 'none';
			alert_body.style.display = 'none';
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.btn_reset').click(function(event) {
				$('input').val('');
			});
		});
	</script>
</body>
</html>