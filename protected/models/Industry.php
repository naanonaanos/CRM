<?php
class Industry extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'industry';
	}

	public function rules()
	{
		return array(
			
			array('code, name', 'required'),

			array('code', 'unique'),

			array('cpde, name, remarks', 'length', 'max'=>100),

			array('code', 'safe', 'except'=>'update'),

			array('code', 'unsafe', 'on'=>'update'),

			array('code, name', 'filter', 'filter'=>'trim'),
			
			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),
			
			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),

			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false),
			
			array('industry_id, code, name, remarks, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
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
			'industry_id' 	=> 'INDUSTRY',
			'code' 			=> 'CODE',
			'name' 			=> 'NAME',
			'remarks' 		=> 'REMARKS',
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

	public function findSource($id)
	{
		$industry = array();
		$industryName = array();

		$model = Status::model()->findByPk($id);

		$industry[] = $model->industry_id;
		$industryName[] = $model->name;

		$newIndustry = array_combine($industry, $industryName);
		return $newIndustry;
	}
}