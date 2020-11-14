<div class="title_left">
    <h3>Action Button Opportunity</h3>
    <?php echo CHtml::Button('Back to the list', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Opportunity/Index"'));?>
</div>

<br/>

<?php
$this->breadcrumbs = array(
	'opportunity'=>array('index'),
	'Create',
);
echo $this->renderPartial('_form', array(
	'model'=>$model,
	'locationoppurtunity'=>$locationoppurtunity,
	'chargeactivityoppurtunity'=>$chargeactivityoppurtunity,
	'addsonopportunity'=>$addsonoppurtunity
));
?>