<div class="container">
	<h1>Newsletter Management</h1>
	<?php $this->widget('YPMenuWidget'); ?>
	
	<div>
	<h3>Groups Created  : <?php echo NewsletterGroups::model()->count(); ?></h3>
	<h3>Contact list members  : <?php echo NewsletterContactList::model()->count(); ?></h3>
	</div>
	
</div>