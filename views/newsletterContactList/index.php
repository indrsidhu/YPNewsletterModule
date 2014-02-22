<div class="container">
<h1>Newsletter Contact Lists</h1>
<?php $this->widget('ext.yiiplugins.YPNewsletterModule.components.YPMenuWidget'); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>