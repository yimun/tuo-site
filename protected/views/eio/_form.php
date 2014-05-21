<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'eio-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p class="help-block">带 <span class="required">*</span> 为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<fieldset>
		<legend>问卷基本信息</legend>
		<?php echo $form->textFieldRow($model, 'title', array('placeholder'=>'输入问卷名','class'=>'span4',)); ?>
		<?php echo $form->textFieldRow($model, 'questioncount'); ?>
		<?php echo $form->dropDownListRow($model, 'typeid', Eiotype::model()->getAllName()); ?>
		<?php echo $form->dropDownListRow($model, 'classifyid', Eioclassify::model()->getAllName(), array('multiple'=>false)); ?>
		<?php echo $form->textAreaRow($model, 'describe', array('placeholder'=>'描述你的问卷','class'=>'span8', 'rows'=>6)); ?>
	</fieldset>
	<br />
	<fieldset>
		<legend>用户反馈信息</legend>
		<?php echo $form->textAreaRow($model,'levelA',array('rows'=>4, 'cols'=>50, 'class'=>'span8')); ?>
		<?php echo $form->textAreaRow($model,'levelB',array('rows'=>4, 'cols'=>50, 'class'=>'span8')); ?>
		<?php echo $form->textAreaRow($model,'levelC',array('rows'=>4, 'cols'=>50, 'class'=>'span8')); ?>
		<?php echo $form->textAreaRow($model,'levelD',array('rows'=>4, 'cols'=>50, 'class'=>'span8')); ?>
	</fieldset>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit', 
			'type'=>'info', 
			'label'=>$model->isNewRecord ? '创建' : '保存')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','type'=>'warn','label'=>'重置')); ?>
	</div>

<?php $this->endWidget(); ?>
