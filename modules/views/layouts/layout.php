<?php 
	use yii\helpers\Html;
	$this->registerCssFile('css/reset.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<title><?= Html::encode($this->title) ?></title>
	<meta charset="utf-8">
	<?php $this->head() ?>
</head>
<body>
<div class="body_content">
	<?=$content?>
</div>
</body>
</html>
<?php $this->endPage() ?>