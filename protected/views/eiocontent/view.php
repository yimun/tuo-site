<?php
$this->breadcrumbs=array(
	'Eiocontents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Eiocontent','url'=>array('index')),
	array('label'=>'Create Eiocontent','url'=>array('create')),
	array('label'=>'Update Eiocontent','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Eiocontent','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Eiocontent','url'=>array('admin')),
);
?>

<h1>View Eiocontent #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'eioid',
		'questionnum',
		'question',
		'answerA',
		'answerB',
		'answerC',
		'answerD',
		'answerE',
		'trueanswer',
	),
)); ?>
