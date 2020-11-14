<?php $form = $this->beginWidget('CActiveForm', array(
	'id'=>'counter-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'),
	)); ?>

	<div class="box box-solid box-primary">
		<div class="box-header with-border">
			<?php if($model->scenario == 'update') echo '<i class="fa fa-pencil"></i>'; else echo '<i class"fa fa-file-o"></i>'; ?>
			<h3 class="box-title">STATUS LIST</h3> 
		</div>

		<div class="box-body">
			<div class="row">
				<div class="form-group col-xs-6">
					<?php echo $form->labelEX($model, 'code', array('label'=>'CODE')); ?>
					<?php echo $form->textField($model,'code',array('class'=>'form-control','size'=>60,'maxlength'=>50)); ?>
					<?php echo $form->error($model,'code'); ?>
				</div>
				<div class="form-group col-xs-6">
					<?php echo $form->labelEx($model, 'name', array('label'=>'NAME')); ?>
					<?php echo $form->textField($model, 'name', array('class'=>'form-control', 'size'=>30, 'maxlength'=>50)); ?>
					<?php echo $form->error($model, 'name'); ?>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-xs-6">
					<?php echo $form->labelEX($model, 'color', array('label'=>'COLOR')); ?>
					<?php echo $form->textField($model,'color',array('class'=>'form-control','size'=>60,'maxlength'=>50)); ?>
					<?php echo $form->error($model,'color'); ?>
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
	</div>
<?php $this->endWidget(); ?>