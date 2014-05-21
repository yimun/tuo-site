<?php
$this->breadcrumbs=array(
	'Eios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Eio','url'=>array('index')),
	array('label'=>'Create Eio','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('eio-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Eios</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'eio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'typeid',
		'classifyid',
		'icon',
		'title',
		'author',
		/*
		'questioncount',
		'levelA',
		'levelB',
		'levelC',
		'levelD',
		'didcount',
		'praisecount',
		'stampcount',
		'publishtime',
		'uptime',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
