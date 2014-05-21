<?php
$this->breadcrumbs=array(
	'Eiocontents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Eiocontent','url'=>array('index')),
	array('label'=>'Manage Eiocontent','url'=>array('admin')),
);
?>

<h1>添加问题</h1>

<?php echo $this->renderPartial('_formtest', array('items'=>$items)); ?>