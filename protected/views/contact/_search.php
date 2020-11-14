<?php
$this->breadcrumbs = array(
	'contact'=>array('index'),
	'List',
);
$form = $this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
		<div class="box-body">
			<div class="row">
				<div class="form-group col-xs-6">
					<?php 
						echo $form->dropDownList(
							$model,'search_by',array(
								'code'				=> 'Contact Code',
								'contact_name'		=> 'Contact Name',
								'contact_jobtitle'	=> 'Contact Job title',
								'contact_phone'		=> 'Contact Phone',
								'contact_email'		=> 'Contact Email',
								'contact_pic' 		=> 'Contact PIC',
							),
							array(
								'empty' => 'Search By',
								'id'    => "search_by",
								'class' => 'form-control',
							)
						); 
					?>
				</div>
				<div class="form-group col-xs-5">
					<?php echo $form->textField($model,'search_value',array('class'=>'form-control','size'=>25,'maxlength'=>200,'placeholder'=>'Search Value')); ?>
				</div>
				<div class="form-group col-xs-1">
					<button type="submit" class="btn btn-primary">Search</button>
				</div>
			</div>
		</div>
<?php $this->endWidget(); ?>