<div class="container">
<h1>Manage Newsletter Templates</h1>
<?php $this->widget('ext.yiiplugins.YPNewsletterModule.components.YPMenuWidget'); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'newsletter-template-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'yp_newsletter_groups_id',
		'name',
		'email_from',
		//'header',
		//'body',
		/*
		'footer',
		'create',
		'updated',
		*/
		array(
		'name'=>'is_active',
		'header'=>'Active',
		'value'=>'(CHtml::value($data,"is_active")==1) ? "Yes" : "No"',
		'htmlOptions'=>array('style'=>'text-align:center'),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>