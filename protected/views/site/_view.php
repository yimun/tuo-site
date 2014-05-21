<?php
/* @var $this SiteController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pass')); ?>:</b>
	<?php echo CHtml::encode($data->pass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sign')); ?>:</b>
	<?php echo CHtml::encode($data->sign); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('face')); ?>:</b>
	<?php echo CHtml::encode($data->face); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sex')); ?>:</b>
	<?php echo CHtml::encode($data->sex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthday')); ?>:</b>
	<?php echo CHtml::encode($data->birthday); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eiocount')); ?>:</b>
	<?php echo CHtml::encode($data->eiocount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fanscount')); ?>:</b>
	<?php echo CHtml::encode($data->fanscount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uptime')); ?>:</b>
	<?php echo CHtml::encode($data->uptime); ?>
	<br />

	*/ ?>

</div>