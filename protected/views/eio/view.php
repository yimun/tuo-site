<?php
$this->breadcrumbs=array(
	'问卷'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Eio','url'=>array('index')),
	array('label'=>'Create Eio','url'=>array('create')),
	array('label'=>'Update Eio','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Eio','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Eio','url'=>array('admin')),
);
?>

<h2>查看问卷</h2>
<div class="span8">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'author',
		'eioclassify.name',
		'eiotype.cnname',
		'describe',
		'questioncount',
		'levelA',
		'levelB',
		'levelC',
		'levelD',
		'didcount',
		'praisecount',
		'stampcount',
		'publishtime',
	),
)); ?>
</div>
