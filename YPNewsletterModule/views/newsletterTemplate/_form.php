<?php
$groupId = (CHtml::value($model,'ypNewsletterGroups.id')!='') ? CHtml::value($model,'ypNewsletterGroups.id') : Yii::app()->getRequest()->getQuery('groupId');
$NewsletterGroups = NewsletterGroups::model()->findByAttributes(array(
'is_active'=>1,
'id'=>$groupId,
));
?>
<?php if($NewsletterGroups==null): ?>
	<h3>Please select Group before begin</h3>
	<?php
	$list = array();
	$fields = NewsletterGroups::model()->findAllByAttributes(array('is_active'=>1));
	foreach($fields as $field){
		$url = Yii::app()->createAbsoluteUrl('newsletter/newsletterTemplate/create',array('groupId'=>$field->id));
		$list[$url]=$field->name;
	}
	echo CHtml::dropDownList('state','',$list, 
	array(
	'empty' => 'Select a group',
	'class'=>'form-control',
	'onChange'=>'js:window.location=this.value',
	));
	?>
	
<?php else: ?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'newsletter-template-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45,'class'=>'form-control','disabled'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email_from'); ?>
		<?php echo $form->textField($model,'email_from',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email_from'); ?>
	</div>

	<div class="form-group">
	<?php $fields = NewsletterGroups::getFields($groupId); ?>
	<ul class="list-unstyled">
		<li><strong>Use these shortcodes in Body</strong></li>
		<?php foreach($fields as $field): ?>
		<li>{{<?php echo $field; ?>}}</li>
		<?php endforeach; ?>
	</ul>
	</div>

	<!--
	<div class="form-group">
		<?php //echo $form->labelEx($model,'header'); ?>
		<?php //echo $form->textArea($model,'header',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php //echo $form->error($model,'header'); ?>
	</div>
	-->

	<div class="form-group">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>
	
	<!--
	<div class="form-group">
		<?php //echo $form->labelEx($model,'footer'); ?>
		<?php //echo $form->textArea($model,'footer',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php //echo $form->error($model,'footer'); ?>
	</div>
	-->

	<div class="form-group">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form::dropDownList($model,'is_active',array('1'=>'Yes','0'=>'No'),array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php endif; ?>