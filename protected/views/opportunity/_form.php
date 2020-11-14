<?php $form = $this->beginWidget('CActiveForm', array(
  'id'=>'opportunity-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array(
    'enctype'=>'multipart/form-data'),
  ));
?>


<!-- <?php 
foreach ($locationoppurtunity as $data) {
  # code...
  echo var_dump($data);
}
?>
 -->
<div class="row" id="page1">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
        		<h2><i class="fa fa-plus-circle"></i>&nbsp; Form Create Opportunity</h2>
             <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
             </ul>
          <div class="clearfix"></div>
      </div>
      			<div class="x_content">
              <br />
      				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
      					   <h3><center>Opportunity Information</center></h3><br>

                       <!-- Label Opportunity Name -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'opportunity_name', array('label'=>'Opportunity Name')); ?>
                        	
                        <?php 
                          if(
                              Yii::app()->user->getState('groupName') == 'sd'||
                              Yii::app()->user->getState('groupName') == 'gm'
                            )
                          {
                            echo $form->textField($model,'opportunity_name', array('readonly'=>true, 'class'=>'form-control','id'=>'opportunity_name', 'size'=>30,'maxlength'=>100)); 
                          }
                          else
                          {
                           echo $form->textField($model,'opportunity_name', array('class'=>'form-control','id'=>'opportunity_name', 'size'=>30,'maxlength'=>100));  
                          }
                        ?>

                        <?php echo $form->hiddenField($model,'opportunity_id',array('class'=>'form-control','id'=>'opportunity_id')) ;?>
                     
                        <?php echo $form->error($model,'opportunity_id'); ?>
                      </div>

                      <!-- Label Margin -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'margin', array('label'=>'Margin')); ?>

                        <?php 
                          if(
                              Yii::app()->user->getState('groupName')=='sd'||
                              Yii::app()->user->getState('groupName')=='gm'
                            )
                          {
                            echo $form->textField($model,'margin', array('readonly'=>true, 'placeholder'=>'Input Number Only', 'class'=>'form-control','id'=>'code', 'size'=>30,'maxlength'=>100)); 
                          }
                          else
                          {
                           echo $form->textField($model,'margin', array('placeholder'=>'Input Number Only', 'class'=>'form-control','id'=>'code', 'size'=>30,'maxlength'=>100)); 
                          }
                        ?>
                     
                        <?php echo $form->error($model,'margin'); ?>
                      </div>	

                       <!-- Label Pipeline Stage -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php
                          if(Yii::app()->controller->action->id!='update')
                          { 
                            if(
                                Yii::app()->user->getState('groupName')=='am'||
                                Yii::app()->user->getState('groupName')=='bd'||
                                Yii::app()->user->getState('groupName')=='development'
                              )
                            {
                              echo $form->labelEX($model, 'status_name', array('label'=>'Pipeline Stage'));
                            	
                              echo $form->dropDownList(
                              	$model, 'status_name',array(
                              	// (Nama table DB)<--- || --->(Nama Variabel code)
                              	'Leads Identify'		 =>	'Leads Identify',
                              	'First Meeting'			 =>	'First Meeting',
                              	'Quotation'				   =>	'Quotation'
                                ),
                                  array('class'=>'form-control', 'id'=>'status_name')
                          	  ); 

                              echo $form->hiddenField($model,'status_id',array('class'=>'form-control','id'=>'status_id'));

                              echo $form->error($model,'status_id');
                            }
                            else
                            {
                              echo $form->labelEX($model, 'status_name', array('hidden'=>true,'label'=>'Pipeline Stage'));
                              
                              echo $form->dropDownList(
                                $model, 'status_name',array(
                                // (Nama table DB)<--- || --->(Nama Variabel code)
                                'Leads Identify'     => 'Leads Identify',
                                'First Meeting'      => 'First Meeting',
                                'Quotation'          => 'Quotation'
                                ),
                                  array('hidden'=>true,'class'=>'form-control', 'id'=>'status_name')
                              ); 

                              echo $form->hiddenField($model,'status_id',array('class'=>'form-control','id'=>'status_id'));

                              echo $form->error($model,'status_id');
                            }
                          }
                          else
                          {
                            if(
                                Yii::app()->user->getState('groupName')=='am'||
                                Yii::app()->user->getState('groupName')=='bd'||
                                Yii::app()->user->getState('groupName')=='development'
                              )
                            {
                              echo $form->labelEX($model, 'status_name', array('label'=>'Pipeline Stage'));
                              
                              echo $form->dropDownList(
                                $model, 'status_name',array(
                                // (Nama table DB)<--- || --->(Nama Variabel code)
                                'Leads Identify'     => 'Leads Identify',
                                'First Meeting'      => 'First Meeting',
                                'Quotation'          => 'Quotation',
                                'Negotiation'        =>  'Negotiation',
                                'Close Won'          =>  'Close Won',
                                'Go Live'            =>  'Go Live',
                                'Future Opportunity' =>  'Future Opportunity',
                                ),
                                  array('class'=>'form-control', 'id'=>'status_name')
                              ); 

                              echo $form->hiddenField($model,'status_id',array('class'=>'form-control','id'=>'status_id'));

                              echo $form->error($model,'status_id');
                            }
                            else
                            {
                              echo $form->labelEX($model, 'status_name', array('hidden'=>true,'label'=>'Pipeline Stage'));
                              
                              echo $form->dropDownList(
                                $model, 'status_name',array(
                                // (Nama table DB)<--- || --->(Nama Variabel code)
                                'Leads Identify'     => 'Leads Identify',
                                'First Meeting'      => 'First Meeting',
                                'Quotation'          => 'Quotation'
                                ),
                                  array('hidden'=>true,'class'=>'form-control', 'id'=>'status_name')
                              ); 

                              echo $form->hiddenField($model,'status_id',array('class'=>'form-control','id'=>'status_id'));

                              echo $form->error($model,'status_id');
                            }
                          }
                        ?>
                      </div>

                      <!-- Label Parent Type -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php
                          if(
                              Yii::app()->user->getState('groupName')=='am'||
                              Yii::app()->user->getState('groupName')=='bd'||
                              Yii::app()->user->getState('groupName')=='development'
                            )
                          {
                            echo $form->labelEX($model, 'parent_type', array('label'=>'Parent Type'));
                            	
                            echo $form->dropDownList($model, 'parent_type',array(
                            	'Leads'		=>	'Leads',
                            	'Account'	=>	'Account',
                              ),
                              array('class'=>'form-control', 'id'=>'parent_type')
                          	);

                            echo $form->error($model,'parent_type');
                          }
                          else
                          {
                            echo $form->labelEX($model, 'parent_type', array('hidden'=>true,'label'=>'Parent Type'));
                              
                            echo $form->dropDownList($model, 'parent_type',array(
                              'Leads'   =>  'Leads',
                              'Account' =>  'Account',
                              ),
                              array('hidden'=>true,'class'=>'form-control', 'id'=>'parent_type')
                            );

                            echo $form->error($model,'parent_type');
                          }
                      	?>
                      </div>

                     <!-- Label Remarks Negotiation -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'remarks_negotiation', array('label'=>'Negotiation Note')); ?>

                        <?php
                          if(
                              Yii::app()->user->getState('groupName')=='sd' ||
                              Yii::app()->user->getState('groupName')=='gm'
                            )
                          {
                            echo $form->textArea($model, 'remarks_negotiation', array('readonly'=>true, 'id'=>'remarks_negotiation', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); 
                          }
                          else
                          {
                           echo $form->textArea($model, 'remarks_negotiation', array('id'=>'remarks_negotiation', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); 

                           echo $form->error($model,'remarks_negotiation');
                          }
                        ?>
                      </div>  

                     <!-- Label Remarks Feedback SD -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'remarks_feedback', array('label'=>'Feedback SD')); ?>
                        <?php 
                          if(
                              Yii::app()->user->getState('groupName')=='sd'||
                              Yii::app()->user->getState('groupName')=='development'
                            )
                          {
                            echo $form->textArea($model, 'remarks_feedback', array('readonly'=>($model->scenario == 'create')? true : false,'placeholder'=>'Khusus diisi oleh tim SD', 'id'=>'remarks_feedback', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                            // echo $form->textArea($model, 'remarks_feedback', array('readonly'=>($model->scenario == 'create')? true : false,'placeholder'=>'Khusus diisi oleh tim SD', 'id'=>'remarks_feedback', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                          } 
                          else
                          {
                            echo $form->textArea($model, 'remarks_feedback', array('readonly'=>true,'placeholder'=>'Khusus diisi oleh tim SD', 'id'=>'remarks_feedback', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                          }
                        ?>
                        <br>
                      </div>

                     <h3><center>Fulfillment Proposal</center></h3>
                     <h2>&nbsp;&nbsp;Client Profile</h2>

                     <!-- Label Client Name -->
                      <div class="col-md-7 col-sm-7  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'name', array('label'=>'Client Name')); ?>
                        	
                        <?php
                          if(
                            Yii::app()->user->getState('groupName')=='sd'||
                            Yii::app()->user->getState('groupName')=='gm'
                            )
                          {
                            echo $form->textField($model,'name', array('readonly'=>true,'placeholder'=>'Choose From Parent Type', 'class'=>'form-control','id'=>'name', 'size'=>30,'maxlength'=>100)); 
                          }
                          else
                          {
                            echo $form->textField($model,'name', array('placeholder'=>'Choose From Parent Type', 'class'=>'form-control','id'=>'name', 'size'=>30,'maxlength'=>100));

                            echo $form->hiddenField($model,'leads_id',array('class'=>'form-control','id'=>'leads_id','size'=>60,'maxlength'=>50));

                            echo $form->error($model,'name');
                          }
                        ?>
                      </div>             

                        <br>

                      <!-- Label Product Category -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php 
                          if(
                              Yii::app()->user->getState('groupName')=='am'||
                              Yii::app()->user->getState('groupName')=='bd'||
                              Yii::app()->user->getState('groupName')=='development'
                            )
                          {
                            echo $form->labelEX($model, 'product_category', array('label'=>'Product Category'));

                            echo $form->dropDownList($model, 'product_category',array(
                            'B2B' =>  'B2B',
                            'B2C' =>  'B2C',
                            ),
                              array('class'=>'form-control', 'id'=>'product_category')
                            );

                            echo $form->error($model,'product_category');
                          }
                          else
                          {
                            echo $form->labelEX($model, 'product_category', array('hidden'=>true,'label'=>'Product Category'));

                            echo $form->dropDownList($model, 'product_category',array(
                            'B2B' =>  'B2B',
                            'B2C' =>  'B2C',
                            ),
                              array('hidden'=>true,'class'=>'form-control', 'id'=>'product_category')
                            );

                            echo $form->error($model,'product_category');
                          }
                        ?>
                      </div>

                      <!-- Label General Product Description -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'general_product_description', array('label'=>'General Product Description')); ?>
                        	
                        <?php 
                          if(
                              Yii::app()->user->getState('groupName')=='sd'||
                              Yii::app()->user->getState('groupName')=='gm'
                            )
                          {
                            echo $form->textField($model,'general_product_description', array('readonly'=>true,'class'=>'form-control','id'=>'general_product_description', 'size'=>30,'maxlength'=>100));
                          }
                          else
                          {
                           echo $form->textField($model,'general_product_description', array('class'=>'form-control','id'=>'general_product_description', 'size'=>30,'maxlength'=>100));

                           echo $form->error($model,'general_product_description'); 
                          }
                        ?>
                      </div>

                      <!-- Label Monthly GMV ( Gross Merchandise Value ) -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'monthly_gmv_client', array('label'=>'Monthly GMV ( Gross Merchandise Value )')); ?>
                        	
                        <?php
                          if(
                              Yii::app()->user->getState('groupName')=='sd'||
                              Yii::app()->user->getState('groupName')=='gm'
                            )
                          { 
                            echo $form->textField($model,'monthly_gmv_client', array('readonly'=>true,'placeholder'=>'Rp.', 'class'=>'form-control','id'=>'monthly_gmv_client', 'size'=>30,'maxlength'=>100)); 
                          }
                          else
                          {
                            echo $form->textField($model,'monthly_gmv_client', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'monthly_gmv_client', 'size'=>30,'maxlength'=>100)); 

                            echo $form->error($model,'monthly_gmv_client');
                          }
                        ?>
                      </div>

                      <!-- Label AOV ( Average Order Value ) -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'aov_client', array('label'=>'AOV ( Average Order Value )')); ?>
                        	
                        <?php
                          if(
                              Yii::app()->user->getState('groupName')=='sd'||
                              Yii::app()->user->getState('groupName')=='gm'
                            ) 
                          {
                            echo $form->textField($model,'aov_client', array('readonly'=>true,'placeholder'=>'Rp.', 'class'=>'form-control','id'=>'aov_client', 'size'=>30,'maxlength'=>100)); 
                          }
                          else
                          {
                            echo $form->textField($model,'aov_client', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'aov_client', 'size'=>30,'maxlength'=>100));

                            echo $form->error($model,'aov_client');
                          }
                        ?>
                      </div>

                      <!-- Label AIPO ( Average Item Per Order) -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'aipo_client', array('label'=>'AIPO ( Average Item Per Order )')); ?>
                        	
                        <?php 
                          if(
                            Yii::app()->user->getState('groupName')=='sd'||
                            Yii::app()->user->getState('groupName')=='gm'
                            )
                          {
                            echo $form->textField($model,'aipo_client', array('readonly'=>true,'onchange'=>'AutoAverageAPPI()', 'placeholder'=>'Input Qty', 'class'=>'form-control','id'=>'aipo_client', 'size'=>30,'maxlength'=>100)); 
                          }
                          else
                          {
                            echo $form->textField($model,'aipo_client', array('onchange'=>'AutoAverageAPPI()', 'placeholder'=>'Input Qty', 'class'=>'form-control','id'=>'aipo_client', 'size'=>30,'maxlength'=>100));

                            echo $form->error($model,'aipo_client');
                          }
                        ?>
                      </div>

                      <!-- Label Monthly Sales Order -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'mso_client', array('label'=>'Monthly Sales Order')); ?>
                        	
                        <?php
                          if(
                            Yii::app()->user->getState('groupName')=='sd'||
                            Yii::app()->user->getState('groupName')=='gm'
                            )
                          { 
                            echo $form->textField($model,'mso_client', array('readonly'=>true,'onchange'=>'AutoSumMISV()', 'placeholder'=>'Input Qty', 'class'=>'form-control','id'=>'mso_client', 'size'=>30,'maxlength'=>100)); 
                          }
                          else
                          {
                            echo $form->textField($model,'mso_client', array('onchange'=>'AutoSumMISV()', 'placeholder'=>'Input Qty', 'class'=>'form-control','id'=>'mso_client', 'size'=>30,'maxlength'=>100));

                            echo $form->error($model,'mso_client'); 
                          }
                        ?>
                      </div>

                      <!-- Label APPI ( Average Price Per Item) -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'appi_client', array('label'=>'APPI ( Average Price Per Item )')); ?>
                        	
                        <?php echo $form->textField($model,'appi_client', array('readonly'=>true, 'placeholder'=>'Rp. Auto Average ( AOV : AIPO )', 'class'=>'form-control','id'=>'appi_client', 'size'=>30,'maxlength'=>100)); ?>
                     
                        <?php echo $form->error($model,'appi_client'); ?>
                      </div>

                       <!-- Label Monthly Item Sold Volume -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'misv_client', array('label'=>'Monthly Item Sold Volume')); ?>
                        	
                        <?php echo $form->textField($model,'misv_client', array('readonly'=>true, 'placeholder'=>'Rp. Auto SUM ( MSO x AIPO )', 'class'=>'form-control','id'=>'misv_client', 'size'=>30,'maxlength'=>100)); ?>
                     
                        <?php echo $form->error($model,'misv_client'); ?>
                      </div>

                        <!-- Label Remarks First Mile Delivery -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'remarks_fmd', array('label'=>'First Mile Delivery')); ?>

                        <?php 
                          if(
                              Yii::app()->user->getState('groupName')=='sd'||
                              Yii::app()->user->getState('groupName')=='gm'
                            )
                          {
                            echo $form->textArea($model, 'remarks_fmd', array('readonly'=>true,'id'=>'remarks_fmd', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); 
                          }
                          else
                          {
                            echo $form->textArea($model, 'remarks_fmd', array('id'=>'remarks_fmd', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                          }
                        ?>
                      </div>

                     <!-- Label Remarks Last Mile Delivery -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'remarks_lmd', array('label'=>'Last Mile Delivery')); ?>

                        <?php 
                          if(
                            Yii::app()->user->getState('groupName')=='sd'||
                            Yii::app()->user->getState('groupName')=='gm'
                            )
                          {
                            echo $form->textArea($model, 'remarks_lmd', array('readonly'=>true,'id'=>'remarks_lmd', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); 
                          }
                          else
                          {
                            echo $form->textArea($model, 'remarks_lmd', array('id'=>'remarks_lmd', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                          }
                        ?>
                        <br>
                      </div>

                     <br>

                    <?php if(Yii::app()->controller->action->id=='update') { ?>

                    <?php if(Yii::app()->user->getState('groupName')!='sd'){ ?>
                     <h3><center>Business Assumption</center></h3>

                     <br>

                     <!-- Label Location -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
  	                    <?php echo $form->labelEX($model,'location_name', array('label'=>'LOCATION')); ?>

            						<?php $cat = CHtml::listData(Location::model()->findAll(), 'name', 'name'); ?>

            						<?php echo $form->dropDownList($model,'location_name', $cat, array('id'=>'location_id','empty'=>"Select Location",'class'=>'form-control')); ?>

                        <?php echo $form->hiddenField($model, 'location_id', array('class'=>'form-control', 'id'=>'location_id'));?>

            						<?php echo $form->error($model,'location_id'); ?>
                      </div>

                     <!-- Button Add Location -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'addlocation', array('label'=>'Action')); ?>

                        <br>

                        <?php echo CHtml::Button('Add Location', array('class'=>'btn btn-info', 'name'=>'addlocation','id'=>'addlocation')); ?>
                      </div>

                        <div class="col-md-12 col-sm-12">
                          <div class="box-body">
                            <caption>Preview</caption>
      						            <table class="table table-striped table-hover table-bordered table-condensed" id="preview_location">
            						        <thead>
            						          <tr>
            						            <th style="display:none;">Id</th>
            						            <th>Location</th>
            						            <th>Action</th>
            						          </tr>
                                  <tr>
                                  <?php if($locationoppurtunity){ 
                                   foreach ($locationoppurtunity as $data) {
                                     echo "<td style='display:none;'>".$data->opportunity_location_id."
                                     <input type='hidden' name='".$data->opportunity_location_id."' value='".$data->opportunity_location_id."'></td>
                                      <td>".$data->location->name."</td>

                                      <td><input type='button' value='Delete' onclick='DeleteRowLocation(this)'/></td>
                                      </tr>";
                                     }}?>
            						        </thead>
      						            </table>
        					        </div>
                        </div>
                    <?php } ?>

                     <br>

                    <table border="0" cellpadding="15">
                      <tr>
                        <td><h4><b>Product Sizing</b></h4></td>
                        <td><h4><b>&nbsp;&nbsp;Precentage</b></h4></td>
                        <td><h4><b>&nbsp;&nbsp;Description</b></h4></td>
                      </tr>

                      <tr>
                        <td>Very Small Item</td>
                        <td>
                           <!-- Label Persentage Very Small Item -->
                          <div class="col-md-6 col-sm-6">
	                          <?php 
                              if(Yii::app()->user->getState('groupName')=='gm')
                              {
                                echo $form->textField($model,'very_small_item', array('readonly'=>true,'onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'very_small_item', 'size'=>30,'maxlength'=>100)); 
                              }
                              else
                              {
                                echo $form->textField($model,'very_small_item', array('onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'very_small_item', 'size'=>30,'maxlength'=>100)); 

                                echo $form->error($model,'very_small_item');
                              }
                            ?>
                          </div>
                        </td>

                        <td>
                           <!-- Label Remarks Persentage Very Small Item -->
                          <div class="col-md-12 col-sm-12">
                          	<?php echo $form->textField($model,'remarks_very_small_item', array('readonly'=>true, 'placeholder'=>'10cm x 10cm x 10cm, Or 0,3Kg', 'class'=>'form-control','id'=>'very_small_item', 'size'=>30,'maxlength'=>100)); ?>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td>Small Item</td>
                        <td>
                           <!-- Label Persentage Small Item -->
                          <div class="col-md-6 col-sm-6">
	                          <?php 
                              if(Yii::app()->user->getState('groupName')=='gm')
                              {
                                echo $form->textField($model,'small_item', array('readonly'=>true,'onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'small_item', 'size'=>30,'maxlength'=>100)); 
                              }
                              else
                              {
                               echo $form->textField($model,'small_item', array('onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'small_item', 'size'=>30,'maxlength'=>100)); 

                               echo $form->error($model,'small_item');
                              }
                            ?>
                          </div>
                        </td>

                        <td>
                           <!-- Label Remarks Persentage Small Item -->
                          <div class="col-md-12 col-sm-12">
                          	<?php echo $form->textField($model,'remarks_small_item', array('readonly'=>true, 'placeholder'=>'20cm x 20cm x 20cm, Or 1Kg', 'class'=>'form-control','id'=>'remarks_small_item', 'size'=>30,'maxlength'=>100)); ?>
                          </div>
                        </td>

                      </tr>

                      <tr>
                        <td>Medium Item</td>
                        <td>
                           <!-- Label Persentage Medium Item -->
                          <div class="col-md-6 col-sm-6">
	                          <?php 
                              if(Yii::app()->user->getState('groupName')=='gm')
                              {
                                echo $form->textField($model,'medium_item', array('readonly'=>true,'onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'medium_item', 'size'=>30,'maxlength'=>100));
                              }
                              else
                              {
                                echo $form->textField($model,'medium_item', array('onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'medium_item', 'size'=>30,'maxlength'=>100));

                                echo $form->error($model,'medium_item');
                              }
                              ?>
                          </div>
                        </td>

                        <td>
                           <!-- Label Remarks Persentage Medium Item -->
                          <div class="col-md-12 col-sm-12">
                          	<?php echo $form->textField($model,'remarks_medium_item', array('readonly'=>true, 'placeholder'=>'30cm x 30cm x 30cm, Or 8,4Kg', 'class'=>'form-control','id'=>'remarks_medium_item', 'size'=>30,'maxlength'=>100)); ?>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td>Large Item</td>
                        <td>
                           <!-- Label Persentage Large Item -->
                          <div class="col-md-6 col-sm-6">
	                          <?php
                              if(Yii::app()->user->getState('groupName')=='gm')
                              {
                               echo $form->textField($model,'large_item', array('readonly'=>true,'onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'large_item', 'size'=>30,'maxlength'=>100));
                              }
                              else
                              {
                                echo $form->textField($model,'large_item', array('onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'large_item', 'size'=>30,'maxlength'=>100));

                                echo $form->error($model,'large_item');
                              }
                              ?>
                          </div>
                        </td>

                        <td>
                           <!-- Label Remarks Persentage Large Item -->
                          <div class="col-md-12 col-sm-12">
                          	<?php echo $form->textField($model,'remarks_large_item', array('readonly'=>true, 'placeholder'=>'50cm x 50cm x 50cm, Or 20Kg', 'class'=>'form-control','id'=>'remarks_large_item', 'size'=>30,'maxlength'=>100)); ?>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td>Very Large Item</td>
                        <td>
                           <!-- Label Persentage Very Large Item -->
                          <div class="col-md-6 col-sm-6">
	                          <?php 
                              if(Yii::app()->user->getState('groupName')=='gm')
                              {
                                echo $form->textField($model,'very_large_item', array('readonly'=>true,'onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'very_large_item', 'size'=>30,'maxlength'=>100));
                              }	                       
                              else
                              {
                                echo $form->textField($model,'very_large_item', array('onchange'=>'AutoSumPrecentage()','placeholder'=>'%', 'class'=>'form-control','id'=>'very_large_item', 'size'=>30,'maxlength'=>100));

                                echo $form->error($model,'very_large_item');
                              }
	                          ?>
                          </div>
                        </td>

                        <td>
                           <!-- Label Remarks Persentage Very Large Item -->
                          <div class="col-md-12 col-sm-12">
                          	<?php echo $form->textField($model,'remarks_very_large_item', array('readonly'=>true, 'placeholder'=>'More than 50cm x 50cm x 50cm', 'class'=>'form-control','id'=>'remarks_very_large_item', 'size'=>30,'maxlength'=>100)); ?>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td><h5><b>Total</b></h5></td>
                        <td>
                           <!-- Label Precentage Total -->
                          <div class="col-md-6 col-sm-6">
	                          <?php echo $form->textField($model,'total', array('readonly'=>true, 'placeholder'=>'%', 'class'=>'form-control','id'=>'total', 'size'=>30,'maxlength'=>100)); ?>
	                       
	                          <?php echo $form->error($model,'total'); ?>
                          </div>
                        </td>
                      </tr>
                    </table>

                    <br>

                    <?php if(Yii::app()->user->getState('groupName')!='gm'){?>
                     <!-- Label Size -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'size', array('label'=>'<b>SIZE</b>')); ?>
                          
                        <?php echo $form->dropDownList($model, 'size',array(
                          // Yg Kiri buat dimasukin ke DB < > Yg kanan Output tampilan webnya
                          '10 cm x 10 cm x 10 cm, Or 0,3 Kg' =>  'Very Small Item',
                          '20 cm x 20 cm x 20 cm, Or 1 Kg'   =>  'Small Item',
                          '30 cm x 30 cm x 30 cm, Or 8,4 Kg' =>  'Medium Item',
                          '50 cm x 50 cm x 50 cm, Or 20 Kg'  =>  'Large Item',
                          'More than 50 cm x 50 cm x 50 cm'  =>  'Very Large Item'
                        ),
                        array(
                          'class'=>'form-control', 'id'=>'size')
                         );
                         ?>

                         <?php echo $form->hiddenField($model,'opportunity_charge_activity_id',array('class'=>'form-control','id'=>'opportunity_charge_activity_id')) ;?>
                         <?php echo $form->error($model,'size'); ?>
                      </div>

                      <!-- Label Product Category -->
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'product_description', array('label'=>'<b>PRODUCT DESCRIPTION</b>')); ?>
                          
                        <?php echo $form->dropDownList($model, 'product_description',array(
                          'Accessories' =>  'Accessories',
                          'Apparel'     =>  'Apparel',
                          'Bag'         =>  'Bag',
                          'Cosmetic'    =>  'Cosmetic',
                          'Electronics' =>  'Electronics',
                          'FMCG'        =>  'FMCG',
                          'General'     =>  'General',
                          'Other'       =>  'Other',
                          'Shoes'       =>  'Shoes',
                        ),
                        array(
                          'class'=>'form-control', 'id'=>'product_description')
                         );
                         ?>

                         <?php echo $form->error($model,'product_description'); ?>
                      </div>

                      <table cellpadding="15">
                          <tr>
                            <td><h6><b>Charge Activity</b></h6></td>
                            <td><h6><b>&nbsp;Volume<br>&nbsp;Assumption/Month</b></h6></td>
                            <td><h6><b>&nbsp;Stock&nbsp;Unit</b></h6></td>
                            <td><h6><b>&nbsp;Rate IDR</b></h6></td>
                            <td><h6><b>&nbsp;% Revenue<br>&nbsp;Sharing</b></h6></td>
                            <td><h6><b>&nbsp;Remarks</b></h6></td>
                          </tr>

                          <tr>
                            <td>Inbound</td>
                            <td>
                              <!-- Label VAM Inbound -->
                              <div class="col-md-8 col-sm-8">
    	                          <?php echo $form->textField($model,'vam_inbound', array('placeholder'=>'Qty', 'class'=>'form-control','id'=>'vam_inbound', 'size'=>30,'maxlength'=>100)); ?>

    	                          <?php echo $form->error($model,'vam_inbound'); ?>
                              </div>
                            </td>
                            <td>
    	                        <!-- Label UOM ( Stock Unit )Inbound  -->
    	                        <div class="col-md-13 col-sm-13 form-group has-feedback">
    		                        <?php echo $form->dropDownList($model, 'uom_inbound',array(
    		                          'Box' =>  'Box',
    		                          'Pcs' =>  'Pcs',
    		                        ),
    		                        array(
    		                          'class'=>'form-control', 'id'=>'uom_inbound')
    		                         );
    		                         ?>
    		                         <?php echo $form->hiddenField($model,'uom_inbound',array('class'=>'form-control','id'=>'uom_inbound')) ;?>

    		                         <?php echo $form->error($model,'uom_inbound'); ?>
    		                     </div>         
                            </td>
                            <td>
                              <!-- Label Rate Idr Inbound -->
                              <div class="col-md-10 col-sm-10">
    	                          <?php echo $form->textField($model,'rate_idr_inbound', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'rate_idr_inbound', 'size'=>30,'maxlength'=>100)); ?>

    	                          <?php echo $form->error($model,'rate_idr_inbound'); ?>
                              </div>
                            </td>
                            <td>
                              <!-- Label %Revenue Sharing Inbound -->
                              <div class="col-md-8 col-sm-8">
    	                          <?php echo $form->textField($model,'revenue_sharing_inbound', array('placeholder'=>'%', 'class'=>'form-control','id'=>'revenue_sharing_inbound', 'size'=>30,'maxlength'=>100)); ?>

    	                          <?php echo $form->error($model,'revenue_sharing_inbound'); ?>
                              </div>
                            </td>
                            <td>
                            	<!-- Label Remarks Inbound -->
    		                    <?php echo $form->textArea($model, 'remarks_inbound', array('id'=>'remarks_inbound', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
                     		     </td>
                          </tr>
                          <tr>
                            <td>Outbound</td>
                            <td>
                              <!-- Label VAM Outbound -->
                              <div class="col-md-8 col-sm-8">
    	                          <?php echo $form->textField($model,'vam_outbound', array('placeholder'=>'Qty', 'class'=>'form-control','id'=>'vam_outbound', 'size'=>30,'maxlength'=>100)); ?>

    	                          <?php echo $form->error($model,'vam_outbound'); ?>
                              </div>
                            </td>
                            <td>
    	                        <!-- Label UOM ( Stock Unit ) Outbound  -->
    	                        <div class="col-md-13 col-sm-13 form-group has-feedback">
    		                        <?php echo $form->dropDownList($model, 'uom_outbound',array(
    		                          'Box' =>  'Box',
    		                          'Pcs' =>  'Pcs',
    		                        ),
    		                        array(
    		                          'class'=>'form-control', 'id'=>'uom_outbound')
    		                         );
    		                         ?>
    		                         <?php echo $form->hiddenField($model,'uom_outbound',array('class'=>'form-control','id'=>'uom_outbound')) ;?>
    		                         <?php echo $form->error($model,'uom_outbound'); ?>
    		                     </div>         
                            </td>
                            <td>
                              <!-- Label Rate Idr Outbound -->
                              <div class="col-md-10 col-sm-10">
    	                          <?php echo $form->textField($model,'rate_idr_outbound', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'rate_idr_outbound', 'size'=>30,'maxlength'=>100)); ?>

    	                          <?php echo $form->error($model,'rate_idr_outbound'); ?>
                              </div>
                            </td>
                            <td>
                              <!-- Label %Revenue Sharing Outbound -->
                              <div class="col-md-8 col-sm-8">
    	                          <?php echo $form->textField($model,'revenue_sharing_outbound', array('placeholder'=>'%', 'class'=>'form-control','id'=>'revenue_sharing_outbound', 'size'=>30,'maxlength'=>100)); ?>

    	                          <?php echo $form->error($model,'revenue_sharing_outbound'); ?>
                              </div>
                            </td>
                            <td>
                            	<!-- Label Remarks Outbound -->
    		                      <?php echo $form->textArea($model, 'remarks_outbound', array('id'=>'remarks_outbound', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
                     		     </td>
                          </tr>
                          <tr>
                            <td>Storage</td>
                            <td>
                              <!-- Label VAM Storage -->
                              <div class="col-md-8 col-sm-8">
    	                          <?php echo $form->textField($model,'vam_storage', array('placeholder'=>'Qty', 'class'=>'form-control','id'=>'vam_storage', 'size'=>30,'maxlength'=>100)); ?>

    	                          <?php echo $form->error($model,'vam_storage'); ?>
                              </div>
                            </td>
                            <td>
    	                        <!-- Label UOM ( Stock Unit ) Storage  -->
    	                        <div class="col-md-13 col-sm-13 form-group has-feedback">
    		                        <?php echo $form->dropDownList($model, 'uom_storage',array(
    		                          'Box' =>  'Box',
    		                          'Pcs' =>  'Pcs',
    		                        ),
    		                        array(
    		                          'class'=>'form-control', 'id'=>'uom_storage')
    		                         );
    		                         ?>
    		                         <?php echo $form->hiddenField($model,'uom_storage',array('class'=>'form-control','id'=>'uom_storage')) ;?>
    		                         <?php echo $form->error($model,'uom_storage'); ?>
    		                     </div>         
                            </td>
                            <td>
                              <!-- Label Rate Idr Storage -->
                              <div class="col-md-10 col-sm-10">
    	                          <?php echo $form->textField($model,'rate_idr_storage', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'rate_idr_storage', 'size'=>30,'maxlength'=>100)); ?>

    	                          <?php echo $form->error($model,'rate_idr_storage'); ?>
                              </div>
                            </td>
                            <td>
                              <!-- Label %Revenue Sharing Storage -->
                              <div class="col-md-8 col-sm-8">
    	                          <?php echo $form->textField($model,'revenue_sharing_storage', array('placeholder'=>'%', 'class'=>'form-control','id'=>'revenue_sharing_storage', 'size'=>30,'maxlength'=>100)); ?>

    	                          <?php echo $form->error($model,'revenue_sharing_storage'); ?>
                              </div>	
                            </td>
                            <td>
                            	<!-- Label Remarks Storage -->
    		                      <?php echo $form->textArea($model, 'remarks_storage', array('id'=>'remarks_storage', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
                     		     </td>
                          </tr>

                          <tr>
                            <td>AIPO</td>
                            <td>
                              <!-- Label VAM AIPO -->
                              <div class="col-md-8 col-sm-8">
    	                          <?php echo $form->textField($model,'aipo_charge', array('placeholder'=>'Qty', 'class'=>'form-control','id'=>'aipo_charge', 'size'=>30,'maxlength'=>100)); ?>
    	                       
    	                          <?php echo $form->error($model,'aipo_charge'); ?>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td>APPI</td>

                            <td>
                              <!-- Label VAM APPI -->
                              <div class="col-md-8 col-sm-8">
    	                          <?php echo $form->textField($model,'appi_charge', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'appi_charge', 'size'=>30,'maxlength'=>100)); ?>
    	                       
    	                          <?php echo $form->error($model,'appi_charge'); ?>
                              </div>
                            </td>

                            <td>
                              <!-- Button Add Charge Activity -->
                              <?php echo CHtml::Button('Add Charge Activity', array('class'=>'btn btn-info', 'name'=>'addchargeactivity','id'=>'addchargeactivity')); ?>
                            </td>
                          </tr>
                      </table>

                      <div class="col-md-12 col-sm-12">
                        <div class="box-body">
                          <caption>Preview</caption>
                            <table class="table table-striped table-hover table-bordered table-condensed" id="preview_chargeactivity">
                              <thead>
                                <tr>
                                  <th style="display:none;">Id</th>
                                  <th>Size</th>
                                  <th>Product Description</th>
                                  <th>Vol. Inbound</th>
                                  <th>Vol. Outbound</th>
                                  <th>Vol. Storage</th>
                                  <th>AIPO</th>
                                  <th>APPI</th>
                                  <th>Action</th>
                                </tr>
                                <tr>
                                  <?php if($chargeactivityoppurtunity){ 
                                   foreach ($chargeactivityoppurtunity as $data) {
                                     echo "<td style='display:none;'>".$data->opportunity_charge_activity_id."
                                     <input type='hidden' name='".$data->opportunity_charge_activity_id."' value='".$data->opportunity_charge_activity_id."'></td>
                                     <td>".$data->size."</td>
                                     <td>".$data->product_description."</td>
                                     <td>".$data->vam_inbound."</td>
                                     <td>".$data->vam_outbound."</td>
                                     <td>".$data->vam_storage."</td>
                                     <td>".$data->aipo_charge."</td>
                                     <td>".$data->appi_charge."</td>

                                     <td><input type='button' value='Delete' onclick='DeleteRowChargeActivity(this)'/></td>
                                     </tr>";
                                    }
                                  }?>
                              </thead>
                            </table>
                        </div>
                      </div>
                    <?php } ?>

                     <table border="0" cellpadding="15">
                        <tr>
                          <td><h6><b>Charge Point</b></h6></td>
                          <td><h6><b>&nbsp;&nbsp;Rate_IDR</b></h6></td>
                          <td><h6><b>&nbsp;Remarks</b></h6></td>
                        </tr>
                        <tr>
                          <td>First Mile Delivery</td>
                          <td>
                             <!-- Label First Mile Delivery Rate_IDR -->
                            <div class="col-md-8 col-sm-8">
                              <?php
                                if(Yii::app()->user->getState('groupName')=='gm')
                                {
                                 echo $form->textField($model,'fmd_rateidr', array('readonly'=>true,'placeholder'=>'Rp.', 'class'=>'form-control','id'=>'fmd_rateidr', 'size'=>30,'maxlength'=>100));
                                }
                                else
                                {
                                 echo $form->textField($model,'fmd_rateidr', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'fmd_rateidr', 'size'=>30,'maxlength'=>100)); 

                                 echo $form->error($model,'fmd_rateidr');
                                }
                              ?>
                            </div>
                          </td>
                          <td>
                            <!-- Label Remarks First Mile Delivery Rate_IDR -->
                            <div class="col-md-16 col-sm-16  form-group has-feedback">
                            <?php
                              if(Yii::app()->user->getState('groupName')=='gm')
                              {
                                echo $form->textArea($model,'remarks_fmd_rateidr', array('readonly'=>true,'id'=>'remarks_fmd_rateidr', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                              } 
                              else
                              {
                                echo $form->textArea($model,'remarks_fmd_rateidr', array('id'=>'remarks_fmd_rateidr', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                              }
                              ?>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Last Mile Delivery</td>
                           <td>
                             <!-- Label Last Mile Delivery Rate_IDR -->
                              <div class="col-md-8 col-sm-8">
                                <?php 
                                  if(Yii::app()->user->getState('groupName')=='gm')
                                  {
                                    echo $form->textField($model,'lmd_rateidr', array('readonly'=>true,'placeholder'=>'Rp.', 'class'=>'form-control','id'=>'lmd_rateidr', 'size'=>30,'maxlength'=>100));
                                  }
                                  else
                                  {
                                    echo $form->textField($model,'lmd_rateidr', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'lmd_rateidr', 'size'=>30,'maxlength'=>100));

                                    echo $form->error($model,'lmd_rateidr'); 
                                  }
                                ?>
                              </div>
                            </td>

                          <td >
                            <!-- Label Remarks Last Mile Delivery Rate_IDR -->
                            <div class="col-md-16 col-sm-16  form-group has-feedback">
                              <?php 
                                if(Yii::app()->user->getState('groupName')=='gm')
                                {
                                  echo $form->textArea($model, 'remarks_lmd_rateidr', array('readonly'=>true,'id'=>'remarks_lmd_rateidr', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                                }
                                else
                                {
                                  echo $form->textArea($model, 'remarks_lmd_rateidr', array('id'=>'remarks_lmd_rateidr', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                                }
                              ?>
                            </div>
                          </td>
                        </tr>
                     </table>

                      <!-- Label Store Operation -->
                      <div class="col-md-8 col-sm-8  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'store_operation', array('label'=>'Store Operation')); ?>
                          
                        <?php
                          if(Yii::app()->user->getState('groupName')=='gm')
                          {
                             echo $form->textField($model,'store_operation', array('readonly'=>true,'placeholder'=>'Rp.', 'class'=>'form-control','id'=>'store_operation', 'size'=>30,'maxlength'=>100));
                          }
                          else
                          {
                            echo $form->textField($model,'store_operation', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'store_operation', 'size'=>30,'maxlength'=>100));

                            echo $form->error($model,'store_operation');
                          }
                        ?>
                      </div>

                      <br>

                      <!-- Label Remarks Store Operation -->
                       <div class="col-md-8 col-sm-8  form-group has-feedback">
                          <?php echo $form->labelEX($model, 'remarks_store_operation', array('label'=>'Description Store Operation')); ?>

                          <?php 
                            if(Yii::app()->user->getState('groupName')=='gm')
                            {
                              echo $form->textArea($model, 'remarks_store_operation', array('readonly'=>true,'id'=>'remarks_store_operation', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                            }
                            else
                            {
                              echo $form->textArea($model, 'remarks_store_operation', array('id'=>'remarks_store_operation', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                            }
                            ?>
                       </div>

                       <br>

                       <!-- Label Management Fee -->
                      <div class="col-md-8 col-sm-8  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'management_fee', array('label'=>'Management Fee')); ?>
                          
                        <?php
                          if(Yii::app()->user->getState('groupName')=='gm')
                          {
                             echo $form->textField($model,'management_fee', array('readonly'=>true,'placeholder'=>'Rp.', 'class'=>'form-control','id'=>'management_fee', 'size'=>30,'maxlength'=>100));
                          }
                          else
                          {
                           echo $form->textField($model,'management_fee', array('placeholder'=>'Rp.', 'class'=>'form-control','id'=>'management_fee', 'size'=>30,'maxlength'=>100)); 

                           echo $form->error($model,'management_fee');
                          }
                        ?>
                      </div>

                      <!-- Label Remarks Management Fee -->
                       <div class="col-md-8 col-sm-8  form-group has-feedback">
                          <?php echo $form->labelEX($model, 'remarks_management_fee', array('label'=>'Description Management Fee')); ?>

                          <?php
                            if(Yii::app()->user->getState('groupName')=='gm')
                            {
                               echo $form->textArea($model, 'remarks_management_fee', array('readonly'=>true,'id'=>'remarks_management_fee', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                            }
                            else
                            {
                              echo $form->textArea($model, 'remarks_management_fee', array('id'=>'remarks_management_fee', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100));
                            }
                            ?>
                       </div>

                       <!-- Label Adds On -->
                      <?php if(Yii::app()->user->getState('groupName')!='gm'){?> 
                      <div class="col-md-8 col-sm-8  form-group has-feedback">
                        <?php echo $form->labelEX($model, 'adds_on', array('label'=>'Adds On')); ?>
                          
                        <?php echo $form->dropDownList($model, 'adds_on',array(
                          'Additional Bubblewrap'           =>  'Additional Bubblewrap',
                          'Additional Packaging ( box )'    =>  'Additional Packaging ( box )',
                          'Additional Packaging ( other )'  =>  'Additional Packaging ( other )',
                          'Cold Storage'                    =>  'Cold Storage',
                          'High Value Storage'              =>  'High Value Storage',
                          'Insurance'                       =>  'Insurance',
                          'Kitting or Bundling Rate'        =>  'Kitting or Bundling Rate',
                          'Other'                           =>  'Other',
                          'Special QC Check'                =>  'Special QC Check'
                        ),
                        array(
                          'class'=>'form-control', 'id'=>'adds_on')
                         );
                         ?>

                         <?php echo $form->hiddenField($model,'adds_on',array('class'=>'form-control','id'=>'adds_on')) ;?>

                         <?php echo $form->error($model,'adds_on'); ?>
                      </div>

                      <!-- Label Remarks Adds On -->
                       <div class="col-md-8 col-sm-8  form-group has-feedback">
                          <?php echo $form->labelEX($model, 'remarks_adds_on', array('label'=>'Description Adds On')); ?>

                          <?php echo $form->textArea($model, 'remarks_adds_on', array('id'=>'remarks_adds_on', 'class'=>'form-control', 'cols'=>30, 'size'=>60, 'maxlength'=>100)); ?>
                       </div>

                       <div class="col-md-4 col-sm-4  form-group has-feedback">
                          <br><br>
                          <?php echo CHtml::Button('Accept Adds On', array('class'=>'btn btn-info', 'name'=>'accept_adds_on','id'=>'accept_adds_on')); ?>
                       </div>

                       <br>

                      <div class="col-md-12 col-sm-12">
                        <div class="box-body">
                          <table class="table table-striped table-hover table-bordered table-condensed" id="preview_adds_on">
                            <thead>
                              <tr>
                                <th style="display:none;">Id</th>
                                <th>Adds On</th>
                                <th>Description Adds On</th>
                                <th>Action</th>
                              </tr>
                              <tr>
                                <?php if($addsonoppurtunity){ 
                                 foreach ($addsonoppurtunity as $data) {
                                   echo "<td style='display:none;'>".$data->opportunity_adds_on_id."
                                   <input type='hidden' name='".$data->opportunity_adds_on_id."' value='".$data->opportunity_adds_on_id."'></td>
                                   <td>".$data->adds_on."</td>
                                   <td>".$data->remarks_adds_on."</td>

                                    <td><input type='button' value='Delete' onclick='DeleteRowAddsOn(this)'/></td>
                                    </tr>";
                                   }}?>
                            </thead>
                          </table>
                        </div>
                      </div>
                    <?php }?>

                      <!-- <br><h3>Term Condition</h3> -->
                      <!-- <div class="col-md-8 col-sm-8 form-group has-feedback"> -->
                          <?php 
                          // echo $form->textArea($model, 'term_condition', array('id'=>'term_condition', 'class'=>'form-control', 'cols'=>100, 'size'=>500, 'maxlength'=>500)); 
                          ?>
                      <!-- </div> -->

                    <?php } ?>

                      <!-- Button Add Location -->
                     <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <br>
                          <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class'=>'btn btn-success')); ?>
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
    $('#demo-form2').on('submit', function(e)
    {
      e.preventDefault();
      return false;
    });
    jQuery('#addchargeactivity').click(function()
    {
      AddChargeActivity();
    });

    jQuery('#accept_adds_on').click(function()
    {
      AcceptAddsOn();
    });

    jQuery('#addlocation').click(function()
    {
      AddLocation();
    });
  });

    jQuery("#name").autocomplete(
    {
      source: '<?php
      echo Yii::app()->createAbsoluteUrl("Custom/LeadsOpportunity");?>',
      select: function(event, ui)
      {
        if (ui.item.label == "No result found")
          event.preventDefault();
        else
        {
          $("#name").val(ui.item.id);
        }
      },
      focus: function (event, ui)
      {
        if (ui.item.label == "No result found")
          event.preventDefault();
      }
    });

    function AutoAverageAPPI()
    {
      var aov_client        = $('#aov_client').val();
      var aipo_client       = $('#aipo_client').val();

      // alert(aipo_client);die();
        $('#appi_client').val(aov_client/aipo_client);
    }

    function AutoSumMISV()
    {
      var mso_client  = $('#mso_client').val();
      var aipo_client = $('#aipo_client').val();

      $('#misv_client').val(mso_client*aipo_client);
    }

    function AutoSumPrecentage()
    {
      var very_small_item   = $('#very_small_item').val();
      var small_item        = $('#small_item').val();
      var medium_item       = $('#medium_item').val();
      var large_item        = $('#large_item').val();
      var very_large_item   = $('#very_large_item').val();
      var total             = $('#total').val();

      $('#total').val(parseInt(very_small_item)+parseInt(small_item)+parseInt(medium_item)+parseInt(large_item)+parseInt(very_large_item));

      if($('#total').val() > 100)
      {
        alert("error: Total Precentage tidak boleh melebihi dari 100%");
        $('#total').val('');
      }
    }

    function AddLocation()
    {
      var opportunity_id          = $('#opportunity_id').val();
      var opportunity_location_id = $('#opportunity_location_id').val();
      var location_name           = $('#location_name').val();
      var location_id             = $('#location_id').val();

      var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/AddLocation");?>';
      jQuery.ajax(
        {
          type: 'POST',
          async: false,
          dataType: "json",
          url: uri,
          data: {
                  opportunity_id          :   opportunity_id,
                  opportunity_location_id :   opportunity_location_id,
                  location_name           :   location_name,
                  location_id             :   location_id
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
              var key                   = msgs[1];
              var tablePreview          = $("#preview_location");
              var strContent            = "<tr>";

              strContent = strContent + "<td style='display:none;'>" + key + "<input type='hidden' name='key[]' value='"+ key +"'></td>";
              strContent = strContent + "<td>" + location_id + "<input type='hidden' name='location_id[]' value="+ location_id +"></td>";
              strContent = strContent + "<td><input type='button' value='Delete' onclick='DeleteRowLocation(this)'/></td>";
              strContent = strContent + "</tr>";

              tablePreview.prepend(strContent);
            }
            else
              alert('error:'+msgs[1]);
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
            j.unblockUI();
            alert(textStatus);
          }
        });
    }

    function DeleteRowLocation(row)
    {
      var i = row.parentNode.parentNode.rowIndex;
      var x = document.getElementById("preview_location").rows[i].cells[0].innerHTML;
      var res = x.split("<");
      var key_id = res[0];
      
      if(key_id != "")
      {

        var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/DeleteDetailLocation"); ?>';
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
              document.getElementById("preview_location").deleteRow(i);
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
        document.getElementById("preview_location").deleteRow(i);
    }

    function AddChargeActivity()
    {
      var opportunity_id                  = $('#opportunity_id').val();
      var opportunity_charge_activity_id  = $('#opportunity_charge_activity_id').val();
      var size                            = $('#size').val();
      var product_description             = $('#product_description').val();
      var vam_inbound                     = $('#vam_inbound').val();
      var uom_inbound                     = $('#uom_inbound').val();
      var rate_idr_inbound                = $('#rate_idr_inbound').val();
      var revenue_sharing_inbound         = $('#revenue_sharing_inbound').val();
      var remarks_inbound                 = $('#remarks_inbound').val();
      var vam_outbound                    = $('#vam_outbound').val();
      var uom_outbound                    = $('#uom_outbound').val();
      var rate_idr_outbound               = $('#rate_idr_outbound').val();
      var revenue_sharing_outbound        = $('#revenue_sharing_outbound').val();
      var remarks_outbound                = $('#remarks_outbound').val();
      var vam_storage                     = $('#vam_storage').val();
      var uom_storage                     = $('#uom_storage').val();
      var rate_idr_storage                = $('#rate_idr_storage').val();
      var revenue_sharing_storage         = $('#revenue_sharing_storage').val();
      var remarks_storage                 = $('#remarks_storage').val();
      var aipo_charge                     = $('#aipo_charge').val();
      var appi_charge                     = $('#appi_charge').val();

      var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/AddChargeActivity");?>';
       jQuery.ajax(
        {
          type: 'POST',
          async: false,
          dataType: "json",
          url: uri,
          data: {
                  opportunity_id                  : opportunity_id,
                  opportunity_charge_activity_id  : opportunity_charge_activity_id,
                  size                            : size,
                  product_description             : product_description,
                  vam_inbound                     : vam_inbound,
                  uom_inbound                     : uom_inbound,
                  rate_idr_inbound                : rate_idr_inbound,
                  revenue_sharing_inbound         : revenue_sharing_inbound,
                  remarks_inbound                 : remarks_inbound,
                  vam_outbound                    : vam_outbound,
                  uom_outbound                    : uom_outbound,
                  rate_idr_outbound               : rate_idr_outbound,
                  revenue_sharing_outbound        : revenue_sharing_outbound,
                  remarks_outbound                : remarks_outbound,
                  vam_storage                     : vam_storage,
                  uom_storage                     : uom_storage,
                  rate_idr_storage                : rate_idr_storage,
                  revenue_sharing_storage         : revenue_sharing_storage,
                  remarks_storage                 : remarks_storage,
                  aipo_charge                     : aipo_charge,
                  appi_charge                     : appi_charge,          
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
              var key                   = msgs[1];
              var tablePreview          = $("#preview_chargeactivity");
              var strContent            = "<tr>";

              strContent = strContent + "<td style='display:none;'>" + key + "<input type='hidden' name='key[]' value='"+ key +"'></td>";
              strContent = strContent + "<td>" + size + "<input type='hidden' name='size[]' value="+ size +"></td>";
              strContent = strContent + "<td>" + product_description + "<input type='hidden' name='product_description[]' value="+ product_description +"></td>";
              strContent = strContent + "<td>" + vam_inbound + "<input type='hidden' name='vam_inbound[]' value="+ vam_inbound +"></td>";
              strContent = strContent + "<td>" + vam_outbound + "<input type='hidden' name='vam_outbound[]' value="+ vam_outbound +"></td>";
              strContent = strContent + "<td>" + vam_storage + "<input type='hidden' name='vam_storage[]' value="+ vam_storage +"></td>";
              strContent = strContent + "<td>" + aipo_charge + "<input type='hidden' name='aipo_charge[]' value="+ aipo_charge +"></td>";
              strContent = strContent + "<td>" + appi_charge + "<input type='hidden' name='appi_charge[]' value="+ appi_charge +"></td>";
              strContent = strContent + "<td><input type='button' value='Delete' onclick='DeleteRowChargeActivity(this)'/></td>";
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
                if(jQuery.inArray(size, arr) == -1)
                {
                  tablePreview.prepend(strContent);
                  clearData();
                }
                else
                  alert('error : '+size + ' Sudah di tambahkan' );
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

    function DeleteRowChargeActivity(row)
    {
      var i       = row.parentNode.parentNode.rowIndex;
      var x       = document.getElementById("preview_chargeactivity").rows[i].cells[0].innerHTML;
      var res     = x.split("<");
      var key_id  = res[0];
      
      if(key_id != "")
      {
        
        var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/DeleteDetailChargeActivity"); ?>';
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
              document.getElementById("preview_chargeactivity").deleteRow(i);
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
        document.getElementById("preview_chargeactivity").deleteRow(i);
    }

    function AcceptAddsOn()
    {
      var opportunity_id          = $('#opportunity_id').val();
      var opportunity_adds_on_id  = $('#opportunity_adds_on_id').val();
      var adds_on                 = $('#adds_on').val();
      var remarks_adds_on         = $('#remarks_adds_on').val();

      var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/AcceptAddsOn");?>';
      jQuery.ajax(
      {
       type: 'POST',
        async: false,
        dataType: "json",
        url: uri,
        data: {
          opportunity_id          :   opportunity_id,
          opportunity_adds_on_id  :   opportunity_adds_on_id,
          adds_on                 :   adds_on,
          remarks_adds_on         :   remarks_adds_on
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
              var key             = msgs[1];
              var tablePreview    = $("#preview_adds_on");
              var strContent      = "<tr>";

              strContent = strContent + "<td style='display:none;'>" + key + "<input type='hidden' name='key[]' value='"+ key +"'></td>";
              strContent = strContent + "<td>" + adds_on + "<input type='hidden' name='adds_on[]' value="+ adds_on +"></td>";
              strContent = strContent + "<td>" + remarks_adds_on + "<input type='hidden' name='remarks_adds_on[]' value="+ remarks_adds_on +"></td>";
              strContent = strContent + "<td><input type='button' value='Delete' onclick='DeleteRowAddsOn(this)'/></td>";
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
                if(jQuery.inArray(adds_on, arr) == -1)
                {
                  tablePreview.prepend(strContent);
                  clearData();
                }
                else
                  alert('error : '+adds_on + ' Sudah di tambahkan' );
              }        
            }
            else
              alert('error:'+msgs[1]);
          },
        error: function(jqXHR, textStatus, errorThrown)
          {
            j.unblockUI();
            alert(textStatus);
          }
      });
    }

    function DeleteRowAddsOn(row)
    {
      var i       = row.parentNode.parentNode.rowIndex;
      var x       = document.getElementById("preview_adds_on").rows[i].cells[0].innerHTML;
      var res     = x.split("<");
      var key_id  = res[0];
      
      if(key_id != "")
      {
        
        var uri = '<?php echo Yii::app()->createAbsoluteUrl("Opportunity/DeleteDetailAddsOn"); ?>';
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
              document.getElementById("preview_adds_on").deleteRow(i);
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
        document.getElementById("preview_adds_on").deleteRow(i);
    }

    function clearData()
    {
      $("#vam_inbound").val('');
      $("#rate_idr_inbound").val('');
      $("#revenue_sharing_inbound").val('');
      $("#remarks_inbound").val('');
      $("#vam_outbound").val('');
      $("#rate_idr_outbound").val('');
      $("#revenue_sharing_outbound").val('');
      $("#remarks_outbound").val('');
      $("#vam_storage").val('');
      $("#rate_idr_storage").val('');
      $("#revenue_sharing_storage").val('');
      $("#remarks_storage").val('');
      $("#aipo_charge").val('');
      $("#appi_charge").val('');
      $("#remarks_adds_on").val('');
    }
</script>