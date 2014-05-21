<?php
$this->breadcrumbs=array(
	'Eios'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Eio','url'=>array('index')),
	array('label'=>'Create Eio','url'=>array('create')),
	array('label'=>'View Eio','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Eio','url'=>array('admin')),
);
?>

<h1>Update Eio <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>