<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!--<link rel="shortcut icon" href="assets/ico/favicon.png">-->
	<?php Yii::app()->bootstrap->register();?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<!-- <div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div> --><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('bootstrap.widgets.TbNavbar',array(
			'type'=>'inverse',
			'brand'=> Yii::app()->name,
			'brandUrl'=>array('site/'),
			'collapse'=>true,
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'items'=>array(
						array('label'=>'首页','icon'=>'home','url'=>array('site/index')),
						array('label'=>'热门问卷','icon'=>'arrow-up','url'=>array('eio/hot')),
						array('label'=>'发布管理','icon'=>'list-alt','url'=>array('eio/manage')),
						array('label'=>'我要发布','icon'=>'plus','url'=>array('eio/create')),
						array('label'=>'用户管理','url'=>array('user/admin'),'visible'=>Yii::app()->user->name==='admin'),
					)),
				'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="搜索"></form>',
				array('class'=>'bootstrap.widgets.TbMenu',
						'htmlOptions'=>array(
						'class'=>'pull-right'),
						'items'=>array(
							array('label'=>'注册','url'=>array('user/create'),'visible'=>Yii::app()->user->isGuest),
							array('label'=>'登录','url'=>array('site/login'),'visible'=>Yii::app()->user->isGuest),
							array('label'=>'欢迎您 '.Yii::app()->user->name,'url'=>array('user/view'),'icon'=>'user','visible'=>!Yii::app()->user->isGuest),
							array('label'=>'退出','url'=>array('site/logout'),'icon'=>'','visible'=>!Yii::app()->user->isGuest),)),),));?>	
				</div>
				<br /><br /><br />
<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?>
<!-- breadcrumbs -->
<?php $this->widget('bootstrap.widgets.TbAlert', 
		array('block'=>true, // display a larger alert block?
			  'fade'=>true, // use transitions?
			  'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
			  'alerts'=>array( // configurations per alert type
			  'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			  'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'),
			  'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'),),)); 
?>
	
	  <?php echo $content; ?>
	  <br /><br />
	  <div class="clear"></div>
	  <footer>
		<div class="row">
			<div class="span12"><hr /></div>
			<div class="span6">
				<p class="powered">Powered by <a target="_blank" href="http://www.yiiframework.com">Yii</a> /<a target="_blank" href="http://www.yiiframework.com/extension/bootstrap">Yii-Bootstrap</a> /<a target="_blank" href="http://www.yiiframework.com/extension/seo">Yii-SEO</a> /<a target="_blank" href="http://twitter.github.com/bootstrap">Bootstrap</a> /<a target="_blank" href="http://www.jquery.com">jQuery</a> /<a target="_blank" href="http://www.lesscss.org">LESS</a> </p>
			</div>
			<div class="span6">
				<p class="pull-right">© 创新实验学院 <a href="#">yimu</a> 2014</p>
				</div>
		</div>
	</footer>
	</div><!-- page --></body>
</html>