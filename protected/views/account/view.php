<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	'View',
);?>

<div class="title_left">
    <h3>Action Button Account</h3>
    <?php echo CHtml::Button('Back to the list', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Opportunity/Index"'));?>
    <?php echo CHtml::Button('Update this account', array('class'=>'btn btn-round btn-dark', 'onclick'=> 'js:document.location.href="index.php?r=opportunity/update&id='.$model->opportunity_id.'"'));?>
</div>

<div class="x_panel">
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_title">
				<h2> <i class="fa fa-code-fork"></i>&nbsp;ACCOUNT INFORMATION</h2>

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						array('label'=>'Code', 'value'=>$model->code),
						array('label'=>'Leads Name', 'value'=>$model->leads->name),
						array('label'=>'Industry Type', 'value'=>$model->leads->industry->name),
						array('label'=>'Work Phone','value'=>$model->work_phone),
						array('label'=>'Email','value'=>$model->email),
						array('label'=>'Website','value'=>$model->website),
						array('label'=>'Created By', 'value'=>$model->full_name),
						array('label'=>'Created Date', 'value'=>$model->created_date),
						array('label'=>'Modified Date', 'value'=>$model->modified_date)
					),
				)); ?>
			</div>
		</div>
	</div>
</div>

<div class="x_panel">
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_title">
				<h2> <i class="fa fa-code-fork"></i>&nbsp;CONTACT INFORMATION</h2>

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						array('label'=>'Full Name', 'value'=>$model->contact->contact_name),
						array('label'=>'Job Title', 'value'=>$model->contact->contact_jobtitle),
						array('label'=>'Phone Number', 'value'=>$model->contact->contact_phone),
						array('label'=>'Email','value'=>$model->contact->contact_email),
						array('label'=>'PIC Type','value'=>$model->contact->contact_pic),
						array('label'=>'Description','value'=>$model->contact->contact_remarks),
						array('label'=>'Created By', 'value'=>$model->contact->full_name),
						array('label'=>'Created Date', 'value'=>$model->contact->created_date),
						array('label'=>'Modified Date', 'value'=>$model->contact->modified_date)
					),
				)); ?>
			</div>
		</div>
	</div>
</div>
