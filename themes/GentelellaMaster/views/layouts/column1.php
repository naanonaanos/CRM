<!-- page content -->
<?php $this->beginContent('//layouts/main'); ?>
<div class="right_col" role="main">
		<div class="">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Dashboard'),
			'htmlOptions'=>array('class'=>'breadcrumb')
        )); ?>
    <?php endif?>

	<?php echo $content; ?>
</div>
</div>
<?php $this->endContent(); ?>