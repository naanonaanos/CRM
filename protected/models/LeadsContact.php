<?php
class LeadsContact extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'leadscontact';
	}

	public function rules()
	{
		return array(
			array('leads_id, contact_id, active', 'required'),

			array('leads_id, contact_id, active', 'numerical', 'integerOnly'=>true),

			array('search_by, search_value','safe'),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),
			
			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),
			
			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false),

			array('leads_id, contact_id, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'leads' 	=> array(self::BELONGS_TO, 'Leads', 'leads_id'),
			'contact' 	=> array(self::BELONGS_TO, 'Contact', 'contact_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'leadscontact_id'	=> 'LEADS CONTACT',
			'leads_id' 			=> 'LEADS',
			'contact_id' 		=> 'CONTACT',
			'active' 			=> 'ACTIVE',
			'created_date' 		=> 'CREATED DATE',
			'modified_date'		=> 'MODIFIED DATE',
			'created_by' 		=> 'CREATED BY',
			'modified_by' 		=> 'MODIFIED BY'
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		
		if(isset($_GET['id']))
		{
			if(strtolower(Yii::app()->controller->id) == 'contact')
				$criteria->compare('t.contact_id', $_GET['id']);
			
			if(strtolower(Yii::app()->controller->id) == 'leads')
				$criteria->compare('t.leads_id', $_GET['id']);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}
}