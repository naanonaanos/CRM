<?php
$this->breadcrumbs=array(
	'task'=>array('index'),
	'List',
);
?>

<title>Task Table</title>

<!-- Action Button -->
<div class="title_left">
    <h3>Task</h3>
    <?php echo CHtml::Button('Create a new task', array('class'=>'btn btn-round btn-success', 'onclick'=> 'js:document.location.href="index.php?r=Task/Create"'));?>
</div>

<br>

<!-- Table Header-->
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-institution"></i>&nbsp; TABLE LIST TASK</h2>
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
								<?php 
								// $this->renderPartial('_search',array(
								// 	'model'=>$model,
								// 	)); 
								?> 

								<!-- Table List -->
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'template'		=>'{items}<tr><td style="border-top:none;">{summary}</td></tr>{pager}',
									'id'			=>'contact-grid',
									'dataProvider'	=>$dataProvider,
									'columns'		=>array(
										array(
											'class'				=>'CLinkColumn',
											'urlExpression'		=>'Yii::app()->createUrl("contact/view", array("id"=>$data->contact_id))',
											'header'			=>'TASK SUBJECT',
											'labelExpression'	=>'$data->code',
											'htmlOptions'		=>array(
												'width'=>'100px'
											)
										),
										array(
											'header'		=>'STATUS',
											'value'			=>'$data->contact_name',
											'htmlOptions'	=>array(
												'width'=>'200px'
											)
										),
										array(
											'header'		=>'ASSIGN FROM',
											'value'			=>'$data->contact_jobtitle',
											'htmlOptions'	=>array(
												'width'=>'200px'
											)
										),
										array(
											'header'		=>'ASSIGN TO',
											'value'			=>'$data->contact_phone',
											'htmlOptions'	=>array(
												'width'=>'200px'
											)
										),
										array(
											'header'		=>'START DATE',
											'value'			=>'$data->contact_email',
											'htmlOptions'	=>array(
												'width'=>'250px'
											)
										),
										array(
											'header'		=>'DUE DATE',
											'value'			=>'$data->contact_pic',
											'htmlOptions'	=>array(
												'width'=>'200px'
											)
										),
										array(
											'header'		=>'TASK OWNER',
											'value'			=>'$data->full_name',
											'htmlOptions'	=>array(
												'width'=>'150px'
											)
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