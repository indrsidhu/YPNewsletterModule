<?php

class DefaultController extends YPController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}