<div class="title_left">
    <h3>Action Button Counter</h3>
    <?php echo CHtml::Button('Back to the list', array('class'=>'btn btn-round btn-secondary', 'onclick'=> 'js:document.location.href="index.php?r=Counter/Index"'));?>
</div>

<br/>

<?php
$this->breadcrumbs = array(
	'counter'=>array('index'),
	'Update',
);

$this->menu = '<ul class="dropdown-menu" role="menu">';
$this->menu .= '<li><a href="index.php?r=counter/index"><i class="fa fa-file-o"></i>LIST</a></li>';
$this->menu .= '</ul>';
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>