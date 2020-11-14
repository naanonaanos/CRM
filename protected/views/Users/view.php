<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->users_id,
);
?>

<!-- Action Button -->
<div class="title_left">
    <h3>Action Button Users</h3>
    <?php echo CHtml::Button('Back to the list', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Users/Index"'));?>
    <?php 
    	if(
    		Yii::app()->user->getState('groupName')=='am'||
    		Yii::app()->user->getState('groupName')=='bd'
    	)
    	{
			echo CHtml::Button('Update this user', array('hidden'=>$model->position=='client'? '': 'hidden','class'=>'btn btn-round btn-dark', 'onclick'=> 'js:document.location.href="index.php?r=users/update&id='.$model->users_id.'"'));
    	}
    	elseif(Yii::app()->user->getState('groupName')=='gm')
    	{
    		echo CHtml::Button('Update this user', array('hidden'=>$model->position!='development'?'':'hidden','class'=>'btn btn-round btn-dark', 'onclick'=> 'js:document.location.href="index.php?r=users/update&id='.$model->users_id.'"'));		
    	}
    	else
    	{
    		echo CHtml::Button('Update this user', array('class'=>'btn btn-round btn-dark', 'onclick'=> 'js:document.location.href="index.php?r=users/update&id='.$model->users_id.'"'));	
    	}

    ?>
</div>
<br>
<div class="x_panel">
	<div class="row">
		<div class="col-md-12 col-sm-12 ">
			<div class="x_title">
				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$model,
					'attributes'=>array(
						'username',
						'full_name',
						'phone',
						'email',
						'position',
						'created_date',
					),
				)); ?>
			</div>
		</div>
	</div>
</div>
