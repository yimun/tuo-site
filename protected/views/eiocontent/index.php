<?php
$this->breadcrumbs=array(
	'Eiocontents',
);

$this->menu=array(
	array('label'=>'Create Eiocontent','url'=>array('create')),
	array('label'=>'Manage Eiocontent','url'=>array('admin')),
);
?>

<h1>Eiocontents</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
