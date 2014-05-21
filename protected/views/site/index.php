<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="row">
	<div class="span8">
	<div class="hero-unit">
	  <h2 class="text-blue">拖后腿后台问卷管理</h2>
	  <p>在这里你可以管理自己的问卷</p>
	  <br />
	  <?php $this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'开始体验',
		'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'size'=>'large', // null, 'large', 'small' or 'mini'
		'url' => array('user/view'),
	)); ?>
	</div>
	</div>
	
	<div class="span4">
	<h3 class="page-header">拖后腿</h3>
	<p class="text-left">
		&nbsp;&nbsp;&nbsp;&nbsp;《基于移动平台的微调查应用》是一个包括移动客户端和服务器的在线微调查应用平台，其中兼容了一些社交平台的功能。服务器采用Hush-framework开源框架搭建。客户端采用MVC架构开发，采用当下最流行的Sliding Menu的UI设计，有很好的用户体验。用户可以通过平台网站注册账号，制作自己的调查问卷，向自己的好友圈推送问卷。
	</p>
	</div>
</div>

	<h2 class="page-header">样例展示</h2>
	<div class="row">
	<div class="span8 center">
		<?php $this->widget('bootstrap.widgets.TbCarousel', array(
			'items'=>array(
				array('image'=>'http://placehold.it/770x400&text=First+thumbnail', 
					'label'=>'First Thumbnail label', 
					'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
				array('image'=>'http://placehold.it/770x400&text=Second+thumbnail', 
					'label'=>'Second Thumbnail label', 
					'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
				array('image'=>'http://placehold.it/770x400&text=Third+thumbnail', 
				'label'=>'Third Thumbnail label', 
				'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
			),
		)); ?>
	</div>
	</div>
<br />