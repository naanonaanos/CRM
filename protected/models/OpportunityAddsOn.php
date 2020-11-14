<?php
class OpportunityAddsOn extends CActiveRecord
{
	public $search_by;
	public $search_value;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'opportunityaddson';
	}

	public function rules()
	{
		return array(
			array('opportunity_id, adds_on', 'required'),

			array('opportunity_id', 'numerical', 'integerOnly'=>true),

			array('adds_on, remarks_adds_on', 'length', 'max'=>100),	

			array('search_by, search_value', 'safe'),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),

			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),
			
			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true),
			
			array('opportunity_adds_on_id, opportunity_id, adds_on, remarks_adds_on, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'opportunity'	=>	array(self::BELONGS_TO, 'Opportunity', 'opportunity_id')
		);
	}

	public function attributeLabels()
	{
		return array(
		'opportunity_adds_on_id'	=>	'OPPORTUNITY ADDS ON',
		'opportunity_id'			=>	'OPPORTUNITY',
		'adds_on'					=>	'ADDS ON',
		'remarks_adds_on'			=>	'REMARKS ADDS ON',
		'created_date'				=>	'CREATED DATE',
		'modified_date'				=>	'MODIFIED DATE',
		'created_by'				=>	'CREATED BY',
		'modified_by'				=>	'MODIFIED BY',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		if($this->search_by == 'code')
			$criteria->compare('t.code', $this->search_value, true);
		if($this->search_by=='opportunity_name')
			$criteria->compare('t.opportunity_name', $this->search_value, true);
		$criteria->order='t.created_date DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}
}
?>