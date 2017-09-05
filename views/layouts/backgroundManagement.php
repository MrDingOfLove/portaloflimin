<?php 
	use yii\helpers\Html;
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
<div class="content">
	<?=$content?>
</div>
</body>
</html>
<?php $this->endPage() ?>