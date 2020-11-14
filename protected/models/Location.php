<?php
class Location extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'location';
	}

	public function rules()
	{
		return array(
			array('code, name, email, email_spv, city, province, country, address', 'required'),

			array('code', 'length', 'max'=>50),

			array('name, email, email_spv, city, province, country', 'length', 'max'=>100),

			array('address' , 'length', 'max'=>200),
			array('code, name', 'unique'),

			array('name', 'filter', 'filter'=>'trim'),
			
			array('created_date', 'default', 'value' => new CDbExpression('NOW()'),'setOnEmpty' => false,'on' => 'insert'),

			array('modified_date', 'default', 'value' => new CDbExpression('NOW()'),'setOnEmpty' => false),
			
			array('created_by', 'default', 'value' => Yii::app()->user->id,'setOnEmpty' => false,'on' => 'insert'),
			
			array('modified_by', 'default', 'value' => Yii::app()->user->id,'setOnEmpty' => false),
			
			array('location_id, code, name, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'location_id' 	=> 'LOCATION',
			'code' 			=> 'CODE',
			'name' 			=> 'NAME',
			'address' 		=> 'ADDRESS',
			'created_date' 	=> 'CREATED DATE',
			'modified_date' => 'MODIFIED DATE',
			'created_by' 	=> 'CREATED BY',
			'modified_by' 	=> 'MODIFIED BY',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function listLocation()
	{
		$field = array();
		$value = array();
		
		$_models = Yii::app()->user->getState('locations');
		
		foreach($_models as $data)
		{
			$check = Location::model()->findByAttributes(array('code'=>$data['code']));
			if($check)
			{
				$field[] = $check->location_id;
				$value[] = $check->name;
			}
		}
		
		if(count($field)<=0)
			$values = array();
		else
			$values = array_combine($field, $value);
		return $values; 
	}
}