<?php
$this->breadcrumbs=array(
	'问卷'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理问卷','url'=>array('manage')),
);
?>

<h1 class="page-header">填写问卷</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>