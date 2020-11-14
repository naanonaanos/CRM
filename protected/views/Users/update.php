<div class="title_left">
    <h3>Action Button Users</h3>
    <?php echo CHtml::Button('Back', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Users/Index"'));?>
</div>

<br/>
<?php
$this->breadcrumbs = array(
	'users'=>array('index'),
	'Update',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>