<?php
class YPMenuWidget extends CWidget{
	
	public $menu = array();
	public $menusub = array();

	function init(){

		$mainMenu=array(
			array('label'=>'Newsletter dashboard', 'url'=>array('/newsletter/default/index'),'active'=>(Yii::app()->controller->id=='default') ? true : false),
			array('label'=>'Manage groups', 'url'=>array('/newsletter/newsletterGroups/admin'),'active'=>(Yii::app()->controller->id=='newsletterGroups') ? true : false),
			array('label'=>'Manage contact list', 'url'=>array('/newsletter/newsletterContactList/admin'),'active'=>(Yii::app()->controller->id=='newsletterContactList') ? true : false),
		);	
		
		$menusub = array();
		
		switch(Yii::app()->controller->id){
			case 'newsletterGroups':
			$menusub = array(
				array('label'=>'Manage groups', 'url'=>array('/newsletter/newsletterGroups/admin'),'active'=>(Yii::app()->controller->action->id=='admin') ? true : false),
				array('label'=>'Create group', 'url'=>array('/newsletter/newsletterGroups/create'),'active'=>(Yii::app()->controller->action->id=='create') ? true : false),
				array('label'=>'Update', 'url'=>'','active'=>(Yii::app()->controller->action->id=='update') ? true : false,'visible'=>(Yii::app()->controller->action->id=='update') ? true : false),
				array('label'=>'View', 'url'=>'','active'=>(Yii::app()->controller->action->id=='view') ? true : false,'visible'=>(Yii::app()->controller->action->id=='view') ? true : false),
			);	
			break;
			case 'newsletterContactList':
			$menusub = array(
				array('label'=>'Manage contacts', 'url'=>array('/newsletter/newsletterContactList/admin'),'active'=>(Yii::app()->controller->action->id=='admin') ? true : false),
				array('label'=>'Create contact', 'url'=>array('/newsletter/newsletterContactList/create'),'active'=>(Yii::app()->controller->action->id=='create') ? true : false),
				array('label'=>'Update', 'url'=>'','active'=>(Yii::app()->controller->action->id=='update') ? true : false,'visible'=>(Yii::app()->controller->action->id=='update') ? true : false),
				array('label'=>'View', 'url'=>'','active'=>(Yii::app()->controller->action->id=='view') ? true : false,'visible'=>(Yii::app()->controller->action->id=='view') ? true : false),
			);	
			break;
		}
		
	
		$this->menu = $mainMenu;
		$this->menusub = $menusub;
		$this->render('YPMenuWidget');
	}
	
}
?>