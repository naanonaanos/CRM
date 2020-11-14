<?php $form = $this->beginWidget('CActiveForm', array(
  'id'=>'leadsupdate-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array(
    'enctype'=>'multipart/form-data')),
  $this->breadcrumbs = array(
	'leads'=>array('index'),
	'Update',
));
?>
 
<div class="title_left">
  <h3>Action Button Leads</h3>
  <?php echo CHtml::Button('Back to the list', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Leads/Index"'));?>
</div>

<br/>

<div class="row" id="page1">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Update<small>Leads</small></h2>
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
                  'class'=>'form-control', 'id'=>'source_name',
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
                  'Telecommunications'  =>'Telecommunications',
                  'Transportation'      =>'Transportation',
                  'Utilities'           =>'Utilities',
                ),
                array(
                  'class'=>'form-control', 'id'=>'industry_name',
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
                  'Attempted to Contract' =>'Attempted to Contact',
                  'Contact In Future'     =>'Contact in Future',
                  'Contacted'             =>'Contacted',
                  'Junk Lead'             =>'Junk Lead',
                  'Lost Leads'            =>'Lost Leads',
                  'Not Qualified'         =>'Not Qualified',
                  'Pre Qualified'         =>'Pre-Qualified',
                ),
                array(
                  'class'=>'form-control', 'id'=>'status_name',
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
                <?php echo CHtml::submitButton($model->isNewRecord ? 'CREATE' : 'UPDATE', array('class'=>'btn btn-primary')); ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->endWIdget(); ?>