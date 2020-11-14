<?php $this->beginContent('//layouts/main'); ?>
<div class="right_col" role="main">
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					// 'links'=>$this->breadcrumbs,
					'tagName'=>'ol',
					'homeLink'=>'<li>'.CHtml::link('<a href="index.php?r=site/index"><i class="fa fa-home"></i>Home</a>').'</li>',
					'htmlOptions'=>array('class'=>'breadcrumb'),
					'separator'=>'',
					'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
					'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
				)); ?>
			<?php endif?>
	<section class="content">
		<?php echo $content; ?>
	</section>
			</div>
<?php $this->endContent(); ?>
