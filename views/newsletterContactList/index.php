<div class="container">
<h1>Newsletter Contact Lists</h1>
<?php $this->widget('YPMenuWidget'); ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>