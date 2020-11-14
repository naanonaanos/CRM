<?php
$this->breadcrumbs = array(
	'status'=>array('index'),
	'Create',
);
echo $this->renderPartial('_form', array('model'=>$model)); ?>