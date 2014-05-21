<?php
/* @var $this EioController */

$this->breadcrumbs=array(
	'问卷'=>array('/eio'),
	'热门问卷',
);
?>
<?php
$this->menu=array(
	array('label'=>'创建问卷','url'=>array('create')),
	array('label'=>'管理问卷','url'=>array('manage')),
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<div class="span8">
<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
)); ?>
</div>
