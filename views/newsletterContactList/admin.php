<div class="container">
<h1>Manage Newsletter Contact Lists</h1>
<?php $this->widget('YPMenuWidget'); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'newsletter-contact-list-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
		'name'=>'yp_newsletter_groups_id',
		'header'=>'Group',
		'value'=>'$data->ypNewsletterGroups->name',
		),
		//'yp_newsletter_groups_id',
		array(
		'name'=>'data_attributes_data',
		'header'=>'Group',
		'type'=>'raw',
		'value'=>'NewsletterGroups::renderFieldsData($data->data_attributes_data)',
		),
		//'data_attributes_data',
		array(
		'name'=>'is_active',
		'header'=>'Active',
		'value'=>'($data->is_active==1) ? "Yes" : "NO"',
		'htmlOptions'=>array('style'=>'text-align:center'),
		),
		'created',
		array(
		'name'=>'updated',
		'header'=>'updated',
		'value'=>'$data->updated',
		'filter'=>false
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>