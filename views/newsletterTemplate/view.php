<div class="container">
<h1>View NewsletterTemplate #<?php echo $model->id; ?></h1>
<?php $this->widget('ext.yiiplugins.YPNewsletterModule.components.YPMenuWidget'); ?>

<?php echo Yii::app()->getModule('newsletter')->getTemplate($model->id); ?>

<?php /* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'yp_newsletter_groups_id',
		'name',
		'email_from',
		'header',
		'body',
		'footer',
		'create',
		'updated',
		'is_active',
	),
)); */ ?>
</div>