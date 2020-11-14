<div class="title_left">
    <h3>Action Button Leads</h3>
    <?php echo CHtml::Button('Back', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Leads/Index"'));?>
</div>

<br/>

<?php
$this->breadcrumbs = array(
	'leads'=>array('index'),
	'Create',
);
echo $this->renderPartial('_form', array('model'=>$model));
?>