<?php

class AccountController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Account;
		$model->code= Yii::app()->custom->setCounterNumber('Account', 'code', 'ACT');
		$model->full_name= Yii::app()->user->getstate('fullName');

		if(isset($_POST['Account']))
		{
			$model->attributes=$_POST['Account'];
			$transaction=Yii::app()->db->beginTransaction();
			try
			{
				$opportunity 	= Opportunity::model()->findByAttributes(array('code'=>$_POST['Account']["opportunity_code"]));
				
				$leads 			= Leads::model()->findByAttributes(array('name'=>$_POST['Account']["leads_code"]));
							
				$contact 		= Contact::model()->findByAttributes(array('contact_name'=>$_POST['Account']["contact_code"]));

				$destination 	= Destination::model()->findByAttributes(array('code'=>$_POST['Account']["destination_code"]));

				$model->opportunity_id 	= $opportunity->opportunity_id;
				$model->leads_id 		= $leads->leads_id;
				$model->contact_id 		= $contact->contact_id;
				$model->destination_id 	= $destination->destination_id;
				if($model->save())
				{
					$transaction->commit();
					$this->redirect(array('view','id'=>$model->account_id));
					// echo var_dump($model->leads_id);exit;
				}
			}
			catch(Exception$ex)
			{
				$transaction->rollback();
				throw new CHttpException(400,$ex->getMessage());
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Account']))
		{
			$model->attributes=$_POST['Account'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->account_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{	
		if(!Yii::app()->user->isGuest)
		{
			$model = new Account('search');
			$model->unsetAttributes();

			if(isset($_GET['Account']))
				$model->attributes = $_GET['Account'];

			$this->render('index' ,array(
				'model'=>$model
			));
		}
		else
		{
			$this->redirect(array('site/login'));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Account('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Account']))
			$model->attributes=$_GET['Account'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Account the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Account::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Account $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='account-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
