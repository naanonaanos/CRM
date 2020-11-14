<?php
$this->breadcrumbs = array(
	'leads'=>array('index'),
	'View',
);?>
<!-- Action Button -->
<div class="title_left">
    <h3>Action Button Leads</h3>
    <?php echo CHtml::Button('Back to the list', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Leads/Index"'));?>
    <?php echo CHtml::Button('Update this leads', array('class'=>'btn btn-round btn-dark', 'onclick'=> 'js:document.location.href="index.php?r=leads/update&id='.$model->leads_id.'"'));?>
</div>

<br/>

<div class="x_panel">
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_title">
				<h2> <i class="fa fa-building-o"></i>&nbsp;LEADS INFORMATION</h2>
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						array(
							'label'=>'Name', 
							'value'=>$model->name
						),
						array(
							'label'=>'Code', 
							'value'=>$model->code
						),
						array(
							'label'=>'Description', 
							'value'=>$model->remarks
						),
						array(
							'label'=>'Created Date', 
							'value'=>$model->created_date
						),
						array(
							'label'=>'Last Modified Date', 
							'value'=>$model->modified_date
						),
						// array(
						// 	'label'=>'Modified By', 
						// 	'value'=>$model->created_date
						// ),
					),
				)); ?>
				<br/>
				<h2>LEADS STATUS</h2>
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						array(
							'label'=>'Status', 
							'value'=>$model->status->name
						),
						)
				)
					);
					?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-phone"></i>&nbsp;CONTACT INFORMATION</h2>
				<ul class="nav navbar-right panel_toolbox"></ul>
				<div class="clearfix"></div>
			</div>

			<!-- Table Body -->
			<table id="datatable" class="table table-striped table-bordered" style="width:100%">
				<?php 
					$this->widget('zii.widgets.grid.CGridView', array(
						'id'			=>'leadscontact-grid',
						'template'		=>'{items}<tr><td style="border-top:none;">{summary}</td></tr>{pager}',
						'dataProvider'	=>$mdl->search(),
						'columns'		=>array(
							array(
								'header'		=>'CONTACT NAME',
								// 'header'		=>Yii::app()->privilege->checkPrivilege('leadscontact', 'contact_id')?:'CONTACT NAME',
								'value'			=>'$data->contact->contact_name',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
							array(
								'header'		=>'JOB TITLE',
								// 'header'		=>Yii::app()->privilege->checkPrivilege('leadscontact', 'jobtitle')?:'JOB TITLE',
								'value'			=>'$data->contact->contact_jobtitle',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
							array(
								'header'		=>'PHONE',
								// 'header'		=>Yii::app()->privilege->checkPrivilege('leadscontact', 'phone')?:'PHONE',
								'value'			=>'$data->contact->contact_phone',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
							array(
								'header'		=>'EMAIL',
								// 'header'		=>Yii::app()->privilege->checkPrivilege('leadscontact', 'email')?:'EMAIL',
								'value'			=>'$data->contact->contact_email',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
							array(
								'header'		=>'PIC',
								// 'header'		=>Yii::app()->privilege->checkPrivilege('leadscontact', 'pic')?:'PIC',
								'value'			=>'$data->contact->contact_pic',
								'htmlOptions'	=>array(
								'width'=>'100px'
								)
							),
							array(
								'header'		=>'ACTION',
								'class'			=>'CButtonColumn',
								'template'		=>'{delete}',
								'htmlOptions'	=>array(
									'width'		=>'50px',
									'align'		=>'center'
								),
								'buttons'			=>array(
									'delete'		=>array(
										'imageUrl'	=>Yii::app()->request->baseUrl.'/themes/GentelellaMaster/production/images/close.png',
										'url'		=>'Yii::app()->createUrl("leads/DeletedLeadsContact", array("id"=>$data->leads_contact_id))',
										'visible'	=>"true",
									)
								),
								'headerHtmlOptions'=>array('style' => 'text-align: center;'),
							),
						),
					)); 
				?>
			</table>
			<div class="x_title">
				<h2><i class="fa fa-history"></i>&nbsp;HISTORY INFORMATION</h2>
				<ul class="nav navbar-right panel_toolbox"></ul>
				<div class="clearfix"></div>
			</div>
			
			<!-- Table Body -->
			<table id="datatable" class="table table-striped table-bordered" style="width:100%">
				<?php 
					$this->widget('zii.widgets.grid.CGridView', array(
						'id'			=>'leadscontacthistory-grid',
						'template'		=>'{items}<tr><td style="border-top:none;">{summary}</td></tr>{pager}',
						'dataProvider'	=>LeadsHistory::model()->search(),
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
								'header'		=>'STATUS',
								'value'			=>'$data->status->name',
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
				)); ?>
			</table>
		</div>
	</div>
</div>