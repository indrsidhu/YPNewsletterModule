<div class="container">
<h1>View NewsletterGroups #<?php echo $model->id; ?></h1>
<?php $this->widget('ext.yiiplugins.YPNewsletterModule.components.YPMenuWidget'); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'data_attributes_fields',
		'is_active',
		'created',
	),
)); ?>
</div>