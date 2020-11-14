<?php $form = $this->beginWidget('CActiveForm', array(
  'id'=>'leads-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array(
    'enctype'=>'multipart/form-data'),
  )); ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Create<small>Leads</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <!-- Label Code -->
                      <div class="item form-group">
                        <?php echo $form->labelEX($model, 'code', array('label'=>'Leads Code', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                        <div class="col-md-6 col-sm-6 ">
                        <?php echo $form->textField($model,'code', array('id'=>'leads_id', 'readonly'=>($model->scenario == 'update')? true : false,'class'=>'form-control', 'size'=>30,'maxlength'=>100)); ?>
                        </div>
                        <?php echo $form->error($model,'code'); ?>
                      </div>

                      <!-- Label Name -->
                      <div class="item form-group">
                        <?php echo $form->labelEx($model, 'name', array('label'=>'Leads Name', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                        <div class="col-md-6 col-sm-6 ">
                        <?php echo $form->textField($model, 'name', array('class'=>'form-control', 'size'=>30, 'maxlength'=>100)); ?>
                      </div>

                        <?php echo $form->hiddenField($model, 'leads_id', array('id'=>'leads_id')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                      </div>

                      <!-- Label Source -->
                      <div class="item form-group">
                        <?php echo $form->labelEx($model, 'source_id', array('label'=>'Source', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                        <div class="col-md-6 col-sm-6 ">
                        <?php echo $form->textField($model, 'source_id', array('class'=>'form-control', 'size'=>30, 'id'=>'source_name','maxlength'=>100)); ?>
                      </div>

                        <?php echo $form->hiddenField($model, 'source_id', array('id'=>'source_id')); ?>
                        <?php echo $form->error($model, 'source'); ?>
                      </div>

                      <!-- Label Industry -->
                      <div class="item form-group">
                        <?php echo $form->labelEx($model,'industry_name', array('label'=>'Industry Type', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                        <div class="col-md-6 col-sm-6 ">
                        <?php echo $form->dropDownList(
                          $model,'industry_name',array(
                            'Agriculture'=>'Agriculture',
                            'Apparel'=>'Apparel',
                            'Banking'=>'Banking',
                            'Biotechnology'=>'Biotechnology',
                            'Chemicals'=>'Chemicals',
                            'Cosmetics'=>'Cosmetics',
                            'Education'=>'Education',
                            'Electronics'=>'Electronics',
                            'Energy'=>'Energy',
                            'Engineering'=>'Engineering',
                            'Entertaiment'=>'Entertaiment',
                            'Environmental'=>'Environmental',
                            'Fashion'=>'Fashion',
                            'Food & Beverage'=>'Food & Beverage',
                            'Healthcare'=>'Healthcare',
                            'Hospitaly'=>'Hospitaly',
                            'Hotel Management'=>'Hotel Management',
                            'Not For Profit'=>'Not For Profit',
                            'Other'=>'Other',
                            'Retail'=>'Retail',
                            'Telecommunications'=>'Retail',
                            'Transportation'=>'Transportation',
                            'Utilities'=>'Utilities',
                          ),
                          array(
                            'class'=>'form-control', 'id'=>'industry_name'
                          )
                        ); ?>
                      </div>
                        <?php echo $form->error($model,'industry_id'); ?>
                      </div>

                      <!-- Label Status -->
                      <div class="item form-group">
                        <?php echo $form->labelEx($model, 'status_name', array('label'=>'Status', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                        <div class="col-md-6 col-sm-6 ">
                        <?php echo $form->dropDownList(
                          $model,'status_name',array(
                            'Attempted to Contract'=>'Attempted to Contact',
                            'Contact In Future'=>'Contact in Future',
                            'Contacted'=>'Contacted',
                            'Converted'=>'Converted',
                            'Junk Lead'=>'Junk Lead',
                            'Not Qualified'=>'Not Qualified',
                            'Lost Leads'=>'Lost Leads',
                            'Pre Qualified'=>'Pre-Qualified',
                          ),
                          array(
                            'class'=>'form-control', 'id'=>'status_name'
                          )
                        ); ?>
                      </div>
                        <?php echo $form->error($model, 'status_id'); ?>
                      </div>

                      <!-- Label Remarks -->
                      <div class="item form-group">
                        <?php echo $form->labelEx($model, 'remarks', array('label'=>'Description', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                        <div class="col-md-6 col-sm-6 ">
                        <?php echo $form->textArea($model, 'remarks', array('id'=>'remarks', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
                      </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
						              <button class="btn btn-danger" type="reset">Reset</button>
                          <?php echo CHtml::submitButton($model->isNewRecord? 'Create': 'UPDATE', array('class'=>'btn btn-success')); ?>
                          <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php $this->endWIdget(); ?>

<script type="text/javascript">

  var j = jQuery.noConflict();
  jQuery(document).ready(function()
  {
    $("#source_name").focus();
    jQuery('#add_source').click(function()
    {
      SaveSource();
    });
  });

  $("#source_name").autocomplete(
  {
    source: '<?php echo Yii::app()->createAbsoluteUrl("Custom/Source"); ?>',
    select: function(event, ui)
    {
      if (ui.item.label == "No result found") 
                event.preventDefault();
      else
      {
        $("#source_id").val(ui.item.id);
        $("#barcode").focus();
      }
    },
        focus: function (event, ui) 
    {
            if (ui.item.label == "No result found") 
                event.preventDefault();
        }
  });
</script>
