<?php  
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Html;

	//设置title
	$this->title = '管理员登录';
	// 引入css
	$this->registerCssFile('css/admin/admin_login.css');
?>
<img class="back-img" src="img/admin/login-back.jpg">
<div class="block">
	<p class="sysname">利民后台管理系统</p>
	<div class="login_form">
		<div class="title">管理员登录</div>
		<?php $form = ActiveForm::begin([
			'fieldConfig'=>[
				'template'=>'{error}{input}',
			],
		]); ?>
		<?php echo $form->field($model,'adminuser')->textInput(['class'=>'username','placeholder'=>'请输入管理员账号']); ?>
		<?php echo $form->field($model,'adminpass')->passwordInput(['class'=>'password','placeholder'=>'请输入管理员密码']); ?>
		<?php echo $form->field($model,'rememberMe')->checkbox([
			'id'=> 'remember-me',
			'template'=>"<div class = 'remember'>{input}<label for = 'remember-me'>记住我</label></div>",
		]); ?>
		<?php echo Html::submitButton('登录',['class'=>'login-btn animation','style'=>'font-size: 20px;']); ?>
		<?php ActiveForm::end();?>
	</div>
</div>

<div class="company">
	<img class="logo" src="img/admin/logo.png">
	<div class="detial">
		<p class="cn">哈尔滨利民经济开发区自来水有限公司</p>
		<p class="en">Harbin Limin Economic Development Zone Water Company Limited</p>
	</div>
</div>
