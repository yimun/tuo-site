<?php
/* @var $this EioController */
/* @var $model Eio */
/* @var $form TbActiveForm  */

$this->breadcrumbs=array(
	'Eio'=>array('/eio'),
	'Add',
);
?>
<h1 style="">添加问卷</h1>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
)); ?>
 
<fieldset>
 
    <legend>填写问卷基本信息</legend>
    <?php echo $form->textFieldRow($model, 'title', array('hint'=>'输入问卷名')); ?>
    <?php echo $form->textFieldRow($model, 'questioncount'); ?>
    <?php echo $form->dropDownListRow($model, 'typeid', $eiotype); ?>
    <?php echo $form->dropDownListRow($model, 'classifyid', $eioclassify, array('multiple'=>true)); ?>
    <?php echo $form->textAreaRow($model, 'describe', array('class'=>'span8', 'rows'=>6)); ?>
 
</fieldset>
 
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit', 
		'type'=>'primary', 
		'label'=>$model->isNewRecord ? '创建' : '保存')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'重置')); ?>
</div>
 
<?php $this->endWidget(); ?>



