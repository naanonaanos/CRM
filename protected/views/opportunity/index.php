<?php
$this->breadcrumbs = array(
	'opportunity'=>array('index'),
	'List',
);
?>
<title>Opportunity Table</title>

<!-- Action Button -->
<div class="title_left">
    <h3>Opportunity</h3>
    <?php 
    	if(Yii::app()->user->getState('groupName')!='sd' && Yii::app()->user->getState('groupName')!='gm')
    	{
    		echo CHtml::Button('Create a new opportunity', array('class'=>'btn btn-round btn-success', 'onclick'=> 'js:document.location.href="index.php?r=Opportunity/Create"'));
    	}
    ?>
</div>

<br>

<!-- Table Header-->
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-institution"></i>&nbsp; TABLE LIST OPPORTUNITY</h2>
				<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<!-- Table Title -->
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<div class="card-box table-responsive">

							<!-- Table Body -->
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">

								<!-- Search -->
								<?php $this->renderPartial('_search',array(
									'model'=>$model,
								)); ?>

								<!-- Table List -->
								<?php $this->widget('zii.widgets.grid.CGridView', array(
										'template'		=>'{items}<tr><td style="border-top:none;">{summary}</td></tr>{pager}',
										'id'			=>'opportunity-grid',
										'dataProvider'	=>$model->search(),
										'columns'		=>array(
											array(
												'class'				=>'CLinkColumn',
												'urlExpression'		=>'Yii::app()->createUrl("opportunity/view", array("id"=>$data->opportunity_id))',
												'header'			=>'OPPORTUNITY CODE',
												'labelExpression'	=>'$data->code',
												'htmlOptions'		=>array(
													'width'=>'200px'
												)
											),
											// array(
											// 	'header'		=>'OPPORTUNITY NAME',
											// 	'value'			=>'$data->oppportunity_name',
											// 	'htmlOptions'	=>array(
											// 		'width'=>'200px'
											// 	)
											// ),
											array(
												'header'		=>'CLIENT NAME',
												'value'			=>'$data->leads->name',
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											// array(
											// 	'header'		=>'ACCOUNT',
											// 	'value'			=>'$data->Account->name',
											// 	'htmlOptions'	=>array(
											// 		'width'=>'200px'
											// 	)
											// ),
											array(
												'header'		=>'PIPELINE STAGE',
												'type'			=>'html',
												'value'			=>function($data)
													{
														return '<span class="badge bg '.$data->status->color.'">'.$data->status->name.'</span>';
													},
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'QUOTATION STATUS',
												'type'			=>'html',
												'value'			=>function($data)
													{
														if($data->statusdetail != NULL)
														{
															return '<span class="badge bg '.$data->statusdetail->color.'">'.$data->statusdetail->name.'</span>';
														}
													},
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'OPPORTUNITY OWNER',
												'value'			=>'$data->full_name',
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'FEEDBACK SD',
												'value'			=>'$data->remarks_feedback',
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'ACTION',
												'class'			=>'CButtonColumn',
												'template'		=>'<ul>{update}',
												'htmlOptions'	=>array(
													'width'=>'50px',
													'align'=>'center'
												),
												'buttons'			=>array(
													'update' 		=> array(
														'imageUrl'	=>Yii::app()->request->baseUrl.'/themes/GentelellaMaster/production/images/edit.png',
														'url'		=>'Yii::app()->createUrl("opportunity/update", array("id"=>$data->opportunity_id))',
														'visible'	=>"true",
													),
												),
												'headerHtmlOptions'	=>array('style' => 'text-align: center;'),
											),
										)
									))
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>