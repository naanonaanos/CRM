<?php 
	$form = $this->beginWidget('CActiveForm', array(
	'id'=>'task-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
	'enctype'=>'multipart/form-data'),
	));
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-plus-circle"></i>&nbsp; Form Create<small>Task</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        <h3><center>Task Information</center></h3>

        <!-- Label Subject -->
          <div class="item form-group">
            <?php echo $form->labelEX($model, 'subject', array('label'=>'Task Subject', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
              <?php echo $form->textField($model,'subject', array('class'=>'form-control','id'=>'subject', 'size'=>100,'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model,'subject'); ?>
          </div>

         <!-- Label Description -->
          <div class="item form-group">
            <?php echo $form->labelEX($model, 'remarks', array('label'=>'Desription', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
              <?php echo $form->textField($model,'remarks', array('class'=>'form-control', 'id'=>'remarks', 'size'=>100,'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model,'remarks'); ?>
          </div>

          <!-- Label Source -->
          <div class="item form-group">
            <?php echo $form->labelEx($model, 'priority', array('label'=>'Priority', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
              <?php echo $form->dropDownList(
                $model,'prioritys',array(
                  'Low'     =>'Low',
                  'Medium'  =>'Medium',
                  'High'    =>'High',
                ),
                array(
                  'class'=>'form-control', 'id'=>'prioritys'
                )
              ); ?>

              <?php echo $form->hiddenField($model,'priority',array('class'=>'form-control','id'=>'prioritys','size'=>60,'maxlength'=>50)) ;?>
            </div>
            <?php echo $form->error($model,'priority'); ?>
          </div>

        	<!-- Label Start Date -->
        	<div class="item form-group">
          	<?php echo $form->labelEx($model,'from_date', array('label'=>'Start Date', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

						<div class="col-md-6 col-sm-6">
							<?php $this->widget(
								'zii.widgets.jui.CJuiDatePicker', array(
										'name'      =>'date_from',
										'attribute' => 'date_from',
										'options'   => array(
											'dateFormat' => 'yy-mm-dd',
											'maxDate'    => '0',
										),
										'htmlOptions' => array(
											'class'        =>'form-control',
											'size'         => '30',
											'id'           =>'date',
											'placeholder'  => 'Date',
											'readonly'     =>true,
										),
									)
								);
							?>
						</div>
		      </div>

    			<!-- Label Due Date -->
    			<div class="item form-group">
    	      <?php echo $form->labelEx($model,'to_date', array('label'=>'Due Date', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

    				<div class="col-md-6 col-sm-6">
    					<?php $this->widget(
								'zii.widgets.jui.CJuiDatePicker', array(
										'name'      =>'dates_from',
										'attribute' => 'dates_from',
										'options'   => array(
											'dateFormat' => 'yy-mm-dd',
											'maxDate'    => '0',
										),
										'htmlOptions' => array(
											'class'        =>'form-control',
											'size'         => '30',
											'id'           =>'dates',
											'placeholder'  => 'Date',
											'readonly'     =>true,
										),
									)
								);
    					?>
    				</div>
    			</div>

			    <br>
		
			    <h3><center>Related Information</center></h3>

  			  <!-- Label Contact Name -->
  			  <div class="item form-group">
            <?php echo $form->labelEX($model, 'contact_name', array('label'=>'Contact Name', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>
            
            <div class="col-md-6 col-sm-6">		
              <?php echo $form->textField($model,'contact_name', array('placeholder'=>'Choose', 'class'=>'form-control','id'=>'contact_name', 'size'=>30,'maxlength'=>100)); ?>

              <?php echo $form->hiddenField($model,'contact_id',array('class'=>'form-control','id'=>'leads_id','size'=>60,'maxlength'=>50)) ;?>
              <?php echo $form->error($model,'contact_name'); ?>
            </div> 
          </div>

          <div class="ln_solid"></div>

          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'CREATE' : 'UPDATE', array('class'=>'btn btn-success')); ?>
            </div>
          </div> 
      </div>
    </div>
  </div>	
<?php $this->endWidget(); ?>