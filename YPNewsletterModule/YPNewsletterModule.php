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
			$this->sendtNewsletter(1);
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
	
	
	function getTemplate($id){
		
		$model = NewsletterTemplate::model()->findByPk($id);
		if($model===null){
			return false;
		}
		
		$header = nl2br(CHtml::value($model,'header'));
		$body 	= nl2br(CHtml::value($model,'body'));
		$footer = nl2br(CHtml::value($model,'footer'));
		
		$email_header = $this->includeFIle('email_header',array(
		'subject'=>'sdsa',
		));
		$email_footer = $this->includeFIle('email_footer',array(
		));
		
		
		$html = '';
		$html .= $email_header;
		$html .= '<tr><td>'.$body.'</td></tr>';
		$html .= $email_footer;
		$html .= '</table>';
		return $html;
	}
	
	function getSendStatus($NewsletterContactListId){

		$criteria = new CDbCriteria();
		//$criteria->with=array('ypNewsletterGroups');
		$criteria->join =' 
		INNER JOIN {{newsletter_groups}} as ypNewsletterGroups ON (t.yp_newsletter_groups_id=ypNewsletterGroups.id) 
		INNER JOIN {{newsletter_template}} as newsletterTemplate ON  (ypNewsletterGroups.id=newsletterTemplate.yp_newsletter_groups_id)
		';
		$criteria->condition = 't.is_active=1 AND ypNewsletterGroups.is_active=1 AND newsletterTemplate.is_active=1';
		$criteria->compare('t.id',$NewsletterContactListId);
		
		$exsits = NewsletterContactList::model()->exists($criteria);
		
		return ($exsits) ? "Active" : "Inactive";
		
		
	}
	
	function includeFIle($filename,$arr){
	
		$class = get_class(Yii::app());
		if($class=="CConsoleApplication"){
			$file = Yii::getPathOfAlias('ext.yiiplugins.YPNewsletterModule.views.mailTemplate.'.$filename).'.php';
			$html = CConsoleCommand::renderFile($file,$arr,true,false);
		} else{
			$file = 'ext.yiiplugins.YPNewsletterModule.views.mailTemplate.'.$filename;
			$html = Yii::app()->controller->renderPartial($file,$arr,true,false);
		}
		return $html;
	}
	
	
	function sendtNewsletter($NewsletterContactListId){
		$status = $this->getSendStatus($NewsletterContactListId);
		if($status=='Active'){
			$model = NewsletterContactList::model()->findByPk($NewsletterContactListId);
			
			$templateId = CHtml::value($model,'ypNewsletterGroups.newsletterTemplate.id');
			echo $this->getTemplate($templateId);
			die();	
		}
	}
	
	

	public function sendMail($arr){
	
		$subject = $arr['subject'];
		$fromEmail = $arr['fromEmail'];
		$fromName = $arr['fromName'];
		$newsletterId = $arr['newsletterId'];
		
		$email_header = $this->includeFIle('newsletter_header',array(
		'subject'=>$subject,
		));
		$email_footer = $this->includeFIle('newsletter_footer',array(
		));
		
		$body = $email_header.$email_body.$email_footer;
		
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
		$mailer->Host = "localhost";
		$mailer->Port = "25";
		
		$mailer->IsHTML();
		$mailer->From = $fromEmail;
		$mailer->AddAddress($toEmail);
		$mailer->FromName = $fromName;
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = $subject;
		$mailer->Body = $body;
		
		if($mailer->Send()){
			return true;
		} else{
			//$mailer->ErrorInfo;
			return false;
		}
		
		
	}	
	
}
