<div class="container">
<h1>Manage Newsletter Groups</h1>
<?php $this->widget('YPMenuWidget'); ?>
<p>
Groups are a great tool for organizing the subscribers for your list for targeted communication.<br />
Subscribers can join groups when they sign up for your newsletter, or you can set up in your coding, when someone register  will automatically enter into Newsletter contact list under one of group you will create here.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'newsletter-groups-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'data_attributes_fields',
		array(
		'name'=>'is_active',
		'header'=>'Active',
		'value'=>'($data->is_active==1) ? "Yes" : "NO"',
		),
		'created',
		array(
		'name'=>'updated',
		'header'=>'updated',
		'value'=>'$data->updated',
		'filter'=>false
		),
		//'updated',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>