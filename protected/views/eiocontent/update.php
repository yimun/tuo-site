<?php
$this->breadcrumbs=array(
	'Eiocontents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Eiocontent','url'=>array('index')),
	array('label'=>'Create Eiocontent','url'=>array('create')),
	array('label'=>'View Eiocontent','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Eiocontent','url'=>array('admin')),
);
?>

<h1>Update Eiocontent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>