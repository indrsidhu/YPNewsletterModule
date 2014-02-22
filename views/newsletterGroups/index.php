<?php
$this->breadcrumbs=array(
	'Newsletter Groups',
);

$this->menu=array(
	array('label'=>'Create NewsletterGroups', 'url'=>array('create')),
	array('label'=>'Manage NewsletterGroups', 'url'=>array('admin')),
);
?>

<h1>Newsletter Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
