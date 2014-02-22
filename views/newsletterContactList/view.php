<div class="container">
<h1>View NewsletterContactList #<?php echo $model->id; ?></h1>
<?php $this->widget('YPMenuWidget'); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
		'name'=>'yp_newsletter_groups_id',
		'label'=>'Group',
		'value'=>$model->ypNewsletterGroups->name,
		),
		//'yp_newsletter_groups_id',
		array(
		'name'=>'data_attributes_data',
		'label'=>'Data',
		'type'=>'raw',
		'value'=>NewsletterGroups::renderFieldsData($model->data_attributes_data),
		),
		//'data_attributes_data',
		array(
		'name'=>'is_active',
		'label'=>'Active',
		'value'=>($model->is_active==1) ? "Yes" : "NO",
		),
		//'is_active',
		'created',
	),
)); ?>
</div>