<?php
$this->breadcrumbs = array(
	'status'=>array('index'),
	'List',
);

$this->menu = '<ul class="dropdown-menu" role="menu">';
$this->menu .= Yii::app()->privilege->checkPrivilege('status', 'create')==1?'<li><a href="index.php?r=status/create"><i class="fa fa-file-o"></i>CREATE</a></li>':'';
$this->menu .= '</ul>';
?>

<div class="box box-solid box-primary">
	<div class="box-header with-border">
		<i class="fa fa-table"></i>
		<h3 class="box-title">LOCATION LIST</h3>
	</div>
	
	<div class="box-body">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'template'=>'{items}<tr><td style="border-top:none;">{summary}</td></tr>{pager}',
			'id'=>'picked-grid',
			'dataProvider'=>$model->search(),
			'columns'=>array(
				array(
					'header'=>'CODE',
					'value'=>'$data->code',
					'htmlOptions'=>array(
						'width'=>'100px'
					)
				),
				array(
					'header'=>'NAME',
					'value'=>'$data->name',
					'htmlOptions'=>array(
						'width'=>'100px'
					)
				),
				array(
					'header'=>'COLOR',
					'value'=>'$data->color',
					'htmlOptions'=>array(
						'width'=>'100px'
					)
				),
				array(
					'header'=>'DESCRIPTION',
					'value'=>'$data->description',
					'htmlOptions'=>array(
						'width'=>'200px'
					)
				),
				array(
					'header'=>'ACTION',
					'class'=>'CButtonColumn',
					'template'=>'{update}',
					'htmlOptions'=>array(
						'width'=>'50px',
						'align'=>'center'
					),
					'buttons'=>array(
						'update' => array(
							'imageUrl'=>Yii::app()->request->baseUrl.'/themes/adminLTE/dist/img/CButtonColumn/update.png',
							'visible'=>"true",
						),
					),
					'headerHtmlOptions'=>array('style' => 'text-align: center;'),
				),
			),
		)); ?>
	</div>
</div>