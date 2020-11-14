<div class="title_left">
    <h3>Action Button Contact</h3>
    <?php echo CHtml::Button('Back', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Contact/Index"'));?>
</div>

<br/>

<?php
$this->breadcrumbs = array(
	'contact'=>array('index'),
	'Create',
);
echo $this->renderPartial('_form', array('model'=>$model));
?>