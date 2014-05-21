<div class="form">

<h2 class="page-header">填写个人信息</h2>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-create-form',
	'type'=>'horizontal',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>
<fieldset>


	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model, 'name'); ?>
	<?php echo $form->passwordFieldRow($model, 'pass'); ?>
	<?php echo $form->passwordFieldRow($model, 'pass'); ?>
	<?php echo $form->radioButtonListRow($model, 'sex', array('女', '男')); ?>
	<?php echo $form->textAreaRow($model, 'sign',array('class'=>'span8', 'rows'=>5)); ?>
	
	<?php echo $form->fileFieldRow($model, 'face'); ?>
	<div class="control-group "> 
   <label class="control-label required" for="User_birthday">出生日期</label>
   <div class="controls">
    <input id="ytUser_sex" type="hidden" value="" name="User[birthday]" />
    <input name="User[birthday]" id="User_birthday" type="date" />
   </div>
  </div>
	
	<?php echo $form->textFieldRow($model, 'location'); ?>

	
	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'提交')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'重置')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->