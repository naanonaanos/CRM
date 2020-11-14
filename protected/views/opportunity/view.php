<?php
$this->breadcrumbs = array(
	'opportunity'=>array('index'),
	'View',
);?>
<!-- Action Button -->
<div class="title_left">
    <h3>Action Button Opportunity</h3>
    <?php echo CHtml::Button('Back to the list', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Opportunity/Index"'));?>
    <?php echo CHtml::Button('Update this opportunity', array('class'=>'btn btn-round btn-dark', 'onclick'=> 'js:document.location.href="index.php?r=opportunity/update&id='.$model->opportunity_id.'"'));?>
    <?php echo CHtml::Button('Print this invoice opportunity', array('class'=>'btn btn-round btn-dark', 'onclick'=> 'js:document.location.href="index.php?r=opportunity/invoice&id='.$model->opportunity_id.'"'));?>
</div>

<br/>

<div class="x_panel">
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_title">
				<h2> <i class="fa fa-star"></i>&nbsp;OPPORTUNITY INFORMATION</h2>
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						array(
							'label'=>'Opportunity Name', 
							'value'=>$model->opportunity_name
						),
						array(
							'label'=>'Opportunity Code', 
							'value'=>$model->code
						),
						array(
							'label'=>'Parent Type', 
							'value'=>$model->parent_type
						),
						array(
							'label'=>'Margin', 
							'value'=>$model->margin
						),
						array(
							'label'=>'Opportunity Owner', 
							'value'=>$model->full_name
						),
						array(
							'label'=>'Negotiation Note', 
							'value'=>$model->remarks_negotiation
						),
						array(
							'label'=>'Feedback SD', 
							'value'=>$model->remarks_feedback
						),
						array(
							'label'=>'Client Name', 
							'value'=>$model->leads->name
						),
						array(
							'label'=>'Product Category', 
							'value'=>$model->product_category
						),
						array(
							'label'=>'General Product Description', 
							'value'=>$model->general_product_description
						),
						array(
							'label'=>'Monthly GMV', 
							'value'=>$model->monthly_gmv_client
						),
						array(
							'label'=>'AOV ( Average Order Value )', 
							'value'=>$model->aov_client
						),
						array(
							'label'=>'APPI ( Average Price Per Item', 
							'value'=>$model->appi_client
						),
						array(
							'label'=>'Monthly Sales Order', 
							'value'=>$model->mso_client
						),
						array(
							'label'=>'AIPO ( Average Item Per Order )', 
							'value'=>$model->aipo_client
						),
						array(
							'label'=>'Monthly Sales Order', 
							'value'=>$model->mso_client
						),
						array(
							'label'=>'AIPO ( Average Item Per Order )', 
							'value'=>$model->aipo_client
						),
						array(
							'label'=>'Monthly Item Sold Volume', 
							'value'=>$model->misv_client
						),
						array(
							'label'=>'First Mile Delivery', 
							'value'=>$model->remarks_fmd
						),
						array(
							'label'=>'Last Mile Delivery', 
							'value'=>$model->remarks_lmd
						),

						// array(
						// 	'label'=>'Remark SD', 
						// 	'value'=>$model->remarks_feedback
						// ),
						// array(
						// 	'label'=>'Modified By', 
						// 	'value'=>$model->created_date
						// ),
					),
				)); ?>
				<br/>
			</div>
			<!-- Action Button Nego 1 -->
			<div class="col-md-12 col-sm-12">
				<div class="col-sm-2">
					<?php if(Yii::app()->user->getState('groupName') == 'sd'):?>

					<?php 
						echo CHtml::Button('Accept SD', array('class'=>'btn btn-success', 'hidden'=>$model->status_detail == NULL ? '' : 'hidden', 'name'=>'acceptsd','id'=>'acceptsd')); endif;
					?>

					<?php if(Yii::app()->user->getState('groupName') == 'development'):?>

					<?php 
						echo CHtml::Button('Accept SD', array('class'=>'btn btn-success', 'disabled'=>$model->status_detail == NULL ? '' : 'disabled', 'name'=>'acceptsd','id'=>'acceptsd')); endif;
					?>
				</div>

				<div class="col-sm-2">
					<?php if(Yii::app()->user->getState('groupName') == 'gm'): ?>

					<?php 
						echo CHtml::Button('Approve', array('class'=>'btn btn-info', 'hidden'=>$model->status_detail == '14'? '' : 'hidden', 'name'=>'approve','id'=>'approve')); 
						endif;
					?>

					<?php if(Yii::app()->user->getState('groupName') == 'development'): ?>
					<?php
						echo CHtml::Button('Approve', array('class'=>'btn btn-info', 'disabled'=>$model->status_detail == '14'? '' : 'disabled', 'name'=>'approve','id'=>'approve')); 
						endif;
					?>
				</div>

				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'am'|| 
							Yii::app()->user->getState('groupName') == 'bd'
						):
					?>
					<?php 
						echo CHtml::Button('Send To Client', array('class'=>'btn btn-primary','hidden'=>$model->status_detail == '15'? '' : 'hidden', 'name'=>'sendtoclient','id'=>'sendtoclient')); 
						endif; 
					?>

					<?php if(Yii::app()->user->getState('groupName') == 'development'): ?>

					<?php 
						echo CHtml::Button('Send To Client', array('class'=>'btn btn-primary','disabled'=>$model->status_detail == '15'? '' : 'disabled', 'name'=>'sendtoclient','id'=>'sendtoclient')); 
						endif; 
					?>
				</div>

				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'am'|| 
							Yii::app()->user->getState('groupName') == 'bd'
						):
					?>
	            	<?php
	            		echo CHtml::Button('Negotiation', array('class'=>'btn btn-warning', 'hidden'=>$model->status_detail == '16'? '' : 'hidden', 'name'=>'negotiation','id'=>'negotiation')); endif; 
	            	?>

	            	<?php if(Yii::app()->user->getState('groupName') == 'development'): ?>

	            	<?php
	            		echo CHtml::Button('Negotiation', array('class'=>'btn btn-warning', 'disabled'=>$model->status_detail == '16'? '' : 'disabled', 'name'=>'negotiation','id'=>'negotiation')); endif; 
	            	?>
				</div>
			</div>

			<!-- Action Button Nego 2 -->
			<div class="col-md-12 col-sm-12">
				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'sd'
						):
					?>
					<?php 
						echo CHtml::Button('Second Accept SD', array('class'=>'btn btn-success', 'hidden'=>$model->status_detail == '17'? '' : 'hidden', 'name'=>'secodacceptsd','id'=>'secondacceptsd'));
						endif; 
					?>

					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						):
					?>
					<?php 
						echo CHtml::Button('Second Accept SD', array('class'=>'btn btn-success', 'disabled'=>$model->status_detail == '17'? '' : 'disabled', 'name'=>'secodacceptsd','id'=>'secondacceptsd'));
						endif; 
					?>
				</div>

				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'gm'
						):
					?>
					<?php
						echo CHtml::Button('Second Approve', array('class'=>'btn btn-info', 'hidden'=>$model->status_detail == '18'? '' : 'hidden', 'name'=>'secondapprove','id'=>'secondapprove'));
						endif;
					?>

					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						):
					?>
					<?php
						echo CHtml::Button('Second Approve', array('class'=>'btn btn-info', 'disabled'=>$model->status_detail == '18'? '' : 'disabled', 'name'=>'secondapprove','id'=>'secondapprove'));
						endif;
					?>
				</div>

				<div class="col-sm-3">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'am'|| 
							Yii::app()->user->getState('groupName') == 'bd'
						): 
					?>
					<?php
						echo CHtml::Button('Second Send To Client', array('class'=>'btn btn-primary', 'hidden'=>$model->status_detail == '19'? '' : 'hidden', 'name'=>'secondsendtoclient','id'=>'secondsendtoclient'));
						endif;
					?>

					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						): 
					?>
					<?php
						echo CHtml::Button('Second Send To Client', array('class'=>'btn btn-primary', 'disabled'=>$model->status_detail == '19'? '' : 'disabled', 'name'=>'secondsendtoclient','id'=>'secondsendtoclient'));
						endif;
					?>
				</div>

				<div class="col-sm-3">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'am'|| 
							Yii::app()->user->getState('groupName') == 'bd'
						):
					?>
            		<?php
            			echo CHtml::Button('Second Negotiation', array('class'=>'btn btn-warning', 'hidden'=>$model->status_detail == '20'? '' : 'hidden', 'name'=>'secondnegotiation','id'=>'secondnegotiation')); 
            			endif;
            		?>

            		<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development' 
						):
					?>
            		<?php
            			echo CHtml::Button('Second Negotiation', array('class'=>'btn btn-warning', 'disabled'=>$model->status_detail == '20'? '' : 'disabled', 'name'=>'secondnegotiation','id'=>'secondnegotiation')); 
            			endif;
            		?>
            	</div>
			</div>

			<!-- Action Button Nego 3 -->
			<div class="col-md-12 col-sm-12">
				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'sd'
						):
					?>
					<?php 
						echo CHtml::Button('Thrid Accept SD', array('class'=>'btn btn-success', 'hidden'=>$model->status_detail == '29'? '' : 'hidden', 'name'=>'lastacceptsd','id'=>'lastacceptsd'));
						endif; 
					?>

					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						):
					?>
					<?php 
						echo CHtml::Button('Third Accept SD', array('class'=>'btn btn-success', 'disabled'=>$model->status_detail == '29'? '' : 'disabled', 'name'=>'lastacceptsd','id'=>'lastacceptsd'));
						endif; 
					?>
				</div>

				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'gm'
						): 
					?>
					<?php 
						echo CHtml::Button('Third Approve', array('class'=>'btn btn-info', 'hidden'=>$model->status_detail == '30'? '' : 'hidden', 'name'=>'lastapprove','id'=>'lastapprove'));endif; 
					?>

					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						): 
					?>
					<?php 
						echo CHtml::Button('Third Approve', array('class'=>'btn btn-info', 'disabled'=>$model->status_detail == '30'? '' : 'disabled', 'name'=>'lastapprove','id'=>'lastapprove'));endif; 
					?>
				</div>

				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'am'
						):
					?>
					<?php 
						echo CHtml::Button('Third Send To Client', array('class'=>'btn btn-primary', 'hidden'=>$model->status_detail == '31'? '' : 'hidden', 'name'=>'lastsendtoclient','id'=>'lastsendtoclient')); 
						endif;
					?>

					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						):
					?>
					<?php 
						echo CHtml::Button('Third Send To Client', array('class'=>'btn btn-primary', 'disabled'=>$model->status_detail == '31'? '' : 'disabled', 'name'=>'lastsendtoclient','id'=>'lastsendtoclient')); 
						endif;
					?>
				</div>

				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'am'|| 
							Yii::app()->user->getState('groupName') == 'bd'
						): 
					?>
            		<?php 
            			echo CHtml::Button('Last Negotiation', array('class'=>'btn btn-warning', 'hidden'=>$model->status_detail == '32'? '' : 'hidden', 'name'=>'lastnegotiation','id'=>'lastnegotiation'));
            			endif; 
            		?>

            		<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						): 
					?>
            		<?php 
            			echo CHtml::Button('Last Negotiation', array('class'=>'btn btn-warning', 'disabled'=>$model->status_detail == '32'? '' : 'disabled', 'name'=>'lastnegotiation','id'=>'lastnegotiation'));
            			endif; 
            		?>
            	</div>
			</div>

			<!-- Action Button Nego 4 -->
			<div class="col-md-12 col-sm-12">
				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'sd'
						): 
					?>
					<?php 
						echo CHtml::Button('Last Accept SD', array('class'=>'btn btn-success', 'hidden'=>$model->status_detail == '34'? '' : 'hidden', 'name'=>'finalacceptsd','id'=>'finalacceptsd')); 
						endif;
					?>

					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						): 
					?>
					<?php 
						echo CHtml::Button('Last Accept SD', array('class'=>'btn btn-success', 'disabled'=>$model->status_detail == '34'? '' : 'disabled', 'name'=>'finalacceptsd','id'=>'finalacceptsd')); 
						endif;
					?>
				</div>

				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'gm'
						): 
					?>
					<?php 
						echo CHtml::Button('Last Approve', array('class'=>'btn btn-info', 'hidden'=>$model->status_detail == '35'? '' : 'hidden', 'name'=>'finalapprove','id'=>'finalapprove')); 
						endif;
					?>

					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						): 
					?>
					<?php 
						echo CHtml::Button('Last Approve', array('class'=>'btn btn-info', 'disabled'=>$model->status_detail == '35'? '' : 'disabled', 'name'=>'finalapprove','id'=>'finalapprove')); 
						endif;
					?>
				</div>

				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'am'|| 
							Yii::app()->user->getState('groupName') == 'bd'
						):
					?>
					<?php 
						echo CHtml::Button('Last Send To Client', array('class'=>'btn btn-primary', 'hidden'=>$model->status_detail == '36'? '' : 'hidden', 'name'=>'finalsendtoclient','id'=>'finalsendtoclient')); 
						endif;
					?>

					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'
						):
					?>
					<?php 
						echo CHtml::Button('Last Send To Client', array('class'=>'btn btn-primary', 'disabled'=>$model->status_detail == '36'? '' : 'disabled', 'name'=>'finalsendtoclient','id'=>'finalsendtoclient')); 
						endif;
					?>
				</div>
			</div>

			<div class="col-md-12 col-sm-12">
				<div class="col-sm-2">
					<?php 
						if(
							Yii::app()->user->getState('groupName') == 'development'|| 
							Yii::app()->user->getState('groupName') == 'am'			|| 
							Yii::app()->user->getState('groupName') == 'bd'
							): 
					?>
					<?php 
						echo CHtml::Button('Future Opportunity', array('class'=>'btn btn-danger', 'name'=>'futureopportunity','id'=>'futureopportunity'));
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-history"></i>&nbsp;PIPELINE STAGE</h2>
				<ul class="nav navbar-right panel_toolbox"></ul>
				<div class="clearfix"></div>
			</div>

			<!-- Table Body -->
			<table id="datatable1" class="table table-striped table-bordered" style="width:100%">
				<?php 
					$this->widget('zii.widgets.grid.CGridView', array(
						'id'			=>'pipelinestage-grid',
						'template'		=>'{items}<tr><td style="border-top:none;">{summary}</td></tr>{pager}',
						'dataProvider'	=>OpportunityHistory::model()->search(),
						'columns'		=>array(
							array(
								'header'		=>'UPDATE DATE',
								'value'			=>'Yii::app()->dateFormatter->format("y-MM-d",strtotime($data->created_date))',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
							array(
								'header'		=>'UPDATE TIME',
								'value'			=>'Yii::app()->dateFormatter->format("H:mm:ss",strtotime($data->created_date))',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
							array(
								'header'		=>'STATUS PS',
								'value'			=>'!is_null($data->status->name)?$data->status->name:""',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
							array(
								'header'		=>'FULL NAME',
								'value'			=>'$data->full_name',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
							array(
								'header'		=>'DESCRIPTION',
								'value'			=>'$data->remarks',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
						),
					));
				?>
			</table>
		</div>
		<div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
				<div class="x_title">
					<h2><i class="fa fa-history"></i>&nbsp;QUOTATION STAGE</h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
							<div class="clearfix"></div>
				</div>

				<!-- Table Body -->
				<table id="datatable2" class="table table-striped table-bordered" style="width:100%">
					<?php 
						$this->widget('zii.widgets.grid.CGridView', array(
							'id'			=>'quotationstage-grid',
							'template'		=>'{items}<tr><td style="border-top:none;">{summary}</td></tr>{pager}',
							'dataProvider'	=>OpportunityHistory::model()->search2(),
							'columns'		=>array(
								array(
									'header'		=>'UPDATE DATE',
									'value'			=>'Yii::app()->dateFormatter->format("y-MM-d",strtotime($data->created_date))',
									'htmlOptions'	=>array(
									'width'=>'100px'
									)
								),
								array(
									'header'		=>'UPDATE TIME',
									'value'			=>'Yii::app()->dateFormatter->format("H:mm:ss",strtotime($data->created_date))',
									'htmlOptions'	=>array(
									'width'=>'100px'
									)
								),
								array(
									'header'		=>'STATUS QS',
									'value'			=>'!is_null($data->status_detail)?$data->statusdetail->name:""',
									'htmlOptions'	=>array(
									'width'=>'100px'
									)
								),
								array(
									'header'		=>'FULL NAME',
									'value'			=>'$data->full_name',
									'htmlOptions'	=>array(
									'width'=>'100px'
									)
								),
								array(
									'header'		=>'DESCRIPTION',
									'value'			=>'$data->remarks',
									'htmlOptions'	=>array(
									'width'=>'100px'
									)
								),
							),
						));
					?>
				</table>
			</div>

			<?php $form = $this->beginWidget('CActiveForm', array('id'=>'order-form','enableAjaxValidation'=>false));?>
				<div class="form-group col-xs-12" style="display:none;">
					<?php echo $form->labelEx($model,'opportunity_id'); ?>
					<?php echo $form->textArea($model,'opportunity_id',array('class'=>'form-control','size'=>60,'id'=>'opportunity_id','cols'=>30,'maxlength'=>200)); ?>
					<?php echo $form->hiddenField($model,'opportunity_id',array('class'=>'form-control', 'id'=>'opportunity_id','size'=>60,'maxlength'=>200)); ?>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	var j = jQuery.noConflict();
	jQuery(document).ready(function()
		{
			jQuery('#acceptsd').click(function()
		{
			AcceptSD();
		});
			jQuery('#approve').click(function()
		{
			Approve();
		});
			jQuery('#sendtoclient').click(function()
		{
			SendToClient();
		});
			jQuery('#negotiation').click(function()
		{
			Negotiation();
		});
			jQuery('#secondacceptsd').click(function()
		{
			SecondAcceptSD();
		});
			jQuery('#secondapprove').click(function()
		{
			SecondApprove();
		});
			jQuery('#secondsendtoclient').click(function()
		{
			SecondSendToClient();
		});
			jQuery('#secondnegotiation').click(function()
		{
			SecondNegotiation();
		});
			jQuery('#lastacceptsd').click(function()
		{
			LastAcceptSD();
		});
			jQuery('#lastapprove').click(function()
		{
			LastApprove();
		});
			jQuery('#lastsendtoclient').click(function()
		{
			LastSendToClient();
		});
			jQuery('#lastnegotiation').click(function()
		{
			LastNegotiation();
		});
			jQuery('#finalacceptsd').click(function()
		{
			FinalAcceptSD();
		});
			jQuery('#finalapprove').click(function()
		{
			FinalApprove();
		});
			jQuery('#finalsendtoclient').click(function()
		{
			FinalSendToClient();
		});
			jQuery('#futureopportunity').click(function()
		{
			FutureOpportunity();
		});

		});

	function AcceptSD()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/AcceptSD");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function Approve()
	{
		var opportunity_id = $('#opportunity_id').val();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/Approve");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function SendToClient()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/SendToClient");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function Negotiation()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/Negotiation");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}
	function SecondAcceptSD()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/SecondAcceptSD");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function SecondApprove()
	{
		var opportunity_id = $('#opportunity_id').val();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/SecondApprove");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function SecondSendToClient()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/SecondSendToClient");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function SecondNegotiation()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/SecondNegotiation");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}
	function LastAcceptSD()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/LastAcceptSD");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function LastApprove()
	{
		var opportunity_id = $('#opportunity_id').val();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/LastApprove");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function LastSendToClient()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/LastSendToClient");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function LastNegotiation()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/LastNegotiation");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}
	function FinalAcceptSD()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/FinalAcceptSD");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function FinalApprove()
	{
		var opportunity_id = $('#opportunity_id').val();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/FinalApprove");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function FinalSendToClient()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/FinalSendToClient");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}

	function FutureOpportunity()
	{
		var opportunity_id = $('#opportunity_id').val();
		// alert(opportunity_id);die();
		var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/FutureOpportunity");?>';
		jQuery.ajax(
		{
			type : 'POST',
			async : false,
			dataType : "json",
			url : uri,
			data: {opportunity_id:opportunity_id},
			beforeSend : function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(result)
			{
				j.unblockUI();
				var msgs = result.split("-");
				if(msgs[0] == "OK")
				{
					alert('SUCCESS');
					document.location.href = "index.php?r=opportunity/index";
				}
				else
					alert('error : '+msgs[1]);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				j.unblockUI();
				alert(textStatus);
			}
		});
	}
</script>