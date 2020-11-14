<?php
class Leads extends CActiveRecord
{
	public $search_by;
	public $search_value;
	public $status_name;
	public $source_name;
	public $source_id;
	public $industry_id;
	public $industry_name;
	public $contact_jobtitle;
	public $contact_id;
	public $contact_name;
	public $contact_phone;
	public $contact_email;
	public $contact_pic;
	public $contact_remarks;
	public $leads_name;
	public $name;
	public $code;
	public $users_id;
	// public $contact;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'leads';
	}

	public function rules()
	{
		return array(
			
			array('code, name, source_id, industry_id, status_id, full_name', 'required'),

			array('source_id, industry_id, status_id', 'numerical', 'integerOnly'=>true),

			array('code, name', 'unique'),

			array('code, name, remarks, full_name', 'length', 'max'=>100),	

			array('search_by, search_value', 'safe'),

			array('created_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>true, 'on'=>'insert'),

			array('modified_date', 'default', 'value'=>new CDbExpression('NOW()'), 'setOnEmpty'=>false),

			array('created_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>false, 'on'=>'insert'),

			array('modified_by', 'default', 'value'=>Yii::app()->user->id, 'setOnEmpty'=>true),

			array('code, name, industry_id, source_id, status_id, contact_id, created_date, modified_date, created_by, modified_by', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		'industry'	=>array(self::BELONGS_TO, 'Industry', 'industry_id'),
		'status'	=>array(self::BELONGS_TO, 'Status', 'status_id'),
		'source'	=>array(self::BELONGS_TO, 'Source', 'source_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
		'leads_id'		=>'LEADS',
		'code'			=>'CODE',
		'name'			=>'NAME',
		'full_name'		=>'FULL NAME',
		'industry_id'	=>'INDUSTRY',
		'status_id'		=>'STATUS',
		'remarks'		=>'REMARKS',
		'created_date'	=>'CREATED DATE',
		'modified_date'	=>'MODIFIED DATE',
		'created_by'	=>'CREATED BY',
		'modified_by'	=>'MODIFIED BY',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		if($this->search_by == 'code')
			$criteria->compare('t.code', $this->search_value, true);
		if($this->search_by=='name')
			$criteria->compare('t.name', $this->search_value, true);
		$criteria->order='t.created_date DESC';
		// criteria group = agar membuat banyak data yg sama menjadi 1 line
		$criteria->group='t.code'; 

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'10'
			),
		)
	);
	}
}
?>