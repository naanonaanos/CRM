<?php
class Users extends CActiveRecord
{
	public $search_by;
	public $search_value;
	public $picture_name;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'users';
	}

	public function rules()
	{
		return array(
			
			array('full_name, username, password, email, phone, position', 'required'),

			array('username, password', 'length', 'max'=>50),

			array('full_name, phone, email, position, picture', 'length', 'max'=>100),

			array('email', 'email'),

			array('email', 'unique', 'className' => 'Users', 'attributeName' => 'email', 'message'=>'This Email is already in use','on'=>'insert'),

			array('username', 'unique', 'className' => 'Users', 'attributeName' => 'username', 'message'=>'This Username is already in use'),

			array('search_by, search_value', 'safe'),
			
			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),
			
			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),

			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false),
			
			array('users_id, full_name, username, email, phone, position, picture, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'users_id' 		=> 'USERS',
			'full_name' 	=> 'FULL NAME',
			'username' 		=> 'USERNAME',
			'password'		=> 'PASSWORD',
			'email' 		=> 'EMAIL',
			'phone' 		=> 'MOBILE PHONE',
			'position' 		=> 'POSITION',
			'picture'		=> 'PICTURE',
			'created_date' 	=> 'CREATED DATE',
			'modified_date'	=> 'MODIFIED DATE',
			'created_by' 	=> 'CREATED BY',
			'modified_by' 	=> 'MODIFIED BY',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
			
		if($this->search_by == 'username')
			$criteria->compare('t.username', $this->search_value, true);
		
		if($this->search_by == 'full_name')
			$criteria->compare('t.full_name', $this->search_value, true);
		
		if($this->search_by == 'phone')
			$criteria->compare('t.phone', $this->search_value, true);
			
		if($this->search_by == 'email')
			$criteria->compare('t.email', $this->search_value, true);
		
		if($this->search_by == 'position')
			$criteria->compare('t.position', $this->search_value, true);
			$criteria->order='t.created_date DESC';		
		// $criteria->addNotInCondition('username', array('SYSTEM', 'developer')); 
		// $criteria->order = 'full_name ASC';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}
}