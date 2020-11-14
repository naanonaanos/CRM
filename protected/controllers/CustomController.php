<?php
	class CustomController extends Controller
	{

		public function actionSource()
		{
			$request = trim($_GET['term']);
			
			if($request != '')
			{
	            $models = Source::model()->findAll(
					array(
						'condition' => "t.name like '%".$request."%'"
					)
				);

				$suggest = array();
				if(count($models) == 0)
					$suggest = array('label' => "No result found");
				else
				{
					foreach($models as $model)
					{
						$suggest[] = array(
							'label' => $model->name,
							'value' => $model->name,
							'id'    => $model->source_id,
						);
					}
				}
				echo CJSON::encode($suggest);
			}
		}

		public function actionLeadsOpportunity()
		{
			$request = trim($_GET['term']);
			
			if($request != '')
			{
	            $models = Leads::model()->findAll(
					array(
						'condition' => "name like '%".$request."%'"
					)
				);

				$suggest = array();
				if(count($models) == 0)
					$suggest = array('label' => "No result found");
				else
				{
					foreach($models as $model)
					{
						$suggest[] = array(
							'label' => $model->name,
							'value' => $model->name,
							'id'    => $model->leads_id,
						);
					}
				}
				echo CJSON::encode($suggest);
			}
		}

		public function actionContactAccount()
		{
			$request = trim($_GET['term']);
			
			if($request != '')
			{
	            $models = Contact::model()->findAll(
					array(
						'condition' => "contact_name like '%".$request."%'"
					)
				);

				$suggest = array();
				if(count($models) == 0)
					$suggest = array('label' => "No result found");
				else
				{
					foreach($models as $model)
					{
						$suggest[] = array(
							'label' => $model->contact_name,
							'value' => $model->contact_name,
							'id'    => $model->contact_id,
						);
					}
				}
				echo CJSON::encode($suggest);
			}
		}

		public function actionOpportunityAccount()
		{
			$request = trim($_GET['term']);
			
			if($request != '')
			{
	            $models = Opportunity::model()->findAll(
					array(
						'condition' => "code like '%".$request."%'"
					)
				);

				$suggest = array();
				if(count($models) == 0)
					$suggest = array('label' => "No result found");
				else
				{
					foreach($models as $model)
					{
						$suggest[] = array(
							'label' => $model->code,
							'value' => $model->code,
							'id'    => $model->opportunity_id,
						);
					}
				}
				echo CJSON::encode($suggest);
			}
		}

		public function actionDestination()
		{
			$request = trim($_GET['term']);

			if($request != '')
			{
				$models = Destination::model()->findAll(
					array(
						'condition' => "province like '%".$request."%' OR city like '%".$request."%' OR subdistrict like '%".$request."%'"									
					)
				);

				$suggest=array();				
				if(count($models) == 0)
					$suggest = array('label' => "No result found");
				else
				{
					foreach($models as $model)
					{	
						$suggest[] = array(
							'label'       => $model->province." - ".$model->city."-".$model->subdistrict,
							'value'       => $model->code,
							'province'    => $model->province,
							'city'        => $model->city,
							'subdistrict' => $model->subdistrict,
							'id'          => $model->destination_id,
						);
					}
				}
				echo CJSON::encode($suggest);
			}
		}	
	}
?>