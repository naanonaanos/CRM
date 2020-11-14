<div class="title_left">
    <h3>Action Button Users</h3>
    <?php echo CHtml::Button('Back', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Users/Index"'));?>
</div>

<br/>
<?php
	$this->breadcrumbs = array(
	'users'=>array('index'),
	'Profile',
	);
?>

<?php $form = $this->beginWidget('CActiveForm', array(
  'id'=>'profile-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array(
    'enctype'=>'multipart/form-data'),
  ));
?>

<!-- page content -->
<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>User</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="col-md-3 col-sm-3  profile_left">
          <div class="profile_img">
            <div id="crop-avatar">
              <!-- Current avatar -->
              <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
              <?php echo $form->labelEx($model, 'picture', array('label'=>'PICTURE'));?>
              <?php $model->picture_name = 'Profile Image';?>
              <?php
              	$this->widget('ext.NavaJcrop.ImageJcrop', array(
              		'config'=> array(
              			'title'=>$model->picture_name,
              			'image'=>$model->picture,
              			'id'=>'nava-jcrop',
              			'unique'=>true,
              			'buttons'=>array(
              				'cancel'=>array(
              					'name'=>'Cancel',
              					'class'=>'fileField',
              					'style'=>'margin-left:5px;',
              				),
              				'crop'=>array(
              					'name'=>'Crop',
              					'class'=>'button-crop',
              					'style'=>'margin-left:5px',
              				)
              			),
              			'options'=>array(
              				'imageWidth'=>150,
              				'imageHeight'=>150,
              				'resultStyle'=>'position:fixed; top:50px; max-width:350px; max-height:350px; z-index: 9999;',
              				'resultMaxWidth'=>300,
              				'resultMinWidth'=>300,
              			),
              			'callBack'=>array(
              				'success'=>"function(obj,res){doSomething(obj,res);}",
              				'error'=>"function(){alert('error');}",
              			)
              		)
              	));
              ?>
            </div>
          </div>
          <h3><?php echo $model->full_name; ?></h3>
          <ul class="list-unstyled user_data">
            <li><i class="fa fa-star user-profile-icon"></i>&nbsp;<?php echo $model->position; ?>
            </li>

            <li>
              <i class="fa fa-phone user-profile-icon"></i>&nbsp;<?php echo $model->phone; ?>
            </li>

            <li class="m-top-xs">
              <i class="fa fa-envelope-o user-profile-icon"></i>&nbsp;<?php echo $model->email; ?>
            </li>
          </ul>
          <?php echo CHtml::submitButton($model->isNewRecord?'CREATE':'Edit Profile', array('class'=>'btn btn-success'));?>
          <br />
        </div>
        <div class="col-md-9 col-sm-9 ">

          <div class="profile_title">
            <div class="col-md-6">
              <h2>Form Profile Information</h2>
            </div>
          </div>
          <br>
          <?php echo $form->errorSummary($model); ?>
           <div class="col-md-6">
			<div class="row">
				<?php 
					if(Yii::app()->controller->action->id=='update')
					{
						echo $form->labelEx($model,'username');
						echo $form->textField($model,'username',array('readonly'=>true,'class'=>'form-control','size'=>50,'maxlength'=>50));
						echo $form->error($model,'username');
					}
					else
					{
						echo $form->labelEx($model,'username');
						echo $form->textField($model,'username',array('disabled'=>true, 'class'=>'form-control','size'=>50,'maxlength'=>50));
						echo $form->error($model,'username');	
					}
				?>
			</div>
			<br>
			<div class="row">
				<?php
						echo $form->labelEx($model,'position');
						echo $form->textField($model, 'position', array('disabled'=>true,'class'=>'form-control', 'size'=>60,'maxlength'=>100));
						echo $form->error($model,'position');	
				?>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'full_name'); ?>
				<?php echo $form->textField($model,'full_name',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'full_name'); ?>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'phone'); ?>
				<?php echo $form->textField($model,'phone',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'phone'); ?>
			</div>
			<br>
			<div class="row">
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('class'=>'form-control','size'=>60,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>

<script type="text/javascript">
	var j = jQuery.noConflict();
	jQuery(document).ready(function()
	{
	});

	function doSomething(obj, res)
	{
		jQuery.ajax(
		{
			cache: false,
			type: "post",
			url: '<?php echo Yii::app()->createUrl('users/saveImage');?>',
			data:  'picture='+res,
			beforeSend: function(jqXHR, settings)
			{
				j.blockUI();
			},
			success: function(data)
			{
				j.unblockUI();
				obj.attr('src', res);
			},
			error: function (xhr, ajaxOptions, data) 
			{
				j.unblockUI();
				alert(xhr.status);				
			}
		});
	}
</script>
