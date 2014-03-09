<div class="container">
<h1>Upload contacts via csv file</h1>
<?php $this->widget('YPMenuWidget'); ?>

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
		$url = Yii::app()->createAbsoluteUrl('newsletter/newsletterContactList/importcsv',array('groupId'=>$field->id));
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
<?php
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
echo $form->labelEx($model, 'csvfile');
echo $form->fileField($model, 'csvfile');
echo $form->error($model, 'csvfile');
echo CHtml::submitButton('Submit',array('class'=>'btn btn-primary btn-lg spacer-30'));
$this->endWidget();
?>
<?php endif; ?>

</div>