<?php $form = $this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="box box-solid box-primary">
	<div class="box-body">
		<div class="row">
			<div class="form-group col-xs-6">
				<?php 
					echo $form->dropDownList(
						$detail,'search_by',array(
							'code'=>'Opportunity Code',
							'status'=>'Status',
						),
						array(
							'empty'=>'Search By',
							'id'=>"search_by",
							'class'=>'form-control',
						)
					); 
				?>
			</div>
			<div class="form-group col-xs-6">
				<?php echo $form->textField($detail,'search_value',array('class'=>'form-control','size'=>60,'maxlength'=>200,'placeholder'=>'Search Value')); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
