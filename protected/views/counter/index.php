<?php
$this->breadcrumbs = array(
	'counter'=>array('index'),
	'List',
);?>

<title>Counter Table</title>

<!-- Action Button -->
<!-- <div class="title_left">
    <h3>Contact</h3>
    <?php
    	// echo CHtml::Button('Create a new contact', array('class'=>'btn btn-round btn-success', 'onclick'=> 'js:document.location.href="index.php?r=Contact/Create"'));
    ?>
</div> -->

<br>
<div class="card-box table-responsive">
	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-table"></i>&nbsp; COUNTER CODE APPLICATION LIST</h3>
	</div>
	
	<div class="box-body">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'template'=>'{items}<tr><td style="border-top:none;">{summary}</td></tr>{pager}',
			'id'=>'picked-grid',
			'dataProvider'=>$model->search(),
			'columns'=>array(
				array(
					'header'=>'COUNTER NAME',
					'value'=>'$data->name',
					'htmlOptions'=>array(
						'width'=>'100px'
					)
				),
				array(
					'header'=>'COUNTER',
					'value'=>'$data->counter',
					'htmlOptions'=>array(
						'width'=>'100px'
					)
				),
				array(
					'header'=>'CREATED DATE',
					'value'=>'$data->created_date',
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
							'imageUrl'=>Yii::app()->request->baseUrl.'/themes/GentelellaMaster/production/images/edit.png',
							'visible'=>"true",
						),
					),
					'headerHtmlOptions'=>array('style' => 'text-align: center;'),
				),
			),
		)); ?>
	</div>
</div>