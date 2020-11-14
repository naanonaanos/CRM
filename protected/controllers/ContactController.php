<?php
class ContactController extends Controller
{
	public $layout = '//layouts/column2';
	public function filters()
	{
		return array(
			'accessControl',
			'postOnly + delete',
		);
	}

	public function accesRules()
	{
		return array(
			array('allow',
				'actions'=>array(Yii::app()->controller->action->id),
				'users'=>array(Yii::app()->privilege->loadUser()),
			),
			array('allow',
				'actions'=>array(
					'getLeads', 'addLeadsContact', 'DeletedLeadsContact',
				),
				'users'=>array('*')
			),
			array('deny',
				'users'=>array('*')
			),
		);
	}

	public function loadModel($id)
	{
		$model = Contact::model()->findByPk($id);

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist');
		return $model;
	}

	public function actionIndex()
	{
		if(!Yii::app()->user->isGuest)
		{
			$model = new Contact('search');
			$model->unsetAttributes();

			if(isset($_GET['Contact']))
				$model->attributes = $_GET['Contact'];

			$this->render('index' ,array(
				'model'=>$model
			));
		}
		else
		{
			$this->redirect(array('site/login'));
		}
	}

	public function actionCreate()
	{
		if(!Yii::app()->user->isGuest)
		{
			$model = new Contact;
			$model->code = Yii::app()->custom->setCounterNumber('Contact', 'code', 'CNT');
			$model->full_name = Yii::app()->user->getstate('fullName');

			if(isset($_POST['Contact']))
			{
				$model->attributes = $_POST['Contact'];
				$transaction = Yii::app()->db->beginTransaction();
				try
				{
					if($model->save())
					{
						$transaction->commit();
						$this->redirect(array('update', 'id'=>$model->contact_id));
						// echo var_dump($model);exit;
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
		else
		{
			$this->redirect(array('site/login'));
		}
	}

	public function actionUpdate($id)
	{
		if(!Yii::app()->user->isGuest)
		{
			$model = $this->loadModel($id);

			if(isset($_POST['Contact']))
			{
				$model->attributes = $_POST['Contact'];
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
		else
		{
			$this->redirect(array('site/login'));
		}
	}

	public function actionDeleted($id)
	{
		$model = Contact::model()->findByPk($id);
		$model->delete();

		$this->redirect(array('index', 'id'=>$model->contact_id));
	}

	public function actionView($id)
	{
		if(!Yii::app()->user->isGuest)
		{
			$mdl = new LeadsContact;
			if(isset($_POST['LeadsContact']))
			{
				$mdl->attributes = $_POST['LeadsContact'];
				$transaction = Yii::app()->db->beginTransaction();
				try
				{
					if($mdl->save())
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

			$this->render('view' ,array(
				'model'=>$this->loadModel($id),
				'mdl'=>$mdl
			));
		}
		else
		{
			$this->redirect(array('site/login'));
		}
	}

	public function actiongetLeads()
	{
		// echo var_dump('anukuda'); exit;
		$html = ' 
			<table class="table table-striped table-hover table-bordered table-condensed" id="preview_leads">
				<thead>
					<tr>
						<th style="display:none;">Id</th>
						<th>CODE</th>
						<th>NAME</th>
						<th style="text-align:center">SELECT</th>
					</tr>
				</thead>
				<tbody>
		';
					// Code $sql ini berfungsi untuk menyambungkan data variabel dengan sql ( ala sql)
					$sql = 'SELECT leads_id, code, name FROM leads ';
					$sql .= 'WHERE leads_id NOT IN (SELECT leads_id FROM leadscontact WHERE contact_id = '.$_POST["contact_id"].') ';
					
					if($_POST["search_by"] != "" || $_POST["search_by"] != NULL)
					{
						if($_POST["search_by"] == "code")
							$sql .= 'AND code LIKE "%'.$_POST["search_value"].'%"';
						
						if($_POST["search_by"] == "name")
							$sql .= 'AND name LIKE "%'.$_POST["search_value"].'%"';
					}
					
					$sql .= ' ORDER BY code ASC ';
					
					$dataProvider = new CSqlDataProvider(
						$sql,array(
							'keyField' => 'leads_id',
							'pagination'=>array(
								'pageSize'=>'1000'
							),
						)
					);

					foreach($dataProvider->getData() as $i=>$ii)
					{
		$html .= '
							<tr class="setan">
								<td style="display:none;" id="leads_id">'.$ii['leads_id'].'</td>
								<td>'.$ii['code'].'</td>
								<td>'.$ii['name'].'</td>
								<td align="center">
									<input name=save type="button" class="btn btn-primary" value="add" onclick="save_leads(this)"/>
								</td>
							</tr>
		';
					}
		$html .= '
			</tbody>
		</table>
		';
		
		echo json_encode($html); 
		return;
	}
	
	public function actionaddLeadsContact()
	{
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			$model = new LeadsContact;
			$model->leads_id = $_POST["x"];
			$model->contact_id = $_POST["contact_id"];
			
			if($model->save())
			{
				// $model->full_name = Yii::app()->user->getState('fullName');
				$transaction->commit();
				echo json_encode('OK');
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
				}
				else
					$error = "Failed add Contact.";
				
				$transaction->rollback();
				echo json_encode($error);
			}
		}
		catch(Exception $ex)
		{
			$transaction->rollback();
			throw new CHttpException(400, $ex->getMessage());
		}
		return;
	}
	
	public function actionDeletedLeadsContact($id)
	{
		$model = LeadsContact::model()->findByAttributes(array('leads_contact_id'=>$id));
		$model->delete();
		
		$this->redirect(array('view', 'id'=>$model->contact_id));
	}
}
