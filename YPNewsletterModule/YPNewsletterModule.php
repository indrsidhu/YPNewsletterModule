<?php

class YPNewsletterModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'ext.yiiplugins.YPNewsletterModule.models.*',
			'ext.yiiplugins.YPNewsletterModule.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$this->config($controller, $action);
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	
	function config($controller, $action){
	
		/*
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		Yii::app()->clientScript->registerCssFile($baseUrl.'/YPStyle.css');	
		*/
	
		/**
		 * Style and Layout Settings
		 */	
		 
		// If you are using bootstrap or your own stylesheet set this false, 
		$controller->YPStylesheet = true; // true|false
		 
		switch($action->id)
		{
			case 'admin':
			$controller->layout = 'application.modules.admin.views.layouts.admin';
			break;
			case 'create':
			$controller->layout = 'application.modules.admin.views.layouts.admin';
			break;
			case 'update':
			$controller->layout = 'application.modules.admin.views.layouts.admin';
			break;
			case 'view':
			break;
		}	
	}
	
}
