<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'List',
);
?>
<title>Users</title>

<!-- Action Button -->
<div class="title_left">
    <h3>Users</h3>
    <?php echo CHtml::Button('Create a new user', array('class'=>'btn btn-round btn-success', 'onclick'=> 'js:document.location.href="index.php?r=Users/Create"')); ?>
</div>

<br>

<!-- Table Header-->
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-institution"></i>&nbsp; TABLE LIST USERS</h2>
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
								<?php
									$permission = array();

									$permission[]= array(
														'class'				=>'CLinkColumn',
														'urlExpression'		=>'Yii::app()->createUrl("users/view", array("id"=>$data->users_id))',
														'header'			=>'USERNAME',
														'labelExpression'	=>'$data->username',
														'htmlOptions'		=>array(
															'width'=>'100px'
														)
													);

									$permission[]= array(
														'header'		=>'FULL NAME',
														'value'			=>'$data->full_name',
														'htmlOptions'	=>array(
															'width'=>'200px'
														)
													);

									$permission[]= array(
														'header'		=>'PHONE',
														'value'			=>'$data->phone',
														'htmlOptions'	=>array(
															'width'=>'200px'
														)
													);

									$permission[]= array(
														'header'		=>'EMAIL',
														'value'			=>'$data->email',
														'htmlOptions'	=>array(
															'width'=>'200px'
														)
													);

									$permission[]= array(
														'header'		=>'POSITION',
														'value'			=>'$data->position',
														'htmlOptions'	=>array(
															'width'=>'200px',
														)
													);

									$permission[]= array(
														'header'		=>'DATE',
														'value'			=>'Yii::app()->dateFormatter->format("y-MM-d", strtotime($data->created_date))',
														'htmlOptions'	=>array(
															'width'=>'300px'
														)
													);

									$permission[]= array(
														'header'		=>'TIME',
														'value'			=>'Yii::app()->dateFormatter->format("H:mm:ss", strtotime($data->created_date))',
														'htmlOptions'	=>array(
															'width'=>'50px'
														)
													);

									$permission[]= array(
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
																'visible'	=>"true",
															),
														),
														'headerHtmlOptions'	=>array('style' => 'text-align: center;'),
													);
								?>

										<?php $this->widget('zii.widgets.grid.CGridView', array(
												'template'		=>'{items}<tr><td style="border-top:none;">{summary}</td></tr>{pager}',
												'id'			=>'users-grid',
												'dataProvider'	=>$model->search(),
												'columns'		=>$permission));
										?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
