<?php
$this->breadcrumbs=array(
	'Newsletter Templates',
);

$this->menu=array(
	array('label'=>'Create NewsletterTemplate', 'url'=>array('create')),
	array('label'=>'Manage NewsletterTemplate', 'url'=>array('admin')),
);
?>

<h1>Newsletter Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
