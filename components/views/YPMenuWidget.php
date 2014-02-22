<?php
echo '<nav class="navbar navbar-default" role="navigation">';
$this->widget('zii.widgets.CMenu',array(
	'items'=>$this->menu,
	'linkLabelWrapper' => 'span',
	'itemCssClass'=>'',
	'htmlOptions'=>array('class'=>'nav navbar-nav')
));
echo '</nav>';
?>

<?php
if(count($this->menusub)>0){
	$this->widget('zii.widgets.CMenu',array(
		'activateParents'=>true,
		'items'=>$this->menusub,
		'linkLabelWrapper' => 'span',
		'itemCssClass'=>'',
		'htmlOptions'=>array('class'=>'nav nav-tabs','style'=>'margin-bottom:10px')
	));
}
?>
