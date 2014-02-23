<?php 
$arr = Yii::app()->getModule('newsletter')->getNewsletter($model->id);
echo $arr['body'];
?>