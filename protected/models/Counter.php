<?php
class Counter extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function tableName()
	{
		return 'counter';
	}

	public function rules()
	{
		return array(
			array('name', 'required'),

			array('counter', 'numerical', 'integerOnly'=>true),

			array('name', 'length', 'max'=>50),

			array('name', 'unique'),

			array('name', 'filter', 'filter'=>'trim'),
			
			array('created_date', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'insert'),

			array('modified_date', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false),
			
			array('created_by', 'default', 'value' => Yii::app()->user->id,'setOnEmpty' => false, 'on' => 'insert'),
			
			array('modified_by', 'default', 'value' => Yii::app()->user->id,'setOnEmpty' => false),
			
			array('counter_id, name, counter, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'counter_id' 	=> 'COUNTER',
			'name' 			=> 'NAME',
			'counter' 		=> 'COUNTER',
			'created_date'	=> 'CREATED DATE',
			'modified_date'	=> 'MODIFIED DATE',
			'created_by' 	=> 'CREATED BY',
			'modified_by' 	=> 'MODIFIED BY',
		);
	}
	
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->order = 'name ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}
}