<?php $form = $this->beginWidget('CActiveForm', array(
  'id'=>'contact-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array(
    'enctype'=>'multipart/form-data'),
  ));
?>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-plus-circle"></i>&nbsp; Form Create<small>Contact</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />

        <!-- Label Full Name Contact -->
          <div class="item form-group">
            <?php echo $form->labelEX($model, 'contact_name', array('label'=>'Contact Full Name', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
            <?php echo $form->textField($model,'contact_name', array('class'=>'form-control','id'=>'contact_name', 'size'=>100,'maxlength'=>100)); ?>
             <?php echo $form->hiddenField($model, 'contact_id', array('id'=>'contact_id')); ?>
            </div>
            <?php echo $form->error($model,'contact_name'); ?>
          </div>

         <!-- Label Jobtitle Title -->
          <div class="item form-group">
            <?php echo $form->labelEX($model, 'contact_jobtitle', array('label'=>'Job Title', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
            <?php echo $form->textField($model,'contact_jobtitle', array('class'=>'form-control', 'id'=>'contact_jobtitle', 'size'=>100,'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model,'contact_jobtitle'); ?>
          </div>

          <!-- Label Phone Title -->
          <div class="item form-group">
            <?php echo $form->labelEX($model, 'contact_phone', array('label'=>'Phone', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
            <?php echo $form->textField($model,'contact_phone', array('class'=>'form-control', 'id'=>'contact_phone', 'size'=>100,'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model,'contact_phone'); ?>
          </div>

          <!-- Label E-mail -->
          <div class="item form-group">
            <?php echo $form->labelEX($model, 'contact_email', array('label'=>'E-mail', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
            <?php echo $form->textField($model,'contact_email', array('class'=>'form-control', 'id'=>'contact_email', 'size'=>100,'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model,'contact_email'); ?>
          </div>

          <!-- Label PIC -->
          <div class="item form-group">
            <?php echo $form->labelEX($model, 'contact_pic', array('label'=>'PIC', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
            <?php echo $form->textField($model,'contact_pic', array('class'=>'form-control', 'id'=>'contact_pic', 'size'=>100,'maxlength'=>100)); ?>
            </div>
            <?php echo $form->error($model,'contact_pic'); ?>
          </div>

          <!-- Label Contact Remarks -->
          <div class="item form-group">
            <?php echo $form->labelEx($model, 'contact_remarks', array('label'=>'Description', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

            <div class="col-md-6 col-sm-6 ">
            <?php echo $form->textArea($model, 'contact_remarks', array('class'=>'form-control', 'id'=>'contact_remarks', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
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
</div>	
<?php $this->endWidget(); ?>

<?php
  if(Yii::app()->controller->action->id=='update')
  {
?>


<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-sitemap"></i>&nbsp;Leads For Registered To Contact</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>

      <!-- Table Body -->
        <div class="form-group col-xs-5">
                <?php 
                  echo $form->dropDownList(
                    $model, 'search_by', array(
                      'code'=>'Lead Code',
                      'name'=>'Lead Name',
                    ),
                    array(
                      'empty'=>'Search By',
                      'id'=>"leads_search_by",
                      'class'=>'form-control',
                    )
                  ); 
                ?>
        </div>

        <div class="form-group col-xs-5">
                <?php echo $form->textField($model, 'search_value', array('class'=>'form-control', 'id'=>'leads_search_value', 'size'=>60, 'maxlength'=>200, 'placeholder'=>'Search Value')); ?>
        </div>
        <div class="form-group col-xs-1">
          <?php echo CHtml::Button('SEARCH', array('class'=>'btn btn-primary','name'=>'search_leads','id'=>'search_leads')); ?>
        </div>
    </div>
  </div>

  <!-- ini adalah form untuk memanggil leads dengan menggunakan .html -->
  <div class="col-sm-12">
      <div id="view_leads"></div>
    </div>
</div>

<?php
}
?>

<script type="text/javascript">
  var j = jQuery.noConflict();
  jQuery(document).ready(function()
  {
    // Agar table list Leadsnya muncul
     searchLeads();

    $("#search_leads").click(function()
    {
      searchLeads();
    });
    // Function agar bisa enter ketika search
    $("#leads_search_value").keyup(function(event) {
       if (event.keyCode === 13) {
        $("#search_leads").click();
      }
    });

  }
  );

  function searchLeads() 
  {
    var contact_id    = jQuery("#contact_id").val();
    // alert(contact_id);die();
    var search_by     = jQuery("#leads_search_by").val();
    var search_value  = jQuery("#leads_search_value").val();
    var uri           = '<?php echo Yii::app()->createAbsoluteUrl("contact/getLeads");?>';
    jQuery.ajax(
    {
      type: 'POST',
      async: false,
      dataType: "json",
      cache: false,
      url: uri,
      data: {
        contact_id:contact_id,
        search_by:search_by, 
        search_value:search_value
      },
      success: function(result) 
      {
        // Ini untuk menampilkan form leads dengan JS + HTML
        document.getElementById('view_leads').innerHTML = result;
      }
    });
  }

  function save_leads(row) 
  {
    var contact_id  = $("#contact_id").val();
    var i           = row.parentNode.parentNode.rowIndex;
    var x           = document.getElementById("preview_leads").rows[i].cells[0].innerHTML;
    if (x != "" && contact_id != "")
    {
      var uri = '<?php echo Yii::app()->createAbsoluteUrl("contact/addLeadsContact"); ?>';
      jQuery.ajax(
      {
        type: 'POST',
        async: false,
        dataType: "json",
        url: uri,
        data: {x:x, contact_id:contact_id},
        beforeSend: function(jqXHR, settings)
        {
          j.blockUI();
        },
        success: function(result)
        { 
          j.unblockUI();
          if(result == "OK")
          {
            alert("success : Success add Lead");
            document.getElementById("preview_leads").deleteRow(i);
          }
          else
            alert('error : '+result);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
          j.unblockUI();
          alert(textStatus); 
        }
      });
    }
  }
</script>