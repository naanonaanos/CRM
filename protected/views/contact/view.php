<?php
$this->breadcrumbs = array(
	'contact'=>array('index'),
	'View',
);?>
<!-- Action Button -->
<div class="title_left">
    <h3>Action Button Contact</h3>
    <?php echo CHtml::Button('Back to the list', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Contact/Index"'));?>
    <?php echo CHtml::Button('Update this contact', array('class'=>'btn btn-round btn-dark', 'onclick'=> 'js:document.location.href="index.php?r=contact/update&id='.$model->contact_id.'"'));?>
</div>

<br/>

<div class="x_panel">
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_title">
				<h2><i class="fa fa-phone"></i>&nbsp; CONTACT INFORMATION</h2>
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						array(
							'label'=>'Code', 
							'value'=>$model->code
						),
						array(
							'label'=>'Full Name', 
							'value'=>$model->contact_name
						),
						array(
							'label'=>'Job Title', 
							'value'=>$model->contact_jobtitle
						),
						array(
							'label'=>'Phone', 
							'value'=>$model->contact_phone
						),
						array(
							'label'=>'E-mail', 
							'value'=>$model->contact_email
						),
						array(
							'label'=>'PIC', 
							'value'=>$model->contact_pic
						),
						array(
							'label'=>'Description', 
							'value'=>$model->contact_remarks
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
						// 	'value'=>$model->modified_by
						// ),
					),
				)); ?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-key"></i>&nbsp;RELATED INFORMATION</h2>
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
								'header'=>'LEAD CODE',
								// 'header'		=>Yii::app()->privilege->checkPrivilege('leadscontact', 'code')?:'LEAD CODE',
								'value'			=>'$data->leads->code',
								'htmlOptions'	=>array(
								'width'			=>'100px'
								)
							),
							array(
								'header'=>'LEAD NAME',
								// 'header'		=>Yii::app()->privilege->checkPrivilege('leadscontact', 'name')?:'LEAD NAME',
								'value'			=>'$data->leads->name',
								'htmlOptions'	=>array(
								'width'			=>'100px'
								)
							),
						),
					));
				?>
			</table>
		</div>
	</div>
</div>