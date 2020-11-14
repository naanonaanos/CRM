<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
     <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-plus-circle"></i>&nbsp; Form Create<small>Account</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          <h3><center>Opportunity Information</center></h3><br><br>
          <!-- Label Opportunity -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'opportunity_code', array('label'=>'Opportunity', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'opportunity_code', array('placeholder'=>'Input the code Opportunity', 'class'=>'form-control', 'id'=>'opportunity_id',  'size'=>30, 'maxlength'=>100)); ?>
            </div>
            <?php echo $form->hiddenField($model,'opportunity_id',array('class'=>'form-control','id'=>'opportunity_id'));?>
            <?php echo $form->error($model, 'opportunity_code'); ?>
          </div>
          <br><br><br><br><h3><center>Account Information</center></h3><br><br>
          
          <!-- Code Accout -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'code', array('label'=>'Account Code', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->textField($model, 'code', array('readonly'=>true, 'class'=>'form-control', 'id'=>'code',  'size'=>30, 'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model, 'code'); ?>
          </div>

           <!-- Label Leads -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'leads_code', array('label'=>'Account Name', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 form-group has-feedback">
              <?php echo $form->textfield($model, 'leads_code', array('placeholder'=>'Input the name of Leads','id'=>'leads_id', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
              <?php echo $form->hiddenField($model,'leads_id',array('class'=>'form-control','id'=>'leads_id','size'=>60,'maxlength'=>50));?>
            </div>
            <?php echo $form->error($model, 'leads_code'); ?>
          </div>

          <!-- Label Work Phone -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'work_phone', array('label'=>'Work Phone', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->textField($model, 'work_phone', array('class'=>'form-control', 'id'=>'work_phone',  'size'=>30, 'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model, 'work_phone'); ?>
          </div>

           <!-- Label Email -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'email', array('label'=>'Email', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->textField($model, 'email', array('class'=>'form-control', 'id'=>'email',  'size'=>30, 'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model, 'email'); ?>
          </div>

          <!-- Label Website -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'website', array('label'=>'Website', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->textField($model, 'website', array('class'=>'form-control', 'id'=>'website',  'size'=>30, 'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model, 'website'); ?>
          </div>

          <div class="col-md-6 col-sm-6 offset-md-3">
            <br><br><h3><center>Contact Information</center></h3><br><br>
          </div>

          <!-- Label Contact -->
          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <?php echo $form->labelEx($model, 'contact_code', array('label'=>'Contact', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
              <?php echo $form->textfield($model, 'contact_code', array('placeholder'=>'Input the name of Contact','id'=>'contact_id', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
              <?php echo $form->hiddenField($model,'contact_id',array('class'=>'form-control','id'=>'contact_id','size'=>60,'maxlength'=>50));?>
            </div>
            <?php echo $form->error($model, 'contact_code'); ?>
          </div>

          <div class="col-md-6 col-sm-6 offset-md-3">
            <br><br><h3><center>Destination Information</center></h3><br><br>
          </div>

           <!-- Label Destination -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'destination_code', array('label'=>'Destination', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'destination_code', array('placeholder'=>'Input your destination','class'=>'form-control', 'id'=>'destination_id',  'size'=>30, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'destination_code'); ?>
            </div>

            <!-- Label City -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'city', array('label'=>'City', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'city', array('readonly'=>true, 'class'=>'form-control', 'id'=>'city',  'size'=>30, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'city'); ?>
            </div>

            <!-- Label Province -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'province', array('label'=>'Province', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'province', array('readonly'=>true, 'class'=>'form-control', 'id'=>'province',  'size'=>30, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'province'); ?>
            </div>

            <!-- Label Subdistrict -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'subdistrict', array('label'=>'Subdistrict', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 form-group has-feedback">
                <?php echo $form->textfield($model, 'subdistrict', array('readonly'=>true, 'id'=>'subdistrict', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'subdistrict'); ?>
            </div>

            <!-- Label Postal Code -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'postal_code', array('label'=>'Postal Code', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 form-group has-feedback">
                <?php echo $form->textfield($model, 'postal_code', array('id'=>'postal_code', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'postal_code'); ?>
            </div>

            <!-- Label Address -->
            <div class="col-md-6 col-sm-12  form-group has-feedback">
              <?php echo $form->labelEx($model, 'full_address', array('label'=>'Full Address', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 ">
                <?php echo $form->textArea($model, 'full_address', array('id'=>'full_address', 'class'=>'form-control', 'cols'=>30, 'size'=>100, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'full_address'); ?>

            </div>
              <div class="col-md-5 col-sm-5  offset-md-5 ">
              	 <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-success')); ?>
              </div>
            </div>
        </form>
      </div>    
    </div>
  </div>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
  var j = jQuery.noConflict();

  jQuery("#opportunity_id").autocomplete(
    {
      source: '<?php
      echo Yii::app()->createAbsoluteUrl("Custom/OpportunityAccount");?>',
      select: function(event, ui)
      {
        if (ui.item.label == "No result found")
          event.preventDefault();
        else
        {
          $("#opportunity_code").val(ui.item.id);
        }
      },
      focus: function (event, ui)
      {
        if (ui.item.label == "No result found")
          event.preventDefault();
      }
    });

  jQuery("#leads_id").autocomplete(
    {
      source: '<?php
      echo Yii::app()->createAbsoluteUrl("Custom/LeadsOpportunity");?>',
      select: function(event, ui)
      {
        if (ui.item.label == "No result found")
          event.preventDefault();
        else
        {
          $("#leads_code").val(ui.item.id);
        }
      },
      focus: function (event, ui)
      {
        if (ui.item.label == "No result found")
          event.preventDefault();
      }
    });

  jQuery("#contact_id").autocomplete(
    {
      source: '<?php
      echo Yii::app()->createAbsoluteUrl("Custom/ContactAccount");?>',
      select: function(event, ui)
      {
        if (ui.item.label == "No result found")
          event.preventDefault();
        else
        {
          $("#contact_code").val(ui.item.id);
        }
      },
      focus: function (event, ui)
      {
        if (ui.item.label == "No result found")
          event.preventDefault();
      }
    });

  jQuery( "#destination_id" ).autocomplete(
  {
    source: '<?php
    echo Yii::app()->createAbsoluteUrl("Custom/Destination");?>',
    select: function(event, ui) 
    {
      if(ui.item.label == "No result found")
        event.preventDefault();
      else
      {
        $("#destination_code").val(ui.item.id);
        $("#city").val(ui.item.city);
        $("#province").val(ui.item.province);
        $("#subdistrict").val(ui.item.subdistrict);
      }
    },
    focus: function(event, ui)
    {
      if(ui.item.label=="No result found")
        event.preventDefault();
    }
  });
</script>