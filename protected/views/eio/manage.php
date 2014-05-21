<?php
/* @var $this EioController */

$this->breadcrumbs=array(
	'问卷'=>array('/eio'),
	'管理',
);
?>

<h1>我的发布</h1>

<div class="span10">
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered',  //striped bordered condensed
    'dataProvider' => $dataProvider,
	'template'=>'{items}\n{pager}',
    'pager' => array(
        'maxButtonCount' => '7',
    ),
    'template' => '{pager}{summary}{items}{pager}',
    'columns' => array(
        array('name'=>'title', 'header'=>'名称'),
        array('name'=>'describe', 'header'=>'描述'),
        array('name'=>'questioncount', 'header'=>'问题数目'),
        array('name'=>'didcount', 'header'=>'已做次数'),
        array('name'=>'praisecount', 'header'=>'被赞'),
        array('name'=>'stampcount', 'header'=>'被踩'),
        array('name'=>'publishtime', 'header'=>'创建时间'),
        array(
			'header'=>'操作',
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    )
)); ?>
</div>
