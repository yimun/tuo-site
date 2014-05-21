<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eioid')); ?>:</b>
	<?php echo CHtml::encode($data->eioid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questionnum')); ?>:</b>
	<?php echo CHtml::encode($data->questionnum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
	<?php echo CHtml::encode($data->question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answerA')); ?>:</b>
	<?php echo CHtml::encode($data->answerA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answerB')); ?>:</b>
	<?php echo CHtml::encode($data->answerB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answerC')); ?>:</b>
	<?php echo CHtml::encode($data->answerC); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('answerD')); ?>:</b>
	<?php echo CHtml::encode($data->answerD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answerE')); ?>:</b>
	<?php echo CHtml::encode($data->answerE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trueanswer')); ?>:</b>
	<?php echo CHtml::encode($data->trueanswer); ?>
	<br />

	*/ ?>

</div>