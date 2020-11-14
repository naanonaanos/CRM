<?php 
	$form = $this->beginWidget('CActiveForm', array(
	'id'=>'meeting-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
	'enctype'=>'multipart/form-data'),
	));
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-plus-circle"></i>&nbsp; Form Create<small>Meeting</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <h3><center>Meeting Information</center></h3>
          <!-- Label Meeting Status -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'status_name', array('label'=>'Meeting Status')); ?>

            <?php echo $form->dropDownList(
              $model,'status_name',array(
                'Open'     =>'Open',
                'Complete'  =>'Complete',
              ),
              array(
                'class'=>'form-control', 'id'=>'status_name'
              )
            ); ?>

            <?php echo $form->hiddenField($model,'status_meeting',array('class'=>'form-control','id'=>'status_meeting','size'=>60,'maxlength'=>50)) ;?>
            <?php echo $form->error($model,'status_meeting'); ?>
          </div>

          <!-- Label Lead Owner -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEX($model, 'full_name', array('label'=>'Lead Owner')); ?>
              
            <?php echo $form->textField($model,'full_name', array('readonly'=>true, 'placeholder'=>'Your Account', 'class'=>'form-control','id'=>'appi_client', 'size'=>30,'maxlength'=>100)); ?>
         
            <?php echo $form->error($model,'full_name'); ?>
          </div>

          <!-- Label Event -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEX($model, 'event', array('label'=>'Event')); ?>
              
            <?php echo $form->textField($model,'event', array('class'=>'form-control','id'=>'event', 'size'=>30,'maxlength'=>100)); ?>
         
            <?php echo $form->error($model,'event'); ?>
          </div>

          <!-- Label Meeting Subject -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'meeting_subject', array('label'=>'Subject Meeting')); ?>

            <?php echo $form->dropDownList(
              $model,'meeting_subject',array(
                'New Business'     =>'New Business',
                'Development'  =>'Development',
                'Maintenance'  =>'Maintenance'
              ),
              array(
                'class'=>'form-control', 'id'=>'meeting_subject'
              )
            ); ?>

            <?php echo $form->hiddenField($model,'subject_meeting',array('class'=>'form-control','id'=>'subject_meeting','size'=>60,'maxlength'=>50)) ;?>
            <?php echo $form->error($model,'subject_meeting'); ?>
          </div>

          <!-- Label Assign From -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEX($model, 'assign_from', array('label'=>'Assign From')); ?>
              
            <?php echo $form->textField($model,'assign_from', array('readonly'=>true, 'placeholder'=>'Your Account', 'class'=>'form-control','id'=>'assign_from', 'size'=>30,'maxlength'=>100)); ?>
         
            <?php echo $form->error($model,'assign_from'); ?>
          </div>

          <!-- Label Assign To -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEX($model, 'assign_to', array('label'=>'Assign To')); ?>
              
            <?php echo $form->textField($model,'assign_to', array('readonly'=>true, 'placeholder'=>'General Manager', 'class'=>'form-control','id'=>'assign_to', 'size'=>30,'maxlength'=>100)); ?>
         
            <?php echo $form->error($model,'assign_to'); ?>
          </div>

          <!-- Label Colaboration With -->
          <div class="col-md-6 col-sm-6 form-group has-feedback">
            <?php echo $form->labelEX($model, 'id', array('label'=>'Colaboration With')); ?>
            
            <?php echo $form->textField($model,'id', array('placeholder'=>'Choose', 'class'=>'form-control','id'=>'id', 'size'=>30,'maxlength'=>100)); ?>

            <?php echo $form->hiddenField($model,'id',array('class'=>'form-control','id'=>'id','size'=>60,'maxlength'=>50)) ;?>
            <?php echo $form->error($model,'id'); ?>
          </div>

          <!-- Label Priority -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'priority_level', array('label'=>'Priority')); ?>

            <?php echo $form->dropDownList(
              $model,'priority_level',array(
                'Low'     =>'Low',
                'Medium'  =>'Medium',
                'High'    =>'High'
              ),
              array(
                'class'=>'form-control', 'id'=>'priority_level'
              )
            ); ?>

            <?php echo $form->hiddenField($model,'priority',array('class'=>'form-control','id'=>'priority','size'=>60,'maxlength'=>50)) ;?>
            <?php echo $form->error($model,'priority'); ?>
          </div>

          <!-- Label Date From -->
          <div class="col-md-6 col-sm-6 form-group has-feedback">
          <?php echo $form->labelEx($model,'from_date', array('label'=>'Date From')); ?>

            <?php $this->widget(
              'zii.widgets.jui.CJuiDatePicker', array(
                  'name'=>'start_from',
                  'attribute' => 'start_from',
                  'options'=> array(
                    'dateFormat' => 'yy-mm-dd',
                    'maxDate' => '0',
                  ),
                  'htmlOptions' => array(
                    'class'=>'form-control',
                    'size' => '30',
                    'id'=>'date',
                    'placeholder' => 'Date',
                    'readonly' =>true,
                  ),
                )
              );
            ?>
          </div>
          

           <!-- Label Date To -->
            <div class="col-md-6 col-sm-6 form-group has-feedback">
            <?php echo $form->labelEx($model,'to_date', array('label'=>'Date To')); ?>
            
              <?php $this->widget(
                'zii.widgets.jui.CJuiDatePicker', array(
                    'name'=>'to_date',
                    'attribute' => 'to_date',
                    'options'=> array(
                      'dateFormat' => 'yy-mm-dd',
                      'maxDate' => '0',
                    ),
                    'htmlOptions' => array(
                      'class'=>'form-control',
                      'size' => '30',
                      'id'=>'dates',
                      'placeholder' => 'Date',
                      'readonly' =>true,
                    ),
                  )
                );
              ?>
            </div>

            <!-- Label Add MOM -->
              <div class="col-md-12 col-sm-12  form-group has-feedback">
                <?php echo $form->labelEX($model, 'add_mom', array('label'=>'Add MOM')); ?>

                <?php echo $form->textArea($model, 'add_mom', array('id'=>'add_mom', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>200)); ?>
                <?php echo $form->error($model,'add_mom'); ?>
                <br><br><br>
              </div>  
         
<h3><center>Related Information</center></h3>

        <!-- Label Contact Name -->
        <div class="col-md-6 col-sm-6 form-group has-feedback">
          <?php echo $form->labelEX($model, 'contact_name', array('label'=>'Contact Name')); ?>
          
             
          <?php echo $form->textField($model,'contact_name', array('placeholder'=>'Choose', 'class'=>'form-control','id'=>'contact_name', 'size'=>30,'maxlength'=>100)); ?>

          <?php echo $form->hiddenField($model,'contact_id',array('class'=>'form-control','id'=>'leads_id','size'=>60,'maxlength'=>50)) ;?>
          <?php echo $form->error($model,'contact_name'); ?>
           <div class="ln_solid"></div>
          </div> 
        

         <!-- Label Pipeline Stage -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEX($model, 'status_opp', array('label'=>'Opportunity (Pipeline)')); ?>
              
            <?php echo $form->dropDownList(
              $model, 'status_opp',array(
              // (Nama table DB)<--- || --->(Nama Variabel code)
              'Leads Identify'              =>  'Leads Identify',
              'First Meeting'               =>  'First Meeting',
              'Quotation'                   =>  'Quotation',
              'Negotiation'                 =>  'Negotiation',
              'Close Won'                   =>  'Close Won',
              'Go Live'                     =>  'Go Live',
              'Future Opportunity'          =>  'Future Opportunity',
            ),
            array(
              'class'=>'form-control', 'id'=>'status_opp'
            )
             );?>
            <?php echo $form->hiddenField($model,'status_id',array('class'=>'form-control','id'=>'status_id')) ;?>
            <?php echo $form->error($model,'status_id'); ?>
            <div class="ln_solid"></div>
  
          </div>


            <div class="col-md-6 col-sm-6">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'CREATE' : 'UPDATE', array('class'=>'btn btn-success')); ?>
            </div>
          
         

    </div>
 </div>
</div>	
<?php $this->endWidget(); ?>









<!-- <div class="form">


</div> -->