<?php
class IndustryController extends Controller
{
	public $layout = '//layouts/column2';

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
			array('allow',
				'actions'=>array(Yii::app()->controller->action->id),
				'users'=>array(Yii::app()->privilege->loadUser()),
			),
			array('allow', 
				'actions'=>array(),
				'users'=>array('@')
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	
	public function loadModel($id)
	{
		$model = Source::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist');
		return $model;
	}

	public function actionIndex()
	{
		$model = new Souce('search');
		$model->unsetAttributes();

		$this->render('index' ,array(
			'model'=>$model
		));
	}

	public function actionCreate()
	{
		$model = new Status;

		if(isset($_POST['Industry']))
		{
			$model->attributes = $_POST['Industry'];
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				if($model->save())
				{
					$transaction->commit();
					$this->redirect(array('index'));
				}
			} 
			catch(Exception $ex)
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
		$model = $this->loadModel($id);

		if(isset($_POST['Industry']))
		{
			$model->attributes = $_POST['Industry'];
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				if($model->save())
				{
					$transaction->commit();
					$this->redirect(array('index'));
				}
			} 
			catch(Exception $ex)
			{
				$transaction->rollback();
				throw new CHttpException(400,$ex->getMessage());
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
}