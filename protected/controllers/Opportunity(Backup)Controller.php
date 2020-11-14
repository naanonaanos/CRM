<?php
class OpportunityController extends Controller
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
					'AddLocation', 'AddChargeActivity', 'AcceptAddsOn', 'DeleteDetailLocation', 'DeleteDetailChargeActivity', 'DeleteDetailAddsOn', 'AcceptSD', 'Approved', 'SendToClient', 'Negotiation'
				),
				'users'=>array('@')
			),
			array('deny',
				'users'=>array('*')
			),
		);
	}

	public function loadModel($id)
	{
		$model = Opportunity::model()->findByPk($id);

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist');
		return $model;
	}

	public function actionIndex()
	{
		$model = new Opportunity('search');
		$model->unsetAttributes();

		if(isset($_GET['Opportunity']))
			$model->attributes = $_GET['Opportunity'];

		$this->render('index' ,array(
			'model'=>$model
		));
	}

	public function actionCreate()
	{
		$model 						= new Opportunity;
		$model->code 				= Yii::app()->custom->setCounterNumber('Opportunity', 'code', 'OPT');
		$locationoppurtunity		= new OpportunityLocation;
		$addsonoppurtunity			= new OpportunityAddsOn;
		$chargeactivityoppurtunity	= new OpportunityChargeActivity;
		
		if(isset($_POST['Opportunity']))
		{
				
			$model->attributes = $_POST['Opportunity'];
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				// Declare get Status name
				$status = Status::model()->findByAttributes(array('name'=>$_POST['Opportunity']["status_name"]));
				$model->status_id = $status->status_id;

				// Declare get Leads Name
				$leads = Leads::model()->findByAttributes(array('name'=>$_POST['Opportunity']["name"]));
				$model->leads_id = $leads->leads_id;

				// // Declare get Location
				// $location = Location::model()->findByAttributes(array('name'=>$_POST['Opportunity']["location_name"]));
				// $model->location_id	= $location->location_id;
				$model->full_name	= Yii::app()->user->getState('fullName');
				// echo var_dump($model->aov_client);exit;

				// $model->validate();
				// echo var_dump($model->getErrors());exit;
				if($model->save())
				{	
					// echo var_dump($model);exit;

					$checksHistory 			= OpportunityHistory::model()->findByAttributes(array(
						'opportunity_id'	=>$model->opportunity_id,
						'status_id'			=>$status->status_id,
					));

					if(!$checksHistory)
					{
						$opportunityhistory 					= new OpportunityHistory;
						$opportunityhistory ->opportunity_id 	= $model->opportunity_id;
						$opportunityhistory ->status_id			= $status->status_id;
						$opportunityhistory ->remarks 			= $model['remarks_negotiation'];
						$opportunityhistory ->full_name			= Yii::app()->user->getState('fullName');

						if(!$opportunityhistory->save())
						{
							$opportunityhistory->validate();
							if(count($opportunityhistory->getErrors()) > 0)
							{
								foreach($opportunityhistory->getErrors() as $err)
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
						$error = "Failed add Opportunity.";
					$transaction->rollback();
					echo json_encode($error);
				}
				$transaction->commit();
					$this->redirect(array('Index'));
			}
			catch(Exception $ex)
			{
				$transaction->rollback();
				throw new CHttpException(400,$ex->getMessage());
			}
		}
		$this->render('create',array(
			'model'=>$model,
			'addsonoppurtunity'=>$addsonoppurtunity,
			'chargeactivityoppurtunity'=>$chargeactivityoppurtunity,
			'locationoppurtunity'=>$locationoppurtunity,
			// 'addsonopportunity'=>$addsonopportunity,
		));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Get data preview location buat update
		$locationoppurtunity 		= OpportunityLocation::model()->findAll(array(
			'condition'=>'opportunity_id ='.$model->opportunity_id));

		// Get data preview charge activity buat update
		$chargeactivityoppurtunity	= OpportunityChargeActivity::model()->findAll(array(
			'condition'=>'opportunity_id ='.$model->opportunity_id));

		// Get data preview adds on buat update
		$addsonoppurtunity 			= OpportunityAddsOn::model()->findAll(array(
			'condition'=>'opportunity_id ='.$model->opportunity_id));

		// Get data status buat update
		$model->status_name = $model->status->name;

		if(isset($_POST['Opportunity']))
		{
			// $model->attributes = $_POST['Opportunity'];
			$transaction = Yii::app()->db->beginTransaction();
			$error 	=	'';
			try
			{
				$opportunityy = $_POST['Opportunity'];
				$status = Status::model()->findByAttributes(array('name'=>$opportunityy['status_name']));

				$opportunity = Opportunity::model()->findByPk($opportunityy['opportunity_id']);
				$opportunity->status_id = $status->status_id;

				if($opportunity->save())
				{
					$checkHistory 			= OpportunityHistory::model()->findByAttributes(array(
						'opportunity_id'	=>$opportunity->opportunity_id,
						'status_id'			=>$status->status_id,
					));

					if(!$checkHistory)
					{
						$opportunityhistory 					= new OpportunityHistory;
						$opportunityhistory ->opportunity_id 	= $opportunity->opportunity_id;
						$opportunityhistory ->status_id			= $status->status_id;
						$opportunityhistory ->remarks 			= $opportunityy['remarks_negotiation'];
						$opportunityhistory ->full_name			= Yii::app()->user->getState('fullName');

						if(!$opportunityhistory->save())
						{
							$opportunityhistory->validate();
							if(count($opportunityhistory->getErrors()) > 0)
							{
								foreach($opportunityhistory->getErrors() as $err)
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
					$opportunity->validate();
					if(count($opportunity->getErrors()) > 0)
					{
						foreach($opportunity->getErrors() as $err)
						{
							for($x = 0; $x <= count($err)-1; $x++)
							{
								$error .= $err[$x];
							}
						}
					}
					else
						$error = "Failed add Opportunity.";
					$transaction->rollback();
					echo json_encode($error);
				}
				$transaction->commit();
					$this->redirect(array('index'));
			} 
			catch(Exception $ex)
			{
				$transaction->rollback();
				throw new CHttpException(400,$ex->getMessage());
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'locationoppurtunity'=>$locationoppurtunity,
			'chargeactivityoppurtunity'=>$chargeactivityoppurtunity,
			'addsonoppurtunity'=>$addsonoppurtunity
		));
	}

	public function actionDeleted($id)
	{
		$model = Opportunity::model()->findByPk($id);
		$model->delete();

		$this->redirect(array('index', 'id'=>$model->opportunity_id));
	}

	public function actionView($id)
	{
		$mdl = new Opportunity;
		if(isset($_POST['Opportunity']))
		{
			$mdl->attributes = $_POST['Opportunity'];
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

	public function actionAddLocation()
	{
		$error = "";
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			if($_POST["opportunity_id"] != "")
			{	
				// echo var_dump($_POST);exit;
				$opportunity 	=	Opportunity::model()->findByAttributes(array('opportunity_id'=>$_POST["opportunity_id"]));

				$location 		=	Location::model()->findByAttributes(array('name'=>$_POST["location_id"]));
				// echo var_dump($location);exit;

				$opportunitylocation					=	new OpportunityLocation;
				$opportunitylocation->opportunity_id 	=	$opportunity->opportunity_id;
				$opportunitylocation->location_id 		=	$location->location_id;

				if($opportunitylocation->save())
				{
					echo json_encode("OK-".$opportunitylocation->opportunity_location_id);
					$transaction->commit();
					return;
				}
				else
				{
					$opportunitylocation->validate();
						if(count($opportunitylocation->getErrors()) > 0)
						{
							foreach($opportunitylocation->getErrors() as $err)
							{
								for($x = 0; $x <= count($err)-1; $x++)
								{
									$error .= $err[$x];
								}
							}
							echo json_encode("error : ".$error);
						}
						else
							echo json_encode("error : FAILED ADD LOCATION");
					
						$transaction->rollback();
						return;
					}
				}
				else
					echo json_encode('NOT-OPPORTUNITY ID');
			}
		catch (Exception $ex)
		{
			$transaction->rollback();
			throw new CHttpException(500, $ex->getMessage());
		}
		return;
	}

	public function actionDeleteDetailLocation()
	{

		$error = "";
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				$key_id = $_POST["key_id"];

				if($key_id != NULL || $key_id != "")
				{
					$model = OpportunityLocation::model()->findByPk($key_id);
					// echo var_dump($model);exit;	
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
								echo json_encode('NOT-FAILED DELETE OPPORTUNITYLOCATION');
							
							$transaction->rollback();
							return;
						}
						// Bila sudah berhasil semua menghapus contact dari contact_id & leadscontact maka menjalankan commit
						$transaction->commit();	
						echo json_encode('OK-LOCATION SUCCESS DELETE');		
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

	public function actionAddChargeActivity()
	{
		
		$error = "";
		$transaction = Yii::app()->db->beginTransaction();
		try
		{	
			if($_POST["opportunity_id"] != "")
			{				
				$opportunity 	=	Opportunity::model()->findByAttributes(array('opportunity_id'=>$_POST["opportunity_id"]));

				$opportunitychargeactivity								=	new OpportunityChargeActivity;
				$opportunitychargeactivity->opportunity_id 				=	$opportunity->opportunity_id;
				$opportunitychargeactivity->size 						=	$_POST["size"];
				$opportunitychargeactivity->product_description 		=	$_POST["product_description"];
				$opportunitychargeactivity->vam_inbound					=	$_POST["vam_inbound"];
				$opportunitychargeactivity->uom_inbound					=	$_POST["uom_inbound"];
				$opportunitychargeactivity->rate_idr_inbound			=	$_POST["rate_idr_inbound"];
				$opportunitychargeactivity->revenue_sharing_inbound		=	$_POST["revenue_sharing_inbound"];
				$opportunitychargeactivity->remarks_inbound				=	$_POST["remarks_inbound"];
				$opportunitychargeactivity->vam_outbound				=	$_POST["vam_outbound"];
				$opportunitychargeactivity->uom_outbound				=	$_POST["uom_outbound"];
				$opportunitychargeactivity->rate_idr_outbound			=	$_POST["rate_idr_outbound"];
				$opportunitychargeactivity->revenue_sharing_outbound	=	$_POST["revenue_sharing_outbound"];
				$opportunitychargeactivity->remarks_outbound			=	$_POST["remarks_outbound"];
				$opportunitychargeactivity->vam_storage					=	$_POST["vam_storage"];
				$opportunitychargeactivity->uom_storage					=	$_POST["uom_storage"];
				$opportunitychargeactivity->rate_idr_storage			=	$_POST["rate_idr_storage"];
				$opportunitychargeactivity->revenue_sharing_storage		=	$_POST["revenue_sharing_storage"];
				$opportunitychargeactivity->remarks_storage				=	$_POST["remarks_storage"];
				$opportunitychargeactivity->aipo_charge					=	$_POST["aipo_charge"];
				$opportunitychargeactivity->appi_charge					=	$_POST["appi_charge"];

				if($opportunitychargeactivity->save())
				{
					// echo var_dump($opportunitychargeactivity->opportunity_charge_activity_id);exit;
					echo json_encode("OK-".$opportunitychargeactivity->opportunity_charge_activity_id);
					$transaction->commit();
					return;
				}
				else
				{
					$opportunitychargeactivity->validate();
					if(count($opportunitychargeactivity->getErrors()) > 0)
					{
						foreach($opportunitychargeactivity->getErrors() as $err)
						{
							for($x = 0; $x <= count($err)-1; $x++)
							{
								$error .= $err[$x];
							}
						}
						echo json_encode("error : ".$error);
					}
					else
						echo json_encode("error : FAILED CREATE CHARGE");
				
					$transaction->rollback();
					return;
				}
			}
			else
				echo json_encode('NOT-OPPORTUNITY ID');
		}	
		catch (Exception $ex)
		{
			$transaction->rollback();
			throw new CHttpException(500, $ex->getMessage());
		}
		return;
	}

	public function actionDeleteDetailChargeActivity()
	{

		$error = "";
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				// echo var_dump($_POST);exit;
				$key_id = $_POST["key_id"];

				if($key_id != NULL || $key_id != "")
				{
					$model = OpportunityChargeActivity::model()->findByPk($key_id);
				
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
							echo json_encode('NOT-FAILED DELETE OPPORTUNITYLOCATION');
						
						$transaction->rollback();
						return;
					}
					// Bila sudah berhasil semua menghapus contact dari contact_id & leadscontact maka menjalankan commit
					$transaction->commit();	
					echo json_encode('OK-LOCATION SUCCESS DELETE');
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

	public function actionAcceptAddsOn()
	{
		$error = "";
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			if($_POST["opportunity_id"] != "")
			{	
				// Action add Charge Activity
				$opportunity 						=	Opportunity::model()->findByAttributes(array('opportunity_id'=>$_POST["opportunity_id"]));

				$opportunityaddson					=	new OpportunityAddsOn;
				$opportunityaddson->opportunity_id 	=	$opportunity->opportunity_id;
				$opportunityaddson->adds_on 		=	$_POST["adds_on"];
				$opportunityaddson->remarks_adds_on	=	$_POST["remarks_adds_on"];

				if($opportunityaddson->save())
				{
					echo json_encode("OK-".$opportunityaddson->opportunity_adds_on_id);
					$transaction->commit();
					return;
				}
				else
				{
					$opportunityaddson->validate();
						if(count($opportunityadds->getErrors()) > 0)
						{
							foreach($opportunityadds->getErrors() as $err)
							{
								for($x = 0; $x <= count($err)-1; $x++)
								{
									$error .= $err[$x];
								}
							}
							echo json_encode("error : ".$error);
						}
						else
							echo json_encode("error : FAILED CREATE ADDS ON");
					
						$transaction->rollback();
						return;
				}
			}
			else
				echo json_encode('NOT-OPPORTUNITY ID');
		}
		catch (Exception $ex)
		{
			$transaction->rollback();
			throw new CHttpException(500, $ex->getMessage());
		}
		return;
	}

	public function actionDeleteDetailAddsOn()
	{
		$error = "";
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				$key_id = $_POST["key_id"];
				// echo var_dump($_POST["key_id"]);

				if($key_id != NULL || $key_id != "")
				{
					$model = OpportunityAddsOn::model()->findByPk($key_id);
					// echo var_dump($model);exit;	
						
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
								echo json_encode('NOT-FAILED DELETE OPPORTUNITYLOCATION');
							
							$transaction->rollback();
							return;
						}
						$transaction->commit();	
						echo json_encode('OK-LOCATION SUCCESS DELETE');
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

	public function actionAcceptSD()
	{
		$error = "";
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			$model = Opportunity::model()->findByPk($_POST["opportunity_id"]);
			if($model)
			{
				$acceptsd = Status::model()->findByAttributes(array('code'=>'quotation_stage_updated_bySD1'));

				$checkDetail = OpportunityDetail::model()->findAll(array(
					'condition'=>'opportunity_id ='.$model->opportunity_id.' and status_id ='.$acceptsd->status_id
				));

				// $status = Status::model()->findByAttributes(array('status_id'=>$checkDetail->status_id));
				echo var_dump($checkDetail);exit;

				if($checkDetail)
				{
					echo json_encode('NOT-STATUS OPPORTUNITY'.$status->name);
					return;
				}
				else
				{
					$opportunitydetail = new OpportunityDetail;
					$opportunitydetail->opportunity_id = $model->opportunity_id;
					$opportunitydetail->status_id = $acceptsd->status_id;
					$opportunitydetail->remarks = $model['remarks_feedback'];

					if(!$opportunitydetail->save())
					{
						// Jika gagal menghapus delete Leads Contact
						$opportunitydetail->validate();
						if(count($opportunitydetail->getErrors()) > 0)
						{
							foreach($opportunitydetail->getErrors() as $err)
							{
								for($x = 0; $x <= count($err)-1; $x++)
								{
									$error .= $err[$x];
								}
							}
							echo json_encode('NOT-'.$error);
						}
						else
							echo json_encode('NOT-FAILED DELETE OPPORTUNITYDETAIL');
						
						$transaction->rollback();
						return;
					}
					$transaction->commit();	
					echo json_encode('OK-SUCCESS OPPORTUNITY DETAIL');
				}
			}
		}
		catch (Exception $ex)
		{
			$transaction->rollback();
			throw new CHttpException(500, $ex->getMessage());
		}
		return;
	}

	public function actionApprove()
	{
		$error = "";
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			$model = Opportunity::model()->findByPk($_POST["opportunity_id"]);
			if($model)
			{
				$approve = Status::model()->findByAttributes(array('code'=>'quotation_stage_approved_1'));

				$checkDetail = OpportunityDetail::model()->findByAttributes(array('opportunity_id'=>$model->opportunity_id));

				if($checkDetail)
				{
					$checkDetail->status_id = $approve->status_id;
					$checkDetail->remarks = $model['remarks_feedback'];

					if(!$checkDetail->save())
					{
						// Jika gagal menghapus delete Leads Contact
						$checkDetail->validate();
						if(count($checkDetail->getErrors()) > 0)
						{
							foreach($checkDetail->getErrors() as $err)
							{
								for($x = 0; $x <= count($err)-1; $x++)
								{
									$error .= $err[$x];
								}
							}
							echo json_encode('NOT-'.$error);
						}
						else
							echo json_encode('NOT-FAILED DELETE OPPORTUNITYDETAIL');
						
						$transaction->rollback();
						return;
					}
					$transaction->commit();	
					echo json_encode('OK-SUCCESS OPPORTUNITY DETAIL');
				}
				else
				{
					echo json_encode('NOT-Status Opportunity not Update By SD-1 ');
					$transaction->rollback();
					return;
				}
			}
		}
		catch (Exception $ex)
		{
			$transaction->rollback();
			throw new CHttpException(500, $ex->getMessage());
		}
		return;
	}

	public function actionSendToClient()
	{
		$error = "";
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			$model = Opportunity::model()->findByPk($_POST["opportunity_id"]);
			if($model)
			{
				$sendtoclient = Status::model()->findByAttributes(array('code'=>'quotation_stage_sendtoclient_1'));

				$opportunitydetail = new OpportunityDetail;
				$opportunitydetail->opportunity_id = $model->opportunity_id;
				$opportunitydetail->status_id = $sendtoclient->status_id;
				$opportunitydetail->remarks = $model['remarks_feedback'];

				if(!$opportunitydetail->save())
				{
					// Jika gagal menghapus delete Leads Contact
					$opportunitydetail->validate();
					if(count($opportunitydetail->getErrors()) > 0)
					{
						foreach($opportunitydetail->getErrors() as $err)
						{
							for($x = 0; $x <= count($err)-1; $x++)
							{
								$error .= $err[$x];
							}
						}
						echo json_encode('NOT-'.$error);
					}
					else
						echo json_encode('NOT-FAILED DELETE OPPORTUNITYDETAIL');
					
					$transaction->rollback();
					return;
				}
				$transaction->commit();	
				echo json_encode('OK-SUCCESS OPPORTUNITY DETAIL');
			}
		}
		catch (Exception $ex)
		{
			$transaction->rollback();
			throw new CHttpException(500, $ex->getMessage());
		}
		return;
	}

	public function actionNegotiation()
	{
		$error = "";
		$transaction = Yii::app()->db->beginTransaction();
		try
		{
			$model = Opportunity::model()->findByPk($_POST["opportunity_id"]);
			if($model)
			{
				$negotiation = Status::model()->findByAttributes(array('code'=>'quotation_stage_negotiation_1'));

				$opportunitydetail = new OpportunityDetail;
				$opportunitydetail->opportunity_id = $model->opportunity_id;
				$opportunitydetail->status_id = $negotiation->status_id;
				$opportunitydetail->remarks = $model['remarks_feedback'];

				if(!$opportunitydetail->save())
				{
					// Jika gagal menghapus delete Leads Contact
					$opportunitydetail->validate();
					if(count($opportunitydetail->getErrors()) > 0)
					{
						foreach($opportunitydetail->getErrors() as $err)
						{
							for($x = 0; $x <= count($err)-1; $x++)
							{
								$error .= $err[$x];
							}
						}
						echo json_encode('NOT-'.$error);
					}
					else
						echo json_encode('NOT-FAILED DELETE OPPORTUNITYDETAIL');
					
					$transaction->rollback();
					return;
				}
				$transaction->commit();	
				echo json_encode('OK-SUCCESS OPPORTUNITY DETAIL');
			}
		}
		catch (Exception $ex)
		{
			$transaction->rollback();
			throw new CHttpException(500, $ex->getMessage());
		}
		return;
	}
}
