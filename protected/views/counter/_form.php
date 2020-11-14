<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'counter-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'),
	)); ?>

	<div class="card-box table-responsive">
			<?php if($model->scenario == 'update') echo ''; else echo ''; ?>
			<h4 class="box-title">COUNTER INFORMATION</h4> 
			<br>
			<div class="row">
				<div class="form-group col-xs-6">
					<?php echo $form->labelEx($model, 'name', array('label'=>'<b>NAME</b>')); ?>
					<?php echo $form->textField($model, 'name', array('class'=>'form-control', 'size'=>30, 'maxlength'=>50)); ?>
					<?php echo $form->error($model, 'name'); ?>
				</div>
				<div class="form-group col-xs-6">
					<?php echo $form->labelEX($model, 'counter', array('label'=>'COUNTER')); ?>
					<?php echo $form->textField($model,'counter',array('class'=>'form-control','size'=>30,'maxlength'=>50)); ?>
					<?php echo $form->error($model,'counter'); ?>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<div class="btn-group">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'CREATE' : 'UPDATE', array('class'=>'btn btn-primary')); ?>
					</div>
				</div>
			</div>
	</div>
<?php $this->endWidget(); ?>