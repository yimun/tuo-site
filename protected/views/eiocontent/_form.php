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
			<?php //echo $form->radioButtonListInlineRow($model, "[$i]questionnum", array('2','3','4','5')); ?>
			
			<!-- answer num radio  -->
			<div class="control-group">
			<label class="control-label required" for="Eiocontent_<?php echo $i?>_questionnum">回答数量 <span class="required">*</span></label>
			<div class="controls">
				<input id="Eiocontent_<?php echo $i?>_questionnum" type="hidden" value="" name="Eiocontent[<?php echo $i?>][questionnum]">
				<label class="radio inline">
					<input id="Eiocontent_<?php echo $i?>_questionnum_0" value="2" type="radio" 
					onchange="myfunction()"  name="Eiocontent[<?php echo $i?>][questionnum]">	
				<label for="Eiocontent_<?php echo $i?>_questionnum_0">2</label>
				</label>
				<label class="radio inline">
					<input id="Eiocontent_<?php echo $i?>_questionnum_1" value="3" type="radio" 
					onchange="myfunction()" name="Eiocontent[<?php echo $i?>][questionnum]">
				<label for="Eiocontent_<?php echo $i?>_questionnum_1">3</label></label>
				<label class="radio inline">
					<input id="Eiocontent_<?php echo $i?>_questionnum_2" value="4" type="radio" 
					onchange="myfunction()" name="Eiocontent[<?php echo $i?>][questionnum]">
				<label for="Eiocontent_<?php echo $i?>_questionnum_2">4</label></label>
				<label class="radio inline">
					<input id="Eiocontent_<?php echo $i?>_questionnum_3" value="5" type="radio" 
					onchange="myfunction()" name="Eiocontent[<?php echo $i?>][questionnum]">
				<label for="Eiocontent_<?php echo $i?>_questionnum_3">5</label></label>
			</div>		
			</div>
			
			
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

	<script type="text/javascript">
		function myfunction(){
			e = event.srcElement;
			count = e.value;
			var idarr = e.id.split('_');
			for(i=0;i<5;i++){
				var answer = document.getElementById('answer_'+idarr[1]+'_'+i);
				//alert(answer.id);
				answer.style.display  = "none";
			}
			for(i=0;i<count;i++){
				var answer = document.getElementById('answer_'+idarr[1]+'_'+i);
				//alert(answer.id);
				answer.style.display  = "block";
			}
		}
	</script>
<?php $this->endWidget(); ?>
