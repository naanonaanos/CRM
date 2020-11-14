<?php
class LeadsController extends Controller
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
				'getContact', 'addLeadsContact', 'AddSource', 'DeletedSource', 'AddIndustry', 'DeletedIndustry', 'AddContact', 'DeletedContact', 'AddStatus', 'DeletedStatus', 'Finish',
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
	$model=Leads::model()->findByPk($id);

	if($model==null)
		throw new CHttpException(404, 'The requested page does not exist');

	return $model;
}

public function actionIndex()
{
	$model = new Leads('search');
	$model->unsetAttributes();

	if(isset($_GET['Leads']))
		$model->attributes=$_GET['Leads'];
	$this->render('index', array(
		'model'=>$model
	));
}

public function actionCreate()
{
	$model=new Leads;
	$model->code= Yii::app()->custom->setCounterNumber('Leads', 'code', 'LDS');

	
	if(isset($_POST['Leads']))
	{
		$model->attributes=$_POST['Leads'];
		$transaction=Yii::app()->db->beginTransaction();
		try
		{
			// Declare get Source name
			$source = Source::model()->findByAttributes(array('name'=>$_POST['Leads']["source_name"]));

			$model->source_id = $source->source_id;

			// Declare get Industry Name
			$industry = Industry::model()->findByAttributes(array('name'=>$_POST['Leads']["industry_name"]));

			$model->industry_id = $industry->industry_id;

			// Declare get Status Name

			// echo var_dump($_POST['Leads']["status_name"]);exit;
			// echo var_dump($model->status_name); exit;
			$status = Status::model()->findByAttributes(array('name'=>$_POST['Leads']["status_name"]));
			$model->status_id = $status->status_id;


			if($model->save())
			{
				$transaction->commit();
				$this->redirect(array('update', 'id'=>$model->leads_id));
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
	$leadscontact = LeadsContact::model()->findByAttributes(array('leads_id'=>$model->leads_id));

	$model->contact_name 	 = $leadscontact->contact->name;
	$model->contact_jobtitle = $leadscontact->contact->jobtitle;
	$model->contact_phone 	 = $leadscontact->contact->phone;
	$model->contact_email 	 = $leadscontact->contact->email;
	$model->contact_pic	  	 = $leadscontact->contact->pic;
	$model->contact_remarks  = $leadscontact->contact->remarks;

	if(isset($_POST['Leads']))
	{
		$transaction=Yii::app()->db->beginTransaction();
		try
		{
			$leadss = $_POST['Leads'];
			
			$source = Source::model()->findByAttributes(array('name'=>$leadss['source_name']));
			$industry = Industry::model()->findByAttributes(array('name'=>$leadss['industry_name']));
			$status = Status::model()->findByAttributes(array('name'=>$leadss['status_name']));
			
			$leads = Leads::model()->findByPk($leadss['leads_id']);
			$leads->name = $leadss['leads_name'];
			$leads->source_id = $source->source_id;
			$leads->industry_id = $industry->industry_id;
			$leads->status_id = $status->status_id;
			$leads->remarks = $leadss['remarks'];

			if($leads->save())
			{
				$transaction->commit();
				$this->redirect(array('index'));
			}
		}
		catch(Exception$ex)
		{
			$transaction->rollback();
			throw new Exception(404,$ex->getMessage());
			
		}
	}

	$this->render('update',array(
		'model'=>$model,
	));
}

public function actionDeleted($id)
{
	$model=Leads::model()->findByPk($id);
	$model->delete();

	$this->redirect(array('index', 'id'=>$model->leads_id));
}

public function actionView($id)
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


public function getContact()
{
	$html = ' 
			<table class="table table-striped table-hover table-bordered table-condensed" id="preview_contact">
				<thead>
					<tr>
						<th style="display:none;">Id</th>
						<th>CODE</th>
						<th>NAME</th>
						<th>PIC</th>
						<th style="text-align:center">SELECT</th>
					</tr>
				</thead>
				<tbody>
		';
					$sql = 'SELECT contact_id, code, name FROM contact ';
					$sql .= 'WHERE contact_id NOT IN (SELECT contact_id FROM leadscontact WHERE leads_id = '.$_POST["leads_id"].') ';
					
					if($_POST["search_by"] != "" || $_POST["search_by"] != NULL)
					{
						if($_POST["search_by"] == "code")
							$sql .= 'AND code LIKE "%'.$_POST["search_value"].'%"';
						
						if($_POST["search_by"] == "name")
							$sql .= 'AND name LIKE "%'.$_POST["search_value"].'%"';
					}
					
					$sql .= ' LEADS BY code ASC ';
					
					$dataProvider = new CSqlDataProvider(
						$sql,array(
							'keyField' => 'item_id',
							'pagination'=>array(
								'pageSize'=>'1000'
							),
						)
					);

					foreach($dataProvider->getData() as $i=>$ii)
					{
		$html .= '
							<tr>
								<td style="display:none;" id="contact_id">'.$ii['contact_id'].'</td>
								<td>'.$ii['code'].'</td>
								<td>'.$ii['name'].'</td>
								<td><input type="text" name="pic" id="pic'.$ii['contact_id'].'"></input></td>
								<td align="center">
									<input name=save type="button" class="btn btn-primary" value="add" onclick="save_item(this)"/>
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
			$model->contact_id = $_POST["x"];
			$model->leads_id = $_POST["leads_id"];
			$model->pic = $_POST["pic"];
			
			if($model->save())
			{
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

public function actionAddContact()
{
		$error = "";
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			// echo var_dump($_POST);exit;
			if($_POST["leads_id"] == "")
			{	
				$source = Source::model()->findByAttributes(array('name'=>$_POST["source_name"]));
				$industry=Industry::model()->findByAttributes(array('name'=>$_POST["industry_name"]));
				$status = Status::model()->findByAttributes(array('name'=>$_POST["status_name"]));
				// $users = Users::model()->findByAttributes(array('username'=>Yii::app()->user->getState('userName')));

				$leads 						= new Leads;
				$leads->code 				= Yii::app()->custom->setCounterNumber('Leads', 'code', 'LDS');
				$leads->name				= $_POST["leads_name"];
				$leads->source_id 			= $source->source_id;
				$leads->industry_id 		= $industry->industry_id;
				$leads->status_id 			= $status->status_id;
				$leads->remarks				= $_POST["leads_remarks"];
				$leads->full_name			= Yii::app()->user->getState('fullName');

				if($leads->save()) 
				{
					$contact 			 = new Contact;
					$contact->code 		 = Yii::app()->custom->setCounterNumber('Contact', 'code', 'CNT');
					$contact->name 		 = $_POST["contact_name"];
					$contact->jobtitle 	 = $_POST["contact_jobtitle"];
					$contact->phone 	 = $_POST["contact_phone"];
					$contact->email 	 = $_POST["contact_email"];
					$contact->pic 		 = $_POST["contact_pic"];
					$contact->remarks 	 = $_POST["contact_remarks"];
					$contact->full_name	 = Yii::app()->user->getState('fullName');

					if(!$contact->save())
					{
						$contact->validate();
						if(count($contact->getErrors()) > 0)
						{
							foreach($contact->getErrors() as $err)
							{
								for($x = 0; $x <= count($err)-1; $x++)
								{
									$error .= $err[$x];
								}
							}
							echo json_encode("error : ".$error);
						}
						else
							echo json_encode("error : FAILED CREATED LEADS");
					
						$transaction->rollback();
						return;
					}

					$leadscontact = new LeadsContact;
					$leadscontact->leads_id = $leads->leads_id;
					$leadscontact->contact_id = $contact->contact_id;

					if(!$leadscontact->save())
					{
						$leadscontact->validate();
						if(count($leadscontact->getErrors()) > 0)
						{
							foreach($leadscontact->getErrors() as $err)
							{
								for($x = 0; $x <= count($err)-1; $x++)
								{
									$error .= $err[$x];
								}
							}
							echo json_encode("error : ".$error);
						}
						else
							echo json_encode("error : FAILED CREATED LEADS CONTACT");
					
						$transaction->rollback();
						return;
					}

					$transaction->commit();
					echo json_encode("OK-".$leads->leads_id);
				}
				else
				{
					$leads->validate();
					if(count($leads->getErrors()) > 0)
					{
						foreach($leads->getErrors() as $err)
						{
							for($x = 0; $x <= count($err)-1; $x++)
							{
								$error .= $err[$x];
							}
						}
						echo json_encode("NOT-".$error);
					}
					else
						echo json_encode('NOT-FAILED CREATE LEADS');
					
					$transaction->rollback();
					return;
				}
			}
			else
			{
				$leads = Leads::model()->findByPk($_POST["leads_id"]);
				echo json_encode("OK-".$leads->leads_id);
			}
		}
		catch (Exception $ex)
		{
			$transaction->rollback();
			throw new CHttpException(500, $ex->getMessage());
		}
		return;
}


public function actionDeletedLeadsContact($id)
{
		$model = LeadsContact::model()->findByAttributes(array('leads_contact_id'=>$id));
		$model->delete();
		
		$this->redirect(array('view', 'id'=>$model->leads_id));
}

}