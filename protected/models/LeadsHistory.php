<?php
class LeadsHistory extends CActiveRecord
{
	public $search_by;
	public $search_value;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'leadshistory';
	}

	public function rules()
	{
		return array(
			array('leads_id, status_id, full_name', 'required'),

			array('leads_id, status_id', 'numerical', 'integerOnly'=>true),

			array('full_name, remarks', 'length', 'max'=>100),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),
			
			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true, 'on'=>'insert'),
			
			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true),

			array('leads_id, status_id, full_name, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
            'leads'     =>  array(self::BELONGS_TO, 'Leads', 'leads_id'),
			'status'    =>  array(self::BELONGS_TO, 'Status', 'status_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
            'leads_history_id'  => 'LEADS HISTORY',
            'leads_id'          => 'LEADS',
			'status_id'         => 'STATUS',
			'full_name'         => 'FULL NAME',
			'created_date'      => 'CREATED DATE',
			'modified_date'     => 'MODIFIED DATE',
			'created_by'        => 'CREATED BY',
			'modified_by'       => 'MODIFIED BY'
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		
		if(isset($_GET['id']))
		{
			if(strtolower(Yii::app()->controller->id) == 'leads')
				$criteria->compare('t.leads_id',$_GET['id']);

			if($this->search_by == 'status')
				$criteria->compare('status.name',$this->search_value, true);
		}

		$criteria->with = array('leads','leads');
		$criteria->order = 't.created_date DESC';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}
}