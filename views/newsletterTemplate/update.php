<div class="container">
<h1>Update NewsletterTemplate <?php echo $model->id; ?></h1>
<?php $this->widget('ext.yiiplugins.YPNewsletterModule.components.YPMenuWidget'); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>