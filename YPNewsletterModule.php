<?php

class YPNewsletterModule extends CWebModule
{
	public function init()
	{
		Yii::setPathOfAlias('plugin', dirname(__FILE__));
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'plugin.models.*',
			'plugin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			YPModule::config($controller, $action);
			//$arr = $this->getNewsletter(1);// for contact list id = 1
			//$this->sendMail($arr);
			
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	
	
	function getTemplate($id){
		
		$model = NewsletterTemplate::model()->findByPk($id);
		if($model===null){
			return false;
		}
		
		$body 	= nl2br(CHtml::value($model,'body'));
		
		$email_header = $this->includeFIle('email_header',array(
		'subject'=>CHtml::value($model,'subject'),
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
		INNER JOIN '.NewsletterContactList::tableName().' as ypNewsletterGroups ON (t.yp_newsletter_groups_id=ypNewsletterGroups.id) 
		INNER JOIN '.NewsletterTemplate::tableName().' as newsletterTemplate ON  (ypNewsletterGroups.id=newsletterTemplate.yp_newsletter_groups_id)
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
	
	
	function getNewsletter($NewsletterContactListId){
		$status = $this->getSendStatus($NewsletterContactListId);
		
		$model = NewsletterContactList::model()->findByPk($NewsletterContactListId);
		
		$templateId = CHtml::value($model,'ypNewsletterGroups.newsletterTemplate.id');

		$template = $this->getTemplate($templateId);
		$data 	  = unserialize(CHtml::value($model,'data_attributes_data'));
		
		
		foreach($data as $key=>$val){
			$template = str_replace('{{'.$key.'}}',$val,$template);	
		}

		$subject = CHtml::value($model,'ypNewsletterGroups.newsletterTemplate.subject');
		$emailFrom = CHtml::value($model,'ypNewsletterGroups.newsletterTemplate.email_from');
		$nameFrom = CHtml::value($model,'ypNewsletterGroups.newsletterTemplate.name_from');
		
		$arr = array();
		foreach($data as $key=>$val){
			$subject = str_replace('{{'.$key.'}}',$val,$subject);
		}
		
		$arr['status'] 		= $status;
		$arr['subject'] 	= $subject;
		$arr['toEmail'] 	= $data['email'];
		$arr['fromEmail'] 	= $emailFrom;
		$arr['fromName'] 	= $nameFrom;
		$arr['body'] 		= $template;
		
		return $arr;
		
	}
	
	

	public function sendMail($arr){
	
		if($arr['status']=='Active'){
			$subject	= $arr['subject'];
			$toEmail	= $arr['toEmail'];
			$fromEmail	= $arr['fromEmail'];
			$fromName	= $arr['fromName'];
			$body		= $arr['body'];
			
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
	}// EOF send mail
	
}
