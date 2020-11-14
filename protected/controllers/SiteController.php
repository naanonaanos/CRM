<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if(!Yii::app()->user->isGuest)
			$this->render('index');
		else
			$this->redirect(array('login'));
	}

	public function actionLoginZeus($id)
	{
		$auth = base64_decode($id);

		$arr = explode("##", $auth);
		$username = base64_decode($arr['0']);
		$password = base64_decode(base64_decode($arr['1']));

		$model = new LoginForm;
		$model->username = $username;
		$model->password = $password;

		if($model->validate() && $model->login())
			$this->redirect("localhost/seninsetyo/index.php");
		else
			$this->render('login',array('model'=>$model));
	}
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
		{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	

	public function actionAbout()
	{
		$model=new About;
		if(!Yii::app()->user->isGuest)
		$this->render('About', array(
			'model'=>$model));
		else
			$this->redirect(array('login'));
	}


	/**
	 * Displays the login page
	 */
	public function actionLogin()
	// {
	// 	if(!Yii::app()->user->isGuest)
	// 		$this->redirect(array('index'));
	// 	else
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	// }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionForgot()
	{
		$model = new Users;
		if(isset($_POST['Users']))
		{
			$model->attributes = $_POST['Users'];
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				$find_email = Users::model()->findByAttributes(array('email'=>$model->email));
				if($find_email)
				{
					$model = Users::model()->findByPk($find_email->users_id);
					$mail = new YiiMailer;
					$mail->clearLayout();
					$mail->setFrom('noreply@crm.id');
					$mail->setTo(array($model->email));
					$mail->setSubject('Password reset!');

					$text = "Hi ".$model->full_name.",\n ";
					$text .= "\n";
					$text .= "Someone requested that the password for your CRM account be reset. \n";
					$text .= "Please click link for reset your password : localhost:8080/zeus/index.php?r=site/resetpassword&id=".$model->users_id." \n";
					$text .= "If you didn't request this, you can ignore this email or let us know. Your password won't change until you create a new password.  \n";
					$text .= "\n";
					$text .= "Thanks,\n";
					$text .= "Nizam Haqqizar.";
					$text = nl2br($text);
					
					$mail->setBody($text);
					if($mail->send())
						Yii::app()->user->setFlash('notice', "A Password reset message was sent to your email address. If you don't receive the password reset message within a few momments, please check your spam folder or other filtering tools.");	
					else
						Yii::app()->user->setFlash('notice', "A Password reset message failed sent to your email address.");	
				}
				else
					Yii::app()->user->setFlash('notice', 'Email not found, please submit your registered email.');

			}
			catch(Exception $ex)
			{
				$transaction->rollback();
				throw new CHttpException(400,$ex->getMessage());
			}
		}
		$this->render('forgot',array('model'=>$model));
	}
}