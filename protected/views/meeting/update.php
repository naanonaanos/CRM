<div class="title_left">
    <h3>Action Button Meeting</h3>
    <?php echo CHtml::Button('Back to the list', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Meeting/Index"'));?>
</div>

<br/>

<?php
$this->breadcrumbs = array(
	'meeting'=>array('index'),
	'Update',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
// $this->breadcrumbs=array(
// 	'Meetings'=>array('index'),
// 	$model->meeting_id=>array('view','id'=>$model->meeting_id),
// 	'Update',
// );

// $this->menu=array(
// 	array('label'=>'List Meeting', 'url'=>array('index')),
// 	array('label'=>'Create Meeting', 'url'=>array('create')),
// 	array('label'=>'View Meeting', 'url'=>array('view', 'id'=>$model->meeting_id)),
// 	array('label'=>'Manage Meeting', 'url'=>array('admin')),
// );
?>

<!-- <h1>Update Meeting <?php echo $model->meeting_id; ?></h1> -->

<?php 
// $this->renderPartial('_form', array('model'=>$model)); ?>