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
					'getContact', 'addLeadsContact', 'AddContact', 'DeleteDetail', 'DeletedLeadsContact', 'Finish',
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
		if(!Yii::app()->user->isGuest)
		{
			$model = new Leads('search');
			$model->unsetAttributes();

			if(isset($_GET['Leads']))
				$model->attributes=$_GET['Leads'];
			$this->render('index', array(
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
		else
		{
			$this->redirect(array('site/login'));
		}
	}

	public function actionUpdate($id)
	{
		if(!Yii::app()->user->isGuest)
		{
			// Get data contact agar terbaca saat update
			$model=$this->loadModel($id);
			// echo var_dump($model);exit;

			// Get data Contact buat update
			$leadscontact = LeadsContact::model()->findByAttributes(array('leads_id'=>$model->leads_id));

			$model->contact_name 	 = isset($leadscontact->contact)?$leadscontact->contact->contact_name:'';
			$model->contact_jobtitle = isset($leadscontact->contact)?$leadscontact->contact->contact_jobtitle:'';
			$model->contact_phone 	 = isset($leadscontact->contact)?$leadscontact->contact->contact_phone:'';
			$model->contact_email 	 = isset($leadscontact->contact)?$leadscontact->contact->contact_email:'';
			$model->contact_pic	  	 = isset($leadscontact->contact)?$leadscontact->contact->contact_pic:'';
			$model->contact_remarks  = isset($leadscontact->contact)?$leadscontact->contact->contact_remarks:'';

			// Get data Source buat update
			$model->source_name = isset($leadscontact->leads->source->name)?$leadscontact->leads->source->name:'';

			// Get data Industry buat update
			$model->industry_name = isset($leadscontact->leads->industry->name)?$leadscontact->leads->industry->name:'';

			// Get data Status buat update
			$model->status_name = isset($leadscontact->leads->status->name)?$leadscontact->leads->status->name:'';

			//echo var_dump($source_name);exit;

			if(isset($_POST['Leads']))
			{
				// Get data kolom-kolom leads agar terbaca saat update
				$transaction=Yii::app()->db->beginTransaction();
				$error = '';
				try
				{
					$leadss = $_POST['Leads'];
					// echo var_dump($model); exit;
					$source = Source::model()->findByAttributes(array('name'=>$leadss['source_name']));

					// echo var_dump($source);exit;
					$industry = Industry::model()->findByAttributes(array('name'=>$leadss['industry_name']));
					$status = Status::model()->findByAttributes(array('name'=>$leadss['status_name']));
					
					$leads = Leads::model()->findByPk($leadss['leads_id']);
					// echo var_dump($leadss['leads_id']); exit;
					$leads->name = $leadss['name'];
					$leads->source_id = $source->source_id;
					$leads->industry_id = $industry->industry_id;
					$leads->status_id = $status->status_id;
					$leads->remarks = $leadss['remarks'];

					if($leads->save())
					{
						$checkHistory = LeadsHistory::model()->findByAttributes(array(
							'leads_id'	=>$leads->leads_id,
							'status_id'	=>$status->status_id,
						));

						if(!$checkHistory)
						{
							$leadshistory 				= new LeadsHistory;
							$leadshistory->leads_id		= $leads->leads_id;
							$leadshistory->status_id	= $status->status_id;
							$leadshistory->remarks 		= $leadss['remarks'];
							$leadshistory->full_name	= Yii::app()->user->getState('fullName');

							if(!$leadshistory->save())
							{
								$leadshistory->validate();
								if(count($leadshistory->getErrors()) > 0)
								{
									foreach($leadshistory->getErrors() as $err)
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
						}
					}
					else
					{
						$error = "";
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
						}
						else
							$error = "Failed add Contact.";
						
						$transaction->rollback();
						echo json_encode($error);
					}
					$transaction->commit();
						$this->redirect(array('index'));
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
		else
		{
			$this->redirect(array('site/login'));
		}
	}

	public function actionDeleted($id)
	{
		$model=Leads::model()->findByPk($id);
		$model->delete();

		$this->redirect(array('index', 'id'=>$model->leads_id));
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
						$sql = 'SELECT contact_id, code, contact_name FROM contact ';
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
									<td>'.$ii['contact_name'].'</td>
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
		// echo var_dump('fwsqyf'); exit;
		$error = "";
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			// echo var_dump($_POST);exit;
			if($_POST["leads_id"] == "")
			{	
				$code 		= $_POST["code"];
				$checkLeads = Leads::model()->findByAttributes(array(
					'code'	=>$_POST["code"],
					'name'	=>$_POST["name"],
				));
				
				// Action add Leads
				$source 	= Source::model()->findByAttributes(array('name'=>$_POST["source_name"]));
				$industry 	= Industry::model()->findByAttributes(array('name'=>$_POST["industry_name"]));
				$status 	= Status::model()->findByAttributes(array('name'=>$_POST["status_name"]));

				if(!$checkLeads)
				{
					$leads 						= new Leads;
					$leads->code 				= $code;
					$leads->name				= $_POST["name"];
					$leads->source_id 			= $source->source_id;
					$leads->industry_id 		= $industry->industry_id;
					$leads->status_id 			= $status->status_id;
					$leads->remarks				= $_POST["leads_remarks"];
					$leads->full_name			= Yii::app()->user->getState('fullName');

					if($leads->save()) 
					{
						$contact 			 		 = new Contact;
						$contact->code 				 = Yii::app()->custom->setCounterNumber('Contact', 'code', 'CNT');
						$contact->contact_name 		 = $_POST["contact_name"];
						$contact->contact_jobtitle 	 = $_POST["contact_jobtitle"];
						$contact->contact_phone 	 = $_POST["contact_phone"];
						$contact->contact_email 	 = $_POST["contact_email"];
						$contact->contact_pic 		 = $_POST["contact_pic"];
						$contact->contact_remarks 	 = $_POST["contact_remarks"];
						$contact->full_name	 		 = Yii::app()->user->getState('fullName');

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

						$leadshistory 				= new LeadsHistory;
						$leadshistory->leads_id		= $leads->leads_id;
						$leadshistory->status_id	= $status->status_id;
						$leadshistory->remarks 		= $leads->remarks;
						$leadshistory->full_name	= Yii::app()->user->getState('fullName');

						if(!$leadshistory->save())
						{
							$leadshistory->validate();
							if(count($leadshistory->getErrors()) > 0)
							{
								foreach($leadshistory->getErrors() as $err)
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
					// echo var_dump($checkLeads); exit;
					$contacts 			 		 = new Contact;
					$contacts->code 			 = Yii::app()->custom->setCounterNumber('Contact', 'code', 'CNT');
					$contacts->contact_name 	 = $_POST["contact_name"];
					$contacts->contact_jobtitle  = $_POST["contact_jobtitle"];
					$contacts->contact_phone 	 = $_POST["contact_phone"];
					$contacts->contact_email 	 = $_POST["contact_email"];
					$contacts->contact_pic 		 = $_POST["contact_pic"];
					$contacts->contact_remarks 	 = $_POST["contact_remarks"];
					$contacts->full_name	 	 = Yii::app()->user->getState('fullName');

					if($contacts->save())
					{
						$leadscontact = new LeadsContact;
						$leadscontact->leads_id = $checkLeads->leads_id;
						$leadscontact->contact_id = $contacts->contact_id;

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
								echo json_encode("error : FAILED CREATED LEADS");
						
							$transaction->rollback();
							return;
						}
					}
					else
					{
						$contacts->validate();
						if(count($contacts->getErrors()) > 0)
						{
							foreach($contacts->getErrors() as $err)
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
				}
					$transaction->commit();
					echo json_encode("OK-".$leadscontact->leads_contact_id);
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

	public function actionDeleteDetail()
		{
			$error = "";
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				$key_id = $_POST["key_id"];
				if($key_id != NULL || $key_id != "")
				{
					$model = LeadsContact::model()->findByPk($key_id);	
					if($model)
					{
						$contact = Contact::model()->findByPk($model->contact_id);
						// Istilahnya dari atas sini sudah menjalankan penghapusan si LeadsContact ( contact ) & si Contact
					

						if(!$model->delete())
						{
							// Jika gagal menghapus delete Leads Contact
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
								echo json_encode('NOT-'.$error);
							}
							else
								echo json_encode('NOT-FAILED DELETE LEADSCONTACT');
							
							$transaction->rollback();
							return;
						}
						else
						{
							// Kalau sudah berhasil menghapus LeadsContact ( Contact ) mulailah memproses ke bawah ini ( bagian si Contact )
							if(!$contact->delete())
							{		
								// Jika gagal menghapus Contact 
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
									echo json_encode("NOT-".$error);
								}
								else
									echo json_encode('NOT-FAILED DELETE CONTACT');
								
								$transaction->rollback();
								return;
							}
						}
						// Bila sudah berhasil semua menghapus contact dari contact_id & leadscontact maka menjalankan commit
						$transaction->commit();	
						echo json_encode('OK-CONTACT SUCCESS DELETE');
					}
				}
				else
					// ini buat if yg paling atas ( Key id null)
					echo json_encode("NOT-KEY ID IS NULL");
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
			//  Untuk menghapus 2 models. LeadsContact & Contact di views
			$model = LeadsContact::model()->findByAttributes(array('leads_contact_id'=>$id));
			$contact = Contact::model()->findByAttributes(array('contact_id'=>$model->contact_id));
			// echo var_dump($contact); exit;
			// $model->delete();
			if($model->delete())
			{
				$contact->delete();
			}
			else
			{
				echo json_encode("NOT-SUCCESS DELETE CONTACT");
			}
			$this->redirect(array('view', 'id'=>$model->leads_id));
	}
}