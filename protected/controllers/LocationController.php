<?php
class LocationController extends Controller
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
		$model = Location::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist');
		return $model;
	}

	public function actionIndex()
	{
		$model = new Location('search');
		$model->unsetAttributes();

		$this->render('index' ,array(
			'model'=>$model
		));
	}

	public function actionCreate()
	{
		$model = new Location;

		if(isset($_POST['Location']))
		{
			$model->attributes = $_POST['Location'];
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

		if(isset($_POST['Location']))
		{
			$model->attributes = $_POST['Location'];
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
			// echo var_dump($_POST['Location']);exit;
				if($model->save())
				{
					$transaction->commit();
					$this->redirect(array('index'));
				}
				else
				{
					$model->validate();
					if(count($model->getErrors()) > 0)
					{
						foreach($model->getErrors() as $err)
						{
							for($x = 0; $x <= count($err)-1; $x++)
							{
								$error .= $err[$x];
							}
						}
						$message .= $error;
					}
					else
						$message .= 'FAILED CREATE PICKED';
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

	public function actionDeleted($id)
	{
		$model = Location::model()->findByPk($id);
		$model->delete();

		$this->redirect(array('index', 'id'=>$model->location_id));
	}

	public function actionView($id)
	{
		$this->render('view' ,array(
			'model'=>$this->loadModel($id)
		));
	}
}