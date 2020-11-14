<?php $form = $this->beginWidget('CActiveForm', array(
  'id'=>'leads-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array(
    'enctype'=>'multipart/form-data'),
  ));
?>

<div class="row" id="page1">
  <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h2><i class="fa fa-plus-circle"></i>&nbsp; Form Create<small>Leads</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
              <?php echo $form->textField($model,'code', array('readonly'=>true, 'class'=>'form-control', 'id'=>'code', 'size'=>30,'maxlength'=>100)); ?>

              <?php echo $form->hiddenField($model, 'leads_id', array('id'=>'leads_id')); ?>
              </div>
              <?php echo $form->error($model,'code'); ?>
            </div>

            <!-- Leads Name -->
            <div class="item form-group">
              <?php echo $form->labelEx($model, 'name', array('label'=>'Leads Name', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 ">
              <?php echo $form->textField($model, 'name', array('class'=>'form-control', 'id'=>'name',  'size'=>30, 'maxlength'=>100)); ?>

               <?php echo $form->hiddenField($model, 'leads_id', array('id'=>'leads_name')); ?>
              </div>
              <?php echo $form->error($model, 'name'); ?>
            </div>

            <!-- Label Source -->
            <div class="item form-group">
              <?php echo $form->labelEx($model, 'source_name', array('label'=>'Source', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 ">
                <?php echo $form->dropDownList(
                  $model,'source_name',array(
                    'Advertisement'     =>'Advertisement',
                    'Cold Call'         =>'Cold Call',
                    'Conference'        =>'Conference',
                    'Direct Mail'       =>'Direct Mail',
                    'E-mail'            =>'E-mail',
                    'Employee Referal'  =>'Employee Referal',
                    'Existing Customer' =>'Existing Customer',
                    'Google AdWords'    =>'Google AdWords',
                    'Partner'           =>'Partner',
                    'Public Relation'   =>'Public Relation',
                    'Self Generated'    =>'Self Generated',
                    'Trade Show'        =>'Trade Show',
                    'Website'           =>'Website',
                    'Webinar'           =>'Webinar',
                  ),
                  array(
                    'class'=>'form-control', 'id'=>'source_name'
                  )
                ); ?>

                <?php echo $form->hiddenField($model,'source_id',array('class'=>'form-control','id'=>'source_id','size'=>60,'maxlength'=>50)) ;?>
                </div>
                <?php echo $form->error($model,'source_id'); ?>
              </div>

            <!-- Label Industry -->
            <div class="item form-group">
              <?php echo $form->labelEx($model,'industry_name', array('label'=>'Industry Type', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 ">
                <?php echo $form->dropDownList(
                  $model,'industry_name',array(
                    'Agriculture'         =>'Agriculture',
                    'Apparel'             =>'Apparel',
                    'Banking'             =>'Banking',
                    'Biotechnology'       =>'Biotechnology',
                    'Chemicals'           =>'Chemicals',
                    'Cosmetics'           =>'Cosmetics',
                    'Education'           =>'Education',
                    'Electronics'         =>'Electronics',
                    'Energy'              =>'Energy',
                    'Engineering'         =>'Engineering',
                    'Entertaiment'        =>'Entertaiment',
                    'Environmental'       =>'Environmental',
                    'Fashion'             =>'Fashion',
                    'Food & Beverage'     =>'Food & Beverage',
                    'Healthcare'          =>'Healthcare',
                    'Hospitaly'           =>'Hospitaly',
                    'Hotel Management'    =>'Hotel Management',
                    'Not For Profit'      =>'Not For Profit',
                    'Other'               =>'Other',
                    'Retail'              =>'Retail',
                    'Telecommunications'  =>'Retail',
                    'Transportation'      =>'Transportation',
                    'Utilities'           =>'Utilities',
                  ),
                  array(
                    'class'=>'form-control', 'id'=>'industry_name'
                  )
                ); ?>
                <?php echo $form->hiddenField($model,'industry_id',array('class'=>'form-control','id'=>'industry_id','size'=>60,'maxlength'=>50)) ;?>
              </div>
              <?php echo $form->error($model,'industry_id'); ?>
            </div>

            <!-- Label Status -->
            <div class="item form-group">
              <?php echo $form->labelEx($model, 'status_name', array('label'=>'Status', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 ">
                <?php echo $form->dropDownList(
                  $model,'status_name',array(
                    // (Nama table DB)<--- || --->(Nama Variabel code)
                    'Attempted to Contract' =>'Attempted to Contact',
                    'Contact In Future'     =>'Contact in Future',
                    'Contacted'             =>'Contacted',
                    'Junk Lead'             =>'Junk Lead',
                    'Lost Leads'            =>'Lost Leads',
                    'Not Qualified'         =>'Not Qualified',
                    'Pre Qualified'         =>'Pre-Qualified',
                  ),
                  array(
                    'class'=>'form-control', 'id'=>'status_name'
                  )
                ); ?>
                <?php echo $form->hiddenField($model,'status_id',array('class'=>'form-control','id'=>'status_id','size'=>60,'maxlength'=>50)) ;?>
              </div>
                <?php echo $form->error($model, 'status_id'); ?>
            </div>

            <!-- Label Remarks -->
            <div class="item form-group">
              <?php echo $form->labelEx($model, 'remarks', array('label'=>'Description', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

              <div class="col-md-6 col-sm-6 ">
                <?php echo $form->textArea($model, 'remarks', array('id'=>'leads_remarks', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">
                <?php  
                  if(Yii::app()->controller->action->id!='update')
                  {
                ?>
                <?php echo CHtml::Button('Next', array('class'=>'btn btn-info', 'name'=>'next','id'=>'next')); ?>
                <?php
                }
                ?>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
<?php if(Yii::app()->controller->action->id!='update')
  {
?>

<!-- ************************************* FORM Create Contact *********************************** -->
<div class="row" id="page2" style="display:none;">
  <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-plus-circle"></i>&nbsp; Form Create<small>Contact the Leads</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
            <div class="x_content">
              <br />
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <!-- Label Full Name Contact -->
                <div class="item form-group">
                  <?php echo $form->labelEX($model, 'contact_name', array('readonly'=>($model->scenario == 'update')? true : false,'label'=>'Contact Full Name', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                  <div class="col-md-6 col-sm-6 ">
                    <?php echo $form->textField($model,'contact_name', array('readonly'=>($model->scenario == 'update')? true : false,'class'=>'form-control','id'=>'contact_name', 'size'=>100,'maxlength'=>100));?>
                  </div>
                  <?php echo $form->error($model,'contact_name'); ?>
                </div>

                <!-- Label Jobtitle Title -->
                <div class="item form-group">
                  <?php echo $form->labelEX($model, 'contact_jobtitle', array('label'=>'Job Title', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                  <div class="col-md-6 col-sm-6 ">
                    <?php echo $form->textField($model,'contact_jobtitle', array('readonly'=>($model->scenario == 'update')? true : false,'class'=>'form-control', 'id'=>'contact_jobtitle', 'size'=>100,'maxlength'=>100)); ?>
                  </div>
                  <?php echo $form->error($model,'contact_jobtitle'); ?>
                </div>

                <!-- Label Phone Title -->
                <div class="item form-group">
                  <?php echo $form->labelEX($model, 'contact_phone', array('label'=>'Phone', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                  <div class="col-md-6 col-sm-6 ">
                    <?php echo $form->textField($model,'contact_phone', array('readonly'=>($model->scenario == 'update')? true : false,'class'=>'form-control', 'id'=>'contact_phone', 'size'=>100,'maxlength'=>100)); ?>
                  </div>
                  <?php echo $form->error($model,'contact_phone'); ?>
                </div>

                <!-- Label E-mail -->
                <div class="item form-group">
                  <?php echo $form->labelEX($model, 'contact_email', array('label'=>'E-mail', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                  <div class="col-md-6 col-sm-6 ">
                    <?php echo $form->textField($model,'contact_email', array('readonly'=>($model->scenario == 'update')? true : false,'class'=>'form-control', 'id'=>'contact_email', 'size'=>100,'maxlength'=>100)); ?>
                  </div>
                  <?php echo $form->error($model,'contact_email'); ?>
                </div>

                <!-- Label PIC -->
                <div class="item form-group">
                  <?php echo $form->labelEX($model, 'contact_pic', array('label'=>'PIC', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                  <div class="col-md-6 col-sm-6 ">
                    <?php echo $form->textField($model,'contact_pic', array('readonly'=>($model->scenario == 'update')? true : false,'class'=>'form-control', 'id'=>'contact_pic', 'size'=>100,'maxlength'=>100)); ?>
                  </div>
                  <?php echo $form->error($model,'contact_pic'); ?>
                </div>

                <!-- Label Contact Remarks -->
                <div class="item form-group">
                  <?php echo $form->labelEx($model, 'contact_remarks', array('label'=>'Description', 'class'=>'col-form-label col-md-3 col-sm-3 label-align')); ?>

                  <div class="col-md-6 col-sm-6 ">
                   <?php echo $form->textArea($model, 'contact_remarks', array('readonly'=>($model->scenario == 'update')? true : false,'class'=>'form-control', 'id'=>'contact_remarks', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
                  </div>
                </div>

                <!-- Button Add Contact-->
                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                     <?php echo CHtml::Button('Add', array('class'=>'btn btn-info', 'name'=>'save','id'=>'save')); ?>
                  </div>
                </div>

                <div class="box-body">
                  <caption>Preview</caption>
                  <table class="table table-striped table-hover table-bordered table-condensed" id="preview_order">
                    <thead>
                      <tr>
                        <th style="display:none;">Id</th>
                        <th>Contact Full Name</th>
                        <th>Jobtitle</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>PIC</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                  <div class="ln_solid"></div>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <left><?php echo CHtml::Button('Finish', array('class'=>'btn btn-success', 'name'=>'add','id'=>'add')); ?></left>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
</div>   
<?php
}
?>           
<?php $this->endWidget(); ?>


<script type="text/javascript">
  var j = jQuery.noConflict();
  jQuery(document).ready(function()
  {
     jQuery('#next').click(function()
     {
      $("#page1").show();
      $("#page2").show();
    });

    jQuery('#save').click(function()
    {
      Save();
    });

    jQuery('#add').click(function()
    {
      Finish();
    });
  });

  function Save()
  {
    // alert('eek');
    var leads_id = $('#leads_id').val();
    if(leads_id == "")
    { 
      // CATATAN Yg kiri: variabel JS ( buat baru) & yg kanan: Id Label yg di atas
      var code              = $('#code').val();
      var name              = $('#name').val();
      var source_name       = $('#source_name').val();
      var source_id         = $('#source_id').val();
      var industry_name     = $('#industry_name').val();
      var industry_id       = $('#industry_id').val();
      var status_name       = $('#status_name').val();
      var status_id         = $('#status_id').val();
      var leads_remarks     = $('#leads_remarks').val();
      var contact_name      = $('#contact_name').val();
      var contact_jobtitle  = $('#contact_jobtitle').val();
      var contact_email     = $('#contact_email').val();
      var contact_pic       = $('#contact_pic').val();
      var contact_phone     = $('#contact_phone').val();
      var contact_remarks   = $('#contact_remarks').val();
      // Alert = fungsinya buat mengecheck variabel JS masuk atau tidak
      // alert(contact_remarks); die();
      
      if(code == "")
        alert("error : Leads Code tidak boleh kosong");
      else if(name == "")
        alert("error: Leads Name tidak boleh kosong");
      else if(contact_name == "")
        alert("error: Contact Full Name tidak boleh kosong");
      else if(contact_jobtitle == "")
        alert("error: Contact Job Title tidak boleh kosong");
      else if(contact_phone == "")
        alert("error: Contact Phone tidak boleh kosong");
      else if(contact_email == "")
        alert("error: Contact Email tidak boleh kosong");
      else if(contact_pic == "")
        alert("error: Contact PIC tidak boleh kosong");

      else
      {
       
        var uri = '<?php echo Yii::app()->createAbsoluteUrl("Leads/AddContact"); ?>';
        jQuery.ajax(
        {
          type: 'POST',
          async: false,
          dataType: "json",
          url: uri,
          data: {
            leads_id:leads_id,
            code:code,
            name:name,
            source_name:source_name,
            source_id:source_id, 
            industry_name:industry_name,
            industry_id:industry_id,
            status_name:status_name,
            status_id:status_id,
            leads_remarks:leads_remarks,
            contact_name:contact_name,
            contact_jobtitle:contact_jobtitle,
            contact_email:contact_email,
            contact_pic:contact_pic,
            contact_phone:contact_phone,
            contact_remarks:contact_remarks
          },

          beforeSend: function(jqXHR, settings)
          {
            j.blockUI();
          },
          success: function(result)
          {
            j.unblockUI();
            var msgs = result.split("-");
            if(msgs[0] == "OK")
            {
              var key = msgs[1];
              var tablePreview = $("#preview_order tbody");
              var strContent = "<tr>";
              
              strContent = strContent + "<td style='display:none;'>" + key + "<input type='hidden' name='key[]' value='"+ key +"'></td>";
              strContent = strContent + "<td>" + contact_name + "<input type='hidden' name='contact_name[]' value="+ contact_name +"></td>";
              strContent = strContent + "<td>" + contact_jobtitle + "<input type='hidden' name='contact_jobtitle[]' value="+ contact_jobtitle +"></td>";
              strContent = strContent + "<td>" + contact_phone + "<input type='hidden' name='contact_phone[]' value="+ contact_phone +"></td>";
              strContent = strContent + "<td>" + contact_email + "<input type='hidden' name='contact_email[]' value="+ contact_email +"></td>";
              strContent = strContent + "<td>" + contact_pic + "<input type='hidden' name='contact_pic[]' value="+ contact_pic +"></td>";
              strContent = strContent + "<td>" + contact_remarks + "<input type='hidden' name='contact_remarks[]' value="+ contact_remarks +"></td>";
              strContent = strContent + "<td><input type='button' value='Delete' onclick='deleteRow(this)'/></td>";
              strContent = strContent + "</tr>";

              var arr = [];
              tablePreview.find('tr').each(function (i) 
              {
                var $tds = $(this).find('td'),
                unique = $tds.eq(0).text();
                
                arr.push(unique);
              });

              if(arr.length <= 0)
              {
                tablePreview.prepend(strContent);
                clearData();
              }
              else
              {
                if(jQuery.inArray(contact_name, arr) == -1)
                {
                  tablePreview.prepend(strContent);
                  clearData();
                }
                else
                  alert('error : '+contact_name + ' Sudah di tambahkan' );
              }
            }
            else
              alert('error : '+msgs[1]);
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
            j.unblockUI();
            alert(textStatus); 
          }
        });
      }
      // document.getElementById('label').value = '';
    }
  }

  function deleteRow(row) 
  {
    var i = row.parentNode.parentNode.rowIndex;
    var x = document.getElementById("preview_order").rows[i].cells[0].innerHTML;
    var res = x.split("<");
    var key_id = res[0];
    
    if(key_id != "")
    {
      var uri = '<?php echo Yii::app()->createAbsoluteUrl("Leads/DeleteDetail"); ?>';
      jQuery.ajax(
      {
        type: 'POST',
        async: false,
        dataType: "json",
        url: uri,
        data: {key_id : key_id},
        beforeSend: function(jqXHR, settings)
        {
          j.blockUI();
        },
        success: function(result)
        {   
          j.unblockUI();
          var msgs = result.split("-");
          if(msgs[0] == "OK")
          {
            alert("Success");
            document.getElementById("preview_order").deleteRow(i);
          }
          else
            alert('error : '+msgs[1]);
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
          j.unblockUI();
          alert(textStatus); 
        }
      });
    }
    else
      document.getElementById("preview_order").deleteRow(i);
  }

  function clearData()
  {
    $("#contact_name").val('');
    $("#contact_jobtitle").val('');
    $("#contact_phone").val('');
    $("#contact_email").val('');
    $("#contact_pic").val('');
    $("#contact_remarks").val('');
  }

  function Finish()
  {
    alert('SUCCESS CREATE LEADS');
              document.location.href = "index.php?r=Leads/index";
  }
</script>