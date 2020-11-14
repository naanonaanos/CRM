<?php
$this->breadcrumbs = array(
	'leads'=>array('index'),
	'List',
);
?>

<title>Leads Table</title>

<!-- Action Button -->
<div class="title_left">
    <h3>Leads</h3>
    <?php 
    	if(Yii::app()->user->getState('groupName')!='sd' && Yii::app()->user->getState('groupName')!='gm')
    	{
    		echo CHtml::Button('Create a new leads', array('class'=>'btn btn-round btn-success', 'onclick'=> 'js:document.location.href="index.php?r=Leads/Create"'));
    	}
    ?>
</div>

<br>

<!-- Table Header-->
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-institution"></i>&nbsp; TABLE LIST LEADS</h2>
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
										'id'			=>'leads-grid',
										'dataProvider'	=>$model->search(),
										'columns'		=>array(
											array(
												'class'				=>'CLinkColumn',
												'urlExpression'		=>'Yii::app()->createUrl("leads/view", array("id"=>$data->leads_id))',
												'header'			=>'LEADS CODE',
												'labelExpression'	=>'$data->code',
												'htmlOptions'		=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'LEADS NAME',
												'value'			=>'$data->name',
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'STATUS',
												'value'			=>'$data->status->name',
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'SOURCE',
												'value'			=>'$data->source->name',
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'INDUSTRY',
												'value'			=>'$data->industry->name',
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'LEADS OWNER',
												'value'			=>'$data->full_name',
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'DATE',
												'value'			=>'Yii::app()->dateFormatter->format("y-MM-d", strtotime($data->created_date))',
												'htmlOptions'	=>array(
													'width'=>'200px'
												)
											),
											array(
												'header'		=>'TIME',
												'value'			=>'Yii::app()->dateFormatter->format("H:mm:ss", strtotime($data->created_date))',
												'htmlOptions'	=>array(
													'width'=>'50px'
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
														'url'		=>'Yii::app()->createUrl("leads/update", array("id"=>$data->leads_id))',
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
