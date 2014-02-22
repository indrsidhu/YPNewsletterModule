<div class="container">
<h1>Manage Newsletter Contact Lists</h1>
<?php $this->widget('YPMenuWidget'); ?>
	<?php 
	$arr = Yii::app()->getModule('newsletter')->getNewsletter($model->id);
	echo $arr['body'];
	?>


</div>

