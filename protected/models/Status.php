<?php
class Status extends CActiveRecord
{
	public $name;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'status';
	}

	public function rules()
	{
		return array(

			array('code, name', 'required'),

			array('code, name, description', 'length', 'max'=>100),

			array('color', 'length', 'max'=>200),

			array('code', 'unique'),

			array('code', 'safe', 'except'=>'update'),

			array('code', 'unsafe', 'on'=>'update'),

			array('code, name, color', 'filter', 'filter'=>'trim'),
			
			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),
			
			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),

			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false),
			
			array('status_id, code, name, color, description, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'status_id' 	=> 'STATUS',
			'code' 			=> 'CODE',
			'name' 			=> 'NAME',
			'color' 		=> 'COLOR',
			'description' 	=> 'DESCRIPTION',
			'created_date' 	=> 'CREATED DATE',
			'modified_date'	=> 'MODIFIED DATE',
			'created_by' 	=> 'CREATED BY',
			'modified_by' 	=> 'MODIFIED BY',
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		));
	}

	public function findStatus($id)
	{
		$status 		= array();
		$statusName 	= array();

		$model 			= Status::model()->findByPk($id);

		$status[] 		= $model->status_id;
		$statusName[]	= $model->name;

		$newStatus 		= array_combine($status, $statusName);
		return $newStatus;
	}
}