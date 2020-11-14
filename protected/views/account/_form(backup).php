<?php $form = $this->beginWidget('CActiveForm', array(
  'id'=>'account-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array(
    'enctype'=>'multipart/form-data'),
  ));
?>

<div class="row" id="page1">
  <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-plus-circle"></i>&nbsp; Form<small>Opportunity Information</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <!-- Opportunity Code -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'opportunity_id', array('label'=>'Opportunity Code', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'opportunity_id', array('placeholder'=>'Input the code','class'=>'form-control', 'id'=>'opportunity_id',  'size'=>30, 'maxlength'=>100)); ?>

              <?php echo $form->hiddenField($model,'opportunity_id',array('class'=>'form-control','id'=>'opportunity_id','size'=>60,'maxlength'=>50)); ?>
              </div>
              <?php echo $form->error($model, 'opportunity_id'); ?>
            </div>

            <div class="col-md-6 col-sm-6">
              <?php  
                if(Yii::app()->controller->action->id!='update')
                {
              ?>
              <?php echo CHtml::Button('Next', array('class'=>'btn btn-info', 'name'=>'next','id'=>'next')); ?>
              <?php
              }
              ?>
            </div>
          </form>
        </div>    
      </div>
  </div>
</div>


<div class="row" id="page2" style="display:none;">
  <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-plus-circle"></i>&nbsp; Form<small>Leads Information</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <!-- Label Code -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEX($model, 'code', array('label'=>'Account Code', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model,'code', array('readonly'=>true, 'class'=>'form-control', 'id'=>'code', 'size'=>30,'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model,'code'); ?>
            </div>

            <!-- Account/Leads Name -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'leads_id', array('label'=>'Account Name', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'leads_id', array('placeholder'=>'Input the leads name','class'=>'form-control', 'id'=>'leads_id',  'size'=>30, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'leads_id'); ?>
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

            <!-- Label Remarks -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'remarks', array('label'=>'Description', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 ">
                <?php echo $form->textArea($model, 'remarks', array('id'=>'remarks', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 offset-md-6">
              <br>
              <?php  
                if(Yii::app()->controller->action->id!='update')
                {
              ?>
              <?php echo CHtml::Button('Next', array('class'=>'btn btn-info', 'name'=>'next2','id'=>'next2')); ?>
              <?php
              }
              ?>
            </div>

          </form>
        </div>    
      </div>
  </div>
</div>

<div class="row" id="page3" style="display:none;">
  <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-plus-circle"></i>&nbsp; Form<small>Contact Information</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <!-- Contact Name -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'contact_id', array('label'=>'Contact Name', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'contact_id', array('placeholder'=>'Input the contact name','class'=>'form-control', 'id'=>'contact_id',  'size'=>30, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'contact_id'); ?>
            </div>

            <div class="col-md-6 col-sm-6">
              <?php  
                if(Yii::app()->controller->action->id!='update')
                {
              ?>
              <?php echo CHtml::Button('Next', array('class'=>'btn btn-info', 'name'=>'next3','id'=>'next3')); ?>
              <?php
              }
              ?>
            </div>

          </form>
        </div>    
      </div>
  </div>
</div>

<div class="row" id="page4" style="display:none;">
  <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-plus-circle"></i>&nbsp; Form<small>Address Information</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <!-- Label Destination -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'destination_id', array('label'=>'Destination', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'destination_id', array('class'=>'form-control', 'id'=>'destination_id',  'size'=>30, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'destination_id'); ?>
            </div>

            <!-- L#abel Province -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'province', array('label'=>'Province', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'province', array('readonly'=>true,'class'=>'form-control', 'id'=>'province',  'size'=>30, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'province'); ?>
            </div>

            <!-- Label Postal Code -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'postal_code', array('label'=>'Postal Code', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'postal_code', array('class'=>'form-control', 'id'=>'postal_code',  'size'=>30, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'postal_code'); ?>
            </div>

            <!-- Label Subdistrict -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'subdistrict', array('label'=>'Subdistrict', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->textField($model, 'subdistrict', array('readonly'=>true,'class'=>'form-control', 'id'=>'subdistrict',  'size'=>30, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'subdistrict'); ?>
            </div>

             <!-- Label Address -->
            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php echo $form->labelEx($model, 'full_address', array('label'=>'Full Address', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 ">
                <?php echo $form->textArea($model, 'full_address', array('id'=>'full_address', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
              </div>
              <?php echo $form->error($model, 'full_address'); ?>
            </div>

            <div class="col-md-6 col-sm-6  form-group has-feedback">
              <?php  
                if(Yii::app()->controller->action->id!='update')
                {
              ?>
              <?php echo CHtml::submitButton($model->isNewRecord ? 'CREATE' : 'UPDATE', array('class'=>'btn btn-success form-control','size'=>30)); ?>
              <?php
              }
              ?>
            </div>
          </form>
        </div>    
      </div>
  </div>
</div>
<?php $this->endWidget(); ?>

<script type="text/javascript">
  var j = jQuery.noConflict();
  jQuery(document).ready(function()
  {
    jQuery('#next').click(function()
    {
      $("#page2").show();
    });

    jQuery('#next2').click(function()
    {
      $("#page3").show();
    });

    jQuery('#next3').click(function()
    {
      $("#page4").show();
    });
  });

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
          $("#opportunity_id").val(ui.item.id);
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
          $("#leads_id").val(ui.item.id);
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
          $("#contact_id").val(ui.item.id);
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