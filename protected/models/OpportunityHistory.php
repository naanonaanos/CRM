<?php
class OpportunityHistory extends CActiveRecord
{
	public $search_by;
	public $search_value;
	public $remarks;
	public $status_detail;
	public $name;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'opportunityhistory';
	}

	public function rules()
	{
		return array(

			array('opportunity_id', 'required'),

			array('opportunity_id, status_id, status_detail', 'numerical', 'integerOnly'=>true),

			array('remarks', 'length', 'max'=>100),	

			array('search_by, search_value', 'safe'),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),

			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),
			
			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true),
			
			array('opportunity_id, status_id, status_detail, remarks, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'opportunity'		=>	array(self::BELONGS_TO, 'Opportunity', 'opportunity_id'),
			'status'			=>	array(self::BELONGS_TO, 'Status', 'status_id'),
			'statusdetail'		=>	array(self::BELONGS_TO, 'Status', 'status_detail')
		);
	}

	public function attributeLabels()
	{
		return array(
		'opportunity_history_id'	=>	'OPPORTUNITY HISTORY',
		'opportunity_id'			=>	'OPPORTUNITY',
		'status_id'					=>	'STATUS',
		'status_detail'				=>	'STATUS DETAIL',
		'remarks'					=>	'REMARKS',
		'created_date'				=>	'CREATED DATE',
		'modified_date'				=>	'MODIFIED DATE',
		'created_by'				=>	'CREATED BY',
		'modified_by'				=>	'MODIFIED BY',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		if(isset($_GET['id']))
		{
			if(strtolower(Yii::app()->controller->id)=='opportunity')
				$criteria->compare('t.opportunity_id', $_GET['id']);

			if($this->search_by == 'status')
				$criteria->compare('t.status.name', $this->search_value, true);
		}

		$criteria->with 	=	array('opportunity','opportunity');
		$criteria->order 	=	't.created_date DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}

	public function search2()
	{
		$criteria=new CDbCriteria;

		if(isset($_GET['id']))
		{
			if(strtolower(Yii::app()->controller->id)=='opportunity')
				$criteria->compare('t.opportunity_id', $_GET['id']);

			if($this->search_by == 'statusdetail')
				$criteria->compare('t.statusdetail.name', $this->search_value, true);
		}

		$criteria->with 	=	array('opportunity','opportunity');
		$criteria->order 	=	't.created_date DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}
}
?>