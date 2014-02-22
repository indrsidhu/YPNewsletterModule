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
		$url = Yii::app()->createAbsoluteUrl('newsletter/newsletterContactList/create',array('groupId'=>$field->id));
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
	'id'=>'newsletter-contact-list-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php
	echo NewsletterGroups::generateFields($NewsletterGroups->id);
	?>

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