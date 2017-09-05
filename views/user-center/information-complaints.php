<?php  
	use yii\helpers\Url;
	use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use yii\bootstrap\Alert;
    use yii\app;
    //设置title
	$this->title = '用户中心-资讯投诉';
?>
<link rel="stylesheet" type="text/css" href="./plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/userCenter.css">
<style type="text/css">
	.tel_input .field-information-phone{
		width: 75%;
	    display: inline-flex;				
	}
	.tel_input input {
	    width: 100%;
	}
	.help-block-error{
		font-size: 14px;
		color: red;
	}
</style>
<div class="main_content">
	<div class="content_top">
		<p class="float_left">用户中心/</p>
		<span>User Center</span>
		<p class="float_right location"><img src="img/location.png" alt="">当前位置:&nbsp;&nbsp;<a href="<?php echo Url::to(['home/index']); ?>">首页</a>><span>用户中心</span></p>
	</div>
	<div class="content_middle">
		<div class="content_left">
			<ul class="nav_list">
				<span>用户中心</span>
				<li><a href="<?php echo Url::to(['user-center/water-history-query']); ?>">历史水费查询</a></li>
				<li class="selected"><a href="<?php echo Url::to(['user-center/information-complaints']); ?>">咨询投诉</a></li>
			</ul>
		</div>
		<div class="content_right">
			<div class="content_page">
				<div class="user_detial">
					<div class="img"><img src="./img/template/template.png<?php echo $user->client_image; ?>"></div>
					<div class="detial">
						<div><span class="label">用户名 :</span><span><?php echo $user->client_name; ?></span></div>
						<div><span class="label">用户类型 :</span><span><?php echo $user->client_type; ?></span></div>
						<div><span class="label">联系电话 :</span><span><?php echo $user->client_tel; ?></span></div>
						<div><span class="label">邮箱地址 :</span><span><?php echo $user->client_email; ?></span></div>
					</div>
					<div style="clear: both;"></div>
				</div>
				<?php if ((yii::$app->session->hasFlash('no-category'))|| (yii::$app->session->hasFlash('success')) || (yii::$app->session->hasFlash('error'))) :?>
					<div class="alert alert-danger alert-dismissable">
				        <button type="button" class="close" data-dismiss="alert"
				                aria-hidden="true">
				            &times;
				        </button>
				        <p><?php echo yii::$app->session->getFlash('no-category');?></p>
						<p><?php echo yii::$app->session->getFlash('success');?></p>
				    </div>
				<?php endif ?>
				<iframe name="post_frame" style="display:none"></iframe>
				<?php $form = ActiveForm::begin([
			 		'fieldConfig'=>[
			 			'template'=>'<div>{input}{error}</div>',
			 		],
			 	]);?>
					<div class="page_middle square_shadow">
						<div class="block1">
							<div class="label_div"><p>具体地址</p></div>
							<div class="label_input"><?php echo $form->field($information,'address')->textInput(['class'=>'address_input input']); ?></div>
							<div style="clear: both;"></div>
						</div>
						<div class="block2">
							<div class="label_div"><p>姓名</p></div>
							<div class="label_input_name"><?php echo $form->field($information,'username')->textInput(['class'=>'input']); ?></div>
							<div class="label_div"><p>联系方式</p></div>
							<div class="label_input_phone">								<?php echo $form->field($information,'phone')->textInput(['class'=>'input']); ?></div>
							<div style="clear: both;"></div>
						</div>
						<div class="block1">
							<div class="label_div"><p>问题类别</p></div>
							<div class="label_input">
								<?php $data = [
									'0' => '请选择问题类别',
									'1' => '用户无水',
									'2' => '管道漏水',
									'3' => '设施故障',
									'4' => '水质问题',
									'5' => '举报违章',
									'6' => '文明施工',
									'7' => '服务投诉',
									'8' => '营业抄收',
									'9' => '信息咨询',
									'10' => '用户修改',
									'11' => '其他问题',
								] ?>
								<?php echo $form->field($information, 'category')->dropDownList($data); ?>
							</div>
							<div style="clear: both;"></div>
						</div>
						<div class="block1">
							<div class="label_div"><p>诉求内容</p></div>
							<div class="label_input"><?php echo $form->field($information,'detial')->textArea(['cols'=>'30','rows'=>'10','class'=>'content_input']); ?></div>
							<div style="clear: both;"></div>
						</div>
						<div class="btn_div">
							<?php echo Html::submitButton('提交',['class'=>'btn_submit']);?>
							<input type="button" class="btn_reset" value="重置">
						</div>
				<?php ActiveForm::end();?>
			</div>
		</div>
	</div>
</div>
<!-- jQuery -->
<script src="./plugins/jQuery/jquery-3.2.0.min.js"></script>
<!-- Bootstrap -->
<script src="./plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.btn_reset').click(function() {
			$('textarea').html('');
			$('.input').val('');
		});
	});
	// var count = 3;
	// if($('.alert').html()){
	// 	var clearFlag = self.setInterval("a()",1000);//每过一秒调用一次autoClose方法
	// };
	// function a(){
	// 	if(count>0){
 //            count--;
 //        }else if(count<=0){
 //            window.clearInterval(clearFlag); 
 //            $(".alert").fadeOut();
 //        }
	// }
</script>