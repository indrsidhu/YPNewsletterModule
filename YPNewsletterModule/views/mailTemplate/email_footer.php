	</td></tr>
	<tr>
		<td>
			<table id="content-6" cellpadding="0" cellspacing="0" align="center">
				<p align="center" style="color:#aaa!important;font-size:11px">
				Information contained and transmitted by this e-mail is confidential and proprietary to <?php echo YPModule::getConfig('params.siteName'); ?> and its affiliates. It is intended for use only by the recipient. If you are not the intended recipient, you are hereby notified that any dissemination, distribution, copying or use of this e-mail is strictly prohibited and you are requested to delete this e-mail immediately. Please also notify the originator or <a href="mailto:"><?php echo YPModule::getConfig('params.contactEmail'); ?></a> It is recommended that you carry out your own virus checks before opening an attachment. To know more about <?php echo YPModule::getConfig('params.siteName'); ?> please visit <a href="<?php echo YPModule::getConfig('params.siteUrl'); ?>" target="_blank">
				<?php echo YPModule::getConfig('params.siteName'); ?></a>
				</p>
			</table>
		</td>
	</tr>
	<tr><td>
	
</td></tr></table><!-- wrapper -->

	<table id="bottom-message" cellpadding="20" cellspacing="0" width="600" align="center">
		<tr>
			<td align="center">
				<p>&copy; <?php echo date('Y'); ?> <?php echo YPModule::getConfig('params.siteUrl'); ?> All rights reserved.</p>
				<p>
				<?php if (YPModule::getConfig('params.facebookUrl')!=''): ?>
				<a href="<?php echo YPModule::getConfig('params.facebookUrl'); ?>">Facebook fans</a>
				<?php endif; ?>
				<?php if (YPModule::getConfig('params.twitterUrl')!=''): ?>
				| 
				<a href="<?php echo YPModule::getConfig('params.twitterUrl'); ?>">Follow us on twitter</a>
				<?php endif; ?>
				</p>
			</td>
		</tr>
	</table><!-- top message -->

</body>
</html>		