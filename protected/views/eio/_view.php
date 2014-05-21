

	<?php echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id)); ?>
	<br />
	<?php echo CHtml::encode($data->describe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('classifyid')); ?>:</b>
	<?php echo CHtml::encode($data->eioclassify->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questioncount')); ?>:</b>
	<?php echo CHtml::encode($data->questioncount); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('didcount')); ?>:</b>
	<?php echo CHtml::encode($data->didcount); ?>
	<br />

	<b>赞(</b>
	<?php echo CHtml::encode($data->praisecount); ?>)&nbsp;
	<b>踩(</b>
	<?php echo CHtml::encode($data->stampcount); ?>)<br />
	<p class="text-right">
	<b><?php echo CHtml::encode($data->getAttributeLabel('publishtime')); ?>:</b>
	<?php echo CHtml::encode($data->publishtime); ?>
	<br /></p>
	<hr />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('levelA')); ?>:</b>
	<?php echo CHtml::encode($data->levelA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('levelB')); ?>:</b>
	<?php echo CHtml::encode($data->levelB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('levelC')); ?>:</b>
	<?php echo CHtml::encode($data->levelC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('levelD')); ?>:</b>
	<?php echo CHtml::encode($data->levelD); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('uptime')); ?>:</b>
	<?php echo CHtml::encode($data->uptime); ?>
	<br />

	*/ ?>

