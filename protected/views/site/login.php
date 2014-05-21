<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array('Login',);
?>

<h2 class="page-header"><i class="icon-user"></i>用户登录<small>&nbsp;&nbsp;请填写登录信息</small></h2>
<section id="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'type' => 'vertical',
	// 'enableClientValidation'=>true,	
	// 'clientOptions'=>array(
		// 'validateOnSubmit'=>true,
		
	// ),
	'htmlOptions'=>array('class'=>'well'),)); ?>
	
	<?php echo $form->textFieldRow($model, 'username',array('class'=>'span3')); ?>
	<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
	<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
	
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info','label'=>'提交')); ?>

	<?php $this->endWidget(); ?>
</section>
