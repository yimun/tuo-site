<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'eiocontent-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php foreach($items as $i=>$model):?>
	<?php echo $form->errorSummary($model); ?>
		<fieldset>
			<legend><?php echo $i+1?>、</legend>
			<?php echo $form->textAreaRow($model,'[$i]question',array('rows'=>5, 'cols'=>50, 'class'=>'span8')); ?>
			<?php echo $form->radioButtonListInlineRow($model, "[$i]questionnum", array('2'=>'2','3'=>'3','4'=>'4','5'=>'5')); ?>
			
			<!-- answer ABCDE  -->
			<div id="answer_<?php echo $i?>_0" style="display:none">
				<?php echo $form->textAreaRow($model,'[$i]answerA',array('rows'=>2, 'cols'=>50, 'class'=>'span6')); ?></div>
			<div id="answer_<?php echo $i?>_1" style="display:none">
				<?php echo $form->textAreaRow($model,'[$i]answerB',array('rows'=>2, 'cols'=>50, 'class'=>'span6')); ?></div>
			<div id="answer_<?php echo $i?>_2" style="display:none">
				<?php echo $form->textAreaRow($model,'[$i]answerC',array('rows'=>2, 'cols'=>50, 'class'=>'span6')); ?></div>
			<div id="answer_<?php echo $i?>_3" style="display:none">
				<?php echo $form->textAreaRow($model,'[$i]answerD',array('rows'=>2, 'cols'=>50, 'class'=>'span6')); ?></div>
			<div id="answer_<?php echo $i?>_4" style="display:none">
				<?php echo $form->textAreaRow($model,'[$i]answerE',array('rows'=>2, 'cols'=>50, 'class'=>'span6')); ?></div>
				<?php echo $form->textFieldRow($model,'[$i]trueanswer',array('class'=>'span5','maxlength'=>10)); ?>
		<fieldset>
	<?php endforeach; ?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(":radio").click(function(){
				e = event.srcElement;
				value = e.value;
				elem = e.id.split('_');
				it = elem[1];
				//alert(it+"+"+value);
				for(i=0;i<value;i++){
					$("#answer_"+it+"_"+i).slideDown();
				}
				for(i=value;i<5;i++){
					$("#answer_"+it+"_"+i).slideUp();
				}
			});
		});
	</script>
<?php $this->endWidget(); ?>
