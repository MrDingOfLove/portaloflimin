<?php
	use yii\helpers\Url;
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
?>
<title>用户中心-历史水费查询</title>
<link rel="stylesheet" type="text/css" href="./plugins/bootstrap/css/bootstrap.min.css">
<!-- 时间控件css -->
<link rel="stylesheet" type="text/css" href="plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="./css/timepicker.css">
<link rel="stylesheet" type="text/css" href="css/template_style1.css">
<link rel="stylesheet" type="text/css" href="css/page-break.css">
<style type="text/css">
	td{
		text-align: center;
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
				<li class="selected"><a href="<?php echo Url::to(['user-center/water-history-query']); ?>">历史水费查询</a></li>
				<li><a href="<?php echo Url::to(['user-center/information-complaints']); ?>">咨询投诉</a></li>
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
						<div><span class="label">邮箱地址 :</span><span><?php echo $user->client_address; ?></span></div>
					</div>
					<div style="clear: both;"></div>
				</div>
				<div class="form">
					<?php $form = ActiveForm::begin();?>
						<span>近期缴费时间段:</span><input id="datetimeStart" class="form_datetime" type="text" name="start_time" value="<?php echo $start_time; ?>"><span style="color: #DDDDDD;padding-right: 10px;">-</span><input type="text" id="datetimeEnd" class="form_datetime" name="end_time" value="<?php echo substr($end_time, 0,10); ?>">
						<input class="search" type="submit" value="搜索">
					<?php ActiveForm::end();?>
				</div>
				<div class="table">
					<table>
						<tr>
							<td>用户编号</td>
							<td>用户名称</td>
							<td>日期</td>
							<td>水费(元)</td>
							<td>排污费(元)</td>
							<td>水费总额(元)</td>
							<td>逾期未缴水费(元)</td>
						</tr>
						<?php foreach ($checks as $check) :?>
							<tr>
								<td><?php echo $user->client_id; ?></td>
								<td><?php echo $user->client_name; ?></td>
								<td><?php echo substr($check->copy_lasttime, 0,10);?></td>
								<td><?php echo $check->copy_money; ?></td>
								<td><?php echo $check->copy_sewage; ?></td>
								<td><?php echo $check->copy_money+$check->copy_sewage; ?></td>
								<td><?php echo $check->copy_sewage; ?></td>
							</tr>
						<?php endforeach ?>
					</table>
					<?php if (count($checks) == 0):?>
						<div class="empty">没有数据</div>
					<?php endif ?>
					<div class="page-break">
						<?php  
							if (isset($pager)) {
									echo LinkPager::widget([
						    		'pagination' => $pager,
						    		'prevPageLabel'=>'&#8249',
						    		'nextPageLabel'=>'&#8250',
								]);
							}
						?>
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
    <!-- 时间控件 -->
	<script type="text/javascript" src="plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
	    $("#datetimeStart").datetimepicker({
	        format: 'yyyy-mm-dd',
	        minView: 2 ,
	        language: 'zh-CN',
	        autoclose:true,
	    }).on("changeDate",function(){
	        $("#datetimeEnd").datetimepicker("setStartDate",$("#datetimeStart").val());
	    });
	    $("#datetimeEnd").datetimepicker({
	        format: 'yyyy-mm-dd',
	        minView: 2 ,
	        language: 'zh-CN',
	        autoclose:true,
	    }).on("changeDate",function(){
	        $("#datetimeStart").datetimepicker("setEndDate",$("#datetimeEnd").val());
	    });
	</script>