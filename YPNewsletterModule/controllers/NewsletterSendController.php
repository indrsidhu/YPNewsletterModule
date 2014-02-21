<?php

class NewsletterSendController extends YPController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Send mails.
	 */
	public function actionAdmin()
	{
		$model=new NewsletterContactList('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NewsletterContactList']))
			$model->attributes=$_GET['NewsletterContactList'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}	
}
