<div class="title_left">
    <h3>Action Button Task</h3>
    <?php echo CHtml::Button('Back', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Task/Index"'));?>
</div>

<?php
$this->breadcrumbs=array(
	'Task'=>array('index'),
	'Create',
);

// $this->menu=array(
	// array('label'=>'List Task', 'url'=>array('index')),
	// array('label'=>'Manage Task', 'url'=>array('admin')),
// );
?>

<!-- <h1>Create Task</h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>