<?php
$this->breadcrumbs = array(
	'counter'=>array('index'),
	'Create',
);

$this->menu = '<ul class="dropdown-menu" role="menu">';
$this->menu .= Yii::app()->privilege->checkPrivilege('counter', 'index')==1?'<li><a href="index.php?r=counter/index"><i class="fa fa-file-o"></i>LIST</a></li>':'';
$this->menu .= '</ul>';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>