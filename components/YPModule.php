<?php
/**
 * YPNewsletterModule
 *
 * @author YiiPlugins.com
 * @link http://yiiplugins.com/plugin/newsletter-module
 * @license http://www.opensource.org/licenses/bsd-license.php
 */
class YPModule{

	public static $config = array();

	function config($controller, $action){
		self::handleLayoutConfig($controller, $action);		
	}
	
	function getConfig($arg=''){
	
		$config = self::$config;
		
		if(empty($config)){
			$PluginPath = Yii::getPathOfAlias('YPNewsletterModule');
			$config = include($PluginPath.'/config.php');
			self::$config = $config;
		}
		
		$res = $config;
		if($arg!=''){
			$arg = explode('.',$arg);
			for($i=0;$i<count($arg);$i++){
			$res = (isset($res[$arg[$i]])) ? $res[$arg[$i]] : '';
			}
		}
		
		return $res;
	}

	
	/**
	 * Handle YP Layout
	 */
	function handleLayoutConfig($controller, $action){
		$config = self::getConfig();
		if(!isset($config['layout'])) { return false; }
		$layoutConfig = array();
		foreach($config['layout'] as $setting){
			if(isset($setting[0]) && isset($setting[1])){
				$routes = explode(',',$setting[0]);
				$layout = $setting[1];
				foreach($routes as $route){
					if(trim($route)!=''){
					$layoutConfig[trim($route)] = trim($layout);
					}
				}
			}
		}
		$actionType1 = $controller->id.'/'.$action->id;
		$actionType2 = $action->id;
		if(isset($layoutConfig[$actionType1])){
			$controller->layout = $layoutConfig[$actionType1];
		} elseif(isset($layoutConfig[$actionType2])){
			$controller->layout = $layoutConfig[$actionType2];
		}
	}
	
	
}