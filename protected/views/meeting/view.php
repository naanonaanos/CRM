<?php
/* @var $this MeetingController */
/* @var $model Meeting */

$this->breadcrumbs=array(
	'Meetings'=>array('index'),
	$model->meeting_id,
);

$this->menu=array(
	array('label'=>'List Meeting', 'url'=>array('index')),
	array('label'=>'Create Meeting', 'url'=>array('create')),
	array('label'=>'Update Meeting', 'url'=>array('update', 'id'=>$model->meeting_id)),
	array('label'=>'Delete Meeting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->meeting_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Meeting', 'url'=>array('admin')),
);
?>

<h1>View Meeting #<?php echo $model->meeting_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'meeting_id',
		'status_id',
		'contact_id',
		'opportunity_id',
		'event',
		'subject_meeting',
		'reminder',
		'full_name',
		'from_date',
		'to_date',
		'created_date',
		'modified_date',
		'created_by',
		'modified_by',
	),
)); ?>
