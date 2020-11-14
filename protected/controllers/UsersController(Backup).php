<?php
class UsersController extends Controller
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
				'users'=>array(Yii::app()->privilege->loadUser())
			),
			array('allow',
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	
	public function loadModel($id)
	{
		$model = Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	public function actionIndex()
	{
		$model = new Users('search');
		$model->unsetAttributes();
		
		if(isset($_GET['Users']))
			$model->attributes = $_GET['Users'];
		
		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		$model = new Users;

		if(isset($_POST['Users']))
		{	
			$model->attributes = $_POST['Users'];
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				if($model->save())
				{	
					$transaction->commit();
					$this->redirect(array('create'));
				}
				else
				{
					$error = "";
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
						Yii::app()->user->setFlash('notice','error : '.$error);
					}
					else
						Yii::app()->user->setFlash('notice','error : FAILED');
					
					$this->redirect(array('create'));
					$transaction->rollback();
					return;
				}				
			}
			catch(Exception $ex)
			{
				$transaction->rollback();
				throw new CHttpException(400, $ex->getMessage());
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if(isset($_POST['Users']))
		{
			$model->attributes = $_POST['Users'];
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				if($model->save())
				{
					$transaction->commit();
					Yii::app()->user->setFlash('notice', 'Success Update User');
					$this->redirect(array('view', 'id'=>$model->users_id));
				}
			}
			catch(Exception $ex)
			{
				$transaction->rollback();
				throw new CHttpException(400, $ex->getMessage(''));
			}
		}

		$this->render('update', array(
			'model'=>$model,
		));
	}
	
	public function actionView($id)
	{
		$this->render('view', array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionProfile($id)
	{
		$model = $this->loadModel($id);
	}
}