<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'&nbsp;&nbsp;&nbsp;操作',
		));
		$this->widget('bootstrap.widgets.TbMenu', array(
			'items'=>$this->menu,
			'stacked'=>true,
			'type'=>'list',
			//'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>