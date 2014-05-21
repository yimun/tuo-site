<?php
$this->breadcrumbs=array(
	'问卷',
);

$this->menu=array(
	array('label'=>'创建问卷','url'=>array('create')),
	array('label'=>'管理问卷','url'=>array('manage')),
);
?>

<h1>Eios</h1>
<div class="span8">
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>