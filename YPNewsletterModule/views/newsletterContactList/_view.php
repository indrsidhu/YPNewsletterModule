<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yp_newsletter_groups_id')); ?>:</b>
	<?php echo CHtml::encode($data->yp_newsletter_groups_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_attributes_data')); ?>:</b>
	<?php echo CHtml::encode($data->data_attributes_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />


</div>