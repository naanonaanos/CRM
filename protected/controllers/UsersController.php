<?php

class UsersController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl',
			'postOnly + delete',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'saveImage', 'Profile'),
				'users'=>array('@'),
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
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model


		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			
			if(Yii::app()->session['crop_result'])
		{
			$uploads_dir = 'public/upload/users/'.$model->username.'.png';
			file_put_contents(Yii::app()->user->getState('pathUrl').$uploads_dir, Yii::app()->session['crop_result']);
			$model->picture = $uploads_dir;
		}
			if($model->save())
				$this->redirect(array('view','id'=>$model->users_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];

			if (Yii::app()->session['crop_result'])
			{
				$uploads_dir = 'public/upload/users/'.$model->username.'.png';
				file_put_contents(Yii::app()->user->getState('pathUrl').$uploads_dir, Yii::app()->session['crop_result']);
				$model->picture = $uploads_dir;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->users_id));
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

	public function actionProfile($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];

			if (Yii::app()->session['crop_result'])
			{
				$uploads_dir = 'public/upload/users/'.$model->username.'.png';
				file_put_contents(Yii::app()->user->getState('pathUrl').$uploads_dir, Yii::app()->session['crop_result']);
				$model->picture = $uploads_dir;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->users_id));
		}

		$this->render('profile',array(
			'model'=>$model,
		));
	}

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
			$model = new Users('search');
			$model->unsetAttributes();

			if(isset($_GET['Users']))
				$model->attributes = $_GET['Users'];

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

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionsaveImage()
	{
		if(isset($_POST))
		{
			$img = $_POST['picture'];
			if($img)
			{
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				
				Yii::app()->session['crop_result'] = $data;
			}
		}
	}
}
