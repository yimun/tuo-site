<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'typeid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'classifyid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'icon',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'author',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'questioncount',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'levelA',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'levelB',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'levelC',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'levelD',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'didcount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'praisecount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'stampcount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'publishtime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'uptime',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
