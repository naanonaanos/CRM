<?php
$this->breadcrumbs=array(
	'meeting'=>array('index'),
	'List',
);
?>

<title>Meeting Table</title>

<!-- Action Button -->
<div class="title_left">
	<h3>Meeting</h3>
    <?php echo CHtml::Button('Create a new meeting', array('class'=>'btn btn-round btn-success', 'onclick'=> 'js:document.location.href="index.php?r=Meeting/Create"'));?>
</div>

<br>

<!-- Table Header-->
<div class="row">
	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-institution"></i>&nbsp; TABLE LIST MEETING</h2>
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
											'header'			=>'EVENT',
											'labelExpression'	=>'$data->code',
											'htmlOptions'		=>array(
												'width'=>'100px'
											)
										),
										array(
											'header'		=>'SUBJECT MEETING',
											'value'			=>'$data->contact_name',
											'htmlOptions'	=>array(
												'width'=>'200px'
											)
										),
										array(
											'header'		=>'STATUS',
											'value'			=>'$data->contact_jobtitle',
											'htmlOptions'	=>array(
												'width'=>'200px'
											)
										),
										array(
											'header'		=>'ASSIGN FROM',
											'value'			=>'$data->contact_phone',
											'htmlOptions'	=>array(
												'width'=>'200px'
											)
										),
										array(
											'header'		=>'ASSIGN TO',
											'value'			=>'$data->contact_email',
											'htmlOptions'	=>array(
												'width'=>'250px'
											)
										),
										array(
											'header'		=>'DATE',
											'value'			=>'$data->contact_pic',
											'htmlOptions'	=>array(
												'width'=>'200px'
											)
										),
										array(
											'header'		=>'CONTACT',
											'value'			=>'$data->contact_pic',
											'htmlOptions'	=>array(
												'width'=>'200px'
											)
										),
										array(
											'header'		=>'MEETING OWNER',
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



































<!-- ========================================================================================================= -->
<?php
/* @var $this MeetingController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
// 	'Meetings',
// );

// $this->menu=array(
// 	array('label'=>'Create Meeting', 'url'=>array('create')),
// 	array('label'=>'Manage Meeting', 'url'=>array('admin')),
// );
?>

<!-- <h1>Meetings</h1> -->

<?php 
// $this->widget('zii.widgets.CListView', array(
// 	'dataProvider'=>$dataProvider,
// 	'itemView'=>'_view',
// )); 
?>
