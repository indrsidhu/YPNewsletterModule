<?php
//ini_set('memory_limit', '2048M');
set_time_limit(0);
class NewsletterCommand extends CConsoleCommand {         
	public function run($args) {
		
		// On every trigger it will shoot 10 mails,
		// set trigger via cron every 1 minutes is good
		Yii::import('ext.yiiplugins.YPNewsletterModule.YPNewsletterModule');
		$module = new YPNewsletterModule(null,null);
		$module->cron();
	}
}
?>